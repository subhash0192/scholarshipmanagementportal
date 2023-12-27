<?php
@$con = new mysqli('localhost', 'root', '', 'student');
if ($con->connect_error) {
    echo '<script>alert("could not connect")</script>';
    exit;
}

if (isset($_GET['rn'])) {
    $rn = $_GET['rn'];

    // Fetch PDF data from the database based on rn
    $qry = "SELECT file_name, file_data FROM stud WHERE rn = '$rn'";
    $result = mysqli_query($con, $qry);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        $fileName = $row['file_name'];
        $fileData = $row['file_data'];

        // Output PDF data with appropriate headers
        header("Content-type: application/pdf");
        header("Content-Disposition: inline; filename=$fileName");
        header("Content-Transfer-Encoding: binary");
        header("Accept-Ranges: bytes");
        echo $fileData;
    } else {
        echo 'PDF not found.';
    }
} else {
    echo 'Invalid request.';
}
?>
