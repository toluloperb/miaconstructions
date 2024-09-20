<?php
    session_start();
    include('includes/header.php');
?>
<!-- Page title -->
<title>Login | Setup</title>

<section class="loginContainer">
    <div class="formContainer fullform">
        <a href="../."><img src="../assets/images/fibe logo.png" alt=""></a>
        <h5>Complete Setup</h5>
        <div id="message_div" class="sessionMsg">
            <p id="alert"> </p>
        </div>
        <form action=" " method="post">
            <div>
                <label for="">Email</label>
                <input type="text" name="email" id="email" required>
            </div>

            <div id="otpfield">
                <label for="">One Time Password</label>
                <input type="phone" name="otp" id="otp" required>
            </div>
            <button class="button" id="generateotp" name="generateotp" type="button">Obtain OTP</button>
            <button class="button" id="verify" name="verify" type="button">Verify & Pass</button>
        </form>
    </div>
</section>

<?php include("includes/footer.php") ?>