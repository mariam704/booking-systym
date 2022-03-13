<?php 

  require 'datbas.php';
 require 'checkLogin.php';

  $id = $_GET['id'];

  $id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);

  $message = '';

  if(filter_var($id,FILTER_VALIDATE_INT)){
    
    // code .... 
    $sql = "delete from loguser where id =".$id;

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

    header("Location:tabelNti.php");


?>