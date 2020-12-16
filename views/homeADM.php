<?php require_once("../conexao/conexao.php"); ?>

<?php
    //header('Content-type: text/html; charset=iso-8859-1');

    
    // Determinar localidade BR
    setlocale(LC_ALL, 'pt_BR.utf-8');
    session_start();
        if( !isset($_SESSION["user_portal"]) ) {
            header("location:login.php");
        }
    // Consulta ao banco de dados
    $servicos = "SELECT OS, Cliente, Equipamento, Tecnico, Estado ";
    $servicos .= "FROM servico ";
    /*if ( isset($_GET["produto"]) ) {
        $nome_produto = $_GET["produto"];
        $servicos .= "WHERE nomeproduto LIKE '%{$nome_produto}%' ";
        //$buscanome = "SELECT * FROM clientes WHERE clienteID = '{$_SESSION["user_portal"]}'";
        <meta charset="UTF-8">
    }*/
    $resultado = mysqli_query($conecta, $servicos);
    if(!$resultado) {
        die("Falha na consulta ao banco");   
    }

    
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=iso-8859-1″>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="../style/home.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

  </head>
<body>
    
    <div>
    <?php include_once("../incluir/navegacao.php"); ?>
    </div>
    

    <div class="container home">
     

      <div class="container row">
        <h5 class="col-10"> Ordens de Serviços: </h5> 
        <a href="cadastroOS.php" class="btn btn-lg active botOs col-2 " role="button" aria-pressed="true">Nova OS</a>
      </div>

      <table class="table">
        <thead class="thead-primary topotable">
          <tr>
            <th scope="col">OS</th>
            <th scope="col">Cliente</th>
            <th scope="col">Equipamento</th>
            <th scope="col">Técnico</th>
            <th scope="col">Status</th>
              <th scope="col">Ações</th>

          </tr>
        </thead>
        <tbody class="corpotable">
          <?php 
while($dados = mysqli_fetch_array($resultado)){
  $os = $dados['OS'];
  $cliente = $dados['Cliente'];
  $equipamento = $dados['Equipamento'];
  $tecnico = $dados['Tecnico'];
  $status = $dados['Estado'];
    
   
    
    //Busca o cliente
    $clientes = "Select Nome from cliente where id = {$cliente} ";
        $buscacliente = mysqli_query($conecta, $clientes);
    if(!$buscacliente) {
        die("Falha na consulta ao banco");   
    }
    $resultadoCliente = mysqli_fetch_array($buscacliente);
        $nomeCliente = ($resultadoCliente['Nome']);
    
    //busca o equipamento
    $equipamentos = "Select Nome from equipamento where id = {$equipamento} ";
        $buscaequipamento = mysqli_query($conecta, $equipamentos);
    if(!$buscaequipamento) {
        die("Falha na consulta ao banco");   
    }
    $resultadoEquipamento = mysqli_fetch_array($buscaequipamento);
        $nomeEquipamento = ($resultadoEquipamento['Nome']);
    //busca o tecnico
    
    $tecnicos = "Select Nome from funcionario where id = {$tecnico}";
        $buscatecnico = mysqli_query($conecta, $tecnicos);
    if(!$buscatecnico) {
        die("Falha na consulta ao banco");   
    }
    $resultadoTecnico = mysqli_fetch_array($buscatecnico);
        $nomeTecnico = ($resultadoTecnico['Nome']);
    
   ?>
 <tr>
      
      <td><?php echo $os ?></td>
      <td><?php echo utf8_encode($nomeCliente) ?></td>
      <td><?php echo utf8_encode($nomeEquipamento) ?></td>
      <td><?php echo utf8_encode($nomeTecnico) ?></td>
      <td><?php echo utf8_encode($status) ?></td>
        <td><a class="btn btn-warning" href="editOs.php?codigo=<?php echo $os ?>">Editar</a> 
    </tr> 
 <?php } ?>
 </tbody>
      </table>
    </div>
    
</body>
</html>
