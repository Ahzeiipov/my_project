

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
</head> 

<body> 
	
	<header> 

		<div class="logosec"> 
			<div class="logo">2Cafe</div> 
			<img src= "logo.jpg"
				class=" menuicn s-logo"
				id="menuicn"
				alt="menu-icon"> 
		</div> 

		<div class="searchbar"> 
			<input type="text"
				placeholder="Search"> 
			<div class="searchbtn"> 
			<img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
					class="icn srchicn"
					alt="search-icon"> 
			</div> 
		</div> 

		<div class="message"> 
			<div class="circle"></div> 
			<img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/8.png"
				class="icn"
				alt=""> 
			<div class="dp"> 
			<img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png"
					class="dpicn"
					alt="dp"> 
			</div> 
		</div> 

	</header> 

	<div class="main-container"> 
		<div class="navcontainer"> 
			<nav class="nav"> 
				<div class="nav-upper-options"> 
					<div class="nav-option option1"> 
						<img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png"
							class="nav-img"
							alt="dashboard"> 
						<h3> Dashboard</h3> 
					</div> 

					<div class="option2 nav-option"> 
						<img src= 
"https://i.pinimg.com/564x/38/c9/2d/38c92d9e13203bab12900ffde4280a1b.jpg"
							class="nav-img"
							alt="articles"> 
						<h3> Ice Cafe</h3> 
					</div> 

					<div class="nav-option option3"> 
						<img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/5.png"
							class="nav-img"
							alt="report"> 
						<h3> Report</h3> 
					</div> 

					<div class="nav-option option4"> 
						<img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/6.png"
							class="nav-img"
							alt="institution"> 
						<h3> Institution</h3> 
					</div> 

					<div class="nav-option option5"> 
						<img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png"
							class="nav-img"
							alt="blog"> 
						<h3> Profile</h3> 
					</div> 

					<div class="nav-option option6"> 
						<img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/4.png"
							class="nav-img"
							alt="settings"> 
						<h3> Settings</h3> 
					</div> 

					<div class="nav-option logout"> 
						<img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png"
							class="nav-img"
							alt="logout"> 
						<h3>Logout</h3> 
					</div> 

				</div> 
			</nav> 
		</div> 
		<div class="main"> 

			<div class="searchbar2"> 
				<input type="text"
					name=""
					id=""
					placeholder="Search"> 
				<div class="searchbtn"> 
				<img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
						class="icn srchicn"
						alt="search-button"> 
				</div> 
			</div> 

			<div class="box-container"> 

				<div class="box box1"> 
					<div class="text"> 
						<h2 class="topic-heading">60.5k</h2> 
						<h2 class="topic">Article Views</h2> 
					</div> 

					<img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(31).png"
						alt="Views"> 
				</div> 

				<div class="box box2"> 
					<div class="text"> 
						<h2 class="topic-heading">150</h2> 
						<h2 class="topic">Likes</h2> 
					</div> 

					<img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210185030/14.png"
						alt="likes"> 
				</div> 

				<div class="box box3"> 
					<div class="text"> 
						<h2 class="topic-heading">320</h2> 
						<h2 class="topic">Comments</h2> 
					</div> 

					<img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(32).png"
						alt="comments"> 
				</div> 

				<div class="box box4"> 
					<div class="text"> 
						<h2 class="topic-heading">70</h2> 
						<h2 class="topic">Published</h2> 
					</div> 

					<img src= 
"https://media.geeksforgeeks.org/wp-content/uploads/20221210185029/13.png" alt="published"> 
				</div> 
			</div> 

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
</body> 
</html>

