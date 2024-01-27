<style>
    .head{
        background-color: #AA96DA;
    }
.main{
    display: flex;
    margin-top: 20px;
    height: 100%;
   
}
.addStudent{
    margin-right: 20px;
    padding-top: 20px;
    height: 90%;
    background-color:#C5FAD5;
    
}
.addAttendance{
    padding-left: 20%;
    background-color: #FFFFD2;
    width: 100%;
    height: 90%;
}
.btn{
    border-radius: 8px;
            border-color: #8AAAE5;
            
           
            border-radius: 8px;
            background:#FFF4E7;
}
</style>

<!-- header div -->

<div class="head">
<h1> <center> Adding ATTENDANCE!!</center></h1>
<button class="attendance btn"><a href="index.php">Home</a></button>
</div>

<!-- main div -->

<div class="main">


<!-- add student div -->


<div class="addStudent">
    <h3>Please Add Student</h3>
<?php require_once("addingStudents.php");
echo '<br>';
?>
</div>

<!-- add student div -->

<div class="addAttendance">
<table border="1" cellspacing="0">
    <form method="POST">
        <tr>
            <th>ID</th>
            <th>Student Name</th>
            <th> P </th>
            <th> A </th>
            <th> L </th>
            <th> H </th>
        </tr>
        <?php
            require_once("config.php");
            $fetchingStudents = mysqli_query($db, "SELECT * FROM attendance_students") OR die(mysqli_error($db));
            while($data = mysqli_fetch_assoc($fetchingStudents))
            {
                $student_name = $data['student_name'];
                $student_id = $data['id'];
        ?>
                <tr>
                <td><?php echo $student_id; ?></td>
                    <td><?php echo $student_name; ?></td>
                    <td> <input type="checkbox" name="studentPresent[]" value="<?php echo $student_id; ?>" /></td>
                    <td> <input type="checkbox" name="studentAbsent[]" value="<?php echo $student_id; ?>" /></td>
                    <td> <input type="checkbox" name="studentLeave[]" value="<?php echo $student_id; ?>" /></td>
                    <td> <input type="checkbox" name="studentHoliday[]" value="<?php echo $student_id; ?>" /></td>
                </tr>
        <?php

            }
        ?>
        <tr>
            <td >Select Date (Optional)</td>
            <td colspan="5"> <input class="btn" type="date" name="selected_date" /> </td>
        </tr>
        <tr>
            <th colspan="6"> <input class="btn" type="submit" name="addAttendanceBTN" /></th>
        </tr>
    </form>
</table>


<?php 
    if(isset($_POST['addAttendanceBTN']))
    {
        date_default_timezone_set("Asia/Dhaka");

        // Date Logic Starts 
        if($_POST['selected_date'] == NULL)
        {
            $selected_date = date("Y-m-d");
        }else {
            $selected_date = $_POST['selected_date'];
        }
        // Date Logic Ends
        $attendance_month = date("M", strtotime($selected_date));
        $attendance_year = date("Y", strtotime($selected_date));

        if(isset($_POST['studentPresent']))
        {
            $studentPresent = $_POST['studentPresent'];
            $attendance = "P";

            foreach($studentPresent as $atd)
            {
                mysqli_query($db, "INSERT INTO attendance(student_id, curr_date, attendance_month, attendance_year, attendance) VALUES('" . $atd . "', '". $selected_date ."', '". $attendance_month ."', '". $attendance_year ."', '". $attendance ."')") OR die(mysqli_error($db));
            }

        }

        if(isset($_POST['studentAbsent']))
        {
            $studentAbsent = $_POST['studentAbsent'];
            $attendance = "A";

            foreach($studentAbsent as $atd)
            {
                mysqli_query($db, "INSERT INTO attendance(student_id, curr_date, attendance_month, attendance_year, attendance) VALUES('" . $atd . "', '". $selected_date ."', '". $attendance_month ."', '". $attendance_year ."', '". $attendance ."')") OR die(mysqli_error($db));
            }
        }

        if(isset($_POST['studentLeave']))
        {
            $studentLeave = $_POST['studentLeave'];
            $attendance = "L";

            foreach($studentLeave as $atd)
            {
                mysqli_query($db, "INSERT INTO attendance(student_id, curr_date, attendance_month, attendance_year, attendance) VALUES('" . $atd . "', '". $selected_date ."', '". $attendance_month ."', '". $attendance_year ."', '". $attendance ."')") OR die(mysqli_error($db));
            }
        }

        if(isset($_POST['studentHoliday']))
        {
            $studentHoliday = $_POST['studentHoliday'];
            $attendance = "H";

            foreach($studentHoliday as $atd)
            {
                mysqli_query($db, "INSERT INTO attendance(student_id, curr_date, attendance_month, attendance_year, attendance) VALUES('" . $atd . "', '". $selected_date ."', '". $attendance_month ."', '". $attendance_year ."', '". $attendance ."')") OR die(mysqli_error($db));
            }
        }



        echo "Attendance added successfully";

    }
?>
<br><br>


</div>

</div>







