<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Attendance System</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <style>
        body {

            font-family: Georgia, 'Times New Roman', Times, serif;

        }

        header {
            color:#E3242B ;
            /* background: #; */
        }

        #logo {
            height: 160px;
            width: 160px;
        }
        #logo2{
            height: 160px;
            width: 170px;
        }

        .main {
            background:#F5FEFD;
        }

        .attendancesheet {
            margin: auto;
        }
        .btndiv{
            display: flex;
            justify-content: space-around;
        }

        .attendance {
            border-radius: 8px;
            border-color: #8AAAE5;
            /* margin-left: 50%; */
            border-radius: 8px;
            background:#89CFEF;
            margin-bottom: 20px;
        }
        .attendance >a{
            color: #F5FEFD;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <header class=" text-center mb-3 py-3">

            <div class="row">
                <div class="col col-lg-2"><img id="logo" src="image/bsfmstu.png" alt=""></div>
                <div class="col-md-auto">
                    <h1>SMART ATTENDANCE MANAGEMENT SYSTEM!</h1>
                    <h3>STUDENTS ATTENDANCE OF MONTH: <u><?php echo strtoupper(date("F")); ?></u></h3>

                </div>
                <div class="col col-lg-2">
                    <img id="logo2" src="image/cse.jpg" alt="">
                </div>
            </div>


        </header>

        <div class="main">
            <div class="row">
                <div class="attendancesheet">
                    <?php require_once("SmartAttendanceSheet.php");

                    ?>
                    <br>

                        <div class="btndiv">
                        <button class="attendance"><a href="addAttendance.php">Attendance</a></button>
                        <button class="attendance"><a href="marks.php">Marks</a></button>
                        </div>

                    

                </div>






            </div>
        </div>
    </div>

    <!-- <a id="marks" href="marks.html">Marks</a> -->





    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>