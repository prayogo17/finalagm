<?php

 define('NP', 'NP');

session_start();

require 'controller.php';

$config['database'] = array(
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'agm'
);

$config['smtp'] = array(
    // Server Settings
    'hostname'        => 'nugrohoprayogo.id',
    'username'        => 'blog@nugrohoprayogo.id',
    'password'        => 'xxxxxx',
    'security'        => 'tls',
    'port'            => 587,

    // Detail sender
    'sender_email'    => 'blog@nugrohoprayogo.id',
    'sender_name'     => 'Nugroho',

    // Detail Recipient
    'recipient_email' => 'nugrohoprayogo97@gmail.com',
    'recipient_name'  => 'CEK',

    // Subject
    'subject'         => 'New Message'
);

$controller = new Controller($config);

if (isset($_GET['id_cos'])) {
    $controller->get_by_id($_GET['id_cos']);
} elseif (isset($_GET['id_cos1'])) {
    $controller->get_by_id($_GET['id_cos1'],true);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo $controller->getListCostumers();
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller->setRequest($_POST);
    $controller->insert();
    //  $controller->redirectBack();
}
