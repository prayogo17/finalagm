<?php defined('NP') || die('No direct script access allowed.'); ?>
<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>AGM Technology</title>
    <style>
    /* -------------------------------------
    GLOBAL RESETS
    ------------------------------------- */

    /*All the styling goes here*/

    img {
    border: none;
    -ms-interpolation-mode: bicubic;
    max-width: 100%;
    }
    body {
    background-color: #f6f6f6;
    font-family: sans-serif;
    -webkit-font-smoothing: antialiased;
    font-size: 14px;
    line-height: 1.4;
    margin: 0;
    padding: 0;
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
    }
    table {
    border-collapse: separate;
    mso-table-lspace: 0pt;
    mso-table-rspace: 0pt;
    width: 100%; }
    table td {
    font-family: sans-serif;
    font-size: 14px;
    vertical-align: top;
    }
    /* -------------------------------------
    BODY & CONTAINER
    ------------------------------------- */
    .body {
    background-color: #f6f6f6;
    width: 100%;
    }
    /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
    .container {
    display: block;
    Margin: 0 auto !important;
    /* makes it centered */
    max-width: 580px;
    padding: 10px;
    width: 580px;
    }
    /* This should also be a block element, so that it will fill 100% of the .container */
    .content {
    box-sizing: border-box;
    display: block;
    Margin: 0 auto;
    max-width: 580px;
    padding: 10px;
    }
    /* -------------------------------------
    HEADER, FOOTER, MAIN
    ------------------------------------- */
    .main {
    background: #ffffff;
    border-radius: 3px;
    width: 100%;
    }
    .wrapper {
    box-sizing: border-box;
    padding: 20px;
    }
    .content-block {
    padding-bottom: 10px;
    padding-top: 10px;
    }
    .footer {
    clear: both;
    Margin-top: 10px;
    text-align: center;
    width: 100%;
    }
    .footer td,
    .footer p,
    .footer span,
    .footer a {
    color: #999999;
    font-size: 12px;
    text-align: center;
    }
    /* -------------------------------------
    TYPOGRAPHY
    ------------------------------------- */
    h1,
    h2,
    h3,
    h4 {
    color: #000000;
    font-family: sans-serif;
    font-weight: 400;
    line-height: 1.4;
    margin: 0;
    margin-bottom: 30px;
    }
    h1 {
    font-size: 35px;
    font-weight: 300;
    text-align: center;
    text-transform: capitalize;
    }
    p,
    ul,
    ol {
    font-family: sans-serif;
    font-size: 14px;
    font-weight: normal;
    margin: 0;
    margin-bottom: 15px;
    }
    p li,
    ul li,
    ol li {
    list-style-position: inside;
    margin-left: 5px;
    }
    a {
    color: #3498db;
    text-decoration: underline;
    }
    /* -------------------------------------
    BUTTONS
    ------------------------------------- */
    .btn {
    box-sizing: border-box;
    width: 100%;

    }
    .btn table {
    border-collapse: collapse;
    }
    .btn table td, .btn table th{
    border: 1px solid black;
    background-color: #ffffff;
    text-align: center;
    }
    /* -------------------------------------
    OTHER STYLES THAT MIGHT BE USEFUL
    ------------------------------------- */
    .last {
    margin-bottom: 0;
    }
    .first {
    margin-top: 0;
    }
    .align-center {
    text-align: center;
    }
    .align-right {
    text-align: right;
    }
    .align-left {
    text-align: left;
    }
    .clear {
    clear: both;
    }
    .mt0 {
    margin-top: 0;
    }
    .mb0 {
    margin-bottom: 0;
    }
    .preheader {
    color: transparent;
    display: none;
    height: 0;
    max-height: 0;
    max-width: 0;
    opacity: 0;
    overflow: hidden;
    mso-hide: all;
    visibility: hidden;
    width: 0;
    }
    .powered-by a {
    text-decoration: none;
    }
    hr {
    border: 0;
    border-bottom: 1px solid #f6f6f6;
    Margin: 20px 0;
    }
    /* -------------------------------------
    RESPONSIVE AND MOBILE FRIENDLY STYLES
    ------------------------------------- */
    @media only screen and (max-width: 620px) {
    table[class=body] h1 {
    font-size: 28px !important;
    margin-bottom: 10px !important;
    }
    table[class=body] p,
    table[class=body] ul,
    table[class=body] ol,
    table[class=body] td,
    table[class=body] span,
    table[class=body] a {
    font-size: 16px !important;
    }
    table[class=body] .wrapper,
    table[class=body] .article {
    padding: 10px !important;
    }
    table[class=body] .content {
    padding: 0 !important;
    }
    table[class=body] .container {
    padding: 0 !important;
    width: 100% !important;
    }
    table[class=body] .main {
    border-left-width: 0 !important;
    border-radius: 0 !important;
    border-right-width: 0 !important;
    }
    table[class=body] .btn table {
    width: 100% !important;
    }
    table[class=body] .btn a {
    width: 100% !important;
    }
    table[class=body] .img-responsive {
    height: auto !important;
    max-width: 100% !important;
    width: auto !important;
    }
    }
    /* -------------------------------------
    PRESERVE THESE STYLES IN THE HEAD
    ------------------------------------- */
    @media all {
    .ExternalClass {
    width: 100%;
    }
    .ExternalClass,
    .ExternalClass p,
    .ExternalClass span,
    .ExternalClass font,
    .ExternalClass td,
    .ExternalClass div {
    line-height: 100%;
    }
    .apple-link a {
    color: inherit !important;
    font-family: inherit !important;
    font-size: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
    text-decoration: none !important;
    }
    }
    </style>
  </head>
  <body class="">
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
      <tr>
        <td>&nbsp;</td>
        <td class="container">
          <div class="content">
            <!-- START CENTERED WHITE CONTAINER -->
            <span class="preheader">New Message</span>
            <table role="presentation" class="main">
              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>



                        <table style="width:100%">

<tr>
<td style="width: 40%;"><strong>Account Type</strong></td>
<td style="width: 5%;"><strong>:</strong></td>
<td><?php echo $account ?></td>
</tr>
<tr>
<td style="width: 40%;"><strong>Company Name</strong></td>
<td style="width: 5%;"><strong>:</strong></td>
<td><?php echo $company_name ?></td>
</tr>
<tr>
<td style="width: 40%;"><strong>Contact Name</strong></td>
<td style="width: 5%;"><strong>:</strong></td>
<td><?php echo $contact_name ?></td>
</tr>
<tr>
<td style="width: 40%;"><strong>Printer Model</strong></td>
<td style="width: 5%;"><strong>:</strong></td>
<td><?php echo $printer_model ?></td>
</tr>
<tr>
<td style="width: 40%;"><strong>Printer Serial</strong></td>
<td style="width: 5%;"><strong>:</strong></td>
<td><?php echo $printer_serial ?></td>
</tr>
<tr>
<td style="width: 40%;"><strong>Page Count Mono</strong></td>
<td style="width: 5%;"><strong>:</strong></td>
<td><?php echo $page_count_mono ?></td>
</tr>

<tr>
<td style="width: 40%;"><strong>Page Count Color</strong></td>
<td style="width: 5%;"><strong>:</strong></td>
<td><?php echo $page_count_color ?></td>
</tr>
<tr>
<td style="width: 40%;"><strong>Service Notes</strong></td>
<td style="width: 5%;"><strong>:</strong></td>
<td><?php echo $service_notes ?></td>
</tr>

<tr>
<td style="width: 40%;"><strong>Status</strong></td>
<td style="width: 5%;"><strong>:</strong></td>
<td><?php echo $status ?></td>
</tr>
</table>
<div style="margin-bottom: 20px;"></div>


                <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                  <tbody>
                    <tr>
                      <td align="left">
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                          <thead>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Signature</th>
                            <th>Date Time</th>
                          </thead>
                          <tbody>
                            <tr>

                              <td style="width: 25%;"><?php echo $name;?></td>
                              <td style="width: 25%;"><?php echo $phone;?></td>
                              <td style="width: 25%;"><img style="width:80%;margin:0;" src="cid:signature"></td>
                              <td style="width: 25%;"><?php echo $date_time;?></td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>

                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <!-- END MAIN CONTENT AREA -->
            </table>
            <!-- START FOOTER -->
            <div class="footer">
              <table role="presentation" border="0" cellpadding="0" cellspacing="0">

                <tr>
                  <td class="content-block powered-by">
                    Powered by AGM Technology.
                  </td>
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->
            <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </body>
</html>
