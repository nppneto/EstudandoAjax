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
                <th>Nome</th>
                <th>E-mail</th>
                <th>Senha</th>
                <th>Opções</th>
            </tr>
            <?php foreach($listar_usuario as $usuario) : ?>

                <tr>
                    <td>
                        <a href="usuario.php?id=<?php echo $usuario['ID_USUARIO']; ?>">
                            <?php echo $usuario['NOME']; ?>
                        </a>
                    </td>
                    <td><?= $usuario['EMAIL']; ?></td>
                    <td><?= $usuario['SENHA']; ?></td>
                    <td>
                        <a href="#janela2" rel="modal" class="btn btn-primary" type="button">Editar</a>
                    </td>
                </tr>

            <?php endforeach; ?>
        </table>

        <!-- Model que será aberto para cadastro -->

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

        <!-- Model que será aberto para editar -->

        <div class="window" id="janela2">
            <a href="#" class="fechar">X Fechar</a>
            <h4>Editar Usuário</h4>
            <form id="editUsuario" action="" method="post">
                <input type="hidden" name="id" value="<?= $usuario['ID_USUARIO']; ?>">
                <label>Nome:</label><input type="text" name="nome" id="nome" value="<?= $usuario['NOME']; ?>" />
                <label>E-mail:</label><input type="mail" name="email" id="email" value="<?= $usuario['EMAIL']; ?>">
                <label>Senha:</label><input type="text" name="senha" id="senha" value="<?= $usuario['SENHA']; ?>">
                <br/><br/>
                <input type="button" value="Salvar" id="salvar">
            </form>
        </div>

        <div id="mascara"></div>
    </div>

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="js/script.js"></script>

</body>
</html>