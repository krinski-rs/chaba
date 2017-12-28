$(document).ready(function(){

    var incidente_val = $('#incidente_val').val(),
        severidade_val = $('#severidade_val').val(),
        estrutura_val = $('#estrutura_val').val(),
        elemento_val = $('#elemento_val').val(),
        fornecedor_val = $('#fornecedor_val').val(),
        causa_val = $('#causa_val').val(),
        problema_val = $('#problema_val').val(),
        solucao_val = $('#solucao_val').val(),
        select_incidente = $('#select_bi_close_incidente'),
        select_estrutura = $('#select_bi_close_estrutura'),
        select_pop = $('#select_bi_close_pop'),
        select_elemento = $('#select_bi_close_elemento'),
        select_fornecedor = $('#select_bi_close_fornecedor'),
        select_causa = $('#select_bi_close_causa'),
        select_problema = $('#select_bi_close_problema'),
        select_solucao = $('#select_bi_close_solucao'),
        select_abrir_bs = $('#select_bi_close_abrir_bs'),
        select_severidade = $('#select_bi_close_severidade');

    var allElements = [select_estrutura, select_elemento, select_fornecedor,
            select_causa, select_problema, select_solucao, select_pop, select_fornecedor];

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

            var elements = [select_estrutura, select_elemento, select_fornecedor,
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

    $('#btn_bi_take_on').on('click',function(event) {
        event.preventDefault();
        tt_confirm('Você deseja realmente assumir este BI?', function() {
            showOverlay();
            $('#form_bi_take_on').submit();
        })
    });

    $('#form_bi_close').on('submit',function(event) {
        var flag_submit = true;

        if (select_incidente.val()) {
            $('#div_error_select_bi_close_incidente').hide();
        } else {
            $('#div_error_select_bi_close_incidente').show();
            flag_submit = false;
        }

        if (select_elemento.val()) {
            $('#div_error_select_bi_close_elemento').hide();
        } else {
            $('#div_error_select_bi_close_elemento').show();
            flag_submit = false;
        }

        if (select_causa.val()) {
            $('#div_error_select_bi_close_causa').hide();
        } else {
            $('#div_error_select_bi_close_causa').show();
            flag_submit = false;
        }

        if (select_problema.val()) {
            $('#div_error_select_bi_close_problema').hide();
        } else {
            $('#div_error_select_bi_close_problema').show();
            flag_submit = false;
        }

        if (select_solucao.val()) {
            $('#div_error_select_bi_close_solucao').hide();
        } else {
            $('#div_error_select_bi_close_solucao').show();
            flag_submit = false;
        }

        if (select_severidade.val()) {
            $('#div_error_select_bi_close_severidade').hide();
        } else {
            $('#div_error_select_bi_close_severidade').show();
            flag_submit = false;
        }

        if(select_incidente.val() == 'Vogel') {
            if (select_estrutura.val()) {
                $('#div_error_select_bi_close_estrutura').hide();
            } else {
                $('#div_error_select_bi_close_estrutura').show();
                flag_submit = false;
            }

            if (select_pop.val()) {
                $('#div_error_select_bi_close_pop').hide();
            } else {
                $('#div_error_select_bi_close_pop').show();
                flag_submit = false;
            }
        }

        if ($('#select_bi_close_abrir_bs').val()) {
            $('#div_error_select_bi_close_abrir_bs').hide();

        } else {
            $('#div_error_select_bi_close_abrir_bs').show();

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
        $("#div_close_bi").dialog('destroy');

        showOverlay();

        return true;
    });

    $("#btn_close_bi").on("click", function(event){
        event.preventDefault();

        $("#div_close_bi").dialog({
            modal:true,
            title: "Fechar BI",
            width: 800,
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
                    click: function(){
                        var form = $('#form_bi_close', this);
                        form.submit();
                    },
                   'text': 'Confirmar',
                },
                Cancel:{
                    click: function(){
                        $(this).dialog("destroy");
                    },
                   'text': 'Cancelar',
                    class: 'cancelar'
                },
            }
        });
    });

    $("#btn_comment_bi").on("click", function(event) {
        event.preventDefault();

        $("#div_comment_bi").dialog({
            modal:true,
            title: "Comentar BI",
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
                        } else {
                            var error = $('<div>').html($('<span>').text('Informe um comentário')).addClass('error');
                            $('.error').remove();
                            $(error).appendTo('#div_comment_bi>.row>.col-sm-100>form');
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
        }).html($('#div_comment_bi').html());
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

    $("#btn_bi_send_to_user").on("click",function(event) {
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
                $("#select_bi_colaborador").val('');
                $('.error').hide();
                $(this).dialog("destroy");
            },
            buttons: {
                Salvar:{
                    click: function() {
                        var form = $('#form_bi_send_to_user', this);
                            $('.error').hide();
                            form.submit();
                    },
                   'text': 'Transferir Boletim',
                },
                Cancel:{
                    click: function() {
                        $("#select_bi_colaborador").val('');
                        $('.error').hide();
                        $(this).dialog("destroy");
                    },
                   'text': 'Cancelar',
                    class: 'cancelar'
                },
            }
        });
    });
});

function tt_confirm(message, ok_callback, cancel_callback) {
    var modal = $('<div>');
    $(modal).html(message);
    $(modal).dialog({
        resizable: false,
        height: 160,
        modal: true,
        buttons: {
            "OK": function() {
                $(this).dialog('close');
                if (typeof ok_callback == 'function') {
                    ok_callback();
                }
            },
            "Cancelar": {
                click: function() {
                    $(this).dialog('close');
                    if (typeof cancel_callback == 'function') {
                        cancel_callback();
                    }
                },
                class: 'cancelar',
                text: 'Cancelar'
            }
        }
    });
}

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
