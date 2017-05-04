
<html>
<head>
<meta charset="UTF-8">
<link type="text/css" rel="stylesheet" href="addedlagercss.css">
</head>
<body>

<h1 id="head">Tilføj Person-Data</h1>
<?php
if(isset($_POST["submit"])){
    $data_miss = array();   
    if(empty($_POST["navn"])){
        $data_miss[] = "navn";
    }
    else{
        $navn = trim($_POST["navn"]);
    }
    if(empty($_POST["adresse"])){
        $data_miss[]="Adresse";
    }
    else {
        $adresse = trim($_POST["adresse"]);
    }
    
    if(empty($_POST["email"])){
        $data_miss[] = "E-mail";
    }
    else {
        $email= trim($_POST["email"]);
    }
    if(empty($_POST["num"])){
        $data_miss[] = "Num";
    }
    else {
        $num = trim($_POST["num"]);
    }
    if(empty($_POST["anbefal"])){
        $data_miss[] = "Anbefaling";
    }
    else {
        $anbefal = trim($_POST["anbefal"]);
    }
    if(empty($_POST["oversag"])){
        $data_miss[] = "Oversag";
    }
    else {
        $oversag = trim($_POST["oversag"]);
    }
    if(empty($_POST["sted"])){
        $data_miss[] = "By";
    }
    else {
        $sted = trim($_POST["sted"]);
    }
    if(empty($_POST["post"])){
        $data_miss[] = "Post Nummer";
    }
    else {
        $post = trim($_POST["post"]);
    }
    if(empty($_POST["bemærk1"])){
        $data_miss[] = "Bemærkning1";
    }
    else{
        $bemærk1 = trim($_POST["bemærk1"]);
    }
    if(empty($_POST["bemærk2"])){
        $data_miss[] = "Bemærkning2";
    }
    else {
        $bemærk2 = trim($_POST["bemærk2"]);
    }
   
    
    if(empty($data_miss)){
        require_once("../mysql/mysqli_connect.php");
        if($stmt = mysqli_prepare($dbc, "INSERT INTO personData (navn, adresse,  email, num, sted, post, anbefal, oversag, bemærk1, bemærk2) VALUES (?,?,?,?,?,?,?,?,?,?)")){
            mysqli_stmt_bind_param($stmt, "ssssssssss", $navn, $adresse, $email, $num, $sted,$post, $anbefal, $oversag, $bemærk1, $bemærk2);
            mysqli_stmt_execute($stmt);
        }
        
        
        else{
            echo "error" . mysqli_error($dbc);
        }
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        if($affected_rows == 1){
            echo 'Person-Data tilføjet';
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
        }
        else {
            echo "Error ".mysqli_error($dbc);
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);

        }
    }      
        else {
        echo "Vigtig information mangler!<br />";
        foreach ($data_miss as $miss){
            echo "$miss <br />";
        }
    }
}

?>
<form action="http://localhost:8888/Git-hub/Person-data/ind/
addedlager.php" method="post">
<h2 id="over"><b>Skriv ind her</b></h2>
<p id="over"><b>navn:</b><br />
<input type="text"  name="navn" size="30" value=""/>
</p>
<p id="over"><b>Adresse:</b><br />
<input type="text" name="adresse" size="30" value=""/>
</p>

<p id="over"><b>E-mail:</b><br />
<input type="text" name="email" size="30" value=""/>
</p>
<p id="over"><b>num:</b><br />
<input type="text"  name="num" size="30" value=""/>
</p>

<p id="over"><b>By:</b><br />
<input type="text" name="sted" size="30" value=""/>
</p>
<p id="over"><b>Post Nummer:</b><br />
<input type="text" name="post" size="30" value=""/>
</p>
<p id="over"><b>Anbefaling:</b><br />
<input type="text" name="anbefal" size="30" value=""/>
</p>
<p id="over"><b>oversag:</b><br />
<input type="text" name="oversag" size="30" value=""/>
</p>
<p id="over"><b>Bemærkning1:</b><br />
<input type="text" name="bemærk1" size="30" value=" "/>
</p>
<p id="over"><b>Bemærkning2:</b><br />
<input type="text" name="bemærk2" size="30" value=" "/>
</p>

<p>
<input id="btn" type="submit" name="submit" value="Tilføj"/>
</p>
</form>
</body>
</html>