<?php
function build_calendar($month, $year){
$mysqli = new mysqli('localhost', 'root', '', 'room');
$stmt = $mysqli->prepare('SELECT * FROM reserve WHERE MONTH(res_date)=? AND YEAR(res_date)=?');
$stmt->bind_param('ss', $month, $year);
$bookings = array();
if($stmt->execute()){
$result = $stmt->get_result();
if($result->num_rows>0){
while($row=$result->fetch_assoc()){
$bookings[] = $row['res_date'];
}   
$stmt->close(); 
}   

}
$daysOfWeek = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');    
$firstDayOfMonth = mktime(0,0,0,$month,1,$year); /* first day as an argument of the func */
$numberDays = date('t', $firstDayOfMonth); /* number of days in a month */
$dateComponents = getdate($firstDayOfMonth); /* info about the first day */
$monthName = $dateComponents['month']; /* month name */
$dayOfWeek = $dateComponents['wday']; /* get index value 0-6 of the first day */
$dateToday = date('Y-m-d'); /* current date */

/* HTML table */
$next_month = date('m', mktime(0,0,0,$month+1,1,$year));
$next_year = date('Y', mktime(0,0,0,$month+1,1,$year));
$calendar = "<center><h2>$monthName $year</h2>";
$calendar.= "<a class='btn btn-primary btn-xs' href='?month=".date('m')."&year=".date('Y')."'>Current month</a>"; 
$calendar.= "<a class='btn btn-primary btn-xs' href='?month=".$next_month."&year=$next_year'>Next month</a></center>"; 
$calendar.= "<table class='table table-bordered'>";
$calendar.= "<tr>";
/* calendar headers */
foreach($daysOfWeek as $day){
$calendar.= "<th class='header'>$day</th>";
}
$calendar.= "</tr><tr>"; /* makes sure that there are only 7 columns for days */
$currentDay = 1;
if($dayOfWeek > 0){
for($k=0; $k < $dayOfWeek; $k++){
$calendar.= "<td class = 'empty'></td>";
}    
}
$month = str_pad($month, 2, "0", STR_PAD_LEFT); /* month number */
while($currentDay <= $numberDays){
if($dayOfWeek == 7){ /* start new row if Sunday is reached */
$dayOfWeek = 0;
$calendar.= "</tr><tr>";
}  
$currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);    
$date = "$year-$month-$currentDayRel";
$dayName = strtolower(date('I',strtotime($date)));
$today = $date==date('Y-m-d')?'today':'';
if($date<date('Y-m-d')){
$calendar.= "<td><h4>$currentDay</h4><button class='btn btn-danger btn-xs'>N/A</button>";
}else{
$totalbookings = checkSlots($mysqli, $date);  
if($totalbookings==9){  
$calendar.= "<td class='$today'><h4>$currentDay</h4><a href='#'class='btn btn-danger btn-xs'>All booked</a>";
}else{
$availableslots = 9 - $totalbookings;   
$calendar.= "<td class='$today'><h4>$currentDay</h4><a href='book_form.php?res_date=".$date."
'class='btn btn-success btn-xs'>Book</a><small><i> $availableslots slots available</i></small></td>";
}
}
/* increment counters */
$currentDay++;
$dayOfWeek++;
}
if($dayName < 7){
$remainingDays = 7 - $dayOfWeek;
for($i=0; $i<$remainingDays; $i++){
$calendar.= "<td class='empty'></td>";
}    
}
return $calendar;
}
function checkSlots($mysqli, $date){
$stmt = $mysqli->prepare('SELECT * FROM reserve WHERE res_date=?');
$stmt->bind_param('s', $date);
$totalbookings = 0;
if($stmt->execute()){
$result = $stmt->get_result();
if($result->num_rows>0){
while($row=$result->fetch_assoc()){
$totalbookings++;
}   
$stmt->close(); 
}    
}
return $totalbookings;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="./book_style.css">
<title>Booking system</title>
</head>
<body>

<?php
include_once 'header_nav.php';
?>    
   
<div class= "container">
<div class= "row">
<div class= "col-md-12">

<?php
$dateComponents = getdate();
if(isset($_GET['month']) && isset($_GET['year'])){
$month = $_GET['month'];
$year = $_GET['year'];    
}else{
$month = $dateComponents['mon'];
$year = $dateComponents['year'];
}
echo build_calendar($month, $year);
?>
</div>
</div>
</div>

</body>
</html>
