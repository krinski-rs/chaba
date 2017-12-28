$(document).ready(function(){
	var $dialog = $("#dialog");
	var $body = $('body');
	
	$('.valor').mask("#.##0,000", {reverse: true, maxlength: false});
	$('.segundos').mask("#", {reverse: true, maxlength: false});
	
	$("#template, #plano").multiselect({
		multiple: false,
		header: "Selecione a opção",
		noneSelectedText: "Selecione",
		selectedList: 1
	}).multiselectfilter({
		placeholder: '',
		label: 'Pesquisar:'
	});
	
	$(".adicionar-localidade").on("click", function(){
		$dialog.dialog({
			title: "Adicionar Localidade",
			modal: true,
			width: 800,
			position: {
				my: "center top+50",
       			at: "center top",
				of: window
			}
		});
		loading($dialog);
		
		//POST AINDA ESTA SENDO DIRECIONADO PARA OS CONTROLADORES LEGADO
		$.post(
			"/voice/tarifa/inserir/origem",
			function(data){
				$dialog.html(data);
				$dialog.find('table').addClass('gridsort busca-local-origem');
			}
		);
	});
	
	$dialog.on("change", ".origem_search", function(){
		//POST AINDA ESTA SENDO DIRECIONADO PARA OS CONTROLADORES LEGADO
		var data = $(".origem_search").serializeArray();
		data.push({name: 'offset', value: 0});
    	data.push({name: 'limit', value: 200});
		$.post(
			"/voice/tarifa/inserir/origem", 
			data, 
			function(result) {
		 		if(result.linha[0].length > 1) {
		 			$('#listaorigem').html(result.linha);
		 		}
		 		else {
		 			$('#listaorigem').html('<tr><td colspan="6"><div style="text-align: center">Nada encontrado.</div></td></tr>');
		 		}
			}, "json"
		); 
	});
	
	$dialog.on("change", ".excecao_search", function(){
		//POST AINDA ESTA SENDO DIRECIONADO PARA OS CONTROLADORES LEGADO
		var data = $(".excecao_search").serializeArray();
		data.push({name: 'offset', value: 0});
    	data.push({name: 'limit', value: 200});
		$.post(
			"/voice/tarifa/inserir/excecao", 
			data, 
			function(result) {
		 		if(result.linha[0].length > 1) {
		 			$('#listaexcecao').html(result.linha);
		 		}
		 		else {
		 			$('#listaexcecao').html('<tr><td colspan="6"><div style="text-align: center">Nada encontrado.</div></td></tr>');
		 		}
			}, "json"
		); 
	});
	
	$body.on("click", ".areas-locais", function(){
		$this = $(this);
		var cnl = $this.data("cnl");
		//POST AINDA ESTA SENDO DIRECIONADO PARA OS CONTROLADORES LEGADO
		$.get("/voice/tarifa/inserir/locais/"+cnl, function(retorno){
			$this.parents('tr').after(retorno);
		});
		$this.attr('src', '/template/inc/img/detalhar_menos.png');
		$this.attr('title', 'Esconder localidades');
		$this.removeClass('areas-locais');
		$this.addClass('remove-areas-locais');
	});
	
	$body.on("click", ".remove-areas-locais", function(){
		$this = $(this);
		$this.attr('src', '/template/inc/img/detalhar.png');
		$this.closest('tr').next().remove();
		$this.attr('title', 'Visualizar localidades da mesma área local');
		$this.removeClass('remove-areas-locais');
		$this.addClass('areas-locais');
	});
	
	$body.on("click", ".remover-origem", function(){
		var $this = $(this);
		$this.parents('tr').remove();
		$('.listaLocal').remove();
	});
	
	$dialog.on('click', '.adicionar-origem', function(){
		$this = $(this);
		$this.attr('src','/template/inc/img/del.png');
		$this.attr('title','Esconder localidades da mesma área local');
		$this.removeClass('adicionar-origem');
		$this.addClass('remover-origem');
		cnl = $this.data('cnl');
		var $origem = $this.parents('tr').html();
		$this.parents('tr').remove();
		$('table.valores-origem > tbody').append("<tr><input type='hidden' name='cnl[]' class='origem_search' value='"+cnl+"'>" + $origem + "</tr>");
		$('.listaLocal').remove(); 
	});
	
	$body.on('click', '.excluir-execao', function(){
		$(this).closest('tr').remove();
	});
	
	$body.on('click', '.adicionar-excecao', function(){
		$dialog.dialog({
			title: "Adicionar exceções para fixo longa distância",
			modal: true,
			width: 800,
			position: {
				my: "center top+50",
       			at: "center top",
				of: window
			}
		});
		loading($dialog);
		
		//POST AINDA ESTA SENDO DIRECIONADO PARA OS CONTROLADORES LEGADO
		$.get(
			"/voice/tarifa/inserir/excecao", 
			function(retorno){
				$dialog.html(retorno);
				$dialog.find('table').addClass('gridsort busca-excecao');
			}
		);
	});
	
	$dialog.on('click', '.adicionar-excecao-longa', function(){
		$this = $(this);
		var cnl = $this.parents('tr').find('td');
		$('tbody.tabela-destinos').append($('#execaoLDLocalidade').text().replace(/cnl_code/g, cnl.first().text().trim()).replace('cnl_name', $(cnl[2]).text().trim()).replace('cnl_uf', $(cnl[4]).text().trim()));
		$('.dinheiros').mask("#.##0,000", {reverse: true, maxlength: false});
		$('.segundos').mask("#", {reverse: true, maxlength: false});
		$('tbody.tabela-destinos').find('input[name="cnl_exception[]"]:last').val($this.data('cnl'));
		$this.parents('tr').remove();
	});
	
	$("#data-validade").datepicker({
		minDate:0
	});
	
	var $form = $("#salvar-tarifa-form");
	
	 $form.validate({
		ignore: "",
		onkeydown: false,
		onkeyup: false,
		onfocusin: false,
		onfocusout: false,
		onchange: false,
		onclick: false,
		showErrors: function(errorMap, errorList){
			$("input, select").removeClass('error');
			var mensagem = "";
			$.each(errorList, function(index, element){
				$(element.element).addClass('error');
			});
			$("input.error:first, select.error:first").focus();
			return false;
		}
	});
	
	$("#salvar-tarifa").on("click", function(){
		if($form.validate().form() === true){
			$("div.error").remove();
			$dialog.dialog({
				title: "ATENÇÃO",
				modal: true,
				width: 300,
				position: {
					my: "center top+50",
	       			at: "center top",
					of: window
				}
			});
			
			loading($dialog);
			
			$.post(
				"/vogel/web/voz/tarifa/inserir/save/", 
				$("#salvar-tarifa-form").serializeArray(), 
				function(data){
					if(!data.error){
						$dialog.html('<div class="sucesso"><span>'+data.msg+'</span></div>');
						$dialog.dialog({
							close: function(){
								location.herf = "/voice/tarifa/listar/";
								window.location.href = '/voice/tarifa/listar/';
							}
						});
					}else{
						$dialog.html('<div class="error"><span>'+data.msg+'</span></div>');
					}
				},"json"
			).fail(function(response){
				$dialog.html('<div class="error" style="width: 96%;margin: 0 auto;"><span>'+response.responseText+'</span></div>');
			});
		}
	});
	
	$("#0800").on("click", function(){
		var $this = $(this);
		if($this.is(":checked")){
			$("#destino-0800-movel").removeAttr('readonly');
			$("#destino-0800-fixo").removeAttr('readonly');
		}else{
			$("#destino-0800-movel").attr('readonly', true);
			$("#destino-0800-fixo").attr('readonly', true);
		}
	});
	
	$("#template").on("change", function(){
		var $this = $(this);
		if($this.val() != ""){
			$.post(
				"/vogel/web/voz/tarifa/inserir/getplan/"+$this.val(),
				function(data){
					if(!data.error){
						var fee = data.fee;
						// fee LF
						$('input[name="valor-franquia"]').val(fee.price);
						$('input[name="valor-fixo-on"]').val(fee.lf.valueOnnetNormal.replace(".", ","));
						$('input[name="valor-fixo-on-sem-franquia"]').val(fee.lf.valueOnnetOff.replace(".", ","));
						$('input[name="valor-fixo-of"]').val(fee.lf.valueOutnetNormal.replace(".", ","));
						$('input[name="valor-fixo-of-sem-franquia"]').val(fee.lf.valueOutnetOff.replace(".", ","));
						$('input[name="valor-fixo-tempo-minimo"]').val(fee.lf.timeMin);
						$('input[name="valor-fixo-fracionamento"]').val(fee.lf.subdivision);
						// fee LDN
						$('input[name="valor-LDN-on"]').val(fee.ldn.valueOnnetNormal.replace(".", ","));
						$('input[name="valor-LDN-on-sem-franquia"]').val(fee.ldn.valueOnnetOff.replace(".", ","));
						$('input[name="valor-LDN-of"]').val(fee.ldn.valueOutnetNormal.replace(".", ","));
						$('input[name="valor-LDN-of-sem-franquia"]').val(fee.ldn.valueOutnetOff.replace(".", ","));
						$('input[name="valor-LDN-tempo-minimo"]').val(fee.ldn.timeMin);
						$('input[name="valor-LDN-fracionamento"]').val(fee.ldn.subdivision);
						// fee LDE
						$('input[name="valor-LDE-on"]').val(fee.lde.valueOnnetNormal.replace(".", ","));
						$('input[name="valor-LDE-on-sem-franquia"]').val(fee.lde.valueOnnetOff.replace(".", ","));
						$('input[name="valor-LDE-of"]').val(fee.lde.valueOutnetNormal.replace(".", ","));
						$('input[name="valor-LDE-of-sem-franquia"]').val(fee.lde.valueOutnetOff.replace(".", ","));
						$('input[name="valor-LDE-tempo-minimo"]').val(fee.lde.timeMin);
						$('input[name="valor-LDE-fracionamento"]').val(fee.lde.subdivision);
						// fee vc1
						$('input[name="valor-movel"]').val(fee.vc1.valueOutnetNormal.replace(".", ","));
						$('input[name="valor-movel-sem-franquia"]').val(fee.vc1.valueOutnetOff.replace(".", ","));
						$('input[name="valor-movel-tempo-minimo"]').val(fee.vc1.timeMin);
						$('input[name="valor-movel-fracionamento"]').val(fee.vc1.subdivision);
						// fee vc2
						$('input[name="valor-vc2"]').val(fee.vc2.valueOutnetNormal.replace(".", ","));
						$('input[name="valor-vc2-semfranquia"]').val(fee.vc2.valueOutnetOff.replace(".", ","));
						$('input[name="valor-vc2-tempo-minimo"]').val(fee.vc2.timeMin);
						$('input[name="valor-vc2-fracionamento"]').val(fee.vc2.subdivision);
						// fee vc3
						$('input[name="valor-vc3"]').val(fee.vc3.valueOutnetNormal.replace(".", ","));
						$('input[name="valor-vc3-semfranquia"]').val(fee.vc3.valueOutnetOff.replace(".", ","));
						$('input[name="valor-vc3-tempo-minimo"]').val(fee.vc3.timeMin);
						$('input[name="valor-vc3-fracionamento"]').val(fee.vc3.subdivision);
						
						if(fee.target.Fixo){
							$("#0800").attr('checked', true);
							$('input[name="destino-0800-fixo"]').val(fee.target.Fixo.replace(".", ",")).attr('readonly', false);
							$('input[name="destino-0800-movel"]').val(fee.target.Movel.replace(".", ",")).attr('readonly', false);
						}
						
						$('#plano').val(fee.planCodigoid);
						$("#plano").multiselect("updateList");
						$('.valor').mask("#.##0,000", {reverse: true, maxlength: false});
					}else{
						$dialog.dialog({
							title: "Erro ao importar template",
							modal: true,
							width: 400,
							position: {
								my: "center top+50",
				       			at: "center top",
								of: window
							}
						});
						getMensage($dialog, "error", data.msg);
					}
					
				}
			);
		}else{
			
		}
	});
});