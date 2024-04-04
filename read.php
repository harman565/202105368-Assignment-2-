<?php
include 'config.php';

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
    <title><?php echo $name; ?> - Car Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        .car-container {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 20px;
        }
        .car-image {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4"><?php echo $name; ?> - Car Details</h1>
        <div class="car-container">
            <img src="<?php echo $image_path; ?>" alt="<?php echo $name; ?>" class="car-image">
            <h2><?php echo $name; ?></h2>
            <p><strong>Price:</strong> $<?php echo $price; ?></p>
        </div>
    </div>
</body>
</html>
