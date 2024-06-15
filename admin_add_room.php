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
<h3>add menu for hot cafe</h3>
  <div class="form-group">
    <label> title1</label>
    <input type="text" class="form-control" placeholder="title" name="title1">
  </div>
  <div class="form-group">
    <label>description 1</label>
    <input type="text" class="form-control" placeholder="description" name="description1">
  </div>
  <div class="form-group">
    <label> title 2</label>
    <input type="text" class="form-control" placeholder="title" name="title2">
  </div>
  <div class="form-group">
    <label> description 2</label>
    <input type="text" class="form-control" placeholder="description" name="description2">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Upload room's image</label>
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
  $destination = 'booking/';
  move_uploaded_file($tmp_name, $destination.$files['name']);

  $image = $destination.$files['name']; 
  $ins_user = $con->prepare("INSERT INTO room (title1, description1,title2,description2,image) VALUES (?, ?, ?,?,?)");
  $ins_user->bind_param("sssss", $_POST['title1'], $_POST['description1'], $_POST['title2'], $_POST['description2'],$image);
  $ins_user->execute();
}
?>