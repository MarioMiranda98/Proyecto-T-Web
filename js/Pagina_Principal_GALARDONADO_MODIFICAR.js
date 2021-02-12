$(document).ready(function(){
    $(".borrar").on("click",function(){
        var asistente=$(this).attr("data-asistente");
        $.confirm({
            title:"M&eacute;rito Polit&eacute;cnico",
            content:"¿Remover a este galardonado?",
            buttons:{
                Si:function(){
                    $.ajax({
                        method:"post",
                        url:"../php/RemoverGalardonado.php",
                        data:{id_asistente:asistente},
                        cache:false,
                        success:function(resp){
                            if(resp==1){
                                $.alert({
                                    title: "M&eacute;rito Polit&eacute;cnico",
                                    content: "Galardonado removido",
                                    type: "green",
                                    onDestroy:function(){
                                        location.reload();
                                    }
                                });
                            }
                            else{
                                $.alert({
                                    title: "M&eacute;rito Polit&eacute;cnico",
                                    content: "Error al borrar",
                                    type: "red",
                                    onDestroy:function(){
                                        location.reload();
                                    }
                                });
                            }
                        }
                    });
                },
                No:function(){
                    
                }
            }
        });
    });
});