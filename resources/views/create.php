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
            <form method='post' action='index.php' class="form-horizontal">

                <!-- Modal Body -->
                <div class="modal-body" style='text-align:left;'>
                    <!-- Name -->
                    <div class='form-group' style='border-bottom: 1px solid #dcdcdc'>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="surname">Surname:</label>
                                <input type="text" class="form-control is-invalid" id="surname" placeholder="Surname" required >
                                <div class="invalid-feedback">
                                    Please provide a valid surname!
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="forename">Forename:</label>
                                <input type="text" class="form-control is-invalid" id="forename" placeholder="Forename" required >
                                <div class="invalid-feedback">
                                    Please provide a valid forename!
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="title">Job Title:</label>
                                <input type="text" class="form-control is-invalid" id="title" placeholder="title" required >
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
                            <input type="text" class="form-control is-invalid" id="email" placeholder="Email Address" required >
                            <div class="invalid-feedback">
                                Please provide a valid email!
                            </div>
                        </div>
                    </div>

                    <!-- Contact -->


                    <!-- Company Profile -->

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