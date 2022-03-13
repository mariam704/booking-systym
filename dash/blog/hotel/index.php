<?php 
//   include '../helpers/function.php';
  include '../helpers/datbas.php';




  $sql = "select * from hotels order by id desc ";

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
            
        
            
            // echo 'WELCOME '.  $_SESSION['data']['firstName'];
             
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
                <th style="margin:5px; width:20%;">action</th>
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
    </div>
   
    <!-- end .container -->


    <?php 
    include '../footer.php';
?>  