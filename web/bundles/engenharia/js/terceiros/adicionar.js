$(document).ready(function(){
	var $form = $('#form-adicionar-terceiro'), $dialog = $('#dialog');

	$('#cost').mask('000.000.000.000.000,00', {reverse: true});

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

	$('#adicionar-terceiro').on('click', function(){
		if($form.validate().form() === true){
			$dialog.dialog({
				title:"Atenção",
				modal: true,
				position: {
					my: "center top+80",
					at: "center top",
					of: window
				},
				width:'300'
			});
			loading($dialog);
			$.post(
				"/vogel/web/engenharia/terceiros/adicionar/salvar/",
				$form.serializeArray(),
				function(data){
					if(!data.error){
						getMensage($dialog, "sucesso", data.msg);
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
			);
		}
	});

});