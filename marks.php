<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <table border="1">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Marks</td>
        </tr>
        <?php
        require_once("config.php");
        $fetchingStudents = mysqli_query($db, "SELECT * FROM attendance_students CROSS JOIN attendance GROUP BY student_id") or die(mysqli_error($db));
        while ($data = mysqli_fetch_assoc($fetchingStudents)) {
            $student_name = $data['student_name'];
            $student_id = $data['id'];
            $totalAttendance = $data['attendance'];

        ?>
            <tr>
                <td><?php echo $student_id; ?></td>
                <td><?php echo $student_name; ?></td>
                <td><?php echo $totalAttendance; ?></td>
            </tr>
        <?php

        }


        ?>


    </table>
</body>

</html>