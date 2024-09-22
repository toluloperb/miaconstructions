<?php
    session_start();
    include('includes/header.php');
    include('../config/dbcon.php');
?>
<!-- Page title -->
<title>Recover Password</title>

<?php
    if(isset($_SESSION['email']))
    {
        $email = $_SESSION['email'];
        if(isset($_POST['verifyotp']))
        {
            $otpcheck = $_POST['otp'];
            $check_otp = "SELECT * FROM students WHERE email = '$email'";
            $check_otp_run = mysqli_query($con, $check_otp);

            if(mysqli_num_rows($check_otp_run) > 0)
            {
                foreach($check_otp_run as $data)
                {
                    $otpcheckexistence = $data['otp'];

                    if($otpcheckexistence == $otpcheck)
                    {
                        ?>
                            <section class="loginContainer ">
                                <div class="formContainer fullwidth fullform">
                                    <a href="../."><img src="../assets/images/fibe logo.png" alt=""></a>
                                    <div class="resetheader">
                                        <h5>Set New Password</h5>
                                    </div>
                                    <?php
                                        if(isset($_SESSION['status']))
                                        {
                                            ?>
                                                <div id="message_div" class="sessionMsg">
                                                    <p><i class="fa fa-warning"></i> <?= $_SESSION['status'] ?></p>
                                                </div>
                                            <?php
                                            unset($_SESSION['status']);
                                        }
                                    ?>
                                    <div id="message_div" class="sessionMsg">
                                        <p id="alert"> </p>
                                    </div>
                                    <form action="../functions/studentfunc" method="post">
                                        <input type="text" name="email" value="<?= $email ?>" hidden>
                                        <div>
                                            <label for="">New Password</label>
                                            <input type="password" name="password" id="password" required>
                                        </div>

                                        <div>
                                            <label for="">Confirm New Password</label>
                                            <input type="password" name="cpassword" id="cpassword" required>
                                        </div>
                                        <button class="button"  name="newpasswordset" type="submit">Confirm</button>
                                    </form>
                                </div>
                            </section>
                        <?php
                    }
                    else
                    {
                        $_SESSION['status'] = "OTP Expired or Incorrect";
                        header("Location: ". $_SERVER['HTTP_REFERER']);
                        die();
                    }
                }
            }
        }
        else
        {
            ?>
                <section class="loginContainer ">
                    <div class="formContainer fullwidth fullform">
                        <a href="../."><img src="../assets/images/fibe logo.png" alt=""></a>
                        <div class="resetheader">
                            <h5>Verify and Reset</h5>
                            <p>A 5 Digit OTP was sent to your email</p>
                        </div>
                        <?php
                            if(isset($_SESSION['status']))
                            {
                                ?>
                                    <div id="message_div" class="sessionMsg">
                                        <p><i class="fa fa-warning"></i> <?= $_SESSION['status'] ?></p>
                                    </div>
                                <?php
                                unset($_SESSION['status']);
                            }
                        ?>
                        <div id="message_div" class="sessionMsg">
                            <p id="alert"> </p>
                        </div>
                        <form action="" method="post">
                            <div>
                                <label for="">Enter OTP</label>
                                <input type="number" name="otp" id="otp" required>
                            </div>
                            <button class="button"  name="verifyotp" type="submit">Continue</button>
                        </form>
                    </div>
                </section>
            <?php
        }
    }
?>

<?php include("includes/footer.php") ?>