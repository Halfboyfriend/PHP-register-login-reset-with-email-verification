<?php
 $page_title = "Registration Form";
 include ('../includes/header.php');
 include ('../includes/navbar.php');
 session_start();

?>

   
   <div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
            <?php
                if(isset($_SESSION['status']))
                {
                    ?>
                        <div class="alert alert-success">
                            <h5> <?php $_SESSION['status']; ?> </h5>
                        </div>
                    <?php
                    unset($_SESSION['status']);
                }
           
                ?>
                <div class="card">
                   <div class="card shadow">
                   <div class="card-header">
                        <h4 class="text-center">Registration Form</h4>
                    </div>
                    <div class="card-body">
                            <form action="code.php" method="POST">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Phone number</label>
                                    <input type="tel" name="phone" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="text" name="password" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <button type="submit" name="register_btn" class="form-control btn btn-primary">Register</button>
                                </div>
                            </form>
                    </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
   </div>
    
   
    


<?php
 include ('../includes/footer.php');

?>