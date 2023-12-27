<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                    
                        <form action="" method="GET">
						<h1>Delete Notification</h1>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
									
                                        <label>From Date</label>
                                        <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>To Date</label>
                                        <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Click to Delete</label> <br>
                                      <button type="submit" class="btn btn-primary">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                            <tbody>
                            
                            <?php 
                                $con = mysqli_connect("localhost","root","","student");

                                if(isset($_GET['from_date']) && isset($_GET['to_date']))
                                {
                                    $from_date = $_GET['from_date'];
                                    $to_date = $_GET['to_date'];

                                    $query = "DELETE FROM notification WHERE date BETWEEN '$from_date' AND '$to_date' ";
                                    $query_run = mysqli_query($con, $query);

                                    if($query_run!==0)
                                    {
                                        echo '<script type="text/javascript">alert("Deleted Successfully");
										window.location="admin.php";
										</script>';  
                                    }
                                    else
                                    {
                                        echo "No Record Found";
                                    }
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<a href="admin.php" class="btn btn-primary">Back</a></button>
</body>
</html>