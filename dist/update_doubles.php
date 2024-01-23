<?php
include 'nav.php';
include 'connect.php';

// Update data
if (isset($_POST['update'])) {
    $mid = $_POST['mid'];
    $tid = $_POST['tid'];
   
    $teamid1 = $_POST['teamid1'];
    $teamid2 = $_POST['teamid2'];
    $score1 = $_POST['score1'];
    $score2 = $_POST['score2'];
    $win = $_POST['win'];
   

    $updateQuery = "UPDATE doubles SET tid = ?, teamid1 = ?, teamid2 = ?, score1 = ?, score2 = ?, win = ?,  WHERE mid = ?";

    $stmt = mysqli_prepare($conn, $updateQuery);
    
    if ($stmt === false) {
        // Check if preparing the statement failed
        echo "Error preparing update statement: " . mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt, "ssssssi", $tid, $teamid1, $teamid2, $score1, $score2, $win,  $mid);
    
        if (mysqli_stmt_execute($stmt)) {
            // Success response
           echo('successful');
        } else {
            // Error response
            echo json_encode(array('status' => 'error', 'message' => 'Error updating data: ' . mysqli_stmt_error($stmt)));
        }
    
        mysqli_stmt_close($stmt);
    }
    
}
?>


<!DOCTYPE html>
<html>
<head>
    
    <title>Update News Item</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        textarea {
            height: 100px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<?php
// Include your database connection code here
include "connect.php";

// Initialize variables to store existing data
$mid = "";
$tid = "";
$level ="";
$catid ="";
$mdate = "";
$mtime ="";
$teamid1 = "";
$teamid2 ="";
$score1 = "";
$score2 = "";
$win = "";
$timestamp ="";

if (isset($_POST['submit'])) {
    $mid = $_POST['mid'];
    $tid =  $_POST['tid'];
    $level = $_POST['level'];
    $catid =  $_POST['catid'];
    $mdate =  $_POST['mdate'];
    $mtime = $_POST['mtime'];
    $teamid1 =  $_POST['teamid1'];
    $teamid2 =  $_POST['teamid2'];
    $score1 = $_POST['score1'];
    $score2 =  $_POST['score2'];
    $win =  $_POST['win'];
   

    $updateQuery = "UPDATE doubles SET tid = ?, teamid1 = ?, teamid2 = ?, score1 = ?, score2 = ?, win = ?, WHERE mid = ?";

    
    $stmt = mysqli_prepare($conn, $updateQuery);
    
    if ($stmt === false) {
        // Check if preparing the statement failed
        echo "Error preparing update statement: " . mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt, "ssssssi", $tid, $teamid1, $teamid2, $score1, $score2, $win,  $mid);

        if (mysqli_stmt_execute($stmt)) {
            // Success response
            echo json_encode(array('Match data updated successfully.'));
        } else {
            // Error response
            echo json_encode(array('status' => 'error', 'message' => 'Error updating match data: ' . mysqli_stmt_error($stmt)));
        }

        mysqli_stmt_close($stmt);
    }
} else {
    // Retrieve existing data from the database
    if (isset($_GET['mid'])) {
        $id = $_GET['mid'];
        $selectQuery = "SELECT * FROM doubles WHERE mid = ?";
        $stmt = mysqli_prepare($conn, $selectQuery);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
            
            // Populate variables with existing data
            $mid = $row['mid'];
            $tid = $row['tid'];
          
            $teamid1 = $row['teamid1'];
            $teamid2 = $row['teamid2'];
            $score1 = $row['score1'];
            $score2 = $row['score2'];
            $win = $row['win'];
           
            mysqli_stmt_close($stmt);
        } else {
            echo "Error selecting data: " . mysqli_error($conn);
        }
    }
}
?>



<!-- Your HTML form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Match Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            height: 100px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            display: inline-block;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .form-floating {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <h1>Update Match Data</h1>
    <form method="post">
        <div class="form-floating mb-3">
            <input class="form-control" id="inputmatchidToUpdate" type="text" placeholder="Matchid to Update" name="mid" value="<?php echo $mid; ?>" />
            <label for="inputmatchidToUpdate">Match id </label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="inputtournamentid" type="text" placeholder="tournamentid" name="tid" value="<?php echo $tid; ?>" required />
            <label for="inputtournamentid">Tournamentid</label>
        </div>
       
        <div class="form-floating mb-3">
            <input class="form-control" id="inputpid1" type="name" placeholder="teamid1" name="teamid1" value="<?php echo $teamid1; ?>" required />
            <label for="inputpid1">Teamid 1</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="inputpid2" type="name" placeholder="teamid1" name="teamid2" value="<?php echo $teamid2; ?>" required />
            <label for="inputpid2">Teamid 2</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="inputscore1" type="name" placeholder="score1" name="score1" value="<?php echo $score1; ?>" />
            <label for="inputscore">Score1</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="inputscore2" type="name" placeholder="score2" name="score2" value="<?php echo $score2; ?>" />
            <label for="inputscore">Score2</label>
        </div>
       

                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputwin" type="name" placeholder="win" name="win" value="<?php echo $win; ?>" />
                                <label for="inputwin">Win</label>
                            </div>
                          

                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                    <button class="btn btn-primary" type="submit" name="update">Update Data</button>
                    
                </div>
            </div>
        </div>
    </div>
</main>
