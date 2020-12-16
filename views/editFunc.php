<?php require_once("../conexao/conexao.php"); ?>
<?php
if(isset($_POST["nome"])){
        $nome = utf8_decode($_POST["nome"]);
        $matricula = utf8_decode($_POST["matricula"]);
        $cargo = utf8_decode($_POST["cargo"]);
        $salario = $_POST["salario"];
        $login = $_POST["login"];
        $senha = $_POST["senha"];
        $tid = $_POST["id"];
    
       //objeto para alterar

     $alterar = "UPDATE funcionario ";

     $alterar .= "SET ";

     $alterar .= "Nome = '{$nome}', ";

     $alterar .= "Cargo = '{$cargo}', ";

     $alterar .= "Usuario = '{$login}', ";

     $alterar .= "Senha = '{$senha}', ";

     $alterar .= "Salario = '{$salario}', ";

     $alterar .= "Senha = '{$matricula}' ";

     $alterar .= "WHERE id = {$tid} ";

     $operacao_alterar = mysqli_query($conecta, $alterar);
    

     if(!$operacao_alterar) {

         die("Erro na alteracao");

     } else {

         header("location:funcionarios.php");

     }
}
    
    //consulta a tabela funcionarios

        $tr = "SELECT * ";

        $tr .= "FROM funcionario ";

          if(isset($_GET["codigo"]) ) {

              $id = $_GET["codigo"];

              $tr .= "WHERE id = {$id} ";

              } else{

               $tr .= "WHERE id = 1 ";

          }

        $con_func = mysqli_query($conecta,$tr);

          if(!$con_func) {

              die("erro na consulta");

          }



        $info_func = mysqli_fetch_assoc($con_func);
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Funcionário</title>

    <link rel="stylesheet" href="../style/cadastro.css">

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
    
<div class="container formulario">
  <form action= "editFunc.php" method="post">

    <div class="form-row">
    <div class="form-group col-md-9">
          <label for="nome">Nome</label>
          <input type="text" class="form-control" id="nome" name="nome"  value="<?php echo utf8_encode($info_func["Nome"]) ?>">
        </div>
        <div class="form-group col-md-3">
          <label for="matricula">Matricula</label>
          <input type="text" class="form-control" id="matricula" name="matricula"  value="<?php echo utf8_encode($info_func["Matricula"]) ?>">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
              <label for="cargo" name="cargo">Cargo</label>
              <input type="text" class="form-control" id="cargo" value="<?php echo utf8_encode($info_func["Cargo"]) ?>" name="cargo">
            </div>
            <div class="form-group col-md-6">
              <label for="salario" >Salário</label>
              <input type="text" class="form-control" name="salario" id="salario" value="<?php echo utf8_encode($info_func["Salario"]) ?>">
            </div>
        </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="login">Login</label>
        <input type="text" class="form-control" id="login" name="login" value="<?php echo utf8_encode($info_func["Usuario"]) ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="senha">Senha</label>
        <input type="senha" class="form-control" id="senha" name="senha" value="<?php echo utf8_encode($info_func["Senha"]) ?>">
      </div>
        <input type="hidden" name="id" value="<?php echo $info_func["id"] ?>">
    </div>

    <input type="submit" class="btn btn-success" value="Salvar">
  </form>
</div>
    
</body>
</html>