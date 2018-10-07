<?php

// Function to populate names into table
function populateName($rows) {
    foreach($rows as $row) {
        if(isset($row->surname)) {
            echo "<td>".$row->surname."</td>";
        } else {
            echo "<td>".$row->forename."</td>";
        }
    }
}

// Function to populate job title
function populateJobTitle($jobtitle) {
    if(isset($jobtitle)) {
        echo "<td>".$jobtitle."</td>";
    } else {
        echo "<td>-</td>";
    }
}

// Function to populate company name
function populateCompanyName($rows) {
   foreach($rows as $row) {
       if(isset($row->name)) {
            echo "<td>".$row->name."</td>";
       }
   }
}

// Function to populate personal email
function populateEmail($email) {
    if(isset($email)) {
        echo "<td>".$email."</td>";
    } else {
        echo "<td>-</td>";
    }
}

// Function to populate mobile
function populateMobile($rows) {
    foreach($rows as $row) {
        if(array_key_exists("m", $row)) {
            echo $row->m;
        }
    }
}

// Function to populate fax
function populateFax($rows) {
    foreach($rows as $row) {
        if(array_key_exists("f", $row)) {
            echo $row->f;
        }
    }
}

// Function to populate actions
function populateAction() {
    echo "<td class='float-right'>
    
    <button type='button' class='btn btn-success btn-sm'>
        <i class='far fa-edit'></i> Edit
    </button>

    <button type='button' class='btn btn-danger btn-sm'>
		<i class='far fa-trash-alt'></i> Delete
    </button>
    
    </td>";
}

?>