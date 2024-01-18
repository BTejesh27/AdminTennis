<?php
include 'nav.php';
?>
<main>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>live score</title>
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
                    <h2>live score</h2>
                    <table>
                        <thead>
                            <tr>

                                <th>Player 1</th>
                                <th>Player 2</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'config.php';

                            $sql = "SELECT * FROM scores";

                            $result = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>{$row['player1']}</td>";
                                echo "<td>{$row['player2']}</td>";
                           
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