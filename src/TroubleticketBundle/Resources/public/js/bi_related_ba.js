$(document).ready(function() {
    var data_table_config = {},
        data_table = null;

    var default_columns =  [
        { title: "Remover" },
        { title: "ID" },
        { title: "Cliente" },
        { title: "UF" },
        { title: "Técnico" },
        { title: "Designação" },
        { title: "Fila" },
        { title: "Status" },
        { title: "Último comentário" },
        { title: "Ação" },
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
        ordering: false,
        pagingType: "full_numbers",
        pageLength: page_limit,
        serverSide: true,
        processing: true,
        ajax: {
            url: bi_related_ba_request,
            type: 'GET'
        },
        lengthChange: true,
        searching: false,
        // data: reports_filter.data_list,
        columns: typeof stack_columns !== 'undefined' ? stack_columns : default_columns
    };

    data_table = $('#table_bi_related_ba').DataTable(data_table_config);

    data_table.on( 'xhr', function () {
        elementEnable();
    });

    $('table#table_bi_related_ba').on('click','button.btn_ba_main',function(event) {
        var self = $(this),
            data_id = self.data('id'),
            url_redirect;

        elementDisable();

        url_redirect = ba_main_request.slice(0,-1) + data_id;

        window.location.href = url_redirect;
    });

    $('table#table_bi_related_ba').on('change','input.input_ba_related',function(event) {
        event.preventDefault();

        if ($('.input_ba_related:checked').length > 0) {
            console.log($('.input_ba_related:checked').length);
            $('#btn_bi_related_ba').removeClass('disabled');

        } else {
            console.log($('.input_ba_related:checked').length);
            $('#btn_bi_related_ba').addClass('disabled');
        }
    });

    $('#btn_bi_related_ba').on('click',function(event) {
        event.preventDefault();

        elementDisable();

        var result_request,
            input_ba_related_checked_length = $('.input_ba_related:checked').length;

        result_request = {
            total:0,
            success:0,
            error:[]
        };

        if (input_ba_related_checked_length > 0) {
            tt_confirm('Deseja realmente remover o vínculo com o BI?',function() {
                $('.input_ba_related:checked').each(function() {
                    var ba_id_related = $(this).val(),
                        url_request;

                    url_request = bi_related_ba_delete_request.slice(0,-5) + ba_id_related + '/bis';

                    $.ajax({
                        url: url_request,
                        type: 'DELETE',
                        success: function(result) {
                            result_request.total += 1;

                            if (result.status) {
                                result_request.success += 1;

                            } else {
                                result_request.error.push(ba_id_related);
                            }

                            returnRequest();
                        },
                        fail: function() {
                            elementEnable();
                        }
                    });
                });
            },function() {
                elementEnable();
            });
        }

        function returnRequest() {
            if (input_ba_related_checked_length == result_request.total) {
                elementEnable();

                $('#form_bi_related_ba_search').submit();

                if (result_request.error.length > 0) {
                    alert('Não foi possível remover o vínculo com o BI, para os seguinte(s) BA(s): ' + result_request.error.join(', '));
                }
            }
        }
    });

    $('#form_bi_related_ba_search').on('submit',function(event) {
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

            form_input_value[self_.attr('name')] = self_.val();

            if (self_.val()) {
                flag_error = false;
            }
        });

        if (flag_error) {
            // TODO
        }

        data_table_config.ajax = {
            url: bi_related_ba_request,
            data: form_input_value
        };

        data_table.destroy();

        data_table = $('#table_bi_related_ba').empty().DataTable(data_table_config);
    });
});
