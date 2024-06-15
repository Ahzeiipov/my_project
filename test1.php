

<?php

?>
<!DOCTYPE html> 
<html lang="en"> 

<head> 
	<meta charset="UTF-8"> 
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge"> 
	<meta name="viewport"
		content="width=device-width, 
				initial-scale=1.0"> 
	<title>2Cafe</title> 
	<link rel="stylesheet"
		href="style.css"> 
	<link rel="stylesheet"
		href="responsive.css"> 

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
        .s-button{
         width: 100px;
         justify-content: center;
        }
    </style>
</head> 

<body> 

	<div class="main-container"> 
		<div class="navcontainer"> 
			<nav class="nav"> 
				<div class="nav-upper-options"> 
				
				</div> 
			</nav> 
		

			<div class="report-container"> 
				<div class="report-header"> 
					<h1 class="recent-Articles">Recent Ice cafe Ordered</h1> 
					<button class="view">View All</button> 
				</div> 

				<div class="report-body"> 
					<div class="report-topic-heading"> 
						<h3 class="t-op">name_user</h3> 
						<h3 class="t-op">payment</h3> 
						<h3 class="t-op">phone_number</h3> 
						<h3 class="t-op">time</h3> 
					</div> 

					<div class="items"> 
                    <?php 
                    include('connection.php');
                    $sql = "SELECT * FROM icecafeorder";
                    $data = $con->query($sql);

                    if($data -> num_rows >0){
                        while($row = $data->fetch_assoc()){
                            echo '<div class="item1">';
                            echo '<h3 class="t-op-nextlvl">' . $row['first_name'] . '</h3>';
                            echo '<h3 class="t-op-nextlvl">' . $row['payment'] ."$". '</h3>';
                            echo '<h3 class="t-op-nextlvl">' . $row['phone_number'] . '</h3>';
                            echo '<h3 class="t-op-nextlvl label-tag">Published</h3>';
                            echo '</div>';

                        }
                    }

                    ?>

					</div> 
				</div> 
			</div> 
		</div> 
	</div> 

	<script src="./index.js"></script> 

    <button id="openForm">Open Form</button>

<div id="formContainer" class="s-form">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" role="form" enctype="multipart/form-data">
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
</div>

<script>
    // JavaScript code to handle the popup form
    var openButton = document.getElementById("openForm");
    var formContainer = document.getElementById("formContainer");

    openButton.addEventListener("click", function() {
        formContainer.classList.add("show");
    });

    formContainer.addEventListener("click", function(event) {
        if (event.target === formContainer) {
            formContainer.classList.remove("show");
        }
    });
</script>

<?php
include ('connection.php');
if(isset($_POST['submit'])){
  $files = $_FILES['image'];
  $tmp_name = $files['tmp_name'];
  $destination = 'cafe_image/';
  move_uploaded_file($tmp_name, $destination.$files['name']);

  $image = $destination.$files['name']; 
  $ins_user = $con->prepare("INSERT INTO icecafe (name, price,image) VALUES (?, ?, ?)");
  $ins_user->bind_param("sss", $_POST['name'], $_POST['price'],$image);
  $ins_user->execute();
}
?>
</body> 
</html>

