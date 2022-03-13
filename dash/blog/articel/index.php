<?php 
  include '../helpers/function.php';
  include '../helpers/datbas.php';

  $sql = "select articales.* ,  articalecategories.title as CatTitle ,admin.name as addedName from articales join articalecategories on articales.cat_id = articalecategories.id    join admin   on admin.id = articales.added_by ";
  
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

<div class="container-fluid" style="margin: 0 216px; width: 63%;}">
           
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
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
                            <li class="breadcrumb-item active">Articales</li>
                    <?php } ?>
               
                        
                        
                        </ol>
    
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                DataTable Example
                            </div>
                       
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>content</th>
                                                <th>category</th>
                                                <th>Image</th>
                                                <th>By</th>
                                                <th  style="margin:5px; width:20%;" >Action</th>
                                          
                                            </tr>
                                        </thead>
                                  
                                    
                                        <tbody>
                                       
                             <?php 
                             
                                while($data = mysqli_fetch_assoc($op)){
                             
                             ?>           
                                        <tr>
                                                <td><?php echo $data['id'];?></td>
                                                <td><?php echo $data['title'];?></td>
                                                <td><?php echo  substr(str_replace('_',"'",$data['content']),0,49).'....';?></td>
                                                <td><?php echo $data['CatTitle'];?></td>
                                                <td><img src="./uploads/<?php echo $data['image'];?>" width="50px" height="50px"> </td>
                                                <td><?php echo $data['addedName'];?></td>

                                                <td>

                                                <a href='delete.php?id=<?php echo $data['id'];?>' class='btn btn-danger m-r-1em'>Delete</a>
                                                <a href='edit.php?id=<?php echo $data['id'];?>' class='btn btn-primary m-r-1em'>Edit</a>  
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