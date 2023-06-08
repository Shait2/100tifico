<?php 
include 'partials/head.php'; 
include 'partials/menu.php'; 
session_start();
$segundosRestantes = isset($_SESSION["bloqueo"]) ? $_SESSION["bloqueo"] - time() : 0;
$bloqueado = $segundosRestantes > 0;
?>
<div class="container">
    <div class="starter-template">
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form id="loginForm" action="../vista/validarCodigo.php" method="POST" role="form">
                            <legend>Iniciar sesión</legend>

                            <div class="form-group">
                                <label for="usuario">Usuario</label>
                                <input type="text" name="txtUsuario" class="form-control" id="usuario" autofocus required placeholder="usuario">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="txtPassword" class="form-control" required id="password" placeholder="****">
                            </div>

                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="6LdSWxkmAAAAAF5WzIvjfOf7iv2KEOlkhZd9lGnk"></div>
                            </div>

                            <div id="mensaje-intentos" style="color: red;"></div>

                            <button type="submit" class="btn btn-success" id="submit-button">Ingresar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'partials/footer.php'; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
	
	var segundosRestantes = <?php echo $segundosRestantes; ?>;
    if (segundosRestantes > 0) {
        setTimeout(function() {
            $("#usuario").prop("disabled", false);
            $("#password").prop("disabled", false);
            $("#submit-button").prop("disabled", false);
        }, segundosRestantes * 1000);
        $("#mensaje-intentos").text("Por favor, intente nuevamente después de " + segundosRestantes + " segundos.");
    }

$(document).ready(function() {
    $("#loginForm").on("submit", function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: $(this).serialize(),
            success: function(response) {
                if (response.bloqueado) {
                    $("#usuario").prop("disabled", true);
                    $("#password").prop("disabled", true);
                    $("#submit-button").prop("disabled", true);
                    setTimeout(function() {
                        $("#usuario").prop("disabled", false);
                        $("#password").prop("disabled", false);
                        $("#submit-button").prop("disabled", false);
                    }, response.segundosRestantes * 1000);
                    $("#mensaje-intentos").text(response.mensaje);
                } else {
                    if (!response.estado) {
                        var mensaje = response.intentosRestantes > 0 ? "Te resta " + response.intentosRestantes + " intento más. Después de eso, espera 90 segundos." : response.mensaje;
                        $("#mensaje-intentos").text(mensaje);
                    } else {
                        window.location.href = "../vista/admin.php";
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error(textStatus, errorThrown);
            }
        });
    });
});
</script>
