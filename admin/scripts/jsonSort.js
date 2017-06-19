function jsonSorter(objArr) {
    var newObjArr = [];
    var newObjArrId = [];
    
    var obj;
    var objKeys;
    objArr.sort(sortJsonDate);

    if ((!objKeys) || objKeys.length == 0) {
        objKeys = Object.keys(objArr[0]);
        // console.log(objKeys);
    }

    for (var i = 0; i < objArr.length; i++) {
        obj = objArr[i];

        var curValD = objArr[i]["Dato"];
        newObjArr.push(obj);
        for (var j = 0; j < newObjArr.length; j++) {
            var newValD = newObjArr[j]["Dato"];        
        }
    }
    for (var i = 0; i < objArr.length; i++) {
        obj = objArr[i];

        var curValD = objArr[i]["Id"];
        newObjArrId.push(obj);
        for (var j = 0; j < newObjArr.length; j++) {
            var newValD = newObjArr[j]["Id"];        
        }
    }
    newObjArr = newObjArr.sort(sortJsonDate);
    newObjArr = newObjArr.sort(sortJsonId);
    
    return newObjArr;
    // console.log(newObjArr);
};

function sortJsonDate(a, b) {
	a = new Date(a.Dato);
	b = new Date(b.Dato);
	return a > b ? -1 : a < b ? 1 : 0;
};
function sortJsonId(a, b) {
	a = a.Id;
	b = b.Id;
	return b - a;
};
