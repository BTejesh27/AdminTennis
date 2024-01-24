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
</div>
</div>