<?php 

$servidor = "localhost";
$usuario = "root";
$senha = "root";
$db= "financas_gabriel_elizio";


$conexao = mysqli_connect($servidor, $usuario, $senha, $db) or die ('Não foi possível conectar');

