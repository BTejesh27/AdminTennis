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
                        // edit.php
                        include 'connect.php';

                        if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {

                            // Retrieve player data based on ID
                            $playerId = $_GET['id'];
                            $sql = "SELECT * FROM players_d WHERE playerid = $playerId";
                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                $row = mysqli_fetch_assoc($result);
                                // Render a form with pre-filled data for editing
                                // ...
                            }

                            mysqli_close($conn);
                        }
                        ?>