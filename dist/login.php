<?php
include 'nav.php';
?>
<?php
include 'connect.php';
?>


<main>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">New Member</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputname" type="name" placeholder="name@example.com" name="id" required />
                                <label for="inputEmail">Playerid</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputlname" type="name" placeholder="First Name" name="fname" required />
                                <label for="inputfname">First Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputfname" type="name" placeholder="last Name" name="lname" required />
                                <label for="inputlname">Last Name</label>
                            </div>
                            <div >
                                

                                <label style="margin-right: 150px";> Clubs:</label><br>
                                <input type="checkbox" id="club1" name="club1" value="Club1">
                                <label style='margin: left 100px; '; for="club1">Club1</label><br>

                                <input type="checkbox" id="club2" name="club2" value="Club2">
                                <label style='margin: left 500px; ';  for="club2">Club2</label><br>

                                <input type="checkbox" id="club3" name="club3" value="Club3">
                                <label style='margin: left 500px; '; for="club3">Club3</label><br>


                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <button class="login-form-button" type="submit" name="submit">Submit</button>


                            </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
    <?php
    if (isset($_POST['submit'])) {
        // Sanitize input to prevent SQL injection
        $playerid = $_POST["id"];
        $firstname = $_POST["fname"];
        $lastname = $_POST["lname"];
        $club1 = $_POST["club1"];
        $club2 = $_POST["club2"];
        $club3 = $_POST["club3"];
       


        // Check if the player already exists in the specified club
        $checkQuery = "SELECT * FROM players_d WHERE playerid = '$playerid'";
        $result = $conn->query($checkQuery);

        if ($result->num_rows > 0) {
            // Player already exists in the club, show an alert message
            echo "<script>alert('Player already exists in this club!');</script>";
        } else {
            // Player does not exist in the club, proceed with the insertion
            $insertQuery = "INSERT INTO players_d(playerid, firstname, lastname, club1,club2,club3) VALUES ('$playerid', '$firstname', '$lastname', '$club1','$club2','$club3')";

            if ($conn->query($insertQuery) === TRUE) {
                echo "<script>alert('Success!');</script>";
            } else {
                echo "Error: " . $insertQuery . "<br>" . $conn->error;
            }
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