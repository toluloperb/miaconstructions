<?php
    include("includes/header.php");
    include("includes/navbar.php");
    include("config/dbcon.php");
?>

<?php
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $select_course = "SELECT * FROM courses WHERE id = '$id'";
        $select_course_run = mysqli_query($con, $select_course);

        if($select_course_run)
        {
            foreach($select_course_run as $data)
            {
                ?>
                    <section class="content clients">
                        <div class="courses_container">
                            <div class="formcolumn">
                                <button class="button" onclick="history.back()"><i class="fa fa-arrow-left"></i> Go back</button>
                                <p>Great! You have shown interest to learn <strong><?= $data['course_title'] ?></strong> We are delighted to have you join us. Let's roll!</p>

                                <form action="functions/userfunc.php" method="post" enctype="multipart/form-data">
                                    <div class="formfieldrow">
                                        <div class="formfield">
                                            <label for="">Full Name</label>
                                            <input class="field" class="field" id="full_name" type="text" name="full_name" placeholder="First Name, Surname & Last Name" required>                        
                                        </div>

                                        <input type="text" name="price" value="<?= $data['price'] ?>" hidden>

                                        <div class="formfield">
                                            <label for="">Email</label>
                                            <input class="field" id="email" type="email" name="email" placeholder="youremail@example.com"required>                        
                                        </div>

                                        <div class="formfield">
                                            <label for="">Telephone Number</label>
                                            <input class="field" id="phone" type="text" name="phone" placeholder="+2348110000000"required>                        
                                        </div>
                                    </div>

                                    <div class="formfieldrow">
                                        <div class="formfield">
                                            <label for="">Address</label>
                                            <input class="field" id="address" type="text" name="address"required>                        
                                        </div>

                                        <div class="formfield">
                                            <label for="">Date of Birth</label>
                                            <input class="field" id="dob" type="date" name="dob"required>                        
                                        </div>

                                        <div class="formfield">
                                            <label for="">Gender</label>
                                            <select class="field" name="gender" id="gender" required>
                                                <option value="" selected disabled> Select</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="formfieldrow">
                                        <div class="formfield">
                                            <label for="">Marital status</label>
                                            <select class="field" name="marital_status" id="marital_status"required>
                                                <option value="" selected disabled> Select</option>
                                                <option value="single">Single</option>
                                                <option value="married">Married</option>
                                                <option value="Divorced">Divorced</option>
                                            </select>                        
                                        </div>

                                        <div class="formfield">
                                            <label for="">Disability (NIL if none)</label>
                                            <input class="field" id="disability" type="text" name="disability"required placeholder="e.g. deaf-blindness, deafness">                        
                                        </div>

                                        <div class="formfield">
                                            <label for="">Allergies (NIL if none)</label>
                                            <input class="field" id="allergies" type="text" name="allergies"required placeholder="e.g cockroaches, mold">                        
                                        </div>
                                    </div>

                                    <div class="formfieldrow">
                                        <div class="formfield">
                                            <label for="">Educational status</label>
                                            <select class="field" name="edu_status" id="edu_status"required>
                                                <option value="" selected disabled> Select</option>
                                                <option value="Primary">Primary</option>
                                                <option value="Secondary">Secondary</option>
                                                <option value="ND">ND</option>
                                                <option value="OND">OND</option>
                                                <option value="HND">HND</option>
                                                <option value="BSC">BSC</option>
                                                <option value="Others">Others</option>
                                            </select>                        
                                        </div>
                                        
                                        <div class="formfield">
                                            <label for="">Occupational status</label>
                                            <select class="field" name="job_status" id="job_status"required>
                                                <option value="" selected disabled> Select</option>
                                                <option value="Unemployed">Unemployed</option>
                                                <option value="Employed">Employed</option>
                                                <option value="Self Employed">Self Employed</option>
                                                <option value="Student">Student</option>
                                            </select>                        
                                        </div>

                                        <div class="formfield">
                                            <label for="">Religious belief</label>
                                            <select class="field" name="religion" id="religion"required>
                                                <option value="" selected disabled> Select</option>
                                                <option value="Christian">Christian</option>
                                                <option value="Muslim">Muslim</option>
                                                <option value="None">None</option>
                                            </select>                        
                                        </div>
                                    </div>

                                    <div class="formfieldrow">
                                        <div class="formfield">
                                            <label for="">Upload a Passport photograph</label>
                                            <input type="file" name="passport" accept="jpg,png" id="" required>
                                        </div>
                                    </div>

                                    <p>SPONSORS' DETAILS</p>
                                    <hr>

                                    <div class="formfieldrow">
                                        <div class="formfield">
                                            <label for="">Sponsor's Full Name</label>
                                            <input class="field" id="sfull_name" type="text" name="sfull_name"required placeholder="First Name, Surname & Last Name">                        
                                        </div>

                                        <div class="formfield">
                                            <label for="">Sponsor's Email</label>
                                            <input class="field" id="semail" type="email" name="semail"required placeholder="youremail@example.com">                        
                                        </div>

                                        <div class="formfield">
                                            <label for="">Sponsor's Telephone Number</label>
                                            <input class="field" id="sphone" type="text" name="sphone"required placeholder="+2348110000000">                        
                                        </div>
                                    </div>

                                    <div class="formfieldrow">
                                        <div class="formfield">
                                            <label for="">Sponsor's Address</label>
                                            <input class="field" id="saddress" type="text" name="saddress"required>                        
                                        </div>

                                        <div class="formfield">
                                            <label for="">Relationship</label>
                                            <input class="field" id="srelationship" type="text" name="srelationship"required placeholder="e.g. guardian, father">                        
                                        </div>

                                        <div class="formfield">
                                            <label for="">Sponsor's Occupation</label>
                                            <input type="text" name="sjob" required>                    
                                        </div>
                                    </div>

                                    <p>DETAILS OF NEXT OF KIN</p>
                                    <hr>

                                    <div class="formfieldrow">
                                        <div class="formfield">
                                            <label for="">Full Name</label>
                                            <input class="field" id="kfull_name" type="text" name="kfull_name"required placeholder="First Name, Surname & Last Name">                        
                                        </div>

                                        <div class="formfield">
                                            <label for="">Email</label>
                                            <input class="field" id="kemail" type="email" name="kemail"required placeholder="youremail@example.com">                        
                                        </div>

                                        <div class="formfield">
                                            <label for="">Telephone Number</label>
                                            <input class="field" id="kphone" type="text" name="kphone"required placeholder="+2348110000000">                        
                                        </div>
                                    </div>

                                    <div class="formfieldrow">
                                        <div class="formfield">
                                            <label for="">Address</label>
                                            <input class="field" id="kaddress" type="text" name="kaddress"required>                        
                                        </div>

                                        <div class="formfield">
                                            <label for="">Relationship</label>
                                            <input class="field" id="krelationship" type="text" name="krelationship"required placeholder="e.g. sibling, spouse">                        
                                        </div>
                                    </div>

                                    <p>DETAILS OF COURSE OF STUDY</p>
                                    <hr>

                                    <div class="formfieldrow">
                                        <div class="formfield">
                                            <label for="">Course of Study</label>
                                            <input class="field" id="course_of_study" type="text" name="course_of_study"required value="Graphics Designing" readonly>                        
                                        </div>
                                    </div>

                                    <div class="fieldrow">
                                        <input class="field" type="checkbox" id="t&c" value="agreed to t&c" required>
                                        <label for="">I have read and agree to <a href="">terms &amp; Condition</a> applicable to the course and the institution of learning</label>
                                    </div>

                                    <button type="submit" class="button" name="submitStudentregister">Submit</button>
                                </form>
                            </div>
                        </div>
                    </section>
                <?php
            }
        }
    }
?>

<?php
    include("includes/footer.php");
?>