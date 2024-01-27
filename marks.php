<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .header {
            width: 100%;
            text-align: center;
            height: 100px;
            background-color: #702963;
            color: whitesmoke;
        }

        .header>h1 {
            padding-top: 20px;
        }

        body {
            background-color: #F5FEFD;
        }

        table {
            margin-top: 20px;
            margin-left: 40%;
        }

        .footer>a {
            color: #702963;
            margin-left: 45%;
        }

        button {
            width: 50px;
            border-radius: 8px;
            border-color: #8AAAE5;
            border-radius: 8px;
            background: #FFF4E7;
            margin-left: 20px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Attendance Marks Sheet!!</h1>
    </div>

    <?php
    require_once("config.php");

    $firstDayOfMonth = date("1-m-Y");
    $totalDaysInMonth = date("t", strtotime($firstDayOfMonth));
    ?>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Attendance Count</th>
            <th>Attendance Mark</th>
        </tr>
        <?php

        require_once("config.php");

        $db = mysqli_connect("localhost", "root", "", "webdev") or die("Connectivity Failed");

        // SQL query
        $sql = "
         SELECT 
             s.id,
             s.student_name,
             COUNT(a.student_id) AS attendance_count
         FROM 
             attendance_students s
         LEFT JOIN 
             attendance a ON s.id = a.student_id AND a.attendance = 'p'
         GROUP BY 
             s.id, s.student_name;
     ";
        $totalCountQuery = "
    SELECT 
        COUNT(*) AS total_attendance
    FROM 
        attendance
    WHERE 
        student_id = 1;
";

        // Execute the query
        $result = $db->query($sql);
        $result2 = $db->query($totalCountQuery);
        // Fetch the total attendance count
        $totalCountRow = $result2->fetch_assoc();
        $totalAttendance = $totalCountRow['total_attendance'];

        // Check for errors
        if (!$result) {
            die("Query failed: " . $db->error);
        }

        // Display the results
        while ($row = $result->fetch_assoc()) {
            $mark = ($row['attendance_count'] / $totalAttendance) * 100;
            if ($mark >= 90) {
                $final_mark = 10;
            } else if ($mark >= 85 && $mark < 90) {
                $final_mark = 9;
            } else if ($mark >= 80 && $mark < 85) {
                $final_mark = 8;
            } else if ($mark >= 75 && $mark < 80) {
                $final_mark = 7;
            } else if ($mark >= 70 && $mark < 75) {
                $final_mark = 6;
            } else if ($mark >= 60 && $mark < 70) {
                $final_mark = 5;
            } else if ($mark < 60) {
                $final_mark = 0;
            }
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['student_name'] . "</td>";
            echo "<td>" .  $row['attendance_count'] . "</td>";
            echo "<td>" . $final_mark . "</td>";
            echo "</tr>";
        }

        // Close the connection
        $db->close();

        ?>


    </table>
    <h3 class="footer"><a href="index.php">Go to Home Page</a></h3>

    <!-- for print opotion -->

    <button onclick="printPage()">Print</button>

    <script>
        function printPage() {
            window.print();
        }
    </script>
</body>

</html>