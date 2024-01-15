<?php
include 'nav.php';
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
                                <input class="form-control" id="inputname" type="name" placeholder="Matchid" name="mid" required />
                                <label for="inputEmail">Matchid</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputlname" type="name" placeholder="tournamentid" name="tid" required />
                                <label for="inputfname">Tournamentid</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputfname" type="name" placeholder="level" name="level" required />
                                <label for="inputlname">Level</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputfname" type="name" placeholder="categoryid" name="catid" required />
                                <label for="inputlname">Categoryid</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputfname" type="name" placeholder="Matchdate" name="mdate" required />
                                <label for="inputlname">Matchdate</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputfname" type="name" placeholder="matchtime" name="mtime" required />
                                <label for="inputlname">Match time</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputfname" type="name" placeholder="playerid1" name="pid1" required />
                                <label for="inputlname">Playerid 1</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputfname" type="name" placeholder="playerid2" name="pid2" required />
                                <label for="inputlname">Playerid 2</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputfname" type="name" placeholder="score" name="score" required />
                                <label for="inputlname">Score</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputfname" type="name" placeholder="win" name="win" required />
                                <label for="inputlname">Win</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputfname" type="name" placeholder="timestamp" name="timestamp" required />
                                <label for="inputlname">Time Stamp</label>
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
        $score = $_POST['score'];
        $win = $_POST['win'];
        $timestamp = $_POST['timestamp'];

        $insertQuery = "INSERT INTO singles(mid,tid,level,catid,mdate,mtime,pid1,pid2,score,win,timestamp) VALUES ('$mid', '$tid', '$level', '$catid', '$mdate', '$mtime', '$pid1', '$pid2', '$score', '$win', '$timestamp')";

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