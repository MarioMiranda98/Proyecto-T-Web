$(document).ready(function(){
    $('.modal').modal();
    $("select").formSelect();
    $("#usuario").attr("readonly", true);
    
    $(".borrar").on("click", function(){
        var usuario=$(this).attr("data-usuario");
        $.confirm({
            title: "M&eacute;rito Polit&eacute;cnico",
            content: "¿Eliminar este registro?",
            buttons:{
                Si:function(){
                    $.ajax({
                        method: "post",
                        url: "../php/BorrarPersonal.php",
                        data: {usuario,usuario},
                        cache: false,
                        success:function(resp){
                            if(resp==1){
                                $.alert({
                                    title:"M&eacute;rito Polit&eacute;cnico",
                                    content:"Usuario Eliminado",
                                    type:"green",
                                    onDestroy:function(){
                                        location.reload();
                                    }
                                });
                            }
                            else{
                                $.alert({
                                    title:"M&eacute;rito Polit&eacute;cnico",
                                    content:"Fallo al eliminar",
                                    type:"red",
                                    onDestroy:function(){
                                        
                                    }
                                });
                            }
                        }
                    });
                },
                No:function(){}
            }
        });
    });

    $(".editar").on("click", function(){
        var usuario=$(this).attr("data-usuario");
        $.ajax({
            method: "post",
            url: "../php/EditarPersonal.php",
            data: {usuario:usuario},
            cache: false,
            success:function(resp){
                var myJSON=JSON.parse(resp);
                $("input#usuario").val(myJSON.usuario);
                $("input#nombre").val(myJSON.nombre);
                $("input#primerApe").val(myJSON.primer_ape);
                $("input#segundoApe").val(myJSON.segundo_ape);
                $("input#TipoUsuario").val(myJSON.tip_usuario);
                $("#modal1").modal("open");
            }
        });
    });

    $("#formEdit_AX").validetta({
      bubblePosition: "bottom",
       bubbleGapTop: 10,
       bubbleGapLeft: -5,
       onError:function(e){
            e.preventDefault();
            //alert("Error");
       }, 
       onValid:function(e){
            e.preventDefault();
            $("#modal1").modal("close");
            $.ajax({
                method: "post",
                url: "../php/ModificarPersonal.php",
                data: $("#formEdit_AX").serialize(),
                cache: false,
                success:function(resp){
                    if(resp==1){
                        $.alert({
                            title:"M&eacute;rito Polit&eacute;cnico",
                            content:"Usuario Actualizado",
                            type:"green",
                            onDestroy:function(){
                                location.reload();
                            }
                        });
                    }
                    else{
                        alert(resp);
                        $.alert({
                            title:"M&eacute;rito Polit&eacute;cnico",
                            content:"Fallo al actualizar",
                            type:"red",
                            onDestroy:function(){
                                
                            }
                        });
                    }
                }
            });
       }
    });
});