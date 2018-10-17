<!--================Connecting with DSN===================-->

<?php include("../actions/zipDdbconnection.php"); ?>

<!--===============Functions=============-->

<?php include("../actions/zipDxcreatefunction.php");?>

<!--==================Submitting info to database table===========================-->
<?php include("../view/zipDxheader.php");?>

<?php

    $data = $pdo->query('SELECT * FROM samplesubmissionform');
    $stmt = $data->fetchAll(PDO::FETCH_ASSOC);

    echo "<table class='db-table'>";

    for ($i = 0; $i < $data->columnCount(); $i++) {
        $newCol = $data->getColumnMeta($i);
        $columns = $newCol['name'];
        echo "<th>" . $columns . "</th>";
    }

    foreach($stmt as $row) {
        echo "<tr>";
        foreach ($row as $col) {
            echo "<td>" . $col . "</td>";
        }
    }

    echo "</table>";

    /* show tables */
    // $result = pdo_query('SHOW TABLES',$pdo) or die('cannot show tables');
    // while($tableName = pdo_fetch_row($result)) {

    // 	$table = $tableName[0];
        
    // 	echo '<h3>',$table,'</h3>';
    // 	$result2 = pdo_query('SHOW COLUMNS FROM '.$table) or die('cannot show columns from '.$table);
    // 	if(pdo_num_rows($result2)) {
    // 		echo '<table cellpadding="0" cellspacing="0" class="db-table">';
    // 		echo '<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default<th>Extra</th></tr>';
    // 		while($row2 = pdo_fetch_row($result2)) {
    // 			echo '<tr>';
    // 			foreach($row2 as $key=>$value) {
    // 				echo '<td>',$value,'</td>';
    // 			}
    // 			echo '</tr>';
    // 		}
    // 		echo '</table><br />';
    // 	}
    // }

?>

<?php include("../view/zipDxfooter.php"); ?>

