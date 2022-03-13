<?php

 include '../helpers/datbas.php';










 $id = $_GET['id'];
 $id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);

 $message = "";

 if(!filter_var($id,FILTER_VALIDATE_INT)){

  $_SESSION['message'] = "Invalid Id";

  header("Location:tabelNti.php");
 }



 # Clean input ...
 function CleanInputs($input){

  $input = trim($input);
  $input = stripcslashes($input);
  $input = htmlspecialchars($input);

  return $input;
}

  $errorMessages = array();

if($_SERVER['REQUEST_METHOD'] == "POST" ){
$firstName= CleanInputs($_POST['firstName']);
$lastName=CleanInputs($_POST['lastName']);
$email=CleanInputs($_POST['email']);
$phone=CleanInputs($_POST['phone']);




      // Email Validation ... 
      if(!empty($email)){
        // code ... 
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
             $errorMessages['email'] = "Invalid Email";
        }

     }else{
         $errorMessages['email'] = "Required";
     }

//first name
if(!empty($firstName)){
// code ... 
 if(strlen($firstName) < 3){
    $errorMessages['firstName'] = "Name Length must be > 2 "; 
   }
}else{
$errorMessages['firstName'] = "Required";
}


if(count($errorMessages) == 0){

// DB CODE... 



$sql = "update loguser set firstName='$firstName',lastName='$lastName', email='$email' , phone='$phone' where id =$id";

$op =  mysqli_query($con,$sql);

//mysqli_error($con);

if($op){
$_SESSION['message'] = "Record Updated";
header("Location: index.php");
    
}else{
    echo 'Error Try Again';
}



}else{

// print error messages 
foreach($errorMessages as $key => $value){

echo '* '.$key.' : '.$value.'<br>';
}


}


}
$sql = "select * from loguser where id = $id";
$op = mysqli_query($con,$sql); 
$data = mysqli_fetch_assoc($op);
// echo  mysqli_error($con,);
//  














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
 



<div class="main-container">
                <h1 class="title">Sign up</h1>
              
                <div class="main-container__content">
                  <div class="content__inputs">
                    <form class="content__input--form"  id="sign"  method="post"  
                    action="edit.php?id=<?php echo $data['id'];?>"  enctype ="multipart/form-data">
                    
                      <label for="First-name">
                        <input type="text" placeholder="First Name" name="firstName" value="<?php echo $data['firstName'];?>">
                      </label>
                      <br>
                      <label for="Last-name">
                        <input type="text" placeholder="Last Name" name="lastName" value="<?php echo $data['lastName'];?>">
                      </label>
                      <br>
                      <label for="email">
                        <input type="email" placeholder="Email" name="email" value="<?php echo $data['email'];?>">
                      </label>
                      <br>
                      <label for="phone">
                        <input type="phone" placeholder="Phone" name="phone" value="<?php echo $data['phone'];?>"> 
                      </label>
                      <br>
                      <button type="submit" class="button">update</button>
                    </form>
                  </div>
              
                  <div class="content__submit">
                 
                  
                 
                    <div class="content__footer">
                   
                        <a href="/">
                          <strong>terms of use</strong>
                        </a>
                    </div>
                  </div>
                </div>
              </div>
                              
<?php 
    include '../footer.php';
?> 