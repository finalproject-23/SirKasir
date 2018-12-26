<?php 
session_start();

require 'functions.php';

    if ($_SESSION["login"]) {
        if(isset($_SESSION["user"]) && $_SESSION["user"] == "pembeli"){
            $id_pelanggan = $_SESSION["id_pelanggan"];
            $result = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'");

            $pembeli = mysqli_fetch_assoc($result);

            $penjual = query("SELECT * FROM penjual");
        } else {
            header("Location: login-pembeli.php");
        }

    } else {
        header("Location: login-pembeli.php");
    }

?>


<html lang="en">

<?php include 'assets/html/head-pembeli.php'?>

<body>

    <?php include 'assets/html/nav-pembeli.php'?>

    <div class="container">
        <div class="section">
            <!-- Staff -->
            <div class="row columns is-multiline">
                <?php foreach ($penjual as $p) : ?>
                <div class="column is-one-third">
                    <div class="card" style="border-radius: 0.35rem">
                        <div class="card-image">
                            <figure class="image is-4by3">
                            <img class="foto-toko" src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image" style="border-radius: 1rem; padding: 0.5rem">
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="media">
                            <div class="media-content">
                                <p class="title is-4"><a href="pembeli-makanan.php?id_penjual=<?= $p["id_penjual"]?>"><?= $p["nama"]?></a></p>
                                <p class="subtitle is-6">Stand : <?= $p["no_stand"]?></p>
                            </div>
                            </div>

                            <div class="content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Phasellus nec iaculis mauris. <a>@bulmaio</a>.
                            <a href="#">#css</a> <a href="#">#responsive</a>
                            <br>
                            <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <!-- End Card Staff -->
        </div>
    </div>
    <footer class="footer">
            <div class="container">
                <div class="content has-text-centered">
                    <div class="soc">
                        <a hidden href="#"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </footer>

            <script src="assets/js/bulma.js"></script>


</body>

</html>