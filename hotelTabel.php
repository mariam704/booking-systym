<?php 

require 'datbas.php'; 
//hotel tabel

 $sql = "select * from hotels order by id desc ";

$op  = mysqli_query($con,$sql);


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
                <th>country</th>
                <th>date</th>
                <th>Date return</th>
                <th>room</th>
                <th>adult</th>
                <th>phone</th>
                <th>child</th>
                <th>email</th>
                <th>hotel</th>
                <th>action</th>
            </tr>

           <?php    
               while($data = mysqli_fetch_assoc($op)){
           
           ?>


           <tr>
                 <td> <?php echo $data['id'];?></td>
                 <td> <?php echo $data['country'];?></td>
                 <td> <?php echo $data['date'];?></td>
                 <td> <?php echo $data['Dater'];?></td>
                 <td> <?php echo $data['room'];?></td>
                 <td> <?php echo $data['adult'];?></td>
                 <td> <?php echo $data['phone'];?></td>
                 <td> <?php echo $data['child'];?></td>
                 <td> <?php echo $data['email'];?></td>
                 <td> <?php echo $data['hotelName'];?></td>
                
                 
               <td>
              <a href='delet2.php?id=<?php echo $data['id'];?>' class='btn btn-danger m-r-1em'>Delete</a> 
                    
                </td> 
                <td>
                <a href='editHotel.php?id=<?php echo $data['id'];?>' class='btn btn-primary m-r-1em'>Edit</a>     
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