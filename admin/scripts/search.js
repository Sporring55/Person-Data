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
                table.tHide();
            }
            
        }
        
        fSearch();
        
    })

    
     function tableHide(m6, aa1, aa6)
    {
      
        m6 = document.getElementsByClassName("m6");
        aa1 = document.getElementsByClassName("aa1");
        aa6 = document.getElementsByClassName("aa6");
        this.m6 = m6;
        this.aa1 = aa1;
        this.aa6 = aa6; 
            
        var len = $(".m6 tr").length;
        var len1 = $(".aa1 tr").length;
        var len2 = $(".aa6 tr").length;
            
            

    }
    tableHide.prototype.tHide = function() {
        
                if(this.m6)
                {
                    $(".m6 tbody tr").slice(1, this.len).hide(); 
                  
                }
                if(this.aa1)
                {
                    $(".aa1 tbody tr").slice(1, this.len1).hide();  
            
                }
                if(this.aa6)
                {
                    $(".aa6 tbody tr").slice(1, this.len2).hide();  
                }
                
            }

    var table = new tableHide(); 
    table.tHide();
    deleteBtn();
 });