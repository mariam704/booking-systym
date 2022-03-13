<?php
require 'datbas.php';
// require 'checkLogin.php';
// eit hotel booking 
$id = $_GET['id'];
$id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);

$message = "";

if(!filter_var($id,FILTER_VALIDATE_INT)){

 $_SESSION['message'] = "Invalid Id";

 header("Location:hotelTabel.php");
}


function CleanInputs($input){

    $input = trim($input);
    $input = stripcslashes($input);
    $input = htmlspecialchars($input);

    return $input;
  }
  $error=array();
if($_SERVER['REQUEST_METHOD'] == "POST" ){
    $country=$_POST['country'];
    $date=$_POST['date'];
    $Dater=$_POST['Dater'];
    $finaldate= date('y/m/d');
    $room =CleanInputs($_POST['room']);
    $adult =CleanInputs($_POST['adult']);
    $phone =CleanInputs($_POST['phone']);
    $child =CleanInputs($_POST['child']);
    $email=CleanInputs($_POST['email']);
   $hotelName=CleanInputs($_POST['hotelName']);
 
   
//echo $Country ."<br>". $date."<br>" .  $Dater."<br>".$room . $adult . "<br>"  . $phone ."<br>" .$child  ."<br>".$email;
//validtaion
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
if(!empty($hotelName)){

    if(!filter_var($hotelName, FILTER_SANITIZE_STRING)){
        $error['hotelName'] =  "invalid ";
    }
    
    }else{
        $error['hotelName'] =  "requird";
    }
//if2
//date 
$finaldate=date("Y-m-d h:i:sa");
if(!empty($date)){
   
    //code
    if($date <$finaldate ){
        $error['date'] = "<br>" ." error old date";
    }
}else{
    $error['date'] =  " type a date";
}
//arrivedate


if(!empty($Dater)){
   
   
    //code
    if($Dater <$date ){
        $error['Dater'] =  "<br>" . " error check out should ba after check in";
    }
}else{
    $error['Dater'] =   " type a date";
}



//email
if(!empty($email)){
    
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error['email'] =  "invalid email";
    }
}else{
    $error['email'] =  "required";
}
if(count($error) == 0){
    //start session condition to check if user log in to booking
    // if(isset($_SESSION['email'])){
    // // DB CODE... 
    // $date     = $_POST['date'];
   
 $sql = "update hotels set country='$country' ,date='$date', Dater='$Dater',room='$room',adult='$adult',phone='$phone',
 child='$child', email='$email', hotelName='$hotelName' where id =$id";


     $op=  mysqli_query($con,$sql);
     
if($op){
    $_SESSION['message'] = "Record Updated";
    header("Location: hotelTabel.php");
        
  }else{
        echo 'Error Try Again';
  }
  
  
  
  }else{
  
  // print error messages 
  foreach($error as $key => $value){
  
  echo '* '.$key.' : '.$value.'<br>';
  }
  
  
  }
  
  
  }
  $sql = "select * from hotels where id = $id";
$op = mysqli_query($con,$sql); 
$FetchedData = mysqli_fetch_assoc($op);

    //   echo mysqli_error($con);
    //   exit();


// print error messages 

    
 ?>
 <!DOCTYPE html>
<html>
<head> 
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
                        <form method="POST"  action="editHotel.php?id=<?php echo $FetchedData['id'];?>"  enctype ="multipart/form-data">
                            <div class="form-group">
                                 <input class="form-control" type="text"  placeholder="Country, ZIP, city..." name ="country" value="<?php echo $FetchedData['country'];?>"> 
                                 <span class="form-label">Destination</span> </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                 <input class="form-control" type="date" name ="date"  required value="<?php echo $FetchedData['date'];?>">   <span class="form-label">Check In</span> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"> <input class="form-control" type="date" name ="Dater"  required value="<?php echo $FetchedData['Dater'];?>"> <span class="form-label">Check out</span> </div>
                                </div>
                            </div>
            
                            <div class="row">
                       
                                <div class="col-md-4">
                                    <div class="form-group">
                                         <select class="form-control" required name="room" value="<?php echo $FetchedData['room'];?>">
                                            <option value="" selected hidden  >no of rooms</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select> <span class="select-arrow"></span> <span class="form-label">Rooms</span> </div>
                                </div>
                        
                                <div class="col-md-4">
                                    <div class="form-group" name="adult"> 
                                        <select class="form-control"  name="adult" required value="<?php echo $FetchedData['adult'];?>">
                                            <option value="" selected hidden>no of adults</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select> <span class="select-arrow"></span> <span class="form-label">Adults</span> </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                         <select class="form-control" name="child" required value="<?php echo $FetchedData['child'];?>">
                                            <option value="" selected hidden>no of children</option>
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                        </select> <span class="select-arrow"></span> <span class="form-label">Children</span> </div>
                                </div>
                            </div>
                         
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"> <input class="form-control" type="email" placeholder="Enter your Email" name="email" value="<?php echo $FetchedData['email'];?>"> <span class="form-label">Email</span> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"> <input class="form-control" type="tel" placeholder="Enter you Phone" name="phone" value="<?php echo $FetchedData['phone'];?>"> <span class="form-label">Phone</span> </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="form">
                                         <select class="form-control" required name="hotelName" value="<?php echo $FetchedData['hotelName'];?>">
                                            <option value="" selected hidden  >no of hottels</option>
                                            <option>gurd</option>
                                            <option>four sesson</option>
                                            <option>diamond</option>
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