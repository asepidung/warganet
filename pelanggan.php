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
            <div class="col-12">
               <div class="card mt-2">
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped table-sm">
                        <thead>
                           <tr>
                              <th>Nama</th>
                              <th>Tgl Gabung</th>
                              <th>SSID Wifi</th>
                              <th>Pass Wifi</th>
                              <th>IP Router</th>
                              <th>User Router</th>
                              <th>Pass Router</th>
                              <th>User PPPoE</th>
                              <th>Pass PPPoE</th>
                              <th>Remote IP</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $sql = "SELECT * FROM pelanggan ORDER BY nmpel";
                           $result = $conn->query($sql);
                           while ($row = $result->fetch_assoc()) { ?>
                              <tr>
                                 <td><?= $row['nmpel']; ?></td>
                                 <td class="text-center"><?= $row['tglgabung']; ?></td>
                                 <td><?= $row['ssid']; ?></td>
                                 <td><?= $row['passwifi']; ?></td>
                                 <td class="text-center"><?= $row['iprouter']; ?></td>
                                 <td><?= $row['userrouter']; ?></td>
                                 <td><?= $row['passrouter']; ?></td>
                                 <td><?= $row['userpppoe']; ?></td>
                                 <td><?= $row['passpppoe']; ?></td>
                                 <td class="text-center"><?= $row['remoteip']; ?></td>
                                 <td class="text-center">
                                    <a href="pelangganedit.php?id=<?= $row['idpel'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                 </td>
                              </tr>
                           <?php } ?>
                        </tbody>
                     </table>
                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- /.card -->
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include "footer.php";
?>