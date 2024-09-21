<?php
    session_start();
    include('includes/header.php');
?>
<!-- Page title -->
<title>Login | Student Portal</title>

<section class="loginContainer">
    <div class="formContainer">
        <a href="../."><img src="../assets/images/fibe logo.png" alt=""></a>
        <h5>Sign in to your account</h5>
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
        <form action="../functions/studentloginauth" method="post">
            <div>
                <label for="">Username</label>
                <input type="text" name="username" required>
            </div>

            <div>
                <label for="">Password</label>
                <input type="password" name="password" required>
            </div>
            <a href="recovery"><p>Forgot your password?</p></a>
            <button class="button" name="login_btn" type="submit">Login</button>
            <!-- <p class="signup">Don't have an account yet? <a href="register"><span>Sign Up Now</span></a></p> -->
        </form>
    </div>
    <div class="illustrationContainer">
        <!-- <div class="text" style="background: url(assets/images/morning.jpg);">
            <div>
                <h1>Have you just made payment and yet to complete setting up your account?</h1>
                <p>Get ready a screenshot/picture (Bank teller, Bank App Generated Receipt or POS Receipt) as evidence of payment while the system generate a 
                    One time password to provide access to the portal where you upload your evidence of payment.</p>

                <p style="color: red;">ATTEMPT TO FORGERY MAY LEAD TO LOSS OF ACCOUNT AND CANDIDATE WILL BE PROSECUTED BY LAW.</p>
                <a href="complete-setup"><button class="button">Continue <i style="margin-left: 10px;" class="fa fa-arrow-right"></i></button></a>
            </div>
        </div> -->
    </div>
</section>

<?php include("includes/footer.php") ?>