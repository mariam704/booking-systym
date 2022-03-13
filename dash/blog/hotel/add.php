<?php 
    
//    include '../helpers/function.php';
   include '../helpers/datbas.php';
// hotel booking 



function CleanInputs($input){

    $input = trim($input);
    $input = stripcslashes($input);
    $input = htmlspecialchars($input);

    return $input;
  }
  $error=array();
if($_SERVER['REQUEST_METHOD'] == "POST" ){
    $Country=CleanInputs($_POST['Country']);
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
if(!empty($Country)){
if(!in_array($Country , $x)){
    $error['country'] =  " not avaliabl";
}

// if(!$Country ==$x){
//      $error['country'] =  " not avaliabl";
// }
echo "<br>";
if(!filter_var($Country, FILTER_SANITIZE_STRING)){
    $error['country'] =  "invalid ";
}

}else{
    $error['country'] =  "requird";
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
    if(isset($_SESSION['email'])){
    // DB CODE... 
    $date = $_POST['date'];
//error in country
 $sql = "insert into hotels (country,date,Dater,room,adult ,phone,child,email,hotelName ) values('$country','$date','$Dater','$room','$adult','$phone','$child','$email','$hotelName')";

     $op=  mysqli_query($con,$sql);

    //   echo mysqli_error($con);
    //   exit();

  if($op){
         header("Location: index.php");
  }else{
         echo 'Error Try Again';
  }
    }else{
       
        // header("Location: login.php");
        // echo $_SESSION['email']= "please log in to complet";
    }//end session condition


}else{

// print error messages 
foreach($error as $key => $value){

  echo '* '.$key.' : '.$value.'<br>';
}





}

}//if1

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
                    <div class="container-fluid">
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
                        
                        <li class="breadcrumb-item active">Add Articale</li>
                        <?php } ?>
                        
                        
                        
                        </ol>
                        
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
                                 <input class="form-control" type="text" name ="Country" placeholder="Country, ZIP, city..."> <span class="form-label">Destination</span> </div>
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
                                         <select class="form-control" required name="hotelName">
                    
                                            <option value="<?php echo $data['id'];?>"> selected hidden  >no of hottels</option>
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



  


               
    
                
<?php 
    include '../footer.php';
?>   