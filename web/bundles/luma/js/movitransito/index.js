
$(document).ready(function(){
    var $table = $("#listarMovitransito");
    var $dialog = $("#dialog");

    $table.gridSort({
        itensPerPage: 20,
        paginacao: '#paginacao',
        loadingStart: false,
        sorters: [[0,2],
            ['produto.prodCodigoid','movi.moviCodigoid']],
        pathAjax: "/vogel/web/luma/movimentacao/transito/listar",
        formulario: "#buscaTabela",
        order: 'DESC',
        searchChange: false,
        loadingStart: true
    });

    $table.setColumns({
        columns: [1, 2, 3, 4, 5, 6, 7],
        labels: [
            "Produto",
            "Movimentação",
            "Origem",
            "Transporte",
            "Destino",
            "Data",
            "Status"
        ]
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

    $("input[name='retorno-de']").datepicker({
        changeMonth: true,
        changeYear: true,
        maxDate: 0
    }).on('change', function () {
        var minDate = $("input[name='retorno-de']").datepicker('getDate');
        $("input[name='retorno-ate']").datepicker('option', 'minDate', minDate);
    })

    $("input[name='retorno-ate']").datepicker({
        changeMonth: true,
        changeYear: true
    });

    $(".search-advanced #search").on("click", function(){
        $table.gridSort("pesquisar");
    });


    var selectStatusInvoice = function(idStatus){
        $("input[type='checkbox'][value='"+idStatus+"']").click();
    };

    var unselectStatusInvoice = function(){
        $("input[type='checkbox']:checked").click();
    };

    $("#exportExcel").on("click", function () {
        $('#buscaTabela').attr('action', '/vogel/web/luma/movimentacao/transito/excel');
        $('#buscaTabela').attr('method', 'POST');
        $('#buscaTabela').attr('enctype', 'multipart/form-data');
        $('#buscaTabela').submit();
    })
});


