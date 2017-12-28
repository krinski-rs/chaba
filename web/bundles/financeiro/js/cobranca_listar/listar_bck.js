/**
 * Created by djunior on 20/06/2016.
 */
$(document).ready(function(){
    var $table = $("#lista-cobrancas");
    var $dialog = $("#dialog");

    $table.gridSort({
        itensPerPage: 20,
        paginacao: '#paginacao',
        sorters: [[ 0, 1, 2, 3, 4],
            ['invoice.idInvoice', 'invoice.custumer', 'invoice.dateRecord', 'invoice.dateRecord', 'statusInvoice.description']],
        pathAjax: "/vogel/web/financa/cobranca/pedido/listar/itens/",
        formulario: "#buscaTabela",
        order: 'DESC',
        searchChange: false,
        loadingStart: true
    });

    $table.setColumns({
        columns: [1, 4],
        labels: [
            "Cliente",
            "Status"
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
                //window.location.reload();
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

    $(".formBuscaAvancada").show();

    $(".formBuscaAvancada select").multiselect({
        checkAllText: 'Selecionar todos',
        uncheckAllText: 'Limpar todos',
        noneSelectedText: 'Selecione',
        selectedText: '# selecionados',
        minWidth: 220
    }).multiselectfilter({
        placeholder: '',
        label: 'Pesquisar:'
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
    });
});