<?php

 defined('NP') || die('No direct script access allowed.');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer/src/PHPMailer.php' ;
require_once 'PHPMailer/src/SMTP.php';
require_once 'PHPMailer/src/Exception.php';

class Controller
{
    protected $pdo;
    protected $tmp = 'attachment';
    protected $tmp1 = 'signature';

    public function __construct($config)
    {
        $this->config = $config;

        try {
            extract($config['database']);
            $this->pdo = new PDO("mysql:dbname=$database;host=$hostname", $username, $password, array(
                PDO::ATTR_PERSISTENT         => true,
                PDO::ATTR_CASE               => PDO::CASE_LOWER,
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_WARNING,
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            ));
        } catch (PDOException $e) {
            throw $e;
        }
    }


    public function get_by_id($id, $json=false)
    {
        $data = $this->pdo->query(
          'SELECT costumers.*, GROUP_CONCAT(attachments.file_name SEPARATOR "||") as file,GROUP_CONCAT(attachments.type SEPARATOR "||") as type FROM costumers LEFT JOIN attachments on costumers.id=attachments.costumer_id WHERE costumers.id='.$id.'  GROUP by costumers.id'
        )->fetchAll(PDO::FETCH_ASSOC);
        if ($json) {
          echo  json_encode($data);
        } else {
            extract($data[0]);
            if ($file!==null || $type!==null) {
                $file=explode("||", $file);
                $type=explode("||", $type);
            }
            return require 'template/dialog_temp.php';
        }
    }



    public function getListCostumers()
    {
        $result=array();
        $data = $this->pdo->query(
            'SELECT  `job_no`, `company_name`, `date_time`,`id` FROM `costumers`'
        )->fetchAll();

        foreach ($data as $row) {
            $originalDate = $row->date_time;
            $newDate = date("d M Y H:i:s", strtotime($originalDate));
            $output=array("id"=>$row->id,"job"=>$row->job_no,"company"=>$row->company_name,"date_order"=>$row->date_time,"date"=>$newDate);
            array_push($result, $output);
        }

        return json_encode($result);
    }


    /**
     * @param  array $attachment
     * @return void
     */
    protected function sendEmail($attachment)
    {
        $mail = new PHPMailer;
        try {
            extract($this->config['smtp']);
            //Server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = $hostname;
            $mail->SMTPAuth = true;
            $mail->Username = $username;
            $mail->Password = $password;
            $mail->SMTPSecure = $security;
            $mail->Port = $port;
            $mail->setFrom($sender_email, $sender_name);
            $mail->addAddress($recipient_email, $recipient_name);

            //Attachments
            if ($attachment!=null) {
                if (isset($attachment['signature'])) {
                    $mail->AddEmbeddedImage($attachment['signature'], 'signature');
                }


                foreach ($attachment as $file) {
                    //  echo $file;
                    $mail->addAttachment($file);
                }
            }
            $mail->isHTML(true);
            $mail->Subject = $subject;
            ob_start();
            extract($this->request);
            require 'template/template.php';

            $mail->Body = ob_get_clean();

            if ($mail->send()) {
                $_SESSION['status'] = 1;
                $_SESSION['message'] = 'Email sent successfully';
                //echo "Email sent successfully";
                $this->responseJson($this->request);
                // echo 'Message has been sent';
            }
        } catch (Exception $e) {
            $_SESSION['status'] = 0;
            $_SESSION['message'] = 'Something went wrong, please try again.';
            // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }

    /**
     * @param array request
     */

    public function responseJson($data)
    {
        $originalDate = $data['date_time'];
        $newDate = date("d M Y H:i:s", strtotime($originalDate));
        $data['date_time'] = $newDate;
        echo json_encode($data);
    }
    public function setRequest($request)
    {
        $this->setFile($request);
        $request['date_time'] = date('Y-m-d H:i:s');
        $this->request = array_map('trim', $request);
        $this->setFile();
    }

    /**
     * @param array file
     */

    private function setFile()
    {
        $this->file=array();
        //   print_r($this->request);
        if (isset($this->request['file1_64'])) {
            array_push($this->file, $this->request['file1_64']);
            unset($this->request['file1_64']);
        }
        if (isset($this->request['file2_64'])) {
            array_push($this->file, $this->request['file2_64']);
            unset($this->request['file2_64']);
        }
        if (isset($this->request['file3_64'])) {
            array_push($this->file, $this->request['file3_64']);
            unset($this->request['file3_64']);
        }
        if (isset($this->request['signature'])) {
            $this->file['signature']=$this->request['signature'];
            unset($this->request['signature']);
        }
    }



    public function insert()
    {
        foreach ($this->request as $col => $value) {
            $data['`' . $col . '`'] = "'" . addslashes($value) . "'";
        }
        $column = implode(',', array_keys($data));
        $values = implode(',', array_values($data));
        $query = $this->pdo->query("INSERT INTO `costumers` ($column) VALUES ($values)");

        //inser data to db
        if ($query) {
            $id = $this->pdo->lastInsertId();
            $this->request['id']=$id;
            if (!is_dir($tmp = __DIR__ . DIRECTORY_SEPARATOR . $this->tmp . DIRECTORY_SEPARATOR)) {
                mkdir($tmp, 0777, true);
            }

            if (!is_dir($tmp1 = __DIR__ . DIRECTORY_SEPARATOR . $this->tmp1 . DIRECTORY_SEPARATOR)) {
                mkdir($tmp1, 0777, true);
            }
        }
        $attachment=null;
        //Signature file
        if (isset($this->file['signature']) && $this->file['signature']!="") {
            $name = $this->generate_name($this->file['signature']);
            $signature_img = base64_decode(explode(',', $this->file['signature'])[1]);
            $attachment['signature'] = $tmp1.$name;
            if (file_put_contents($tmp1.$name, $signature_img, FILE_APPEND)) {
                $this->pdo->query("INSERT INTO `attachments` (`costumer_id`, `file_name`, `type`) VALUES ('$id', '$name', 'signature')");
            }
            unset($this->file['signature']);
        }

        foreach ($this->file as $new) {
            if ($new!="") {
                $name = $this->generate_name($new);
                $ex=explode(',', $new);
                $signature_img = base64_decode($ex[1]);
                $attachment[] = $tmp.$name;
                if (file_put_contents($tmp.$name, $signature_img, FILE_APPEND)) {
                    $this->pdo->query("INSERT INTO `attachments` (`costumer_id`, `file_name`, `type`) VALUES ('$id', '$name', 'attachment')");
                }
            };
        }


        if ($query) {
            $this->sendEmail($attachment);
        }
    }


    public function generate_name($data_string)
    {
        $png=stripos($data_string, "image/png");
        if ($png!=false) {
            return md5(uniqid(rand(), true)) . '.png';
        } else {
            return md5(uniqid(rand(), true)) . '.jpg';
        }
    }
}
