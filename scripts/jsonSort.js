function jsonSorter(objArr) {
    var newObjArr = [];
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
    newObjArr = newObjArr.sort(sortJsonDate);
    return newObjArr;
    // console.log(newObjArr);
};

function sortJsonDate(a, b) {
	a = new Date(a.Dato);
	b = new Date(b.Dato);
	return a > b ? -1 : a < b ? 1 : 0;
};

