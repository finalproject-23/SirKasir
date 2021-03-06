<?php 
session_start();

require 'functions.php';

if ($_SESSION["login"]) {
  if (isset($_SESSION["user"]) && $_SESSION["user"] == "penjual") {
    
   $id_makanan = $_GET["id_makanan"];
   $id_penjual = $_SESSION["id_penjual"];
    
    $penjual = query("SELECT * FROM penjual WHERE id_penjual = '$id_penjual'")[0];
    $makanan = query("SELECT * FROM makanan WHERE id_makanan = '$id_makanan'")[0];
    
    if (isset($_POST["ubah"])) {
      if( ubah($_POST) > 0){
         echo "<script>
               alert('data berhasil diubah');
               window.location.href = 'penjual-makanan.php';
         </script>";
      } else {
         echo "<script>alert('data gagal diubah');</script>";
         echo("Error description: " . mysqli_error($conn));
      }
    }
    

  } else {
    header("Location: login.php");
  }

} else {
  header("Location: login.php");
}

 ?>

<!DOCTYPE html>
<html>

<?php include "assets/html/head-penjual.html"?>

<body>
  <section class="is-fullwidth">

  <?php include "assets/html/nav-penjual.html"?>

  </section>

  <div class="container">

   <div class="columns is-marginless">

    <div class="column is-2">
    <?php include 'assets/html/leftpanel-penjual.php'?>
    </div>
    <div class="column is-10">
    <div class="level">
      <h2 class="title is-2 level-left">Ubah Data Makanan</h2>
    </div>
     <div class="box content is-fullwidth">
      <div class="pesanan">
       <form action="" method="post" enctype="multipart/form-data">
         <ul>
            <input type="text" name="id_makanan" value="<?= $makanan["id_makanan"]?>">
            <input type="text" name="gambarLama" value="<?= $makanan["gambar"]?>">
            <input type="text" name="id_penjual" value="<?= $id_penjual?>">
            <li>
               <label for="gambar">Foto Makanan </label>
               <img src="assets/img/makanan/<?= $makanan["gambar"]?>" alt="" width= 60px>
               <input type="file" name="gambar" id="gambar">
            </li>
            <li>
               <label for="nama">Nama </label>
               <input type="text" name="nama" id="nama" required value="<?= $makanan["nama"]?>">
            </li>
            <li>
               <label for="harga">Harga </label>
               <input type="text" name="harga" id="harga" required value="<?= $makanan["harga"]?>">
            </li>
            <li>
               <label for="stok">Stok </label>
               <input type="number" name="stok" id="stok" required value="<?= $makanan["stok"]?>">
            </li>
            <li>
               <label for="deskripsi">Deskripsi </label>
               <textarea name="deskripsi" id="deskripsi" required> <?= $makanan['deskripsi']?></textarea>
            </li>
            <li>
               <button type="submit" name="ubah">ubah</button>
            </li>
         </ul>
       </form>
      </div>
     </div>

    </div>

   </div>
  </div>
</body>

<script src="assets/js/bulma.js"></script>

</html>