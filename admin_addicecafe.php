<?php include('connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
     integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
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
        }
        .s-button{
         width: 100px;
         justify-content: center;
        }
    </style>
</head>
<body>
<form class="s-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" role="form" enctype="multipart/form-data">
<h3>add menu for ice cafe</h3>
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
</body>
</html>
<?php
if(isset($_POST['submit'])){
  $files = $_FILES['image'];
  $tmp_name = $files['tmp_name'];
  $destination = 'cafe_image/';
  move_uploaded_file($tmp_name, $destination.$files['name']);

  $image = $destination.$files['name']; 
  $ins_user = $con->prepare("INSERT INTO icecafe (name, price,image) VALUES (?, ?, ?)");
  $ins_user->bind_param("sss", $_POST['name'], $_POST['price'],$image);
  $ins_user->execute();

  header('Location: ice_cafe_read.php');
}
?>