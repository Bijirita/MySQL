<!--==================Connecting with DSN===========================-->
<?php include("../actions/zipDdbconnection.php"); ?>
        
        <?php include("../view/zipDxheader.php"); ?>
        
        <?php include("../view/zipDxfooter.php"); ?>



<div class="card-container">
            <div class="card">
                <h4 class="card-header text-center py-4">
                    <strong>Sample Submission Form</strong>
                </h4>

                <br>

                <div class="card-body pt-0">
                    <form class="text-center" style="color: #000;" method= "post" action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                        <?php 
                            $data = $pdo->query('SELECT * FROM samplesubmissionform');
                            $stmt = $data->fetchAll(PDO::FETCH_ASSOC);
                            $rowLength = $data->columnCount();

                            $label = array ("First Name", "Last Name", "Middle Name", "Suffix");

                            for ($i = 1; $i < $rowLength - 4; $i++) {
                                $meta = $data->getColumnMeta($i);
                                $name []= $meta['name']; 
                            }

                            for ($i = 0; $i < $rowLength -5; $i++) {
                                echo '<div class="md-form"> <br>
                                    <label for=' . $name[$i] . '>' . $label[$i] . '</label> <br>
                                    <input type="text" name=' . $name[$i] . ' class="form-control"> <br>
                                    </div> <br> ';
                            }
                        ?>
                    </form>