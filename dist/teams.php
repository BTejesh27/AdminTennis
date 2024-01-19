<?php
include 'nav.php';
?>
<main>

<div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Doubles Teams</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputmatchid" type="name" placeholder="Teamid" name="teamid" required />
                                <label for="inputmatchid">Teamid</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputmatchid" type="name" placeholder="Teamid" name="pid1" required />
                                <label for="inputmatchid">Playerid 1</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputmatchid" type="name" placeholder="Teamid" name="pid2" required />
                                <label for="inputmatchid">Playerid 2</label>
                            </div>

                           
                            <div>


                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <button class="btn btn-primary" type="submit" name="submit">Submit</button>


                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include 'connect.php';

    if (isset($_POST['submit'])) {
        // Sanitize input to prevent SQL injection
        $teamid = $_POST['teamid'];
        $pid1 = $_POST['pid1'];
        $pid2 = $_POST['pid2'];

        $insertQuery = "INSERT INTO teams(teamid,pid1,pid2) VALUES ('$teamid', '$pid1', '$pid2')";

        if ($conn->query($insertQuery) === TRUE) {
            echo "<script>alert('Success!');</script>";
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    
       
    }
    ?>
</main>
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2023</div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>