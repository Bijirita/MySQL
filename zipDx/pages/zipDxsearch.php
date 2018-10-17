<!--================Connecting with DSN===================-->

<?php include("../actions/zipDdbconnection.php"); ?>

<!--==================Document===========================-->
<?php include("../view/zipDxhead.php"); ?>

<?php include("../view/zipDxheader.php"); ?>

<!--===========================================Search Form============================================-->

    <div class="card-container">
        <div class="card">
            <h4 class="card-header text-center py-4">
                <strong>Search for a sample</strong>
            </h4>

            <br>

            <div class="card-body pt-0">
                <form class="text-center" style="color: #000;" method= "post" action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                
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
                        <label for="dob">Date of Birth</label>
                        <input type="text" name="Dob" class="form-control">
                    </div>
                    
                    <br><br>

                    <div class="md-form">
                        <label for="sampleid">Sample ID</label>
                        <input type="text" name="Sample-ID" class="form-control">
                    </div>

                    <br>
                    
                    <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect" name="submit" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>  
<?php include("../view/zipDxfooter.php"); ?>
