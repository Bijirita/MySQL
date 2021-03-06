<!--================Connecting with DSN===================-->

<?php include("../actions/zipDdbconnection.php"); ?>

<!--===============Functions=============-->

<?php include("../actions/zipDxcreatefunction.php");?>


<!--==================Submitting info to database table===========================-->

<?php 
    if (isset($_POST['submit'])) {
        global $pdo;
        createsample ();
        
    }
?>
        <?php include("../view/zipDxhead.php");?>
   
        <?php include("../view/zipDxheader.php"); ?>

        <div class="card-container">
            <div class="card">
                <h4 class="card-header text-center py-4">
                    <strong>Sample Submission Form</strong>
                </h4>

                <br>

                <div class="card-body pt-0">
                    <form class="text-center" style="color: #000;" method= "post" action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <!--============================Patient Demographics============================-->
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
                            <input type="text" name="Suffix" class="form-control">
                        </div>

                        <br>
                    
                        <div class="md-form">
                            <label for="dob">Date of Birth</label>
                            <input type="date" name="Dob" class="form-control">
                        </div>
                        
                        <br><br>

                        <!--=============================Sample Type==================================-->

                        <div class="md-form">
                            <label for="sampleid">Sample ID</label>
                            <input type="text" name="Sample-ID" class="form-control">
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
                            <input type="date" name="Doc" class="form-control">
                        </div>

                        <br><br>

                    <!--========================================Test Requested===========================================-->

                        <div> <p>Test Requested</p>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" name="testreq[1]" type="checkbox" id="inlineCheckbox1" value="1">Phenotypic Identification
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" name="testreq[2]" type="checkbox" id="inlineCheckbox2" value="2"> WGS
                            </label>
                        </div>
                        <div class="form-check form-check-inline disabled">
                            <label class="form-check-label">
                                <input class="form-check-input" name="testreq[3]" type="checkbox" id="inlineCheckbox3" value="3"> qPCR
                            </label>
                        </div>
                        <div class="form-check form-check-inline disabled">
                            <label class="form-check-label">
                                <input class="form-check-input" name="testreq[4]" type="checkbox" id="inlineCheckbox4" value="4"> MALDI-TOF
                            </label>
                        </div>
                        <div class="form-check form-check-inline disabled">
                            <label class="form-check-label">
                                <input class="form-check-input" name="testreq[5]" type="checkbox" id="inlineCheckbox35" value="5"> Biofire
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
        <?php include("../view/zipDxfooter.php");?>
