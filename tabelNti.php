<?php 

require 'datbas.php';
require 'checkLogin.php'; 
// if(!isset($_SESSION['data'])){
//     header("Location:login.php");
// }
$sql = "select loguser.* , booking.id as bookingID ,hotels.hotelName as hotels from loguser join booking on loguser .booking_id = booking.id    join hotels   on hotels.id = loguser.hotels_id ";
$op  = mysqli_query($con,$sql);
// // $sql = "select * from loguser order by id desc ";
//  $sql="select loguser.* ,booking.id as bookingID   from loguser inner join booking on loguser.booking_id=booking.id order by loguser.id desc "; 
// $op  = mysqli_query($con,$sql);
// $sql=" select  loguser.* ,hotels.id as hotelsID   from loguser inner join hotels on loguser.hotels_id=hotels.id  order by loguser.id desc ";



// error_reporting(0);
?>





<!DOCTYPE html>
<html>

<head>
    <title>- address table</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }
        
        .m-b-1em {
            margin-bottom: 1em;
        }
        
        .m-l-1em {
            margin-left: 1em;
        }
        
        .mt0 {
            margin-top: 0;
        }
    </style>

</head>

<body>

    <!-- container -->
    <div class="container">
 

        <div class="page-header">
            <h1>Read Users </h1>
        
            <?php 
            
        
            
            echo 'WELCOME '.  $_SESSION['data']['firstName'];
             
             ?>
         <a href="logout1.php">Logout</a>






 


      <?php 
      
         if(isset($_SESSION['message'])){
             echo '* '.$_SESSION['message'];
         }
         unset($_SESSION['message']);
      ?>

        </div>

        <!-- PHP code to read records will be here -->



        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>ID</th>
                <th>firstname</th>
                <th>lastname</th>
                <th>email</th>
                <th>password</th>
                <th>phone</th>
                <th>booking_flight</th>
                <th>booking_hotel</th>
                <th>action</th>
            </tr>

           <?php    
               while($data = mysqli_fetch_assoc($op)){
           
           ?>


           <tr>
                 <td> <?php echo $data['id'];?></td>
                 <td> <?php echo $data['firstName'];?></td>
                 <td> <?php echo $data['lastName'];?></td>
                 <td> <?php echo $data['email'];?></td>
                 <td> <?php echo $data['password'];?></td>
                 <td> <?php echo $data['phone'];?></td>
                 <td> <?php echo $data['booking_id'];?></td>
                 <td> <?php echo $data['hotels_id'];?></td>

               <td>
              <a href='delet.php?id=<?php echo $data['id'];?>' class='btn btn-danger m-r-1em'>Delete</a> 
                    
                </td> 
                <td>
                <a href='edit.php?id=<?php echo $data['id'];?>' class='btn btn-primary m-r-1em'>Edit</a>     
                </td> 
           </tr> 


         <?php } ?>
            <!-- end table -->
        </table>

    </div>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>