<?php

require 'connector.php';
include 'utilities.php';

// Query View to display all business details order by surname
$all_docs = $client->getView('all', 'by_surname');

if($all_docs->total_rows == 0) {
    require 'resources/views/error.html';
}

if(isset($_POST['remove'])) {
    $result = false;
    $result = delete($_POST['remove']);
    if($result) {
        include 'resources/views/notify.html';
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