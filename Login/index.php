<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/Style/loginStyle.css">
    <!-- Boot Strap CSS Files -->
    <link rel="stylesheet" href="../Assets/Bootstrap/bootstrap.min.css">
    <title>Login | Invoice Management System</title>
</head>

<body>

    <!-- Main Content of our Login Form -->
    <div class="wrapper bg-white">
        <div class="applicationLogo">
            <img src="../Assets/logo.png" width="100px" alt="Logo" srcset="">
        </div>
        <div class="h2 text-center">Invoice Management System</div>
        <div class="h4 text-muted text-center">Enter your login details</div>

        <?php
            // Our PHP Login Logic Code

            /*
            echo "<div class='alert alert-danger' role='alert'>";
            echo "</div>";
            */

            // Check Post Request Exists or not
            if(isset($_POST['username'])){
                
                // Get Our Attributes
                $username = $_POST['username'];
                $password = $_POST['password'];

                // Demo Display Data
                echo "Hello" . $username;

                // If User Selects Remember
                if(isset($_POST['remember'])){

                    // To Be Implemented

                }

            }
            else{
                // To Do Nothing
            }
        ?>

        <!-- Main Form of Our Website -->
        <form action="" method="post">

            <div class="form-group py-2">
                <div class="input-field"> <span class="far fa-user p-2"></span> <input type="text" name="username"
                        placeholder="Enter your Username" required> </div>
            </div>
            <div class="form-group py-1 pb-2">
                <div class="input-field"> <span class="fas fa-lock p-2"></span> <input type="text" name="password"
                        placeholder="Enter your Password" required> <button class="btn bg-white text-muted"> <span
                            class="far fa-eye-slash"></span> </button> </div>
            </div>
            <div class="d-flex align-items-start">
                <div class="remember"> <label class="option text-muted"> Remember me <input type="radio"
                            name="remember"> <span class="checkmark"></span> </label> </div>
            </div> <button class="btn btn-block text-center my-3">Log in</button>
        </form>
    </div>

    <!-- Add our bootstrap JavaScript Files -->
    <script src="../Assets/Bootstrap/bootstrap.min.js"></script>
    <script src="../Assets/Bootstrap/jquery-3.3.1.slim.min.js"></script>
    <script src="../Assets/Bootstrap/popper.min.js"></script>

</body>

</html>