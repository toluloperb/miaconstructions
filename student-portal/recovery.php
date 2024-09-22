<?php
    session_start();
    include('includes/header.php');
    include('../config/dbcon.php');
?>
<!-- Page title -->
<title>Recover Password</title>

<section class="loginContainer ">
    <div class="formContainer fullwidth fullform">
        <a href="../."><img src="../assets/images/fibe logo.png" alt=""></a>
        <h5>Recover your Password</h5>
        <div id="message_div" class="sessionMsg">
            <p id="alert"> </p>
        </div>
        <form action="../functions/studentfunc" method="post">
            <div>
                <label for="">Enter your Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <button class="button"  name="recover" type="submit">Continue</button>
        </form>
    </div>
</section>

<?php include("includes/footer.php") ?>