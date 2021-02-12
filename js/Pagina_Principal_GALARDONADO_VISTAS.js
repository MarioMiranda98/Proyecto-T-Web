$(document).ready(function(){
    $(".pdf").on("click",function(){
        var asistente=$(this).attr("data-asistente");
                $.ajax({
                    method: "post",
                    url: "../php/GenerarPDF.php",
                    data: {id_asistente:asistente},
                    cache: false,
                    success:function(resp){
                        window.open("../php/GenerarPDF.php?id_asistente="+asistente+"");
                    }
                });
    });
});