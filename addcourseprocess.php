<?
// Start the session
session_start();
if(!isset($_SESSION['loggedin'])) {
header("Location: login.php");
}

if(isset($_POST['addcourse'])) {

include '/home/knowledge27/.function.php';

$sql = "INSERT INTO college_enrollments (course_id, student_id)
VALUES ('{$_POST['course_id']}','{$_SESSION['student_id']}')";

if (mysqli_query($conn, $sql)) {
    $_SESSION['addcoursesuccess'] = '<div class="alert alert-success" role="alert">
    You have successfully added this course!
    </div>';
    header("Location: dashboard.php");
} else {
    $_SESSION['addcoursefail'] = '<div class="alert alert-danger" role="alert">
    Course add unsuccessful. Please try again.
    </div>';
    header("Location: dashboard.php");
}
}

?>