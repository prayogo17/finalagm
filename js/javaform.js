var batas;
var signaturePad;
var file_now;
var file1 = null;
var file2 = null;
var file3 = null;
var send = true;
var dataT;
$(document).ready(function() {
  klik_image();
  klik_clear_signature();
  klik_reset();
  klik_send();
  setup_signature();
  $('.content1').css('width', ($('#one').width() - 30) + 'px');
  $('body').css('display', 'block');
});


function klik_send() {
  //var myForm = document.getElementById('form_action');
  //formData = new FormData(myForm);
  $(document).on('click', '#save', function(e) {
    if (!FormEmpty()) {
      if (send) {
        send = false;
        initialize_image();
        toastr.options.timeOut = 0;
        toastr.options.extendedTimeOut = 0;
        toastr.options.tapToDismiss = false;
        toastr["info"]('<p style="font-size:15px;text-align:center;">Upload Progress</p><div style="margin:0;" class="progress">  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar"  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%" id="progress-upload1"> 0%</div></div><p style="margin:0;font-size:12px;text-align:center;">Warning : Don\'t Refresh Page</p>');

        $.ajax({
          xhr: function() {
            var xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener("progress", function(evt) {
              if (evt.lengthComputable) {

                var percentComplete = Math.floor((evt.loaded / evt.total) * 100);
                //  console.log(evt.total/1000);
                $('#progress-upload1').text(percentComplete + '%');
                $('#progress-upload1').css('width', percentComplete + '%');
                //Do something with upload progress here
              }
            }, false);
            return xhr;
          },
          method: "POST",
          url: "action.php",
          data: $('#form_action').serialize(),
          success: function(data) {
            toastr.clear();
            toastr.options.timeOut = 5000;
            toastr.options.extendedTimeOut = 5000;
            send = true;
            //Do something on success
          }
        });
      }


    } else {
      toastr["warning"]("Please fill in all form fields");

    }
  });
}

function FormEmpty() {
  var data = $('#form_action').serializeArray();
  for (var t = 0; t < data.length - 4; ++t) {
    if (data[t]['value'] == "") {

      return true;

    }
  }
  return false;
}







function initialize_image() {
  if (file1 != null) {
    $("input[name='file1_64']").val(file1);
  }
  if (file2 != null) {
    $("input[name='file2_64']").val(file2);
  }
  if (file3 != null) {
    $("input[name='file3_64']").val(file3);
  }
  if (!signaturePad.isEmpty()) {
    $("input[name='signature']").val(signaturePad.toDataURL("image/jpeg"));
  }
}









function setup_signature() {
  var canvas = document.querySelector("canvas");

  signaturePad = new SignaturePad(canvas, {
    backgroundColor: 'rgb(255, 255, 255)',
  });
}

function clear_signature() {
  signaturePad.clear();
  $("input[name='signature']").val('');
}


function klik_clear_signature() {
  $(document).on('click', '#erase', function() {
    clear_signature();
  });
}





function klik_reset() {
  $(document).on('click', '#res1', function() {
    file1 = null;
    $("input.input-file1").val('');
    $("input[name='file1_64']").val('');
  });

  $(document).on('click', '#res2', function() {
    file2 = null;
    $("input.input-file2").val('');
    $("input[name='file2_64']").val('');
  });

  $(document).on('click', '#res3', function() {
    file3 = null;
    $("input.input-file3").val('');
    $("input[name='file3_64']").val('');
  });
}

function klik_image() {
  $(document).on('click', '.input-file1', function() {
    file_now = 1;
    $("#file1").click();
  });

  $(document).on('click', '.input-file2', function() {
    file_now = 2;
    $("#file1").click();
  });

  $(document).on('click', '.input-file3', function() {
    file_now = 3;
    $("#file1").click();
  });

  $(document).on('change', '#file1', function(e) {
    const file = e.target.files[0];
    //  console.log(file.size);
    if (file_now == 1) {
      $("input.input-file1").val(file.name);
    } else if (file_now == 2) {
      $("input.input-file2").val(file.name);
    } else if (file_now == 3) {
      $("input.input-file3").val(file.name);
    }
    if (!file) {
      return;
    }
    if (file.size > 1000000) {
      new Compressor(file, {
        maxWidth: 1500,
        maxHeight: 1500,
        quality: 0.9,
        success(result) {
          blob2base(result);
        },
        error(err) {
          console.log(err.message);
        },
      });
    } else {
      blob2base(file);
    }
  });

}


function blob2base(blob, e) {
  var reader = new FileReader();
  reader.readAsDataURL(blob);
  reader.onload = function() {
    var base64data = reader.result;
    if (file_now == 1) {
      file1 = base64data;
    } else if (file_now == 2) {
      file2 = base64data;
    } else if (file_now == 3) {
      file3 = base64data;
    }
    //  console.log(base64data);
    file_now = 0;
    $("#file1").val('');
  }
}

function append(data) {
  $("#notes").val($("#notes").val() + " " + data);
}

function clear_note() {
  $("#notes").val('');
}
