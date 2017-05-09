$(document).ready(function(){
    var len = $("#table tr").length;
    $("#table tr").slice(6, len).hide();
    $("#btn").on("click", function(){
        $("#table tr:hidden").slice(0, 5).show(500);
    })
    $("#btn1").on("click", function(){
        if($("#table tr:visible").length > 9){
            $("#table tr:visible").slice(-5).hide(500);
        }
        else if($("#table tr:visible").length <= 5){
            $("#table tr:visible").slice(0).show(500);
            
        }
        
    })

   
});
 