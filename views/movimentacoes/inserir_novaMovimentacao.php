<?php  
session_start();
include '../../conexao/conexao.php';
include '../../conexao/verifica_sessao.php';

$descricao = $_POST['descricao'];
$valor = $_POST['valor'];
$categoria = $_POST['categoria'];
$data_pagamento =  $_POST['data_pagamento'];
$data_vencimento = explode('-', $_POST['data_vencimento']);
$forma_pagamento = $_POST['forma_pagamento'];
$tipo = $_POST['tipo'];
$situacao = $_POST['situacao'];
$parcela = $_POST['parcela'];
$parcelado= $_POST['parcelado'];
$lancamento = $_POST['lancamento'];
$id = $_SESSION['id_usuario'];
$query = "SELECT * FROM usuario Where COD_Usuario = '$id'";



//Aqui  neste if é para verificar se a parcela for sim ele divigite o valor pela quantidade de parcelas
if($parcela == 'Sim')
{
	$prestacao = $valor/$parcelado;

	$ano1 = $data_vencimento[0];
	$mes1 = $data_vencimento[1];
	$dia1 = $data_vencimento[2];


	for ($i=0; $i <$parcelado ; $i++) { 

		$data1 = "$ano1-$mes1-$dia1";

		$query = "INSERT INTO movimentacoes (DESCRICAO, VALOR, CATEGORIA, DATA_PAGAMENTO, DATA_VENCIMENTO, FORMA_PAGAMENTO,
			TIPO, SITUACAO, PARCELA, PARCELADO, LANCAMENTO,idUSUARIO) VALUES ('$descricao', '$prestacao', '$categoria','$data_pagamento',
			'$data1', '$forma_pagamento', '$tipo', '$situacao', '$parcela', '$parcelado', '$lancamento','$id')";
			mysqli_query($conexao,$query); 

			$data_pagamento = '0000-00-00';
			$situacao = 'Pendente';

			$mes1 = $mes1+1;

			if($mes1 > 12)
			{
				$ano1 = $ano1+1;
				$mes1 = 1;
			}							
}

	
header('location: movimentacoes.php?sucesso');
exit();
}


else{
$query = "INSERT INTO movimentacoes (DESCRICAO, VALOR, CATEGORIA, DATA_PAGAMENTO, DATA_VENCIMENTO, FORMA_PAGAMENTO,
			TIPO, SITUACAO, PARCELA, PARCELADO, LANCAMENTO,idUSUARIO) VALUES ('$descricao', '$valor', '$categoria','$data_pagamento',
			'$data_vencimento', '$forma_pagamento', '$tipo', '$situacao', '$parcela', '$parcelado', '$lancamento','$id')";

mysqli_query($conexao,$query); 



header('location: movimentacoes.php?sucesso');
exit(); 
} 

?>