$(document).ready(function(){
	var $table = $("#listarCanais");
	var $dialog = $("#dialog");
	
	$table.gridSort({
		itensPerPage: 20,
		paginacao: '#paginacao',
		sorters: [[ 0, 1, 2, 3, 5, 6, 7, 8, 9],
		          ['cobHist.dateRecord','cobHist.registrante', 'cobHist.customer', 'cobHist.segmento', 'cobHist.status', 'cobHist.valorVencido', 'cobHist.dataRevisao', 'cobHist.diasAtraso', 'cobHist.dataConclusao']],
		pathAjax: "/vogel/web/financa/cobranca/acaocobranca/listar/itens/",
		formulario: "#buscaTabela",
		order: 'DESC',
		searchChange: true,
		loadingStart: true
	});
	
	$table.setColumns({
		columns: [0, 1, 2, 4, 5, 6, 7, 8, 9, 10],
    	labels: ["Data", "Nome Cliente", "Segmento", "Registrante", "Status", "R$ Vencido", "Retorno", "Atraso","Conclusão", "Responsável"]
	});
	
	
	$("input[name='data-de']").datepicker({
		changeYear: true,
		changeMonth: true,
		maxDate:0,
		onClose: function(selectedDate) {
			var $dataFinal = $("input[name='data-ate']");
			$dataFinal.datepicker("option", "minDate", selectedDate);
		}
    });
	
	$("input[name='retorno-de']").datepicker({
		changeYear: true,
		changeMonth: true,
		onClose: function(selectedDate) {
			var $dataFinal = $("input[name='retorno-ate']");
			$dataFinal.datepicker("option", "minDate", selectedDate);
		}
    });
	
	$("input[name='data-ate']").datepicker({
    	changeMonth: true,
    	changeYear: true,
    	maxDate: 0
    });
	
	$("input[name='retorno-ate']").datepicker({
    	changeMonth: true,
    	changeYear: true,
    });
	
	$("select[name='acoes[]']").multiselect({
		checkAllText: 'Selecionar todos',
		uncheckAllText: 'Limpar todos',
		noneSelectedText: 'Selecione',
		selectedText: '# selecionados',
		minWidth: 220
	}); 
	
	$("select[name='cliente[]'], select[name='segmento[]'], select[name='status[]'], select[name='registrante[]'], select[name='responsavel[]'] ").multiselect({
		checkAllText: 'Selecionar todos',
		uncheckAllText: 'Limpar todos',
		noneSelectedText: 'Selecione',
		selectedText: '# selecionados',
		minWidth: 220
	}).multiselectfilter({
		placeholder: '',
		label: 'Pesquisar:'
	}); 
	
	$table.on("click", ".detalhar", function(){
		var $dialog = $("#dialog");
		var $this = $(this);
		$dialog.dialog({
			modal: true,
			width: 500,
			title: "Visualizar histórico "+$this.data('id'),
			position: {
				my: "center top+80",
       			at: "center top",
				of: window
			}
		});
		
		loading($dialog);
		
		$.post(
			'/vogel/web/financa/cobranca/acaocobranca/ver/'+$this.data('id'),
			function(data){
				$dialog.html(data);
			}
		).fail(function() {
		    alert( "error" );
		});
	});
	
	
	$table.on("click", ".inativar-cobranca", function(){
		var $dialog = $("#dialog");
		var $this = $(this);
		$dialog.dialog({
			modal: true,
			title: "Fechar #"+$this.data('id'),
			width: 300,
			position: {
				my: "center top+80",
       			at: "center top",
				of: window
			},
			buttons: {
				Cancel:{
					click: function(){
						$(this).dialog("destroy");
					},
				   'text': 'Cancelar',
					class: 'cancelar'
				},
				"Confirmar":{
					click:function(event){
						$.post(
							"/vogel/web/financa/cobranca/acaocobranca/deletar/", 
							{
								id: $this.data("id")
							}, 
							function(retorno){
								if(!retorno.error){
									$dialog.html('<div class="sucesso"><span>'+retorno.msg+'</span></div>');
									$dialog.dialog({
										close: function(){
											$table.gridSort("pesquisar");
											$dialog.dialog("destroy");
										}
									});
								}else{
									$dialog.html('<div class="error">'+retorno.msg+'</div>');
								}
							}, "json"
						).fail(function() {
						    alert( "error" );
						});
					},
					'text': 'Confirmar',
				}
			}
		}).html("Confirmar fechamento da pendência?");
	});
	
	
	$table.on("click", ".inativar-com-pendencia", function(){
		var $dialog = $("#dialog");
		var $this = $(this);
		$dialog.dialog({
			modal: true,
			title: "Digite a pendência",
			width: 300,
			position: {
				my: "center top+80",
       			at: "center top",
				of: window
			},
			buttons: {
				Cancel:{
					click: function(){
						$(this).dialog("destroy");
					},
				   'text': 'Cancelar',
					class: 'cancelar'
				},
				"Excluir":{
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
										$dialog.dialog("destroy");
										$table.gridSort("pesquisar");
									}else{
										$dialog.find("div.error").remove();
										$dialog.before('<div class="error">'+data.msg+'</div>');
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
		}).html("<textarea name='pendencia' style='border-radius: 0;width: 95%; max-width: 95%; min-height: 100px'></textarea>");
		
	});

	$(".search-advanced #search").on("click", function(){
		$table.gridSort("pesquisar");
	});
	
	$(".formBuscaAvancada").show();
	
	$(".excel").on("click", function(){
		$("#buscaTabela").attr("action", "/vogel/web/cobranca/historico/csv");
		$("#buscaTabela").attr("method", "POST");
		$("#buscaTabela").attr("target", "_blank");
		$("#buscaTabela").submit();
	});
});