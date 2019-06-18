<?php
session_start();
//aqui a gente inicia a sessão para depois destruir e mandar ele para pagina index.php
session_destroy();
header('Location: ../../../../TrabalhoFinal/index.html');
exit();
