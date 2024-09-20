<?php
    include("includes/header.php");
    include("includes/navbar.php");
    include("config/dbcon.php");
?>

<section class="landingScreen pagesbanner">
    <div class="container">
        <h3>Free Training</h3>
        <p>Register Below</p>
    </div>
</section>

<section class="free-training">
    <form action="" method="post">
        <!-- Stage 1 -->
        <div class="stage1" id="stage1">
            <div class="formfield">
                <label for="" class="thicklabel">Let's meet you!</label>
                <p>Enter your Fullname</p>
                <input type="text" id="fullname" placeholder="Ex: Simon Emmanuel" required>
                <p class="redtext minitext" id="redtext">Missing Values***</p>
            </div>

            <button type="button" class="button" id="nextBtn1">Continue</button>
        </div>
        

        <!-- stage 2 -->
        <div class="stage2" id="stage2">
            <div class="formfield">
                <label for="" class="thicklabel">Let's reach you!</label>
                <p for="">What's your email address?</p>
                <input type="email" id="email" placeholder="Ex: hemmanueldami@gmail.com" required>
                <p class="redtext minitext" id="redtext2">Missing Values***</p>
            </div>

            <button type="button" class="button" id="nextBtn2">Continue</button>
        </div>

        <!-- stage 3 -->
        <div class="stage3" id="stage3">
            <div class="formfield">
                <label for="" class="thicklabel">What's your interest?</label>
                <p for="">Select a skill you'll like to learn</p>
                <select type="text" id="interest" required>
                    <option value="" selected disabled>Ex: UI/UX Design</option>
                    <option value="UI/UX Design">UI/UX Design</option>
                </select>
                <p class="redtext minitext" id="redtext3">Missing Values***</p>
            </div>

            <button type="button" class="button" id="nextBtn3">Continue</button>
        </div>
    </form>

    <!-- Success Stage -->
    <div class="success" id="success">
        <img src="assets/images/check.png" alt="">
        <p>Your form was submitted and received successfully!</p>
        <p>We'll be in touch shortly.</p>
        <a href="academia"><button class="button" id="nextBtn3">Continue</button></a>
    </div>

    <!-- Success Stage -->
    <div class="success" id="failed">
        <img src="assets/images/multiply.png" alt="">
        <p>Error</p>
        <p>Contact support: <a href="mailto:support@fibebusinessagency.com" style="text-transform: lowercase;">support@fibebusinessagency.com</a></p>
        <a href="free-training"><button class="button" id="nextBtn3">Retry</button></a>
    </div>
</section>

<?php
    include("includes/footer.php");
?>