<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_password'])) {
    // User is not logged in, redirect to login page
    header("Location: admin.php");
    exit;
}

include 'nav.php';
include 'connect.php';

// Function to sanitize input
function sanitizeInput($conn, $input)
{
    return mysqli_real_escape_string($conn, $input);
}

// Function to handle update logic
function updateMatchData($conn, $pid, $tid, $mid, $category, $points)
{
    $updateQuery = "UPDATE points SET tid = ?, mid = ?, category = ?, points=? WHERE pid = ?";
    $stmt = mysqli_prepare($conn, $updateQuery);

    if ($stmt === false) {
        // Check if preparing the statement failed
        echo "<script>alert('Error preparing update statement: " . mysqli_error($conn) . "');</script>";
    }

    mysqli_stmt_bind_param($stmt, "ssssi", $tid, $mid, $category, $points, $pid,);

    if (mysqli_stmt_execute($stmt)) {
        // Success response
        echo "<script>alert('Success!');</script>";
    } else {
        // Error response
        echo "<script>alert('Error updating match data: " . mysqli_stmt_error($stmt) . "');</script>";
    }

    mysqli_stmt_close($stmt);
}

// Process form submission
// Process form submission
if (isset($_POST['update'])) {
    $pid = sanitizeInput($conn, $_POST['pid']);
    $tid = sanitizeInput($conn, $_POST['tid']);
    $mid = sanitizeInput($conn, $_POST['mid']);
    $category = sanitizeInput($conn, $_POST['category']);
    $points = sanitizeInput($conn, $_POST['points']);

    updateMatchData($conn, $pid, $tid, $mid, $category, $points);
}


// Retrieve existing data from the database
if (isset($_GET['pid'])) {
    $pid = sanitizeInput($conn, $_GET['pid']);
    $selectQuery = "SELECT * FROM points WHERE pid = ?";
    $stmt = mysqli_prepare($conn, $selectQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $pid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        // Populate variables with existing data
        $pid = $row['pid'];
        $tid = $row['tid'];
        $mid = $row['mid'];
        $category = $row['category'];
        $points = $row['points'];


        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Error selecting data: " . mysqli_error($conn) . "');</script>";
    }
}
?>



<!DOCTYPE html>
<html>

<head>

    <title>Update player points Data</title>
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
$pid = "";
$tid = "";
$mid = "";
$category = "";
$points = "";


if (isset($_POST['submit'])) {
    $pid = $_POST['pid'];
    $tid =  $_POST['tid'];
    $mid =  $_POST['mid'];
    $category =  $_POST['category'];
    $points =  $_POST['points'];



    $updateQuery = "UPDATE points SET
        tid = ?,
        mid = ?,
        category = ?,
        points = ?,
        WHERE pid = ?";

    $stmt = mysqli_prepare($conn, $updateQuery);

    if ($stmt === false) {
        // Check if preparing the statement failed
        echo "Error preparing update statement: " . mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt, "ssssi", $tid, $mid, $category, $points, $pid,);

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
    if (isset($_GET['pid'])) {
        $pid = sanitizeInput($conn, $_GET['pid']);
        $selectQuery = "SELECT * FROM points WHERE pid = ?";
        $stmt = mysqli_prepare($conn, $selectQuery);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $pid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);

            // Populate variables with existing data
            $pid = $row['pid'];
            $tid = $row['tid'];
            $mid = $row['mid'];
            $category = $row['category'];
            $points = $row['points'];



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
    <title>Update Player points Data</title>
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
    <form method="post" action="">
        <div class="form-floating mb-3">
            <input class="form-control" id="inputplayerid" type="name" placeholder="pid" name="pid" value="<?php echo $pid; ?>"  required />
            <label for="inputplayerid">Player id</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="inputtournamentid" type="name" placeholder="tournamentid" name="tid" value="<?php echo $tid; ?>" required />
            <label for="inputtournamentid">Tournamentid</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="inputpid" type="name" placeholder="mid" name="mid" value="<?php echo $mid; ?>" required />
            <label for="inputmatchid">Match Id</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="inputcategoryid" type="name" placeholder="catid" name="category" value="<?php echo $category; ?>" required />
            <label for="inputcategoryid">Category Id</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="inputpoints" type="name" placeholder="points" name="points"value="<?php echo $points; ?>"  required />
            <label for="inputmatchid">Points</label>
        </div>

        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
            <button class="btn btn-primary" type="submit" name="update">Update Data</button>

        </div>
        </div>
        </div>

        </main>