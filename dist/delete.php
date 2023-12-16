
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