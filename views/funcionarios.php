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
    $funcionarios = "SELECT id, Nome, Cargo, Usuario, Senha, Salario, Matricula ";
    $funcionarios .= "FROM funcionario ";
    
    $resultado = mysqli_query($conecta, $funcionarios);
    if(!$resultado) {
        die("Falha na consulta ao banco");   
    }

    
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=iso-8859-1″>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionários</title>

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
        <h5 class="col-10"> Funcionarios: </h5> 
        <a href="cadastroFuncionario.php" class="btn btn-lg active botOs col-2 " role="button" aria-pressed="true">Novo Funcionario</a>
      </div>

      <table class="table tb">
        <thead class="thead-primary topotable">
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">Cargo</th>
            <th scope="col">Usuário</th>
            <th scope="col">Senha</th>
            <th scope="col">Salario</th>
            <th scope="col">Matricula</th>
              <th scope="col">Ações</th>

          </tr>
        </thead>
        <tbody class="corpotable">
          <?php 
while($dados = mysqli_fetch_array($resultado)){
  $nome = $dados['Nome'];
  $cargo = $dados['Cargo'];
  $usuario = $dados['Usuario'];
    $senha = $dados['Senha'];
    $salario = $dados['Salario'];
  $matricula = $dados['Matricula'];
    $id = $dados['id'];
   ?>
 <tr>
      
      <td><?php echo utf8_encode($nome) ?></td>
      <td><?php echo utf8_encode($cargo) ?></td>
      <td><?php echo utf8_encode($usuario) ?></td>
      <td> ****** </td>
      <td><?php echo utf8_encode($salario) ?></td>
     <td><?php echo utf8_encode($matricula) ?></td>
     <td><a class="btn btn-warning" href="editFunc.php?codigo=<?php echo $id ?>">Editar</a> 
    <a class="btn btn-danger" href="excluirFunc.php?codigo=<?php echo $id ?>">Deletar</a> </td>
    </tr> 
 <?php } ?>
 </tbody>
      </table>
    </div>
    
</body>
</html>