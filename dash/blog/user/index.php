<?php 
include '../helpers/datbas.php';
// require 'datbas.php';
// require 'checkLogin.php'; 
// if(!isset($_SESSION['data'])){
//     header("Location:login.php");
// }
$sql = "select loguser.* , booking.id as bookingID ,hotels.hotelName as hotels from loguser join booking on loguser .booking_id = booking.id    join hotels   on hotels.id = loguser.hotels_id ";
$op  = mysqli_query($con,$sql);


include '../header.php';
?>
  
  <body class="sb-nav-fixed">
        
    
<?php 
    include '../nav.php';
?>  


        <div id="layoutSidenav">
                  
         
<?php 
    include '../sidNav.php';


// error_reporting(0);
?>


<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
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

        <div class="card-body" style="margin: 0 14px;">
                            <div class="table-responsive">

        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
   



 


 


      

     
            <tr style="margin:5px; width:20%;">
                <th>ID</th>
                <th>firstname</th>
                <th>lastname</th>
                <th>email</th>
                <th>password</th>
                <th>phone</th>
                <th>booking_flight</th>
                <th>booking_hotel</th>
                <th >action</th>
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
    <?php 
    include '../footer.php';
?>  