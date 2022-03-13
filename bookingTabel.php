<?php 
  //include '../helpers/datbas.php';
 require 'datbas.php'; 
// if(!isset($_SESSION['data'])){
//     header("Location:login1.php");
// }
$sql = "select * from booking order by id desc ";
$op  = mysqli_query($con,$sql);
//$sql = "SELECT booking.* ,loguser.* FROM booking INNER JOIN loguser on booking.log_id=loguser.id";


//flight booking > booking databes >delet3 >editflight
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
                        

                        if(isset($_SESSION['messages'])){

                           foreach($_SESSION['messages'] as $key =>  $data){

                            echo '* '.$key.' : '.$data.'<br>';
                           }

                             unset($_SESSION['messages']);
                         }else{}
                    ?>

    
      
    

        </div>

        <!-- PHP code to read records will be here -->



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
                
                <th>action</th>
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
              <a href='delet3.php?id=<?php echo $data['id'];?>' class='btn btn-danger m-r-1em'>Delete</a> 
                    
                </td> 
                <td>
                <a href='editFlight.php?id=<?php echo $data['id'];?>' class='btn btn-primary m-r-1em'>Edit</a>     
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