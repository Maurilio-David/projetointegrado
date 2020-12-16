<?php require_once("../conexao/conexao.php"); ?>

<?php
if(isset($_POST["clientes"])){
        $cliente = $_POST["clientes"];
        $equipamento = $_POST["equipamentos"];
        $defeito = $_POST["defeito"];
        $status = $_POST["status"];
        $tecnico = $_POST["tecnico"];
        $valor = $_POST["valor"];
        $date1 = $_POST["data1"];
        $date2 = $_POST["date2"];
        $tOS = $_POST["tOS"];
       //objeto para alterar

     $alterar = "UPDATE servico ";

     $alterar .= "SET ";

     $alterar .= "Nome = '{$cliente}', ";

     $alterar .= "Equipamento = '{$equipamento}', ";

     $alterar .= "Defeito = '{$defeito}', ";

     $alterar .= "Estado = '{$status}', ";

     $alterar .= "Tecnico = '{$tecnico}', ";

     $alterar .= "Data_entrada = '{$date1}' ";
    
    $alterar .= "Data_saida = '{$date2}' ";
    $alterar .= "Valor = '{$valor}' ";

     $alterar .= "WHERE OS = {$tOS} ";

     $operacao_alterar = mysqli_query($conecta, $alterar);
    

     if(!$operacao_alterar) {

         die("Erro na alteracao");

     } else {

         header("location:clientes.php");

     }
}
    
    //consulta a tabela os

        $tr = "SELECT * ";

        $tr .= "FROM servico ";

          if(isset($_GET["codigo"]) ) {

              $id = $_GET["codigo"];

              $tr .= "WHERE OS = {$id} ";

              } else{

               $tr .= "WHERE OS = 1 ";

          }

        $con_os = mysqli_query($conecta,$tr);

          if(!$con_os) {

              die("erro na consulta2");

          }



        $info_OS = mysqli_fetch_assoc($con_os);
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro OS</title>

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
  <form action= "editOS.php" method="post">

    <div class="form-row">
    <div class="form-group col-md-6">
          <label for="clientes">Cliente</label><br>
          <select class="form-control" name="clientes">
                        <option>Selecione o cliente</option>
                        <?php
                            $selectCliente = "SELECT id, Nome ";
                            $selectCliente .= "FROM Cliente ";
                            $lista_clientes = mysqli_query($conecta, $selectCliente);
                            if(!$lista_clientes) {
                                die("Erro no banco");
                            }
                            while($linhaCliente = mysqli_fetch_assoc($lista_clientes)) {
                        ?>
                            <option value="<?php echo $linhaCliente['id'];  ?>">
                                <?php echo utf8_encode($linhaCliente["Nome"]);  ?>
                            </option>
                        <?php
                            }
                        ?>                        
                    </select>
        </div>
        <div class="form-group col-md-6">
          <label for="equipamentos">Equipamento</label>
          <select class="form-control" name="equipamentos">
                        <option>Selecione o equipamento</option>
                        <?php
                            $selectEquipamento = "SELECT id, Nome ";
                            $selectEquipamento .= "FROM equipamento ";
                            $lista_equipamentos = mysqli_query($conecta, $selectEquipamento);
                            if(!$lista_equipamentos) {
                                die("Erro no banco");
                            }
                            while($linhaEquipamento = mysqli_fetch_assoc($lista_equipamentos)) {
                        ?>
                            <option value="<?php echo $linhaEquipamento["id"];  ?>">
                                <?php echo utf8_encode($linhaEquipamento["Nome"]);  ?>
                            </option>
                        <?php
                            }
                        ?>                        
                    </select>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
              <label for="defeito">Defeito</label>
              <input type="text" class="form-control" id="defeito" name="defeito" value="<?php echo utf8_encode($info_OS["Defeito"]) ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="status">Status</label>
              <select class="form-control" id="status" name="status">
                  <option>Pendente</option>
                  <option>Em análise</option>
                  <option>Concluido</option>
                </select>
            </div>
        </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="tecnico">Técnico</label>
                    <select class="form-control" name="tecnico">
                        <option>Selecione o tecnico</option>
                        <?php
                            $selectFunc = "SELECT id, Nome ";
                            $selectFunc .= "FROM funcionario ";
                            $lista_func = mysqli_query($conecta, $selectFunc);
                            if(!$lista_func) {
                                die("Erro no banco");
                            }
                            while($linhaFunc = mysqli_fetch_assoc($lista_func)) {
                        ?>
                            <option value="<?php echo $linhaFunc["id"];  ?>">
                                <?php echo utf8_encode($linhaFunc["Nome"]);  ?>
                            </option>
                        <?php
                            }
                        ?>                        
                    </select>
      </div>
      <div class="form-group col-md-6">
        <label for="valor">Valor</label>
        <input type="text" class="form-control" id="valor" name="valor" value="<?php echo utf8_encode($info_OS["Valor"]) ?>">
      </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
          <label for="data1">Data de Entrada</label>
          <input type="date" class="form-control" id="data1" name="data1" value="<?php echo utf8_encode($info_OS["Data_entrada"]) ?>">
        </div>
        <div class="form-group col-md-6">
          <label for="date2">Data de Saida</label>
          <input type="date" class="form-control" id="date" name="date2" value="<?php echo utf8_encode($info_OS["Data_saida"]) ?>">
            <input type="hidden" name="id" value="<?php echo $info_OS["OS"] ?>">
        </div>
      </div>

    <input type="submit" class="btn btn-primary" value="Cadastrar OS">
  </form>
</div>
    
</body>
</html>