<?php 
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shop";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";
    mysqli_set_charset($conn, "utf8");
    
    $suid = $_GET["suid"];
    if($suid){
        echo "Has value<br/>";
    
        $sql = "DELETE from user where suuid='$suid'";

    if ($conn->query($sql) === TRUE) {
        echo "Deleting successfully";
    } else {
        echo "Error deleting: " . $conn->error;
    }
    }
    echo "<table style=\"width:100%\" cellspacing=\"2\" bgcolor=\"#ccccff\">";
    echo "<tr>";
        echo "<th> ID </th>";
        echo "<th> Username </th>";
        echo "<th> Province </th>";
    echo"</tr>";
    $sql = "SELECT * FROM user ";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            //echo "id: " . $row["suuid"]. " - Name: " . $row["suname"]. "-Province" . $row["suprovince"]. "<br>";
            if($row["suuid"]%2==0){
            echo"<tr>";
            echo"<td bgcolor=\"blue\"><center><font color=\"#ffffff\"><a href=\"http://localhost/60224090111/show.php?suid=".$row["suuid"]."\"> ".$row["suuid"]."</a></font></center></td>";
            echo"<td bgcolor=\"#ffffcc\"><center>".$row["suname"]."</center></td>";
            echo"<td bgcolor=\"ffffcc\"><center>".$row["suprovince"]."</center></td>";
            echo"</tr>";
            }else{
                echo"<tr>";
            echo"<td bgcolor=\"red\"><center><font color=\"#ffffff\"><a href=\"http://localhost/60224090111/show.php?suid=".$row["suuid"]."\"> ".$row["suuid"]."</a></font></center></td>";
            echo"<td bgcolor=\"#e6f9ff\"><center>".$row["suname"]."</center></td>";
            echo"<td bgcolor=\"e6f9ff\"><center>".$row["suprovince"]."</center></td>";
            echo"</tr>";
            }
        }
    } else {
    echo "0 results";
    }

    echo "</table>";

    $conn->close();
    echo"<a href=\"http://localhost/60224090111/formtest.html\">หน้าฟอร์ม</a>";

?>