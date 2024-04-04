<?php
include 'config.php';

if(isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM furniture WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        echo '<div class="alert alert-success" role="alert">Furniture deleted successfully!</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error deleting furniture: ' . mysqli_error($conn) . '</div>';
    }
}

$sql = "SELECT * FROM furniture";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture Catalog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
    <style>
        .btn-view {
            background-color: #28a745;
            color: #fff;
        }
        .btn-edit {
            background-color: #007bff;
            color: #fff;
        }
        .btn-delete {
            background-color: #dc3545;
            color: #fff;
        }
    </style>
</head>
<body>
    <header class="navbar">
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="#">History</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>
    <div class="logo">
        <img src="logo.jpeg" alt="Furniture Logo" class="logo-img">
    </div>
    <div class="paragraph-container">
        <h1>Welcome to Furniture Catalog</h1>
        <p>Explore our wide range of furniture products for your home or office. Find the perfect pieces to complement your space and enhance your lifestyle.</p>
    </div>

    <div class="container">
        <h1 class="mt-4">Furniture Catalog</h1>
        <a href="create.php" class="btn btn-primary mb-4">Add New Furniture</a>
        
        <div class="row">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-md-4">';
                    echo '<div class="card mb-4">';
                    echo '<img src="' . $row["image_path"] . '" class="card-img-top" alt="' . $row["name"] . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row["name"] . '</h5>';
                    echo '<p class="card-text">Price: $' . $row["price"] . '</p>';
                    echo '<a href="read.php?id=' . $row["id"] . '" class="btn btn-view mr-2">View</a>';
                    echo '<a href="update.php?id=' . $row["id"] . '" class="btn btn-edit mr-2">Edit</a>';
                    echo '<a href="index.php?delete_id=' . $row["id"] . '" class="btn btn-delete" onclick="return confirm(\'Are you sure you want to delete this furniture?\')">Delete</a>';
                    echo '</div></div></div>';
                }
            } else {
                echo '<p>No furniture available.</p>';
            }
            ?>
        </div>
    </div>
</body>
</html>
