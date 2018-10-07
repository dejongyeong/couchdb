<?php

require 'connector.php';
require 'utilities.php';

// Query View to display all business details order by surname
$all_docs = $client->getView('all', 'by_surname');

if($all_docs->total_rows == 0) {
    require 'resources/views/error.html';
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
    populateAction();

    echo "</tr>";
}


echo "</tr></tbody>";

echo "</table>";

?>