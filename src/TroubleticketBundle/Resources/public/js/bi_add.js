$(document).ready(function () {
    $("#form_add_bi").on('submit', function(){
        showOverlay();
    });

    var sintomaXseveridadeArray = [{id:1,sintoma:"Serviço Interrompido", severidade:"Crítica"},
                                  {id:2,sintoma:"Serviço Intermitente/Degradado", severidade:"Alta"},
                                  {id:3, sintoma:"Sem impacto no serviço", severidade:"Baixa"}];

    $('#select_ba_add_sintoma').on('change', function(){
        var valor = $(this).val();

        $.each(sintomaXseveridadeArray, function (key, obj) {
            if (obj.id == valor) {
                $('#input_ba_add_severidade').val(obj.severidade);
            } else if (valor < 1 || valor > 3) {
                $('#input_ba_add_severidade').val('');
            }
        });
    });
});
