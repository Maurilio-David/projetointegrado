<?php require_once("../conexao/conexao.php"); ?>
<?php
    //adicionar variável de sessão
    session_start();

    if(isset($_POST["usuario"])){
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        
        $login = "SELECT * FROM funcionario WHERE Usuario = '{$usuario}' and Senha = '{$senha}'";
        
        $acesso = mysqli_query($conecta, $login);
        if (!$acesso) {
            die("Falha na consulta ao banco");
        }
        
        $informacao = mysqli_fetch_assoc($acesso);
        
        if (empty($informacao)) {
            $mensagem = "Usuário ou senha incorreto!";
        } else {
            $_SESSION["user_portal"] = $informacao["id"];
            header("location:homeADM.php");  
        }
    
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="../style/login.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

</head>
<body>
    
     <nav  class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="topoLogin" >
            <h1 class="navbar-brand">Mega Assistência Técnica</h1>
         <!-- <a class="navbar-brand" href="homeADM.php">Mega Assistência Técnica</a> -->
        </div>
        
        
    </nav>
    
    <div class="container login">
         <form action="login.php" method="post">
            
                <label for="login">Login:</label><br>
                <input class="form-control" type="text" id="login" name="usuario"><br>
                <label for="senha">Senha:</label><br>
                <input class="form-control" type="password" id="senha" name="senha">
        
                <input type="submit" class="btn btn-success" value= "Fazer login">

            <?php
                if (isset($mensagem)){
            ?>
                <p><?php echo $mensagem ?></p>
            <?php
                }
            ?>

        </form>
        <a href="autoCadastro.php"><p>Quero me cadastrar</p></a>
    </div>
    
   
</body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>