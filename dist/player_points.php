<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_password'])) {
    // User is not logged in, redirect to login page
    header("Location: admin.php");
    exit;
}

// Continue with the rest of your index.php code

// You can also use $_SESSION['user_password'] to access the user's password if needed
$userPassword = $_SESSION['user_password'];
?>


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
        <h2>Player points</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>pid</th>
                                <th>tid</th>
                                <th>mid</th>
                                <th>category</th>
                                <th>points</th>
                                <th>Update</th> <!-- New column for the Update button -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'connect.php';

                            $sql = "SELECT * FROM points";
                            $result = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>{$row['pid']}</td>";
                                echo "<td>{$row['tid']}</td>";
                                echo "<td>{$row['mid']}</td>";
                                echo "<td>{$row['category']}</td>";
                                echo "<td>{$row['points']}</td>";
                              
                                // Add the Update button with a link to the update_singles.php page
                                echo "<td><a href='updatepp.php?mid={$row['mid']}' class='btn btn-primary m-2'>Update</a></td>";
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