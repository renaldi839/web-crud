<!doctype html>
<?php
include 'koneksi.php';
$id = "";
$judul = "";
$pengarang = "";
$penerbit = "";
$kategori = "";
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $query="SELECT * FROM tb_buku WHERE id='$id'";
  $sql=mysqli_query($konek,$query);
  $data=mysqli_fetch_array($sql);
  $judul=$data['judul'];
  $pengarang = $data['pengarang'];
   $penerbit = $data['penerbit'];
    $kategori = $data['kategori'];
     $gambar = $data['gambar'];


}

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>data buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand">Data Buku</a>
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>

<figure class="text-center mt-5">
  <blockquote class="blockquote">
    <p>Data buku yang tersedia</p>
  </blockquote>
  <figcaption class="blockquote-footer">
    <cite title="Source Title">kelola data buku</cite>
  </figcaption>
</figure>
  
<form action="proses.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $id;?>">
  <div class="mb-3 row">
    <label for="judul" class="col-sm-2 col-form-label">judul</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $judul; 
      ?>">
    </div>
  </div>
  
  <div class="mb-3 row">
    <label for="pengarang" class="col-sm-2 col-form-label">pengarang</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="pengarang" name="pengarang" value="<?php echo $pengarang; 
      ?>">
    </div>
  </div>
  
  <div class="mb-3 row">
    <label for="penerbit" class="col-sm-2 col-form-label">penerbit</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?php echo $penerbit; 
      ?>">
    </div>
  </div>
  
  <div class="mb-3 row">
    <label for="kategori" class="col-sm-2 col-form-label">kategori</label>
    <div class="col-sm-10">
    <select name="kategori" id="kategori" class="from-control">
        <option value="Fiksi">Fiksi</option>
        <option value="Non fiksi">Non Fiksi</option>
    </select>
    </div>
     <div class="mb-3 row">
    <label for="gambar" class="col-sm-2 col-form-label">gambar</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" id="gambar" name="gambar">
    </div>
  </div>
  </div>

<div class="mb-3 row">
    <?php  
    if (isset($_GET['edit'])) {
    
        echo "<button type='submit' class='btn btn-primary' name='btnProses' value='edit'>Simpan perubahan</button>";
    } else { 
        echo "<button type='submit'   class='btn btn-primary' name='btnProses' value='tambah'>Tambah data</button>"; 
    }

    ?>

  </div>
  </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>