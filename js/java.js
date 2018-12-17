var batas;
var signaturePad;
var file_now;
var file1 = null;
var file2 = null;
var file3 = null;
var table;
var dataT = {};
var send = true;
$(document).ready(function() {

  tableSetup();
  get_data_table();
  split_setup();
  klik_left();
  klik_right();
  resizeSensor();
  klik_image();
  klik_clear_signature();
  klik_reset();
  klik_send();
  klik_modal();
  klik_image_detail();
  klik_get_data();
  setup_signature();
  $('.content1').css('width', ($('#one').width() - 30) + 'px');
  $('body').css('display', 'block');
});




function EmptyForm() {
  var data = $('#form_action').serializeArray();
  data.forEach(function(data) {
    $('[name="' + data['name'] + '"]').val('');
  });
  $('#res1').click();
  $('#res2').click();
  $('#res3').click();
  clear_signature();
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


function klik_image_detail() {
  $(document).on('click', '.dialog-content-signature-attach, .dialog-content-signature-image', function(e) {
    var t = $(this).css('background-image');
    t = t.replace('url(', '').replace(')', '').replace(/\"/gi, "");
    window.open(t, '_blank');
  });
}










function klik_get_data() {
  $(document).on('click', '.getdata', function(e) {
  var id = $(this).parent().parent().data('id');
    $.ajax({
        dataType: 'json',
        method: "GET",
        url: "action.php",
        data: {
          id_cos1: id,
        }
      })
      .done(function(msg) {
//console.log(msg[0]);
Object.keys(msg[0]).forEach(function(k){
  //  console.log(k + ' - ' + msg[0][k]);
  if(k=='account'){
    $('[value="' + msg[0][k] + '"]').prop('checked',true);
  }else{
      $('[name="' + k + '"]').val(msg[0][k]);
  }


});
            // msg[0].forEach(function(a){
            //   console.log(a);
            // });
      });
  });
}








function klik_modal() {
  $(document).on('click', '.detail', function(e) {
    var a = $(this).parent().parent().data('id');
    get_dialog_detail(a);
  });
}

function klik_send() {
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

            var data1 = JSON.parse(data);
            dataT.push(data1);
            table.row.add(['', data1['job_no'], data1['contact_name'], data1['date_time']]).order([3, 'desc']).draw();

            table.on('order.dt search.dt', function() {
              table.column(0, {
                search: 'applied',
                order: 'applied'
              }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
              });
            }).draw();
            //Do something on success
          }
        });
      }


    } else {
      toastr["warning"]("Please fill in all form fields");

    }
  });
}


function get_dialog_detail(id) {

  $.ajax({
      method: "GET",
      url: "action.php",
      data: {
        id_cos: id,
      }
    })
    .done(function(msg) {
      //    console.log(msg);
      $('.modal-body').empty().append(msg);
      $('#myModal').modal('show');
    });

}




function get_data_table() {
  $.ajax({
      method: "GET",
      url: "action.php",
    })
    .done(function(msg) {
      var data = JSON.parse(msg);
      dataT = data;

      for (var e = 0; e < data.length; ++e) {
        table.row.add(['', data[e]['job'], data[e]['company'], data[e]['date']]).draw();
      }
      table.on('order.dt search.dt', function() {
        table.column(0, {
          search: 'applied',
          order: 'applied'
        }).nodes().each(function(cell, i) {
          cell.innerHTML = i + 1;
        });
      }).order([3, 'desc']).draw();

    });

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




function tableSetup() {
  table = $('.table').DataTable({
    "columnDefs": [{
      "targets": 4,
      "data": null,
      "defaultContent": `<button type="button" class="detail btn-tbl btn btn-info">Detail</button>
                         <button type="button" class="getdata btn-tbl btn btn-primary">Get Data</button>`
    }],
    "createdRow": function(row, data, dataIndex) {

      $(row).attr('data-id', dataT[dataIndex]['id']);

    },
    "aoColumns": [{
        "bSortable": false
      },
      {
        "bSortable": false
      },
      {
        "bSortable": true,
        "sType": "ad"
      }
    ],
    "order": [
      [3, "asc"]
    ],
    "pageLength": 50,
    "bLengthChange": false,
    "language": {
      search: "",
      searchPlaceholder: "Search data ..."
    },
    bAutoWidth: false,
    aoColumns: [{
        sWidth: '2%'
      },
      null, null, {
        sWidth: '25%'
      }
    ]
  });
}

function resizeSensor() {
  new ResizeSensor($('#one'), function() {
    var a = $('#one').width();
    if (a <= 330) {
      var t = 330 - a;
      t = 15 - t;
      $('.content1').css('left', t + 'px');
      $('.content1').css('width', '300px');
    } else {
      $('.content1').css('position', 'fixed');
      //  $('.content1').css('width','300px');
      $('.content1').css('left', 'auto');
      $('.content1').css('width', (a - 30) + 'px');
    }

  })
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

function klik_left() {
  $(document).on('click', '#left1', function() {
    $('.gutter').remove();
    split_setup();
  });
}

function split_setup() {
  Split(['#one', '#two'], {
    sizes: [28, 72],

  })

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
    var file = e.target.files[0];
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
        quality: 0.8,
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

function klik_right() {
  $(document).on('click', '#right1', function() {
    $('.gutter').remove();
    split_setup();
  });
}
