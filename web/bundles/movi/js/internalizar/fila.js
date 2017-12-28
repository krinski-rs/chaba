/**
 * Created by djunior on 05/07/2016.
 */
$(document).ready(function(){
    var $table = $("#lista-internalizacao"), $dialog = $("#dialog");

    $table.gridSort({
        itensPerPage: 100,
        paginacao: '#paginacao',
        sorters: [[ 0, 1, 2, 3, 8, 9, 10, 12, 11],
            ['NumeroProposta','attendanceTime', 'emissao','negocioFechado',"ativacao", "mensalidade", "prazo_ativacao", "ps.valproposalId", "status"]],
        pathAjax: "/vogel/web/movi/internalizacao/fila/itens/",
        formulario: "#buscaTabela",
        order: 'DESC',
        searchChange: false,
        loadingStart: true
    });

    $table.gridSort("pesquisar");

    $table.setColumns({
        columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10,11],
        labels: ["Emissão", "Negócio Fechado","EV", "Cliente", "Filial Faturamento", "Chance", "R$ Ativação", "R$ Mensalidade",  "Prazo Ativação", "Status", "Proposta Válida", "Proposta com Pendência"]
    });

    $("select[name='status[]']").multiselect({
        checkAllText: 'Selecionar todos',
        uncheckAllText: 'Limpar todos',
        noneSelectedText: 'Selecione',
        selectedText: '# selecionados',
        minWidth: 220
    }).multiselectfilter({
        placeholder: '',
        label: 'Pesquisar:'
    });

    $(".formBuscaAvancada").show();

    $(".search-advanced #search").on("click", function(){
        $table.gridSort("pesquisar");
    });

    $("#buscaTabela").on("keypress", function(event) {
        return event.keyCode != 13;
    });

    $("div.numero_proposal input").css('width','265px');

    $table.on('click', '.analisar-envio', function(event){
        event.stopPropagation();
        var $this = $(this);
        var proposal = $this.data('proposal'), proposta = $this.closest('tr').find('td:eq(0)').text();
        $dialog.dialog({
            title:"Analisar Internalização",
            modal: true,
            width: 460,
            close: function(){
                $dialog.dialog('destroy');
            },
            position: {
                my: "center top+80",
                at: "center top",
                of: window
            }
        });
        loading($dialog);
        $.post(
            "/vogel/web/movi/internalizacao/fila/avaliarinternalizacao/",
            {
                proposal: proposal,
                chance: $this.data('chance')
            },
            function(data){
                $dialog.html(data);
                $dialog.find('#proposta').html(proposta);
                $("#strproposal").val($.trim(proposta));
                $(".proposal-digital").attr('href', $(".proposal-digital").attr('href')+$this.data('chance')+'/'+ $.trim(proposta));
                $("input[name='valida']").trigger("click");
            }
        );
    });

    $dialog.on('click', 'input[name="valida"]', function(event){
        event.stopPropagation();
        var $this = $(this);
        $(".motivo-vendedor").remove();
        if($this.val() == 1){
            $(".inserir-internalizacao").removeClass('displayN');
            $(".voltar-vendedor").addClass('displayN');
            $("#tipomotivo").closest('.campo').addClass('displayN');
        }else if($this.val() == 0){
            $("#tipomotivo").closest('.campos').after(
            '<div class="campos motivo-vendedor">'+
                '<div class="campo texto full">'+
                    '<label>Detalhe aqui o motivo da rejeição:</label>'+
                '</div>'+
                '<div class="campo texto full">'+
                    '<textarea name="motivo" style="width:390px;height:100px"></textarea>'+
                '</div>'+
            '</div>');
            $("#tipomotivo").closest('.campo').removeClass('displayN');
            $(".voltar-vendedor").removeClass('displayN');
            $(".inserir-internalizacao").addClass('displayN');
        }
    });

    $dialog.on('click', '.inserir-internalizacao', function(event){
        event.stopPropagation();
        if($('input[name="valida"]:checked').val()){
            $.post(
                "/vogel/web/movi/internalizacao/fila/internaliza/",
                $("#analizar-internalizacao").serialize(),
                function(data){
                    if(!data.error){
                       var str_proposal = $('#strproposal').val();
                        getMensage($dialog, "sucesso", data.msg);
                        $.redirectPost("/movi/protocolo/proposta/inserir/", { proposal: str_proposal });
                    }else{
                        getMensage($dialog, "error", data.msg);
                    }
                },'json'
            );
        }else{
            getMensage($dialog, "error", "Informe se a proposta é valida");
        }
    });

    $dialog.on('click', '.voltar-vendedor', function(event){
        event.stopPropagation();
        if($('input[name="valida"]:checked').val()){
            if($.trim($('textarea[name="motivo"]').val()) == ''){
                getMensage($dialog, "error", "Informe a mensagem para o vendedor.");
                $('textarea[name="motivo"]').addClass('error');
            }else{
                $('textarea[name="motivo"]').removeClass('error');
                $.post(
                    "/vogel/web/movi/internalizacao/fila/reenviavendedor/",
                    $("#analizar-internalizacao").serialize(),
                    function(data){
                        if(!data.error){
                            getMensage($dialog, "sucesso", data.msg);
                            $dialog.dialog({
                                close:function(){
                                    location.reload();
                                    $dialog.dialog('destroy');
                                }
                            });
                        }else{
                            getMensage($dialog, "error", data.msg);
                        }
                    },'json'
                );
            }
        }else{
            getMensage($dialog, "error", "Informe se a proposta é valida");
        }
    });

    $dialog.on('click', '.salvar-log', function(event){
        event.stopPropagation();
        if($('input[name="valida"]:checked').val()){
            $.post(
                "/vogel/web/movi/internalizacao/fila/internaliza/",
                $("#analizar-internalizacao").serialize(),
                function(data){
                    if(!data.error){
                        getMensage($dialog, "sucesso", data.msg);
                        $dialog.dialog({
                            close:function(){
                                location.reload();
                                $dialog.dialog('destroy');
                            }
                        });
                    }else{
                        getMensage($dialog, "error", data.msg);
                    }
                },'json'
            );
        }else{
            getMensage($dialog, "error", "Informe se a proposta é valida");
        }
    });

    $.ajax({
        url: '/vogel/web/movi/api/internalizacao/contadores',
        dataType: 'JSON',
        success: function(data) {
            $('#slaSuporte .noPrazo').html(data.sla_suporte.prazo);
            $('#slaSuporte .ultrapassado').html(data.sla_suporte.ultrapassado);
            $('#slaSuporteFinanceiro .noPrazo').html(data.sla_suporte_financeiro.prazo);
            $('#slaSuporteFinanceiro .ultrapassado').html(data.sla_suporte_financeiro.ultrapassado);

            $('#contadoresInternalizacao').show();
        }
    });
});
