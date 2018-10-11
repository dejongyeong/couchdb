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

    <!-- Check Database Exist -->
    <?php include_once 'resources/assets/php/database.php'; ?>

</head>
<body>
    
    <!-- Header -->
    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <a class="navbar-brand" href="#"><b>CouchDB</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <!-- Home : Business List -->
                    <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="business.php">Business Report</a>
                </div>
            </div>
        </nav>
    </div>

    <!-- Create Button -->
    <div class="create">
        <!-- Button to trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-modal">
        <i class="fas fa-address-book"></i>&nbsp; Insert Business Contact
        </button>
        <?php include 'resources/views/create.php' ?>
    </div>

    <!-- Body -->
    <div class="overview">
        <div class="col-sm-12 table-responsive">
            <?php require_once 'resources/assets/php/overview.php'; ?>
        </div>
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
    <!-- Show or Hide Fax Input -->
    <?php
        echo "<script type='text/javascript'>
            $(document).ready(function() {
                    var contact=$('#fax-contact');

                    contact.hide();

                    $('#fax-switch').change(function() {
                        if($(this).prop('checked')) {
                            contact.show();
                            $('#fax').attr('required', true);
                        } else {
                            contact.hide();
                        }
                    });

                    var update=$('#fax-update-contact');

                    update.hide();

                    $('#fax-update-switch').change(function() {
                        if($(this).prop('checked')) {
                            update.show();
                            $('#fax-update').attr('required', true);
                        } else {
                            update.hide();
                        }
                    });
            });
            </script>
        ";
    ?>

</body>
</html>