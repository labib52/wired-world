<?php
$conn=mysqli_connect("localhost","root","","electronics_e-commerce");
if($conn===false){
    die("error:could not connect.".mysqli_connect_error());
}
if(isset ($_POST[ 'submit'])){
    // Taking all 5 values from the form data(input)
    $first_name = $_POSTI ['fname'];
    $last_name = $_POST['lname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];

$sql = "INSERT INTO feedback (firstname, lastname, email, subject) 
VALUES ('$first_name','$last_name','$email','$subject')";

if (mysqli_query ($conn, $sql)){
echo
"<h3›data stored in database successfully.".
" Please browse your localhost php my admin"
. " to view the updated data‹/h3>";
} else{
echo "ERROR: Hush! Sorry $sql. "
. mysqli_error($conn);
}
}
mysqli_close($conn);
?>