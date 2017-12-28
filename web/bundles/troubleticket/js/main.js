$(document).ready(function(){
    var incidente_val = $('#incidente_val').val(),
        severidade_val = $('#severidade_val').val(),
        estrutura_val = $('#estrutura_val').val(),
        elemento_val = $('#elemento_val').val(),
        fornecedor_val = $('#fornecedor_val').val(),
        causa_val = $('#causa_val').val(),
        problema_val = $('#problema_val').val(),
        solucao_val = $('#solucao_val').val(),
        motivo_val = $('#motivo_val').val(),
        select_incidente = $('#select_ba_close_incidente'),
        select_estrutura = $('#select_ba_close_estrutura'),
        select_pop = $('#select_ba_close_pop'),
        select_elemento = $('#select_ba_close_elemento'),
        select_fornecedor = $('#select_ba_close_fornecedor'),
        select_causa = $('#select_ba_close_causa'),
        select_problema = $('#select_ba_close_problema'),
        select_solucao = $('#select_ba_close_solucao'),
        select_abrir_bs = $('#select_ba_close_abrir_bs'),
        select_severidade = $('#select_ba_close_severidade'),
        select_pause_motivo = $('#select_ba_pause_motivo');

    var allElements = [select_estrutura, select_elemento, select_causa, select_problema,
                        select_solucao, select_pop, select_fornecedor];

    hideElementsAndLabel(allElements);

    if(yaml_form_close.hasOwnProperty('Incidente')) {
        for (incidente in yaml_form_close.Incidente) {
            select_incidente.append('<option value="' + incidente + '">' + incidente + '</option>');
        }
    }

    if(yaml_form_close.hasOwnProperty('AbrirBS')) {
        for (key in yaml_form_close.AbrirBS) {
            select_abrir_bs.append('<option value="' + yaml_form_close.AbrirBS[key] + '">' + yaml_form_close.AbrirBS[key] + '</option>');
        }
    }

    if(yaml_form_close.hasOwnProperty('Severidade')) {
        for (key in yaml_form_close.Severidade) {
            select_severidade.append('<option value="' + yaml_form_close.Severidade[key] + '">' + yaml_form_close.Severidade[key] + '</option>');
        }
    }

    movivo_list = yaml_form_pause['Motivo'];

    for (i in movivo_list) {
        select_pause_motivo.append('<option value="' + movivo_list[i] + '">' + movivo_list[i] + '</option>');
    }

    select_incidente.on('change',function(event) {
        event.preventDefault();
        var self = $(this);

        incidente_val = self.val();

        $('.error').hide();

        if(select_pop.next('span.custom-combobox').length) {
            select_pop.combobox('destroy');
        }

        if(select_fornecedor.next('span.custom-combobox').length) {
           select_fornecedor.combobox('destroy');
        }

        cleanElements(allElements);

        hideElementsAndLabel(allElements);

        if (incidente_val == 'Cliente') {
            showElementsAndLabel([select_elemento, select_causa, select_problema, select_solucao]);

            if(yaml_form_close.Incidente.Cliente.hasOwnProperty('Elemento')) {
                var elementos = yaml_form_close.Incidente.Cliente.Elemento;
                for (elm in elementos) {
                    select_elemento.append('<option value="' + elm + '">' + elm + '</option>');
                }
            }
        } else if(incidente_val == 'Vogel') {

            $.ajax({
                method: 'GET',
                url: pop_request,
                success: function(dataRespose){
                    var popList = dataRespose.data;
                    if(popList) {
                        for (key in popList) {
                            select_pop.append('<option value="' + popList[key].id + '">' + popList[key].nome + '</option>');
                        }
                        select_pop.combobox();
                        $('.ui-autocomplete-input').css('height','19px');
                    }
                },
                error: function(response){
                    console.log('Ocorreu um erro ao buscar os pops!');
                },
                dataType: 'json'
            });

            $.ajax({
                method: 'GET',
                url: provider_request,
                success: function(dataRespose){
                    var providerList = dataRespose.data;
                    if(providerList) {
                        for (key in providerList) {
                            select_fornecedor.append('<option value="' + providerList[key].id + '">' + providerList[key].nome_fantasia + '</option>');
                        }
                        select_fornecedor.combobox();
                        $('.ui-autocomplete-input').css('height','19px');
                    }
                },
                error: function(response){
                    console.log('Ocorreu um erro ao buscar os fornecedores!');
                },
                dataType: 'json'
            });

            var elements = [select_estrutura, select_elemento,
                select_causa, select_problema, select_solucao, select_pop, select_fornecedor];

            showElementsAndLabel(elements);

            if(yaml_form_close.Incidente.Vogel.hasOwnProperty('Estrutura')) {
                var estruturas = yaml_form_close.Incidente.Vogel.Estrutura;
                for (estrutura in estruturas) {
                    select_estrutura.append('<option value="' + estrutura + '">' + estrutura + '</option>');
                }
            }
        }
    });

    select_estrutura.on('change', function(event){
        event.preventDefault();

        $('.error').hide();

        cleanElements([select_elemento, select_causa, select_problema, select_solucao]);

        var estrutura_val = $(this).val();

        if (estrutura_val) {

            var elementos = yaml_form_close['Incidente']['Vogel']['Estrutura'][estrutura_val]['Elemento'];

            for (elemento in elementos) {
                select_elemento.append('<option value="' + elemento + '">' + elemento + '</option>');
            }
        }
    });

    select_elemento.on('change', function(event){
        event.preventDefault();

        $('.error').hide();

        cleanElements([select_causa, select_problema, select_solucao]);

        var elemento_val = $(this).val();

        if (elemento_val) {

            var causas = [];

            if(select_incidente.val() == 'Cliente') {
                causas = yaml_form_close['Incidente']['Cliente']['Elemento'][elemento_val]['Causa'];
            } else {
                estrutura_val = select_estrutura.val();

                if(estrutura_val) {
                    causas = yaml_form_close['Incidente']['Vogel']['Estrutura'][estrutura_val]
                            ['Elemento'][elemento_val]['Causa'];
                }
            }

            for (causa in causas) {
                select_causa.append('<option value="' + causa + '">' + causa + '</option>');
            }
        }
    });

    select_causa.on('change', function(event){
        event.preventDefault();

        $('.error').hide();

        cleanElements([select_problema, select_solucao]);

        var causa_val = $(this).val(),
            elemento_val = select_elemento.val();

        if (causa_val && elemento_val) {

            var problemas = [];

            if(select_incidente.val() == 'Cliente') {
                problemas = yaml_form_close['Incidente']['Cliente']['Elemento'][elemento_val]
                                ['Causa'][causa_val]['Problema'];
            } else {
                estrutura_val = select_estrutura.val();

                if(estrutura_val) {
                    problemas = yaml_form_close['Incidente']['Vogel']['Estrutura'][estrutura_val]
                        ['Elemento'][elemento_val]['Causa'][causa_val]['Problema'];
                }
            }

            for (problema in problemas) {
                select_problema.append('<option value="' + problema + '">' + problema + '</option>');
            }
        }
    });

    select_problema.on('change', function(event){
        event.preventDefault();

        $('.error').hide();

        cleanElements([select_solucao]);

        var elemento_val = select_elemento.val(),
            causa_val = select_causa.val(),
            problema_val = $(this).val();

        if (problema_val && causa_val && elemento_val) {

            var solucoes = [];

            if(select_incidente.val() == 'Cliente') {
                solucoes = yaml_form_close['Incidente']['Cliente']['Elemento'][elemento_val]['Causa'][causa_val]
                                            ['Problema'][problema_val]['Solução'];
            } else {
                estrutura_val = select_estrutura.val();

                if(estrutura_val) {
                    solucoes = yaml_form_close['Incidente']['Vogel']['Estrutura'][estrutura_val]
                                    ['Elemento'][elemento_val]['Causa'][causa_val]['Problema'][problema_val]['Solução'];
                }
            }

            for (key in solucoes) {
                select_solucao.append('<option value="' + solucoes[key] + '">' + solucoes[key] + '</option>');
            }
        }
    });

    $('#select_ba_close_abrir_bs').on('change',function(event) {
        event.preventDefault();

        var self = $(this);

        if (self.val()) {
            $('.error').hide();
        }
    });

    $('#btn_cancel_ba').on('click',function(event) {
        event.preventDefault();
        tt_confirm('Você deseja realmente cancelar este BA?', function() {
        showOverlay();
            $('#form_ba_cancel').submit();
        })
    });

    $('#btn_ba_take_on').on('click',function(event) {
        event.preventDefault();
        tt_confirm('Você deseja realmente assumir este BA?', function() {
        showOverlay();
            $('#form_ba_take_on').submit();
        })
    });

    $('#btn_unsolved_ba').on('click',function(event) {
        event.preventDefault();
        tt_confirm('Você deseja realmente marcar o BA como não resolvido?', function() {
        showOverlay();
            $('#form_ba_unsolved').submit();
        });
    });

    $('#btn_close_ba').on('click',function(event) {
        event.preventDefault();
        tt_confirm('Você deseja realmente fechar este BA?', function() {
            $('#form_ba_only_close').submit();
        })
    });

    $('#form_ba_close').on('submit',function(event) {
        var flag_submit = true;

        if (select_incidente.val()) {
            $('#div_error_select_ba_close_incidente').hide();
        } else {
            $('#div_error_select_ba_close_incidente').show();
            flag_submit = false;
        }

        if (select_elemento.val()) {
            $('#div_error_select_ba_close_elemento').hide();
        } else {
            $('#div_error_select_ba_close_elemento').show();
            flag_submit = false;
        }

        if (select_causa.val()) {
            $('#div_error_select_ba_close_causa').hide();
        } else {
            $('#div_error_select_ba_close_causa').show();
            flag_submit = false;
        }

        if (select_problema.val()) {
            $('#div_error_select_ba_close_problema').hide();
        } else {
            $('#div_error_select_ba_close_problema').show();
            flag_submit = false;
        }

        if (select_solucao.val()) {
            $('#div_error_select_ba_close_solucao').hide();
        } else {
            $('#div_error_select_ba_close_solucao').show();
            flag_submit = false;
        }

        if (select_severidade.val()) {
            $('#div_error_select_ba_close_severidade').hide();
        } else {
            $('#div_error_select_ba_close_severidade').show();
            flag_submit = false;
        }

        if(select_incidente.val() == 'Vogel') {
            if (select_estrutura.val()) {
                $('#div_error_select_ba_close_estrutura').hide();
            } else {
                $('#div_error_select_ba_close_estrutura').show();
                flag_submit = false;
            }

            if (select_pop.val()) {
                $('#div_error_select_ba_close_pop').hide();
            } else {
                $('#div_error_select_ba_close_pop').show();
                flag_submit = false;
            }
        }

        if ($('#select_ba_close_abrir_bs').val()) {
            $('#div_error_select_ba_close_abrir_bs').hide();

        } else {
            $('#div_error_select_ba_close_abrir_bs').show();

            flag_submit = false;
        }

        if (!flag_submit) {
            event.preventDefault();
            return false;
        }

        if(select_pop.next('span.custom-combobox').length) {
            select_pop.combobox('destroy');
        }

        if(select_fornecedor.next('span.custom-combobox').length) {
           select_fornecedor.combobox('destroy');
        }

        $('.error').hide();
        $("#div_close_ba").dialog('destroy');

        showOverlay();

        return true;
    });

    $('#form_ba_pause').on('submit',function(event) {
        var flag_submit = true;

        if ($('#select_ba_pause_motivo').val()) {
            $('#div_error_select_ba_pause_motivo').hide();

        } else {
            $('#div_error_select_ba_pause_motivo').show();

            flag_submit = false;
        }

        if (!flag_submit) {
            event.preventDefault();

            return false;
        }

    $("#div_pause_ba").dialog("destroy");
        showOverlay();

        return true;
    });

    $('#form_ba_restart').on('submit',function(event) {
        var flag_submit = true;

        if ($('#textarea_ba_restart_comentario').val()) {
            $('#div_error_textarea_ba_restart_comentario').hide();

        } else {
            $('#div_error_textarea_ba_restart_comentario').show();

            flag_submit = false;
        }

        if (!flag_submit) {
            event.preventDefault();

            return false;
        }

        $("#div_restart_ba").dialog("destroy");
        showOverlay();

        return true;
    });

    $("#btn_solve_ba").on("click",function(event) {
        event.preventDefault();

        $("#div_close_ba").dialog({
            modal:true,
            title: "Fechar BA",
            width: 800,
            resizable: false,
            position: {
                my: "center top+100",
                at: "center top",
                of: window
            },
            close: function(){
                $('.error').hide();
                $(this).dialog("destroy");
                select_pop.combobox('destroy');
                select_fornecedor.combobox('destroy');
                select_incidente.val('').change();
            },
            buttons: {
                Salvar:{
                    click: function() {
                        $('.error').hide();
                        $('#form_ba_close').submit();
                    },
                   'text': 'Confirmar',
                },
                Cancel:{
                    click: function() {
                        $(this).dialog('close');
                    },
                   'text': 'Cancelar',
                    class: 'cancelar'
                },
            }
        });
    });

    $("#btn_change_stack").on("click",function(event) {
        event.preventDefault();

        $("#div_change_stack").dialog({
            modal:true,
            title: "Alterar Stack",
            width: 300,
            resizable: false,
            position: {
                my: "center top+100",
                at: "center top",
                of: window
            },
            close: function(){
                $('.error').hide();
                $(this).dialog("destroy");
            },
            buttons: {
                Salvar:{
                    click: function() {
                        var form = $('#form_ba_change_stack', this);
                        $('.error').hide();
                        form.submit();
                    },
                   'text': 'Confirmar',
                },
                Cancel:{
                    click: function() {
                        $('.error').hide();
                        $(this).dialog("destroy");
                    },
                   'text': 'Cancelar',
                    class: 'cancelar'
                },
            }
        });
    });

    $("#btn_pause_ba").on("click",function(event) {
        event.preventDefault();

        $("#div_pause_ba").dialog({
            modal:true,
            title: "Pausar BA",
            width: 300,
            resizable: false,
            position: {
                my: "center top+100",
                at: "center top",
                of: window
            },
            close: function(){
                $('.error').hide();
                $(this).dialog("destroy");
            },
            buttons: {
                Salvar:{
                    click: function() {
                        $('.error').hide();
                        $('#form_ba_pause').submit();
                    },
                   'text': 'Confirmar',
                },
                Cancel:{
                    click: function() {
                        $('.error').hide();
                        $(this).dialog("destroy");
                    },
                   'text': 'Cancelar',
                    class: 'cancelar'
                },
            }
        });
    });

    $("#btn_restart_ba").on("click",function(event) {
        event.preventDefault();

        $("#div_restart_ba").dialog({
            modal:true,
            title: "Reiniciar BA",
            width: 300,
            resizable: false,
            position: {
                my: "center top+100",
                at: "center top",
                of: window
            },
            close: function(){
                $('.error').hide();
                $(this).dialog("destroy");
            },
            buttons: {
                Salvar:{
                    click: function() {
                        $('.error').hide();
                        $('#form_ba_restart').submit();
                    },
                   'text': 'Confirmar',
                },
                Cancel:{
                    click: function() {
                        $('.error').hide();
                        $(this).dialog("destroy");
                    },
                   'text': 'Cancelar',
                    class: 'cancelar'
                },
            }
        });
    });

    $("#btn_comment_ba").on("click", function(event) {
        event.preventDefault();
        $("#div_comment_ba").dialog({
            modal:true,
            title: "Comentar BA",
            width: 500,
            resizable: false,
            position: {
                my: "center top+100",
                at: "center top",
                of: window
            },
            close: function(){
                $(this).dialog("destroy");
            },
            buttons: {
                Salvar:{
                    click: function() {
                        var form = $('form', this)[0];
                        if (form.checkValidity()) {
                $('.error').hide();
                            $(this).dialog("destroy");
                            showOverlay();
                            form.submit();
                        }else{
                var error = $('<div>').html($('<span>').text('Informe um comentário')).addClass('error');
                            $('.error').remove();
                            $(error).appendTo('#div_comment_ba>.row>.col-sm-100>form');
            }
                    },
                   'text': 'Comentar',
                },
                Cancel:{
                    click: function(){
                        $(this).dialog("destroy");
                    },
                   'text': 'Fechar',
                    class: 'cancelar'
                },
            }
        }).html($('#div_comment_ba').html());
    });

    $('#link_to_bi').on('click', function(event) {
        var element = this;
        event.preventDefault();


        $("#div_link_to_bi").dialog({
            modal:true,
            title: "Vincular BA com um BI",
            width: '90%',
            height: 300,
            resizable: false,
            position: {
                my: "center top+100",
                at: "center top",
                of: window
            },
            open: function() {
                var modal = this;
                $(modal).empty();

                var url = $(element).data('url');

                var data_table_config = {
                    language: {
                        "lengthMenu": "Exibindo _MENU_ registros por página",
                        "zeroRecords": "Nenhum registro encontrado",
                        "info": "Página _PAGE_ de um total de _PAGES_ página(s). Total _TOTAL_ registros.",
                        "infoEmpty": "Nenhum registro encontrado",
                        "infoFiltered": "(filtrado de um total de _MAX_ registros)",
                        "loadingRecords": "Aguarde...",
                        "processing":     "Processando...",
                        "search":         "Procurar:",
                        "zeroRecords":    "Nenhum registro encontrado para esta pesquisa",
                        "paginate": {
                            "first":      "Primeiro",
                            "last":       "Último",
                            "next":       "Próximo",
                            "previous":   "Anterior"
                        },
                    },
                    ordering: false,
                    pagingType: "full_numbers",
                    pageLength: 10,
                    serverSide: true,
                    processing: true,
                    ajax: {
                        url: url,
                        type: 'GET'
                    },
                    lengthChange: true,
                    searching: false,
                    columns: [
                        { title: 'ID'},
                        { title: 'Status'},
                        { title: 'Data de Abertura'},
                        { title: 'UF', data: "5"},
                        { title: 'Cidade', data: "6"},
                        { render: function(data, type, full) {
                            return '<button class="btn btn-primary vincular-bi" data-id="'+full[11]+'">Vincular</button>';
                        }}
                    ]
                };
                var table = $('<table>');
                $(modal).append(table);
                var data_table = $(table).DataTable(data_table_config);
                $(table).on('click', '.vincular-bi', function() {
                    var biId = $(this).attr('data-id');
                    var tr = $(this).closest('tr');
                    var row = data_table.row(tr).data();

                    $.post(url, 'bi=' + biId, function(resp) {
                        if (resp.status) {
                            $(modal).dialog('destroy');
                            $('#linked_bi input').val(row[0] + ' - ' + row[2]);
                            $('#link_to_bi').hide();
                            $('#remove_link_to_bi').show();
                        } else {
                            alert('Não foi possível realizar o vínculo com o BI!');
                        }
                    }, 'json');
                });
            },
            close: function(){
                $(this).dialog("destroy");
            },
            buttons: {
                Cancel:{
                    click: function(){
                        $(this).dialog("destroy");
                    },
                   'text': 'Fechar',
                    class: 'cancelar'
                },
            }
        });
    })

    $('#remove_link_to_bi').on('click', function() {
        var element = this;
        tt_confirm('Deseja realmente remover o vínculo com o BI?', function() {
            $.ajax({
                url: $(element).data('url'),
                type: 'DELETE',
                success: function(result) {
                    if (result.status) {
                        $('#remove_link_to_bi').hide();
                        $('#link_to_bi').show();
                        $('#linked_bi input').val('');
                    } else {
                        alert('Não foi possível remover o vínculo com o BI!');
                    }
                }
            });
        })
    });

    var severidadeArray = [{id:1, severidade:"Crítica"},
                                  {id:2, severidade:"Alta"},
                                  {id:3, severidade:"Baixa"}];

    $('#select_ba_add_sintoma').on('change', function(){
        var valor = $(this).val();

        $.each(severidadeArray, function (key, obj) {
            if (obj.id == valor) {
                $('#input_ba_add_severidade').val(obj.severidade);
            } else if (valor < 1 || valor > 3) {
                $('#input_ba_add_severidade').val('');
            }
        });
    });

    $(".visualizaPonta").on("click", function(){
        var $this = $(this);
        var $dialog = $("#dialog");
        $dialog.dialog({
            title: 'Visualizar Ponta A',
            modal: true,
            width: 800,
            position: {
                my: "center top+10",
                at: "center top",
                of: window
            }
        });

        loading($dialog);

        $.post(
            '/ba/tip',
            { circuito: $this.data('circuito') },
            function(data){
                $dialog.html(data);
                $("#tabs").tabs();
            }
        ).fail(function(response){
            $dialog.find("div.error").remove();
            $(".ui-dialog-buttonset").show();
            $dialog.append("<div class='error'><span>"+response.responseText+"</span></div>");
        });
    });

    $("#btn_ba_send_to_user").on("click",function(event) {
        event.preventDefault();

        $("#div_change_responsible").dialog({
            modal:true,
            title: "Transferir Boletim",
            width: 600,
            resizable: true,
            position: {
                my: "center top+100",
                at: "center top",
                of: window
            },
            close: function(){
                $("#select_ba_colaborador").val('');
                $('.error').hide();
                $(this).dialog("destroy");
            },
            buttons: {
                Salvar:{
                    click: function() {
                        var form = $('#form_ba_send_to_user', this);
                            $('.error').hide();
                            form.submit();
                    },
                   'text': 'Transferir Boletim',
                },
                Cancel:{
                    click: function() {
                        $("#select_ba_colaborador").val('');
                        $('.error').hide();
                        $(this).dialog("destroy");
                    },
                   'text': 'Cancelar',
                    class: 'cancelar'
                },
            }
        });
    });

    $("#chat").on("click",function(event) {
        event.preventDefault();

        atualizaChat($(this));

        $("#div_chat").dialog({
            modal:true,
            title: "Comentários",
            width: 800,
            resizable: true,
            position: {
                my: "center top+50",
                at: "center top",
                of: window
            },
            close: function(){
                $('.badge').attr('data-badge', '0');
                $("#div_chat").html('');
                $('.error').hide();
                $(this).dialog("destroy");
            }
        });

        hideOverlay();
    });
});

function hideElementsAndLabel(arrElments) {
    for(key in arrElments) {
        arrElments[key].parent().hide();
    }
}

function showElementsAndLabel(arrElments) {
    for(key in arrElments) {
        arrElments[key].parent().show();
        arrElments[key].empty().append('<option value="">---</option>');
    }
}

function cleanElements(arrElments) {
    for(key in arrElments) {
        arrElments[key].empty().append('<option value="">---</option>');
    }
}

function atualizaChat(element) {
    $('#overlay').fadeIn(function() {
        $.ajax({
            method: 'GET',
            url: element.attr('href'),
            success: function(data){
                $("#div_chat").html(data);

                var buttons = getButtons();

                $("#div_chat").dialog('option', 'buttons', buttons);
            },
            error: function(response){
                $("#div_chat").append("<div class='error'><span>Ocorreu um erro ao buscar as mensagens!</span></div>");
            },
            async: false,
            dataType: 'html'
        });
    });
}

function getButtons() {
    var buttons  = {};
    if ($('#comment').length > 0) {
        buttons.Salvar = {
            click: function() {
                if (!$('#comment').val()) {
                    if ($('.comment_error').length <= 0) {
                        $("<div class='error comment_error'><span>Informe um comentário!</span></div>").insertBefore('#comment');
                    }
                } else {
                    $('.comment_error').remove();

                    $.post(
                        $("#comment").data('href'),
                        { comment: $("#comment").val() },
                        function(data){
                            if (data.error) {
                                $("<div class='error comment_error'><span>"+data.message+"</span></div>").insertBefore('#comment');
                            } else {
                                $("<div class='success'><span>"+data.message+"</span></div>").insertBefore('#comment');

                                atualizaChat($('#chat'));
                            }
                        },
                        'json'
                    ).fail(function(response){
                        $("#div_chat").append("<div class='error'><span>Ocorreu um erro ao buscar as mensagens!</span></div>");
                    });
                }
            },
           'text': 'Comentar',
        }
    }

    buttons.Cancel = {
        click: function() {
            $('.badge').attr('data-badge', '0');
            $("#div_chat").html('');
            $('.error').hide();
            $(this).dialog("destroy");
        },
       'text': 'Voltar',
        class: 'cancelar'
    }

    return buttons;
}
