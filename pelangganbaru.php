<?php
include "ceklogin.php";
include "header.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <!-- left column -->
            <div class="col-md-6">
               <!-- general form elements -->
               <div class="card card-primary mt-2">
                  <div class="card-header">
                     <h3 class="card-title">Pelanggan Baru</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="pelangganinput.php" method="post">
                     <div class="card-body">
                        <div class="form-group">
                           <label for="nmpel">Nama Pelanggan <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" name="nmpel" placeholder="Isian Ngaranna" required>
                        </div>
                        <div class="form-group">
                           <label for="tglgabung">Tanggal Daftar <span class="text-danger">*</span></label>
                           <input type="date" class="form-control" name="tglgabung" required>
                        </div>
                        <div class="form-group">
                           <label for="ssid">SSID Wifi</label>
                           <input type="text" class="form-control" name="ssid">
                        </div>
                        <div class="form-group">
                           <label for="passwifi">Password Wifi</label>
                           <input type="text" class="form-control" name="passwifi">
                        </div>
                        <div class="form-group">
                           <label for="iprouter">IP Router</label>
                           <input type="text" class="form-control" name="iprouter">
                        </div>
                        <div class="form-group">
                           <label for="userrouter">Username Router</label>
                           <input type="text" class="form-control" name="userrouter">
                        </div>
                        <div class="form-group">
                           <label for="passrouter">Password Router</label>
                           <input type="text" class="form-control" name="passrouter">
                        </div>
                        <div class="form-group">
                           <label for="userpppoe">PPPoE User</label>
                           <input type="text" class="form-control" name="userpppoe">
                        </div>
                        <div class="form-group">
                           <label for="passpppoe">Password PPPoE</label>
                           <input type="text" class="form-control" name="passpppoe">
                        </div>
                        <div class="form-group">
                           <label for="remoteip">Remote IP</label>
                           <input type="text" class="form-control" name="remoteip">
                        </div>
                        <div class="card-footer">
                           <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
            <!-- /.row -->
         </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include "footer.php";
?>