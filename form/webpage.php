<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>project form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
    <style type = "text/css">
@import url('https://fonts.googleapis.com/css2?family=Albert+Sans:wght@100&family=Bree+Serif&family=Cinzel:wght@400;500&family=EB+Garamond:wght@400;600;700;800&family=Gruppo&family=Karla:ital,wght@1,200&family=Merriweather:wght@300&family=Old+Standard+TT:ital@1&family=Open+Sans:wght@300&display=swap');
*{
    margin: 0%;
    padding: 0%;
}

.main{
    height: 100vh;
    width: 100vw;
    background-image: linear-gradient(
        rgba(255, 255, 255, 0.198),
            rgba(255, 255, 255, 0.193)),
                 url("scenery.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    position: fixed;
}

.form{
    width:80%;
    height: 500px;
    margin-left: 10%;
    background-color: rgba(202, 194, 194, 0.665);
    margin-top: 4%;
    position: absolute;
    font-size: 15px;
    color: black;
    box-shadow: rgba(0, 0, 0, 0.292) -10px 7px 20px 10px; /* color | x-axix | y-axix | blur | range */
}

.form1{
    width: 40%;
    height: 500px;
    background-image: url(scenery.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    position:fixed;
}

.form2{
    width: 40%;
    height: 500px;
    position: relative;
    left: 50%;
    padding:20px;
    top: 2%;
}

.first{
    width: 200px;
    height: 30px;
    font-size: 15px;
    color: rgb(77, 71, 71);
    padding: 4px;
    border: none;
    border-bottom: 1px solid rgba(0, 0, 0, 0.566);
    background: transparent;
    display: block;
    outline: none;
}


.second{
    width: 200px;
    height: 30px;
    font-size: 15px;
    color: rgb(77, 71, 71);
    padding: 4px;
    border: none;
    border-bottom: 1px solid rgba(0, 0, 0, 0.566);
    background: transparent;
    outline: none;
}

.date{
    width: 300px;
    height: 30px;
    font-size: 15px;
    color: rgb(77, 71, 71);
    border: none;
    border-bottom: 1px solid rgb(0, 0, 0);
    background: transparent;
    outline: none;
}

.male{
    height: 20px;
    width: 20px;
    border-radius: 50%;
}

.Female{
    height: 20px;
    width: 20px;
    border-radius: 50%;
}

.phone{
    width: 50px;
    height: 30px;
    font-size: 15px;
    color: rgb(0, 0, 0);
    background: transparent;
    border: none;
    outline : none;
}

.number{
    width: 200px;
    height: 30px;
    font-size: 15px;
    color: rgb(77, 71, 71);
    border: none;
    border-bottom: 1px solid rgb(0, 0, 0);
    background: transparent;
    outline: none;
}

.g-recaptcha{
    margin : 5px 5px;
}

.send{
    width: 100px;
    height: 30px;
    background: transparent;
    font-size: 1.2rem;
    border: 1px solid rgb(51, 50, 50);
    border-bottom-left-radius: 7px;
    border-top-right-radius: 7px;
    cursor: pointer;
}

.send:hover{
    background-color: white;
}

.reset{
    width: 100px;
    height: 30px;
    background: transparent;
    font-size: 1.2rem;
    border: 1px solid rgb(51, 50, 50);
    border-bottom-left-radius: 7px;
    border-top-right-radius: 7px;
    cursor: pointer;
}

.reset:hover{
    background-color: white;
}



</style>
</head>
<body>
    <div class="main">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $dob = $_POST['date'];
        $gender = $_POST['Gender'];
        $phoneNumber = $_POST['number'];

$servername = "localhost";
$username = "root";
$password = "";
$database = "user_form";


// Create a connection
$conn = mysqli_connect ($servername , $username , $password , $database);


//die if connection was not successfull
if (!$conn){
    die ("sorry it's failed to connect" . mysqli_connect_error());
}
else{
//Create a table in db
$sql = "INSERT INTO `project_form` (`fname`, `lname`, `dob`, `gender`, `phone no.`) VALUES ('$fname', '$lname', '$dob', '$gender', '$phoneNumber')";
$result = mysqli_query($conn, $sql);

// Check for the table creation success
if($result){
    echo '<div class="alert alert-successful alert-dismissible fade show" role="alert">
    <strong>Successfull!!</strong> Your application has been submitted successfully !!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
else{
    echo "the record was not inserted succesfully.. because of this error --->" . mysqli_error($conn);
}

}
}

?>

        <div class="img">
        </div>
        <div class="form">
            <div class="form1"></div>
           <form class="form2" action="/php/form/webpage.php" method="post">
            Enter your name :
            <br/>
            <input type="text" name="fname" class="first" placeholder="First Name" required="*"/>
            <input type="text" name="lname" class="second" placeholder="Last Name" />
            <br/>
            <br/>
            Date Of Birth : 
            <input type="date" name="date" class="date" value="date" required="*"/>
            <br/>
            <br/>
            Gender :
            <br/>
            <input type="radio" class="male" required="*" value="m" name="Gender"/> Male
            <input type="radio" class="Female" required="*" value="f" name="Gender"/> Female
            <br/>
            <br/>
            Telephone no:
                    <select class="phone">
                        <option>91</option>
                        <option>01</option>
                        <option>11</option>
                        <option>21</option>
                    </select>
                    <input type="phone number" class="number" required="*" name="number"/>
            <br/>
            <br/>
            <input type="submit" class="send" value="send"/>
            <input type="reset" class="reset" value="reset"/>
        </form>

        <div class = "status"></div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>

