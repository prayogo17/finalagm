<!doctype html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/vendor.css">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/styleform.css">


    </script>
    <script src="js/select.js"></script>
    <script src="js/scroll.js"></script>
    <script src="js/pad.js"></script>
    <script src="js/compres/dist/compressor.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/split.js/1.5.9/split.min.js"></script>
    </script>
    <meta content="width=1366, initial-scale=0" name="viewport">
</head>

<body>
    <div class="page-wrap">
        <div class="panel-container flex">


            <div id="two">
                <div id="right1">

                </div>
                <div id="form1" class="col-lg-12 col-sm-12">
                    <div class="content form content2">
                        <h2 style="text-align: center;">AGM Technology Job #3440</h2>
                        <hr>
                        <form id="form_action"  method="POST" >

                              <input style="display:none;" id="file1" name="file1" type="file" accept=".png, .jpg, .jpeg" />
                            <div class="row">
                                <div class="col-xs-4">
                                    <input required type="radio" name="account" value="AGM Chargable Job" id="radio1" checked />
                                    <label for="radio1" class="radio"> AGM Chargable Job</label>
                                </div>
                                <div class="col-xs-4">
                                    <input required type="radio" name="account" value="OKI Warranty" id="radio2">
                                    <label for="radio2" class="radio"> OKI Warranty</label>
                                </div>
                                <div style="margin-top: 5%;">
                                    <div class="col-xs-8"></div>
                                    <div class="col-xs-4">
                                        <div class="input-group">
                                            <span class="input-group-addon" style="min-width: 100px;">
                                                <span class="fa fa-shield"></span> Job Ref
                                            </span>
                                            <input title="Job" required type="text" class="form-control" name="job_no" placeholder="Job">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <span class="fa fa-user"></span> Customer Name
                                        </span>
                                        <input title="Company Name" required type="text" class="form-control" name="company_name" placeholder="Company">
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <span class="fa fa-user"></span> Contact Name
                                        </span>
                                        <input title="Contact Name" required type="text" class="form-control" name="contact_name" placeholder="Contact Name">
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <span class="fa fa-print"></span> Printer Model
                                        </span>
                                        <input title="Printer Name" required type="text" class="form-control" name="printer_model" placeholder="Printer Model">
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <span class="fa fa-print"></span> Printer Serial
                                        </span>
                                        <input title="Printer Serial" required type="text" class="form-control" name="printer_serial" placeholder="Printer Serial">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <span class="fa fa-print"></span> Page Count Mono
                                        </span>
                                        <input title="Page Count Mono" required type="text" class="form-control" name="page_count_mono" placeholder="Mono">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <span class="fa fa-print"></span> Page Count Color
                                        </span>
                                        <input title="Page Count Color" required type="text" class="form-control" name="page_count_color" placeholder="Col">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="input-group" style="max-width: 90px;border-radius: 4px;">
                                        <span class="input-group-addon notes" style="height: 38px;border-radius: 4px;border-left: 1px solid #ccc;border-right: 1px solid #ccc;">
                                            <span class="fa fa-user"></span> Service Notes
                                        </span>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <textarea id="notes" title="Service Notes" class="form-control" name="service_notes" rows="8"></textarea>
                                </div>
                                <div class="col-xs-12" style="margin-top: 10px;text-align: center;">
                                    <button type="button" class="btn btn-primary" onclick="append('Technician attended Onsite');return false;">Technician Attended</button>
                                    <button type="button" class="btn btn-primary" onclick="append('found machine');return false;">Found Machine</button>
                                    <button type="button" class="btn btn-primary" onclick="append('Technician Returned Onsite');return false;">Returned Onsite</button>
                                    <button type="button" class="btn btn-primary" onclick="append('Supplied & Installed');return false;">Supplied & Installed</button>
                                </div>
                                <div class="col-xs-12" style="margin-top: 10px;text-align: center;">
                                    <button type="button" class="btn btn-primary" onclick="append('Performed Internal clean and test');return false;">Performed Clean</button>
                                    <button type="button" class="btn btn-primary" onclick="append('Vacuumed machine. Performed Paper path clean.');return false;">Vacuumed Machine</button>
                                    <button type="button" class="btn btn-primary" onclick="append('Machine Tested. Tested OK. ');return false;">Machine Tested</button>
                                    <button type="button" class="btn btn-primary" onclick="clear_note();return false;">Clear All</button>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-xs-4">
                                    <select class="form-control" name="status">
                                        <option selected disabled>--Please Select--</option>
                                        <option value="FINISHED">FINISHED</option>
                                        <option value="PARTS">PARTS</option>
                                        <option value="QUOTE">QUOTE</option>
                                        <option value="CANCEL">CANCEL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top:15px;margin-left: 20px;margin-right: 20px">
                                <div class="file col-xs-12">
                                    <div class="form-group">
                                        <div class="input-group input-file">
                                            <span title="Choose File" class="input-file1 input-group-addon" style="min-width:80px;">
                                                <span title="Choose File" class="fa fa-file"></span> Choose File
                                            </span>
                                            <input title="Choose File" readonly required type="text" class="input-file1 form-control" placeholder='No File Selected...'>
                                            <span class="input-group-btn">
                                                <button id="res1" class="btn btn-warning btn-reset" type="button">Reset</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="file col-xs-12">
                                    <div class="form-group">
                                        <div class="input-group input-file">
                                            <span title="Choose File" class="input-file2 input-group-addon" style="min-width:80px;">
                                                <span title="Choose File" class="fa fa-file"></span> Choose File
                                            </span>
                                            <input title="Choose File" readonly required type="text" class="input-file2  form-control" placeholder='No File Selected...'>
                                            <span class="input-group-btn">
                                                <button id="res2" class="btn btn-warning btn-reset" type="button">Reset</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="file col-xs-12">
                                    <div class="form-group">
                                        <div class="input-group input-file">
                                            <span title="Choose File" class="input-file3 input-group-addon" style="min-width:80px;">
                                                <span title="Choose File" class="fa fa-file"></span> Choose File
                                            </span>
                                            <input title="Choose File" readonly required type="text" class="input-file3 form-control" placeholder='No File Selected...'>
                                            <span class="input-group-btn">
                                                <button id="res3" class="btn btn-warning btn-reset" type="button">Reset</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div id="wrap-sig">
                                   	<canvas width="300" height="300" id="signature"></canvas>
                                    <button class="btn btn-warning btn-block" id="erase" type="button">Clear Signature</button>
                                    <input required type="text" class="form-control signature" name="name" placeholder="Full Name">
                                    <input required  type="number" class="form-control signature" name="phone" placeholder="Phone Number">
                                </div>


                            </div>
                            <div class="row">
                                <button class="btn btn-primary btn-block" id="save" type="button">Send</button>
                            </div>
                            <hr>
                            <div class="footer">
                                AGM Technology <a href="/">Job Form</a>
                            </div>
                    </div>
                    <input type="hidden" name="signature" value="">
                    <input type="hidden" name="file1_64" value="">
                    <input type="hidden" name="file2_64" value="">
                    <input type="hidden" name="file3_64" value="">
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="js/javaform.js"></script>

</body>

</html>
