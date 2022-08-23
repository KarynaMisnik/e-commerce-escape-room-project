<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Google font 1.Limelight 2.Maven--> 

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jolly+Lodger&family=Limelight&family=Orbitron:wght@600&family=Special+Elite&display=swap"
rel="stylesheet">

<link
href="https://fonts.googleapis.com/css2?family=Jolly+Lodger&family=Limelight&family=Maven+Pro:wght@500;600&family=Orbitron:wght@600&family=Special+Elite&display=swap"
rel="stylesheet">

 <!-- Custom font -->

<link rel="stylesheet" href="./price_style.css">

<title>Price</title>
</head>
<body>
<?php
include_once "header_nav.php"
?>
<main>
<h2>Pricing</h2>     
<div class="container">          
<div class="weekdays_price"><h1>Mon-Thu</h1><h3>Game price</h3>

<?php
$conn = mysqli_connect('localhost', 'root');
$db = mysqli_select_db ($conn, 'room');
$query = "SELECT * FROM roomlist ORDER BY id";
$result = mysqli_query($conn, $query) or die("Failed");
if($result -> num_rows > 0){
while($row = mysqli_fetch_assoc($result)){   
echo '<div class="mon_thu">'  .$row["name"]. ' - ' .$row["price"]. ' &#8364;  </div>';
}
}else{
echo "no result";
}
$conn-> close();
?>   

<a href="book.php"><button id="book_room">Book</button></a>
</div>

<div class="weekend_price">
<h1>Fri-Sun & Holidays</h1>  
<h3>Game price</h3>

<?php
$conn = mysqli_connect('localhost', 'root');
$db = mysqli_select_db ($conn, 'room');
$query = "SELECT * FROM roomlist ORDER BY id";
$result = mysqli_query($conn, $query) or die("Failed");
if($result -> num_rows > 0){
while($row = mysqli_fetch_assoc($result)){   
echo '<div class="fri_sun">'.$row["name"]. ' - ' .$row["weekend_price"]. ' &#8364;  </div>';
}
}else{
echo "no result";
}
$conn-> close();
?>   
<a href="book.php"><button id="book_room">Book</button></a>
</div>

<div class="buisness">
<h1>Corporative groups</h1>  
<a href="contact_form_index.php"><button id="book_room">Contact Us</button></a>
</div>  
</div>
</main>

<div class="wrapper">
<?php
include_once 'footer.php';
?>
</div>

</body>
</html>