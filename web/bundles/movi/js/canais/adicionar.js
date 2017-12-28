/**
 * Created by djunior on 09/08/2016.
 */
$(document).ready(function(){
    var $dialog = $("#dialog"), $form = $("#form-adicionar-canal");

    $form.validate({
        ignore: "",
        onkeydown: false,
        onkeyup: false,
        onfocusin: false,
        onfocusout: false,
        onchange: false,
        onclick: false,
        showErrors: function(errorMap, errorList){
            $("input, select").removeClass('error');
            var mensagem = "";
            $.each(errorList, function(index, element){
                $(element.element).addClass('error');
            });
            $("input.error:first, select.error:first").focus();
            return false;
        }
    });

    $("#cnpj-canal").on("change", function(){
        var $this = $(this);
        if($this.val() != ""){
            $dialog.dialog({
                title: "Aguarde..",
                modal: true,
                width: 300,
                position: {
                    my: "center top+50",
                    at: "center top",
                    of: window
                }
            });
            loading($dialog);
            $.post(
                "/vogel/web/movi/canais/buscaCadUser/",
                {
                    'cnpj-canal': $this.val()
                },
                function(data){
                    if(!data.error){
                        if(!$.isEmptyObject(data.dados)){
                            $this.removeClass('error');
                            $dialog.dialog('destroy');
                            $("#razao-canal").val(data.dados.razaoSocial);
                            $("#fantasia-canal").val(data.dados.nomeFantasia);
                            $("#logradouro-canal").val(data.dados.nomeAdmLogradouro + " " + data.dados.endereco);
                            $("#bairro-canal").val(data.dados.bairro);
                            $("#cidade-canal").val(data.dados.nomeAdmCidades);
                            $("#estado-canal").val(data.dados.siglaAdmUf);
                            $("#numero-canal").val(data.dados.numero);
                            $("#cad-user").val(data.dados.id);
                        }else{
                            $dialog.dialog({ 'title': "Atenção!" }).empty();
                            getMensage($dialog, "error", "CNPJ não encontrado. <a href='/sistech/sistech3.0_md_cadastro/cadastra_users.php' target='_blank'>Clique aqui</a> para realizar o cadastro");
                            $this.addClass('error');
                            $("#razao-canal").val('');
                            $("#fantasia-canal").val('');
                            $("#logradouro-canal").val('');
                            $("#bairro-canal").val('');
                            $("#cidade-canal").val('');
                            $("#estado-canal").val('');
                            $("#numero-canal").val('');
                            $("#cad-user").val('');
                        }
                    }
                }, "json"
            );
        }else{
            $this.addClass('error');
        }
    });

    $("#executivo-canal").multiselect({
        multiple: false,
        header: "Selecione a opção",
        noneSelectedText: "Selecione",
        selectedList: 1
    }).multiselectfilter({
        placeholder: '',
        label: 'Pesquisar:'
    });

    $("#cnpj-canal").mask('00.000.000/0000-00');

    $("#adicionar-canal").on('click', function(){
        if($form.validate().form() === true){
            $dialog.dialog({
                title: "Atenção",
                modal: true,
                width: 300,
                position: {
                    my: "center top+50",
                    at: "center top",
                    of: window
                }
            });
            loading($dialog);
            $.post(
                "/vogel/web/movi/canais/adicionar/save/",
                $form.serializeArray(),
                function(data){
                   if(!data.error){
                        $dialog.empty();
                        getMensage($dialog, "sucesso", data.msg);
                        $dialog.dialog({
                            close: function(){
                                window.location.href = "/vogel/web/movi/canais/listar/";
                            }
                        })
                    }else{
                        $dialog.empty();
                        getMensage($dialog, "error", data.msg);
                    }
                }, "json"
            ).fail(function(response){
                $dialog.html('<div class="error"><span>'+response.responseText+'</span></div>');
            });
        }
    });
});
