$(document).ready(function() {

    $('.input_date').datepicker({
        dateFormat: 'dd-mm-yy',
        dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
        dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
        dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
        monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        nextText: 'Próximo',
        prevText: 'Anterior'
    });

    $('#filters').css('display', 'none');

    $('#btn_show_filters').on('click', function() {
        if ($('#filters').css('display') == 'none') {
            $('#filters').show('slow');
        } else {
            $('#filters').hide('slow');
        }
    });

    var data_table_config = {},
        data_table = null;

    var default_columns =  [
        { title: "BI", orderable: false },
        { title: "ID" },
        { title: "Data de Abertura" },
        { title: "Técnico" },
        { title: "Última Atualização" },
        { title: "Tempo decorrido" },
        { title: "Status"},
        { title: "Cliente" },
        { title: "Cliente Final" },
        { title: "UF" },
        { title: "Cidade" },
        { title: "Designação" },
        { title: "Severidade" },
        { title: "Stack/Fila" },
        { title: "Subcaso" },
        { title: "VIP" },
        { title: "Ação", orderable: false },
    ];

    data_table_config = {
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
        ordering: true,
        pagingType: "full_numbers",
        pageLength: page_limit,
        serverSide: true,
        processing: true,
        ajax: {
            url: stack_request,
            type: 'GET'
        },
        lengthChange: true,
        searching: false,
        order: [[1, 'desc']],
        // data: reports_filter.data_list,
        columns: typeof stack_columns !== 'undefined' ? stack_columns : default_columns
    };

    data_table = $('#table_ba_stack').DataTable(data_table_config);

    data_table.on( 'xhr', function () {
        elementEnable();
    });

    $('#btn_stack_ba_new').on('click',function(event) {
        event.preventDefault();

        url_redirect = new_request;

        elementDisable();

        window.location.href = url_redirect;
    });

    $('#form_stack_search').on('submit',function(event) {
        event.preventDefault();

        elementDisable();

        var self = $(this),
            form_input,
            form_input_value = {},
            flag_error = true;

        form_input = $(':input',$(this));

        form_input.each(function() {
            var self_ = $(this);

            if (!self_.attr('name')) {
                return false;
            }

            if (self_.attr('type') == 'checkbox') {
                if (self_.prop('checked')) {
                    form_input_value[self_.attr('name')] = self_.val();
                }
            } else {
                form_input_value[self_.attr('name')] = self_.val();
            }


            if (self_.val()) {
                flag_error = false;
            }
        });

        if (flag_error) {
            // TODO
        }

        data_table_config.ajax = {
            url: stack_request,
            data: form_input_value
        };

        data_table.destroy();

        data_table = $('#table_ba_stack').empty().DataTable(data_table_config);
    });

    $('#form_stack_ba_export').submit(function(event) {
        var flag_error = false;

        if (!$('.input_ba_stack_export_date_init').val()) {
            $('#div_error_input_ba_stack_export_date_init').show();

            flag_error = true;

        } else {
            $('#div_error_input_ba_stack_export_date_init').hide();
        }

        if (!$('.input_ba_stack_export_date_end').val()) {
            $('#div_error_input_ba_stack_export_date_end').show();

            flag_error = true;

        } else {
            $('#div_error_input_ba_stack_export_date_end').hide();
        }

        if (flag_error) {
            event.preventDefault();

            return false;
        }

        return true;
    });

    $('#form_stack_bs_export').submit(function(event) {
        var flag_error = false;

        if (!$('.input_bs_stack_export_date_init').val()) {
            $('#div_error_input_bs_stack_export_date_init').show();

            flag_error = true;

        } else {
            $('#div_error_input_bs_stack_export_date_init').hide();
        }

        if (!$('.input_bs_stack_export_date_end').val()) {
            $('#div_error_input_bs_stack_export_date_end').show();

            flag_error = true;

        } else {
            $('#div_error_input_bs_stack_export_date_end').hide();
        }

        if (flag_error) {
            event.preventDefault();

            return false;
        }

        return true;
    });

    $('#form_stack_ba_export_performance').submit(function(event) {
        var flag_error = false;

        if (!$('.input_ba_stack_export_performance_date_init').val()) {
            $('#div_error_input_ba_stack_export_performance_date_init').show();

            flag_error = true;

        } else {
            $('#div_error_input_ba_stack_export_performance_date_init').hide();
        }

        if (!$('.input_ba_stack_export_performance_date_end').val()) {
            $('#div_error_input_ba_stack_export_performance_date_end').show();

            flag_error = true;

        } else {
            $('#div_error_input_ba_stack_export_performance_date_end').hide();
        }

        if (flag_error) {
            event.preventDefault();

            return false;
        }

        return true;
    });

    $('#btn_stack_bs_export').on("click",function(event){
        event.preventDefault();

        $("#div_stack_bs_export").dialog({
            modal:true,
            title: "Relatório de Incidentes BS",
            width: 500,
            resizable: false,
            position: {
                my: "center top+100",
                at: "center top",
                of: window
            },
            close: function() {
                $(this).dialog("destroy");
            },
            buttons: {
                Salvar:{
                    click: function() {
                        $('#form_stack_bs_export').submit();
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

    $('#btn_stack_ba_export').on("click",function(event){
        event.preventDefault();

        $("#div_stack_ba_export").dialog({
            modal:true,
            title: "Relatório de Incidentes BA",
            width: 500,
            resizable: false,
            position: {
                my: "center top+100",
                at: "center top",
                of: window
            },
            close: function() {
                $(this).dialog("destroy");
            },
            buttons: {
                Salvar:{
                    click: function() {
                        $('#form_stack_ba_export').submit();
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

    $('#btn_stack_ba_export_performance').on("click",function(event){
        event.preventDefault();

        $("#div_stack_ba_export_performance").dialog({
            modal:true,
            title: "Relatório de Performance BA",
            width: 500,
            resizable: false,
            position: {
                my: "center top+100",
                at: "center top",
                of: window
            },
            close: function() {
                $(this).dialog("destroy");
            },
            buttons: {
                Salvar:{
                    click: function() {
                        $('#form_stack_ba_export_performance').submit();
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
});
