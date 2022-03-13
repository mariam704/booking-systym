<?php
// hotel booking 

require 'datbas.php';

function CleanInputs($input){

    $input = trim($input);
    $input = stripcslashes($input);
    $input = htmlspecialchars($input);

    return $input;
  }
  $error=array();
if($_SERVER['REQUEST_METHOD'] == "POST" ){
    $country=CleanInputs($_POST['country']);
    $date=$_POST['date'];
    $Dater=$_POST['Dater'];
    $finaldate= date('y/m/d');
    $room =CleanInputs($_POST['room']);
    $adult =CleanInputs($_POST['adult']);
    $phone =CleanInputs($_POST['phone']);
    $child =CleanInputs($_POST['child']);
    $email=CleanInputs($_POST['email']);
   $hotelName=CleanInputs($_POST['hotelName']);
 
  // echo $country ."<br>". $date."<br>" .  $Dater."<br>".$room . $adult . "<br>"  . $phone ."<br>" .$child  ."<br>".$email;
//validtaion
// country validat
$x= array("egypt" , "france", "los anglos" ,"sudia") ;
if(empty($country)){
    $error['country'] =  "required";

}else{
    if(!in_array($country,$x)){
        $error['country'] =  "this country unavaliel";
    }else{
        if(strlen($country)<3){
            $error['country'] =  "country shoulf>3";
        }
    }
    
}

//hotelname

//if2
//date 
// $finaldate=date("Y-m-d h:i:sa");
// if(!empty($date)){
   
//     //code
//     if($date <$finaldate ){
//         $error['date'] = "<br>" ." error old date";
//     }
// }else{
//     $error['date'] =  " type a date";
// }
// //arrivedate 


if (!empty($_POST["date"])){

     
    $finaldate=date("Y-m-d h:i:sa");
    if($date<$finaldate ){
      $error['date'] = "you choice a wrong date";
    }

  }else{
      $error['date'] = "Required";
  }
  //start arriveDate

  if (!empty($_POST["Dater"])){

     
     
    if($Dater<$date ){
      $error['Dater'] = "you choice a wrong date";
    }
 

  }else{
      $error['Dater'] = "Required";
  }








// if(!empty($Dater)){
   
   
//     //code
//     if($Dater <$date ){
//         $error['Dater'] =  "<br>" . " error check out should ba after check in";
//     }
// }else{
//     $error['Dater'] =   " type a date";
// }



//email
if(!empty($email)){
    
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error['email'] =  "invalid email";
    }
}else{
    $error['email'] =  "required";
}
if(empty($phone)){
    $error['phone'] =  "required";
}
if(count($error) == 0){
    //start session condition to check if user log in to booking
    // if(isset($_SESSION['email'])){
    // DB CODE... 
    // $date = $_POST['date'];
//error in countr

 $sql = "insert into hotels (country,date,Dater,room,adult,phone,child,email,hotelName) values ('$country',$date,$Dater,'$room','$adult','$phone','$child','$email','$hotelName')";

     $op=  mysqli_query($con,$sql);

    //   echo mysqli_error($con);
    //   exit();

  if($op){
         header("Location: hotelTabel.php");
  }else{
         echo 'Error Try Again';
  }
//     }else{
       
//         // header("Location: login.php");
//         // echo $_SESSION['email']= "please log in to complet";
//    // }//end session condition


}else{

// print error messages 
foreach($error as $key => $value){

  echo '* '.$key.' : '.$value.'<br>';
}





}

}//if1
    
 ?>
 <!DOCTYPE html>
<html>
<head></head>  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> hotel booking </title>
  
    <!--all element normailiz-->
   <link rel="stylesheet" href="css1/normalize.css1">
   <!--font awsem library-->
   <link rel="stylesheet" href="css1/all.min.css1">
    <!--main css sheet-->
    <link rel="stylesheet" href="css1/text1.css">
    <!--gogel font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">

</head>
<body>



    <div id="booking" class="section">
    
        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="booking-form">
                        <div class="form-header">
                            <h1>Make your reservation</h1>
                        </div>
                        <form method="POST" action="">
                            <div class="form-group">
                                 <input class="form-control" type="text" name ="country" placeholder="Country, ZIP, city..."> 
                                 <span class="form-label">Destination</span> </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                 <input class="form-control" type="date" name ="date"  required>   <span class="form-label">Check In</span> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"> <input class="form-control" type="date" name ="Dater"  required> <span class="form-label">Check out</span> </div>
                                </div>
                            </div>
            
                            <div class="row">
                       
                                <div class="col-md-4">
                                    <div class="form-group">
                                         <select class="form-control" required name="room">
                                            <option value="" selected hidden  >no of rooms</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select> <span class="select-arrow"></span> <span class="form-label">Rooms</span> </div>
                                </div>
                        
                                <div class="col-md-4">
                                    <div class="form-group" name="adult"> 
                                        <select class="form-control"  name="adult" required>
                                            <option value="" selected hidden>no of adults</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select> <span class="select-arrow"></span> <span class="form-label">Adults</span> </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                         <select class="form-control" name="child" required>
                                            <option value="" selected hidden>no of children</option>
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                        </select> <span class="select-arrow"></span> <span class="form-label">Children</span> </div>
                                </div>
                            </div>
                         
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"> <input class="form-control" type="email" placeholder="Enter your Email" name="email"> <span class="form-label">Email</span> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"> <input class="form-control" type="tel" placeholder="Enter you Phone" name="phone"> <span class="form-label">Phone</span> </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="form">
                                    <select class="form-control" name="hotelName" required>
                                            <option> no of hottels</option>
                                            <option > gurd</option>
                                            <option >four sesson</option>
                                            <option >diamond</option>
                                          
                                        </select> <span class="select-arrow"></span> <span class="form-label">Rooms</span> </div>

                                </div>
                            <div class="form-btn"> <button class="submit-btn">Book Now</button> </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>