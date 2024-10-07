<!doctype html>
<?php
include 'koneksi.php';
// sesion 
session_start();
if (isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}

if(isset($_POST['btnSearch'])){
  $cari=$_POST['cari'];
}else{
  $cari='';
}

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>

  <body>
    <div class="container">
 <nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand">Data buku</a>
    <form class="d-flex ms-auto" method="post" action="">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="cari">
      <button class="btn btn-outline-success" type="submit" name="btnSearch">Search</button>
    </form>
      <ul class="navbar-nav ms-2">
        <li class="navbar-item">
            <a class="nav-link active" aria-current="page" href="logout.php">logout</a>
        </li>
      </ul>
  </div>
</nav>

<figure class="text-center mt-5">
  <blockquote class="blockquote">
    <p>Data buku yang tersedia</p>
  </blockquote>
  <figcaption class="blockquote-footer">
    <cite title="Source Title">CRUD : Create, Read, Update dan Delete</cite>
  </figcaption>
</figure>
<a href="olah.php" type="button" class="btn btn-primary mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
</svg> tambah</a> 

<table class="table table-hover table-bordered align-middle">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">judul buku</th>
      <th scope="col">pengarang </th>
      <th scope="col">penerbit</th>
      <th scope="col">kategori</th>
      <th scope="col">gambar</th>
      <th scope="col">aksi</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php
$query = "SELECT * FROM tb_buku WHERE judul LIKE '%$cari%'";
$sql = mysqli_query($konek, $query);
    $no=1;
      while ($data = mysqli_fetch_array($sql)){
       ?>
    <tr>
      <th scope="row"><?php echo $no; ?></th>
      <td><?php echo $data['judul'];?></td>
      <td><?php echo $data['pengarang'];?></td>
      <td><?php echo $data['penerbit'];?></td>
      <td><?php echo $data['kategori'];?></td>
      <td><img src="gambar/<?php echo $data['gambar'];?>" alt="gambar" style="width:100px;"></td>
      <td><a href="olah.php?edit=<?php echo $data['id'];?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg></a>
<a href="proses.php?hapus=<?php echo $data['id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
</svg></a>
</td>
    </tr>
       <?php
       $no++;
}
?>
  </tbody>
</table>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>