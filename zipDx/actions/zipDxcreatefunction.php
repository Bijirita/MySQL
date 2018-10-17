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
        $sql = "INSERT INTO samplesubmissionform (firstname, lastname, middlename, suffix, dateofbirth, sampleid, dateofcollection, notes)
            VALUES (?, ?, ? , ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$firstname, $lastname, $middlename, $suffix, $dob, $sampleid, $doc, $notes]);
        header('Location: submitted.php');
    }
?>