<html>
<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!--<script src="script.js"></script>-->
    <script src="../scripts/table.js"></script>
    <script src="../scripts/jsonsort.js"></script>
    <script src="../scripts/more.js"></script>
    <script src="../scripts/search.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
    <div class="header">
        <h1>Person Data</h1>
        <input id="search" placeholder="Søg Her" type="text"></input>
        </div>
        

    <div class="container">
       <?php
        /* This code gets the data from mysql and writes a Json file 
        wich is used to show the data with javascript*/
        require_once("../mysql\mysqli_connect.php");


        $response = array();
        $posts = array();
        //Selecting data i want from mysql
        $sql = "SELECT * FROM etÅr";  
        //Connecting to mysql and running a while statement to get all the data
        $delete = "UPDATE etÅr SET navn = null, adresse = null, email = null, num = null WHERE dato < (NOW() - INTERVAL 1 HOUR)";
        $res = mysqli_query($dbc,$delete);
        if($res == false){
            echo "Error \n".mysqli_error($dbc);
        }
       
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
    
        //Here i make my json file wich saves in the "scripts" folder
        $myPath = "scripts/";
        $myFile = $myPath."results.json";
        $fp = fopen($myFile, 'w');
        fwrite($fp, json_encode($response));
        fclose($fp);
        
        


    mysqli_close($dbc);
 
?>
    </div>
    <div class="btnC">
        <button id="btn">show</button>
        <button id="btn1">hide</button>
    </div>
     
</body>
</html>