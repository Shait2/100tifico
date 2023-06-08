<?php
include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["txtNombre"]) && isset($_POST["txtEmail"]) && isset($_POST["txtUsuario"]) && isset($_POST["txtPassword"]) && isset($_POST["txtRol"])) {

        $txtNombre     = validar_campo($_POST["txtNombre"]);
        $txtEmail      = validar_campo($_POST["txtEmail"]);
        $txtUsuario    = validar_campo($_POST["txtUsuario"]);
        $txtPassword   = validar_campo($_POST["txtPassword"]);
        $txtRol        = validar_campo($_POST["txtRol"]);

        if ($txtRol === "cliente") {
            $txtPrivilegio = 2; // Cliente
            $txtCodigoSecreto = ""; // Valor vacío para cliente
        } elseif ($txtRol === "administrador") {
            $txtPrivilegio = 1; // Administrador
            $txtCodigoSecreto = validar_campo($_POST["txtCodigoSecreto"]);

            if ($txtCodigoSecreto !== "1") {
                // Valor incorrecto para el código secreto
                echo "Error: Código secreto incorrecto para administrador.";
                exit();
            }
        } else {
            // Valor de rol inválido, puedes manejarlo según tus necesidades
            echo "Error: Rol inválido.";
            exit();
        }

        if (UsuarioControlador::registrar($txtNombre, $txtEmail, $txtUsuario, $txtPassword, $txtPrivilegio)) {
            $usuario             = UsuarioControlador::getUsuario($txtUsuario, $txtPassword);
            $_SESSION["usuario"] = array(
                "id"         => $usuario->getId(),
                "nombre"     => $usuario->getNombre(),
                "usuario"    => $usuario->getUsuario(),
                "email"      => $usuario->getEmail(),
                "privilegio" => $usuario->getPrivilegio(),
            );
            header("location:admin.php");
        } else {
            echo "Error al registrar el usuario.";
        }
    } else {
        echo "Error: Campos incompletos.";
    }
} else {
    header("location:registro.php?error=1");
}

