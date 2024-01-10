<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        /* Style for the login form */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 300px;

            margin: 100px auto;
            margin-right: 100px;
            margin-left: 50px;
            position: absolute;
            top: 5px;
            right: 10px;
            
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
        }

        input {
            padding: 8px;
            margin-bottom: 16px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Additional styling for responsiveness */
        @media (max-width: 400px) {
            .container {
                width: 80%;
            }
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">ADMIN</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <!-- <div class="sb-sidenav-menu-heading">Core</div> -->
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <!-- <div class="sb-sidenav-menu-heading">Interface</div> -->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Tournaments
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.html">Upcoming Tournaments</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Past Tournament</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Clubs
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="club1.php">Club 1</a>
                                <a class="nav-link" href="club2.php">Club 2</a>
                                <a class="nav-link" href="club3.php">Club 3</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Players
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="login.php">New Member</a>
                                <a class="nav-link" href="players.php">Player Details</a>
                            </nav>
                        </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>

                    <?php
                    include 'connect.php';
                    // Assuming you have a database connection established

                    // SQL queries
                    $s1 = "SELECT count(*) as count FROM players_d WHERE club1='club1'";
                    $s2 = "SELECT count(*) as count FROM players_d WHERE club2='club2'";
                    $s3 = "SELECT count(*) as count FROM players_d WHERE club3='club3'";

                    // Execute queries and fetch results
                    $result1 = mysqli_query($conn, $s1);
                    $row1 = mysqli_fetch_assoc($result1);

                    $result2 = mysqli_query($conn, $s2);
                    $row2 = mysqli_fetch_assoc($result2);

                    $result3 = mysqli_query($conn, $s3);
                    $row3 = mysqli_fetch_assoc($result3);

                    // Close database connection
                    mysqli_close($conn);

                    // Prepare data for Chart.js
                    $labels = ['Club 1', 'Club 2', 'Club 3'];
                    $data = [$row1['count'], $row2['count'], $row3['count']];

                    ?>

                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <meta charset="UTF-8">
                        <title>Pie Chart</title>
                        <!-- Include Chart.js library -->
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    </head>

                    <body>

                        <!-- Display the pie chart -->
                        <div style="width: 50%;">
                            <canvas id="myPieChart"></canvas>
                        </div>

                        <script>
                            // Create a pie chart using Chart.js
                            var ctx = document.getElementById('myPieChart').getContext('2d');
                            var myPieChart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: <?php echo json_encode($labels); ?>,
                                    datasets: [{
                                        data: <?php echo json_encode($data); ?>,
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.8)',
                                            'rgba(54, 162, 235, 0.8)',
                                            'rgba(255, 206, 86, 0.8)'
                                        ],
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                }
                            });
                        </script>

                    </body>

                    </html>
                    <div class="container">
                        <h2>Score Update</h2>
                        <form action="" method="post">
                            <label for="playerid">Player ID:</label>
                            <input type="text" id="playerid" name="playerid" required>

                            <label for="matchesplayed">Matches Played:</label>
                            <input type="text" id="matchesplayed" name="matchesplayed" required>

                            <label for="totalscore">Total Score:</label>
                            <input type="text" id="totalscore" name="totalscore" required>

                            <button type="submit" name="submit">submit</button>
                        </form>
                        <?php
                        include 'connect.php';

                        if (isset($_POST['submit'])) {
                            
                            $playerid = $_POST["playerid"];
                            $match = $_POST["matchesplayed"];
                            $score = $_POST["totalscore"];

                            $insertPlayerScore = "INSERT INTO player_score(playerid, mat, score) VALUES ('$playerid', '$match', '$score')";

                            if (mysqli_query($conn, $insertPlayerScore)) {
                                echo "<p>Data inserted successfully into player_score table!</p>";
                            } else {
                                echo "<p>Error inserting data into player_score table: " . mysqli_error($conn) . "</p>";
                            }
                        } 

                        ?>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>