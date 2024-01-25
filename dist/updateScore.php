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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Tennis Live Score</title>
  <style>
    /* Your existing styles go here */

    form {
      margin-top: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    form label {
      margin-bottom: 10px;
    }

    form input {
      width: 50px;
      text-align: center;
      padding: 10px;
      font-size: 16px;
      margin-bottom: 10px;
    }

    form button {
      padding: 15px 30px;
      font-size: 16px;
      cursor: pointer;
      background-color: #2c3e50;
      color: #fff;
      border: none;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    form button:hover {
      background-color: #34495e;
    }
  </style>
</head>
<body>

  <!-- Update form -->
  <form id="updateForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <label for="pnameInput">Player 1 Name:</label>
    <input type="text" id="pname" name="pname" min="0">

    <label for="p2nameInput">Player 2 Name:</label>
    <input type="text" id="pname2" name="pname2" min="0">
    
    <label for="player1Input">Player 1 Score:</label>
    <input type="number" id="player1Input" name="player1" min="0">

    <label for="player2Input">Player 2 Score:</label>
    <input type="number" id="player2Input" name="player2" min="0">

    <button type="submit">Update Scores</button>

  </form>

  <script>
    const eventSource = new EventSource('sse.php');

    eventSource.onmessage = function (event) {
      // Reload the page when a reload command is received
      if (event.data === '{}') {
        location.reload();
      }
    };

    eventSource.onerror = function (error) {
      console.error('EventSource failed:', error);
      eventSource.close();
    };
  </script>

<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $player1 = $_POST["player1"];
    $pname = $_POST["pname"];
    $player2 = $_POST["player2"];
    $pname2 = $_POST["pname2"];

    if (!empty($player1) && !empty($player2) && !empty($pname) && !empty($pname2)) {
      // Case 1: Update all fields
      $sql = "UPDATE scores SET player1 = '$player1', player2 = '$player2', pname = '$pname', pname2 = '$pname2'";
  } elseif (!empty($player1) && !empty($player2) && !empty($pname)) {
      // Case 2: Update player1, player2, and player1 name
      $sql = "UPDATE scores SET player1 = '$player1', player2 = '$player2', pname = '$pname'";
  } elseif (!empty($player1) && !empty($player2) && !empty($pname2)) {
      // Case 3: Update player1, player2, and player2 name
      $sql = "UPDATE scores SET player1 = '$player1', player2 = '$player2', pname2 = '$pname2'";
  } elseif (!empty($player1) && !empty($pname) && !empty($pname2)) {
      // Case 4: Update player1, player1 name, and player2 name
      $sql = "UPDATE scores SET player1 = '$player1', pname = '$pname', pname2 = '$pname2'";
  } elseif (!empty($player2) && !empty($pname) && !empty($pname2)) {
      // Case 5: Update player2, player1 name, and player2 name
      $sql = "UPDATE scores SET player2 = '$player2', pname = '$pname', pname2 = '$pname2'";
  } elseif (!empty($player1) && !empty($pname)) {
      // Case 6: Update player1, player1 name
      $sql = "UPDATE scores SET player1 = '$player1', pname = '$pname'";
  } elseif (!empty($player1) && !empty($pname2)) {
      // Case 7: Update player1, player2 name
      $sql = "UPDATE scores SET player1 = '$player1', pname2 = '$pname2'";
  }
  elseif (!empty($player1) && !empty($player2)) {
    // Case 7: Update player1, player2 name
    $sql = "UPDATE scores SET player1 = '$player1', player2 = '$player2'";
} elseif (!empty($player2) && !empty($pname)) {
      // Case 8: Update player2, player1 name
      $sql = "UPDATE scores SET player2 = '$player2', pname = '$pname'";
  } elseif (!empty($player2) && !empty($pname2)) {
      // Case 9: Update player2, player2 name
      $sql = "UPDATE scores SET player2 = '$player2', pname2 = '$pname2'";
  } elseif (!empty($pname) && !empty($pname2)) {
      // Case 10: Update player1 name, player2 name
      $sql = "UPDATE scores SET pname = '$pname', pname2 = '$pname2'";
  } elseif (!empty($player1)) {
      // Case 11: Only update player1
      $sql = "UPDATE scores SET player1 = '$player1'";
  } elseif (!empty($player2)) {
      // Case 12: Only update player2
      $sql = "UPDATE scores SET player2 = '$player2'";
  } elseif (!empty($pname)) {
      // Case 13: Only update player1 name
      $sql = "UPDATE scores SET pname = '$pname'";
  } elseif (!empty($pname2)) {
      // Case 14: Only update player2 name
      $sql = "UPDATE scores SET pname2 = '$pname2'";
  } else {
      // Case 15: Handle the case when no player information is provided
      echo "Error: Player information not provided.";
      exit();
  }
    if ($conn->query($sql) === TRUE) {
        // Do not exit immediately, let the SSE connection trigger the page reload
    } else {
        // There was an error in the SQL query
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>


  <!-- The rest of your HTML code remains unchanged -->

</body>
</html>
