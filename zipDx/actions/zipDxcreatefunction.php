<!--================Connecting with DSN===================-->

<?php include("zipDdbconnection.php"); ?>

<?php

function createsample () {    
    global $pdo;
    $firstname = $_POST['First-Name'];
    $lastname = $_POST['Last-Name'];
    $middlename = $_POST['Middle-Name'];
    $suffix = $_POST['Suffix'];
    $dob = $_POST['Dob'];
    $sampleid = $_POST['Sample-ID'];
    $doc = $_POST['Doc'];
    $notes = $_POST['Notes'];
    $results = implode(", ", $_POST['sampletype']);
    echo "sampletypes check are, " . $results;
    echo "<br>";
    $testreqresults = implode(", ", $_POST['testreq']);
    echo "testreqs checked are, " . $testreqresults;
    echo "<br>";

//=======================Preparing statement from form textboxes=================//
    $sql = "INSERT INTO samplesubmissionform (
        firstname, 
        lastname, 
        middlename, 
        suffix,  
        dateofbirth, 
        sampleid, 
        dateofcollection, 
        notes
        )

        VALUES (?, ?, ? ,? ,? ,? ,? ,? )";

//===========Preparing statement from form checkboxes========================//
    $sampletype = "INSERT INTO samplehastype (submission_id, sampletype_ID)
       
        VALUES (:id, :typeid)";

    $testreq = "INSERT INTO testreq (submission_id, sampletest_ID)
       
        VALUES (:subid, :testid)";    
        
//=============================Transaction====================================//
    $pdo->beginTransaction();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$firstname, $lastname, $middlename, $suffix, $dob, $sampleid, $doc, $notes]);
        $last_id = $pdo->lastInsertId();
        echo "last_id is, " . $last_id;
        echo "<br>";
        $sampletypeprep = $pdo->prepare($sampletype);
        foreach($_POST['sampletype'] as $checked) {
            $typeresults = $checked;
            echo $typeresults;
            echo "<br>";
            $sampletypeprep->execute([$last_id, $typeresults]);
        }
        $testreqprep = $pdo->prepare($testreq);
        foreach($_POST['testreq'] as $checked) {
            $reqresults = $checked;
            echo $reqresults;
            echo "<br>";;
            $testreqprep->execute([$last_id, $reqresults]);
        }
        $pdo->commit();
    }
?>

<?php 

//Join the following mfker//
    // $stmt = $dbh->prepare('
    // INSERT INTO samplesubmissionform(checkbox) VALUES(sampletype);
    // ');
    // $stmt->bindValue('checkbox', $sampletype);
    // foreach($_POST["checkbox"] as $sampletype) $stmt->execute();
?>
