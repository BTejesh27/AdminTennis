<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_password'])) {
    // User is not logged in, redirect to login page
    header("Location: admin.php");
    exit;
}

// Continue with the rest of your index.php code

// You can also use $_SESSION['user_password'] to access the user's password if needed
$userPassword = $_SESSION['user_password'];
?>

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
                        <h3 class="text-center font-weight-light my-4">Singles</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="">
                        <div class="form-floating mb-3">
                                <input class="form-control" id="inputmatchid" type="name" placeholder="Matchid" name="mid" required />
                                <label for="inputmatchid">Matchid</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputtournamentid" type="name" placeholder="tournamentid" name="tid" required />
                                <label for="inputtournamentid">Tournamentid</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputlevel" type="name" placeholder="level" name="level" required />
                                <label for="inputlevel">Level</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputcategoryid" type="name" placeholder="categoryid" name="catid" required/>
                                <label for="inputcategoryid">Categoryid</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputmatchdate" type="name" placeholder="Matchdate" name="mdate" required />
                                <label for="inputmatchdate">Matchdate</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputmatchtime" type="name" placeholder="matchtime" name="mtime" required />
                                <label for="inputmatchtime">Match time</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputpid1" type="name" placeholder="playerid1" name="pid1" required />
                                <label for="inputpid1">Playerid 1</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputpid2" type="name" placeholder="playerid2" name="pid2" required />
                                <label for="inputpid2">Playerid 2</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputscore1" type="name" placeholder="score1" name="score1"  />
                                <label for="inputscore">Score1</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputscore2" type="name" placeholder="score2" name="score2"  />
                                <label for="inputscore">Score2</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputwin" type="name" placeholder="win" name="win"  />
                                <label for="inputwin">Win</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputtimestamp" type="name" placeholder="timestamp" name="timestamp"  />
                                <label for="inputtimestamp">Time Stamp</label>
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
        $mid = $_POST['mid'];
        $tid = $_POST['tid'];
        $level = $_POST['level'];
        $catid = $_POST['catid'];
        $mdate = $_POST['mdate'];
        $mtime = $_POST['mtime'];
        $pid1 = $_POST['pid1'];
        $pid2 = $_POST['pid2'];
        $score1 = $_POST['score1'];
        $score2 = $_POST['score2'];
        $win = $_POST['win'];
        $timestamp = $_POST['timestamp'];

        $insertQuery = "INSERT INTO singles(mid,tid,level,catid,mdate,mtime,pid1,pid2,score1,score2,win,timestamp) VALUES ('$mid', '$tid', '$level', '$catid', '$mdate', '$mtime', '$pid1', '$pid2', '$score1', '$score2','$win', '$timestamp')";

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