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
<h3>Register</h3>
  <div class="form-group">
    <label>First Name</label>
    <input type="text" class="form-control" placeholder="firstname" name="firstname">
  </div>
  <div class="form-group">
    <label>Last Name</label>
    <input type="text" class="form-control" placeholder="lastname" name="lastname">
  </div>
  <div class="form-group">
    <label>Phone Number</label>
    <input type="phone" class="form-control" placeholder="Phone number" name="phone">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" placeholder="Email" name="email">
  </div>
  <div class="form-group">
    <label>Username</label>
    <input type="text" class="form-control" placeholder="username" name="username">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" placeholder="password" name="password">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Upload Avatar</label>
    <input type="file" name="avatar">
    <p class="help-block">Example block-level help text here.</p>
  </div>
  <button type="submit" class="btn btn-success s-button" name="submit">Register</button>
</form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
  $files = $_FILES['avatar'];
  $tmp_name = $files['tmp_name'];
  $destination = 'avatar/';
  move_uploaded_file($tmp_name, $destination.$files['name']);

  $avatar = $destination.$files['name']; 
  $ins_user = $con->prepare("INSERT INTO admin_register (firstname, lastname, phone, email, avatar, username, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
  $ins_user->bind_param("sssssss", $_POST['firstname'], $_POST['lastname'], $_POST['phone'], $_POST['email'], $avatar, $_POST['username'], $_POST['password']);
  $ins_user->execute();

  header('Location: dasboad.php');
}
?>
