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
                                <input type="text" class="form-control" id="surname" placeholder="Surname" required >
                                <div class="invalid-feedback">
                                    Please provide a valid surname!
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="forename">Forename:</label>
                                <input type="text" class="form-control" id="forename" placeholder="Forename" required >
                                <div class="invalid-feedback">
                                    Please provide a valid forename!
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="title">Job Title:</label>
                                <input type="text" class="form-control" id="title" placeholder="title" required >
                                <div class="invalid-feedback">
                                    Please provide a valid job title!
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class='form-group' style='border-bottom: 1px solid #dcdcdc'>
                        <div class='col-md-12 mb-3' style='padding:0;'>
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" id="email" placeholder="Email Address" required >
                            <div class="invalid-feedback">
                                Please provide a valid email!
                            </div>
                        </div>
                    </div>

                    <!-- Contact -->
                    <div class='form-group' style='border-bottom: 1px solid #dcdcdc'>
                        <div class='col-md-12 mb-3' style='padding:0;'>
                            <label for="contact">Contact:</label>
                            <div class='form-row'>
                                <div class='col-md-10'>
                                    <input type='text' name='mobile' class='form-control' placeholder='Mobile'>
                                    <div class="invalid-feedback">
                                        Please provide a valid mobile contact!
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <span class='switch'>
                                        <input type='checkbox' id='fax-switch' data-toggle='toggle' data-offstyle='success' data-onstyle='danger' data-on='Remove Fax' data-off='Add Fax' data-width='100%'>
                                    </span>
                                </div>
                            </div>
                            <div class='mt-3 col-md-10' id='fax-contact' style='padding:0;'>
                                <input type='text' name='fax' class='form-control' placeholder='Fax'>
                                <div class="invalid-feedback">
                                    Please provide a valid fax contact!
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Company Profile -->
                    <fieldset class='form-group'>
                        <legend class='col-form-legend' style='font-size:inherit; font-style:italic;'>Company Profile</legend>
                        <!-- Name -->
                        <div class='form-group' style='border-bottom: 1px solid #dcdcdc'>
                            <div class='col-md-12 mb-3' style='padding:0;'>
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" placeholder="Company Name" required >
                                <div class="invalid-feedback">
                                    Please provide a valid company name!
                                </div>
                            </div>
                        </div>
                        <!-- Address -->
                        <div class='form-group' style='border-bottom: 1px solid #dcdcdc'>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="street">Street:</label>
                                    <input type="text" class="form-control" id="street" placeholder="Street" required >
                                    <div class="invalid-feedback">
                                        Please provide a valid street name!
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="town">Town:</label>
                                    <input type="text" class="form-control" id="town" placeholder="Town" required >
                                    <div class="invalid-feedback">
                                        Please provide a valid town name!
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="county">County:</label>
                                    <input type="text" class="form-control" id="county" placeholder="County" required >
                                    <div class="invalid-feedback">
                                        Please provide a valid county name!
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Website -->
                        <div class='form-group'>
                            <div class='col-md-12 mb-3' style='padding:0;'>
                                <label for="website">Website:</label>
                                <input type="url" class="form-control" id="website" placeholder="Website" required >
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
                    <button type="button" class="btn btn-primary">Create</button>
                </div>
            
            </form>
            <!-- Form Ends -->

        </div>
    </div>
</div>