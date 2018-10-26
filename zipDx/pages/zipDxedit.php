<!--================Connecting with DSN===================-->

<?php include("../actions/zipDdbconnection.php"); ?>

<?php
$id = $_GET['submission_id'];
$sql = 'SELECT * FROM samplesubmissionform WHERE submission_id = :id';
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
$sample = $stmt->fetch(PDO::FETCH_OBJ);
if (isset($_POST['submit']))
//isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['middlename']) && isset($_POST['suffix']) &&
//isset($_POST['dateofbirth']) && isset($_POST['sampleid']) && isset($_POST['dateofcollection']) && isset($_POST['notes'])) 
{
    $firstname = $_POST['First-Name'];
    $lastname = $_POST['Last-Name'];
    $middlename = $_POST['Middle-Name'];
    $suffix = $_POST['Suffix'];
    $dob = $_POST['Dob'];
    $sampleid = $_POST['Sample-ID'];
    $doc = $_POST['Doc'];
    $notes = $_POST['Notes'];
    $id = $_POST['id'];
    $sql = 'UPDATE samplesubmissionform SET firstname = :firstname, lastname = :lastname,
    middlename = :middlename, suffix = :suffix, dateofbirth = :dob, sampleid = :sampleid,
    dateofcollection = :doc, notes = :notes WHERE submission_id = :id'; 
$stmt = $pdo->prepare($sql);
    //if (isset($_POST['submit'])) {
    $stmt->execute([
        'firstname' => $firstname, 
        'lastname' => $lastname, 
        'middlename' => $middlename, 
        'suffix' => $suffix, 
        'dob' => $dob, 
        'sampleid' => $sampleid,
        'doc' => $doc, 
        'notes' => $notes,
        'id' => $id
    ]);
    header('Location: zipDxtable.php');
}
?>

<?php include("../view/zipDxhead.php");?>
   
<?php include("../view/zipDxheader.php"); ?>

   <div class="card-container">
       <div class="card">
           <h4 class="card-header text-center py-4">
               <strong>Update</strong>
           </h4>

           <br>

           <div class="card-body pt-0">
               <form class="text-center" style="color: #000;" method= "post" action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
               <!--============================Patient Demographics============================-->
                   <div class="md-form">
                       <label for="firstName">First Name</label>
                       <input value = "<?php echo $sample->firstname?>" type="text" name="First-Name" class="form-control">
                   </div>

                   <br>

                   <div class="md-form">
                       <label for="lastName">Last Name</label>
                       <input value = "<?php echo $sample->lastname?>" type="text" name="Last-Name" class="form-control">
                   </div>

                   <br>

                   <div class="md-form">
                       <label for="lastName">Middle Name</label>
                       <input value = "<?php echo $sample->middlename?>" type="text" name="Middle-Name" class="form-control">
                   </div>

                   <br>

                   <div class="md-form">
                       <label for="suffix">Suffix</label>
                       <input value = "<?php echo $sample->suffix?>" type="text" name="Suffix" class="form-control">
                   </div>

                   <br>
               
                   <div class="md-form">
                       <label for="dob">Date of Birth</label>
                       <input value = "<?php echo $sample->dateofcollection?>" type="date" name="Dob" class="form-control">
                   </div>
                   
                   <br><br>

                   <!--=============================Sample Type==================================-->

                   <div class="md-form">
                       <label for="sampleid">Sample ID</label>
                       <input value = "<?php echo $sample->sampleid?>" type="text" name="Sample-ID" class="form-control">
                   </div>

                   <br><br>

                   <div> <p>Sample Type</p>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" name="sampletype[1]" type="checkbox" id="inlineCheckbox1" value="1"> Feces
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" name="sampletype[2]" type="checkbox" id="inlineCheckbox2" value="2"> Urine
                            </label>
                        </div>
                        <div class="form-check form-check-inline disabled">
                            <label class="form-check-label">
                                <input class="form-check-input" name="sampletype[3]" type="checkbox" id="inlineCheckbox3" value="3"> Blood
                            </label>
                        </div>
                        <div class="form-check form-check-inline disabled">
                            <label class="form-check-label">
                                <input class="form-check-input" name="sampletype[4]" type="checkbox" id="inlineCheckbox4" value="4"> Sputum
                            </label>
                        </div>
                        <div class="form-check form-check-inline disabled">
                            <label class="form-check-label">
                                <input class="form-check-input" name="sampletype[5]" type="checkbox" id="inlineCheckbox5" value="5"> CSF
                            </label>
                        </div>
                   <br><br><br>
               
                   <div class="md-form">
                       <label for="doc">Date of Collection</label>
                       <input value = "<?php echo $sample->dateofcollection?>" type="date" name="Doc" class="form-control">
                   </div>

                   <br><br>

               <!--========================================Test Requested===========================================-->

                   <div> <p>Test Requested</p>
                   <div class="form-check form-check-inline">
                       <label class="form-check-label">
                           <input class="form-check-input" name="testreq" type="checkbox" id="inlineCheckbox1" value="Phen_ID">Phenotypic Identification
                       </label>
                   </div>
                   <div class="form-check form-check-inline">
                       <label class="form-check-label">
                           <input class="form-check-input" name="testreq" type="checkbox" id="inlineCheckbox2" value="WGS"> WGS
                       </label>
                   </div>
                   <div class="form-check form-check-inline disabled">
                       <label class="form-check-label">
                           <input class="form-check-input" name="testreq" type="checkbox" id="inlineCheckbox3" value="qPCR"> qPCR
                       </label>
                   </div>
                   <div class="form-check form-check-inline disabled">
                       <label class="form-check-label">
                           <input class="form-check-input" name="testreq" type="checkbox" id="inlineCheckbox4" value="Maldi"> MALDI-TOF
                       </label>
                   </div>
                   <div class="form-check form-check-inline disabled">
                       <label class="form-check-label">
                           <input class="form-check-input" name="testreq" type="checkbox" id="inlineCheckbox35" value="Biofire"> Biofire
                       </label>
                   </div>

                   <br><br><br>

                   <div class="md-form">
                       <label for="formMessage">Physician Notes</label>
                       <textarea  name="Notes" id="formMessage" class="form-control md-textarea" rows="3">
                       <?php if ('notes' === false) {
                           echo " ";
                        }else {
                           echo $sample->notes;
                        }?></textarea>
                   </div>

                   <br>

                   
                   <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect" name="submit" type="submit">Submit</button>
                   <input value = '<?php echo $id; ?>' name='id' style="display: none;"/> 
               </form>
           </div>
       </div>
   </div>
   <?php include("../view/zipDxfooter.php");?>