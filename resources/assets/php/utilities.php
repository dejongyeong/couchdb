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
function populateAction($_id, $_rev) {
    echo "<td class='float-right'>
    
    <form method='post' action=update.php style='margin: 0; padding:0; display: inline-block;'>
        <button type='submit' name='upd' id='upd' value='$_id' class='btn btn-success btn-sm'>
            <i class='far fa-edit'></i> Edit
        </button>
    </form>

    <form method='post' action='index.php' style='margin: 0; padding: 0; display: inline-block;'>
        <button name='remove' id='remove' value='$_id' class='btn btn-danger btn-sm' type='submit' onclick=\"return confirm('Are you sure you want to delete this contact?')\">
            <i class='far fa-trash-alt'></i> Delete
        </button>
    </form>
    
    </td>";
}

// Create View that counts the total of businesses in that county
function createView() {

    require 'connector.php';

    /* Map Function */
    $map = "function(doc) { 
        if('name' in doc && 'company' in doc) { 
            doc.company.forEach(function(com) { 
                if(com.address) { 
                    com.address.forEach(function(add) { 
                        if(add.county) { 
                            emit(add.county, doc._id); 
                        }
                    });
                }
            });
        }
    }";

    $view = new stdClass();
    $view->_id = '_design/report';
    $view->language = 'javascript';
    $view->views = array('by_total' => array('map' => $map, "reduce" => "_count"));

    $client->storeDoc($view);
}

// Populate Report
function populateBusinessReport($row) {
    echo "<td>".$row->key."</td>";
    echo "<td>".$row->value."</td>";
}

// Delete Document with $_id
function delete($_id) {

    require 'connector.php';

    // Get Document
    try {
        $doc = $client->getDoc($_id);
    } catch (Exception $e) {
        echo "<p class='text-danger'>ERROR: Failed to retrieve document!!";
    }

    // Remove Document
    try {
        if($client->deleteDoc($doc)) {
            return true;
        }
    } catch (Exception $e) {
        echo "<p class='text-danger'>ERROR: Failed to delete document!!";
    }
}

// Create document
// References: https://php-on-couch.readthedocs.io/en/latest/api/couchclient/document.html#storedoc
function insert($surname,$forename,$title,$email,$mobile,$fax,$name,$street,$town,$county,$web) {
    
    require 'connector.php';

    if(isset($_POST['create'])) {
        $doc = new stdClass();
        $doc->name = array(array('surname' => $surname), array('forename' => $forename));
        $doc->email = $email;
        $doc->title = $title;
        $doc->company = array(array(
            'name' => $name,
            'address' => array(
                array('street' => $street),
                array('town' => $town),
                array('county' => $county)
            ),
            'website' => $web
        ));
        if(empty(trim($fax))) {
            $doc->contact = array(array('m' => $mobile));
        } else {
            $doc->contact = array(array('m' => $mobile), array('f' => $fax));
        }

        // Store Document
        try {
            if($client->storeDoc($doc)) {
                return true;
            }
        } catch(Exception $e) {
            echo "<p class='text-danger'>ERROR: Failed to create document!!";
            exit(1);
        }
    }
}

// Get Document
// References: https://php-on-couch.readthedocs.io/en/latest/api/couchclient/document.html#getdoc
function get($_id) {
    require 'connector.php';
    
    try {
        return $client->getDoc($_id);
    } catch (Exception $e) {
        echo "<p class='text-danger'>ERROR: Failed to retrieve document!!";
        exit(1);
    }
}


?>