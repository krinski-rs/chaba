$(document).ready(function(){
	if($('.gridHead').length){
		var offset = $('.gridHead').offset().top;
		var $cabGrid = $('.gridHead'); 
		$(document).on('scroll', function(){
		    if(offset+100 <= $(window).scrollTop()){
		    	if($('.fixed').size() != 1){
			    	$clone = $cabGrid.clone(true, true);
			    	$.each($('.tabelaPrincipal > tbody tr:first td'), function(i){
			    		$clone.find('th').eq(i).attr('width', $(this).width()+8);
			    	});
			    	tamanhoTabela = $('.tabelaPrincipal').width();
			    	$('.gridHead').after($clone.attr('widht', tamanhoTabela));
			    	$clone.addClass('fixed');
			    	$clone.find(".setColumns-configurar-tabela").hide();
		    	}
		    }else{
		    	$('.gridHead.fixed').remove();
		    }
		});
	}
	
	if($("#listaMenu").length && $("#listaMenu").hasClass("navegacaoMenuSistech")){
		$("#listaMenu").menubar({
			autoExpand: true,
			menuIcon: false,
			buttons: true
		});
	}
	
	if($(".buttonBuscaAvancada").length){
		$(".buttonBuscaAvancada").on("click", function(){
			$(".formBuscaAvancada").slideToggle("slow");
		});
	}
});

$.extend({
	redirectPost: function(location, args)
	{
		var form = '';
		$.each(args, function(key, value){
			form += '<input type="hidden" name="'+key+'" value="'+value+'">';
		});
		$('<form action="'+location+'" method="POST">'+form+'</form>').appendTo('body').submit();
	}
});

$(document).ajaxSend(function(event, jqxhr, settings){
	params = getParams();
	if(params.debug){
		var url = settings.url;
		newurl = url.split('/vogel/web/');
		settings.url = "/vogel/web/app_dev.php/"+newurl[1];
	}
});

function loading($dialog){
	$dialog.html("<img src='/vogel/web/bundles/base/img/loading.gif' style='height: 200px; display: block; margin: 20px auto 0;'><span style='font-family:Dax-Bold; font-size:18px; display:block; margin: 0 auto; width:100px;   margin-top: -25px;'>Carregando..</span>");
}

function getMensage($element, $tipo, $msg){
	$element.find("div.error").remove();
	$element.find("div.sucesso").remove();
	if($tipo == "error"){
		$element.prepend('<div class="error">'+
		'<span>'+
			'<strong>Atenção!</strong> '+$msg +
		'</span></div>');
	}else{
		$element.html('<div class="sucesso">'+
		'<span>'+
			'<strong>Atenção!</strong> '+$msg +
		'</span></div>');
	}
}

function getParams(){
	var search = location.search.substring(1);
	if(search){
		return JSON.parse('{"' + decodeURI(search).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"') + '"}');
	}else{
		return false;
	}
}

function replaceCaracter(string){
	var string = string.toLowerCase();
	var $format = string.replace(/[áàâã]/g,'a').replace(/[éèê]/g,'e').replace(/[óòôõ]/g,'o').replace(/[úùû]/g,'u').replace(/[íì]/g,'i').replace(/[ç]/g,'c');
	return $format;
}