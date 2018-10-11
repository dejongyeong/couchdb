<?php

require 'connector.php';
include 'utilities.php';

// Query View to display all business details order by surname
$all_docs = $client->getView('all', 'by_surname');

if($all_docs->total_rows == 0) {
    require 'resources/views/error.html';
}

// Remove Document
if(isset($_POST['remove'])) {
    $result = false;
    $result = delete($_POST['remove']);
    if($result) {
        include 'resources/views/notify.html';
        unset($_POST);
        echo '<!-- Reference to refresh content: https://stackoverflow.com/questions/10643626/refresh-page-after-form-submitting -->';
        echo "<meta http-equiv='refresh' content='0'>";
    }
}

// Create Document
if(isset($_POST['create'])) {
    // Variables
    $surname=trim($_POST['surname']);
    $forename=trim($_POST['forename']);
    $title=trim($_POST['title']);
    $email=trim($_POST['email']);
    $mobile=trim($_POST['mobile']);
    $fax='';
    if(isset($_POST['fax-switch'])) {
        $fax=trim($_POST['fax']);
    }
    $name=trim($_POST['name']);
    $street=trim($_POST['street']);
    $town=trim($_POST['town']);
    $county=trim($_POST['county']);
    $web=trim($_POST['website']);

    // Call to insert function and check if data insert successful
    $result = false;
    $result = insert($surname,$forename,$title,$email,$mobile,$fax,$name,$street,$town,$county,$web);
    if($result) {
        include 'resources/views/notify.html';
        unset($_POST);
        echo '<!-- Reference to refresh content: https://stackoverflow.com/questions/10643626/refresh-page-after-form-submitting -->';
        echo "<meta http-equiv='refresh' content='0'>";
    }
}

// Update Document
if(isset($_POST['update'])) {
    // Variables
    $_id=trim($_POST['id']);
    $surname=trim($_POST['surname']);
    $forename=trim($_POST['forename']);
    $title=trim($_POST['title']);
    $email=trim($_POST['email']);
    $mobile=trim($_POST['mobile']);
    $fax='';
    if(isset($_POST['fax-switch'])) {
        $fax=trim($_POST['fax']);
    }
    $name=trim($_POST['name']);
    $street=trim($_POST['street']);
    $town=trim($_POST['town']);
    $county=trim($_POST['county']);
    $web=trim($_POST['website']);

    $result = false;  
    $result = update($_id,$surname,$forename,$title,$email,$mobile,$fax,$name,$street,$town,$county,$web);
    if($result) {
        include 'resources/views/notify.html';
        unset($_POST);
        echo '<!-- Reference to refresh content: https://stackoverflow.com/questions/10643626/refresh-page-after-form-submitting -->';
        echo "<meta http-equiv='refresh' content='0'>";
    }        
}



echo "<table class='table table-hover table-advance table-striped'>";

echo "
    <thead>
        <th>Surname</th>
        <th>Forename</th>
        <th>Job Title</th>
        <th>Company</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Fax</th>
        <th class='text-right'>Actions</th>
    </thead> 
";

echo "<tbody>";

foreach ( $all_docs->rows as $row ) {
    echo "<tr>";

    // Identity   
    populateName($row->value->name);

    // Job Title
    populateJobTitle($row->value->title);

    // Company Name
    populateCompanyName($row->value->company);

    // Personal Email
    populateEmail($row->value->email);

    // Mobile
    echo "<td>";
    populateMobile($row->value->contact);
    echo "</td>";

    // Fax
    echo "<td>";
    populateFax($row->value->contact);
    echo "</td>";

    // Action
    populateAction($row->value->_id, $row->value->_rev);

    echo "</tr>";
}


echo "</tbody>";

echo "</table>";

?>