<?php 
 include '../helpers/datbas.php';
//   require 'datbas.php';
//  require 'checkLogin.php';
//delet flight booking
  $id = $_GET['id'];

  $id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);

  $message = '';

  if(filter_var($id,FILTER_VALIDATE_INT)){
    
    // code .... 
    $sql = "delete from booking where id =".$id;

    $op = mysqli_query($con,$sql);
     
    if($op){

        $message = "User Deleted .";
    
    }else{

        $message = "Error Try Again !!!";
    }


  }else{
      $message = "Invalid id";
  }


    $_SESSION['message'] = $message;

    header("Location:index.php");


?>