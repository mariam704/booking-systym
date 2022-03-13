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

    $title   = CleanInputs(Sanitize($_POST['title'],2));
    $cat_id  = Sanitize($_POST['cat_id'],1);
    $id      = Sanitize($_POST['id'],1);
    $content = CleanInputs($_POST['content']);
    $image   = $_POST['OldImage'];
    $finalImage = $image;
     

    $Message = [];
    # Check Validation ... 
    if(!Validator($title,1)){
    
      $Message['title'] = "Title Field Required";

    }
    
    if(!Validator($title,2)){
    
      $Message['TitleLength'] = "Title length must be > 3";

    }



    if(!Validator($content,1)){
    
      $Message['content'] = "Content Field Required";

    }
    
    if(!Validator($content,2,10)){
    
      $Message['ContentLength'] = "Content length must be >= 100";

    }




   if(!Validator($cat_id,3)){
     $Message['Category'] = "Invalid Category ";
   }


   if(!Validator($id,3)){
    $Message['id'] = "Invalid id ";
  }


      // CODE ... 
      $imageName     = $_FILES['image']['name'];

   if(Validator($imageName,1)){

      $nameArray = explode('.',$imageName);
      $FileExtension = strtolower($nameArray[1]);
      
      $newName = rand().time().'.'.$FileExtension;

 
   if(!Validator($imageName,1)){
    
    $Message['image'] = "image Field Required";

  }


  if(!Validator($FileExtension,5)){
    
    $Message['imageExtension'] = "Invalid Image Extension";

        }
      }


     if(count($Message) > 0){
       $_SESSION['messages'] = $Message;
             
    }else{



      if(Validator($imageName,1)){
        // 
    

      

        $fileTmp      = $_FILES['image']['tmp_name'];
        $uplodeFolder = './uploads/';
        $desPath      = $uplodeFolder.$newName;


        
        if(move_uploaded_file($fileTmp,$desPath)){
          // 
         
           $finalImage = $newName;
      

          if(file_exists('./uploads/'.$image)){
             
             unlink('./uploads/'.$image);
          }

        }else{

          $Message['imageMove'] = "Error in Upload Tru Again";

          }

      }
    




  if(count($Message) == 0){
    # DB OPERATION .... 

    $sql = "update articales set title='$title' , content= '$content' , cat_id=$cat_id , image = '$finalImage' where id = ".$id;

    $op  = mysqli_query($con,$sql);

    if($op){

         $Message['Result'] = "Data updated.";
       
    }else{
         $Message['Result']  = "Error Try Again.";
     
     }

    }





        $_SESSION['messages'] = $Message;
       
        header('Location: index.php');

     }

   }





   # Fetch Data to id . 
   $sql  = "select * from articales where id = ".$id;
   $op   = mysqli_query($con,$sql);
   $FetchedData = mysqli_fetch_assoc($op);



  # Fetch Admin roles ..  
   $sql = "select * from articalecategories";
   $op  = mysqli_query($con,$sql);






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





            <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid" style="margin: 0 216px; width: 63%;}">
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
                        
                        <li class="breadcrumb-item active">Edit Articale</li>
                        <?php } ?>
                        
                        
                        
                        </ol>

                      

 <div class="container">

 <form  method="post"  action="edit.php?id=<?php echo $FetchedData['id'];?>"  enctype ="multipart/form-data">
 

 <div class="form-group">
    <label for="exampleInput">Title</label>
    <input type="text"  name="title" value="<?php echo $FetchedData['title'];?>" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Title">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Content</label>
   <textarea name="content" class="form-control" > <?php echo $FetchedData['content'];?> </textarea>
  </div>

 
  
  <div class="form-group">
    <label for="exampleInput"> Category </label>
  <select name="cat_id" class="form-control"> 
  <?php 
     while($data = mysqli_fetch_assoc($op)){
  ?>
  <option value="<?php echo $data['id'];?>"><?php echo $data['title'];?></option>
 <?php } ?>
 </select>  
  </div>
 



  
  <div class="form-group">
    <label for="exampleInputEmail1">Upload Image</label>
    <br>
   <input type="file" name="image"  >
    <br>

    <img src='./uploads/<?php echo $FetchedData['image'];?>'  width="70px" >

    <input type="hidden" name = "OldImage" value="<?php echo $FetchedData['image'];?>">
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