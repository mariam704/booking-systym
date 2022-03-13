  
<?php 
require 'datbas.php';
require 'checkLogin.php';


# Clean input ...
// function CleanInputs($input){
//  $input = trim($input);
//  $input = stripcslashes($input);
//  $input = htmlspecialchars($input);
//  return $input;
// }

 $errorMessages = array();
 if($_SERVER['REQUEST_METHOD'] == "POST" ){

    $email = $_POST['email'];
    $password = $_POST['password']; 
  
 

     // Email Validation ... 
     if(!empty($email)){
        // code ... 
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
             $errorMessages['email'] = "Invalid Email";
        }//if filter

     }else{
         $errorMessages['email'] = "Required";
     }//if empty


     // Password Validation ... 
     if(!empty($password)){
        // code ...   
         if(strlen($password) < 6){

            $errorMessages['Password'] = "Password Length must be > 5 "; 
         }//if str

     }else{

       $errorMessages['Password'] = "Required";

     }//if empty


  if(count($errorMessages) == 0){

     // Code ... 
    
     $password = sha1($password);
     $sql = "select * from loguser where email = '$email' and password = '$password'";
     
     $op  = mysqli_query($con,$sql);
     
       
       if(mysqli_num_rows($op) == 1){

         // code... 
        //  $_SESSION['email']=$email;
   

       $data = mysqli_fetch_assoc($op);

       $_SESSION['data'] = $data;
       print_r($data);

      //   echo  mysqli_error($con);
      // exit();
      header("Location: tabelNti.php");
       }else{

         echo 'please write right password or email or creat account ';
       }





  }else{

  // print error messages 
  foreach($errorMessages as $key => $value){

     echo '* '.$key.' : '.$value.'<br>';
     }
   } 
  
 }




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
<body style="
    position: relative;
    background-size: cover;
    background-image: url(plan8.jpg);
"
    >
         <div class="text1" style="
    display: flex;
    flex-direction: column;
    background: linear-gradient( 126deg, #362f41, #181816);
    color: white;
    padding: 50px;

    flex-basis: 55%;
    position:absolute;
    top: 50px;
    left:50%;
    transform: translate(-50%);
    
    opacity: 0.89;
         
         ">
          <h2>login with us and take offer...</h2>
          <form method="post"
            action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  
            enctype ="multipart/form-data" class="form1" id="sign-in"
            style="
                display: flex;
             flex-direction: column;
             padding: 20px;
            max-width: 100%;
            ">
            <input class="main-input" type="email" name="email" placeholder="Your Email" style="
                padding: 20px;
    display: block;
    border: 1px solid #ccc;
    margin-bottom: 30px;
    width: 100%;
            " />
            <input type="password"  name="password"  class="main-input" placeholder="Your password" style=" 
               padding: 20px;
    display: block;
    border: 1px solid #ccc;
    margin-bottom: 30px;
    width: 100%;" />
             <input type="submit" value="login"  style="   
                 background: linear-gradient( 90deg, #edebec, #2d2c3e);

    color: white;
    padding: 20px;
    border: none;
    text-transform: uppercase;
    cursor: pointer;
    width: 100%;
    text-align: center;"  class="main-input" />
           </form>

        <a href="http://localhost/project/nti1.php" >creat an account</a>
         </div>

         
       
       </div>
</body>
</div>