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
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputclub" type="name" placeholder="club " name="club" required />
                                <label for="inputclub">Club</label>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <button class="login-form-button" type="submit" name="submit">Submit</button>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        // Sanitize input to prevent SQL injection
        $playerid = $_POST["id"];
        $firstname = $_POST["fname"];
        $lastname = $_POST["lname"];
        $club = $_POST["club"];

        // Insert data into the database
        $sql = "INSERT INTO players_d(playerid, firstname, lastname, club1) VALUES ('$playerid', '$firstname', '$lastname', '$club')";

        if ($conn->query($sql) === TRUE) {
           
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
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