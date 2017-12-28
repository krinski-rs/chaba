$(document).ready(function(){
	var $table = $("#listarTerceiros"), $dialog = $('#dialog');

	$table.gridSort({
		itensPerPage: 20,
		paginacao: '#paginacao',
		pathAjax: "/vogel/web/engenharia/terceiros/listar/itens/",
		formulario: "#buscaTabela",
		order: 'DESC',
		searchChange: false,
		loadingStart:true
	}).gridSort("pesquisar");

	$table.setColumns({
		columns: [0, 1, 2, 3, 4],
		labels: ["ID", "Nome","Tipo", "Valor R$"]
	});

	$("#search").on("click", function(){
		$table.gridSort("pesquisar");
	});

	$(".formBuscaAvancada").show();


	$('#buscaTabela').on('submit', function(){
		return false;
	});

	$table.on("click", ".editar-servico", function(){
		var $this = $(this);
		$dialog.dialog({
			title:"Editar serviço terceiro " + $this.closest('tr').find('td:eq(0)').text(),
			modal: true,
			position: {
				my: "center top+80",
				at: "center top",
				of: window
			},
			width:'300',
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
						if($('#cost').val() != ""){
							$('#cost').removeClass('error');
							$.post(
								"/vogel/web/engenharia/terceiros/listar/editar/save/",
								{
									id: $this.data('servico'),
									cost: $('#cost').val()
								},
								function(data){
									if(!data.error){
										getMensage($dialog, "sucesso", data.msg);
										$(".ui-dialog-buttonset").hide();
										$dialog.dialog({
											close: function(){
												window.location.href = "/vogel/web/engenharia/terceiros/listar";
											}
										});
									}else{
										$dialog.empty();
										getMensage($dialog, "error", data.msg);
									}
								}, "json"
							).fail(function(response) {
								getMensage($dialog, "error", response.respo);
							});
						}else{
							$('#cost').addClass('error');
						}
					},
					'text': 'Confirmar',
				}
			}
		});
		$.post(
			"/vogel/web/engenharia/terceiros/listar/editar/",
			{
				id: $this.data('servico')
			},
			function(data){
				$dialog.html(data);
				$('#cost').mask('000.000.000.000.000,00', {reverse: true});
			}, "html"
		);
	});

	$table.on("click", ".inativar-servico", function(){
		var $this = $(this);
		$dialog.dialog({
			title:"Excluir serviço terceiro " + $this.closest('tr').find('td:eq(0)').text(),
			modal: true,
			position: {
				my: "center top+80",
				at: "center top",
				of: window
			},
			width:'300',
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
						loading($dialog);
						$.post(
							"/vogel/web/engenharia/terceiros/listar/inativar/",
							{
								id: $this.data('servico')
							},
							function(data){
								if(!data.error){
									getMensage($dialog, "sucesso", data.msg);
									$(".ui-dialog-buttonset").hide();
									$dialog.dialog({
										close: function(){
											window.location.href = "/vogel/web/engenharia/terceiros/listar";
										}
									});
								}else{
									$dialog.empty();
									getMensage($dialog, "error", data.msg);
								}
							}, "json"
						).fail(function(response) {
							getMensage($dialog, "error", response.result);
						});
					},
					'text': 'Confirmar',
				}
			}
		}).html("<label>Deseja realmente inativar o serviço?</label>");
	});
});