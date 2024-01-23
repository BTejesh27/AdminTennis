<?php
include 'nav.php';
?>
<main>
    <head>
        <!-- Your existing head section -->
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
                                <th>mid</th>
                                <th>pid1</th>
                                <th>pid2</th>
                                <th>score1</th>
                                <th>score2</th>
                                <th>win</th>
                                <th>Update</th> <!-- New column for the Update button -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'connect.php';

                            $sql = "SELECT * FROM singles";
                            $result = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>{$row['mid']}</td>";
                                echo "<td>{$row['pid1']}</td>";
                                echo "<td>{$row['pid2']}</td>";
                                echo "<td>{$row['score1']}</td>";
                                echo "<td>{$row['score2']}</td>";
                                echo "<td>{$row['win']}</td>";
                                // Add the Update button with a link to the update_singles.php page
                                echo "<td><a href='update_singles.php?mid={$row['mid']}' class='btn btn-primary m-2'>Update</a></td>";
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
</main>
