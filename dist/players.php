<?php
include 'nav.php';
?>
<main>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Player Data</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
            }

            #layoutSidenav_content {
                margin: 20px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            th,
            td {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            th {
                background-color: #f2f2f2;
            }

            .container {
                max-width: 1200px;
                margin: 0 auto;
            }

            .btn {
                text-decoration: none;
                padding: 8px 12px;
                margin: 2px;
                border-radius: 4px;
                display: inline-block;
            }

            .btn-primary {
                background-color: #007bff;
                color: #fff;
            }

            .btn-danger {
                background-color: #dc3545;
                color: #fff;
            }
        </style>
    </head>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="container">
                    <h2>Player Data</h2>
                    <table>
                        <thead>
                            <tr>

                                <th>Player ID</th>
                                <th>Player Name</th>
                                <th>Nick Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Mobileno</th>
                                <th>email</th>
                                <th>Matches</th>
                                <th>Points</th>
                                <!-- <th>Operation</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'connect.php';

                            $sql = "SELECT 
                            players_d.pid, 
                            players_d.pname, 
                            players_d.pnickname,
                            players_d.age, 
                            players_d.gender, 
                            players_d.address, 
                            players_d.mobileno, 
                            players_d.email, 
                            player_score.mat, 
                            player_score.points
                        FROM players_d
                        LEFT JOIN player_score ON players_d.pid = player_score.pid";

                            $result = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>{$row['pid']}</td>";
                                echo "<td>{$row['pname']}</td>";
                                echo "<td>{$row['pnickname']}</td>";
                                echo "<td>{$row['age']}</td>";
                                echo "<td>{$row['gender']}</td>";
                                echo "<td>{$row['address']}</td>";
                                echo "<td>{$row['mobileno']}</td>";
                                echo "<td>{$row['email']}</td>";
                                echo "<td>{$row['mat']}</td>";
                                echo "<td>{$row['points']}</td>";
                                echo "</td>";
                                // echo "<a href='edit.php?id={$row['pid']}' class='btn btn-primary m-2'>Edit</a>";
                                // echo "<a href='delete.php?id={$row['pid']}' class='btn btn-danger p=m-2' onclick='return confirm(\"Are you sure you want to delete this player?\")'>Delete</a>";
                                echo "</td>";
                                echo "</tr>";
                            }

                            mysqli_close($conn);
                            ?>
                        </tbody>
                    </table>

                </div>


            </div>
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