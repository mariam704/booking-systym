<?php

require 'datbas.php';
// require 'checkLogin.php';
//flight

$id = $_GET['id'];
$id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);

$message = "";

if(!filter_var($id,FILTER_VALIDATE_INT)){

 $_SESSION['message'] = "Invalid Id";

 header("Location:bookingtabel.php");
}



function CleanInputs($input){

    $input = trim($input);
    $input = stripcslashes($input);
    $input = htmlspecialchars($input);

    return $input;
  }
  $errorMessages = array();

if($_SERVER['REQUEST_METHOD'] == "post" ){
    $flightType=$_POST['flightType'];
    $leavingFrom=CleanInputs($_POST['leavingFrom']);
    $arrivingAt =CleanInputs($_POST['arrivingAt']);
    $leaveDate=$_POST['leaveDate'];
    $arriveDate=$_POST['arriveDate'];
    $class = $_POST['class'];
    $chalidern =$_POST['chalidern'];
    $adult= $_POST['adult'];
 



    if (!empty($_POST["leavingFrom"])){


      // if (!preg_match("/^[a-zA-Z-' ]*$/",$leavingFrom)) {
      //     $errorMessages['leavingFrom'] = "Only letters and white space allowed";
      //   }

  }else{
      $errorMessages['leavingFrom'] = "Required";
  }

  //START VAILDAT AEEIVAAT

  if (!empty($_POST["arrivingAt"])){


      // if (!preg_match("/^[a-zA-Z-' ]*$/",$arrivingAt)) {
      //     $errorMessages['arrivingAt'] = "Only letters and white space allowed";
      //   }

        if($arrivingAt==$leavingFrom){
          $errorMessages['arrivingAt'] = "plz choose diffrent destnation";
  
       }

  }else{
      $errorMessages['arrivingAt'] = "Required";
  }

  //START VAILDAT leaveDate

  if (!empty($_POST["leaveDate"])){

     
      $finaldate=date("Y-m-d h:i:sa");
    if($leaveDate<$finaldate ){
      $errorMessages['leaveDate'] = "you choice a wrong date";
    }

  }else{
      $Message['leaveDate'] = "Required";
  }
  //start arriveDate

  if (!empty($_POST["arriveDate"])){

     
     
    if($arriveDate<$leaveDate ){
      $errorMessages['arriveDate'] = "you choice a wrong date";
    }
 

  }else{
      $errorMessages['arriveDate'] = "Required";
  }

  // error validat
  if(count($errorMessages) == 0){
 
    $sql = "update booking set flightType='$flightType',leavingFrom='$leavingFrom', arrivingAt='$arrivingAt' ,leaveDate= '$leaveDate',arriveDate='$arriveDate,'class='$class',chalidern='$chalidern', adult='$adult',where id =$id";

       $op=  mysqli_query($con,$sql);

      //   echo mysqli_error($con);
      // exit();
  
         if($op){
        
           
             $_SESSION['message'] = "Record Updated";
             header("Location: bookingtabel.php");
                 
            

         }else{
         echo "Error Try Again.";
         }//end op

        }else{

          // print error messages 
          foreach($errorMessages as $key => $value){
          
          echo '* '.$key.' : '.$value.'<br>';
          }
          
          
          }
          
          
          }
          //fetch id
          $sql = "select * from booking where id = $id";
          $op = mysqli_query($con,$sql);
          $FetchedData = mysqli_fetch_assoc($op);
         









?>













    <!-- End About -->
        <!--start state-->

        <!---end state-->
    
        <!DOCTYPE html>
<html>
<head> 
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> hotel booking </title>
  
    <!--all element normailiz-->
   <link rel="stylesheet" href="http://localhost/project/nti1.php/css1/normalize.css1">
   <!--font awsem library-->
   <link rel="stylesheet" href="http://localhost/project/nti1.php/css1/all.min.css1">
    <!--main css sheet-->
    <link rel="stylesheet" href="http://localhost/project/css1/text1.css">
    <!--gogel font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">

</head>
<body>

 
    <!-- End Subscribe -->
  <div class="booking">
    <div id="search-form">
      
    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
              
      <div id="header">
        <h1>SEARCH FOR CHEAP FLIGHTS</h1>
      </div>
      <section>
        <div class="flight" id="flightbox">
          
          <form id="flight-form" method="POST"    action="editFlight.php?id=<?php echo $FetchedData['id'];?>"  enctype ="multipart/form-data">
          <!-- TRIP TYPE -->
          <div id="flight-type">
            <div class="info-box">
              

   <input type="hidden" name="id" value="<?php echo $FetchedData['id'];?>">
              <input type="radio" name="flightType"  id="return" checked value="<?php echo $FetchedData['flightType'];?>" >
              <label for="return">RETURN</label>
            </div>
            <div class="info-box">
              <input type="radio" name="flightType" id="one-way"value="<?php echo $FetchedData['flightType'];?>" >
              <label for="one-way">ONE WAY</label>
            </div>
          </div>
          
          <!-- FROM/TO -->
          <!-- <div id="flight-depart">
            <div class="info-box">
              <label for="">LEAVING FROM</label>
              <input type="text" name="leavingFrom" id="dep-from" value="<?php echo $FetchedData['leavingFrom'];?>" >
              <div id="depart-res"></div>
            </div>
            
            <div class="info-box" id="arrive-box">
              <label for="">ARRIVING AT</label>
              <input type="text" name="arrivingAt" id="dep-to" value="<?php echo $FetchedData['arrivingAt'];?>" >
              <div id="arrive-res"></div>
            </div>
          </div> -->
          

          <div id="flight-depart">
            <div class="info-box">
              <label for="">LEAVING FROM</label>
                  <select name="leavingFrom" id="dep-from" >
                <option value="egypt">egypt</option>
                <option value="sudia">sudia</option>
                <option value="emarat">emarat</option>
                <option value="los-anglos">los-anglos</option>
                <option value="las-vegas">las-vegas</option>
                <option value="italy">italy</option>
                <option value="swiss">swiss</option>
              </select>
              <div id="depart-res"></div>
            </div>

         

            
            <div class="info-box" id="arrive-box">
            <label for="">ARRIVING AT</label>
                  <select name="arrivingAt" id="arrive-box" >
                <option value="egypt">egypt</option>
                <option value="sudia">sudia</option>
                <option value="emarat">emarat</option>
                <option value="los-anglos">los-anglos</option>
                <option value="las-vegas">las-vegas</option>
                <option value="italy">italy</option>
                <option value="swiss">swiss</option>
              </select>
            </div>
           </div>

          <!-- FROM/TO -->
          <div id="flight-dates">
            <div class="info-box">
              <label for="">LEAVING ON</label>
              <input type="date" class="leave-date" name="leaveDate" value="<?php echo $FetchedData['leaveDate'];?>" >
            </div>
            <div class="info-box" id="return-box">
              <label for="">RETURNING ON</label>
              <input type="date" class="return-date" name="arriveDate" value="<?php echo $FetchedData['arriveDate'];?>"  >
            </div>
          </div>
        
          
          <!-- PASSENGER INFO -->
          <div id="flight-info">
            <div class="info-box">
              <label for="adults">ADULTS</label>
              <select name="adult" id="adults" value="<?php echo $FetchedData['adult'];?>" >
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </div>
            <div class="info-box">
              <label for="children">CHILDREN</label>
              <select name="chalidern" id="children" value="<?php echo $FetchedData['chalidern'];?>" >
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="0">2</option>
                <option value="3">3</option>
              </select>
            </div>
            <div class="info-box">
              <label for="class-type">CLASS</label>
              <select name="class" id="class-type" value="<?php echo $FetchedData['class'];?>" >
                <option value="Economy">ECONOMY</option>
                <option value="Business">BUSINESS</option>
                <option value="First">FIRST CLASS</option>
              </select>
            </div>
        </div>
      </div>
      
        
          <!-- SEARCH BUTTON -->
        <div id="flight-search">
          <div class="info-box">
            <input type="submit" id="search-flight" value="update"/>
          </div>
        </div>
          
        </form> 
        </div>
      </section>
    
    
        
  </div>
  <div id="confirm"></div>
  </body>
</html>