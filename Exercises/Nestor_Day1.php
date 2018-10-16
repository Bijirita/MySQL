<!------------------------Connecting with DSN----------------->
<?php 
    $host = "localhost";
    $username = "root";
    $password = "root";
    $db = "zipdiagnostics";
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    try {
        $pdo = new PDO($dsn, $username, $password, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
    // $sql = "CREATE DATABASE zipDiagnostics";
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
?>
<!---------------Submitting info to database table---------------->
<?php 
    if (isset($_POST['submit'])) {
    $firstname = $_POST['First-Name'];
    $lastname = $_POST['Last-Name'];
    $sql = "INSERT INTO samplesubmissionform (firstname, lastname)
        VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$firstname, $lastname]);
    header('Location: submitted.php');
}
?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    </head>
    <body>
        <div class="card-container">
            <div class="card">
                <h4 class="card-header text-center py-4">
                    <strong>Sample Submission Form</strong>
                </h4>

                <br>

                <div class="card-body pt-0">
                    <form class="text-center" style="color: #000;" method= "post" action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <!-----------------------------------------Patient Demographics---------------------------------------------------->
                        <div class="md-form">
                            <label for="firstName">First Name</label>
                            <input type="text" name="First-Name" class="form-control">
                        </div>

                        <br>

                        <div class="md-form">
                            <label for="lastName">Last Name</label>
                            <input type="text" name="Last-Name" class="form-control">
                        </div>

                        <br>

                        <div class="md-form">
                            <label for="lastName">Middle Name</label>
                            <input type="text" name="Middle-Name" class="form-control">
                        </div>

                        <br>

                        <div class="md-form">
                            <label for="suffix">Suffix</label>
                            <input type="email" name="Email" class="form-control">
                        </div>

                        <br>
                    
                        <div class="md-form">
                            <label for="dob">Date of Birth</label>
                            <input type="text" name="Dob" class="form-control">
                        </div>
                        
                        <br><br>

                        <!-----------------------------------------Sample Type------------------------------------------------------>

                        <div class="md-form">
                            <label for="sampleid">Sample ID</label>
                            <input type="text" name="sampleid" class="form-control">
                        </div>

                        <br><br>

                        <div> <p>Sample Type</p>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="feces"> Feces
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="urine"> Urine
                            </label>
                        </div>
                        <div class="form-check form-check-inline disabled">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="blood"> Blood
                            </label>
                        </div>
                        <div class="form-check form-check-inline disabled">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Sputum"> Sputum
                            </label>
                        </div>
                        <div class="form-check form-check-inline disabled">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="CSF"> CSF
                            </label>
                        </div>

                        <br><br><br>
                    
                        <div class="md-form">
                            <label for="dob">Date of Collection</label>
                            <input type="text" name="Doc" class="form-control">
                        </div>

                        <br><br>

                    <!-----------------------------------------Test Requested------------------------------------------------------>

                        <div> <p>Test Requested</p>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Phen_ID">Phenotypic Identification
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="WGS"> WGS
                            </label>
                        </div>
                        <div class="form-check form-check-inline disabled">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="qPCR"> qPCR
                            </label>
                        </div>
                        <div class="form-check form-check-inline disabled">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Maldi"> MALDI-TOF
                            </label>
                        </div>
                        <div class="form-check form-check-inline disabled">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Biofire"> Biofire
                            </label>
                        </div>

                        <br><br><br>

                        <div class="md-form">
                            <label for="formMessage">Physician Notes</label>
                            <textarea type="text" name="Notes" id="formMessage" class="form-control md-textarea" rows="3"></textarea>
                        </div>

                        <br>

                        <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect" name="submit" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <?php 
           
        ?>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    </body>
</html>