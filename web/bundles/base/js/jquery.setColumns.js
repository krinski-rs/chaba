$.widget( "custom.setColumns", {
	// default options
	options: {
		columns: [],
		labels: [],
		icon: "/vogel/web/bundles/base/img/config.png",
		title: "Configurar Campos de Exibição",
		contentTitle: "Marque para exibir as colunas"
	},

	_create: function(){
		var $element = this.element, $_this = this, params = this.options;
		if($element.find('th:last').find("span").size() == 0){
			$element.find('th:last').append("<span class='text'>&nbsp;</span>");
		}

		$element.find('th:last').append('<img src="'+params.icon+'" class="setColumns-configurar-tabela" title="'+params.title+'">');

		$(this.element.find("tr th")).each(function(i){
			var keyStorage = 'hide-coluna-'+i+'-'+$element.attr('id')+'-'+$(location).attr('pathname');
			if(localStorage.getItem(keyStorage)){
				$(this).hide();
			}
		});

		$_this._verificaColunas();


		if($element.hasClass('gridsort')){
			$element.gridSort({
				complete: function(){
					$_this._verificaColunas();
				}
			})
		};

		$(".setColumns-configurar-tabela").on({
			'click':function(){
				var content_columns = '';
				$(params.labels).each(function(i){
					var keyStorage = 'hide-coluna-'+params.columns[i]+'-'+$element.attr('id')+'-'+$(location).attr('pathname'),
						checked    = 'checked';
					if(localStorage.getItem(keyStorage)){
						checked    = '';
					}

					content_columns = content_columns + "<span><input type='checkbox' "+checked+" class='setColumns-"+$element.attr("id")+"' value='"+params.columns[i]+"'>"+params.labels[i]+"</span>";
				});

				$this = $(this);
				$this.tooltip({
					content: "<div class='arrow'></div>"+
								"<div class='title-content'>"+
									params.contentTitle +
									"<span class='setColumns-close' title='Fechar'>X</span>"+
								"</div>"+
								"<div class='setColumns-content'>"+
									content_columns +
								"</div>",
					tooltipClass: "setColumns-toltip",
					position: {
						my: "right top+30",
						at: "right center",
						collision: "flip"
					}
				});

				$this.tooltip("open");

			}
		});

		$(".setColumns-configurar-tabela").on('mouseout', function (e) {
			e.stopImmediatePropagation();
		});

		$("body").on("click", ".setColumns-close", function(){
			id = $(this).closest(".setColumns-toltip").attr("id");
			$(".setColumns-configurar-tabela[aria-describedby='"+id+"']").tooltip("destroy");
		});

		$("body").on("click", ".setColumns-"+$element.attr("id"), function(){
			if($(this).is(":checked")){
				$_this._mostraColuna($(this));
			}else{
				$_this._escondeColuna($(this));
			}
		});
	},

	_refresh: function() {

	},

	_escondeColuna: function($this){
		var keyStorage = 'hide-coluna-'+$this.val()+'-'+this.element.attr('id')+'-'+$(location).attr('pathname');
		this.element.find("tr th:eq("+$this.val()+")").hide();
		$(this.element.find("tr")).each(function(){
			$(this).find("td:eq("+$this.val()+")").hide();
		});

		localStorage.setItem(keyStorage, $this.val());
	},

	_mostraColuna: function($this){
		var keyStorage = 'hide-coluna-'+$this.val()+'-'+this.element.attr('id')+'-'+$(location).attr('pathname');
		this.element.find("tr th:eq("+$this.val()+")").show();
		$(this.element.find("tr")).each(function(){
			$(this).find("td:eq("+$this.val()+")").show();
		});

		localStorage.removeItem(keyStorage);
	},

	_verificaColunas: function(){
		var $element = this.element;
		$(this.element).find("tr").each(function(){
			$(this).find("td").each(function(i){
				var keyStorage = 'hide-coluna-'+i+'-'+$element.attr('id')+'-'+$(location).attr('pathname');
				if(localStorage.getItem(keyStorage)){
					$(this).hide();
				}
			});
		});
	}

});