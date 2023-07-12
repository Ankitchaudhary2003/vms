<!DOCTYPE html>
<html>
<head>
    <title>Visitor Information</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        th, td {
            background-color: wheat;
            border: 1px solid #ddd;
            padding: 8px;
        }
        
        th {
            background-color: #f2f2f2;
        }
        
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        tr:hover {
            background-color: #e2e2e2;
        }
        
        h1 {
            text-align: center;
        }
        
        .confirm-button {
            text-align: center;
        }
        
        .allow-button {
            text-align: center;
        }
    </style>
   
</head>
<body>
    <h1>Visitor Information</h1>

    <?php
    // Connect to the database
    $servername = "localhost"; 
    $username = "root";      
    $password = "";             
    $dbname = "db_vms";         

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch data from the "info_visitor" table
    $sql = "SELECT * FROM info_visitor";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display the data in a table
        echo "<table>";
        echo "<tr><th>Name</th><th>Contact No.</th><th>Purpose</th><th>Meeting To</th><th>Comment</th><th>Action</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["Name"] . "</td>";
            echo "<td>" . $row["Contact"] . "</td>";
            echo "<td>" . $row["Purpose"] . "</td>";
            echo "<td>" . $row["meetingTo"] . "</td>";
            echo "<td>" . $row["Comment"] . "</td>";
            echo "<td><a href='allow.php?id=" . $row["ID"] . "' class='allow-button'>Allow</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No records found.";
    }

    ?>
    
</body>
</html>
