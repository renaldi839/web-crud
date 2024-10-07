<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman DAFTAR </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
<div class="card">
  <div class="card-header text-center">
    HALAMAN DAFTAR
  </div>
<form action="" method="post">
  <div class="card-body">
   <label for="username" class="form-label">Username:</label>
  <div class="input-group">
    <span class="input-group-text" id="basic-addon3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
</svg></span>
    <input type="text" class="form-control" id="username" name="username" required placeholder="Masukan username" aria-describedby="basic-addon3 basic-addon4">
  </div>
    <label for="password" class="form-label">Password:</label>
  <div class="input-group">
    <span class="input-group-text" id="basic-addon3">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
  <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7 7 0 0 0 2.79-.588M5.21 3.088A7 7 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474z"/>
  <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12z"/>
</svg>
</span>
    <input type="password" class="form-control" id="password" name="password" required placeholder="Masukan password" aria-describedby="basic-addon3 basic-addon4">
  </div><br>
<div class="row mb-3">
    <button type="submit" class="btn btn-primary" name="btnDaftar">Daftar</button>
</div>
  <div class="text-center">
    Sudah punya akun, silakan <a href="login.php">Login</a>
  </div>
</div>

  </div>
  </form>
</div> 
    </div>
            </div>
        </div>
       

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
<?php
include 'koneksi.php';
if (isset($_POST['btnDaftar'])){
  $username=$_POST['username'];
  $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
  $query=mysqli_query($konek, "INSERT INTO tb_user VALUES('$username','$password')");
if ( $query) {
  header('location:login.php');
  if ($query) {
    echo "
    <script>
    alert('Daftar user sukses');
    window.location.href='login.php';
    </script>
    ";
  }
}

}

 
?>