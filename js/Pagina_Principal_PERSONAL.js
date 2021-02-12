$(document).ready(function(){
    $('.modal').modal();
    
    $("#agregar").on("click", function(){
        $("#modal1").modal("open");
    });

    $("select").formSelect();

    $("#formularioAgregaPersonal").validetta({
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
                url: ".././php/AgregarPersonal.php",
                data: $("#formularioAgregaPersonal").serialize(),
                cache: false,
                success:function(resp){
                    if(resp==1){
                        $.alert({
                            title:"M&eacute;rito Polit&eacute;cnico",
                            content:"Personal agregado",
                            type:"green",
                            onDestroy:function(){
                                $("#formularioAgregaPersonal").trigger("reset");
                                $(location).reload();
                            }
                        });
                    }
                    else{
                        $.alert({
                            title:"M&eacute;rito Polit&eacute;cnico",
                            content:"Intentalo de nuevo",
                            type:"red",
                            onDestroy:function(){
                                $("#formularioAgregaPersonal").trigger("reset");
                            }
                        });
                    }
                   $("#modal1").modal("close");
                }
            });
        }
    });
});