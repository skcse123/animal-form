<?php
$insert = false;
if(isset($_POST['name'])){

 // set connection variable
    $servername = "localhost";
    $username = "root";
    $password = " ";

    // create a database connection
    $conn = mysql_connect($server , $username ,$password);
//cheack for connection success
    if (!$conn){
        die("connection to this database failed due to ".
        mysqli_connect_error());
    }
    //echo "Connection success!";

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `us-trip`.'us-trip' (`sno`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`)
    VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$other',
     current_timestamp());";
    // echo $sql;
    
    //execute the query
     if($con->query($sql) == true){
        // echo "Successfully inserted";

        //flag for successful insertion
        $insert = true;
     }
     else{
         echo "ERROR: $sql <br> $con-> error";
     }
     //close the database connection
     $con->close();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal-Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="tiger" src="tiger.jpg" alt="Animals">

    <div class="container" ;>
        <h1>Create a form to submit animal information</h1>
        <h3>
            <p>Enter your details and submitted this form  </p>
            <?php
            if($insert == true){
            echo "<p class='submitMsg'>Thanks for submitting  </p></h3>";
            }
            ?>
            <center>
                <form action="index.php" method="post">
                    <p><input type="text" name="name" id="name" placeholder="Name of animals"></p>
                    <p><select class="form-select" aria-label="Default select example">
  <option selected>Category</option>
  <option value="1">herbivores</option>
  <option value="2">omnivores</option>
  <option value="3">carnivores</option>
</select><p/>
                    <p><div class="mb-3">
  <label for="formFile" class="form-label">Image</label>
  <input class="form-control" type="file" id="formFile">
</div>
                        <p />
                    <p><textarea name="desc" id="desc" cols="15" rows="5"
                            placeholder="Description"></textarea></p>
                    <p><select class="form-select" aria-label="Default select example">
  <option selected>Life expectancy</option>
  <option value="1">0-1 year</option>
  <option value="2">1-5 year</option>
  <option value="2">5-10 year</option>
  <option value="3">10+ year</option>
</select><p/>
<div class="form-group">
                            <div class="g-recaptcha" data-sitekey="6LfKURIUAAAAAO50vlwWZkyK_G2ywqE52NU7YO0S" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                            <input class="form-control d-none" data-recaptcha="true" required data-error="Please complete the Captcha">
                            <div class="help-block with-errors"></div>
                        </div>
                        

                    <p><button type="Edit" class="btn btn-primary">Submit</button></p>
            </center>
            </form>
    </div>
    <script src="index.js"></script>

</body>

</html>