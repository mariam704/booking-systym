<?php 
    
   include '../helpers/function.php';
   include '../helpers/datbas.php';

   $id = '';
   if($_SERVER['REQUEST_METHOD'] == "GET"){

    // LOGIC .... 
      $Message = [];
      $id  = Sanitize($_GET['id'],1);
     
       if(!Validator($id,3)){
 
        $Message['id'] = "Invalid ID";
        
        $_SESSION['messages'] = $Message;
       header("Location: index.php");
       }

    }







   if($_SERVER['REQUEST_METHOD'] == "POST"){
       
    // LOGIC ... 

      $title = CleanInputs($_POST['title']);
      $id    = Sanitize($_POST['id'],1);


      $Message = [];
      # Check Validation ... 
      if(!Validator($title,1)){
      
        $Message['titlee'] = "Title Field Required";

      }
  
      
      $length = 3;

      if(!Validator($title,2,$length)){
      
        $Message['titleLength'] = "Title length must be > ".$length;

      }



      if(!Validator($id,3)){
          $Message['id'] = "Invalid id";
      }


     if(count($Message) > 0){
       $_SESSION['messages'] = $Message;
             
    }else{

    # DB OPERATION .... 

    $sql = "update articalecategories  set title='$title' where id = ".$id;

    $op  = mysqli_query($con,$sql);

    if($op){

         $Message['Result'] = "Data updated.";
       
    }else{
         $Message['Result']  = "Error Try Again.";
     
     }
        $_SESSION['messages'] = $Message;
       
        header('Location: index.php');

     }

   }





   # Fetch Data to id . 
   $sql  = "select * from articalecategories  where id = ".$id;
   $op   = mysqli_query($con,$sql);
   $FetchedData = mysqli_fetch_assoc($op);










    include '../header.php';
?>
  
  <body class="sb-nav-fixed">
        
    
<?php 
    include '../nav.php';
?>  


        <div id="layoutSidenav">
                  
         
<?php 
    include '../sidNav.php';
?>  




<div class="container-fluid" style="margin: 0 216px; width: 63%;}">
            <div id="layoutSidenav_content">
                <main>
                    
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">

                        <?php 
                        
    

                            if(isset($_SESSION['messages'])){

                               foreach($_SESSION['messages'] as $key =>  $data){

                                echo '* '.$key.' : '.$data.'<br>';
                               }

                             unset($_SESSION['messages']);
                             }else{
                        ?>
                        
                        <li class="breadcrumb-item active">Add Role</li>
                        <?php } ?>
                        
                        
                        
                        </ol>

                      

 <div class="container">

 <form  method="post"  action="edit.php?id=<?php echo $FetchedData['id'];?>"  enctype ="multipart/form-data">
 
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text"  name="titlee" value="<?php echo $FetchedData['title'];?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Title">
  </div>

   <input type="hidden" name="id" value="<?php echo $FetchedData['id'];?>">
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>


                       
                </div>
                </main>
               
    
                
<?php 
    include '../footer.php';
?>  