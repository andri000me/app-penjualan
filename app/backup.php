<?php
include("src/backup_tables.php");
include("src/pengaturan.php");

error_reporting(0);
$file = date("Ymd") . '_backup_database_' . time() . '.sql';
backup_tables($host, $user, $pass, $db, $file);
?>
<div class="container">
   <div class="card">
      <div class="card-body  text-center">
         <h1 class="display-4">Backup Database Berhasil !</h1>
         <a href="./asset/backup/<?= $file; ?>" class="btn btn-lg btn-outline-success">
            <i class="fa fa-sm fa-database"></i>&nbsp;Unduh File Database
         </a>
      </div>
   </div>
</div>