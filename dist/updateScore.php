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
    <label for="player1Input">Player 1 Score:</label>
    <input type="number" id="player1Input" name="player1" min="0">
    
    <label for="player2Input">Player 2 Score:</label>
    <input type="number" id="player2Input" name="player2" min="0">

    <button type="submit">Update Scores</button>
  </form>
  <script>
    // Your existing JavaScript code goes here

    function updateScores() {
      const player1 = document.getElementById('player1Input').value;
      const player2 = document.getElementById('player2Input').value;

      // Perform AJAX request to update scores in the backend
      // ...

      // Assuming you have a function to update the scores on the frontend
      updateFrontendScores(player1, player2);
    }

    function updateFrontendScores(player1Score, player2Score) {
      // Your existing code to update scores on the frontend
      // ...
    }
  </script>

  
<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $player1 = $_POST["player1"];
    $player2 = $_POST["player2"];

    // Validate and sanitize input if needed

    $sql = "UPDATE scores SET player1 = $player1, player2 = $player2 ";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to the main page after updating scores
    
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
</body>
</html>