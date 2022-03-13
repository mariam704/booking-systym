<?php
// session_start();
 require 'datbas.php';
 require 'checkLogin.php';

// if(isset($_SESSION['email'])){

//     echo 'found';

// }else{
//     echo "log in";
// }
//booking flight


 # Fetch dep Query .... 
//  $sql  = "select * from loguser";
//  $op   = mysqli_query($con,$sql); 
function CleanInputs($input){

    $input = trim($input);
    $input = stripcslashes($input);
    $input = htmlspecialchars($input);

    return $input;
  }
  $errorMessages = array();
  //vaildat 
  if($_SERVER['REQUEST_METHOD'] == "POST" ){
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
        $errorMessages['leaveDate'] = "Required";
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
 
    $sql = "insert into booking (flightType,leavingFrom,arrivingAt,leaveDate,arriveDate,class ,chalidern,adult) values
        ('$flightType','$leavingFrom','$arrivingAt','$leaveDate','$arriveDate','$class',$chalidern,$adult)";
      
           $op=  mysqli_query($con,$sql);
          //     echo mysqli_error($con);
      // exit();
           if($op){
               // i want to header into file data of user flight
            header("Location: nti1.php");

           }else{
               echo  'try again';
           }//end op

    }//end error
  }// end vaildat


  echo "<p 
  style='color: black;
  width: 24%;
  background-color: whitesmoke;
  overflow: hidden;
  box-shadow: 0px 2px 7px 0px darkgrey;'>";

  foreach($errorMessages as $key => $value){


    echo '* '.$key.' : '.$value.'<br>' ;
   
    
 }
 echo "</p>";



?>