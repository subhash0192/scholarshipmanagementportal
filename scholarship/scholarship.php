<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarship Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

       

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        


        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            margin-top: 10px;
            display: inline-block;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    

    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Establish database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "student";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve data from the form
        $scholarship_name = $_POST['scholarship_name'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        // Insert data into the database
        $sql = "INSERT INTO scholarships (scholarship_name, start_date, end_date) VALUES ('$scholarship_name', '$start_date', '$end_date')";

        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Scholarship information uploaded successfully");</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <h2 class="hii">Upload Scholarship Information</h2>
        <label for="scholarship_name">Scholarship Name:</label>
        <input type="text" name="scholarship_name" required><br>

        <label for="start_date">Start Date:</label>
        <input type="date" name="start_date" required><br>

        <label for="end_date">End Date:</label>
        <input type="date" name="end_date" required><br>

        <input type="submit" value="Submit">
        <a href="admin.php">Back</a>
    </form>
</body>
</html>
