<?php
include 'nav.php';
?>
<main>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Player Points</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputpid" type="name" placeholder="pid" name="pid" required />
                                <label for="inputmatchid">Playerid</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputmat" type="name" placeholder="mat" name="mat" required />
                                <label for="inputmatchid">Matches Played</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputpoints" type="name" placeholder="points" name="points" required />
                                <label for="inputmatchid">Points</label>
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
    // Retrieve form data
    $pid = $_POST['pid'];
    $mat = $_POST['mat'];
    $points = $_POST['points'];

    // Check if the record already exists in the database
    $checkQuery = "SELECT * FROM player_score WHERE pid = '$pid'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        // Update the existing record by adding new values to the current values
        $updateQuery = "UPDATE player_score SET mat = mat + '$mat', points = points + '$points' WHERE pid = '$pid'";
        if ($conn->query($updateQuery) === TRUE) {
            echo "<script>alert('Success!');</script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        // Insert a new record
        $insertQuery = "INSERT INTO player_score (pid, mat, points) VALUES ('$pid', '$mat', '$points')";
        if ($conn->query($insertQuery) === TRUE) {
            echo "<script>alert('Success!');</script>";
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }
}

$conn->close();
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