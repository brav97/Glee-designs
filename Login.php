<?php
header('Access-Control-Allow-Origin: *');
require_once 'Connection.php';
if(isset($_POST['username']) && isset($_POST['password'])){
  
$sql='SELECT Username,Passname FROM user_data WHERE Username ="'.$_POST['username'].'"';
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)){
$row = mysqli_fetch_assoc($result);

if(password_verify($_POST['password'],$row['Passname'])){
  echo'http://localhost/Chiri_Man/Controller.html';

} else{
  echo'Invalid entry';
}
  } 
}
elseif(isset($_POST['username0']) && isset($_POST['password0'])){
  $password = password_hash($_POST['password0'],PASSWORD_DEFAULT);
  $sql = "INSERT INTO user_data (Username,Passname)VALUES('".$_POST['username0']."','".$password."')";
  $result = mysqli_query($conn,$sql);
  if($result){
    echo 'Data saved';
  }else{
    echo mysqli_errno($conn);
  }
}
elseif (isset($_POST['username1']) && isset($_POST['password1'])&&isset($_POST['newpass'])) {
  # code...
  
  $sql='SELECT Username,Passname FROM user_data WHERE Username ="'.$_POST['username1'].'"';
  $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)){
    $row = mysqli_fetch_assoc($result);
    
    if(password_verify($_POST['password1'],$row['Passname'])){
     if(password_verify($_POST['newpass'],$row['Passname'])){
       echo'Can not use the same password';
     }else{
       $newpass = password_hash($_POST['newpass'],PASSWORD_DEFAULT);
       $sql = 'UPDATE user_data SET Passname ="'.$newpass.'" WHERE Username = "'.$_POST['username1'].'"';
       $result = mysqli_query($conn,$sql);
       if($result){
         echo 'Password changed';
       }else{
         echo 'Password Not changed';
       }
      }
    
    } else{
      echo'Invalid entry';
    }
      } 
  
}


  


?>