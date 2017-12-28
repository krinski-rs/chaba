$(document).ready(function() {
    var data_table_config = {},
        data_table = null;

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
            url: circuit_request,
            type: 'GET',
            data: {
                cid:request_cid,
                designador:request_designador
            }
        },
        lengthChange: true,
        searching: false,
        // data: reports_filter.data_list,
        columns: [
            {
                title: "Código",
            },
            {
                title: "Cliente/CNPJ"
            },
            {
                title: "Designador",
            },
            {
                title: "Endereço",
            },
            {
                title: "Ações",
            },
        ]
    };

    $('#table_bs_new').on('click','button.btn_bs_new',function(event) {
        var self = $(this),
            data_id = self.data('id'),
            input_bi_new_data;

        input_bs_new_data = $('#input_bs_new_data');
        input_bs_new_data.val(data_id);

        $('button').prop('disabled',true);
	showOverlay();
        $('#form_bs_new').submit();
    });

    $('#form_open_bs').on('submit',function(event) {
        event.preventDefault();
        $('.input-errors').remove();

        var self = $(this),
            form_input_value = {};

        input_bs_data = $('#input_bs_data');
        if (!input_bs_data.val().trim()) {
            $(input_bs_data).parent().parent().append('<div class="col-sm-100 input-errors"><div class="error"><span>Este campo é de preenchimento obrigatório</span></div></div>')
            return false;
        }
        elementDisable();

        if ($.isNumeric(input_bs_data.val())) {
            form_input_value['cid'] = input_bs_data.val();

        } else {
            form_input_value['designador'] = input_bs_data.val();
        }

        data_table_config.ajax = {
            url: circuit_request,
            type: 'GET',
            data: form_input_value
        };

        if (data_table) {
            data_table.destroy();

            data_table = $('#table_bs_new').empty().DataTable(data_table_config);

        } else {
            data_table = $('#table_bs_new').DataTable(data_table_config);

            data_table.on( 'xhr', function () {
                var json = data_table.ajax.json();

                if (json.data.length == 1) {
                    elementEnable();

                    var input_bs_new_data;

                    input_bs_new_data = $('#input_bs_new_data');
                    input_bs_new_data.val(json.data[0][0]);

		    showOverlay();
                    $('#form_bs_new').submit();

                } else {
                    elementEnable();
                }
            });
        }
    });
});
