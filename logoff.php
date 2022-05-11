<?php
    session_start();

    //var_dump($_SESSION);

    session_destroy();

    //print_r($_SESSION);

    header('Location: index.php');

    /**obs1 - Opcoes para lidar com remocao de variaveis de sessao:
     * -remover indices do array de sesao(um a um):
     *      Utilizar unset() - utiliza-se para remover de qualquer array,   nao somente de variavel de sessao. Remove apenas se os indices existirem.
     * 
     * 
     * -destrir a variavel sessao(remover todos os indices ao mesmo tempo):
     *      session_destroy() - so destroi apos a proxima requisicao, por isso interessante forcar o redirecionamento.
     */
?>