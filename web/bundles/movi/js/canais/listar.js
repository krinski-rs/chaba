$(document).ready(function(){
	var $table = $("#listarCanais"), $dialog = $("#dialog"), $document = $('body');

	$table.gridSort({
		itensPerPage: 20,
		paginacao: '#paginacao',
		sorters: [[ 0 ],['cana.canaCodigoid']],
		pathAjax: "/vogel/web/movi/canais/listar/itens/",
		formulario: "#buscaTabela",
		order: 'DESC',
		searchChange: false,
		loadingStart:true
	});

	$table.setColumns({
		columns: [0, 1, 2, 3, 4],
		labels: ["ID", "CNPJ Canal","Nome Fantasia", "Executivo Responsavel", "Tipo Canal"]
	});
	
	$table.on("click", ".mudarVinculo", function(){
		var $dialog = $("#dialog");
		var $this = $(this);
		$dialog.dialog({
			modal: true,
			width: 400,
			title: "Vincular prospect",
			position: {
				my: "center top+80",
       			at: "center top",
				of: window
			},
			buttons: false
		});
		
		loading($dialog);
		
		$.post(
			"/vogel/web/canais/vincular/",
			function(data){
				$dialog.html(data);
				$('#prospect').autocomplete({
					source:  '/vogel/web/canais/pesquisa/prospect/',
					change: function(ev, value) {
						var $empresa = $('#prospect');
						var $this = $(this);
						if($this.val() != "" && value){
							$empresa.val(value['item'].label);
							$("#idProspect").val(value['item'].value);
							$.post(
								'/vogel/web/canais/pesquisa/detalheProspect/',
								{  id: value['item'].value },
								function(data){
									$(".dadosProspect").html(data);
								}
							);
						}else{
							$("#idProspect").val('');
						}
					}
				});
			}
		);
	});
	
	$table.on("click", ".edtEv", function(){
		var $dialog = $("#dialog");
		var $this = $(this);
		$dialog.dialog({
			modal: true,
			width: 400,
			title: "Mudar EV do canal",
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
				   'text': 'Fechar',
					class: 'cancelar'
				},
				Salvar:{
					click: function(){
						if($('select[name="novoExecutivo"]').val() != ""){
							$('select[name="novoExecutivo"]').closest(".col-sm-100").removeClass("alert");
							$.post(
								"/vogel/web/canais/vincular/mudarev/save/",
								{
									id_ev: $('select[name="novoExecutivo"]').val(),
									id_canal: $this.data('idcanal')
								},
								function(data){
									if(!data.error){
										getMensage($dialog, "sucesso", data.msg);
									}else{
										getMensage($dialog, "error", data.msg);
									}
								}, "json"
							);
						}else{
							$('select[name="novoExecutivo"]').closest(".col-sm-100").addClass("alert");
						}
					},
				   'text': 'Salvar',
				}
			}
		});
		
		loading($dialog);
		
		$.post(
			"/vogel/web/canais/vincular/mudarev/",
			{ id: $("#idProspect").val() },
			function(data){
				$dialog.html(data);
			}
		);
	}); 
	
	$dialog.on("click", "#vincular", function(){
		if($("#idProspect").val() != ""){
			$.post(
				"/vogel/web/canais/vincular/salvar/",
				{ id: $("#idProspect").val() },
				function(data){
					if(!data.error){
						getMensage($dialog, "sucesso", data.msg);
						$dialog.dialog({
							close: function(){
								$table.gridSort("pesquisar");
							}
						});
					}else{
						getMensage($dialog, "error", data.msg);
					}
				}, "json"
			);
		}else{
			getMensage($dialog, "error", "Selecione o prospect para realizar o vinculo!");
		}
	});	
	
	$table.on("click", ".visualizar", function(){
		var $this = $(this);
		
		$dialog.dialog({
			modal: true,
			width: 800,
			title: "Visualizar prospects do canal",
			position: {
				my: "center top+80",
       			at: "center top",
				of: window
			},
			buttons: false
		});
	
		$.post(
			"/vogel/web/canais/listar/visualizarprospect/",
			{ id: $this.data('idcanal') },
			function(data){
				$dialog.html(data);
				$("#tabelaProspects").gridSort({
					itensPerPage: 20,
					paginacao: '#paginacao2',
					sorters: [[ 0, 1],['cid','razao']],
					pathAjax: "/vogel/web/canais/listar/prospect/listar/",
					formulario: "#buscaProspect",
					order: 'DESC',
					loadingStart: false,
					searchChange: true
				});
			}
		);
	});

	$table.gridSort("pesquisar");

	$(".formBuscaAvancada").show();

	$("select[name='resp[]']").multiselect({
		checkAllText: 'Selecionar todos',
		uncheckAllText: 'Limpar todos',
		noneSelectedText: 'Selecione',
		selectedText: '# selecionados',
		minWidth: 220
	}).multiselectfilter({
		placeholder: '',
		label: 'Pesquisar:',
	});

	$("select[name='tipo']").multiselect({
		checkAllText: 'Selecionar todos',
		uncheckAllText: 'Limpar todos',
		noneSelectedText: 'Selecione',
		selectedText: '# selecionados',
		minWidth: 220,
		multiple: false
	}).multiselectfilter({
		placeholder: '',
		label: 'Pesquisar:',
	});

	$("select[name='empresa']").multiselect({
		checkAllText: 'Selecionar todos',
		uncheckAllText: 'Limpar todos',
		noneSelectedText: 'Selecione',
		selectedText: '# selecionados',
		minWidth: 220,
		multiple: false
	}).multiselectfilter({
		placeholder: '',
		label: 'Pesquisar:',
		ajax: "/vogel/web/movi/canais/buscacanal/"
	});

	$("#search").on('click', function(){
		$table.gridSort('pesquisar');
	});

	$table.on('click', '.gerenciar-usuario', function(){
		var $this = $(this);
		$dialog.dialog({
			title: "Usuários do Canal "+ $this.closest('tr').find('td:eq(2)').text(),
			modal: true,
			width: 500,
			position: {
				my: "center top+80",
				at: "center top",
				of: window
			}
		});
		loading($dialog);
		$.post(
			'/vogel/web/movi/canais/usuarios/',
			{
				idcanal: $this.data('idcanal')
			},
			function(data){
				$dialog.html(data);
			}
		)
	});

	$dialog.on('click', '.adicionar-usuario-canal', function(){
		var $this = $(this);
		if($('#dialog-usuario').size() == 0){
			$('body').append('<div id="dialog-usuario"></div>');
		}

		$('#dialog-usuario').dialog({
			width: 400,
			title: 'Adicionar usuário',
			position: {
				my: "center top+80",
				at: "center top",
				of: window
			},
			close: function(){
				$('#dialog-usuario').dialog('destroy').empty();
			}
		});
		loading($('#dialog-usuario'));
		$.post(
			'/vogel/web/movi/canais/usuarios/adicionar/',
			function(data){
				$('#dialog-usuario').html(data);
				$("#cpf").mask('000.000.000-00');
			}
		)
	});

	$dialog.on('click', '.excluir-usuario', function(){
		var $this = $(this);
		if($('#dialog-usuario').size() == 0){
			$('body').append('<div id="dialog-usuario"></div>');
		}

		$('#dialog-usuario').dialog({
			width: 250,
			title: 'Excluir usuário',
			position: {
				my: "center top+80",
				at: "center top",
				of: window
			},
			close: function(){
				$('#dialog-usuario').dialog('destroy');
			},
			buttons: {
				Cancel:{
					click: function(){
						$(this).dialog("destroy");
					},
					'text': 'Fechar',
					class: 'cancelar'
				},
				Salvar:{
					click: function(){
						loading($('#dialog-usuario'));
						$('.ui-dialog-buttonset').hide();
						$.post(
							'/vogel/web/movi/canais/usuarios/excluir/',
							{
								autuser:$this.data('autuser'),
								canacodigoid: $('#id-canal').val()
							},
							function(data){
								if(!data.error){
									$('#dialog-usuario').dialog('destroy').empty();
									$this.closest('tr').remove();
								}else{
									getMensage($('#dialog-usuario'), "error", data.msg);
									$('.ui-dialog-buttonset').show();
								}
							},"json"
						).fail(function(response){
							getMensage($('#dialog-usuario'), "error", response.responseText);
						});
					},
					'text': 'Confirmar'
				}
			}
		}).html('<label>Deseja realmente excluir esse usuário?</label>');
	});

	$document.on("keyup", "#cpf", function(event){
		var $this = $(this);
		if($this.val().length >= 14){
			$.post(
				"/vogel/web/movi/canais/usuarios/buscaPessoaFisica/",
				{
					'cpf': $this.val()
				},
				function(data){
					if(!data.error){
						if(!$.isEmptyObject(data.dados)){
							$this.removeClass('error');
							$("#nome-usuario").val(data.dados.nomeCliente);
							$("#usuario").val(data.dados.cpf);
							$("#cad-user").val(data.dados.id);
						}else{
							$this.addClass('error');
							$("#nome-usuario").val('');
							$("#usuario").val('');
							$("#cad-user").val('');
							getMensage($('#dialog-usuario'), "error", 'Usuário não encontrato, <a href="/sistech/sistech3.0_md_cadastro/cadastra_users.php">clique aqui para adicionar.</a>');
						}
					}
				}, "json"
			);
		}
	});

	$document.on("click", ".salvar-usuario-canal", function(){
		if($.trim($('#cpf').val()) != ''){
			$('#cpf').removeClass('error');
			$.post(
				"/vogel/web/movi/canais/usuarios/adicionar/salvar/",
				{
					caduser:$('#cad-user').val(),
					canalid:$('#id-canal').val()
				},
				function(data){
					if(!data.error){
						var senha = "";
						if(data.pass != ''){
							senha = data.pass
						}else{
							senha = "Usuário ja existente, realizar login com a senha atual";
						}
						getMensage($('#dialog-usuario'), "sucesso", data.msg+"<br/><br/><label><b style='margin-right: 10px;'>Usuário:</b>"+data.user+"</label><br/><label><b style='margin-right: 10px;'>Senha de acesso:</b>"+senha+"</label>");
						$('#dialog-usuario').dialog({
							close:function(){
								$('.gerenciar-usuario[data-idcanal="'+$('#id-canal').val()+'"]').trigger('click');
							}
						});
					}else{
						getMensage($('#dialog-usuario'), "error", data.msg);
					}
				}, "json"
			).fail(function(response){
				getMensage($('#dialog-usuario'), "error", response.responseText);
			});
		}else{
			$('#cpf').addClass('error');
		}
	});

	$table.on('click', '.editar-responsavel', function(){
		var $this = $(this);
		$dialog.dialog({
			title: "Alterar responsável pelo canal "+$this.closest('tr').find('td:eq(2)').text(),
			modal: true,
			width: 400,
			position: {
				my: "center top+80",
				at: "center top",
				of: window
			},
			close: function(){
				$dialog.dialog('destroy').empty();
			}
		});
		loading($dialog);
		$.post(
			"/vogel/web/movi/canais/usuarios/editarresponsavel/",
			{
				'canalCodigoId':$this.data('idcanal')
			},
			function(data){
				$dialog.html(data);
				$dialog.dialog({
					buttons:{
						Cancel:{
							click:function(){
								$(this).dialog("destroy");
							},
							'text': 'Fechar',
							class: 'cancelar'
						},
						Salvar:{
							click: function(){
								$('.ui-dialog-buttonset').hide();
								if($("select#novoEv").val() != ""){
									$.post(
										"/vogel/web/movi/canais/usuarios/editarresponsavel/salvar/",
										{
											canalCodigoId:$('#canalCodigoId').val(),
											walCodigoid:$("select#novoEv").val()
										},
										function(data){
											if(!data.error){
												getMensage($dialog, "sucesso", data.msg);
												$dialog.dialog({
													close: function(){
														window.location.reload();
													}
												});
											}else{
												getMensage($dialog, "error", data.msg);
												$('.ui-dialog-buttonset').show();
											}
										}, "json"
									).fail(function(response){
										getMensage($dialog, "error", response.responseText);
									});
								}else{
									getMensage($dialog, "error", 'Informe o novo executivo de vendas.');
								}
							},
							'text': 'Transferir Canal'
						}
					}
				});

				$("select#novoEv").multiselect({
					checkAllText: 'Selecionar todos',
					uncheckAllText: 'Limpar todos',
					noneSelectedText: 'Selecione',
					selectedText: '# selecionados',
					minWidth: 365,
					maxWidth: 365,
					multiple: false
				}).multiselectfilter({
					placeholder: '',
					label: 'Pesquisar:'
				});
			}
		)
	});
});