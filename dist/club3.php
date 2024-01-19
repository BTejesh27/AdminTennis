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

        th, td {
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
                       
                        <th>Player ID</th>
                        <th>Player Name</th>
                        <th>Nick Name</th>
                        <th>Age</th>
                        <th>Matches</th>
                        <th>Score</th>
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
                                player_score.mat, 
                                player_score.points
                            FROM players_d
                            LEFT JOIN player_score ON players_d.pid = player_score.pid
                            WHERE players_d.cid3 = 3 ";

                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                      
                        echo "<td>{$row['pid']}</td>";
                        echo "<td>{$row['pname']}</td>";
                        echo "<td>{$row['pnickname']}</td>";
                        echo "<td>{$row['age']}</td>";
                        echo "<td>{$row['mat']}</td>";
                        echo "<td>{$row['points']}</td>";
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