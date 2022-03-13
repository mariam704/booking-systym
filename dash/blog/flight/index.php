<?php 
  include '../helpers/datbas.php';
// require 'datbas.php'; 
// if(!isset($_SESSION['data'])){
//     header("Location:login1.php");
// }
$sql = "select * from booking order by id desc ";

//$sql = "SELECT booking.* ,loguser.* FROM booking INNER JOIN loguser on booking.log_id=loguser.id";
$op  = mysqli_query($con,$sql);

//flight booking > booking databes >delet3 >editflight
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
                        <h1 class="mt-4">Tables</h1>
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
        <div class="card-body" style="margin: 0 10px;">
                                <div class="table-responsive">


        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>ID</th>
                <th>flightType</th>
                <th>leavingFrom</th>
                <th>arrivingAt</th>
                <th>leaveDate</th>
                <th>arriveDate</th>
                <th>class</th>
                <th>chalidern</th>
                <th>adult</th>
                
                <th style="margin:5px; width:20%;">action</th>
            </tr>

           <?php    
               while($data = mysqli_fetch_assoc($op)){
           
           ?>


           <tr>
                 <td> <?php echo $data['id'];?></td>
                 <td> <?php echo $data['flightType'];?></td>
                 <td> <?php echo $data['leavingFrom'];?></td>
                 <td> <?php echo $data['arrivingAt'];?></td>
                 <td> <?php echo $data['leaveDate'];?></td>
                 <td> <?php echo $data['arriveDate'];?></td>
                 <td> <?php echo $data['class'];?></td>
                 <td> <?php echo $data['chalidern'];?></td>
                 <td> <?php echo $data['adult'];?></td>
              
                 
               <td>
              <a href='delete.php?id=<?php echo $data['id'];?>' class='btn btn-danger m-r-1em'>Delete</a> 
                    
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