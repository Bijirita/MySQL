<!--================Connecting with DSN===================-->

<?php include("zipDdbconnection.php"); ?>

<!--================Create sample function===================-->

<?php
    function createsample (){
        global $pdo;
        $firstname = $_POST['First-Name'];
        $lastname = $_POST['Last-Name'];
        $middlename = $_POST['Middle-Name'];
        $suffix = $_POST['Suffix'];
        $dob = $_POST['Dob'];
        $sampleid = $_POST['Sample-ID'];
        $doc = $_POST['Doc'];
        $notes = $_POST['Notes'];
        $sql = "INSERT INTO samplesubmissionform (firstname, lastname, middlename, suffix, sampletype, dateofbirth, sampleid, dateofcollection, notes)
            VALUES (?, ?, ? , ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$firstname, $lastname, $middlename, $suffix, $dob, $sampleid, $doc, $notes]);
        header('Location: zipDxsubmitted.php');
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