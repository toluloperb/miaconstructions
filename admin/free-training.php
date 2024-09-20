<?php
    session_start();
    if (isset($_SESSION['auth']))
    {
        include("includes/header.php");
        include("includes/navbar.php");
        include("includes/sidebar.php");

        ?>
            <main>
                <section class="">
                    <h3>Free Training Sessions</h3>

                    <div class="toppings">
                        <p>5 Sessions</p>
                        <button type="button" id="generatelink" class="button"><i class="fas fa-plus"></i> Create a Session</button>
                    </div>
                </section>
            </main>
        <?php

        include("includes/footer.php");
    }
    else
    {
        header("Location: login?error=Login to continue");
        exit();
    }
?>