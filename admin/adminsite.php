<html>
<head>
</head>
<body>
<form method="post" action="">
<span>Insert</span>
<select name="table" placeholder="table">
<option value="persondata">6 måneder</option>
<option value="etÅr">1 År</option>
<option value="seksÅr">6 År</option>

</select>
<span>From</span>
<select name="table2" placeholder="table">
<option value="persondata">6 måneder</option>
<option value="etÅr">1 År</option>
<option value="seksÅr">6 År</option>

</select>

<input type="text" name="txt" placeholder="navn"></input>
<input type="submit" name="submit"></input>
</form>
<?php
require_once("../data/mysql/mysqli_connect.php");

if(isset($_POST["submit"])){
    $txt = $_POST["txt"];
    $table = $_POST["table"];
    $table2 = $_POST["table2"];
    $query = "INSERT INTO ".$table."(navn, adresse, email, num, sted, post, dato,andbefal,oversag,bemærk1, bemærk2) 
    SELECT navn, adresse, email, num, sted, post, dato, andbefal, oversag, bemærk1, bemærk2 FROM ".$table2." UPDATE ".$table2." SET dato = NOW() WHERE p_id='".$txt."'";
 
    $trans = mysqli_query($dbc, $query);
    if($trans){
        $delete ="DELETE FROM $table2 WHERE p_id='".$txt."'";
        mysqli_query($dbc, $delete);
    }else {
        echo "Error ".mysqli_error($dbc);
    }
}

?>
</body>