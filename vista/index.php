<?php 
include 'partials/head.php';
include 'partials/menu.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start([
        'cookie_samesite' => 'Stric'
    ]);
}
?>
<meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self'; img-src 'self'; style-src 'self'; object-src 'none';">
<div class="container">
    <div class="starter-template">
        <br>
        <br>
        <br>
        <div class="jumbotron">
            <div class="container">
                <h1>Login con phpchito</h1>
                <p>En caso que no nos veamos, buenos dias, tardes y noches</p>
                <p>~The Truman Show</p>
                <p>
                </p>
            </div>
        </div>
    </div>
</div>
<?php include 'partials/footer.php';?>