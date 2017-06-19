<html>
<head>
<link type="text/css" rel="stylesheet" href="admincss.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!--<script src="script.js"></script>-->
    <script src="scripts/m6.js"></script>
    <script src="scripts/aa1.js"></script>
    <script src="scripts/aa6.js"></script>
    <script src="scripts/addDelete.js"></script>
    
    
    
    <script src="scripts/jsonsort.js"></script>
    <script src="scripts/search.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <!--<script src="../scripts/search.js"></script>-->
    
    <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" rel="stylesheet">-->

<!-- Latest compiled and minified JavaScript -->



</head>
<body>

<?php 
 /* This code gets the data from mysql and writes a Json file 
        wich is used to show the data with javascript*/
        

    require_once("../data/mysql\mysqli_connect.php");    
function m6($dbc) {
  
        $response = array();
        $posts = array();
        //Selecting data i want from mysql
        $sql = "SELECT * FROM personData";  
       
        if($result = mysqli_query($dbc, $sql)){
            while($row = mysqli_fetch_assoc($result)){
                //Giving names to the data (Some danish in there ignore it) also i put it in my posts array.
                $posts["Id"] = $row["p_id"];
                $posts["Navn"] = $row["navn"];
                $posts["Adresse"] = $row["adresse"];
                $posts["E-mail"] = $row["email"];
                $posts["num"] = $row["num"];
                $posts["By"] = $row["sted"];
                $posts["Post NR"] = $row["post"];
                $posts["Dato"] = $row["dato"];
                $posts["Anbefaling"] = $row["andbefal"];
                $posts["Oversag"] = $row["oversag"];
                $posts["Bemærkning1"] = $row["bemærk1"];
                $posts["Bemærkning2"] = $row["bemærk2"];
                
                
                
                //pushing all the data together so i can compress it to a json file
                array_push($response, $posts);
                
                

            }
            
        }
        $myPath1 = "scripts/";
        $myFile1 = $myPath1."m6.json";
        $fp1 = fopen($myFile1, 'w');
        fwrite($fp1, json_encode($response));
        fclose($fp1);

}

function aa1($dbc) {
    
        $response = array();
        $posts = array();
        //Selecting data i want from mysql
        $sql = "SELECT * FROM etår";  

       
        if($result = mysqli_query($dbc, $sql)){
            while($row = mysqli_fetch_assoc($result)){
                //Giving names to the data (Some danish in there ignore it) also i put it in my posts array.
                $posts["Id"] = $row["p_id"];
                $posts["Navn"] = $row["navn"];
                $posts["Adresse"] = $row["adresse"];
                $posts["E-mail"] = $row["email"];
                $posts["num"] = $row["num"];
                $posts["By"] = $row["sted"];
                $posts["Post NR"] = $row["post"];
                $posts["Dato"] = $row["dato"];
                $posts["Anbefaling"] = $row["andbefal"];
                $posts["Oversag"] = $row["oversag"];
                $posts["Bemærkning1"] = $row["bemærk1"];
                $posts["Bemærkning2"] = $row["bemærk2"];
                
                
                
                //pushing all the data together so i can compress it to a json file
                array_push($response, $posts);
                
                

            }
            
        }
        $myPath1 = "scripts/";
        $myFile1 = $myPath1."aa1.json";
        $fp1 = fopen($myFile1, 'w');
        fwrite($fp1, json_encode($response));
        fclose($fp1);
        
}
function aa6($dbc) {
    
        $response = array();
        $posts = array();
        //Selecting data i want from mysql
        $sql = "SELECT * FROM seksår";  
       
        if($result = mysqli_query($dbc, $sql)){
            while($row = mysqli_fetch_assoc($result)){
                //Giving names to the data (Some danish in there ignore it) also i put it in my posts array.
                $posts["Id"] = $row["p_id"];
                $posts["Navn"] = $row["navn"];
                $posts["Adresse"] = $row["adresse"];
                $posts["E-mail"] = $row["email"];
                $posts["num"] = $row["num"];
                $posts["By"] = $row["sted"];
                $posts["Post NR"] = $row["post"];
                $posts["Dato"] = $row["dato"];
                $posts["Anbefaling"] = $row["andbefal"];
                $posts["Oversag"] = $row["oversag"];
                $posts["Bemærkning1"] = $row["bemærk1"];
                $posts["Bemærkning2"] = $row["bemærk2"];
                
                
                
                //pushing all the data together so i can compress it to a json file
                array_push($response, $posts);
                
                

            }
            
        }
        $myPath1 = "scripts/";
        $myFile1 = $myPath1."aa6.json";
        $fp1 = fopen($myFile1, 'w');
        fwrite($fp1, json_encode($response));
        fclose($fp1);
        
}

function transfer($dbc)
{
    if(isset($_POST["btn"]))
    {
        
        $from = $_POST["from"];
        $to = $_POST["to"];
        $num = $_POST["num"];
        $sql = "INSERT INTO $to (navn, adresse, email, num, sted, post, andbefal, oversag, bemærk1, bemærk2) SELECT navn, adresse, email, num, sted, post, andbefal, oversag, bemærk1, bemærk2 FROM $from WHERE p_id = $num";
        $delete = "DELETE FROM $from WHERE p_id = $num";
        $query = mysqli_query($dbc, $sql);
        
        if($query == false)
        {
            echo "Error \n".mysqli_error($dbc);
        }
        else
        {
            mysqli_query($dbc, $delete);
        }
        mysqli_escape_string($dbc, $sql);
        mysqli_escape_string($dbc, $delete);


    }
}
function rowDelete($dbc)
{
    if(isset($_POST["delete"]))
    {
        $from = $_POST["name"];
        $num = $_POST["dId"];
        $delete = "DELETE FROM $from WHERE p_id = $num";
        $dQuery = mysqli_query($dbc, $delete);
        if($dQuery == true){
        
        }else {
            echo "Error \n".mysqli_error($dbc);
        }
        mysqli_escape_string($dbc, $delete);
    }
}      
    
    aa1($dbc);
    m6($dbc);
    aa6($dbc);
    transfer($dbc);
    rowDelete($dbc);
    // mysqli_close($dbc);
        
?>
<div class="container-fluid">

<h1 id="head">Administrator Side</h1>
<div class="content">

<div class="col-md-2 sidebar">
   <form  action="http://localhost:8888/Git-hub/Person-data/admin/adminsite.php" method="post">
        <h2>Overfør Data</h2>
        <h3 id="from">Fra</h3>
        <input name="from"></input>
        <h3 id="to">Til</h3>
        <input name="to"></input>
        <h3 id="num">ID</h3>
        <input size="4" name="num" ></input>
        <p><input type="submit" name="btn" id="btn"></input></p>
    </form>
    </div>
<div class="col-md-8 search">

        <h1 id="searchH">Søg</h1>
        <input id="search" placeholder="Søg"></input>

        <h2 class="tHead">6-måneder</h2>
        <form class="id-nr" method="post" action="http://localhost:8888/Git-hub/Person-data/admin/adminsite.php">

        <div class="container1">
        </div>
        </form>
        <h2 class="tHead">1-År</h2>
        <form class="id-nr" method="post" action="http://localhost:8888/Git-hub/Person-data/admin/adminsite.php">
        <div class="container2">
        </div>
        </form>
        <h2 class="tHead">6-År</h2>
        <form class="id-nr" method="post" action="http://localhost:8888/Git-hub/Person-data/admin/adminsite.php">
        <div class="container3">
        </div>
        </form>
        
        
    </div>
</div>





</div>


</body>
</html>