<?php
$conn = mysqli_connect("localhost","root","");
$s= mysqli_select_db($conn,"collage"); 
$q = mysqli_query($conn,$s);
// try{
//     $conn = mysqli_connect("localhost","root","");
// }catch(Exception $e){
//     echo  $e->getMessage();
// }
?>