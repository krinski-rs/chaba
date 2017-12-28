/**
 * Created by djunior on 26/09/2016.
 */
$(document).ready(function(){
    var $dialog = $('#dialog');
    $('#patrimonio').mask('##0.000', {reverse: true, maxlength: true});

    $('.search-patrimonio').on('click', function(){
        if($('#patrimonio').val() != ""){
            $('#patrimonio').removeClass('error');
            $.post(
                "/vogel/web/produto/configurapatrimonio/buscaPatrimonio/",
                {
                    patrimonio:$('#patrimonio').val()
                },
                function(retorno){
                    $('.patrimonios').empty();
                    if(retorno.length > 0){
                        $.each(retorno, function(i){
                            $('.patrimonios').append('<div class="row">'+
                                '<div><label style="display: inline-block;">Produto:</label><span>'+retorno[i].nameProduto+'</span></div>'+
                                '<div><label style="display: inline-block;">Categoria:</label><span>'+retorno[i].categoria+'</span></div>'+
                                '<div><label style="display: inline-block;">Unidade:</label><span>'+retorno[i].unidade+'</span></div>'+
                                '<div><span class="icon confirmar confirm-edicao" title="Editar patrimônio para desconhecido" data-id="'+retorno[i].idAtributoProdutolote+'"></span></div>'+
                                '</div>');
                        });
                    }else{
                        getMensage($('.patrimonios'), "error", "Nenhum patrimônio encontrado");
                    }
                }, "json"
            );
        }else{
            $('#patrimonio').addClass('error');
        }
    });

    $('.patrimonios').on('click', '.confirm-edicao', function() {
        $.post(
            "/vogel/web/produto/configurapatrimonio/atualizaPatrimonio/",
            {
                atriprodloteCodigoid: $(this).data('id')
            },
            function(data){
                $dialog.dialog({
                    title: 'Atenção',
                    modal: true
                });
                if(!data.error){
                    getMensage($dialog, "sucesso", data.msg);
                    $dialog.dialog({
                        close:function(){
                            window.location.reload();
                        }
                    })

                }else{
                    getMensage($dialog, "error", data.msg);
                }
            },"json"
        ).fail(function(response){
            getMensage($dialog, "error", response.responseText);
        });


    });
});
