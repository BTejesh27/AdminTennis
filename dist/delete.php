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
                        // delete.php
                        include 'connect.php';

                        if ( isset($_GET['id'])) {

                            // Delete player data based on ID
                            $playerId = $_GET['id'];
                            $sql = "DELETE FROM players_d WHERE playerid = $playerId";
                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                // Redirect to the player data page after deletion
                                header("Location: players.php");
                                exit();
                            }

                            mysqli_close($conn);
                        }
                        ?>