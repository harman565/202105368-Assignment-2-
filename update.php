<?php
include 'config.php';

$id = $name = $price = "";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM cars WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $price = $row['price'];
        $image_path = $row['image_path'];
    } else {
        echo '<div class="alert alert-danger" role="alert">Car not found!</div>';
        exit();
    }
} else {
    echo '<div class="alert alert-danger" role="alert">Car ID not provided!</div>';
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Car</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Update Car Details</h3>
                    </div>
                    <div class="card-body">
                        <form action="process_update.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Car Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" id="price" name="price" value="<?php echo $price; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Update Image</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
