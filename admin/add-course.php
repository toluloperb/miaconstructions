<?php
    session_start();
    if (isset($_SESSION['auth']))
    {
        include("includes/header.php");
        ?>
            <div class="containerAddCourse">
                <h1>Add New Course</h1>
                <div class="column">
                    <p>This section helps you add new courses to the system. Provide the details of the course in the field below.</p>
                    <form action="../functions/postfunc" method="post" enctype="multipart/form-data">
                        <div class="formfied newfield">
                            <label for="" class="formlabel">Course Title</label>
                            <input type="text" name="course_title" id="">
                        </div>

                        <div class="formfied newfield">
                            <label for="" class="formlabel">Course Description</label>
                            <textarea name="course_desc" id=""></textarea>
                        </div>

                        <div class="formfied newfield">
                            <label for="" class="formlabel">Price</label>
                            <input type="text" name="price" id="">
                        </div>

                        <div class="formfied newfield">
                            <label for="" class="formlabel">Illustration</label>
                            <input type="file" name="image" id="">
                        </div>

                        <button type="submit" name="addNewCourse" class="button roundbutton">Submit</button>
                    </form>
                </div>
            </div>
        <?php

        include("includes/footer.php");
    }
    else
    {
        header("Location: login?error=Login to continue");
        exit();
    }
?>