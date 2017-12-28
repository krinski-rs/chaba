$(document).ready(function(){
    var causa_list = [],
        causa_val = null,
        local_list = [],
        local_val = null,
        falha_list = [],
        falha_val = null,
        problema_list = [],
        problema_val = null,
        solucao_list = [],
        solucao_val = null,
        abrir_bs_list = [],
        movivo_list = [];

    movivo_list = yaml_form_pause['Motivo'];

    for (i in movivo_list) {
        $('#select_ba_pause_motivo').append('<option value="' + movivo_list[i] + '">' + movivo_list[i] + '</option>');
    }

    causa_list = Object.keys(yaml_form_close['Causa']);

    for (i in causa_list) {
        $('#select_ba_close_causa').append('<option value="' + causa_list[i] + '">' + causa_list[i] + '</option>');
    }

    abrir_bs_list = yaml_form_close['AbrirBS'];

    for (i in abrir_bs_list) {
        $('#select_ba_close_abrir_bs').append('<option value="' + abrir_bs_list[i] + '">' + abrir_bs_list[i] + '</option>');
    }

    $('#select_ba_close_causa').on('change',function(event) {
        event.preventDefault();

        var self = $(this);

        causa_val = self.val();

        $('.error').hide();
        $('#select_ba_close_local').empty().append('<option value="">---</option>');
        $('#select_ba_close_falha').empty().append('<option value="">---</option>');
        $('#select_ba_close_problema').empty().append('<option value="">---</option>');
        $('#select_ba_close_solucao').empty().append('<option value="">---</option>');

        if (causa_val == 'Cliente') {
            local_list = [];

            falha_list = Object.keys(yaml_form_close['Causa'][causa_val]['Falha']);

            for (i in falha_list) {
                $('#select_ba_close_falha').append('<option value="' + falha_list[i] + '">' + falha_list[i] + '</option>');
            }

        } else if (causa_val) {
            if (!yaml_form_close['Causa'][causa_val]['Local']) {
                local_list = [];

            } else {
                local_list = Object.keys(yaml_form_close['Causa'][causa_val]['Local']);
            }

            for (i in local_list) {
                $('#select_ba_close_local').append('<option value="' + local_list[i] + '">' + local_list[i] + '</option>');
            }
        }
    });

    $('#select_ba_close_local').on('change',function(event) {
        event.preventDefault();

        var self = $(this);

        local_val = self.val();

        $('.error').hide();
        $('#select_ba_close_falha').empty().append('<option value="">---</option>');
        $('#select_ba_close_problema').empty().append('<option value="">---</option>');
        $('#select_ba_close_solucao').empty().append('<option value="">---</option>');

        if (local_val) {
            if (!yaml_form_close['Causa'][causa_val]['Local'][local_val]['Falha']) {
                falha_list = [];

            } else {
                falha_list = Object.keys(yaml_form_close['Causa'][causa_val]['Local'][local_val]['Falha']);
            }

            for (i in falha_list) {
                $('#select_ba_close_falha').append('<option value="' + falha_list[i] + '">' + falha_list[i] + '</option>');
            }
        }
    });

    $('#select_ba_close_falha').on('change',function(event) {
        event.preventDefault();

        var self = $(this);

        falha_val = self.val();

        $('.error').hide();
        $('#select_ba_close_problema').empty().append('<option value="">---</option>');
        $('#select_ba_close_solucao').empty().append('<option value="">---</option>');

        if (causa_val == 'Cliente') {
            if (!yaml_form_close['Causa'][causa_val]['Falha'][falha_val]['Problema']) {
                problema_list = [];

            } else {
                problema_list = Object.keys(yaml_form_close['Causa'][causa_val]['Falha'][falha_val]['Problema']);
            }

            for (i in problema_list) {
                $('#select_ba_close_problema').append('<option value="' + problema_list[i] + '">' + problema_list[i] + '</option>');
            }

        } else if (falha_val) {
            if (!yaml_form_close['Causa'][causa_val]['Local'][local_val]['Falha'][falha_val]['Problema']) {
                problema_list = [];

            } else {
                problema_list = Object.keys(yaml_form_close['Causa'][causa_val]['Local'][local_val]['Falha'][falha_val]['Problema']);
            }

            for (i in problema_list) {
                $('#select_ba_close_problema').append('<option value="' + problema_list[i] + '">' + problema_list[i] + '</option>');
            }
        }
    });

    $('#select_ba_close_problema').on('change',function(event) {
        event.preventDefault();

        var self = $(this);

        problema_val = self.val();

        $('.error').hide();
        $('#select_ba_close_solucao').empty().append('<option value="">---</option>');

        if (causa_val == 'Cliente') {
            if (!yaml_form_close['Causa'][causa_val]['Falha'][falha_val]['Problema'][problema_val]['Solução']) {
                solucao_list = [];

            } else {
                solucao_list = yaml_form_close['Causa'][causa_val]['Falha'][falha_val]['Problema'][problema_val]['Solução'];
            }

            for (i in solucao_list) {
                $('#select_ba_close_solucao').append('<option value="' + solucao_list[i] + '">' + solucao_list[i] + '</option>');
            }

        } else if (problema_val) {
            if (!yaml_form_close['Causa'][causa_val]['Local'][local_val]['Falha'][falha_val]['Problema'][problema_val]['Solução']) {
                solucao_list = [];

            } else {
                solucao_list = yaml_form_close['Causa'][causa_val]['Local'][local_val]['Falha'][falha_val]['Problema'][problema_val]['Solução'];
            }

            for (i in solucao_list) {
                $('#select_ba_close_solucao').append('<option value="' + solucao_list[i] + '">' + solucao_list[i] + '</option>');
            }
        }
    });

    $('#select_ba_close_solucao').on('change',function(event) {
        event.preventDefault();

        var self = $(this);

        if (self.val()) {
            $('.error').hide();
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
            $('#form_ba_cancel').submit();
        })
    });

    $('#btn_send_sn2').on('click',function(event) {
        event.preventDefault();
        tt_confirm('Você deseja realmente enviar este BA para SN2?', function() {
            $('#form_ba_send_sn2').submit();
        })
    });

    $('#btn_send_sn3').on('click',function(event) {
        event.preventDefault();
        tt_confirm('Você deseja realmente enviar este BA para SN3?', function() {
            $('#form_ba_send_sn3').submit();
        })
    });

    $('#btn_ba_take_on').on('click',function(event) {
        event.preventDefault();
        tt_confirm('Você deseja realmente assumir este BA?', function() {
            $('#form_ba_take_on').submit();
        })
    });

    $('#btn_solve_ba').on('click',function(event) {
        event.preventDefault();
        tt_confirm('Você deseja realmente resolver este BA?', function() {
            $('#form_ba_solve').submit();
        });
    });

    $('#btn_unsolved_ba').on('click',function(event) {
        event.preventDefault();
        tt_confirm('Você deseja realmente marcar o BA como não resolvido?', function() {
            $('#form_ba_unsolved').submit();
        });
    });


    $('#form_ba_close').on('submit',function(event) {
        var flag_submit = true;

        if ($('#select_ba_close_causa').val()) {
            $('#div_error_select_ba_close_causa').hide();

        } else {
            $('#div_error_select_ba_close_causa').show();

            flag_submit = false;
        }

        if ($('#select_ba_close_falha').val()) {
            $('#div_error_select_ba_close_falha').hide();

        } else {
            $('#div_error_select_ba_close_falha').show();

            flag_submit = false;
        }

        if ($('#select_ba_close_problema').val()) {
            $('#div_error_select_ba_close_problema').hide();

        } else {
            $('#div_error_select_ba_close_problema').show();

            flag_submit = false;
        }

        if ($('#select_ba_close_solucao').val()) {
            $('#div_error_select_ba_close_solucao').hide();

        } else {
            $('#div_error_select_ba_close_solucao').show();

            flag_submit = false;
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

        return true;
    });

    $("#btn_close_ba").on("click",function(event) {
        event.preventDefault();

        $("#div_close_ba").dialog({
            modal:true,
            title: "Fechar BA",
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

                        $('#form_ba_close').submit();
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

    $("#btn_close_ba").on("click", function(event){
        event.preventDefault();

        $("#div_close_ba").dialog({
            modal:true,
            title: "Fechar BA",
            width: 300,
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
                        $('.error').hide();

                        $('#form_ba_close').submit();
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
                            form.submit();
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
                        "info": "Página _PAGE_ de um total de _PAGES_ página(s)",
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
                    lengthChange: false,
                    searching: false,
                    // data: reports_filter.data_list,
                    columns: [
                        { title: 'ID' },
                        { title: 'Status' },
                        { title: 'Designador' },
                        { title: 'Técnico' },
                        { title: 'Data de Abertura' },
                        { render: function() { return '<button class="btn btn-primary vincular-bi">Vincular</button>'; }}
                    ]
                };
                var table = $('<table>');
                $(modal).append(table);
                var data_table = $(table).DataTable(data_table_config);
                $(table).on('click', '.vincular-bi', function() {
                    var tr = $(this).closest('tr');
                    var row = data_table.row(tr).data();
                    $.post(url, 'bi=' + row[0], function(resp) {
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
    
    $(".visualizaPonta").on("click", function(){
    	$("#dialog").dialog({
    		title: 'Visualizar Ponta A',
    		modal: true,
    		position: {
				my: "center top+100",
       			at: "center top",
				of: window
			}
    	});
    });

});

