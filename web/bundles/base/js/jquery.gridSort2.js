$(function(){
	$.widget("custom.gridSort",{
		gridN:0,
		options:{ 	 
				totalItens: 0,
				itensPerPage: 0,
				sorters: [],
				pathAjax: "",
				paginacao: "",
				formulario: "",
				loadingStart: true,
				order: "ASC",
				class: "gridsort",
				all: false,
				searchChange:false,
				complete: false,
				searchStart: false
		},
		_create: function() {
	        this.element.addClass(this.options.class);
	        this.addPesquisa();
	    },
	    _destroy: function(){
	    	$(this.options.paginacao).find(".first, .prev, .next, .last" ).button("destroy");
	    	$(this.options.paginacao).find(".views" ).buttonset("destroy");
	    	$(this.options.paginacao).empty();
	    	$(this.options.paginacao).removeClass('paginacao');
	    	this.element.removeClass(this.element.class);
	    	this.element.find('thead').removeClass('ui-widget-header');
	    	this.element.find('thead > tr').removeClass('ui-widget-header');
	    	$(this.options.paginacao).removeClass("ui-widget-header ui-corner-all");
	    	this.element.find('thead > tr th').find('.ui-icon').remove();
	    	this.element.find('tbody').empty();
	    },
	    addPesquisa:function(){
	    	var settings = this.options;
	    	var element = this.element;
	    	var $this = this;
	    	var paginator = $(this.options.paginacao);
	    	paginator.addClass('paginacao');
	    	var views = $('<span class="views" numero="'+this.gridN+'">');
			var campos20, campos50, campos100;
			this.gridN = $('.views').length;
			if(this.gridN > 0){
				this.gridN = parseInt($('.views:last').attr('numero'))+1;	
			}
			views.append('<input type="hidden" class="paginas" value="'+Math.floor((settings.totalItens/settings.itensPerPage))+'" />');
			views.append('<input type="hidden" class="sort" value="'+((settings.sorters.length>0)?settings.sorters[1][0]:'0')+'" />');
			views.append('<input type="hidden" class="order" value="'+settings.order+'" />');
			views.append('<input type="hidden" class="current" value="0" />');
			views.append('<input type="hidden" class="total" value="'+settings.totalItens+'" />');
			campos20='<input type="radio" name="view['+this.gridN+']" id="view20['+this.gridN+']" value="20"/><label for="view20['+this.gridN+']">20</label>';
			campos50='<input type="radio" name="view['+this.gridN+']" id="view50['+this.gridN+']" value="50"/><label for="view50['+this.gridN+']">50</label>';
			campos100='<input type="radio" name="view['+this.gridN+']" id="view100['+this.gridN+']" value="100"/><label for="view100['+this.gridN+']">100</label>';
			views.append(campos20).append(campos50).append(campos100);
			paginator.append(views);
			paginator.find('input[value="'+settings.itensPerPage+'"]').attr('checked', true);
			if(settings.all === true){
				var todoscampos;
				todoscampos=('<input type="radio" name="view['+this.gridN+']" id="viewall['+this.gridN+']" class="all" value="'+settings.totalItens+'" /><label for="viewall['+this.gridN+']">Todos</label>');
				views.append(todoscampos);
			}
			element.css({marginTop:'10px'});
			element.children("thead").first().children('tr').first().addClass('ui-widget-header');
			var headers = element.children("thead").first().children('tr').first().children('th');
			var indice = null;
			$.each(headers, function(index, obj){
				indice = $.inArray(index, settings.sorters[0]);
				if(indice >= 0){
					var $obj = $(obj);
					var tx = $obj.html();
					$obj.empty();
					if(index == 0 && settings.order == 'ASC'){
						$obj.append('<span campo="'+settings.sorters[1][indice]+'" class="ui-icon ui-icon-triangle-1-s"></span>'+tx);
					}else{
						if(index == 0 && settings.order == 'DESC'){
							$obj.append('<span campo="'+settings.sorters[1][indice]+'" class="ui-icon ui-icon-triangle-1-n"></span>'+tx);
						}else{
							$obj.append('<span campo="'+settings.sorters[1][indice]+'" class="ui-icon ui-icon-triangle-1-s"></span>'+tx);
						}
					}
				}
			});
			paginator.addClass("ui-widget-header ui-corner-all");
			paginator.append('<button class="first">First</button>');
			paginator.append('<button class="prev">Prev</button>');
			paginator.append('<input type="text" name="pag" class="pag" readonly="readonly" value="1 a '+(element.children('tbody').first().children('tr').size())+' de ('+settings.totalItens+')" />');
			paginator.append('<button class="next">Next</button>');
			paginator.append('<button class="last">Last</button>');
			paginator.append(views);
			paginator.find(".first").button({
				text: false,
				icons: {
					primary: "ui-icon-seek-start"
				}
			}).click(function(){
				paginator.find(".current").val('0');
				$this.pesquisar();
	        });
			paginator.find(".prev").button({
				text: false,
				icons: {
					primary: "ui-icon-seek-prev"
				}
			}).click(function(){
	        	var $_offset = paginator.find(".current").val();
	        	if($_offset == 0){
	        		$_offset = paginator.find(".paginas").val();
	        	}else{
	        		$_offset--;
	        		paginator.find(".current").val($_offset);
	        	}
	        	$this.pesquisar();
	        });
			paginator.find(".next").button({
				text: false,
				icons: {
					primary: "ui-icon-seek-next"
				}
			}).click(function(){
	        	var $_offset = paginator.find(".current").val();
	        	if($_offset == paginator.find(".paginas").val()){
	        		$_offset = 0;
	        	}else{
	        		$_offset++;
	        		paginator.find(".current").val($_offset);
	        	}
	        	$this.pesquisar();
	        });
			paginator.find(".last").button({
				text: false,
				icons: {
					primary: "ui-icon-seek-end"
				}
			}).click(function(){
				paginator.find(".current").val(paginator.find(".paginas").val());
				$this.pesquisar();
	        });
			paginator.find(".views").buttonset();
			element.find("th > span.ui-icon").click(function(){
				var $_this = $(this);
	        	if($_this.hasClass('ui-icon-triangle-1-s')){
	        		$_this.removeClass("ui-icon-triangle-1-s").addClass('ui-icon-triangle-1-n');
	        		paginator.find(".order").val('DESC');
	        	}else{
	        		$_this.removeClass("ui-icon-triangle-1-n").addClass('ui-icon-triangle-1-s');
	        		paginator.find(".order").val('ASC');
	        	}
	        	paginator.find(".sort").val($_this.attr('campo'));
	        	$this.pesquisar();
	        });
			paginator.find("input[name='view["+this.gridN+"]']").click(function(event){
	        	 if(paginator.find(".total").val() == $(this).val()){
	        		 paginator.find(".paginas").val('0');
	        		 paginator.find(".current").val('0');
	        	 }else{
	        	 	var pagina = Math.floor((paginator.find(".total").val() / $(this).val()));
	        	 	if(pagina < paginator.find(".current").val()){
	        	 		paginator.find(".current").val(pagina);
	        	 	}
	        	 	paginator.find(".paginas").val(pagina);
	        	 }
	        	 $this.pesquisar();
	        });
			
			if(this.options.searchChange === true && this.options.formulario){
	        	$this = this;
	        	$(this.options.formulario).on('change', function(){
	        		$this.pesquisar();
	        	});
	        }
			
			if(this.options.searchStart == true){
				this.pesquisar();
			}
	    },
		pesquisar:function(){
		   	var settings = this.options;
	    	var element = this.element;
	    	var paginator = $(this.options.paginacao);
	    	var $gridN = this.gridN;
	    	var formulario = [];
			if(settings.formulario){
				formulario = $(settings.formulario).serializeArray();
				formulario.push({name: "offset", value: paginator.find(".current").val()});
				formulario.push({name: "limit", value: paginator.find("input[name='view["+this.gridN+"]']:checked").first().val()});
				formulario.push({name: "sort", value: paginator.find(".sort").val()});
				formulario.push({name: "order", value: paginator.find(".order").val()});
			}else{
				formulario.push({name: "offset", value: paginator.find(".current").val()});
				formulario.push({name: "limit", value: paginator.find("input[name='view["+this.gridN+"]']:checked").first().val()});
				formulario.push({name: "sort", value: paginator.find(".sort").val()});
				formulario.push({name: "order", value: paginator.find(".order").val()});
			}
			var tBody = element.children("tbody:first");
			if (tBody instanceof Object && settings.loadingStart) {
				var size = tBody.length / tBody.children("tr").length;
				if($('.overlayGridsort').size() < 1){
					$('body').append('<div class="ui-widget-overlay overlayGridsort" style="width: 100%; height: 100%; z-index: 9998;"><img src="/template/inc/img/load_home.gif" /><span>Aguarde...</span></div>');
				}
			}else{
				tBody.html('<tr><td colspan="20"><div style="margin: auto; width: 20px"><img src="/template/inc/img/load_home.gif" width="20"></div></td></tr>');
			}
			console.log(formulario);
        	$.post(
        		   '/vogel/web/app_dev.php/financa/cobranca/acaocobranca/listar/',
        		   formulario,
        		   function(retorno){
	        		   	var $tbody = element.children("tbody").first();
	        		   	$tbody.empty();
	        		   	if(retorno.linha.length < 1){
	        		   		$tbody.append('<tr class="error"><td class="error center" colspan="20">Nenhum Resultado Encontrado</td></tr>');
	        		   	}else{
	        		   	   	$.each(retorno.linha, function(index, linha){
		        		   		$tbody.append(linha);
		        		   	});
	        		   	}
	        		   	var ini = ((paginator.find(".current").val()*paginator.find("input[name='view["+$gridN+"]']:checked").val()));
			   			var totalItens = parseInt(retorno.quantidade);
			   			var itensPerPage = parseInt(paginator.find("input[name='view["+$gridN+"]']:checked").val());
			   			paginator.find(".total").val(totalItens);
			   			paginator.find('.paginas').val(Math.floor(totalItens/itensPerPage));
			   			paginator.find('.all').val(totalItens);
	        		   	paginator.find(".pag").val((ini+1)+" a "+(ini+retorno.total)+" de ("+paginator.find(".total").val()+")");
						if(!retorno.quantidade){
							paginator.find(".pag").val((ini+1)+" a "+(ini+retorno.total.length)+" de (1)");
							console.log('quantidade indefinidos no grid #'+element.attr('id')+', o GridSort pode não funcionar corretamente.');
						}
						if(!retorno.total){
							paginator.find(".pag").val("1 a 1 de ("+retorno.quantidade+")");
							console.log('quantidade indefinidos no grid #'+element.attr('id')+', o GridSort pode não funcionar corretamente.');
						}
        		   },
        		   'json'
        	).done(function(){
        		if($('.overlayGridsort').size() >= 1){
					$('.overlayGridsort').remove();
				}
        		if($.isFunction(settings.complete)){
        			settings.complete();
        		}
        	}).error(function(){
        		if($('.overlayGridsort').size() >= 1){
					$('.overlayGridsort').remove();
					tBody.html('<tr class="error"><td class="error center" colspan="20">Erro ao carregar dados. Email para: <strong><a href="mailto:coders@stech.net.br">coders@stech.net.br</a></strong></td></tr>');
				}
        	});
	    }
	});
});