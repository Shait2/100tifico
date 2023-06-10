<?php include 'partials/head.php';?>
<?php
if (isset($_SESSION["usuario"])) {
    if ($_SESSION["usuario"]["privilegio"] == 1) {
        header("location:admin.php");
    }
} else {
    header("location:login.php");
}
?>
<?php include 'partials/menu.php';?>
<div class="container">
    <div class="starter-template">
        <br>
        <br>
        <br>
        <div class="jumbotron">
            <div class="container text-center">
                <h1><strong>Bienvenido</strong> <?php echo $_SESSION["usuario"]["nombre"]; ?></h1>
                <p>Panel de control | <span class="label label-info"><?php echo $_SESSION["usuario"]["privilegio"] == 1 ? 'Admin' : 'Cliente'; ?></span></p>
                <p>
                    <a href="cerrar-sesion.php" class="btn btn-primary btn-lg">Cerrar sesión</a>
                </p>
            </div>
        </div>
    </div>
</div>



<!-- Inicio del Carrusel -->
<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" data-interval="3000">
            <img src="img1.jpg" class="d-block w-100" alt="img1">
        </div>
        <div class="carousel-item" data-interval="3000">
            <img src="img2.jpeg" class="d-block w-100" alt="img2">
        </div>
        <div class="carousel-item" data-interval="3000">
            <img src="img3.jpeg" class="d-block w-100" alt="img3">
        </div>
        <div class="carousel-item" data-interval="3000">
            <img src="img4.jpeg" class="d-block w-100" alt="img4">
        </div>
        <div class="carousel-item" data-interval="3000">
            <img src="img5.png" class="d-block w-100" alt="img5">
        </div>
        <div class="carousel-item" data-interval="3000">
            <img src="img6.jpg" class="d-block w-100" alt="img6">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
    </a>
</div>
<!-- Fin del Carrusel -->

<?php include 'partials/footer.php';?>