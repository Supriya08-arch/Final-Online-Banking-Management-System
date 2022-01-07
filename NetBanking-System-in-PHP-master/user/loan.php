<?php
session_start();
include "connection.php";
include '../mail/mail_config.php';
// checking Submit button is clicked or not by isset function
if (isset($_POST['submit'])) {


    // ----------------------------------------- Basic Detail Section -----------------------------------------

    $Account_Type = "Saving";
    $Account_Status = "Inactive";
    $Balance = "0.0";

    // Storing Form values in variable
    $First_Name = $_POST['FirstName'];
    $Last_Name = $_POST['LastName'];
    $Birth_Date = $_POST['BirthDate'];
    $Mobile_Number = $_POST['MobileNumber'];
    $Account_Number = $_POST['Account_Number'];
    $Citizenship_Number = $_POST['CitizenshipNumber'];
    $email = $_POST['email'];
    $addres = $_POST['Address'];
    $Loan_type = $_POST['loan_types'];

    $loan_interest_rate = $_POST['loan_interest_rate'];
    $amount = $_POST['Amount'];
    $requested = $_POST['requested'];
    $return = $_POST['return'];
    // $purpose = $_POST['Purpose'];


    //
    //create table loan(First_Name varchar(255), Last_Name varchar(255), Birth_Date varchar(255), Mobile_Number varchar(15), Account_Number int(255), Citizenship_Number varchar(10), email varchar(255), addres varchar(255), Loan_type varchar(255), loan_insterest_rate varchar(10), amount int(10), requested varchar(255), retrun varchar(255),purpose varchar(255));
    
        $Upload_query = "INSERT INTO loan(First_Name, Last_Name, Birth_Date, Mobile_Number, Account_Number, Citizenship_Number, email, addres, Loan_type, loan_insterest_rate, amount, requested, retrun) VALUES('$First_Name', '$Last_Name', '$Birth_Date', '$Mobile_Number', '$Account_Number', '$Citizenship_Number', '$email', '$addres', '$Loan_type', '$loan_interest_rate', '$amount', '$requested', '$return')";


        mysqli_query($conn, $Upload_query) or die(mysqli_error($conn));

        // require '../mail/congraMail.php';
        // sendMessage($email, $First_Name);


}

?>

<!DOCTYPE html>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Loan Application</title>

    <!-- Favicons -->
    <link href="../assets/img/img.png" rel="icon">
    <link href="../assets/img/img.png" rel="apple-touch-icon">

    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Project CSS -->
    <link rel="stylesheet" href="../assets/css/createAccount.css">


    <!-- Javascrip -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../assets/js/createAc.js"></script>


</head>

<body>



    <form id="regForm" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
        <h1 class="mb-3">Loan Application:</h1>

        <!-- Tab 1
        

        <div class="tab mb-3" id="KycTab">
            <h3 class="mb-3 stepHead">Step 1/4</h3>
            <p class="SubAction">Upload KYC Document</p>

           
        </div> -->


        <!-- Tab 1 -->
        <div class="tab mb-3">
            <h3 class="mb-3 stepHead">Step 1/2</h3>
            <!-- <p class="SubAction">Personal Detail:</p> -->
            <label> Types of loan: </label>
            <select name="loan types">
                <option values=""> --Select--</option>
                <option values="Education Loan"> Education Loan </option>
                <option values="Personal Loan"> Personal Loan </option>
                <option values="Auto Loan"> Auto Loan </option>
                <!-- <option values="Loan against Mortgaged Property"> Loan against Mortgaged Property</option> -->
                <option values="Employer's Overdraft Loan"> Employer's Overdraft Loan </option>
                <option values="Commercial Agricultural and Livestock Loan"> Commercial Agricultural and Livestock Loan </option>
                <option values="Deprived Sector Loan"> Deprived Sector Loan </option>
</select>

            
            <div class="row g-2 mb-3">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" name="FirstName" class="form-control" id="FirstName" placeholder="First Name">
                        <label for="floatingInputGrid">First Name</label>

                       
                    </div>
                </div>
                <div class="col-md">
                    <div class="col-md">
                        <div class="form-floating">

                            <input type="text" name="LastName" class="form-control" id="Lname" placeholder="Last Name">
                            <label for="floatingInputGrid">Last Name</label>

                        
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row g-2 mb-3">
                <div class="col-md">
                    <div class="col-md">
                        <div class="form-floating">

                            <input type="text" name="FatherName" class="form-control" id="FAname" placeholder="Father's Name">
                            <label for="floatingInputGrid">Father's Full Name</label>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="col-md">
                        <div class="form-floating">

                            <input type="text" name="MotherName" class="form-control" id="MAname" placeholder="Mother's Name">
                            <label for="floatingInputGrid">Mother's Full Name</label>
                            
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row g-2 mb-3">
                <div class="col-md">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="date" name="BirthDate" class="form-control" id="BirthDate" placeholder="Birth Date">
                            <label for="floatingInputGrid">Birth Date</label>
 
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="col-md">
                        <div class="form-floating">
                            <input name="MobileNumber" class="form-control" type="tel" id="MobileNo" pattern="[0-9]{10}" placeholder="Mobile Number" onkeypress="return isNumber(event)">
                            <label for="floatingInputGrid">Mobile Number</label>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-2 mb-3">
                <div class="col-md">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" name="Account_Number" class="form-control" id="AccountNo" placeholder="text">
                            <label for="floatingInputGrid">Account Number</label>
                           
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="col-md">
                        <div class="form-floating">
                            <input name="CitizenshipNumber" class="form-control" type="tel" id="CitizenNo" placeholder="Citizenship Number" onkeypress="return isNumber(event)">
                            <label for="floatingInputGrid">Citizenship Number</label>
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-2 mb-3">
                <div class="col-md">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email Address">
                            <label for="floatingInputGrid">Email Address</label>
                           
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="col-md">
                        <div class="form-floating">
                            <input name="Address" class="form-control" type="tel" id="Address" placeholder="Text" >
                            <label for="floatingInputGrid">Address</label>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tab 2 -->
<!-- 
        <div class="tab mb-3">
            <h3 class="mb-3 stepHead">Step 2/2</h3> 
            <p class="SubAction">Personal Detail:</p> -->
            <label> Loan Intrest Rate: </label>
            <select name="loan_interest_rate">
                <option values=""> --Select--</option>
                <option values="Education Loan"> Education Loan [5%] </option>
                <option values="Personal Loan"> Personal Loan [15%] </option>
                <option values="Auto Loan"> Auto Loan [10%] </option>
                <option values="Loan against Mortgaged Property"> Loan against Mortgaged Property [17%]</option> 
                <option values="Employer's Overdraft Loan"> Employer's Overdraft Loan [20%] </option> 
                <option values="Commercial Agricultural and Livestock Loan"> Commercial Agricultural and Livestock Loan [2%] </option>
                <option values="Deprived Sector Loan"> Deprived Sector Loan [5%]</option>
</select> 

            
            <div class="row g-2 mb-3">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" name="Amount" class="form-control" id="Amount" placeholder="Amount" onkeypress="return isNumber(event)" >
                        <label for="floatingInputGrid">Amount Requested</label>

                       
                    </div>
                </div> <br>
            </div>
            
            <div class="row g-2 mb-3">
                <div class="col-md">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="date" name="requested" class="form-control" id="requested" placeholder="requested">
                            <label for="floatingInputGrid">Requested Date Of Fund</label>

                        </div>
                    </div>
                </div>
            </div>
            
                <div class="row g-2 mb-3">
                <div class="col-md">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="date" name="return" class="form-control" id="return" placeholder="return">
                            <label for="floatingInputGrid">Expected Date to collect loan</label>

                        </div>
                    </div>
                </div>
                </div>
            <!-- <div class="row g-2 mb-3">
                <div class="col-md">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" name="Account Number" class="form-control" id="AccountNo" placeholder="text">
                            <label for="floatingInputGrid">Account Number</label>
                           
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="col-md">
                        <div class="form-floating">
                            <input name="CitizenshipNumber" class="form-control" type="tel" id="CitizenNo" placeholder="Citizenship Number" onkeypress="return isNumber(event)">
                            <label for="floatingInputGrid">Citizenship Number</label>
                           
                        </div>
                    </div>
                </div>
            </div> -->
        

        
        
        
        <!-- Tab 3 -->

        <!-- <div class="tab">
            <h3 class="mb-3 stepHead">Step 3/4</h3>
            <p class="SubAction">Validate Email Account</p>

            <div class="col-md mb-3">
                <div class="col-md">
                    <div class="alert alert-success" role="alert">
                        Verification Code Send On Your email, Please check your email
                    </div>
                    <div class="form-floating OtpMobile">
                        <input type="tel" class="form-control" name="Otp" id="Otp" placeholder="Enter 6 Digit OTP" pattern="[0-9]{6}">
                        <label for="floatingInputGrid">Enter 6 Digit OTP</label>
                        <span style="color: red;" id="OtpError"></span>
                    </div>
                </div>
            </div>

        </div> -->

        <!-- Tab 3 -->

        <!-- <div class="tab mb-3" id="KycTab">
            <h3 class="mb-3 stepHead">Step 3/3</h3>
            <p class="SubAction">Upload KYC Document</p> -->

            <div class="form-group mb-3">
                <label for="exampleFormControlFile1">Photo</label>
                <input type="file" name="Photo_Up" class="form-control-file" id="PhotoUp" size="30" accept="image/jpg,image/png,image/jpeg,image/gif">

            <div class="form-groupmb-3">
                <label for="exampleFormControlFile1">Upload Citizenship Photo</label>
                <input type="file" name="Citizenship_Photo_Up" class="form-control-file" id="CitizenshipPhotoUp" size="30" accept="image/jpg,image/png,image/jpeg,image/gif">

            <span id="mailsendError"></span>
        </div>

        </div> -->
        <div style="overflow:auto;">
            <div style="float:right;">
                <button type="button" id="prevBtn" class="CustomButton" onclick="nextPrev(-1)">Previous</button>
                <button type="button" id="nextBtn" class="CustomButton" onclick="nextPrev(1)">Next</button>
                <input type="submit" name="submit" id="submitBtn" class="CustomButton" style="display: none;">
            </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <!-- <span class="step"></span> -->
            <!-- <span class="step"></span> -->
        </div>
    </form>


    <script src="../assets/js/createAccount.js"></script>

    <!-- Vendor JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>


</body>

</html>
