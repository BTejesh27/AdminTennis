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
                                <input class="form-control" id="inputname" type="name" placeholder="name@example.com" name="id" required />
                                <label for="inputEmail">Pid</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputlname" type="name" placeholder="Name" name="name" required />
                                <label for="inputfname">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputfname" type="name" placeholder="Age" name="age" required />
                                <label for="inputlname">Age</label>
                            </div>
                            <div>

                                <label style="margin-right: 150px" ;> Gender</label><br>
                                <input type="checkbox" name="male" value="male">
                                <label style='margin: left 100px; ' ; for="male">Male</label><br>

                                <input type="checkbox" name="female" value="female">
                                <label style='margin: left 500px; ' ; for="female">Female</label><br><br>



                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputfname" type="name" placeholder="Address" name="address" required />
                                <label for="inputlname">Address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputfname" type="name" placeholder="Mobile" name="mobile" required />
                                <label for="inputlname">Mobile</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputfname" type="name" placeholder="Email" name="email" required />
                                <label for="inputlname">Email</label>
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
        $age = $_POST['age'];
        $gender = isset($_POST['male']) ? 'Male' : (isset($_POST['female']) ? 'Female' : '');
        $address = $_POST['address'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];

        $insertQuery = "INSERT INTO players_d(pid, pname, age, gender, address, mobileno, email) VALUES ('$pid', '$name', '$age', '$gender', '$address', '$mobile', '$email')";

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