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
<?php
include 'connect.php';
?>


<main>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">New Member</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputplayerid" type="name" placeholder="pid" name="id" required />
                                <label for="inputplayerid">Player id</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputname" type="name" placeholder="Name" name="name" required />
                                <label for="inputname">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputname" type="name" placeholder="Name" name="pnickname"  />
                                <label for="inputname">NickName</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputage" type="name" placeholder="Age" name="age"  />
                                <label for="inputage">Age</label>
                            </div>
                            <div>

                                <label style="margin-right: 150px" ;> Gender</label><br>
                                <input type="checkbox" name="male" value="male">
                                <label style='margin: left 100px; ' ; for="male">Male</label><br>

                                <input type="checkbox" name="female" value="female">
                                <label style='margin: left 500px; ' ; for="female">Female</label><br><br>


                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputaddress" type="name" placeholder="Address" name="address"  />
                                <label for="inputaddress">Address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputmobile" type="name" placeholder="Mobile" name="mobile"  />
                                <label for="inputmobile">Mobile</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputemail" type="name" placeholder="Email" name="email"  />
                                <label for="inputemail">Email</label>
                            </div>
                            <div>

                                <label style="margin-right: 150px" ;> Club</label><br>
                                <input type="checkbox" name="club1" value="club1">
                                <label style='margin: left 100px; ' ; for="club1">Cosmo Club</label><br>
                                <input type="checkbox" name="club2" value="club2">
                                <label style='margin: left 500px; ' ; for="club2">Youth Club</label><br>
                                <input type="checkbox" name="club3" value="club3">
                                <label style='margin: left 500px; ' ; for="club3">Town hall Club</label><br>


                            </div>

                            <div>


                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <button class="btn btn-primary" type="submit" name="submit">Submit</button>


                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
    <?php
    include 'connect.php';

    if (isset($_POST['submit'])) {
        // Sanitize input to prevent SQL injection
        $pid = $_POST['id'];
        $name = $_POST['name'];
        $pnickname = $_POST['pnickname'];
        $age = $_POST['age'];
        $gender = isset($_POST['male']) ? 'Male' : (isset($_POST['female']) ? 'Female' : '');
        $address = $_POST['address'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $cid1 = isset($_POST['club1']) ? 1 : 0;
        $cid2 = isset($_POST['club2']) ? 2 : 0;
        $cid3 = isset($_POST['club3']) ? 3 : 0;

        $insertQuery = "INSERT INTO players_d(pid, pname,pnickname, age, gender, address, mobileno, email, cid1, cid2, cid3) 
                        VALUES ('$pid', '$name','$pnickname', '$age', '$gender', '$address', '$mobile', '$email', '$cid1', '$cid2', '$cid3')";

        if ($conn->query($insertQuery) === TRUE) {
            echo "<script>alert('Success!');</script>";
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }
?>


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