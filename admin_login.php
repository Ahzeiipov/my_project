<?php
include('connection.php');
?>
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
<div class="wrapper">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" role="form" class="s-form">
        <h3>Login Form</h3>
        <div class="form-group">
            <label>Admin_id</label>
            <input type="number" class="form-control" placeholder="username" name="admin_id">
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="name" class="form-control" placeholder="username" name="username">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Password" name="password">
        </div>
        <button type="submit" class="btn btn-success s-button" name="submit">Login</button>
    </form>
</div>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $admin_id = $_POST['admin_id'];
    $sql = "SELECT * FROM admin_register WHERE admin_id = $admin_id";
    $getdata = $con->query($sql);
    if ($getdata->num_rows > 0) {
        while ($row = $getdata->fetch_assoc()) {
            if (($username == $row["username"]) && ($password == $row["password"])) {
                header('Location: dasboad.php');
            } else {
                header('Location: admin_register.php');
            }
        }
    }
}
?>