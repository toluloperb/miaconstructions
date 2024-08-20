<?php
    include("includes/header.php");
    include("includes/navbar.php");
    include("config/dbcon.php");
?>

<section class="content clients">
    <div class="courses_container ">
        <div class="paymentContainer">
            <div class="row">
                <hr>
                <h3>Payment Details</h3>
            </div>
            <p>Your Registration is almost done, Kindly make payment into the bank account stated below to Complete. Payment covers application fee and tuition fee</p>
            <div class="row spacebetween">
                <h3><strong>Tuition fee</strong></h3>
                <h3><strong>&#x20A6;75,000</strong></h3>
            </div>

            <div class="row spacebetween">
                <h3><strong>Application fee</strong></h3>
                <h3><strong>&#x20A6;5,000</strong></h3>
            </div>

            <hr>
            <?php
                $total = 5000+75000;
            ?>
            <div class="row spacebetween">
                <h3><strong>Total</strong></h3>
                <h3><strong>&#x20A6;<?= number_format($total) ?></strong></h3>
            </div>
        </div>
        <div class="blackbkg">
            <p class="minitext">Kindly make payment into the account below:</p>
            <h3>Bank: Zenith Bank</h3>
            <h3>Account Number: 2121665760</h3>
            <h3>Account Name: Simon Oluwadamilare Emmanuel</h3>
        </div>
        <div class="tape"></div>
        <p class="minitext">Once Payment is Completed, go to <a href="student-portal">student portal</a></p>
    </div>
</section>

<?php
    include("includes/footer.php");
?>