<header>
    <div id="header_central">
        <?php 
            if( isset($_SESSION["user_portal"]) ){
                $usuario = $_SESSION["user_portal"];
                $saudacao = "SELECT Nome from funcionario WHERE Usuario = 'admin';";
                
                $saudacao_login = mysqli_query($conecta, $saudacao);
                if(!$saudacao_login){
                    die("Falha na consulta ao banco de dados");
                }else{
                    $saudacao_login = mysqli_fetch_assoc($saudacao_login);
                    $nome = $saudacao_login["Nome"];
                }
        ?>
            <div id ="header_saudacao"><h5 style="color: black">Bem vindo, <?php echo $nome?> - <a href="sair.php">Sair</a></h5></div>
        <?php 
            }
        ?>
    </div>
</header>