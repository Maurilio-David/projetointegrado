
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

    </tr> 
 <?php } ?>
 </tbody>
      </table>
    </div>