<?php
    session_start();//obs4
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head> 
<body>
<?php

    
    $_SESSION['x'] = 'oi, estou na sessao';
    //print_r($_SESSION);
    //echo '<hr>';

    // var_dump($_POST);

    // echo '<br>';

    // echo $_POST['email'];
    // echo '<br>';
    // echo $_POST['senha'];

    //variavel que verifica se a atenticacao foi realizada
    $usuario_autenticacao = false;

    //usuarios do sistema
    $usuario_app = array(
        array('email' => 'adm@teste.com.br', 'senha' => '123456'),
        array('email' => 'user@teste.com.br', 'senha' => 'abcd'),
        array('email' => 'jeff@excelente.com', 'senha' => '123')
    ); /*obs1 */

    // echo '<pre>';
    // print_r($usuario_app);
    // echo '</pre>';

    foreach($usuario_app as $user){
        // print_r($user);
        // echo '<hr>';

        // echo 'usuario app: ' . $user['email'] . ' / ' . $user['senha'];
        // echo '<br>';
        // echo 'usuario form: ' . $_POST['email'] . ' / ' . $_POST['senha'];
        
        // echo '<hr>';

        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
            $usuario_autenticacao = true;
        }//obs2

        
    }

    if($usuario_autenticacao){
        echo 'usuario autenticado';
        $_SESSION['autenticado'] = 'SIM';
        header('Location: home.php');//obs6
    }else {
        //echo 'erro na autenticacao do usuario';
        $_SESSION['autenticado'] = 'NAO';
        header('Location: index.php?login=erro');//obs3
    }
    /**obs1 - como nao trabalhamos com banco de dados ainda, neste exercicio, exemplo, vamos trabalhar com uma array estatica, para posteriormente fazer com projetos maiores. */

    /**obs2 - pelo foreach ele passa na array usuario_app, que sao os usuarios cadastrados e compara com os dados vindo da variavel global $_POST. Se em alguns dos casos for verdadeiro, vai considerar o usuario autenticado. */

    /**obs3 -  chegando neste header(), vai deslocar de volta para index.php,como solicitado no codigo. Alem disso vai atribuir login=erro, permitido apos a '?'. Vai tambem aparecer login=erro no endereco do navegador. Este bloco de if serve para restringir os acessos a quem realmente conseguir se autenticar, quem tiver usuario e senha validos.*/

    /**obs4 - os valores armazenados aqui serao acessados por outros scripts. Deve ser colocado no topo */

    /**obs5 - Nao sei se levantei esta observacao. Se nao, farei novamente. A superglobal $_SESSION eh um array com indices associativos, ou seja, seus indices nao sao necessariamente numeros, podem ser strings. */

    /**obs6 - codigo colocado depois, visando forcar o redirecionamento para home.php */
?>
    
</body>
</html>

