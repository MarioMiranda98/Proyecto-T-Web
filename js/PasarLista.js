$(document).ready(function(){
    $(".modal").modal();

    $("#id").on("click",function(){
        $("#modal1").modal("open");
    });

    $("#nombre").on("click",function(){
        $("#modal3").modal("open");
    });


    $("#confirmarID").attr("readonly",true);
    $("#confirmarNombre").attr("readonly",true);
    $("#confirmarRFC").attr("readonly",true);

    $("#checarPorID").validetta({
        bubblePosition: 'bottom',
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        onError:function(e){
            e.preventDefault();
        },
        onValid:function(e){
            e.preventDefault();
            $("#modal1").hide();
            $.ajax({
                method: "post",
                url: "../php/ChecarID.php",
                data: $("#checarPorID").serialize(),
                cache: false,
                success:function(resp){
                    if(resp!=-1){
                        var asistene=JSON.parse(resp);
                        $("input#confirmarID").val(asistene.id_asistente);
                        $("input#confirmarNombre").val(asistene.nombre);
                        $("input#confirmarRFC").val(asistene.rfc);
                        $("#modal2").modal("open");
                        $("#checarPorId").trigger("reset");
                    }
                    else{
                        $.alert({
                            title:"M&eacute;rito Polit&eacute;cnico",
                            content:"Intentalo de nuevo",
                            type:"red",
                            onDestroy:function(){
                               location.reload();
                            }
                        });
                    }
                }
            });
        }
    });

    $("#confirmarPorID").validetta({
        bubblePosition: 'bottom',
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        onError:function(e){
            e.preventDefault();
        },
        onValid:function(e){
            e.preventDefault();
            $.ajax({
                method: "post",
                url: "../php/InsertarID.php",
                data: $("#confirmarPorID").serialize(),
                cache: false,
                success:function(resp){
                    if(resp==1){
                        $.alert({
                            title: "M&eacute;rito Polit&eacute;cnico",
                            content: "Asistente Registrado",
                            type: "green",
                            onDestroy:function(){
                                $("confirmarPorID").trigger("reset");
                                location.reload();
                            }
                        });
                    }
                    else{
                        $.alert({
                            title: "M&eacute;rito Polit&eacute;cnico",
                            content: "Intentalo de nuevo",
                            type: "red",
                            onDestroy:function(){
                                $("confirmarPorID").trigger("reset");
                                location.reload();
                            }
                        });
                    }
                    $("#modal2").modal("close");
                    $("#modal1").modal("close");
                    $("#modal3").modal("close");
                }
            });
        }
    });

    $("#checarPorNombre").validetta({
        bubblePosition: 'bottom',
        bubbleGapTop: 10,
        bubbleGapLeft: -5,
        onError:function(e){
            e.preventDefault();
        },
        onValid:function(e){
            e.preventDefault();
            $("#modal3").hide();
            $.ajax({
                method: "post",
                url: "../php/ChecarNombre.php",
                data: $("#checarPorNombre").serialize(),
                cache: false,
                success:function(resp){
                    if(resp!=-1){
                        var asistene=JSON.parse(resp);
                        $("input#confirmarID").val(asistene.id_asistente);
                        $("input#confirmarNombre").val(asistene.nombre);
                        $("input#confirmarRFC").val(asistene.rfc);
                        $("#modal2").modal("open");
                        $("#checarPorNombre").trigger("reset");
                    }
                    else{
                        $.alert({
                            title:"M&eacute;rito Polit&eacute;cnico",
                            content:"Intentalo de nuevo",
                            type:"red",
                            onDestroy:function(){
                               location.reload();
                            }
                        });
                    }
                }
            });
        }
    });
    
});