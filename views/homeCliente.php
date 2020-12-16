<?php require_once("../conexao/conexao.php"); ?>

<?php
    //header('Content-type: text/html; charset=iso-8859-1');

    
    // Determinar localidade BR
    setlocale(LC_ALL, 'pt_BR.utf-8');
    session_start();  
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
    
    <nav  class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="topoLogin" >
            <h1 class="navbar-brand">Mega Assistência Técnica</h1>
         <!-- <a class="navbar-brand" href="homeADM.php">Mega Assistência Técnica</a> -->
        </div>
        
        
    </nav>
    
     <div class="container login">
         <form action="homeCliente.php" method="post">
            
                <label for="cpf">CPF:</label><br>
                <input class="form-control" type="text" id="cpf" name="CPF" placeholder="000.000.000-00"><br>
        
                <input type="submit" class="btn btn-success" value= "Consultar CPF">

            <?php
                if (isset($mensagem)){
            ?>
                <p><?php echo $mensagem ?></p>
            <?php
                }
            ?>
        </form>
    </div>
    
    <?php
        // Consulta ao banco de dados
    //Busca o cliente
    if(isset($_POST["CPF"])){
    $ucpf = $_POST["CPF"];

    $cs = "Select id from cliente where cpf = '{$ucpf}' ";
        $bcliente = mysqli_query($conecta, $cs);
    if(!$bcliente) {
        die("Falha na consulta ao banco");   
    }
    $rCliente = mysqli_fetch_array($bcliente);
        $idCliente = ($rCliente['id']);

    $servicos = "SELECT OS, Cliente, Equipamento, Tecnico, Estado ";
    $servicos .= "FROM servico where Cliente = {$idCliente}";
    
        
        
    $resultado = mysqli_query($conecta, $servicos);
    
    if($idCliente) {
        include_once("../incluir/cli.php");   
    }  
        
    if(!$resultado) {
     die("Cpf não encontrado");   
    }
    }
    ?>
    
    <?php 
    
    ?>
    
    
    
</body>
</html>