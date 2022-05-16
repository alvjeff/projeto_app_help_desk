<?php
      //   session_start();
      //   if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM'){
      //     header('Location: index.php?login=erro2');
      // }
      //   echo $_SESSION['autenticado'];

      require_once "validador_acesso.php";

      //print_r($_SESSION);
      $chamados = array();//obs2


      //abrir o arquivo para leitura
      $arquivo = fopen('../../projeto_app_help_desk/arquivo.txt', 'r');

      //enquanto houverem linhas a serem recuperadas.
      while(!feof($arquivo)){  //obs1
        $registro = fgets($arquivo);  //obs3
        $chamados[] = $registro;
      }

      
      //fechar arquivo aberto
      fclose($arquivo);
       

      // echo '<pre>';
      // print_r($chamados);
      // echo '</pre>';


      /**obs1 - esse feof() funciona como um ponteiro que sai de linha em linha do arquivo ate encontrar o final. Retorna true quando acha o final do arquivo */

      /**obs2 - array criada para armazenar os chamados feitos, as linhas do 'arquivo.txt' */

      /**obs3 - vou me aprofundar melhor, mas ate onde entendi, fgets() faz leitura linha a linha, ele recupera, ou aponta, faz um get, linha a linha do $arquivo. Na linha imediatamente abaixo sera colocado no array $chamados[]. Cada linha dentro deste laco de repeticao sera acresentada a um indice do array. */
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="./img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            App Help Desk
        </a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="logoff.php" class="nav-link">SAIR</a>
            </li>
        </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">

              <!--codigo acresentado depois - obs1-->
              <?php
                foreach($chamados as $chamado){
              ?>
                <?php
                  $chamado_dados = explode('#', $chamado);//<!--obs2-->

                  if($_SESSION['perfil_id'] == 2){
                  //so vamos exibir o chamado se ele foi criado pelo usuario
                  //assim os adm vao poder ver todos os chamados
                    if($_SESSION['id'] != $chamado_dados[0]){//<obs4>
                      continue;  
                    }
                  }

                  if(count($chamado_dados) < 3){
                    continue; //<!--obs3 -->
                  }
                  // echo '<pre>';
                  // print_r($chamado_dados);
                  // echo '</pre>';

                ?>
                
                
                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?= $chamado_dados[1] ?></h5> <!--obs1 -->

                    <h6 class="card-subtitle mb-2 text-muted"><?= $chamado_dados[2] ?></h6>
                    <p class="card-text"><?= $chamado_dados[3] ?></p>

                  </div>
                </div>

              <?php } ?>
              

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
</body>
</html>

<!--obs1 - atentar que o php esta dentro do codigo html, entender bem como manipular isso. Ressalto novamente, entenda isso DIREITO!-->

<!--obs2 - esse explode() eh funcao nativa do php para lidar com array, coisa que ja vi la atras. Comecamos com um arquivo que explodiu na array $chamados, que cada indice contem uma linha do arquivo. Agora explode cada linha na array $chamado_dados, em que cada indice contem uma parte da linha que foi justamente separada pela # que usamos anteriormente.-->

<!--DESAFIO: por um campo a mais no formulario, tipo, nome de quem solicitou o servico-->

<!--obs3 - este bloco de if eu nao entendi, rever o video e tentar entender depois, basicamente entender esse 'continue'. Dias depois: Agora acho que entendi-->

<!--obs4 - se o id da sessao nao bater com o id do chamado, se na hora de consultar, o chamado nao foi aberto por aquel id, ele dá um continue, parte para a proxima iteracao do foreach, acho que entendi o continue agora.