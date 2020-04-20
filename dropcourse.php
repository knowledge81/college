<?
// Start the session
session_start();
if(!isset($_SESSION['loggedin'])) {
header("Location: login.php");
}

if(isset($_POST['dropcourse'])) {

include '/home/knowledge27/.function.php';

$_SESSION['course_id'] = $_POST['course_id'];

$sql = "DELETE from college_enrollments WHERE course_id = '{$_SESSION['course_id']}' AND student_id = '{$_SESSION['student_id']}'";

if ($conn->query($sql) === TRUE) {
    $_SESSION['messagedrop'] = '<div class="alert alert-success" role="alert">
    You have successfully dropped this course!
    </div>';
    header("Location: dashboard.php");
} else {
    $_SESSION['messagefaildrop'] = '<div class="alert alert-danger" role="alert">
    Course drop unsuccessful. Please try again.
    </div>';
    header("Location: dashboard.php");
}
}

?>