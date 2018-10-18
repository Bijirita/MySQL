<!--================Connecting with DSN===================-->

<?php include("zipDdbconnection.php"); ?>

<?php

    $id = $_GET['id'];
    $sql = 'DELETE FROM samplesubmissionform WHERE ID = :id';
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([':id' => $id])) {
        header('Location: ../pages/zipDxtable.php');
    }
?>