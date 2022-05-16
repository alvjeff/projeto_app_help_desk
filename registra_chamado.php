<?php
    // echo '<pre>';
    // print_r($_POST);//obs3
    // echo '</pre>';

    session_start(); //obs9

    //utilizando o replace, substituicao de caracteres em array//obs4
    $titulo = str_replace('#', '-', $_POST['titulo']);
    $categoria = str_replace('#', '-', $_POST['categoria']);
    $descricao = str_replace('#', '-', $_POST['descricao']);


    //inplode('#', $_POST) - DESAFIO: refatorar este codigo usando inplode
    $texto = $_SESSION['id'] . '#' . $titulo . '#' .$categoria . '#'. $descricao . PHP_EOL;   //obs8 
    echo $texto;


    //vamos abrir um arquivo de texto, para ler, escrever e fechar, qualquer duvida consultar documentacao
    $arquivo = fopen('../../projeto_app_help_desk/arquivo.txt', 'a');//obs2


    
    //com o arquivo aberto e o texto em maos, vamos por o texto no arquivo
    fwrite($arquivo, $texto);//obs5

    fclose($arquivo);//obs6

    header('Location: abrir_chamado.php');

    /**DESAFIO - por uma mensagem de texto do tipo: 'chamado gravado com sucesso' */

    /**obs1 - IMPORTANTISSIMO: no lado do html, no formulario que enviara os dados para ca, os inputs devem conter 'name, senao a array permanecera vazia apos fazer a requisicao. */

    /**obs2 - a funcao fopen espera dois argumentos. o primeiro eh o nome do arquivo e o segundo o que sera feito com ele. na duvida consultar documentacao do php. O parametro 'a', por exemplo eh usado para abrir um arquivo para escrita. */

    /**obs3 - lembrando que $_POST eh uma variavel super global array que que faz asssocicao com os elementos do form de abrir chamado. Sao associados pelos names dos inputs que indiquei. */

    /**obs4 - replace utilizado pq de alguma maneira usar o '#'  no backend dá problema.*/

    /**obs5 - os parametros de fwrite sao: um arquivo que foi aberto e depos o que sera escrito neste arquivo. */

    /**obs6 - eh necessario seguir esta sequencia: abrir, escrever e fechar. */

    /**obs7 - tive que liberar o acesso de leitura e gravacao nas propriedades da pasta do projeto para ser criado o arquivo.txt */

    /**obs8 - esse PHP_EOL - PHP END OF LINE, indica que apos esse texto, sera pulada uma linha. isso eh importante, devido a ter que gravar mais texto, mais chamados neste arquivo, a separacao de linhas vai diferenciar entre um chamado e outro, senao os chamados ficariam concatenados um do lado do outro na mesma linha, nao sendo possivel distingui-los. */

    /**obs9 - sessao sera iniciada para se recuperar o 'id' do usuario e ser incorporado aqui para que se possa fazer controle de perfis de usuario. Esse id foi colocado depois ao codigo com essa finalidade.*/

?>