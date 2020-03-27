<?php include("src/pengaturan.php"); ?>
<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <title><?= $title ?></title>

   <!-- favicon -->
   <link rel="shortcut icon" href="asset/img/favicon.svg" type="image/x-icon">

   <!-- Bootstrap core CSS -->
   <link href="asset/bootstrap-4.3.1/css/bootstrap.css" rel="stylesheet">

   <!-- fontawesome core CSS -->
   <link href="asset/fontawesome-free-5.11.2/css/all.min.css" rel="stylesheet">

   <!-- Custom styles for this template -->
   <link href="asset/style_login.css" rel="stylesheet">
</head>

<body>
   <form class="form-signin" action="src/cek_login.php" method="POST">
      <div class="text-center mb-4">
         <img class="mb-4" src="asset/img/favicon.svg" alt="" width="120" height="120">
         <h1 class="h3 mb-3 font-weight-normal"><?= $title ?></h1>
      </div>

      <div class="form-label-group">
         <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus>
         <label for="inputEmail">Username</label>
      </div>

      <div class="form-label-group">
         <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
         <label for="inputPassword">Password</label>
      </div>

      <button class="btn btn-lg btn-success btn-block" type="submit">
         <i class="fa fa-unlock-alt"></i> &nbsp; Masuk
      </button>
      <p class="mt-5 mb-3 text-muted text-center">&copy; <?= date('Y') . ' ' . $title ?></p>
   </form>
</body>

</html>