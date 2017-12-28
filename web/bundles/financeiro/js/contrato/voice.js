$(document).ready(function(){
	//$("body").append('<div id="dialog"></div>');
	var $dialog = $("#dialog");
	$.post(
		"/vogel/web/financa/contrato/voice/tranfereresponsabilidade/",
		function(data){
			$dialog.dialog({
				title: "Transferência de Responsabilidade",
				modal: true,
				width: 400,
				position: {
					my: "center top+80",
	       			at: "center top",
					of: window
				}
			}).html(data);
			
			$("#cliente-novo").multiselect({
				noneSelectedText: 'Selecione',
				header: "Selecione a opção",
				multiple: false,
				minWidth: 225,
				selectedList: 1
			}).multiselectfilter({
				placeholder: '',
				label: 'Pesquisar:',
				ajax: "/vogel/web/financa/contrato/voice/tranfereresponsabilidade/getcliente/"
			}); 
		}
	);
});