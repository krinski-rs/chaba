$(document).ready(function(){
    $("#form_close_subcase").on('submit', function(event){
        var submit_form  = true;
        var comment      = $.trim($("#textarea_ba_subcase_comentario").val());

        if(comment != ""){
            $("#div_error_textarea_ba_subcase_comentario").hide();

        } else {
            $("#div_error_textarea_ba_subcase_comentario").show();
            submit_form = false;

        }

        if(submit_form == false){
            event.preventDefault();
            return false;
        }

        $("#div_close_subcase_ba").dialog("destroy");
        showOverlay();
        return true;
    });

    $("#btn_ba_subcaso_close").on("click",function(event){
        event.preventDefault();

        $("#div_close_subcase_ba").dialog({
            modal:true,
            title: "Fechar subcaso",
            width: 300,
            resizable: false,
            position: {
                my: "center top+100",
                at: "center top",
                of: window
            },
            close: function(){
                $("#textarea_ba_subcase_comentario").val('');
                $('.error').hide();
                $(this).dialog("destroy");
            },
            buttons: {
                Salvar:{
                    click: function() {

                        var form = $('#form_close_subcase', this);
                        form.submit();
                    },
                   'text': 'Fechar subcaso',
                },
                Cancel:{
                    click: function() {
                        $("#textarea_ba_subcase_comentario").val('');
                        $('.error').hide();
                        $(this).dialog("destroy");
                    },
                   'text': 'Cancelar',
                    class: 'cancelar'
                },
            }
        });
});

    $("#form_ba_subcase_create").on('submit', function(event){
        var submit_form  = true;
        var subcase_type = $("#select_ba_subcase_type").val();
        var comment      = $("#textarea_ba_subcase_comentario").val();
        var materials    = $("#textarea_ba_subcase_materiais").val();

        if(subcase_type != ""){
            $("#div_error_select_ba_subcase_type").hide();

        } else {
            $("#div_error_select_ba_subcase_type").show();
            submit_form = false;

        }

        if(comment != ""){
            $("#div_error_textarea_ba_subcase_comentario").hide();

        } else {
            $("#div_error_textarea_ba_subcase_comentario").show();
            submit_form = false;

        }

        if(materials != ""){
            $("#div_error_textarea_ba_subcase_materiais").hide();

        } else {
            $("#div_error_textarea_ba_subcase_materiais").show();
            submit_form = false;

        }

        if(submit_form == false){
            event.preventDefault();
        }else{
            $("#div_open_subcase_ba").dialog("destroy");
            showOverlay();
	}

        return submit_form;
    });
    
    $("#dialog").on("click", ".view_daily_extract", function(event) {
        //alert($(this).data("subcase") + "<=>" + $(this).data("nome"));
        window.open("/subcase/"+$(this).data("subcase")+"/"+$(this).data("nome"), '_blank');
        
    });
    $("#btn_view_ralotorio_subcase").on("click",function(event) {
        event.preventDefault();
	    event.stopPropagation();
	    
	    $.ajax({
	       method: "POST",
	       url: "/ba/daily/"+$(this).data('reportid'),
	       success: function(data){
	           $("#dialog").empty();
	           var ul = $("<ul/>");
	           $.each(data, function(i, o){
	               var li = $("<li>"+o.code+"</li>");
	               var ulli = $("<ul />");
	               $.each(o.files, function(index, obj){
	                   ulli.append("<li class='view_daily_extract' data-subcase='"+obj.subcase+"' data-nome='"+obj.nome+"'>"+obj.nome+"</li>");
	               });
	               li.append(ulli);
 	               ul.append(li);
 	           });
	           $("#dialog").append(ul);
	           $('.view_daily_extract').css( 'cursor', 'pointer' );
	           $("#dialog").dialog({
	               modal:true,
	               title: "Daily Extract TOA",
	               width: 600,
	               resizable: false,
	               position: {
	                   my: "center top+100",
	                   at: "center top",
	                   of: window
	               },
	               close: function(){
	                   $(this).empty();
	               }
	           });
	       },
	       dataType: "json"
	    });
    });
    
    $("#btn_open_subcase_ba").on("click",function(event) {
        event.preventDefault();

        $("#div_open_subcase_ba").dialog({
            modal:true,
            title: "Abrir subcaso",
            width: 600,
            resizable: false,
            position: {
                my: "center top+100",
                at: "center top",
                of: window
            },
            close: function(){
            	$("#select_ba_subcase_type").val('');
            	$("#textarea_ba_subcase_comentario").val('');
                $('.error').hide();
                $(this).dialog("destroy");
            },
            buttons: {
                Salvar:{
                    click: function() {
                        var form = $('#form_ba_subcase_create', this);
                            $('.error').hide();
                            form.submit();
                    },
                   'text': 'Abrir subcaso',
                },
                Cancel:{
                    click: function() {
                    	$("#select_ba_subcase_type").val('');
                    	$("#textarea_ba_subcase_comentario").val('');
                        $('.error').hide();
                        $(this).dialog("destroy");
                    },
                   'text': 'Cancelar',
                    class: 'cancelar'
                },
            }
        });
    });


    $('#btn_ba_subcaso_pause').on('click', function(event) {
        event.preventDefault();
        var div = $('#pause_modal')

        $(div).dialog({
            modal:true,
            title: 'Pausar Subcaso',
            width: 500,
            resizable: false,
            position: {
                my: 'center top+100',
                at: 'center top',
                of: window
            },
            close: function(){
                $('.error').hide();
                $(this).dialog('destroy');
            },
            buttons: {
                Salvar:{
                    click: function() {
                        $('.error').remove();
                        var form = $('form', this);
                        var reason = $('[name="form[reason]"]', form)
                        if ($(reason).val()) {
                            $(this).dialog('destroy');
                            showOverlay();
                            $(form).submit();
                        } else {
                            var error = $('<div>').append($('<span>').text('Selecione um motivo')).addClass('error');
                            $(reason).after(error);
                        }
                    },
                   'text': 'Pausar subcaso',
                },
                Cancel:{
                    click: function() {
                        $(this).dialog('destroy');
                    },
                   'text': 'Cancelar',
                    class: 'cancelar'
                },
            }
        }).html($(div).html());
    });

    $('#btn_ba_subcaso_restart').on('click', function(event) {
        event.preventDefault();
        var div = $('#restart_modal')

        $(div).dialog({
            modal:true,
            title: 'Reiniciar Subcaso',
            width: 500,
            resizable: false,
            position: {
                my: 'center top+100',
                at: 'center top',
                of: window
            },
            close: function(){
                $('.error').hide();
                $(this).dialog('destroy');
            },
            buttons: {
                Salvar:{
                    click: function() {
                        $('.error').remove();
                        var form = $('form', this);
                        var comment = $('[name="form[comment]"]', form)
                        if ($(comment).val()) {
                            $(this).dialog('destroy');
                            showOverlay();
                            $(form).submit();
                        } else {
                            var error = $('<div>').append($('<span>').text('Campo de preenchimento obrigatório')).addClass('error');
                            $(comment).after(error);
                        }
                    },
                   'text': 'Reiniciar subcaso',
                },
                Cancel:{
                    click: function() {
                        $(this).dialog('destroy');
                    },
                   'text': 'Cancelar',
                    class: 'cancelar'
                },
            }
        }).html($(div).html());
    })

    $('#btn_ba_subcaso_update').on('click', function(event) {
        event.preventDefault();
        var div = $('#update_modal')

        $(div).dialog({
            modal:true,
            title: 'Atualizar Subcaso',
            width: 500,
            resizable: false,
            position: {
                my: 'center top+100',
                at: 'center top',
                of: window
            },
            close: function(){
                $('.error').hide();
                $(this).dialog('destroy');
            },
            buttons: {
                Salvar:{
                    click: function() {
                        $('.error').remove();
                        var form = $('form', this);
                        var comment = $('[name="form[comment]"]', form)
                        if ($(comment).val()) {
                            $(this).dialog('destroy');
                            showOverlay();
                            $(form).submit();
                        } else {
                            var error = $('<div>').append($('<span>').text('Campo de preenchimento obrigatório')).addClass('error');
                            $(comment).after(error);
                        }
                    },
                   'text': 'Atualizar subcaso',
                },
                Cancel:{
                    click: function() {
                        $(this).dialog('destroy');
                    },
                   'text': 'Cancelar',
                    class: 'cancelar'
                },
            }
        }).html($(div).html());
    })
});
