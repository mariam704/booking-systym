<?php 

  include '../helpers/function.php';
  include '../helpers/datbas.php';


 if($_SERVER['REQUEST_METHOD'] == "GET"){
     $Message = [];
     $id  = Sanitize($_GET['id'],1);
      if(!Validator($id,3)){

       $Message['id'] = "Invalid ID";
      }else{
        // db 
        $sql = "delete from articalecategories  where id =".$id;
        $op = mysqli_query($con,$sql);

        if($op){
            $Message['Result'] = "deleted done";
        }else{
            
        $Message['Result'] = "error in delete operation";
        }
     
      }

     $_SESSION['messages'] =  $Message;
    
     header("Location: index.php");

 }



?>