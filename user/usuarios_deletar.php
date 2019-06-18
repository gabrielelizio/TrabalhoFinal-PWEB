<?php 

session_start();
include '../conexao/conexao.php';
include '../conexao/verifica_sessao.php';

$id_usuario = $_SESSION['id_usuario'];


$query = " DELETE FROM usuario WHERE COD_Usuario = '$id_usuario'";
mysqli_query($conexao, $query);			

			header('location: logout.php');

 ?>