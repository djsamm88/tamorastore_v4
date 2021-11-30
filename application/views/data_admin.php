
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 id="judul">
        Selamat datang di Sistem Informasi Manajemen Desa
        <small>Kab.Humbang Hasundutan</small>
      </h1>      
    </section>

    <!-- Main content -->
    <section class="content container-fluid" >

      <!--------------------------
        | Your Page Content Here |
        -------------------------->    
<!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Aplikasi</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
              <button class="btn btn-primary" id="tambah_data"  onclick="tambah_admin()">Tambah Data</button> 
<table id="tbl_newsnya" class="table  table-striped table-bordered"  cellspacing="0" width="100%">
      <thead>
        <tr>
              
              <th>No</th>
              <th>Nama</th>           
              <th>Username</th>                     
              <th>Email</th>                                    
              <th>Telp</th>           
              <th>Level</th>           
              <th>Cabang</th>           
              <th>ID_SALES</th>           
              <th>Action</th>
              
        </tr>
      </thead>
      <tbody>
        <?php         
        $no = 0;
        foreach($all_admin as $x)
        {
          $btn = $x->level=='1'?"<button class='btn btn-warning btn-xs' onclick='edit_admin($x->id_admin);return false;'>Edit</button>
                  ":"<button class='btn btn-warning btn-xs' onclick='edit_admin($x->id_admin);return false;'>Edit</button>
                  <button class='btn btn-danger btn-xs' onclick='hapus_admin($x->id_admin);return false;'>Hapus</button>    ";
          $no++;


          $level = level($x->level);

          $id_sales = "-";
          $btn_sales = "";
          if($x->level=="7")
          {
            $id_sales = "SALES".$x->id_admin;

            $btn_sales = "<button class='btn btn-success btn-xs' onclick='persen_sales($x->id_admin);return false;'>Persen Sales</button>";

          }

            
            echo (" 
              
              <tr>
                <td>$no</td>
                <td>$x->nama_admin</td>
                <td>$x->user_admin</td>
                <td>$x->email_admin</td>
                <td>$x->telp_admin</td>
                <td>$level</td>
                <td>$x->kode_cabang - $x->nama_cabang</td>
                <td>$id_sales  $btn_sales</td>
                <td>
                  $btn
                </td>
              </tr>
          ");
          
        }
        
        
        ?>
      </tbody>
  </table>


        </div>
        
      </div>
      <!-- /.box -->

</section>
    <!-- /.content -->




<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Admin</h4>
      </div>
      <div class="modal-body">
          <form id="form_tambah_admin">
            <input type="hidden" name="id_admin" id="id_admin" class="form-control" readonly="readonly">
            

            <div class="col-sm-4">Cabang</div>
            <div class="col-sm-8">
              <select name="id_cabang" id="id_cabang" class="form-control">
                  <option value=""> --- pilih Cabang --- </option>
                  <?php 
                    $data_cabang = $this->m_cabang->m_data_cabang();
                    foreach($data_cabang as $cabang)
                    {
                      echo "
                        <option value='$cabang->id_cabang'>$cabang->kode_cabang - $cabang->nama_cabang</option>
                      ";
                    }
                  ?>                  
              </select>
            </div>
            <div style="clear: both;"></div><br>

            <div class="col-sm-4">Level</div>
            <div class="col-sm-8">
              <select name="level" id="level" class="form-control">
                  <option value=""> --- pilih Level --- </option>
                  <option value="1"><?php echo level('1')?></option>
                  <option value="2"><?php echo level('2')?></option>
                  <option value="3"><?php echo level('3')?></option>
                  <option value="4"><?php echo level('4')?></option>
                  <option value="6"><?php echo level('6')?></option>
                  <option value="7"><?php echo level('7')?></option>
              </select>
            </div>
            <div style="clear: both;"></div><br>


            <div class="col-sm-4">Nama</div>
            <div class="col-sm-8"><input type="text" name="nama_admin" id="nama_admin" required="required" class="form-control" placeholder="Nama"></div>
            <div style="clear: both;"></div><br>


            <div class="col-sm-4">Tempat_lahir</div>
            <div class="col-sm-8"><input type="text" name="tempat_lahir" id="tempat_lahir" required="required" class="form-control" placeholder="tempat_lahir"></div>
            <div style="clear: both;"></div><br>

            <div class="col-sm-4">Tgl_lahir</div>
            <div class="col-sm-8"><input type="text" name="tgl_lahir" id="tgl_lahir" required="required" class="form-control datepicker" placeholder="tgl_lahir" ></div>
            <div style="clear: both;"></div><br>


            <div class="col-sm-4">J.Kelamin</div>
            <div class="col-sm-8">
              <select name="kelamin" id="kelamin" class="form-control">
                  <option value=""> --- pilih JK --- </option>
                  <option value="L">Laki-laki</option>
                  <option value="P">Perempuan</option>                  
              </select>
            </div>
            <div style="clear: both;"></div><br>


            <div class="col-sm-4">Pendidikan</div>
            <div class="col-sm-8"><input type="text" name="pendidikan" id="pendidikan" required="required" class="form-control" placeholder="pendidikan" ></div>
            <div style="clear: both;"></div><br>


            <div class="col-sm-4">Jabatan</div>
            <div class="col-sm-8"><input type="text" name="jabatan" id="jabatan" required="required" class="form-control" placeholder="jabatan" ></div>
            <div style="clear: both;"></div><br>




            <div class="col-sm-4">NPWP</div>
            <div class="col-sm-8"><input type="text" name="npwp" id="npwp" required="required" class="form-control" placeholder="npwp" ></div>
            <div style="clear: both;"></div><br>




        
          <div class="col-sm-4">Username</div>
            <div class="col-sm-8"><input type="text" name="user_admin" id="user_admin" required="required" class="form-control" placeholder="Username"></div>
            <div style="clear: both;"></div><br>
            
            <div class="col-sm-4">Telp</div>
            <div class="col-sm-8"><input type="text" name="telp_admin" id="telp_admin" required="required" class="form-control" placeholder="Telp"></div>
            <div style="clear: both;"></div><br>


            <div class="col-sm-4">Email</div>
            <div class="col-sm-8"><input type="email" name="email_admin" id="email_admin" required="required" class="form-control" placeholder="Email"></div>
            <div style="clear: both;"></div><br>
            
            <div class="col-sm-4">Password</div>
            <div class="col-sm-8"><input type="Password" name="pass_admin" id="pass_admin" required="required" class="form-control" placeholder="Password"></div>
            <div style="clear: both;"></div><br>
            <div class="col-sm-4">Confirm Password</div>
            <div class="col-sm-8"><input type="Password" name="conf_pass_admin" id="conf_pass_admin" required="required" class="form-control" placeholder="Confirm Password"></div>
            <div style="clear: both;"></div><br>
            <div id="t4_info_form"></div>
            <button type="submit" class="btn btn-primary"> Simpan </button>
          </form>

          <div style="clear: both;"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>






<!-- Modal sales-->
<div id="myModal_Sales" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Persen Sales</h4>
      </div>
      <div class="modal-body">
          <form id="form_persen_Sales">
            <input type="hidden" name="id_admin" id="id_admin_sales" class="form-control" readonly="readonly">
            
            <div class="col-sm-4">Persen</div>
            <div class="col-sm-8">
              <input type="text" name="persen_sales" id="persen_sales" required="required" class="form-control decimal" placeholder="Persen">
            <small>Masukkan hanya nomor. Tidak ikut %.</small>
            </div>

            <div style="clear: both;"></div><br>
            <div id="t4_info_form_sales"></div>
            <button type="submit" class="btn btn-primary"> Simpan </button>
          </form>
            

          <div style="clear: both;"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<script>
$('.datepicker').datepicker({
  autoclose: true,
  format: 'yyyy-mm-dd' 
})


hanya_nomor(".nomor");

$('.decimal').keyup(function(){
    var val = $(this).val();
    if(isNaN(val)){
         val = val.replace(/[^0-9\.]/g,'');
         if(val.split('.').length>2) 
             val =val.replace(/\.+$/,"");
    }
    $(this).val(val); 
});

$(document).ready(function(){

  $('#tbl_newsnya').dataTable();

});

/******** sales ********/
function persen_sales(id_admin)
{
   $.get("<?php echo base_url()?>index.php/admin/data_admin_by_id/"+id_admin,function(e){
    //alert(e[0].persen_sales);
    $("#persen_sales").val(e[0].persen_sales);
    $("#id_admin_sales").val(e[0].id_admin);
   })
  $("#myModal_Sales").modal('show');
}


$("#form_persen_Sales").on("submit",function(){
  $("#t4_info_form_sales").html('Loading...');
  
  var ser = $(this).serialize();

  $.post("<?php echo base_url()?>index.php/admin/simpan_persen_sales",ser,function(x){
    console.log(x);
    $("#t4_info_form_sales").html('Berhasil...');
  })

  return false;
})
/********** sales *********/


function edit_admin(id_admin)
{
  $.get("<?php echo base_url()?>index.php/admin/data_admin_by_id/"+id_admin,function(e){
    //console.log(e[0].id_desa);
    $("#id_admin").val(e[0].id_admin);
    $("#id_cabang").val(e[0].id_cabang);
    $("#nama_admin").val(e[0].nama_admin);
    $("#user_admin").val(e[0].user_admin);
    $("#email_admin").val(e[0].email_admin);
    $("#pass_admin").val(e[0].pass_admin);
    $("#conf_pass_admin").val(e[0].pass_admin);
    $("#telp_admin").val(e[0].telp_admin);

    $("#level").val(e[0].level);
    $("#tempat_lahir").val(e[0].tempat_lahir);
    $("#tgl_lahir").val(e[0].tgl_lahir);
    $("#kelamin").val(e[0].kelamin);
    $("#pendidikan").val(e[0].pendidikan);
    $("#jabatan").val(e[0].jabatan);
    $("#npwp").val(e[0].npwp);



  })
  $("#myModal").modal('show');
}

function tambah_admin()
{
  $("#id_admin").val('');
  $("#nama_admin").val('');
  $("#user_admin").val('');
  $("#email_admin").val('');
  $("#pass_admin").val('');
  $("#conf_pass_admin").val('');
  $("#telp_admin").val('');


  
  $("#myModal").modal('show');
}

function hapus_admin(id_admin)
{
  if(confirm("Anda yakin menghapus?"))
  {
    $.get("<?php echo base_url()?>index.php/admin/hapus_admin_by_id/"+id_admin,function(e){
      eksekusi_controller('<?php echo base_url()?>index.php/admin/data_admin');
    })  
  }
  
}

$("#form_tambah_admin").on("submit",function(){
  $("#t4_info_form").html('Loading...');
  if($("#pass_admin").val() != $("#conf_pass_admin").val())
  {
    
    $("#t4_info_form").html("<div class='alert alert-warning'>Password dan Confirm Password tidak sama.</div>").fadeIn().delay(3000).fadeOut();
    return false;
  }

  var ser = $(this).serialize();

  $.post("<?php echo base_url()?>index.php/admin/simpan_form",ser,function(x){
    console.log(x);
    if(x==0)
    {
      $("#t4_info_form").html("<div class='alert alert-warning'>Email atau Username sudah digunakan.</div>").fadeIn().delay(3000).fadeOut();
    }else if(x=='1')
    {
      $("#t4_info_form").html("<div class='alert alert-success'>Berhasil.</div>").fadeIn().delay(3000).fadeOut();

      setTimeout(function(){
        $("#myModal").modal('hide');
      },3000);
    }
  })

  return false;
})


$("#myModal").on("hidden.bs.modal", function () {
  eksekusi_controller('<?php echo base_url()?>index.php/admin/data_admin','Data admin');
});
</script>
