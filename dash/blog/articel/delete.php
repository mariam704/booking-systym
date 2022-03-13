<?php 

  include '../helpers/function.php';
  include '../helpers/datbas.php';


 if($_SERVER['REQUEST_METHOD'] == "GET"){

   // LOGIC .... 
     $Message = [];
     $id  = Sanitize($_GET['id'],1);
    
      if(!Validator($id,3)){

       $Message['id'] = "Invalid ID";

    
      }else{


         $sql = "select image from articales where id = ".$id;
         $op  = mysqli_query($con,$sql);         
         $data = mysqli_fetch_assoc($op);
         if(file_exists('./uploads/'.$data['image'])){
             unlink('./uploads/'.$data['image']);
         }
         


        // DB Opretaion ... 
        $sql = "delete from articales where id =".$id;

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