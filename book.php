<?php
    include("includes/header.php");
    include("includes/navbar.php");
?>

<?php
    if(isset($_GET['b']))
    {
        $q= $_GET['b'];

        ?>
            <section class="formContainer">
                <p>
                    Fill in your information below and how you would 
                    want us to help you by providing relevant information. 
                    We will get in touch with you shortly to discuss your 
                    Business
                </p>
                <form action="functions/userfunc" method="post">
                    <div class="inputrow">
                        <div>
                            <label for="">Full names</label>
                            <input required type="text" name="full_names">
                        </div>

                        <div>
                            <label for="">Email</label>
                            <input required type="email" name="email">
                        </div>
                    </div>

                    <div class="inputrow">
                        <div>
                            <label for="">Phone number</label>
                            <input required type="tel" name="phone">
                        </div>

                        <div>
                            <label for="">Company/Organisation name</label>
                            <input required type="text" name="company">
                        </div>
                    </div>

                    <div class="textarea">
                        <div>
                            <label for="">Tell us about your company/project</label>
                            <textarea name="about" placeholder="Start typing..."></textarea>
                        </div>
                    </div>

                    <div class="inputrow">
                        <div style="width:100%">
                            <label for="">Select a service you are interested in?</label>
                            <select name="service" id="">
                                <option value="" disabled selected>Select</option>
                                <option value="Graphics Designing">Graphics Designing</option>
                                <option value="Brand Identity/Logo">Brand Identity/Logo</option>
                                <option value="Web Development">Web Development</option>
                                <option value="Digital Marketing">Digital Marketing</option>
                                <option value="Social Media">Social Media</option>
                                <option value="Printings & Billboards">Printings & Billboards</option>
                            </select>
                        </div>
                    </div>
                    <button required type="submit" class="button" name="getQuote">Get quote</button>
                </form>
            </section>
        <?php
    }
    else
    {
        ?>
            <section class="formContainer">
                <p>
                    Fill in your information below and how you would 
                    want us to help you by providing relevant information. 
                    We will get in touch with you shortly to discuss your 
                    Business
                </p>
                <form action="functions/userfunc" method="post">
                    <div class="inputrow">
                        <div>
                            <label for="">Full names</label>
                            <input required type="text" name="full_names">
                        </div>

                        <div>
                            <label for="">Email</label>
                            <input required type="email" name="email">
                        </div>
                    </div>

                    <div class="inputrow">
                        <div>
                            <label for="">Phone number</label>
                            <input required type="tel" name="phone">
                        </div>

                        <div>
                            <label for="">Company/Organisation name</label>
                            <input required type="text" name="company">
                        </div>
                    </div>

                    <div class="textarea">
                        <div>
                            <label for="">Tell us about your company/project</label>
                            <textarea name="about" placeholder="Start typing..."></textarea>
                        </div>
                    </div>

                    <div class="inputrow">
                        <div>
                            <label for="">Select a service you are interested in?</label>
                            <select name="service" id="">
                                <option value="" disabled selected>Select</option>
                                <option value="Graphics Designing">Graphics Designing</option>
                                <option value="Brand Identity/Logo">Brand Identity/Logo</option>
                                <option value="Web Development">Web Development</option>
                                <option value="Digital Marketing">Digital Marketing</option>
                                <option value="Social Media">Social Media</option>
                                <option value="Printings & Billboards">Printings & Billboards</option>
                            </select>
                        </div>

                        <div>
                            <label for="">What's your estimated budget?</label>
                            <input required type="text" name="budget">
                        </div>
                    </div>
                    <button type="submit" class="button" name="book">Let's go</button>
                </form>
            </section>
        <?php
    }
?>

<?php
    include("includes/footer.php");
?>