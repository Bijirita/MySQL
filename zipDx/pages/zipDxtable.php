<!--================Connecting with DSN===================-->

<?php include("../actions/zipDdbconnection.php"); ?>

<!--===============Functions=============-->

<?php include("../actions/zipDxcreatefunction.php");?>

<!--==================Submitting info to database table===========================-->
<?php include("../view/zipDxheader.php");?>

<?php

    $data = $pdo->query('SELECT * FROM samplesubmissionform');
    $stmt = $data->fetchAll(PDO::FETCH_ASSOC);
    $rowLength = $data->columnCount();

    echo "<table class='db-table'>";

    for ($i = 0; $i < $rowLength; $i++) {
        $newCol = $data->getColumnMeta($i);
       
        $columns = $newCol['name'];
        echo "<th>" . $columns . "</th>";
    }

    foreach($stmt as $row) {
        echo "<tr>";
        $keys = array_keys($row);
        for ($i = 0; $i < $rowLength; $i++) {
            echo "<td>" . $row[$keys[$i]] . "</td>";
        }
        $id = $row[$keys[0]];
        echo '<td> <a href="../actions/zipDxdelete.php' . "?submission_id=$id\"" . 'class="del_btn">' .  'Delete' . '</a></td>';
        echo '<td> <a href="zipDxedit.php' . "?submission_id=$id\"" . 'class="edit_btn">' .  'Edit' . '</a></td>';
    }

    echo "</table>";
?>

<?php include("../view/zipDxfooter.php"); ?>

