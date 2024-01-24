<?php
include 'nav.php';
?>
<main>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    <div class="container-fluid px-4">
        <div class="container">
            <h2>Player Data</h2>
            <table>
                <thead>
                    <tr>

                        <th>Team ID</th>
                        <th>pid 1</th>
                        <th>pid 2</th>
                        <th>Player 1</th>
                        <th>Player 2</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'connect.php';

                    $sql = "SELECT teams.teamid, teams.pid1, teams.pid2, players_d1.pname AS player1_name, players_d2.pname AS player2_name
                            FROM teams
                           JOIN players_d AS players_d1 ON teams.pid1 = players_d1.pid
                           JOIN players_d AS players_d2 ON teams.pid2 = players_d2.pid";

                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['teamid']}</td>";
                        echo "<td>{$row['pid1']}</td>";
                        echo "<td>{$row['pid2']}</td>";
                        echo "<td>{$row['player1_name']}</td>";
                        echo "<td>{$row['player2_name']}</td>";
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
</div>