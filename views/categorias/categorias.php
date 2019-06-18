<?php  

session_start();
include '../../conexao/conexao.php';
include '../../conexao/verifica_sessao.php';

$query = "SELECT * FROM categoria";
$consulta_categoria = mysqli_query($conexao, $query);


?>


<!DOCTYPE html>
<html class="ls-theme-indigo">
  <head>
    <title>Financeiro</title>

    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="Insira aqui a descrição da página.">
    <link href="http://assets.locaweb.com.br/locastyle/3.10.1/stylesheets/locastyle.css" rel="stylesheet" type="text/css">
    <link rel="icon" sizes="192x192" href="/locawebstyle/assets/images/ico-boilerplate.png">
    <link rel="apple-touch-icon" href="/locawebstyle/assets/images/ico-boilerplate.png">
  </head>
  <body>
    <div class="ls-topbar ">

  <!-- Barra de Notificações -->
  <div class="ls-notification-topbar">

    <!-- Dropdown com detalhes da conta de usuário -->
    <div data-ls-module="dropdown" class="ls-dropdown ls-user-account">
      <a href="#" class="ls-ico-user">
        <img src="#" alt="" />
        <span class="ls-name"> <?php    echo $_SESSION['nome']; ?></span>
      </a>

      <nav class="ls-dropdown-nav ls-user-menu">
        <ul>
          <li><a href="../../user/usuarios.php">Meus dados</a></li>
          <li><a href="../../user/logout.php">Sair</a></li>
         </ul>
      </nav>
    </div>
  </div>

  <span class="ls-show-sidebar ls-ico-menu"></span>

   <a href="javascript:window.history.go(-1)" class="ls-go-next"> <span class="ls-text"> Voltar</span></a>

  <!-- Nome do produto/marca com sidebar -->
    <h1 class="ls-brand-name">
      <a href="../../dashboard.php" class="ls-ico-earth">
        <small>Financeiro</small>
        Prog. WEB
      </a>
    </h1>

  <!-- Nome do produto/marca sem sidebar quando for o pre-painel  -->
</div>


    <aside class="ls-sidebar">

  <div class="ls-sidebar-inner">
      <a href="#"  class="ls-go-prev"><span class="ls-text">Voltar à lista de serviços</span></a>
      <nav class="ls-menu">
        <ul>
           <li> <a href="../../dashboard.php" class="ls-ico-dashboard" title="Dashboard"> Dashboard </a> </li>
           <li><a href="../movimentacoes/movimentacoes.php" class="ls-ico-hours" title="Clientes">Movimentações</a></li>
           <li><a href="../relatorios/relatorios.php" class="ls-ico-stats" title="Relatórios">Relatórios</a></li>
           <li>
            <a href="#" class="ls-ico-cog" title="Configurações">Configurações</a>
            <ul>
              <li><a href="../../user/usuarios.php">Usuarios</a></li>
              <li><a href="../categorias/categorias.php">Categorias</a></li>
              <li><a href="../formapagamento/forma_pagamento.php"> Formas de pagamento</a></li>

            </ul>
          </li>
        </ul>
      </nav>
  </div>
</aside>


    <main class="ls-main ">
      <div class="container-fluid">
        <h1  align="center" class="ls-title-intro ls-ico-multibuckets"> Categorias </h1>
   


   <!-- Adicionar Categoria ############################################################## -->


      <a  class="ls-btn-primary-danger ls-float-right (-xs, -sm)" href="#" data-ls-module="modal" data-target="#insereCategoria"> Adicionar Nova Categoria </a><br><br>

      <?php if(isset($_GET['sucesso1'])){ ?>    <!-- sucesso ao cadastrar dados de perfil-->
                  <br>
                    <div class="ls-alert-success ls-dismissable "> 
                  <span data-ls-module="dismiss" class="ls-dismiss">&times;</span>
                 Dados cadastrados com sucesso. </div>   
            <?php } ?>

            <?php if(isset($_GET['sucesso2'])){ ?>    <!-- sucesso ao alterar dados de perfil-->
                  <br>
                    <div class="ls-alert-success ls-dismissable "> 
                  <span data-ls-module="dismiss" class="ls-dismiss">&times;</span>
                 Dados alterados com sucesso. </div>   
            <?php } ?>

            <?php if(isset($_GET['sucesso3'])){ ?>    <!-- Mensagem de exclusão de dadosl-->
                  <br>
                    <div class="ls-alert-success ls-dismissable "> 
                  <span data-ls-module="dismiss" class="ls-dismiss">&times;</span>
                 Dados removidos com sucesso. </div>   
            <?php } ?>


            <!-- Modal de categoria -->
        <div class="ls-modal" id="insereCategoria">
          <form action="categorias_processar.php?inserir" class="ls-form" method="post">

            <div class="ls-modal-small">
              <div class="ls-modal-header">
                <button data-dismiss="modal">×</button>
                <h4 style="color: #FF7F00;"  class="ls-modal-title"> Adicionar Nova categoria </h4>
              </div>
              <div class="ls-modal-body">

          <label class="ls-label">
            <b class="ls-label-text"> Categoria </b>
            <input type="text" name="desc_categoria" required autocomplete="off" />
          </label>
          <label class="ls-label">
            <b class="ls-label-text"> Descrição </b>
            <input type="text" name="obs_categoria" required autocomplete="off" />
          </label>
      </div>
      <div class="ls-modal-footer">
        <button type="submit" class="ls-btn-primary"> Salvar </button>
        <a href="#" class="ls-btn ls-float-right" data-dismiss="modal">Cancelar</a>
      </div>
    </div>
  </form>
</div>


      <div align="center">
			
			<table class="ls-table ls-bg-header ls-table-striped">
			  <thead>
			    <tr>
			      <th>Categoria</th>
			      <th class="hidden-xs">Descrição</th>
			      <th class="ls-txt-center">Editar</th>
			      <th class="ls-txt-center">Excluir</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php  

			  		while($linha = mysqli_fetch_array($consulta_categoria))   
			  		{
			  			
              echo '<tr><td>'.$linha['DESC_CATEGORIA'].'</td>';
			  			echo '<td>'.$linha['OBS_CATEGORIA'].'</td>';

			  			// aqui esta pegando os campos da tabela categoria e as colocando na tabela da pagina categoria.
			  		?> 

			   		<td class="ls-txt-center"><a href="categorias_processar.php?editar=<?php echo($linha['id_categoria']) ?>"><i class="ls-ico-edit-admin ls-text-xl"> </i> </a> </td> 


			   		  <td class="ls-txt-center"> <a href="" data-ls-module="modal" data-action="categorias_processar.php?excluir=<?php echo($linha['id_categoria']) ?>" data-content="<h2> Deseja mesmo excluir está informação ? </h2> <br><p> Aviso , está ação não pode ser revertida , ao clicar em aceitar os dados serão apagados permanentemente da sua base de dados. </p>" data-title="Excluir" data-class="ls-btn-danger" data-save="Aceitar" data-close="Fechar"> <i class="ls-ico-remove ls-text-xl"></i></a></td> 
          </tr>

			    </tr>

			    	<?php  

			    		}  // essa chave esta fecheando a estrutura while que foi aberta acima no codigo
			    	?>
			  </tbody>
			</table>      	
			</div>
		</div>	

    </main>

    

    <!-- We recommended use jQuery 1.10 or up -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
      <script src="http://assets.locaweb.com.br/locastyle/3.10.1/javascripts/locastyle.js" type="text/javascript"></script>
  </body>
</html>