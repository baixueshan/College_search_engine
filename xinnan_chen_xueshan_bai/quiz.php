<html>
     <head>
         <meta http-equiv="Content-Type"        
            content="text/html; charset=utf-8"/>  
      <!--Import Google Icon Font-->
      <link rel="stylesheet" href="css/material_icons.woff">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="css/materialize.min.css">
      <!-- libraries -->
      <link rel="stylesheet" type="text/css" href="css/main.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
    <body>
     <nav class="white" role="navigation">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo center">
       College Seeker
      </a>
      <ul id="nav-mobile" class="left hide-on-med-and-down">

        <li><a href="home.html">Home</a></li>
        <li><a>About Us</a></li>
         <li><a href="csearch.html">Search Engine</a></li>
      </ul>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a>Login/Register</a></li>
        </ul>
    </div>
</nav>
        <?php
        include 'open.php';
         $sat = $_POST["sat"];
         $act = $_POST["act"];
        $city = $_POST["city"];
        $eth = $_POST["eth"];
        $ret = $_POST["ret"];
        $fee = $_POST["fee"];
        

         if ($eth >= 4) {
          $eth = 0.1;
 }
        if ($eth == 3) {

          $eth = 0.01;

        }

        if($eth <=2) {

         $eth = 0.0001;

        }

          if ($ret >= 4) {
          $ret = 0.9;
 }
        if ($ret == 3) {

          $ret = 0.6;

        }

        if($ret <=2) {

         $ret = 0.3;

}

    if ($fee >= 4) {
          $fee = 60000;
 }
        if ($fee == 3) {

          $fee = 70000;

        }

        if($fee <=2) {

         $fee = 100000;

}

  /*       if(isset($_POST['eth4']) || isset($_POST['eth5'])) {
           echo "I'm here";
           $eth=0.1
 }*/
        
         

/*         if(isset($_POST['eth1']) || isset($_POST['eth2'])) {
           $eth=0.0001
 }

           if(isset($_POST['ret4']) || isset($_POST['ret5'])) {
           $retent=0.9
 }
         if(isset($_POST['ret3'])) {
           $retent=0.5
 }
 
         if(isset($_POST['ret1']) || isset($_POST['ret2'])) {
           $retent=0.3
 }

               if(isset($_POST['afd4']) || isset($_POST['afd5'])) {
           $fee=60000
 }
         if(isset($_POST['afd3'])) {
           $fee=70000
 }
 
         if(isset($_POST['afd1']) || isset($_POST['afd2'])) {
           $fee=100000
 }*/


    if ($act) {
                if (!is_numeric($act)) {
                    die("Error: Invalid input for ACT minimum score.");
                }
            } else {
                $act = "NULL";
            }
   
    if ($sat) {
                if (!is_numeric($sat)) {
                    die("Error: Invalid input for ACT maximum score.");

                    }
                } else {
                $sat = "NULL";
                }

      $mysqli->multi_query("CALL MatchSchool($sat, $act, NULL, $eth, $ret, $fee);");

        //  $mysqli->multi_query("CALL MatchSchool($sat, $act, NULL, $eth, $retent, $fee);");
           // echo "CALL MatchSchool($sat, $act, NULL, NULL, NULL, NULL);";
            $res = $mysqli->store_result();
            if ($res) {
                $row = $res->fetch_assoc();
                
                if (array_key_exists('Result', $row)) {
                    die($row['Result']);
                } else {
                echo "<table border=\"1px solid black\">";

                echo "<tr>";
                echo "<th> School Name </th>";
                echo "<th> URL </th>";
                echo "<th> City </th>";
                echo "<th> State </th>";
                echo "<th> Admission Rate </th>";
                echo "</tr>";

                echo "<tr>";
                    echo "<td>".$row['SchName']."</td>";
                    echo "<td>".$row['URL']."</td>";
                    echo "<td>".$row['City']."</td>";
                    echo "<td>".$row['State']."</td>";
                    echo "<td>".$row['Adm_rate']."</td>";
                    echo "</tr>";           // Print every row of the result.

                while ($row = $res->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['SchName']."</td>";
                    echo "<td>".$row['URL']."</td>";
                    echo "<td>".$row['City']."</td>";
                    echo "<td>".$row['State']."</td>";
                    echo "<td>".$row['Adm_rate']."</td>";
                    echo "</tr>";     		// Print every row of the result.
                
               }
                echo "</table>";
               }
                $res->free();                                              				// Clean-up.
            } else {
                printf("<br>Error: %s\n", $mysqli->error);                 		// The procedure failed to execute.
            }
            $mysqli->close();                                               				// Clean-up.
        ?>

    <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <!--Import angularJS-->
       <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.5/angular.min.js"></script>
       <!--Import materializec,js-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
      <!--import main.js-->
<script type="text/javascript" src="js/main.js"></script>     
   
   </body>
</html>

