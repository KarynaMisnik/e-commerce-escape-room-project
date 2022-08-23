<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact form</title>

<!-- Google font 1.Limelight 2.Maven--> 

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jolly+Lodger&family=Limelight&family=Orbitron:wght@600&family=Special+Elite&display=swap"
rel="stylesheet">

<link
href="https://fonts.googleapis.com/css2?family=Jolly+Lodger&family=Limelight&family=Maven+Pro:wght@500;600&family=Orbitron:wght@600&family=Special+Elite&display=swap"
rel="stylesheet">
<!-- Custom --> 
    <link rel="stylesheet" href="contact_form_style.css">
</head>
<body>
<?php
include_once "header_nav.php";
?>
<main>
    <div class="container">
        <h1>Contact Us</h1>
        
        <form action="mail.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
            <label for="subject">Subject:</label>
            <input type="text" name="subject" id="subject">
            <label for="message">Message</label>
            <textarea name="message" cols="30" rows="10"></textarea>
            <input type="submit" value="Send">
        </form>
    </div>
</main>

<div class="footer">
<?php
include_once "footer.php";
?>
</div>
</body>
</html>