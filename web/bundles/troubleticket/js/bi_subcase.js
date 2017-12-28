$(document).ready(function(){
    $("#form_bi_subcase_create").on('submit', function(event){
        var submit_form  = true;
        var subcase_type = $("#select_bi_subcase_type").val();
        var comment      = $("#textarea_bi_subcase_comentario").val();

        //div_error_textarea_bi_subcase_comentario
        //div_error_select_bi_subcase_type

        if(subcase_type != ""){
            $("#div_error_select_bi_subcase_type").hide();

        } else {
            $("#div_error_select_bi_subcase_type").show();
            submit_form = false;

        }

        if(comment != ""){
            $("#div_error_textarea_bi_subcase_comentario").hide();

        } else {
            $("#div_error_textarea_bi_subcase_comentario").show();
            submit_form = false;

        }

        if(submit_form == false){
            event.preventDefault();
            return false;
        }

        $("#div_open_subcase_bi").dialog("destroy");
        showOverlay();
        return true;
    });

    $("#btn_open_subcase_bi").on("click",function(event) {
        event.preventDefault();

        $("#div_open_subcase_bi").dialog({
            modal:true,
            title: "Abrir subcaso de BI",
            width: 300,
            resizable: false,
            position: {
                my: "center top+100",
                at: "center top",
                of: window
            },
            close: function(){
            	$("#select_bi_subcase_type").val('');
            	$("#textarea_bi_subcase_comentario").val('');
                $('.error').hide();
                $(this).dialog("destroy");
            },
            buttons: {
                Salvar:{
                    click: function() {
                        var form = $('#form_bi_subcase_create', this);
                        form.submit();
                    },
                   'text': 'Abrir subcaso',
                },
                Cancel:{
                    click: function() {
                    	$("#select_bi_subcase_type").val('');
                    	$("#textarea_bi_subcase_comentario").val('');
                        $('.error').hide();
                        $(this).dialog("destroy");
                    },
                   'text': 'Cancelar',
                    class: 'cancelar'
                },
            }
        });
    });
});
