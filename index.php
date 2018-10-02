<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste com Ajax</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="container">
    
    <div class="form-group py-5">
        <h1>Tabela de Usuários</h1>
    </div>   
    <!-- Tabela para exibição de dados -->
    <a id="titulo" href="#janela1" rel="modal">Novo Usuário</a>
    <div id="table" class="form-group">
        <table class="table table-hover table-bordered">

            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Senha</th>
            </tr>
            <?php foreach($listar_usuario as $usuario) : ?>

                <tr>
                    <td>
                        <a href=""><?= $usuario['ID_USUARIO']; ?></a>
                    </td>
                    <td><?= $usuario['NOME']; ?></td>
                    <td><?= $usuario['EMAIL']; ?></td>
                    <td><?= $usuario['SENHA']; ?></td>
                </tr>

            <?php endforeach; ?>
        </table>

        <!-- Model que será aberto -->

        <div class="window" id="janela1">
            <a href="#" class="fechar">X Fechar</a>
            <h4>Cadastro de Usuário</h4>
            <form id="cadUsuario" action="" method="post">
                <label>Nome:</label><input type="text" name="nome" id="nome" />
                <label>E-mail:</label><input type="mail" name="email" id="email">
                <label>Senha:</label><input type="text" name="senha" id="senha">
                <br/><br/>
                <input type="button" value="Salvar" id="salvar">
            </form>
        </div>
        <div id="mascara"></div>
    </div>

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            // Quando o usuário clicar em salvar, serão efetuados todos os passos abaixo
            $('#salvar').click(function() {
                var dados = $('#cadUsuario').serialize();
                // var dados = new FormData(document.getElementById('cadUsuario'));


                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: 'salvar.php',
                    async: true,
                    data: dados,
                    success: function(response) {
                        location.reload();
                    }
                });

                // fetch('salvar.php', {
                //     method: 'POST',
                //     body: dados
                // })
                // .then(resp => resp.json())
                // .then(resul => location.reload());
                
                return false;
            });

            // Aqui é o script para abrir nosso modal

            $("a[rel=modal]").click(function(event) {
                event.preventDefault();

                var id = $(this).attr("href");

                var alturaTela = $(document).height();
                var larguraTela = $(window).width();

                // Colocando fundo preto

                $('#mascara').css({'width': larguraTela, 'height': alturaTela});
                $('#mascara').fadeIn(1000);
                $('#mascara').fadeTo("slow", 0.8);

                var left = ($(window).width() / 2) - $(id).width() / 2;
                var top = ($(window).height() / 2) - $(id).height() / 2;

                $(id).css({'top': top, 'left': left});
                $(id).show();

                $('#mascara').click(function() {
                    $(this).hide();
                    $('.window').hide();
                });

                $('.fechar').click(function(event) {
                    event.preventDefault();
                    $('#mascara').hide();
                    $('.window').hide();
                });
            })

        });
    </script>

</body>
</html>