<!--================Connecting with DSN===================-->

<?php include("zipDdbconnection.php"); ?>

<?php

    $id = $_GET['submission_id'];
    $sql = 'DELETE FROM samplesubmissionform WHERE submission_id = :id';
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([':id' => $id])) {
        header('Location: ../pages/zipDxtable.php');
    }
?>