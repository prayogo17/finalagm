<?php defined('NP') || die('No direct script access allowed.'); ?>
<div id="dialog-content">
  <div class="row">
    <div class="col-lg-5 dialog-content-title">
          <span>Account</span>
    </div>
    <div class="col-lg-1 dot-two">
     <span>:</span>
    </div>
    <div class="col-lg-6">
          <span><?php echo $account ?></span>
    </div>

  </div>
  <div class="row">
    <div class="col-lg-5 dialog-content-title">
          <span>Job Ref</span>
    </div>
    <div class="col-lg-1 dot-two">
     <span>:</span>
    </div>
    <div class="col-lg-6">
          <span><?php echo $job_no ?></span>
    </div>

  </div>
  <div class="row">
    <div class="col-lg-5 dialog-content-title">
          <span>Costumer Name</span>
    </div>
    <div class="col-lg-1 dot-two">
     <span>:</span>
    </div>
    <div class="col-lg-6">
          <span><?php echo $company_name ?></span>
    </div>

  </div>

  <div class="row">
    <div class="col-lg-5 dialog-content-title">
          <span>Contact Name</span>
    </div>
    <div class="col-lg-1 dot-two">
     <span>:</span>
    </div>
    <div class="col-lg-6">
          <span><?php echo $contact_name ?></span>
    </div>

  </div>
  <div class="row">
    <div class="col-lg-5 dialog-content-title">
          <span>Printer Model</span>
    </div>
    <div class="col-lg-1 dot-two">
     <span>:</span>
    </div>
    <div class="col-lg-6">
          <span><?php echo $printer_model ?></span>
    </div>

  </div>
  <div class="row">
    <div class="col-lg-5 dialog-content-title">
          <span>Printer Serial</span>
    </div>
    <div class="col-lg-1 dot-two">
     <span>:</span>
    </div>
    <div class="col-lg-6">
          <span><?php echo $printer_serial ?></span>
    </div>

  </div>

  <div class="row">
    <div class="col-lg-5 dialog-content-title">
          <span>Page Count Mono</span>
    </div>
    <div class="col-lg-1 dot-two">
     <span>:</span>
    </div>
    <div class="col-lg-6">
          <span><?php echo $page_count_mono ?></span>
    </div>

  </div>

  <div class="row">
    <div class="col-lg-5 dialog-content-title">
          <span>Page Count Color</span>
    </div>
    <div class="col-lg-1 dot-two">
     <span>:</span>
    </div>
    <div class="col-lg-6">
          <span><?php echo $page_count_color ?></span>
    </div>

  </div>

  <div class="row">
    <div class="col-lg-5 dialog-content-title">
          <span>Service Notes</span>
    </div>
    <div class="col-lg-1 dot-two">
     <span>:</span>
    </div>
    <div class="col-lg-6">
          <span><?php echo $service_notes ?></span>
    </div>

  </div>

  <div class="row">
    <div class="col-lg-5 dialog-content-title">
          <span>Status</span>
    </div>
    <div class="col-lg-1 dot-two">
     <span>:</span>
    </div>
    <div class="col-lg-6">
          <span><?php echo $status ?></span>
    </div>

  </div>

  <div class="row">
    <div class="col-lg-5 dialog-content-title">
          <span>Full Name</span>
    </div>
    <div class="col-lg-1 dot-two">
     <span>:</span>
    </div>
    <div class="col-lg-6">
          <span><?php echo $name ?></span>
    </div>

  </div>

  <div class="row">
    <div class="col-lg-5 dialog-content-title">
          <span>Phone Number</span>
    </div>
    <div class="col-lg-1 dot-two">
     <span>:</span>
    </div>
    <div class="col-lg-6">
          <span><?php echo $phone ?></span>
    </div>

  </div>

  <div class="row">
    <div class="row">
      <div class="col-lg-12 dialog-content-signature">
            <span>Signature</span>
      </div>
    </div>

    <div class="row">
      <?php if ($type!=null): ?>

<?php if (array_search('signature', $type)!==false): ?>



  <?php
  $a=array_search('signature', $type);

  if (file_exists($_SERVER['DOCUMENT_ROOT'].'/signature/'.$file[$a])) {
      echo '<div style="background-image:url(signature/'.$file[$a].')" class="col-lg-4 dialog-content-signature-image"></div>';
      unset($file[$a]);
  } else {
    echo '<div style="background-image:url(https://cdn.browshot.com/static/images/not-found.png);" class="col-lg-4 dialog-content-signature-image"></div>';
    unset($file[$a]);
  }
  ?>
<?php else:
echo "<div style='text-align:center;'>Signature Not Found</div>";
  ?>

<?php endif; ?>
<?php else:
echo "<div style='text-align:center;'>Signature Not Found</div>";
  ?>
      <?php endif; ?>

    </div>

  </div>

  <div  class="row attachment-list">
    <div class="row">
      <div class="col-lg-12 dialog-content-attach">
            <span>Attachment</span>
      </div>
    </div>

    <div id="list-attach" class="row attachment-list">
      <?php if ($file!=null): ?>
        <?php foreach ($file as $key): ?>
<?php
if (file_exists($_SERVER['DOCUMENT_ROOT'].'/attachment/'.$key)) {
  echo '<div style="background-image:url(attachment/'.$key.')" class="dialog-content-signature-attach"></div>';
} else {
    echo '<div style="background-image:url(https://cdn.browshot.com/static/images/not-found.png)" class="dialog-content-signature-attach"></div>';

}


?>
        <?php endforeach; ?>
      <?php else:
      echo "<div style='text-align:center;'>Attachment Not Found</div>";
        ?>

      <?php endif; ?>





    </div>

  </div>
</div>
