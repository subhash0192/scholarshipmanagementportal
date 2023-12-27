<?php
// Include your database connection configuration here (config.php or similar)
@include 'config.php';

session_start();

// Check if the user is logged in
if (!isset($_SESSION['rn'])) {
    header('location:user.php');
}

// Fetch user data based on the session
$rn = $_SESSION['rn'];
$sql = "SELECT * FROM user WHERE rn='$rn'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Now you can safely use $row
    // ... rest of your code
} else {
    echo "Query failed or no rows returned.";
}
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
       // $rn=$row['rn'];
        // File upload handling
        if (isset($_FILES['pdf_file'])) {
            $pdfFileName = $_FILES['pdf_file']['name'];
            $pdfFileTmp = $_FILES['pdf_file']['tmp_name'];
            $pdfFileSize = $_FILES['pdf_file']['size']; // Size of the file in bytes

            // Set the maximum allowed size in bytes (e.g., 5 MB)
            $maxFileSize = 4 * 1024 * 1024;

            // Check if the file is a PDF
            $fileType = pathinfo($pdfFileName, PATHINFO_EXTENSION);
            if (strtolower($fileType) == 'pdf' && $pdfFileSize <= $maxFileSize) {
                // Read the file content
                $pdfFileData = file_get_contents($pdfFileTmp);

                // Insert data into the database
                $insertQuery = "UPDATE stud SET file_name='$pdfFileName', file_data=? WHERE rn='$rn'";
                $stmt = $conn->prepare($insertQuery);
                $stmt->bind_param("s", $pdfFileData);
                $insertResult = $stmt->execute();

                if ($insertResult) {
                    echo '<script type="text/javascript">alert("PDF file uploaded successfully");</script>';
                } else {
                    echo '<script type="text/javascript">alert("Error: ' . $stmt->error . '");</script>';
                }

                $stmt->close();
            } else {
                if ($pdfFileSize > $maxFileSize) {
                    echo '<script type="text/javascript">alert("File size exceeds the limit (5 MB). Please upload a smaller PDF file.");</script>';
                } else {
                echo '<script type="text/javascript">alert("Invalid file type. Please upload a PDF file.");</script>';
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload PDF Files</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        header {
            
            color: #000000;
            text-align: center;
            padding: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px; /* Set a maximum width for the form */
            width: 100%;
        }

        

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
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
    
<header>
        <h2>Upload PDF Files</h2>
        <label>Note: Create a PDF that includes Marksheets, Annual Income details (Income Certificate), Distance Proof (From Home to College), and upload the same.</label>
    </header>

<!-- Your HTML form goes here -->
<form action="" method="POST" enctype="multipart/form-data">
    <label for="pdf_file">Choose a PDF file:</label>
    <input type="file" name="pdf_file" id="pdf_file" accept=".pdf" required>
    <button type="submit" name="submit">Upload</button>
    <a href="user.php">Back</a>
</form>

</body>
</html>
