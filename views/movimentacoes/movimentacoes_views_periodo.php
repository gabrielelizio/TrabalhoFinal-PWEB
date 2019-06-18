<?php  

  session_start();
  include '../../conexao/conexao.php';
  include '../../conexao/verifica_sessao.php';

   $data_pg = $_POST['data_pagamento']; 
   $data_vc = $_POST['data_vencimento'];

  
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
      <a href="home.php" class="ls-ico-earth">
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
           <li> <a href="dashboard.php" class="ls-ico-dashboard" title="Dashboard"> Dashboard </a> </li>
           <li><a href="movimentacoes.php" class="ls-ico-hours" title="Clientes">Movimentações</a></li>
           <li><a href="../relatorios/relatorios.php" class="ls-ico-stats" title="Relatórios da revenda">Relatórios</a></li>
           <li>
            <a href="#" class="ls-ico-cog" title="Configurações">Configurações</a>
            <ul>
            <li><a href="../TrabalhoFinal/user/usuarios.php">Usuarios</a></li>
              <li><a href="../TrabalhoFinal/views/categorias/categorias.php">Categorias</a></li>
              <li><a href="../TrabalhoFinal/views/formapagamento/forma_pagamento.php">Formas de pagamento</a></li>


            </ul>
          </li>
        </ul>
      </nav>
  </div>
</aside>


    <main class="ls-main ">
      <div class="container-fluid">
        <h1 align="center" class="ls-title-intro ls-ico-hours"> Movimentações </h1>

           <div class="ls-box-filter">

          <form action="movimentacoes_views_periodo.php" method="post" class="ls-form ls-form-inline">
            <label class="ls-label col-md-2 col-sm-2">
              <b class="ls-label-text ls-text-md ls-color-info">Período</b>
              <input type="date" name="data_pagamento" autocomplete="off">
            </label>

            <label class="ls-label col-md-2 col-sm-1">
              <b class="ls-label-text ls-text-md">a</b>
              <input type="date" name="data_vencimento" autocomplete="off">
            </label>

            <div class="ls-actions-btn">
              <input class="ls-btn" type="submit" name="Filtrar" value="Filtrar">
            </div>

            <a href="#" id="situacao" class="ls-btn" data-ls-module="modal" data-target="#filtroSituacao"> <b class="ls-color-success"> Filtrar por Situação </b> </a>
            <style type="text/css"> #situacao{ position: absolute; right: 450px; width: 200px; } </style>

                <a href="#" id="info" class="ls-btn-dark " data-ls-module="popover" data-title="Titulo do popover 1" data-content="<p>Conteúdo do popover 1 Conteúdo do popover 1 Conteúdo do popover 1 Conteúdo do popover 1 Conteúdo do popover 1 </p>" data-placement="bottom">
                Informações
              </a>
               <style type="text/css"> #info{ position: absolute; right: 240px; width: 190px; } </style>

                <a id="nova_movimentacao" class="ls-btn-primary-danger " href="novaMovimentacao.php"> adc Nova Movimentação</a>
                <style type="text/css"> #nova_movimentacao{ position: absolute; right: 40px; } </style>
          </form><br>



  <form action="movimentacoes_views_categoria.php" method="post" class="ls-form ls-form-inline ">
    <label class="ls-label  col-md-4 col-sm-4">
      <b class="ls-label-text ls-color-info">Filtrar por Categoria</b>
      <div class="ls-custom-select">
        <select name="categoria" class="ls-select">
          <?php  

            $sql = "SELECT * FROM categoria";
            $categoria = Mysqli_query($conexao, $sql);

            while ($row = mysqli_fetch_array($categoria)){
            echo '<option value="'.$row['DESC_CATEGORIA'].'">'.$row['DESC_CATEGORIA'].'</option>';
         }
          ?>
        </select>
      </div>
    </label>
    <input type="submit" value="Filtrar" class="ls-btn" title="Filtrar">

      <a href="#" id="tipo" class="ls-btn" data-ls-module="modal" data-target="#filtroTipo"> <b class="ls-color-success"> Filtrar por Tipo </b> </a>
            <style type="text/css"> #tipo{ position: absolute; right: 450px; width: 200px; } </style>          
  </form>

<a id="recarregar" href="../../views/relatorios/relatorios.php" title="Recarregar" class="ls-btn ls-ico-spinner ls-float-right">
            </a>

            

  <form id="label" name="busca" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?a=buscar" class="ls-form ls-form-inline ">
                <label  class="ls-label col-md-9" role="search">
                  <b class="ls-label-text ls-hidden-accessible">Descrição</b>
                  <input type="text" id="palavra" name="palavra" aria-label="Faça sua busca por descrição" placeholder="Descrição" required="" autocomplete="off" class="ls-field ">
                </label>
                <div class="ls-actions-btn">
                  <input type="submit" value="Buscar" class="ls-btn" title="Buscar">
                </div>
                <style type="text/css"> #label{position: absolute; right: 90px;} </style>
              </form>
 </div>

 <?php 

 // Verificamos se a ação é de busca
 @ $a = $_GET['buscar'];

 @ $palavra = ($_POST['palavra']);

  ?>


<!-- Modal dos botes de filtro -->

<!-- Modal do filtro situacao -->
    <div class="ls-modal" id="filtroSituacao">
  <form action="movimentacoes_views_situacao.php" class="ls-form" method="post">
    <div class="ls-modal-small">
      <div class="ls-modal-header">
        <button data-dismiss="modal">×</button>
        <h4 style="color: #FF7F00;"  class="ls-modal-title"> Filtar por Situação </h4>
      </div>
      <div class="ls-modal-body">

       
    <label class="ls-label  col-md-8 col-sm-4">
      <b class="ls-label-text ls-color-info">Filtrar por Situação</b><br>
      <div class="ls-custom-select">
        <select name="filtroSituacao" class="ls-select">
          <option>Pago</option>
          <option>Pendente</option>
          </select>
      </div>
    </label>
  </form>     
      </div>
      <div class="ls-modal-footer">
        <button type="submit" class="ls-btn-primary"> Filtrar </button>
        <a href="#" class="ls-btn ls-float-right" data-dismiss="modal">Cancelar</a>
      </div>
    </div>
  </form>
</div>


<!-- Modal do filtro tipo -->
<div class="ls-modal" id="filtroTipo">
  <form action="movimentacoes_views_tipo.php" class="ls-form" method="post">
    <div class="ls-modal-small">
      <div class="ls-modal-header">
        <button data-dismiss="modal">×</button>
        <h4 style="color: #FF7F00;"  class="ls-modal-title"> Filtar por Tipo </h4>
      </div>
      <div class="ls-modal-body">

       
    <label class="ls-label  col-md-8 col-sm-4">
      <b class="ls-label-text ls-color-info">Filtrar por Tipo</b><br>
      <div class="ls-custom-select">
        <select name="filtroTipo" class="ls-select">
          <option> Crédito </option>
          <option> Débito </option>
          </select>
      </div>
    </label>
  </form>     
      </div>
      <div class="ls-modal-footer">
        <button type="submit" class="ls-btn-primary"> Filtrar </button>
        <a href="#" class="ls-btn ls-float-right" data-dismiss="modal">Cancelar</a>
      </div>
    </div>
  </form>
</div>



<div data-ls-module="dropdown" class="ls-dropdown">
                      <a href="#" class="ls-btn-primary ">2019</a>
                      <ul class="ls-dropdown-nav">
                        <li><a href="#">Janeiro</a></li>
                        <li><a href="#">Fevereiro</a></li>
                        <li><a href="#">Março</a></li>
                        <li><a href="#">Abril</a></li>
                        <li><a href="#">Maio</a></li>
                        <li><a href="#">Junho</a></li>
                        <li><a href="#">Julho</a></li>
                        <li><a href="#">Agosto</a></li>
                        <li><a href="#">Setembro</a></li>
                        <li><a href="#">Outubro</a></li>
                        <li><a href="#">Novembro</a></li>
                        <li><a href="#">Dezembro</a></li>
                      </ul>
                    </div>
                    <div data-ls-module="dropdown" class="ls-dropdown">
                      <a href="#" class="ls-btn-primary">2020</a>
                      <ul class="ls-dropdown-nav">
                        <li><a href="#">Janeiro</a></li>
                        <li><a href="#">Fevereiro</a></li>
                        <li><a href="#">Março</a></li>
                        <li><a href="#">Abril</a></li>
                        <li><a href="#">Maio</a></li>
                        <li><a href="#">Junho</a></li>
                        <li><a href="#">Julho</a></li>
                        <li><a href="#">Agosto</a></li>
                        <li><a href="#">Setembro</a></li>
                        <li><a href="#">Outubro</a></li>
                        <li><a href="#">Novembro</a></li>
                        <li><a href="#">Dezembro</a></li>
                      </ul>
                    </div>
                    <div data-ls-module="dropdown" class="ls-dropdown">
                      <a href="#" class="ls-btn-primary">2021</a>
                      <ul class="ls-dropdown-nav">
                        <li><a href="#">Janeiro</a></li>
                        <li><a href="#">Fevereiro</a></li>
                        <li><a href="#">Março</a></li>
                        <li><a href="#">Abril</a></li>
                        <li><a href="#">Maio</a></li>
                        <li><a href="#">Junho</a></li>
                        <li><a href="#">Julho</a></li>
                        <li><a href="#">Agosto</a></li>
                        <li><a href="#">Setembro</a></li>
                        <li><a href="#">Outubro</a></li>
                        <li><a href="#">Novembro</a></li>
                        <li><a href="#">Dezembro</a></li>
                      </ul>
                    </div>

                    <div data-ls-module="dropdown" class="ls-dropdown">
                      <a href="#" class="ls-btn-primary">2022</a>
                      <ul class="ls-dropdown-nav">
                        <li><a href="#">Janeiro</a></li>
                        <li><a href="#">Fevereiro</a></li>
                        <li><a href="#">Março</a></li>
                        <li><a href="#">Abril</a></li>
                        <li><a href="#">Maio</a></li>
                        <li><a href="#">Junho</a></li>
                        <li><a href="#">Julho</a></li>
                        <li><a href="#">Agosto</a></li>
                        <li><a href="#">Setembro</a></li>
                        <li><a href="#">Outubro</a></li>
                        <li><a href="#">Novembro</a></li>
                        <li><a href="#">Dezembro</a></li>
                      </ul>
                    </div>

<!-- ########################################################################################################## -->
        <?php if(isset($_GET['sucesso1'])){ ?>    <!-- sucesso ao alterar dados de perfil-->
                  <br>
                    <div class="ls-alert-success ls-dismissable "> 
                  <span data-ls-module="dismiss" class="ls-dismiss">&times;</span>
                 Dados alterados com sucesso. </div>   
            <?php } ?>

            <?php if(isset($_GET['sucesso2'])){ ?>    <!-- sucesso ao alterar dados de perfil-->
                  <br>
                    <div class="ls-alert-success ls-dismissable "> 
                  <span data-ls-module="dismiss" class="ls-dismiss">&times;</span>
                 Registro excluído com sucesso. </div>   
            <?php } ?>

        <div>       
                  <table class="ls-table ls-bg-header ls-table-striped ls-table-bordered">
                  <thead>
                    <tr>
                      <th class="ls-txt-center">Descrição </th>
                      <th class="ls-txt-center" >Valor</th>
                      <th class="ls-txt-center">Categoria</th>
                      <th class="ls-txt-center">Data Pagamento</th>
                      <th class="ls-txt-center"> Data Vencimento</th>
                      <th class="ls-txt-center"> Forma Pagamento</th>
                      <th class="ls-txt-center"> Tipo</th>
                      <th class="ls-txt-center"> Situação</th>
                      <th class="ls-txt-center">Opções</th>
                    </tr>
                  </thead>
                  <tbody>
                  
              <?php 

                $data_pg = $_POST['data_pagamento']; 
                $data_vc = $_POST['data_vencimento'];

                $query = "SELECT * FROM movimentacoes WHERE DATA_PAGAMENTO BETWEEN ('$data_pg') AND ('$data_vc') AND 
                DESCRICAO LIKE '%".$palavra."%' ORDER By idFINANCAS DESC";
                $resultado = Mysqli_query($conexao, $query);

                while ($linha = mysqli_fetch_array($resultado))
                {
                  $data_pagamento = $linha['DATA_PAGAMENTO'];
                  $data_vencimento = $linha['DATA_VENCIMENTO'];

                  @ $data1 = date("d-m-Y", strtotime($data_pagamento));
                  @ $data2 = date("d-m-Y", strtotime($data_vencimento));


                  ?>
                  <tr><td class="ls-txt-center"> <?php echo $linha['DESCRICAO'];?></td>
                  <td class="ls-txt-center" > R$ <?php echo $linha['VALOR'];?></td>
                  <td class="ls-txt-center"><?php echo $linha['CATEGORIA'];?></td> </span> 
                  <td class="ls-txt-center"> <?php echo "$data1"; ?></td>
                  <td class="ls-txt-center"> <?php echo "$data2"; ?></td>
                  <td class="ls-txt-center"><?php echo $linha['FORMA_PAGAMENTO'];?></td>
                  <td class="ls-txt-center"><?php echo $linha['TIPO'];?></td>
                  <td class="ls-txt-center"> <?php echo $linha['SITUACAO'];?></td> 

                    <td class="ls-txt-center"> 

                      <a href="alterar_movimentacao.php?editar=<?php echo($linha['idFINANCAS'])?>" class="ls-tooltip-bottom" aria-label="Editar"><i class="ls-ico-edit-admin ls-text-xl"> </i> </a> &nbsp; &nbsp; 

                       <a href="" data-ls-module="modal" class="ls-tooltip-bottom" aria-label="Excluir" data-action="movimentacoes_opcoes.php?excluir=<?php echo($linha['idFINANCAS']) ?>" data-content="<h2> Deseja mesmo excluir está informação ? </h2> <br><p> Aviso , está ação não pode ser revertida , ao clicar em aceitar os dados serão apagados permanentemente da sua base de dados. </p>" data-title="Excluir" data-class="ls-btn-danger" data-save="Sim" data-close="Fechar"> <i class="ls-ico-remove ls-text-xl"></i></a></td> 
                        
                        
                    </td></tr>
                  
              <?php

                }

              ?>

       </tbody>            
    </main>


      

    <!-- We recommended use jQuery 1.10 or up -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="http://assets.locaweb.com.br/locastyle/3.10.1/javascripts/locastyle.js" type="text/javascript"></script>
  </body>
</html>