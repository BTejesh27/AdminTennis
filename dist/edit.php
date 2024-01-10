
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