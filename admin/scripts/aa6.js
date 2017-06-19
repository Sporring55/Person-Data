
/*This code i used to sort mysql data.
The code sorts data and outputs the latest data sorted after a location/date.
It has history properties wich saves the data, and can be retrived by clicking on a table row.
Fell free to ask "Threemusketeerz", "Sporring55" if you have any questions about the code*/


// $(document).ready(function(){	
$.getJSON("scripts/aa6.json", function(data) {
	var finArr = jsonSorter(data);
	// console.log(finArr);
	htmlTable2(".container3", finArr);
	$(".aa6").addClass("table table-responsive table-striped table-hover");
	
});
/*All credit to agershun for the htmlTable() function,  
*2nd answer on http://stackoverflow.com/questions/27681838/create-table-with-javascript-array-and-object
*/

function htmlTable2(selector, data, columns) {
	var sel = document.querySelector(selector);
	if(!sel) {
		throw new Error('Selected HTML element is not found');
	};	

	if((!columns) || columns.length == 0) {
        columns = Object.keys(data[0]);
	}

	var tbe = document.createElement('table');
	tbe.className = "aa6";
	var thead = document.createElement('thead');
	tbe.appendChild(thead);
	
  var tre = document.createElement('tr');
  
  for(var i=0;i<columns.length;i++){
    var the = document.createElement('th');

    the.textContent = columns[i];
    tre.appendChild(the);
  }
  thead.appendChild(tre);

	var tbody = document.createElement('tbody');
	tbe.appendChild(tbody);
	for(var j=0;j<data.length;j++){
		var tre = document.createElement('tr');
		tre.id = "aa6";
		tre.name = "aa6";

		tre.style.display == "none";
		for(var i=0;i<columns.length;i++){
			var the = document.createElement('td');
			the.textContent = data[j][columns[i]];
			tre.appendChild(the);
		}
		tbody.appendChild(tre);
	};
	// emptyDOMChildren(sel);
	sel.appendChild(tbe);
	// myBtn();	
	// deleteBtn();

}


 

        







