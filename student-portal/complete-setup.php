<?php
    session_start();
    include('includes/header.php');
    include('../config/dbcon.php');
?>
<!-- Page title -->
<title>Login | Setup</title>

<?php
    if(isset($_GET['femail']))
    {
        $email = $_GET["femail"];

        $check_if_password_exist = "SELECT * FROM students WHERE email = '$email'";
        $check_if_password_exist_run = mysqli_query($con, $check_if_password_exist);

        $update_paystatus = "UPDATE students SET pay_status = 'full_payment', admission_status = 'admitted' WHERE email='$email'";
        $update_paystatus_run = mysqli_query($con, $update_paystatus);

        if(mysqli_num_rows($check_if_password_exist_run) > 0)
        {
            foreach($check_if_password_exist_run as $verify)
            {
                $password = $verify["password"];

                if($password == "")
                {
                    $otp = rand(000000, 999999);

                    $update = "UPDATE students SET otp='$otp' WHERE email = '$email'";
                    $update_run = mysqli_query($con, $update);
                }
            }
        }

        ?>
            <section class="loginContainer ">
                <div class="formContainer fullwidth fullform">
                    <!-- <a href="../."><img src="../assets/images/fibe logo.png" alt=""></a> -->
                    <h5>Setup your Password</h5>
                    <div id="message_div" class="sessionMsg">
                        <p id="alert"> </p>
                    </div>
                    <form action="../functions/studentfunc" method="post">
                        <div>
                            <!-- <label for="">Email</label> -->
                            <input type="text" name="email" value="<?= $email ?>" id="email" hidden required>
                        </div>

                        <div id="">
                            <label for="">New Password</label>
                            <input type="password" name="password" id="password" required>
                        </div>

                        <div id="">
                            <label for="">Re-enter New Password</label>
                            <input type="password" name="cpassword" id="cpassword" required>
                        </div>
                        <button class="button"  name="verify" type="submit">Set New Password</button>
                    </form>
                </div>
            </section>
        <?php
    }
?>

<?php include("includes/footer.php") ?>