<?
// Start the session
session_start();
if($_POST['email'] == '' OR $_POST['password'] == '') {
    $_SESSION['messagefail'] = '<div class="alert alert-danger" role="alert">
    Invalid login. Please try again.
    </div>';
    header("Location: login.php");
} else {
    //Check login credentials against database

include '/home/knowledge27/.function.php';

$email = $_POST['email'];   
$password = md5($_POST['password']);
$sql = "SELECT * FROM college_students WHERE email='$email' AND password='$password'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) {
    $_SESSION['loggedin'] = TRUE;
    $_SESSION['student_id'] = $row['student_id'];
    $_SESSION['firstname'] = $row['firstname'];
    $_SESSION['lastname'] = $row['lastname'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['phone'] = $row['phone'];
    $_SESSION['address'] = $row['address'];
    $_SESSION['address2'] = $row['address2'];
    $_SESSION['city'] = $row['city'];
    $_SESSION['state'] = $row['state'];
    $_SESSION['postalcode'] = $row['postalcode'];
    $_SESSION['gender'] = $row['gender'];
    $_SESSION['messagesuccess'] = '<div class="alert alert-success" role="alert">
    Log In Successful. Welcome to Your Account!
    </div>';
    header("Location: dashboard.php");
}
    } else {
    $_SESSION['messagefail'] = '<div class="alert alert-danger" role="alert">
    Invalid login. Please try again.
    </div>';
    header("Location: login.php");
}
}
?>


