<?php 
    include './helpers/function.php';
    include './helpers/datbas.php';
    include 'header.php';




    if($_SERVER['REQUEST_METHOD'] == "POST"){

      // lOGIC ... 
      $email    = CleanInputs($_POST['email']);
      $password = $_POST['password'];

      $Messages = [];
      # Validate Inputs .... 


      if(!Validator($email,1)){
   
         $Messages['emailRequired'] = "Email field Required";
      }

     if(!Validator($email,4)){

        $Messages['email'] = "Invalid Email";
     }      

     
     if(!Validator($password,1)){
   
        $Messages['passwordRequired'] = "Password field Required";
     }


     if(!Validator($password,2)){
   
        $Messages['passwordLength'] = "Password length must be >= 6";
     }



      if(count($Messages) == 0 ){

      // Login Lodgic 
        $password = sha1($password);  
        $sql = "select * from admin where email ='$email' and password = '$password'";
        
        $op  =  mysqli_query($con,$sql);

        if(mysqli_num_rows($op) == 1){
        
         $data = mysqli_fetch_assoc($op);

         $_SESSION['user'] = $data;

         header('Location: http://localhost/project/dash/blog/admins/index.php');
        }else{
            $Messages['messages'] = "Error in Login Try Again!!! maybe you not have account";
        }

        

      }



   if(count($Messages) > 0){

        $_SESSION['messages'] = $Messages;

        }
      

    }




    
?>




    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                
                                <?php 
                                    # Display Error Messages ... 

                                  


                                    if(isset($_SESSION['messages'])){
                                   
                                      foreach($_SESSION['messages'] as $data){

                                        echo '* '.$data.'<br>';
                                      }
                                     unset($_SESSION['messages']);
                                          
                                    }
                                
                                
                                ?>
                                
                                
                                    <div class="card-body">
                                     
                                    
                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" >
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" id="inputEmailAddress" name="email"  type="email" placeholder="Enter email address" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword"   name="password" type="password" placeholder="Enter password" />
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <!-- <a class="small" href="password.html">Forgot Password?</a>
                                                <a class="btn btn-primary" href="index.html">Login</a> -->

                                                <input type="submit"  class="btn btn-primary "value="Login">
                                            </div>
                                        </form>



                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="http://localhost/project/dash/blog/admins/add.php">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo url('js/scripts.js');?>"></script>
    </body>
</html>