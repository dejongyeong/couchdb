<!-- Modal -->
<div class="modal fade" id="create-modal" aria-labelledby="create-modal-label" aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header" style='background-color: #ea4f8b; color: white;'>
                <h4 class="modal-title" id="create-modal-label">Create New Business Contact</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style='color: white;'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> 

            <!-- Form Start -->
            <form method='post' action='index.php' class="form-horizontal" id='business-form'>

                <!-- Modal Body -->
                <div class="modal-body" style='text-align:left;'>
                    <!-- Name -->
                    <div class='form-group' style='border-bottom: 1px solid #dcdcdc'>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="surname">Surname:</label>
                                <input type="text" class="form-control" id="surname" name='surname' placeholder="Surname" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="forename">Forename:</label>
                                <input type="text" class="form-control" id="forename" name='forename' placeholder="Forename" required>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="title">Job Title:</label>
                                <input type="text" class="form-control" id="title" name='title' placeholder="Job Title" required>
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class='form-group' style='border-bottom: 1px solid #dcdcdc'>
                        <div class='col-md-12 mb-3' style='padding:0;'>
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name='email' placeholder="Email Address" required>
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
                                    <input type='text' name='mobile' class='form-control' placeholder='123 4567890' required pattern='\d{3}\s\d{7}' aria-describedby="mobile">
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
                                <input type='text' name='fax' class='form-control' placeholder='123 4567890' id='fax' pattern='\d{3}\s\d{7}' aria-describedby="fax">
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
                                <input type="text" class="form-control" id="name" name='name' placeholder="Company Name" required>
                            </div>
                        </div>
                        <!-- Address -->
                        <div class='form-group' style='border-bottom: 1px solid #dcdcdc'>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="street">Street:</label>
                                    <input type="text" class="form-control" id="street" name='street' placeholder="Street" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="town">Town:</label>
                                    <input type="text" class="form-control" id="town" name='town' placeholder="Town" required>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="county">County:</label>
                                    <input type="text" class="form-control" id="county" name='county' placeholder="County" required>
                                </div>
                            </div>
                        </div>
                        <!-- Website -->
                        <div class='form-group'>
                            <div class='col-md-12 mb-3' style='padding:0;'>
                                <label for="website">Website:</label>
                                <input type="url" class="form-control" id="website" name='website' placeholder="http://www.example.com" required>
                                <div class="invalid-feedback">
                                    Please provide a valid company web url!
                                </div>
                            </div>
                        </div>
                    </fieldset>

                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name='create' value='Create'>Create</button>
                </div>
            
            </form>
            <!-- Form Ends -->

        </div>
    </div>
</div>