<?php
    session_start();
    include('../config/dbcon.php');
    include('includes/header.php');
    include('includes/navbar.php');

    if (isset($_SESSION['auth']))
    {
        ?>
            <main>
                <?php include('includes/sidebar.php'); ?>
                    <div class="modalContainer" id="modalContainer">
                        <div class="alignleft">
                            <div class="row">
                                <h3>Create new unit</h3>
                                <i class="fa fa-times-circle" id="closeModal"></i>
                            </div>

                            <hr class="mainhr">

                            <p class="minitext">Units are where your members & other executives communicate.</p>
                            <form action="" method="POST">
                                <div class="formfield">
                                    <label for="">Unit Name</label>
                                    <input type="text" id="unit_name" placeholder="e.g. Ushering" required>
                                </div>

                                <div class="formfield">
                                    <label for="">Description</label>
                                    <input type="text" id="unit_desc" placeholder="What is this unit about?">
                                </div>

                                <input type="text" id="status" class="status" value="Show" hidden>

                                <div class="row">
                                    <div class="column">
                                        <label><strong>Set as Hidden</strong></label>
                                        <label class="minitext" for="">When a unit is set to hidden, it can only be seen by a super admin.</label>
                                    </div>
                                    <i class="fa fa-toggle-off" id="status-off"></i>
                                    <i class="fa fa-toggle-on" id="status-on" style="display: none;"></i>
                                </div>

                                <hr class="mainhr">

                                <button type="submit" class="button createUnit">Create</button>
                            </form>
                        </div>
                    </div>
                <div class="mainContainer">
                    <?php
                        $student_email = $_SESSION['auth_email'];
                        $check_admission_status = "SELECT * FROM students WHERE email = '$student_email' LIMIT 1";
                        $check_admission_status_run = mysqli_query($con, $check_admission_status);

                        if($check_admission_status_run)
                        {
                            foreach($check_admission_status_run as $check)
                            {
                                $status = $check["admission_status"];

                                if($status == "")
                                {
                                    ?>
                                        <div class="button row" style="background-color: red; border:none; margin-bottom: 20px; padding: 20px">
                                            <p style="color: #fff;"><i class="fa fa-warning"></i> Upload your Evidence of Payment</p>
                                            <button id="uploadProofofPaymentModal" class="button">Proceed</button>
                                        </div>
                                    <?php
                                }
                            }
                        }
                    ?>
                    
                    <?php
                        if(isset($_SESSION['status']))
                        {
                            ?>
                                <div id="fade" class="sessionMsg">
                                    <p><i class="fa fa-info-circle"></i> <?= $_SESSION['status'] ?></p>
                                </div>
                            <?php
                            unset($_SESSION['status']);
                        }
                    ?>
                    <h2>Profile</h2> <br>
                    <form action="functions/userfunc.php" method="post" enctype="multipart/form-data">
                        <div class="profilepics" style="background: url('../uploads/<?= $check['passport'] ?>');"></div>
                        <div class="formfieldrow">
                            <div class="formfield">
                                <label for="">Full Name</label>
                                <input class="field" class="field" id="full_name" type="text" name="full_name" placeholder="First Name, Surname & Last Name"  value="<?= $check['full_name'] ?>" readonly disabled>                        
                            </div>

                            <div class="formfield">
                                <label for="">Email</label>
                                <input class="field" id="email" type="email" name="email" placeholder="youremail@example.com" value="<?= $check['email'] ?>" readonly disabled>                        
                            </div>

                            <div class="formfield">
                                <label for="">Telephone Number</label>
                                <input class="field" id="phone" type="text" name="phone" placeholder="+2348110000000" value="<?= $check['phone'] ?>" readonly disabled>                        
                            </div>
                        </div>

                        <div class="formfieldrow">
                            <div class="formfield">
                                <label for="">Address</label>
                                <input class="field" id="address" type="text" name="address" value="<?= $check['address'] ?>" readonly disabled>                        
                            </div>

                            <div class="formfield">
                                <label for="">Date of Birth</label>
                                <input class="field" id="dob" type="date" name="dob" value="<?= $check['dob'] ?>" readonly disabled>                        
                            </div>

                            <div class="formfield">
                                <label for="">Gender</label>
                                <input class="field" name="gender" id="gender"  value="<?= $check['gender'] ?>" readonly disabled>
                                </i>
                            </div>
                        </div>

                        <div class="formfieldrow">
                            <div class="formfield">
                                <label for="">Marital status</label>
                                <input class="field" name="marital_status" id="marital_status" value="<?= $check['marital_status'] ?>" readonly disabled>             
                            </div>

                            <div class="formfield">
                                <label for="">Disability (NIL if none)</label>
                                <input class="field" id="disability" type="text" name="disability" value="<?= $check['disability'] ?>" readonly disabled placeholder="e.g. deaf-blindness, deafness">                        
                            </div>

                            <div class="formfield">
                                <label for="">Allergies (NIL if none)</label>
                                <input class="field" id="allergies" type="text" name="allergies" value="<?= $check['allergies'] ?>" readonly disabled placeholder="e.g cockroaches, mold">                        
                            </div>
                        </div>

                        <div class="formfieldrow">
                            <div class="formfield">
                                <label for="">Educational status</label>
                                <input class="field" name="edu_status" id="edu_status" value="<?= $check['edu_status'] ?>" readonly disabled>                   
                            </div>
                            
                            <div class="formfield">
                                <label for="">Occupational status</label>
                                <input class="field" name="job_status" id="job_status" value="<?= $check['job_status'] ?>" readonly disabled>                     
                            </div>

                            <div class="formfield">
                                <label for="">Religious belief</label>
                                <input class="field" name="religion" id="religion" value="<?= $check['religion'] ?>" readonly disabled>                     
                            </div>
                        </div>

                        <p>SPONSORS' DETAILS</p>
                        <hr class="hr">

                        <div class="formfieldrow">
                            <div class="formfield">
                                <label for="">Sponsor's Full Name</label>
                                <input class="field" id="sfull_name" type="text" name="sfull_name" value="<?= $check['sfull_name'] ?>" readonly disabled placeholder="First Name, Surname & Last Name">                        
                            </div>

                            <div class="formfield">
                                <label for="">Sponsor's Email</label>
                                <input class="field" id="semail" type="email" name="semail" value="<?= $check['semail'] ?>" readonly disabled placeholder="youremail@example.com">                        
                            </div>

                            <div class="formfield">
                                <label for="">Sponsor's Telephone Number</label>
                                <input class="field" id="sphone" type="text" name="sphone" value="<?= $check['sphone'] ?>" readonly disabled placeholder="+2348110000000">                        
                            </div>
                        </div>

                        <div class="formfieldrow">
                            <div class="formfield">
                                <label for="">Sponsor's Address</label>
                                <input class="field" id="saddress" type="text" name="saddress" value="<?= $check['saddress'] ?>" readonly disabled>                        
                            </div>

                            <div class="formfield">
                                <label for="">Relationship</label>
                                <input class="field" id="srelationship" type="text" name="srelationship" value="<?= $check['srelationship'] ?>" readonly disabled placeholder="e.g. guardian, father">                        
                            </div>

                            <div class="formfield">
                                <label for="">Sponsor's Occupation</label>
                                <input type="text" name="sjob"  value="<?= $check['sjob'] ?>" readonly disabled>                    
                            </div>
                        </div>

                        <p>DETAILS OF NEXT OF KIN</p>
                        <hr class="hr">

                        <div class="formfieldrow">
                            <div class="formfield">
                                <label for="">Full Name</label>
                                <input class="field" id="kfull_name" type="text" name="kfull_name" value="<?= $check['kfull_name'] ?>" readonly disabled placeholder="First Name, Surname & Last Name">                        
                            </div>

                            <div class="formfield">
                                <label for="">Email</label>
                                <input class="field" id="kemail" type="email" name="kemail" value="<?= $check['kemail'] ?>" readonly disabled placeholder="youremail@example.com">                        
                            </div>

                            <div class="formfield">
                                <label for="">Telephone Number</label>
                                <input class="field" id="kphone" type="text" name="kphone" value="<?= $check['kphone'] ?>" readonly disabled placeholder="+2348110000000">                        
                            </div>
                        </div>

                        <div class="formfieldrow">
                            <div class="formfield">
                                <label for="">Address</label>
                                <input class="field" id="kaddress" type="text" name="kaddress" value="<?= $check['kaddress'] ?>" readonly disabled>                        
                            </div>

                            <div class="formfield">
                                <label for="">Relationship</label>
                                <input class="field" id="krelationship" type="text" name="krelationship" value="<?= $check['krelationship'] ?>" readonly disabled placeholder="e.g. sibling, spouse">                        
                            </div>
                        </div>

                        <p>DETAILS OF COURSE OF STUDY</p>
                        <hr class="hr">

                        <div class="formfieldrow">
                            <div class="formfield">
                                <label for="">Course of Study</label>
                                <input class="field" id="course_of_study" type="text" name="course_of_study" value="<?= $check['course_of_study'] ?>" readonly disabled value="Graphics Designing" readonly>                        
                            </div>
                        </div>
                    </form>
                    <br><br>
                </div>
            </main>
        <?php
    }
    else
    {
        header("Location: login");
        exit();
    }
?>

<?php include('includes/footer.php'); ?>