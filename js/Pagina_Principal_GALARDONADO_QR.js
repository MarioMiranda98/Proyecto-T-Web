$(document).ready(function(){
    $(".modal").modal();

    $("#confirmarID").attr("readonly",true);
    $("#confirmarNombre").attr("readonly",true);
    $("#confirmarRFC").attr("readonly",true);

    let scanner=new Instascan.Scanner({
        video: document.getElementById('preview')
    });

    scanner.addListener("scan", function(contenido){
        $.ajax({
            method: "post",
            url: "../php/ObtenerDatosQR.php",
            data:{contenido:contenido},
            cache:false,
            success:function(resp){
                if(resp!=-1){
                    var asistene=JSON.parse(resp);
                        $("input#confirmarID").val(asistene.id_asistente);
                        $("input#confirmarNombre").val(asistene.nombre);
                        $("input#confirmarRFC").val(asistene.rfc);
                        $("#modal1").modal("open");
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
    });

    Instascan.Camera.getCameras().then(cameras=>{
        if(cameras.length>0){
            scanner.start(cameras[0]);
        }
        else{
            console.error("No hay camaras");
        }
    }); 

    $("#confirmarPorIDQR").validetta({
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
                data: $("#confirmarPorIDQR").serialize(),
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
                }
            });
        }
    });
});