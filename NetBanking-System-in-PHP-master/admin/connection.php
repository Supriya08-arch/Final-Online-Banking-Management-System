<?php 

    // Defining constant php variable for local host
    
    define('DB_host', 'localhost:3306');
    define('DB_username', 'root');
    define('DB_password', '');
    define('DB_name', 'skybank');
   // $conn = mysqli_connect("localhost", "root", null, "skybank");;
    $conn = mysqli_connect("localhost:3306", "root", "", "skybank");

    if (!$conn) {
        die("connection failed" . mysqli_connect_error());
         echo "Connection Fail";
    }
    // $query = " SELECT * FROM login";
    // $result = mysqli_query($conn, $query) or die("Query Fail");

    // if(mysqli_num_rows($result) > 0){

    //     while($row = mysqli_fetch_assoc($result)){
    //         echo $row['Sr.No']; 
    //         echo $row['AccountNo'];
    //         echo $row['Username']; 
    //         echo $row['Password'];

    //         echo "<br>";
    //     }

    // }

    // mysqli_close($conn);
?>