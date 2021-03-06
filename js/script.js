$(document).ready(function() {

    // Quando o usuário clicar em salvar, serão efetuados todos os passos abaixo

    // Salvar
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

    // Editar
    $('#salvarEdit').click(function() {

        var dados = $('#editUsuario').serialize();

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'editar.php',
            async: true,
            data: dados,
            success: function(response) {
                location.reload();
            }
        });

        return false;

    });

    // Aqui é o script para abrir nosso modal

    $("a[rel=modal]").click(function(event) {
        event.preventDefault();

        var $id = $(this).attr("href");

        var $row = $(this).closest("tr");

        var link = {
            'id': $row.find('td').eq(0).text().trim(),
            'nome': $row.find('td').eq(1).text().trim(),
            'email': $row.find('td').eq(2).text().trim(),
            'senha': $row.find('td').eq(3).text().trim()
        }

        $('input[name=id]').val(link.id);
        $('#nomeEdit').val(link.nome);
        $('#emailEdit').val(link.email);
        $('#senhaEdit').val(link.senha);

        var alturaTela = $(document).height();
        var larguraTela = $(window).width();

        // Colocando fundo preto

        $('#mascara').css({'width': larguraTela, 'height': alturaTela});
        $('#mascara').fadeIn(1000);
        $('#mascara').fadeTo("slow", 0.8);

        var left = ($(window).width() / 2) - ($($id).width() / 2);
        var top = ($(window).height() / 2) - ($($id).height() / 2);

        $($id).css({'top': top, 'left': left});
        $($id).show();

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