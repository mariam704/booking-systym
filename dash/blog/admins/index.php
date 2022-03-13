<?php 

  include '../helpers/function.php';
  include '../helpers/datbas.php';
//   include '../helpers/checkLogin.php';

  $sql = "select admin.* ,  adminroles.title as title from admin join adminroles on admin.role_id = adminroles.id ";

  $op  = mysqli_query($con,$sql); 
//   echo mysqli_error($con);
//   exit();
  
  
  
  
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
                <!-- <div class="container-fluid" style="margin: 0 216px; width: 63%;}"> -->
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">


                        <?php 
                        

                        if(isset($_SESSION['messages'])){

                           foreach($_SESSION['messages'] as $key =>  $data){

                            echo '* '.$key.' : '.$data.'<br>';
                           }

                             unset($_SESSION['messages']);
                         }else{
                    ?>
                    
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Admin Roles</li>
                    <?php } ?>
               
                        
                        
                        </ol>
    
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                DataTable Example
                            </div>

                            <div class="card-body" style="margin: 0 264px;">
                            <div class="table-responsive">
                      
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th style="margin:5px; width:20%;">Action</th>
                                          
                                            </tr>
                                        </thead>
                                  
                                    
                                        <tbody>
                                       
                             <?php 
                             
                                while($data = mysqli_fetch_assoc($op)){
                                    // header('Location: http://localhost/project/dash/blog/admins/index.php');
                             
                             ?>           
                                        <tr>
                                                <td><?php echo $data['id'];?></td>
                                                <td ><?php echo $data['name'];?></td>
                                                <td ><?php echo $data['email'];?></td>
                                                <td ><?php echo $data['title'];?></td>
                                                <td style="display: flex;">
                                                <a style="padding: 0 5px;margin: 0 8px 0 -9px;" href='delete.php?id=<?php echo $data['id'];?>' class='btn btn-danger m-r-1em'>Delete</a>
                                                <a style="padding: 0 5px;margin: 0 8px 0 -9px;" href='edit.php?id=<?php echo $data['id'];?>' class='btn btn-primary m-r-1em'>Edit</a>  
                                                </td>
                                  
                                        </tr>
                            <?php } ?>             
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>




               
    
                
<?php 
    include '../footer.php';
?>  