<style>
    .btn{
        border-radius: 8px;
            border-color: #8AAAE5;
            border-radius: 8px;
            background:#FFF4E7;
    }
</style>
<form method="POST">
    <input type="text" name="student_name" placeholder="Student Name" required autofocus />
    <input class="btn" type="submit" value="Add Student" name="submit">
</form>

<?php 

    if(isset($_POST['submit']))
    {
        require_once("config.php");
        $student_name = $_POST['student_name'];

        $query = "INSERT INTO attendance_students(student_name) VALUE('$student_name')";
        $execQuery = mysqli_query($db, $query) or die(mysqli_error($db));

        echo "Student has been added Successfully!";
    }

?>