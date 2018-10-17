<!--================Connecting with DSN===================-->

<?php include("../actions/zipDdbconnection.php"); ?>

<!--==================Document===========================-->

<?php include("../view/zipDxhead.php");?>

<!--==================Header=================-->
<?php include("../view/zipDxheader.php");?>      

  <h1> Success </h1>
    <br><br>

    <p> Have ALL the data <p>

    <br><br>

    <?php
        $stmt = $pdo->query('SELECT * FROM samplesubmissionform');
        foreach ($stmt as $row) {
            echo $row['firstname'] . "<br>";
            foreach ($row as $col) {
                echo $col. "<br>";
            }
        }
    ?>
 
 <!--====================Footer=============================-->
    <?php include("../view/zipDxfooter.php"); ?>