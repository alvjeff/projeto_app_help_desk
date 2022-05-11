
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
    .card-login {
        padding: 30px 0 0 0;
        width: 350px;
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
    </nav>

    <div class="container">    
        <div class="row">

            <div class="card-login">
                <div class="card">
                    <div class="card-header">
                    Login
                    </div>
                    <div class="card-body">
                    <form action="valida_login.php" method="post">
                        <div class="form-group">
                        <input name="email" type="email" class="form-control" placeholder="E-mail">
                        </div>
                        <div class="form-group">
                        <input name="senha" type="password" class="form-control" placeholder="Senha">
                        </div>
                        
                        <?php if(isset($_GET['login']) && $_GET['login'] == 'erro'){?>
                            
                            <div class="text-danger">
                                Usuario ou senha invalido(s)
                            </div>

                        <?php } ?><!--obs1-->

                        <?php if(isset($_GET['login']) && $_GET['login'] == 'erro2'){?>
                            
                            <div class="text-danger">
                                Faça o login antes de acessar as paginas protegidas
                            </div>

                        <?php } ?><!--obs1-->

                        <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<!--obs1 - Para inicio de conversa, tag curta nao funcionou neste bloco kkkkk. Com a tag curta a div ficou aparecendo de qualquer jeito, entao tive que usar a tag php full. Este exemplo deixa bem claro que posso usar html dentro de tags php com funcoes em aberto. Este 'isset($_GET['login']' verifica se esse get está setado. Isto ocorre apos a tentativa de entrar na pagina 'valida_login'). Bom perceber que essa div com o aviso de erro aparece no local correto pq foi planejada com o php no local exato. 