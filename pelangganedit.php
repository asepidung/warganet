<?php
include "ceklogin.php";
include "header.php";
$id = $_GET['id'];
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
                  <form action="pelangganupdate.php" method="post">
                     <?php
                     $sql = "SELECT * FROM pelanggan WHERE idpel = $id";
                     $result = $conn->query($sql);
                     while ($row = $result->fetch_assoc()) { ?>
                        <div class="card-body">
                           <input type="hidden" name="idpel" value="<?= $row['idpel'] ?>">
                           <div class="form-group">
                              <label for="nmpel">Nama Pelanggan <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" name="nmpel" required value="<?= $row['nmpel'] ?>">
                           </div>
                           <div class="form-group">
                              <label for="tglgabung">Tanggal Daftar <span class="text-danger">*</span></label>
                              <input type="date" class="form-control" name="tglgabung" required value="<?= $row['tglgabung'] ?>">
                           </div>
                           <div class="form-group">
                              <label for="ssid">SSID Wifi</label>
                              <input type="text" class="form-control" name="ssid" value="<?= $row['ssid'] ?>">
                           </div>
                           <div class="form-group">
                              <label for="passwifi">Password Wifi</label>
                              <input type="text" class="form-control" name="passwifi" value="<?= $row['passwifi'] ?>">
                           </div>
                           <div class="form-group">
                              <label for="iprouter">IP Router</label>
                              <input type="text" class="form-control" name="iprouter" value="<?= $row['iprouter'] ?>">
                           </div>
                           <div class="form-group">
                              <label for="userrouter">Username Router</label>
                              <input type="text" class="form-control" name="userrouter" value="<?= $row['userrouter'] ?>">
                           </div>
                           <div class="form-group">
                              <label for="passrouter">Password Router</label>
                              <input type="text" class="form-control" name="passrouter" value="<?= $row['passrouter'] ?>">
                           </div>
                           <div class="form-group">
                              <label for="userpppoe">PPPoE User</label>
                              <input type="text" class="form-control" name="userpppoe" value="<?= $row['userpppoe'] ?>">
                           </div>
                           <div class="form-group">
                              <label for="passpppoe">Password PPPoE</label>
                              <input type="text" class="form-control" name="passpppoe" value="<?= $row['passpppoe'] ?>">
                           </div>
                           <div class="form-group">
                              <label for="remoteip">Remote IP</label>
                              <input type="text" class="form-control" name="remoteip" value="<?= $row['remoteip'] ?>">
                           </div>
                           <div class="card-footer">
                              <button type="submit" class="btn btn-primary"><i class="fab fa-telegram-plane"></i> Update</button>
                           </div>
                        <?php } ?>
                  </form>
               </div>
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