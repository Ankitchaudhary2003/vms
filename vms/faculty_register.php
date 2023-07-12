<?php
// Establish database connection
$host = 'localhost';
$database = 'db_vms';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Faculty Registration</title>
    <style type="text/css">/* CSS for faculty_register.php */

body {
  font-family: Arial, sans-serif;
  background-color: #f5f5f5;
  margin: 0;
  padding: 20px;
}

h1 {
  text-align: center;
  color: #333;
}

form {
  max-width: 400px;
  margin: 0 auto;
  background-color: #fff;
  padding: 20px;
  border-radius: 4px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

label {
  display: block;
  margin-bottom: 10px;
  color: #666;
}

input[type="text"],
input[type="tel"],
input[type="email"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border-radius: 4px;
  border: 1px solid #ccc;
}

input[type="text"]:focus,
input[type="tel"]:focus,
input[type="email"]:focus,
input[type="password"]:focus {
  outline: none;
  border-color: #4d90fe;
  box-shadow: 0 0 5px rgba(77, 144, 254, 0.5);
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

.error {
  color: red;
  font-size: 14px;
}
#department {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }

.success {
  color: green;
  font-size: 14px;
}
</style>
</head>
<body>
    <h1>Faculty Registration Form</h1>
    <form action="register.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="department">Department:</label>
        <select name="department" id="department">
          <option value="#">--select--</option>
          <?php
            // Fetch data from the "departments" table
            $sql = "SELECT name FROM departments";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($department = $result->fetch_assoc()) {
                    echo '<option value="' . $department['name'] . '">' . $department['name'] . '</option>';
                }
            }
          ?>
        </select><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Register"><a href="faculty_login.php">Already Registered</a>
    </form>
</body>
</html>
