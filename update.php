<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Business Card Record System</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Custom Import -->
    <link rel="stylesheet" type="text/css" href="resources/assets/css/core.css">

</head>
<body>

    <!-- Check Database Exist and Include Untilities -->
    <?php 
        include 'resources/assets/php/database.php'; 
        include 'resources/assets/php/utilities.php';

        if(isset($_POST['upd'])) {
            $result = get($_POST['upd']);

            // Revision Value
            $id = $result->_id;

            // Get surname and forename
            $identity = $result->name;

            foreach($identity as $name) {
                if(isset($name->surname)) {
                    $surname = $name->surname;
                } elseif(isset($name->forename)) {
                    $forename = $name->forename;
                }
            }

            $contacts = $result->contact;
            
            // Get Mobile
            foreach($contacts as $cont) {
                if(array_key_exists('m', $cont)) {
                    $mobile = $cont->m;
                }
            }

            // Get Mobile
            foreach($contacts as $cont) {
                if(array_key_exists('f', $cont)) {
                    $fax = $cont->f;
                }
            }

            $company = $result->company;
            
            // Company Profile
            foreach($company as $com) {
                if(isset($com->name)) {
                    $name = $com->name;
                }

                if(isset($com->website)) {
                    $website = $com->website;
                }

                if(isset($com->address)) {
                    foreach($com->address as $add) {
                        if(isset($add->street)) {
                            $street = $add->street;
                        } elseif(isset($add->town)) {
                            $town = $add->town;
                        } else {
                            $county = $add->county;
                        }
                    }
                }
            }
        }
    ?>

    
    <!-- Form -->
    <div class='update-form' style='width:70%; margin: 2% auto 4% auto; -moz-box-shadow: 3px 11px 55px -16px rgba(234,79,138,1); -webkit-box-shadow: 3px 11px 55px -16px rgba(234,79,138,1); box-shadow: 3px 11px 55px -16px rgba(234,79,138,1);'>
        <!-- Header -->
        <div class="modal-header" style='background-color: #ea4f8b; color: white;'>
            <h4 class="modal-title" id="create-modal-label">Create New Business Contact</h4>
        </div> 

            <!-- Form Start -->
            <form method='post' action='index.php' class="form-horizontal" id='business-form'>

            <!-- Hidden Input for _id -->
            <input type="hidden" name="id" value="<?php echo $id; ?>" />

            <!-- Modal Body -->
            <div class="modal-body" style='text-align:left;'>
            <!-- Name -->
            <div class='form-group' style='border-bottom: 1px solid #dcdcdc'>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="surname">Surname:</label>
                            <input type="text" class="form-control" id="surname" name='surname' placeholder="Surname" required value='<?php echo $surname; ?>'>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="forename">Forename:</label>
                            <input type="text" class="form-control" id="forename" name='forename' placeholder="Forename" required value='<?php echo $forename; ?>'>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="title">Job Title:</label>
                            <input type="text" class="form-control" id="title" name='title' placeholder="Job Title" required value='<?php echo $result->title; ?>'>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class='form-group' style='border-bottom: 1px solid #dcdcdc'>
                    <div class='col-md-12 mb-3' style='padding:0;'>
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name='email' placeholder="Email Address" required value='<?php echo $result->email; ?>'>
                    </div>
                </div>

                <!-- Contact -->
                <fieldset class='form-group' style='border-bottom: 1px solid #dcdcdc'>
                    <div class='col-md-12 mb-3' style='padding:0;'>
                        <legend class='col-form-legend' style='font-size:inherit;'>Contact</legend>
                            <div class='form-row'>
                                <div class='col-md-10 input-group'>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="mobile"><i class='fa fa-mobile'></i>&emsp;Mobile</span>
                                    </div>
                                    <input type='text' name='mobile' class='form-control' placeholder='123 4567890' required pattern='\d{3}\s\d{7}' aria-describedby="mobile" value='<?php echo $mobile ?>'>
                                </div>
                                <div class='col-md-2'>
                                    <span class='switch'>
                                        <input type='checkbox' id='fax-switch' data-toggle='toggle' data-offstyle='success' data-onstyle='danger' data-on='Remove Fax' data-off='Add Fax' data-width='100%' name='fax-switch'>
                                    </span>
                                </div>
                            </div>
                            <div class='mt-3 col-md-10 input-group' id='fax-contact' style='padding:0;'>
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="fax"  style='width: 95px;'><i class='fas fa-fax'></i>&emsp;Fax</span>
                                </div>
                            <input type='text' name='fax' class='form-control' placeholder='123 4567890' id='fax' pattern='\d{3}\s\d{7}' aria-describedby="fax" value='<?php if(isset($fax)) { echo $fax; } ?>'>
                        </div>
                    </div>
                </fieldset>

                <!-- Company Profile -->
                <fieldset class='form-group'>
                <legend class='col-form-legend' style='font-size:inherit; font-style:italic;'>Company Profile</legend>
                <!-- Name -->
                <div class='form-group' style='border-bottom: 1px solid #dcdcdc'>
                    <div class='col-md-12 mb-3' style='padding:0;'>
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name='name' placeholder="Company Name" required value='<?php echo $name; ?>'>
                    </div>
                </div>
                <!-- Address -->
                <div class='form-group' style='border-bottom: 1px solid #dcdcdc'>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="street">Street:</label>
                            <input type="text" class="form-control" id="street" name='street' placeholder="Street" required value='<?php echo $street; ?>'>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="town">Town:</label>
                            <input type="text" class="form-control" id="town" name='town' placeholder="Town" required value='<?php echo $town; ?>'>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="county">County:</label>
                            <input type="text" class="form-control" id="county" name='county' placeholder="County" required value='<?php echo $county; ?>'>
                        </div>
                    </div>
                </div>
                <!-- Website -->
                <div class='form-group'>
                    <div class='col-md-12 mb-3' style='padding:0;'>
                        <label for="website">Website:</label>
                        <input type="url" class="form-control" id="website" name='website' placeholder="http://www.example.com" required value='<?php echo $website; ?>'>
                    </div>
                </div>
            </fieldset>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer" style='margin-bottom:7%;'>
            <button type="button" class="btn btn-outline-danger" onClick="window.location='index.php';">Cancel</button>
            <button type="submit" class="btn btn-primary" name='update' value='Update'>Update</button>
        </div>
                    
        </form>
        <!-- Form Ends -->
    </div>

    <!-- Footer -->
    <footer class="footer">
        <?php include_once 'resources/views/footer.html'; ?>
    </footer> 

    <!-- Bootstrap JS -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <!-- References: https://jsfiddle.net/jdme/3amv9y7y/13/ -->
    <!-- References: http://www.bootstraptoggle.com/ -->
    <!-- Show or Hide Fax Input References: https://codepen.io/davideghz/pen/JWmqMe -->
    <?php
        echo "<script type='text/javascript'>";
        echo "$(document).ready(function() {";
        echo "var contact=$('#fax-contact');";
        
        if(empty($fax)) {
            echo "$('#fax-switch').bootstrapToggle('off');";
            echo "contact.hide();";
        } else {
            echo "$('#fax-switch').bootstrapToggle('on');";
            echo "contact.show();";
            echo "$(\"[name='fax']\").attr(\"required\", true);";
        }   
                    
        echo "$('#fax-switch').change(function() {";
        echo "if($(this).prop('checked')) {";
        echo "contact.show();";
        echo "$(\"[name='fax']\").attr(\"required\", true);";
        echo "} else {";
        echo "contact.hide();";
        echo "}";
        echo "});";
        echo "});";
        echo "</script>";
    ?>

</body>
</html>