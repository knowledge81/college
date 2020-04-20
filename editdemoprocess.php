<?
// Start the session
session_start();
if(!isset($_SESSION['loggedin'])) {
header("Location: login.php");
}

if(isset($_POST['editdemo'])) {

include '/home/knowledge27/.function.php';
    
$_SESSION['firstname'] = $_POST['firstname'];
$_SESSION['lastname'] = $_POST['lastname'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['phone'] = $_POST['phone'];
$_SESSION['address'] = $_POST['address'];
$_SESSION['address2'] = $_POST['address2'];
$_SESSION['city'] = $_POST['city'];
$_SESSION['state'] = $_POST['state'];
$_SESSION['postalcode'] = $_POST['postalcode'];
$_SESSION['gender'] = $_POST['gender'];

$sql = "UPDATE college_students SET firstname='{$_SESSION['firstname']}', lastname='{$_SESSION['lastname']}', email='{$_SESSION['email']}', phone='{$_SESSION['phone']}', address='{$_SESSION['address']}', address2='{$_SESSION['address2']}', city='{$_SESSION['city']}', state='{$_SESSION['state']}', postalcode='{$_SESSION['postalcode']}', gender='{$_SESSION['gender']}'
WHERE student_id='{$_SESSION['student_id']}'";

if (mysqli_query($conn, $sql)) {
    $_SESSION['messagesuccessupdate'] = '<div class="alert alert-success" role="alert">
    You have updated your personal information successfully!
    </div>';
    header("Location: dashboard.php");
} else {
    $_SESSION['messagefailupdate'] = '<div class="alert alert-danger" role="alert">
    Update unsuccessful. Please try again.
    </div>';
    header("Location: dashboard.php"); 
    mysqli_error($conn);
}
}
?>
        