<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="e-site/e_style.css">
<title>List of Rooms</title>
</head>

<body>

<?php
include_once 'header_nav.php';
?>
<main>
<section class="cases-links">
<h2>ESCAPE ROOMS</h2>

<!--photo carousel start -->
<div class="slider">
<div class="slide__track">

<div class="slide">
<img src="img1.jpg" alt="room"></div> 

<div class="slide">
<img src="img2.jpg" alt="room"></div> 

<div class="slide">
<img src="img3.jpg" alt="room"></div> 

<div class="slide">
<img src="img4.jpg" alt="room"></div> 

<div class="slide">
<img src="img5.jpg" alt="room"></div> 

<div class="slide">
<img src="img6.jpg" alt="room"></div> 

<div class="slide">
<img src="img7.jpg" alt="room"></div> 

<div class="slide">
<img src="img8.jpg" alt="room"></div> 

<div class="slide">
<img src="img1.jpg" alt="room"></div> 

<div class="slide">
<img src="img2.jpg" alt="room"></div> 

<div class="slide">
<img src="img3.jpg" alt="room"></div> 

<div class="slide">
<img src="img4.jpg" alt="room"></div> 

<div class="slide">
<img src="img5.jpg" alt="room"></div> 

<div class="slide">
<img src="img6.jpg" alt="room"></div> 

<div class="slide">
<img src="img7.jpg" alt="room"></div> 

<div class="slide">
<img src="img8.jpg" alt="room"></div> 
</div>
</div>

</div>
<!--photo carousel end -->

<div class="wrapper">
<div class="rooms">

<?php
$conn = mysqli_connect('localhost', 'root');
$db = mysqli_select_db ($conn, 'room');
$query = "SELECT name, description, location, price, person FROM roomlist ORDER BY id";
$result = mysqli_query($conn, $query) or die("Failed");
if($result -> num_rows > 0){
while($row = mysqli_fetch_assoc($result)){    
echo '<div class="cases-link"><br>' . $row["name"].'<br>'.$row["description"]. 
'<br><a><i class="fa-solid fa-location-dot"></i></a> '. $row["location"] .
'<a class="person_icon"><i class="fa-solid fa-user-group"></i>'. $row["person"] .'</a> 
<a href="book.php"><button id="book_room">Book</button></a></div>';
}
}else{
echo "no result";
}
$conn-> close();
?>
</div>

</div>
</section>
</main>

<div class="wrapper">
<?php
include_once 'footer.php';
?>
</div>
</body>
</html>