
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
                                        <!-- <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div> -->
                                        Dashboard
                                    </a>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                        <!-- <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div> -->
                                        Tournaments
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="tournament.php">Tournament</a>
                                            <a class="nav-link" href="singles.php">Singles</a>
                                            <a class="nav-link" href="teams.php">Doubles team</a>
                                            <a class="nav-link" href="doubles.php">Doubles</a>
                                        </nav>
                                    </div>

                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                                        <!-- <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div> -->
                                        Clubs
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="club1.php">Cosmo Club</a>
                                            <a class="nav-link" href="club2.php">Youth Club</a>
                                            <a class="nav-link" href="club3.php">Town hall Club</a>
                                        </nav>
                                    </div>

                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts">
                                        <!-- <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div> -->
                                        Players
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.php">New Member</a>
                                            <a class="nav-link" href="players.php">Player Details</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link" href="category.php">
                                        <!-- <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div> -->
                                        Category
                                    </a>
                                    <a class="nav-link" href="singles_r.php">
                                        <!-- <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div> -->
                                        Update Singles
                                    </a>
                                    <a class="nav-link" href="doublrs_r.php">
                                        <!-- <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div> -->
                                        Update doubles
                                    </a>
                                    <!-- <a class="nav-link" href="player_points.php">
                                        <div class="#"><i class="fas fa-tachometer-al"></i></div> -->
                                        <!-- Players points -->
                                    <!-- </a> -->
                        </nav>
                    </div>
                    <div id="layoutSidenav_content">
                        <main>
                            <div class="container-fluid px-4">
                                <h1 class="mt-4">Dashboard</h1>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>

                              
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