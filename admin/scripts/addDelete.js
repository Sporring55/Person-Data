function deleteBtn() 
{
    
    var tr = document.getElementsByTagName("tr");
    var thead = document.getElementsByTagName("thead");
    var id_nr = document.getElementsByClassName("id-nr");
    for(var i = 0; i < tr.length; i++)
    {
    
        var btn = document.createElement("INPUT");
        btn.value = "Delete";
        var txt = document.createTextNode("Delete");
        btn.append(txt);
        btn.name = "delete";
        btn.type = "submit";
        if(tr[i].id == "m6"){
            btn.id = "dM6";
        }
        if(tr[i].id == "aa1"){
            btn.id = "dAa1";
        }
        if(tr[i].id == "aa6"){
            btn.id = "dAa6";
        }
        btn.addEventListener("click", myDelete);
        if(tr[i].id)
        {
            tr[i].appendChild(btn); 
             
        }    
    }
 
}

function myDelete() {
   var id_nr = document.getElementsByClassName("id-nr");
   var p = document.createElement("INPUT");
   var row = document.createElement("INPUT");
//    p.id = "dId";
   p.type = "text";
   row.type = "text";
   p.name = "dId";
   row.name = "name";
   var arr = []; 
   var parent = this.parentElement;
   var parentId = this.parentElement.id;
   var id = parent.children[0];
   var txt = id.textContent;
   if(parentId == "m6"){
       row.value = "personData";
   }
   else if(parentId == "aa1"){
       row.value = "etår";
   }
   else if(parentId == "aa6"){
       row.value = "seksår";
   }
   p.value = txt
   $(p).appendTo(id_nr);
   $(row).appendTo(id_nr);
}





