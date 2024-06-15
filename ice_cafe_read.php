<?php
include('connection.php');
include 'cafe_style.php';
$sql = "SELECT * FROM icecafe";
$data  = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1a7779252c.js" crossorigin="anonymous"></script>
    <style>
        .s-form {
            width: 450px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            border: 1px solid gray;
            border-radius: 30px;
            padding: 20px;
            display: none; /* Hide the form initially */
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            z-index: 9999;
        }
        .s-form.show {
            display: block; /* Show the form when needed */
        }
        .s-button {
            width: 100px;
            justify-content: center;
        }
    </style>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" role="form" enctype="multipart/form-data">
        <div class="cafe_table">
            <div class="c">
                <?php
                echo '<h1 class="title">Ice Cafe Menu</h1>';
                $sql = "SELECT * FROM icecafe";
                $result = $con->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="ice_coffee">';
                    echo '<div><img src="' . $row['image'] . '" alt="">';
                    echo '<div>';
                    echo '<p> Name: ' . $row['name'] . '</p>';
                    echo '<p>Price : ' . $row['price'] . '$</p>';
                    echo '<button class="btn"></button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
                ?>
            </div>
        </div>
        <button class="btn btn-success s-button"> <a href="http://localhost/2cafe/test/admin/admin_addicecafe.php">add new</a></button>


        
        <!-- <button id="openForm">Open Form</button>
        <div id="formContainer" class="s-form">
            <form action="<?php // echo $_SERVER['PHP_SELF']; ?>" method="post" role="form" enctype="multipart/form-data">
                <h3>add menu for hot cafe</h3>
                <div class="form-group">
                    <label> Name</label>
                    <input type="text" class="form-control" placeholder="name" name="name">
                </div>
                <div class="form-group">
                    <label>price</label>
                    <input type="text" class="form-control" placeholder="$" name="price">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Upload Avatar</label>
                    <input type="file" name="image">
                    <p class="help-block">Example block-level help text here.</p>
                </div>
                <button type="submit" class="btn btn-success s-button" name="submit">Register</button>
            </form>
        </div> -->




       
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
<script>
// JavaScript code to handle the popup form
var openButton = document.getElementById("openForm");
var formContainer = document.getElementById("formContainer");
var form = formContainer.querySelector("form");

openButton.addEventListener("click", function (event) {
    event.preventDefault(); // Prevent the default behavior of the button
    formContainer.classList.add("show");
});
formContainer.addEventListener("click", function (event) {
    if (event.target === formContainer) {
        formContainer.classList.remove("show");
    }
});
form.addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent the form from being submitted
});
</script> -->



</form>


</body>
</html>




<?php
// include('connection.php');
// if (isset($_POST['submit'])) {
//     if (isset($_POST['name']) && isset($_POST['price']) && isset($_FILES['image'])) {
//         $files = $_FILES['image'];
//         $tmp_name = $files['tmp_name'];
//         $destination = 'cafe_image/';
//         move_uploaded_file($tmp_name, $destination . $files['name']);

//         $image = $destination . $files['name'];
//         $ins_user = $con->prepare("INSERT INTO icecafe (name, price, image) VALUES (?, ?, ?)");
//         $ins_user->bind_param("sss", $_POST['name'], $_POST['price'], $image);
        
//         if ($ins_user->execute()) {
//             echo "Data inserted successfully.";
//         } else {
//             echo "Error inserting data: " . mysqli_error($con);
//         }
//     } else {
//         echo "Cannot add data. Make sure all fields are filled.";
//     }
// }
?>
