<?php
    include 'nav.php';
?>
 <main>
 <style>table {
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
        }</style>
                <div class="container-fluid px-4">
                    <div class="container">
                        <h2>Player Data</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>profile</th>
                                    <th>Player ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Club</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'connect.php';

                                $sql = "SELECT * FROM players_d WHERE club1='club3'";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>{$row['playerid']}</td>";
                                    echo "<td>{$row['playerid']}</td>";
                                    echo "<td>{$row['firstname']}</td>";
                                    echo "<td>{$row['lastname']}</td>";
                                    echo "<td>{$row['club1']}</td>";
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

       