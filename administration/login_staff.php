<?php
require 'dbconnect.php';


if(isset($_POST['staff_login'])){
    
    $u = $_POST['inputUsername'];
    $p = $_POST['inputPassword'];
    
    $sql="SELECT * FROM staff WHERE staff_username='$u' AND staff_password='$p'";
    
    $check = mysqli_query($connect, $sql);
    
    if(mysqli_num_rows($check)==1){
        $row = mysqli_fetch_assoc($check);
        if($row['staff_username']==$u && $row['staff_password']==$p){
            $_SESSION['message'] = "Welcome back ! $u let start to work.";
            $_SESSION['id'] = $row['staff_id'];
            $_SESSION['username'] = $row['staff_username'];
            
            header("Location:http://localhost/Computer-Store-POS-System/administration/admin_dashboard.php");
            exit(0);
        }
    }else{
        echo '<script>alert("Your login was failed !")</script>';
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Staff Login Page</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>

        <style>
            #pws1_eye1{
                font-size: 20px;
            }
            #pws1_eye2{
                display: none;
                font-size: 20px;
            }
        </style>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Admin Login</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                            <div class="mb-3">
                                                <input class="form-control" name="inputUsername" id="inputUsername" type="text" placeholder="Username"/>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input class="form-control" name="inputPassword" id="inputPassword" type="password" placeholder="Password"/>
                                                <span onclick="togglePasswordIcon1()">
                                                    <button type="button" id="pws1_eye1" class="bi bi-eye-slash-fill"></button>
                                                    <button type="button" id="pws1_eye2" class="bi bi-eye-fill"></button>
                                                </span>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="account_retrieve_password.php">Forgot Password?</a>
                                                <button type="submit" class="btn btn-primary" name="staff_login">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <?php include 'static-nav/static-footer.html'; ?>
        </div>
        <script>
            //Toggle Password Visibility
            function togglePasswordIcon1() {
                var x1 = document.getElementById("inputPassword");
                var y1 = document.getElementById("pws1_eye1");
                var z1 = document.getElementById("pws1_eye2");

                if (x1.type === "password") {
                    x1.type = "text";
                    y1.style.display = "none";
                    z1.style.display = "block";
                } else {
                    x1.type = "password";
                    z1.style.display = "none";
                    y1.style.display = "block";
                }
            }
        </script>
        <?php include'static-include/footer.php'; ?>