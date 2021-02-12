$(document).ready(function(){
   $("#show").click(function(){
            if($("#show").is(':checked')){
                $("#contrasena").attr('type','text');
            }
            else{
                $("#contrasena").attr('type','password');
            }
    });

    $("#formularioLogin").validetta({
       bubblePosition: "bottom",
       bubbleGapTop: 10,
       bubbleGapLeft: -5,
       onError:function(e){
            e.preventDefault();
            //alert("Error");
       }, 
       onValid:function(e){
           e.preventDefault();
           $("#btnLogin").attr("disabled",true);
           $.ajax({
               method:"post",
               url: "./php/Index.php",
               data:$("#formularioLogin").serialize(),
               cache:false,
               success:function(resp){
                   if(resp==1){
                        $.alert({
                            title:"M&eacute;rito Polit&eacute;cnico",
                            content:"Bienvenido",
                            type:"green",
                            onDestroy:function(){
                                $(location).attr("href","./php/Pagina_Principal.php");
                            }
                        });
                    }
                    else{
                        $.alert({
                            title:"M&eacute;rito Polit&eacute;cnico",
                            content:"Intentalo de nuevo",
                            type:"red",
                            onDestroy:function(){
                                $(location).attr("href","./Index.html");
                                $("#btnLogin").attr("disabled", false);
                                $("#formularioLogin").trigger("reset");
                            }
                        });
                    }
               }
           });
       }
    });
});