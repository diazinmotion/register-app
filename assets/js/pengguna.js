var table_content;

$(document).ready(function(){
  __reInitialize();
});

$(document).on('click', '.btn-item-add', function(){
  $('.modal-title').text('Tambah Data');
  $('.form-action').find(':input').val('');
  $('#modal-action').modal('show');
});

$(document).on('click', '.btn-edit', function(){
  var data_id = $(this).data('id');

  $('.modal-title').text('Edit Data');

  // dapatkan data dari ajax
  $.post(base_url + 'pengguna/ajax_get_item', {id: data_id}, function(d){
    if(d.status){
      $('input[name="id"]').val(d.data.id);
      $('input[name="nama"]').val(d.data.nama);
      $('input[name="no_hp"]').val(d.data.no_hp);
      $('textarea[name="alamat"]').val(d.data.alamat);

      $('#modal-action').modal('show');
    }else{
      alert('Gagal Mendapatkan Data');
    }
  });
});

$(document).on('click', '.btn-delete', function(){
  var data_id = $(this).data('id');

  var con = confirm('Apakah Anda yakin?');
  if(con){
    $.post(base_url + 'pengguna/ajax_delete_item', {id: data_id}, function(d){
      if(d.status){
        alert('Berhasil Manghapus Data');
        table_content.ajax.reload();
      }else{
        alert('Gagal Menghapus Data');
      }
    });
  }
});

$(document).on('click', '.btn-simpan', function(){
  var form_data = $('.form-action').serialize();

  $.post(base_url + 'pengguna/ajax_post_item', form_data, function(d){
    if(d.status){
      alert('Berhasil Menyimpan Data');
      $('#modal-action').modal('hide');
      $('.form-action').find(':input').val('');

      table_content.ajax.reload();
    }else{
      alert('Gagal Menyimpan Data\n' + d.error);
    }
  });
});

$(".export").click(function(){
  $("#table-content").table2excel({
    exclude: ".hide-export",
    name: "Daftar Pendaftar",
    filename: 'daftar_pendaftar.xls'
  });
});

function __reInitialize(){
  columns = [];

  $.each(table_columns, function(i, v) {
    columns[i] = {
      "data": v
    };
  });

  table_content = $('#table-content').DataTable({
    "processing": true,
    "searching": true,
    "serverSide": true,
    "sort": false,
    "ajax": {
        "url": table_url,
        "type": "POST"
    },
    "columns": columns
  });
}