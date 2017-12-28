/**
 * Created by djunior on 09/08/2016.
 */
$(document).ready(function(){
    var $dialog = $('#dialog');
    $(".transferenciaProspect select").on("change", function(){
       if(
           ($(this).attr('id') == "canal" && $("input[name='canal-ev']:checked").val() == 1) ||
           ($(this).attr('id') == "executivo" && $("input[name='canal-ev']:checked").val() == 2)){

           $.post(
               "/vogel/web/movi/canais/transferircarteira/listprospect/",
               {
                   wallCodigoid:$('#executivo').val(),
                   cana_codigoid:$('#canal').val()
               },
               function(data){
                   $(".tabela-prospect tbody").empty();
                   if(data['prospect'].length > 0){
                       $(data['prospect']).each(function(i){
                           cid =  data['prospect'][i]['cid'] != null ? '<a href="/financeiro/cliente/dashboard.php?cid='+data['prospect'][i]['cid']+'" target="_blank">'+data['prospect'][i]['cid']+'</a>' : '-';

                           $(".tabela-prospect tbody").append(
                               '<tr><td class="celula center">'+
                               '<input type="checkbox" name="prospect[]" value="'+data['prospect'][i]['id']+'">'+
                               +data['prospect'][i]['idCliente']+
                               ' </td><td class="celula center">'+
                               cid +
                               '</td><td class="celula center"><a href="/sistech/sistech3.0_md_cadastro/showusers.php?UserID='+data['prospect'][i]['idCliente']+'" target="_blank">' +
                               data['prospect'][i]['clientName']
                            +'</a></td></tr>');
                       });
                   }else{
                       $(".tabela-prospect tbody").append('<tr class="error"><td colspan="5" class="error center">Nenhum prospect encontrado!</td></tr>');
                   }
               }, "json"
           );
       }

    });

    $("#transferir").on('click', function(){
        $dialog.dialog({
            modal:true,
            title:"Atenção",
            position: {
                my: "center top+80",
                at: "center top",
                of: window
            },
            autoOpen:false
        });
        if($('#canal').val() == "" || $('#executivo').val() == ""){
            $dialog.dialog("open");
            getMensage($dialog, "error", "Selecione o executivo e o canal para realizar a transferência");
            return false;
        }

        if($("input[name='prospect[]']:checked").size() == 0){
            $dialog.dialog("open");
            getMensage($dialog, "error", "Selecione um ou mais prospects para realizar a transferência");
            return false;
        }

        $.post(
            "/vogel/web/movi/canais/transferircarteira/save/",
            $("#form-transferir-canal").serialize(),
            function(data){
                if(data.error){
                    getMensage($dialog, "error", data.msg);
                }else{
                    getMensage($dialog, "sucesso", data.msg);
                    $("input[name='prospect[]']:checked").closest('tr').remove();
                }
                $dialog.dialog("open");
            }, "json"
        ).fail(function(response){
            getMensage($dialog, "error", response.responseText);
            $dialog.dialog("open");
        });
    });

    $("input[name='canal-ev']").on('click', function(){
        $(".transferenciaProspect").removeClass('displayN');
        var $this = $(this);
        $("#executivo").val('');
        $("#canal").val('');
        $(".gridsort tbody").empty();

        if($this.val() == 1){
            $("div.canal label").text("Do Canal");
            $("div.executivo label").text("Para o Executivo");
            $("div.executivo").insertAfter("div.canal");
        }else{
            $("div.executivo label").text("Do Executivo");
            $("div.canal label").text("Para o Canal");
            $("div.canal").insertAfter("div.executivo");
        }
    });


    $(".marcar-todos").on('click', function(){
        if($(this).is(":checked")){
            $("input[name='prospect[]']").not("input[name='prospect[]']:checked").trigger('click');
        }else{
            $("input[name='prospect[]']:checked").trigger('click');
        }
    });
});
