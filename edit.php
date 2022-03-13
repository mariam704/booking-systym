<?php 
 require 'datbas.php';
  //  require 'checkLogin.php';

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
  header("Location: tabelNti.php");
      
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
//          exit();


?>
<!DOCTYPE html>
<html>
<head> 
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> cheap flight </title>
  
    <!--all element normailiz-->
   <link rel="stylesheet" href="css/normalize.css">
   <!--font awsem library-->
   <link rel="stylesheet" href="css/all.min.css">
    <!--main css sheet-->
    <link rel="stylesheet" href="css/text.css">
    <!--gogel font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">

</head>
<body>





<div class="main-container">
                <h1 class="title">Sign up</h1>
              
                <div class="main-container__content">
                  <div class="content__inputs">
                    <form class="content__input--form"  id="sign"  method="post"  
                    action="edit.php?id=<?php echo $data['id'];?>"  enctype ="multipart/form-data">
                    
                      <label for="First-name">
                        <input type="text" placeholder="First Name" name="firstName" value="<?php echo $data['firstName'];?>">
                      </label>
                      <label for="Last-name">
                        <input type="text" placeholder="Last Name" name="lastName" value="<?php echo $data['lastName'];?>">
                      </label>
                      <label for="email">
                        <input type="email" placeholder="Email" name="email" value="<?php echo $data['email'];?>">
                      </label>
                     
                      <label for="phone">
                        <input type="phone" placeholder="Phone" name="phone" value="<?php echo $data['phone'];?>"> 
                      </label>
                      <button type="submit" class="button">update</button>
                    </form>
                  </div>
              
                  <div class="content__submit">
                 
                    <div class="button google-button">
                      <div class="google-button__google-icon"></div>
                      <p class="no-select">Sign up with Google</p>
                    </div>
                    <div class="content__submit--line"></div>
                    <p>
                      Already have an account? 
                      <a href="#log-in">
                        <strong>Sign in</strong>
                      </a>
                    </p>
                    <div class="content__footer">
                      <p>
                        By clicking "Sign up" button above you agree to our
                        <a href="/">
                          <strong>terms of use</strong>
                        </a>
                    </div>
                  </div>
                </div>
              </div>
               </body>
</html>