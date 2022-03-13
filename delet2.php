<?php 

  require 'datbas.php';
 require 'checkLogin.php';
//delet hotel booking
  $id = $_GET['id'];

  $id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);

  $message = '';

  if(filter_var($id,FILTER_VALIDATE_INT)){
    
    // code .... 
    $sql = "delete from hotels where id =".$id;

    $op1 = mysqli_query($con,$sql);
     
    if($op1){

        $message = "User Deleted .";
    
    }else{

        $message = "Error Try Again !!!";
    }


  }else{
      $message = "Invalid id";
  }


    $_SESSION['message'] = $message;

    header("Location:hotelTabel.php");


?>