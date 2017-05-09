$(document).ready(function(){
    $("#search").on("keyup", function(){
        function fSearch() {
            var input, filter, tr, td, a;
                input = document.getElementById("search");
                filter = input.value.toUpperCase();
                tr = document.getElementsByTagName("tr");
                td = document.getElementsByTagName("td");
                th = document.getElementsByTagName("thead");
            for(var i = 0; i < tr.length; i++){         
                a = tr[i];
                if(a.innerHTML.toUpperCase().indexOf(filter) > - 1){
                    tr[i].style.display = "";
                    tr[0].style.display = "";
                }
                else{
                    tr[i].style.display = "none";
                    tr[0].style.display = "";
                }
            }
            if(filter == ""){
                $("#table tr").slice(6,$("#table tr").length).hide();
            }
            
        }
        fSearch();
    })
});