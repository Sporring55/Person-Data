<html>
<head>
</head>
<body>
<form action="http://localhost:8888/Git-hub/Person-data/admin.php">
<input name="txt" id="txt" type="text"></input>

<input name="change" id="change" type="submit"></input>
</form>
<?php

function changeTime(){

    require_once("mysql/mysqli_connect.php");
    if(isset($_POST["change"])){
        if(isset($_POST["txt"])){
            $txt = $_POST["txt"];
               $delete = "UPDATE personData SET navn = null, adresse = null, email = null, num = null WHERE dato < (NOW() - INTERVAL '%".$txt."%' MINUTE)";
               $res = mysqli_query($dbc,$delete);
               if($res == false){
                echo "Error \n".mysqli_error($dbc);
                }
        }
    }
}
changeTime();
?>
</body>
</html>