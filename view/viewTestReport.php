<?php
session_start();
if(!isset($_SESSION['username']) and !isset($_SESSION['password'])){
    header("location:../view/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMS | Test Report</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            color:white;
        }

        th, td {
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            color:black;
        }

        th{
            color:white;
            background-color:gray;
            font-size:20px;
        }

        td{
            font-size:20px
        }

        tr:hover {background-color: gray;}
    </style>
</head>
<body style="padding-right:7rem;padding-left:7rem;">
<!-- header -->
<?php require "../model/_nav.php";?>
    <main>
        <section>
            <?php require "../control/testReportAction.php"; ?>
        </section>
    </main>
    <!-- footer -->
    <?php include "../model/footer.php"; ?>
</body>
</html>