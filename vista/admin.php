<?php
include 'partials/head.php';
if (isset($_SESSION["usuario"])) {
	if ($_SESSION["usuario"]["privilegio"] == 2) {
		header("location:usuario.php");
	}
} else {
	header("location:login.php");
}
?>

<?php include 'partials/menu.php'; ?>
<div class="container">
	<div class="starter-template">
		<br>
		<br>
		<br>
		<div class="jumbotron">
			<div class="container text-center">
				<!-- Reloj -->
				<div id="clock" style="float: left;"></div>

				<!-- Calendario -->
				<div id="calendar" style="float: right;"></div>

				<h1><strong>Bienvenido</strong> <?php echo $_SESSION["usuario"]["nombre"]; ?></h1>
				<p>Panel de control | <span class="label label-info"><?php echo $_SESSION["usuario"]["privilegio"] == 1 ? 'Admin' : 'Cliente'; ?></span></p>
				<p>
					<a href="cerrar-sesion.php" class="btn btn-primary btn-lg">Cerrar sesión</a>
				</p>
			</div>
		</div>
	</div>
</div>



 <!-- Imagen -->
 <img src="admin.gif" alt="admin.gif">

<script>
	// Código JavaScript para mostrar la hora actual
	function showTime() {
		var date = new Date();
		var h = date.getHours();
		var m = date.getMinutes();
		var s = date.getSeconds();

		h = (h < 10) ? "0" + h : h;
		m = (m < 10) ? "0" + m : m;
		s = (s < 10) ? "0" + s : s;

		var time = h + ":" + m + ":" + s;
		document.getElementById("clock").innerText = time;
		document.getElementById("clock").textContent = time;

		setTimeout(showTime, 1000);
	}

	showTime();

	// Código JavaScript para mostrar la fecha actual
	function showDate() {
		var date = new Date();
		var day = date.getDate();
		var month = date.getMonth() + 1;
		var year = date.getFullYear();

		day = (day < 10) ? "0" + day : day;
		month = (month < 10) ? "0" + month : month;

		var calendar = day + "/" + month + "/" + year;
		document.getElementById("calendar").innerText = calendar;
		document.getElementById("calendar").textContent = calendar;
	}

	showDate();
</script>

<?php include 'partials/footer.php'; ?>
