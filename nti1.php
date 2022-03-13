<?php
require 'datbas.php';
// require 'checkLogin.php';
$sql = "select * from booking";
$op = mysqli_query($con,$sql);

function CleanInputs($input){

  $input = trim($input);
  $input = stripcslashes($input);
  $input = htmlspecialchars($input);

  return $input;
}
$errorMessages = array();

if($_SERVER['REQUEST_METHOD'] == "POST"){

  $firstName =CleanInputs($_POST['firstName']);
  $lastName=CleanInputs($_POST['lastName']);
  $email=CleanInputs($_POST['email']);
  $password =CleanInputs($_POST['password']);
  $phone=CleanInputs($_POST['phone']);
  $booking_id=$_POST['booking_id'];
  $hotels_id=$_POST['hotels_id'];

  
  
  
  
  
  echo $firstName  . "<br>" . $lastName . "<br>" . $email. "<br>" . $password  ."<br>" . $phone ;
  
  //first name
if(!empty($firstName )){
  // code ... 
   if(strlen($firstName ) < 3){
      $errorMessages['firstName'] = "Name Length must be > 2 "; 
     }
}else{
  $errorMessages['firstName'] = "Required";
}

if(!empty($lastName )){
  // code ... 
   if(strlen($lastName ) < 3){
      $errorMessages['lastName'] = "Name Length must be > 2 "; 
     }
}else{
  $errorMessages['lastName'] = "Required";
}
// Email Validation ... 
if(!empty($email)){
  // code ... 

  if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
       $errorMessages['email'] = "Invalid Email";
      
  }

}else{
   $errorMessages['email'] = "Required";
}
//end email
if(!empty($password)){
// code ...   
if(strlen($password) < 6){

$errorMessages['Password'] = "Password Length must be > 5 "; 
}

}else{

$errorMessages['Password'] = "Required";

}
//end password 
//error
if(count($errorMessages) > 0){

  // $_SESSION['errorMessages'] = $Message;
 

}else{

  // $password = sha1($password)
  
  $insertSql = "insert into loguser(firstName,lastName,email,password,phone,booking_id,hotels_id) values ('$firstName','$lastName','$email','$password','$phone',$booking_id,$hotels_id)";
  $op =  mysqli_query($con,$sql);
//   echo mysqli_error($con);
// exit();
  if($op){
    $errorMessages['Result'] = "Data inserted.";
    header("Location: tabelNti.php");
    //no error ut not data insert

  }else{
    $errorMessages['Result']  = "Error Try Again.";
  }

}
//end error


}//en validat

// print error messages 
foreach($errorMessages as $key => $value){

  echo '* '.$key.' : '.$value.'<br>';
}

$sql  = "select * from hotels";
$op   = mysqli_query($con,$sql); 

?>































<!DOCTYPE html>
<html>
<head></head>  
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
  <!--start header-->
  <header>
    <div class="container">
      <a href="#" class="logo">
        <img src="images/logo.png">
      </a>
      <nav>
        <i class="fas fa-bars toggle-menu"></i>
      <ul>
        <li><a class="active" href="#">Home</a></li>
        <li><a href="#search-form">flight booking</a></li>
        <li><a href="http://localhost/project/booking1.php">hotels booking</a></li>
        <li><a href="#">cars rent</a></li>
        <li><a href="#price">Pricing</a></li>
        <li><a href="#contact">Contact us</a></li>
        <li><a href="#sign">sign</a></li>
        <li><a href="http://localhost/project/login.php#sign-in">login</a></li>
      </ul>
      <div class="form">
        <i class="fas fa-search"></i>
      </div>
    </nav>
    </div>
  </header>
  <!--end header-->
   <!--start landing-->
   <div class="landing">
   <div class="overlay"></div>
   <div class="text">
     <div class="content">
       <h2>Discounts and Savings Claims <br/>
      we are kasper w make art</h2>
       <p>
        We offer a number of discount and savings opportunities to our
         customers. When searching for airfares, discount and savings
          claims are based on multiple factors, including searching 
          over 600 airlines to find the lowest available fare. 
          Coupon codes are valid for savings for qualified bookings 
          off our standard service fees...</p>
     </div>
   </div>
   <i class="fas fa-angle-left change-background fa-2x"></i>
   <i class="fas fa-angle-right change-background fa-2x"></i>
   <ul class="bullets">
    <li></li>
    <li class="active"></li>
    <li></li>
   </ul>
   </div>
    <!--end landing-->
     <!--start services-->
    <div class="services">
      <div class="container">
        
          <div class="main-heading">
            <h2>services</h2>
            <p>
            our site will provide great service with best prices 
           </p>
          </div>
          <div class="services-container">
            <div class="srv-box">
                <i class="fas fa-plane"></i>
              <div class="text-1">
                <h3>our flight around world</h3>
                <p>
                  Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Mauris blandit aliquet elit, eget
                  tincidunt nibh pulvinar a. Curabitur aliquet quam.
                </p>
              </div>
            </div>
            <div class="srv-box">
            <i class="fas fa-bed"></i>
              <div class="text-1">
                <h3>Vorem amet intuitive</h3>
                <p>
                  Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Mauris blandit aliquet elit, eget
                  tincidunt nibh pulvinar a. Curabitur aliquet quam.
                </p>
              </div>
            </div>
            <div class="srv-box">
                <i class="fas fa-car"></i>
              <div class="text-1">
                <h3>Vorem amet intuitive</h3>
                <p>
                  Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Mauris blandit aliquet elit, eget
                  tincidunt nibh pulvinar a. Curabitur aliquet quam.
                </p>
              </div>
            </div>
            <div class="srv-box">
              <i class="fas fa-camera fa-3x"></i>
              <div class="text-1">
                <h3>Vorem amet intuitive</h3>
                <p>
                  Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Mauris blandit aliquet elit, eget
                  tincidunt nibh pulvinar a. Curabitur aliquet quam.
                </p>
              </div>
            </div>
            </div>
      </div>
    </div>
      <!--end services-->
       <!--start design-->
       <div class="design">
      <div class="design-main">
      <h2>Why Air Arabia Holidays?</h2>
    <ul class="main">
      <li>-Up to 30% saving when booking flight<br>
         + hotel package.</li>
      <li>-The last minute deals specialist.</li>
      <li>-Confirmation voucher is sent instantly.<br>
         after booking.</li>
      <li>-Tailor-make your own package by choosing<br>
         flight dates, hotels, transfers and tours.</li>
    </ul>


      </div>
         <div class="text1">
          <h2 style = "  margin-bottom: 0px; font-size: 25px;">sign up  with us and exploe world...</h2>
          
  



          <form class="form1" id="sign"  method="post"  
                    action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"
                      enctype ="multipart/form-data">


             <input type="hidden" name="hotels_id"  />
              <input type="hidden" name="booking_id"  />

       

            <input type="text" 
             style="margin-bottom: 22px;"class="main-input" placeholder="First Name" name="firstName">
                    
             <input type="hidden"   name="booking_id"   class="main-input" />
             <input type="hidden"  name="hotels_id"  class="main-input" />    
                <input type="text"
                style="margin-bottom: 22px;" class="main-input" placeholder="Last Name" name="lastName">
           
              <input type="email" 
               class="main-input " style="margin-bottom: 22px;" name="email" placeholder="Your Email" />

            <input type="password"
              style="margin-bottom: 22px;" name="password"  class="main-input" placeholder="Your password"  />

              
              <input type="phone"
                style="margin-bottom: 22px;"  class="main-input" placeholder="Phone" name="phone"> 
               
                          
             <input type="submit" value="login"   class="main-input" />
      
           </form>

        <a href="http://localhost/project/login.php">log in</a>
         </div>

         
       
       </div>
             <!--end slills-->
          <!--start portofilre-->
          <div class="portfolio">
            <div class="container">
              <div class="main-heading">
                <h2>our hotels in world</h2>
                <p>
                 Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Mauris blandit aliquet elit, eget
                 tincidunt.
               </p>
              </div>
              <ul class="shuffle">
                <li class="active">all</li>
                <li>contact us</li>
                <li>photo</li>
                <li>hotels</li>
                <li>booking</li>
              </ul>
            </div>
            <div class="img-container">
              <div class="box">
                <img src="images/hotel1.jpg">
              <div class="caption">
                <h4>maldives flight </h4>
                <p> 30$ </p>
                 <button class="btn"><a href="http://localhost/project/booking1.php#header">booking now</a></button>
              </div>
            </div>
            <div class="box">
                <img src="images/hotel2.jpg">
              <div class="caption">
                <h4>au zabi flight </h4>
                <p>booking with us 30$ </p>
                <button class="btn"> <a href="http://localhost/project/booking1.php#header">booking now</a></button>
              </div>
            </div>
          <div class="box">
            <img src="images/hotel3.jpg">
          <div class="caption">
            <h4>sudia arab flight </h4>
            <p>booking with us 30$ </p>
            <button class="btn"><a href="http://localhost/project/booking1.php#header">booking now</a></button>
          </div>
        </div>
        <div class="box">
            <img src="images/hotel4.jpg">
          <div class="caption">
            <h4>italy flight </h4>
            <p>booking with us 30$ </p>
            <button class="btn"><a href="http://localhost/project/booking1.php#header">booking now</a></button>
          </div>
        </div>
        <div class="box">
            <img src="images/hotel5.jpg">
          <div class="caption">
            <h4>los anglos flight </h4>
            <p>booking with us 30$ </p>
            <button class="btn"> <a href="http://localhost/project/booking1.php#header"> booking now</a></button>
          </div>
        </div>
        
     
      <div class="box">
        <img src="images/hotel1.jpg" >
      <div class="caption">
        <h4>swissland flight </h4>
        <p>booking with us 30$ </p>
        <button class="btn"><a href="http://localhost/project/booking1.php#header">booking now</a></button>
      </div>
    </div>
    <div class="box">
      <img src="images/hotel2.jpg">
    <div class="caption">
      <h4>malazya flight </h4>
      <p>booking with us 30$ </p>
      <button class="btn"><a href="http://localhost/project/booking1.php#header">booking now</a></button>
    </div>
  </div>
  <div class="box">
    <img src="images/hotel3.jpg">
  <div class="caption">
    <h4>los anglos flight </h4>
    <p>booking with us 30$ </p>
    <button class="btn"><a href="http://localhost/project/booking1.php#header">booking now</a></button>
  </div>
</div>
            <a href="#" class="more">More</a>
          </div>
        <!--end portofile-->
        <!--end desgin-->
          
          
              <!--end slills-->
          <!--start portofilre-->
          <div class="portfolio">
            <div class="container">
              <div class="main-heading">
                <h2>portofile</h2>
                <p>
                 Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Mauris blandit aliquet elit, eget
                 tincidunt.
               </p>
              </div>
              <ul class="shuffle">
                <li class="active">all</li>
                <li>app</li>
                <li>photo</li>
                <li>web</li>
                <li>print</li>
              </ul>
            </div>
            <div class="img-container">
              <div class="box">
                <img src="images/maldavies.jpg">
              <div class="caption">
                <h4>maldives flight </h4>
                <p> 30$ </p>
                 <button class="btn"><a href="#header">booking now</a></button>
              </div>
            </div>
            <div class="box">
                <img src="images/abozapi.jpg">
              <div class="caption">
                <h4>au zabi flight </h4>
                <p>booking with us 30$ </p>
                <button class="btn"> <a href="#header">booking now</a></button>
              </div>
            </div>
          <div class="box">
            <img src="images/sudi.jpg">
          <div class="caption">
            <h4>sudia arab flight </h4>
            <p>booking with us 30$ </p>
            <button class="btn"><a href="#header">booking now</a></button>
          </div>
        </div>
        <div class="box">
            <img src="images/ital.jpg">
          <div class="caption">
            <h4>italy flight </h4>
            <p>booking with us 30$ </p>
            <button class="btn"><a href="#header">booking now</a></button>
          </div>
        </div>
        <div class="box">
            <img src="images/los.jpg">
          <div class="caption">
            <h4>los anglos flight </h4>
            <p>booking with us 30$ </p>
            <button class="btn"><a href="#header">booking now</a></button>
          </div>
        </div>
        
     
      <div class="box">
        <img src="images/swi.jpg" >
      <div class="caption">
        <h4>swissland flight </h4>
        <p>booking with us 30$ </p>
        <button class="btn"><a href="#header">booking now</a></button>
      </div>
    </div>
    <div class="box">
      <img src="images/malazya.jpg">
    <div class="caption">
      <h4>malazya flight </h4>
      <p>booking with us 30$ </p>
      <button class="btn"><a href="#header">booking now</a></button>
    </div>
  </div>
  <div class="box">
    <img src="images/los.jpg">
  <div class="caption">
    <h4>los anglos flight </h4>
    <p>booking with us 30$ </p>
    <button class="btn"><a href="#header">booking now</a></button>
  </div>
</div>
            <a href="#" class="more">More</a>
          </div>
        <!--end portofile-->
            <!-- Start Video -->
            <div class="video">
              <video autoplay muted loop>
                <source src="images/plan.mp4" type="video/mp4" />
              </video>
      <div class="text">
        <h2>take a descation and make advunter</h2>
        <p>Its All You Need</p>
        <button>explor more</button>
      </div>
    </div>
    <!-- End Video -->
          <!--start about-->
            

    <!-- End About -->
        <!--start state-->

        <!---end state-->
    
 <!-- Start Quote -->
    <div class="quote">
      <div class="container">
       
      </div>
    </div>
    <!-- End Quote -->
        <!--start pricing-->
  

      
 
          <!--end pricing-->
              <!-- Start Subscribe -->

           
    <!-- End Subscribe -->

  <div class="booking">
  
 



    <div id="search-form">
      <div id="header">
        <h1>SEARCH FOR CHEAP FLIGHTS</h1>
      </div>
      <section>
        <div class="flight" id="flightbox">
          
          <form id="flight-form" method="POST" action="chk.php">
          <!-- TRIP TYPE -->
          <div id="flight-type">
            <div class="info-box">
              <input type="radio" name="flightType" value="Return" id="return" checked />
              <label for="return">RETURN</label>
            </div>
            <div class="info-box">
              <input type="radio" name="flightType" value="onway" id="one-way" />
              <label for="one-way">ONE WAY</label>
            </div>
          </div>
          
          <!-- FROM/TO -->
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
              <input type="date" class="leave-date" name="leaveDate" />
            </div>
            <div class="info-box" id="return-box">
              <label for="">RETURNING ON</label>
              <input type="date" class="return-date" name="arriveDate"  />
            </div>
          </div>
          <input type ="text" hidden name="log_id" value="log_id">
          
          <!-- PASSENGER INFO -->
          <div id="flight-info">
            <div class="info-box">
              <label for="adults">ADULTS</label>
              <select name="adult" id="adults" >
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </div>
            <div class="info-box">
              <label for="children">CHILDREN</label>
              <select name="chalidern" id="children" >
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="0">2</option>
                <option value="3">3</option>
              </select>
            </div>
            <div class="info-box">
              <label for="class-type">CLASS</label>
              <select name="class" id="class-type" >
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
            <input type="submit" id="search-flight" value="SEARCH FLIGHTS"/>
          </div>
        </div>
          
        </form> 
        </div>
      </section>
    
      <div id="calender">
        <div class="nav">
          <button id="prev"><</button>
          <p><span id="month"></span>
            <span id="year"></span></p>
          <button id="next">></button>
        </div>
        <table id="cal"></table>
        </div>
        
  </div>
  <div id="confirm"></div>
  <!--start contact info-->

  <section>
  
    <div class="listing-hero" id="contact">
      <div class="hero-heading">
          <div class="hero-large">Contact Us.</div>
          <div class="hero-text"> <i>Got any Questions? Feel free to ask or visit our FAQ page </i> </div>       
        </div>
    </div>
  
  <div class="container-contact">
      <div class="wrap-contact">
  
        <form name="contact" class="contact-form validate-form" method="post" action= "contact-form-handler.php">
  
          <div class="wrap-input validate-input" data-validate="Please enter your name">
            <input class="input" type="text" name="name" placeholder="Full Name" name="fullName">
          </div>
  
          <div class="wrap-input validate-input" data-validate = "Please enter your email">
            <input class="input" type="text" name="email" placeholder="E-mail">
          </div>
  
          <div class="wrap-input validate-input" data-validate = "Please enter your message">
            <textarea class="input" type="text" name="message" placeholder="Your Message"></textarea>
          </div>
  
          <div class="container-contact-form-btn">
            <button type="submit" class="contact-form-btn">
              <a href ="mailto:mariamabdelrazek704.gmail.com">
              <span>Send</span></a>
            </button>
          </div>
  
          <div class="grid-container">
            <div class="item1 left-align"><i class="fa fa-lg fa-map-marker-alt"></i> 4517 Washington Ave, Manchester, Kentucky 39495</div>  
            <div class="item4 right-align"><i class="fa fa-lg fa-phone"></i> (123) 456-7890<br>(123) 456-7890</div>
  
        </div>
  
        </form>
  
      </div>
    </div>
  </div>
  
  </div>
  
  </section>

              <!-- Start Footer -->
    <div class="footer">
      <div class="container">
        <img src="images/logo.png" alt="Logo" />
        <p>We Are Social</p>
        <div class="social-icons">
          <i class="fab fa-facebook-f"></i>
          <i class="fab fa-twitter"></i>
          <i class="fas fa-home"></i>
          <i class="fab fa-linkedin"></i>
        </div>
        <p class="copyright">&copy; 2021 <span>Kasper</span> All Right Reserved</p>
      </div>
   </div> 
   
    <!-- End Footer -->
        <!---->
  
          <!---->
        <!---->
       
</body>
</html>