<!--==================Submitting info to database table===========================-->
        <?php include("../actions/zipDdbconnection.php"); ?>
        
        <?php include("../view/zipDxheader.php"); ?>
        
        <?php include("../view/zipDxfooter.php");?>
  

<!--=======================Pre-DSN connection/database/table setup=====================-->
    <!-- // $sql = "CREATE DATABASE zipDiagnostics";
    // $pdo->exec($sql);
    // try {
    //     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    //     // set the PDO error mode to exception
    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // $sql = "CREATE DATABASE zipDiagnostics";
    //     $sql = "CREATE TABLE SampleSubmissionForm (
    //       ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //       firstname VARCHAR(30) NOT NULL,
    //       lastname VARCHAR(30) NOT NULL,
    //       middlename VARCHAR(30) NOT NULL,
    //       suffix VARCHAR(10) NOT NULL,
    //       dateofbirth VARCHAR(10) NOT NULL,
    //       age INT(3) NOT NULL,
    //       patientresidentstate VARCHAR(50) NOT NULL,
    //       patientresidentcounty VARCHAR(50) NOT NULL,
    //       patientresidentcity VARCHAR(50) NOT NULL,
    //       patientresidentaddress VARCHAR(50) NOT NULL,
    //       submittingentity VARCHAR(50) NOT NULL
    //     )";
    //     $conn->exec($sql);
    //     echo "Table sample submission form created successfully! <br>";
    //     }
    // catch(PDOException $e){
    //       echo "Connection failed: " . $e->getMessage();
    //     }
    // $conn = null;

//==================Physician notes where initially set to integers.  Any text submitted=//
//==================would set 0.  I changed notes to varchar on phpadmin and used the====// -->

<!-- //==================following code to update a specific note at ID 16=================//
 $notes = "adding this to physician notes"; $uper = "UPDATE samplesubmissionform SET notes = ? WHERE id = ?";
$pdo->prepare($uper)->execute([$notes, 16])
  -->