<?php 
    //Abrir conexão (servidor, login, senha e nome do banco)
    $conecta = mysqli_connect("localhost", "root", "", "pi");

    //Testar conexao
    if ( mysqli_connect_errno()  ) {
        die("Conexao falhou: " . mysqli_connect_errno());
    }
?>
<?php
if(isset($_POST["nome"])){
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $login = $_POST["login"];
        $senha = $_POST["senha"];
        $endereco = $_POST["endereco"];
        $telefone = $_POST["fone"];
        
       $inserir = "INSERT INTO cliente (Nome,CPF,Telefone,Endereco,Usuario,Senha) VALUES (' $nome',' $cpf',' $telefone',' $endereco',' $login',' $senha') "; 
        $operacao_inserir = mysqli_query($conecta, $inserir);
        if(!$operacao_inserir){
            die("Erro na consulta");   
        }else {
            $mensagem = "Inserção ocorreu com sucesso.";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Cliente</title>

    <link rel="stylesheet" href="../style/cadastro.css">

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
    
<div class="container formulario">
  <form action= "autoCadastro.php" method="post">
    <div class="form-row">
      <div class="form-group col-md-7">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome"  name="nome" placeholder="Nome Completo">
      </div>
      <div class="form-group col-md-5">
        <label for="cpf">CPF/CNPJ</label>
        <input type="text" class="form-control" id="cpf"  name="cpf" placeholder="000.000.000-00">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="login">Login</label>
        <input type="text" class="form-control" id="login" name="login" placeholder="Login">
      </div>
      <div class="form-group col-md-6">
        <label for="senha">Senha</label>
        <input type="text" class="form-control" id="senha" name="senha" placeholder="Senha">
      </div>
    </div>
    <div class="form-row">
          <div class="form-group col-md-7">
          <label for="endereco">Endereço</label>
          <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Rua, Av. Trav.">
        </div>
        <div class="form-group col-md-5">
          <label for="fone">Telefone</label>
        <input type="text" class="form-control" id="fone" name="fone" placeholder="Telefone">
        </div>
      </div>
    <input type="submit" class="btn btn-primary" value = "Cadastrar Cliente">
  </form>
</div>
    
</body>
</html>