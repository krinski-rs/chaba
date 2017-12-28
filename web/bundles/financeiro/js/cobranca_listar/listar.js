/**
 * Created by djunior on 20/06/2016.
 */
$(document).ready(function(){

    var $table = $("#lista-cobrancas");
    var $dialog = $("#dialog");

    $table.gridSort({
        itensPerPage: 20,
        paginacao: '#paginacao',
        loadingStart: false,
        sorters: [[ 0, 1, 2, 3, 4],
            ['invoice.idInvoice', 'invoice.custumer', 'invoice.dateRecord',
            'data_envio_protheus', 'typeInvoice.idTypeInvoice', 'statusInvoice.description']],
        pathAjax: "/vogel/web/financa/cobranca/pedido/listar/itens/",
        formulario: "#buscaTabela",
        order: 'DESC',
        searchChange: false,
        loadingStart: true
    });

    $table.setColumns({
        columns: [1, 2, 6, 7, 8, 9, 10, 11],
        labels: [
            'Cliente',
            'Segmento',
            'Gerado',
            'Data de envio',
            'Status',
            'Número NF',
            'Tipo',
            'Vencimento',
            'Valor',
            'Valor pago',
            'Status de Pagamento',
            'Data de Pagamento',
            'Usuário'
        ]
    });


    $table.on("click", ".cobranca", function(){
        var $invoice = $(this).attr('data-id');
        $dialog.dialog({
            title:'Ver cobranças para pedido #' +$invoice,
            modal: true,
            width: 900,
            position: {
                my: "center top+80",
                at: "center top",
                of: window
            },
            close:function(){
                $dialog.html('');
            }
        });

        $.post(
            "/fatura/invoice/item/verItemCobranca/",
            { invoice: $invoice },
            function(data){
                $dialog.html(data);
                $(".listCobranca a").tooltip();
                $(".buttons button").button();
            }
        )
    });

    $table.on("click", ".erros_integracao", function(){
        var $invoice = $(this).attr('data-id');
        $dialog.dialog({
            title:'Ver erros de integração para pedido #' +$invoice,
            modal: true,
            width: 900,
            height: 400,
            position: {
                my: "center top+80",
                at: "center top",
                of: window
            },
            close:function(){
                $dialog.html('');
            }
        });

        $.post(
            "/vogel/web/financa/cobranca/pedido/log/verLogPedidos/",
            { invoice: $invoice },
            function(data){
                $dialog.html(data);
            }
        )
    });

    $table.on("click", ".cancelar_pedido", function(){
        var $invoice = $(this).attr('data-id');
        $dialog.dialog({
            title:'Cancelando pedido #' +$invoice,
            modal: true,
            width: 500,
            position: {
                my: "center top+80",
                at: "center top",
                of: window
            },
            buttons: [
                {
                  text: "Salvar",
                  click: function() {
                    saveCancelamento($invoice, $('#motivo_cancelamento').val());
                  }
                },
                {
                  text: "Fechar",
                  click: function() {
                    $( this ).dialog( "close" );
                      $dialog.html('');
                  }
                }
            ],
            close:function(){
                atuaizarStatusPedidos();
                $table.gridSort("pesquisar");
                $dialog.dialog('destroy');
            }
        });
        $dialog.html('<label for="motivo_cancelamento">Motivo Cancelamento</label><br/>'+
            '<input maxlength="255" id="motivo_cancelamento" name="motivo" style="width:100%"/>');
    });

    $table.on('click', '.reabrir_pre_faturas', function(){
        var $invoice = $(this).attr('data-id');
        $dialog.dialog({
            title: 'Reabertura de pré-faturas',
            modal: true,
            width: 500,
            position: {
                my: 'center top+80',
                at: 'center top',
                of: window
            },
            buttons: [
            {
                text: 'Reabrir',
                class: 'btn-reabrir',
                click: function() {
                    saveCancelamento($invoice, 'Realizada reabertura de pré-faturas.');
                }
            },
            {
                text: 'Fechar',
                click: function() {
                    $(this).dialog('close');
                    $dialog.html('');
                }
            }],
            close:function(){
                atuaizarStatusPedidos();
                $table.gridSort('pesquisar');
                $dialog.dialog('destroy');
            }
        });
        $dialog.html('<p> Deseja realmente reabriar as pré-faturas do pedido <b>#'+$invoice+'</b>? </p>');
    });

    var saveCancelamento = function(invoice, motivo) {
        $.ajax({
            type: 'POST',
            url: '/vogel/web/financa/cobranca/pedido/atualizar/status/',
            data: {'id_invoice': invoice , acao:'cancelar' , 'motivo_cancelamento': motivo},
        }).done(function(data) {
            $dialog.dialog('option', 'buttons', []);
            $dialog.html(data.msg);

            $('.listCobranca a').tooltip();
            $('.buttons button').button();

            setTimeout(function() {
                $dialog.dialog('close');
            }, 3000);
        }).error(function(data) {
            $dialog.html(data.responseJSON.msg);
        });
    };

    $table.on("click", ".reenviar_pedido", function(){
        var $invoice = $(this).attr('data-id');
        $dialog.dialog({
            title:'Deseja reenviar o pedido #' +$invoice,
            modal: true,
            width: 500,
            heigth: 100,
            position: {
                my: "center top+80",
                at: "center top",
                of: window
            },
            buttons: [
                {
                    text: "Reenviar",
                    click: function() {
                        post = false;
                        $.post(
                            "/vogel/web/financa/cobranca/pedido/atualizar/status/",
                            { id_invoice: $invoice, acao:'reenviar' },
                            function(data){
                                $dialog.html(data.msg);
                                $(".listCobranca a").tooltip();
                                $(".buttons button").button();
                            }
                        );
                    },

                }
            ],
            close:function(){
                atuaizarStatusPedidos();
                $table.gridSort("pesquisar");
                $dialog.html('');
            }
        });




    });

    var atuaizarStatusPedidos = function(){
        var emp = $('#empresa_invocie').val();
        console.log('entrou status',emp);
        if(emp != ''){
            $.post(
                "/vogel/web/financa/cobranca/pedido/listar/contadorStatus",
                {
                    'id':emp
                },
                function(data){
                    $('#contadores_pedidos').html(data.html);
                    statusItensClick();
                }
            );
        }else{

            $('#contadores_pedidos').html("");
        }
    };

    var statusItensClick = function(){
        $('#contadores_pedidos .itens').click(function(){
            unselectStatusInvoice();
            if(this.id == 'erro_status'){
                selectStatusInvoice(2004);
            }else if(this.id == 'aguardando_status'){
                selectStatusInvoice(2001);
                selectStatusInvoice(2003);
            }else if(this.id == 'pendentes_status'){
                selectStatusInvoice(2002);
            }
            $(".search-advanced #search").click();

        });
    };

    var selectStatusInvoice = function(idStatus){
        $(".status_invoice input[type='checkbox'][value='"+idStatus+"']").click();
    };

    var unselectStatusInvoice = function(){
        $(".status_invoice input[type='checkbox']:checked").click();
    };


    $(".formBuscaAvancada").show();

    $(".formBuscaAvancada select.cliente").multiselect({
        checkAllText: 'Selecionar todos',
        uncheckAllText: 'Limpar todos',
        noneSelectedText: 'Selecione',
        selectedText: '# selecionados',

        minWidth: 220
    }).multiselectfilter({
        placeholder: '',
        label: 'Pesquisar:'
    });

    $(".formBuscaAvancada select.status").multiselect({
        checkAllText: 'Selecionar todos',
        uncheckAllText: 'Limpar todos',
        noneSelectedText: 'Selecione',
        selectedText: '# selecionados',
        classes: 'status_invoice',
        minWidth: 220
    }).multiselectfilter({
        placeholder: '',
        label: 'Pesquisar:'
    });

    $("#id_empresa").change(
        function(){
            $('#empresa_invocie').val($(this).val());
            window.history.pushState('page2', document.title, '?id='+$(this).val());

            atuaizarStatusPedidos();
            $table.gridSort("pesquisar");
        }
    );

    function setCodigoEmpresa(){
        $("#id_empresa").val($('#empresa_invocie').val());
        $("#id_empresa").change();
    }


    $('.enviar-faturamento').click(function(){
        emp = $('#empresa_invocie').val();
        if(emp != ''){
            document.location = $(this).attr('data-href')+'?id='+emp;
        }else{
            alert('Primeiro selecione uma empresa');
        }
    });

    $("input[name='vencimento-de'], input[name='gerada-de']").datepicker({
        changeMonth: true,
        changeYear: true,
        maxDate: 0
    });

    $("input[name='vencimento-ate'], input[name='gerada-ate']").datepicker({
        changeMonth: true,
        changeYear: true
    });

    $(".search-advanced #search").on("click", function(){
        $table.gridSort("pesquisar");
        atuaizarStatusPedidos(); //Atualiza contador de status de pedidos
    });


    setCodigoEmpresa();

    $("body").on("click", "#exportExcel", function(evento){
        var startDate = $("#buscaTabela").find("[name='gerada-de']").val();
        var endDate = $("#buscaTabela").find("[name='gerada-ate']").val();
        if (startDate && endDate) {
            exportForm($table);
        } else {
            var html = "<div class='alert-dialog'>"+
                            "<div class='alert alert-danger'>"+
                                "Selecione a date de inicio e de término do período ao qual deseja exportar o relatório"+
                            "</div>"+
                        "</div>";
            $(html).dialog({
                title: 'Atenção',
                modal: true,
                width: 600,
                Cancel:{
                    click: function(){
                          $(this).dialog("close");
                    },
                    'text': 'Fechar'
                }
            });
        }
    });
});

$(document).on('click', '.icon.adicionarObs', function() {
        var $dialog = $('#dialog');
        var $this = $(this);
        var _cid = $this.data('cid');

        $dialog.dialog({
            title: 'Adicionar informações de cobranças',
            position: 'center',
            // draggable: false,
            resizable: false,
            width: 900,
            height: 600,
            modal: true,
        }).html("<img src='/template/inc/img/loading.gif' style='height: 200px; display: block; margin: 20px auto 0;'><span style='font-family:Dax-Bold; font-size:18px; display:block; margin: 0 auto; width:100px;   margin-top: -25px;'>Carregando..</span>");
        
        $dialog.on('click', '#saveInfoCobranca', function(){
            var $this = $(this);
            var _addInfo = $('#adicionar-informacao');
            var _infoAdicional = $('#infoAdicional');

            if(_addInfo.validate().form() === true){

                _infoAdicional.removeClass('error');

                var url = '/vogel/web/financa/cobranca/acaocobranca/adicionar/save/';
                var postData = _addInfo.serializeArray();

                postData.push({
                    name: 'cliente',
                    value: _cid
                });

                $.post(
                    url,
                    postData,
                    function(retorno) {
                        if(!retorno.error) {

                            $('#data').datepicker({
                                changeMonth: true,
                                changeYear: true,
                                minDate: 0
                            });
                            
                            $('div.acoes select').multiselect({
                                nonSelectedText: 'Selecione',
                                buttonWidth: '100% !important',
                            });

                            $('div.error').remove();

                            _addInfo.before('<div class="sucesso"><span>'+retorno.msg+'</span></div>');
                            
                            setTimeout(function() {
                                $('div.adicionarObs').trigger('click');
                            }, 1000);
                        } else {
                            $dialog.find('div.error').remove();
                            _infoAdicional.after('<div class="error"><span>'+retorno.msg+'</span></div>');
                        }
                    }
                );
            }
        });
               
        $dialog.on('click', '.deletarInfoCobranca', function(){
            var $this = $(this);
            var url = '/vogel/web/financa/cobranca/acaocobranca/deletar';
            var postData = { id: $this.data('id') };
            
            $.post(
                url, 
                postData,
                function(retorno) {
                    if(!retorno.error) {
                        $this.closest('tr').remove();
                    }else{
                        $dialog.find('div.error').remove();
                        $dialog.find('table.gridsort').before('<div class="error">'+data.msg+'</div>');
                    }
                }, 'json'
            );
        });
        
        $dialog.on('click', '.deletarInfoPendenciaCobranca', function(){
            var $this = $(this);
            
            $('#descricaoPendencia').dialog({
                title: 'Digite a pendência',
                modal:true,
                widht: 100,
                position: 'top+50',
                buttons: {
                    Cancel:{
                        click: function(){
                            $(this).dialog('destroy');
                        },
                       'text': 'Cancelar',
                        class: 'cancelar'
                    },
                    'Excluir':{
                        click:function(event){
                            if($.trim($('textarea[name="pendencia"]').val()) != ""){
                                $.post(
                                    "/vogel/web/financa/cobranca/acaocobranca/deletar/", 
                                    {
                                        id: $this.data("id"),
                                        pendencia: $('textarea[name="pendencia"]').val()
                                    }, 
                                    function(retorno){
                                        if(!retorno.error){
                                            $this.closest("tr").remove();
                                            $("#descricaoPendencia").dialog("destroy");
                                        }else{
                                            $("#descricaoPendencia").find("div.error").remove();
                                            $("#descricaoPendencia").before('<div class="error">'+data.msg+'</div>');
                                        }
                                    }, "json"
                                );
                            }else{
                                $('textarea[name="pendencia"]').addClass('error');
                            }
                        },
                        'text': 'Fechar',
                    }
                }
            }).html("<textarea name='pendencia' style='border-radius: 0;width: 98%; max-width: 98%'></textarea>");
            
        });

        $.post(
            '/vogel/web/financa/cobranca/acaocobranca/adicionar/',
            {
                cliente: _cid,
                tipo: 'O'
            },
            function(retorno){
                $dialog.html(retorno);
                
                $('#adicionar-informacao').validate({
                    ignore: "",
                    onkeydown: false,
                    onkeyup: false,
                    onfocusin: false,
                    onfocusout: false,
                    onchange: false,
                    onclick: false,
                    messages: false,
                    showErrors: function(errorMap, errorList){
                        var mensagem = "";
                        $('#dialog').find('div.error').remove();
                        $('input.error, select.error').removeClass('error');
                        $('#dialog').prepend('<div class="error erroForm"></div>');
                        $.each(errorList, function(index, element){
                            $(element.element).addClass('error');
                            mensagem+= "<strong>"+$(element.element).prev().text()+"</strong>: "+element.message+"<br />" ;
                        });
                        $('.error').append("<span>"+mensagem+"</span>");
                        return false;
                    }
                });
                
                $('#data').datepicker({
                    changeMonth: true,
                    changeYear: true,
                    minDate: 0
                });
                
                $('#acoes').multiselect({
                    nonSelectedText: 'Selecione',
                });
            }
        );
});

$(document).on('click', '.icon.adicionarInfo', function() {
    var $dialog = $('#dialog');
    var $this = $(this);
    var _cid = $this.data('cid');

    $dialog.on('click', '#saveInfo', function(){
        $dialog.find('div.error').remove();

        var $this = $(this);

        var _addInfo = $('#adicionar-informacao');
        var _infoAdicional = $('#infoAdicional');

        if(_addInfo.validate().form() === true) {

            _infoAdicional.removeClass('error');
            
            var url = '/fatura/contacorrente/Infoadicional/create';
            var postData = _addInfo.serializeArray();
            
            postData.push({
                name: 'cliente',
                value: _cid
            });

            $.post(
                url,
                postData,
                function(retorno) {
                    if(!retorno.error) {
                        $dialog.html(retorno);
                        $('#data').datepicker({
                            changeMonth: true,
                            changeYear: true,
                            minDate: 0
                        });
                        
                        $('div.acoes select').multiselect({
                            nonSelectedText: 'Selecione',
                            buttonWidth: '100% !important',
                        });
                    } else {
                        $dialog.find('div.error').remove();
                        _infoAdicional.next('<div class="error"><span>'+retorno.msg+'</span></div>');
                    }
                }
            );
        }
    });

    $dialog.on('click', '.deletarInfo', function(){
        var $this = $(this);
        var url = '/fatura/contacorrente/Infoadicional/delete';
        var postData = { id: $this.data('id') };
        
        $.post(
            url,
            postData, 
            function(retorno) {
                if(!retorno.error) {
                    $this.closest('tr').remove();
                }else{
                    $dialog.find('div.error').remove();
                    $dialog.find('table.gridsort').before('<div class="error">'+data.msg+'</div>');
                }
            }, 'json'
        );
    });
    
    $dialog.dialog({
        title: 'Adicionar informações para o faturamento',
        position: 'top+30',
        width: 600,
        modal: true,
    }).html("<img src='/template/inc/img/loading.gif' style='height: 200px; display: block; margin: 20px auto 0;'><span style='font-family:Dax-Bold; font-size:18px; display:block; margin: 0 auto; width:100px;   margin-top: -25px;'>Carregando..</span>");
    
    var url = '/fatura/contacorrente/Infoadicional/create';
    var postData = {
        cliente: _cid,
        tipo: 'F'
    };

    $.get(
        url,
        postData, 
        function(retorno){
            $dialog.html(retorno);
            
            $('#adicionar-informacao').validate({
                ignore: "",
                onkeydown: false,
                onkeyup: false,
                onfocusin: false,
                onfocusout: false,
                onchange: false,
                onclick: false,
                messages: false,
                showErrors: function(errorMap, errorList) {
                    var mensagem = '';
                    $dialog.find('div.error').remove();
                    $("input.error, select.error").removeClass('error');
                    $dialog.append('<div class="error erroForm"></div>');

                    $.each(errorList, function(index, element) {
                        $(element.element).addClass('error');
                        mensagem+= "<strong>"+$(element.element).prev().text()+"</strong>: "+element.message+"<br />" ;
                    });

                    $('.error').append("<span>"+mensagem+"</span>");
                    
                    return false;
                }
            });
        }
    );
});

$(document).on('click', '.icon.acessarContaCorrente', function() {
    var $this = $(this);
    var _cid = $this.data('cid');

    var linkContaCorrente = 'fatura/contacorrente/cliente/?cid='+_cid;

    var hostname = window.location.origin; //Ex: http://localhost:5000
    
    var url = hostname+'/'+linkContaCorrente;

    var win = window.open(url, '_blank');
    win.focus();
});

function exportForm(table){
    var postData = $("#buscaTabela").serialize();
    var url = '/vogel/web/financa/cobranca/pedido/exportar/itens/';
    var uri = url+"?"+postData;
    window.location = uri;  
}
