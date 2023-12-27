<?php
// Include your database connection configuration here (config.php or similar)
@include 'config.php';

// Fetch the list of IDs from the database
$idQuery = "SELECT id FROM stud";
$idResult = mysqli_query($conn, $idQuery);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['approve'])) {
        updateStatus('Approved', $_POST['selected_id']);
    } elseif (isset($_POST['reject'])) {
        updateStatus('Rejected', $_POST['selected_id']);
    }
}

// Function to update the status
function updateStatus($status, $id) {
    global $conn;

    // Update the status in the stud table
    $updateQuery = "UPDATE `stud` SET `status`='$status' WHERE `id`='$id'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        echo '<script type="text/javascript">alert("Status updated successfully");
		window.location="approve1.php";
		</script>';
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Update</title>
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



        label {
    display: block;
    margin-bottom: 10px;
}
form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    
}



select {
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
    margin-right: 10px; /* Add some margin between buttons */
}

button:hover {
    background-color: #45a049;
}
</style>
</head>
<body>
   

    <form method="post">
        <!-- Dropdown to select the ID dynamically -->
        <label for="selected_id">Select ID: </label>
        <select name="selected_id" id="selected_id" required>
            <?php
            // Loop through the fetched IDs and create options
            while ($row = mysqli_fetch_assoc($idResult)) {
                echo "<option value='{$row['id']}'>{$row['id']}</option>";
            }
            ?>
        </select>

        <!-- Your other form fields go here -->

        <!-- Add two submit buttons for "Approve" and "Reject" -->
        <button type="submit" name="approve">Approve</button>
        <button type="submit" name="reject">Reject</button>
    </form>

</body>
</html>
