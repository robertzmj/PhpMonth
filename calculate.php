<!DOCTYPE html>
<html>
    <head>
        <!--Author: Minjie Zhu 000398494-->
        <meta charset="UTF-8">
        <title>Month calender</title>
        <style>
            *{
                margin: 0;
                padding: 0;
            }

            body{
                margin-left:4em;
                margin-right: 4em;
                font-family: verdana;

            }
            header{
                padding-top: 15px;
                padding-left: 1em;
                background-color: darkred;
                text-align: left;
                color: white;
                height: 50px;

            }


            table {
                margin: auto;
                border-collapse: collapse;
                border: 2px solid purple;
                
            }
            table td{
                border: 1px solid purple;
                height: 50px;
                text-align: center;
                width: 80px;

            }
            table th{
                background-color: purple;
                font-size: 0.7em;
                color: white;
                height: 30px;
            }
            footer{
                margin-top: 1em;
                padding-right: 1em;
                background-color: darkred;
                color: white;
                text-align: right;
                height: 30px;
            }
        </style>
        <!--<link rel="stylesheet" type="text/css" href="monthCalender.css">-->

    </head>
    <body>
        <header><?php
            $leapYear = 0;
            $janOrFeb = 0;
            if ($_POST['year'] % 400 == 0 ||
                    ($_POST['year'] % 4 == 0 && $_POST['year'] % 100 != 0)) {
                $leapYear = 1;
            }
            switch ($_POST['month']) {
                case 1:
                    $month = 'January';
                    $monthCode = 11;
                    $days = 31;
                    $janOrFeb = 1;
                    break;
                case 2:
                    $month = 'February';
                    $monthCode = 12;
                    $days = 28 + $leapYear;
                    $janOrFeb = 1;
                    break;
                case 3:
                    $month = 'March';
                    $monthCode = 1;
                    $days = 31;
                    break;
                case 4:
                    $month = 'April';
                    $monthCode = 2;
                    $days = 30;
                    break;
                case 5:
                    $month = 'May';
                    $monthCode = 3;
                    $days = 31;
                    break;
                case 6:
                    $month = 'June';
                    $monthCode = 4;
                    $days = 30;
                    break;
                case 7:
                    $month = 'July';
                    $monthCode = 5;
                    $days = 31;
                    break;
                case 8:
                    $month = 'August';
                    $monthCode = 6;
                    $days = 31;
                    break;
                case 9:
                    $month = 'September';
                    $monthCode = 7;
                    $days = 30;
                    break;
                case 10:
                    $month = 'October';
                    $monthCode = 8;
                    $days = 31;
                    break;
                case 11:
                    $month = 'November';
                    $monthCode = 9;
                    $days = 30;
                    break;
                case 12:
                    $month = 'December';
                    $monthCode = 10;
                    $days = 31;
                    break;
                default:
                    break;
            }
            echo $month . " " . $_POST['year'];
            ?></header>
    </table>
    <br>
    <table>
        <thead>
            <tr>
                <th>Sunday</th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
                <th>Saturday</th>
            </tr>
        </thead>
        <?php
        // Zeller's congruence
        $firstDay = (1 + (int) ((13 * $monthCode - 1) / 5) + ($_POST['year'] - $janOrFeb) % 100 + (int) ((($_POST['year'] - $janOrFeb) % 100) / 4) + (int) ((int) (($_POST['year'] - $janOrFeb) / 100) / 4) + (int) (($_POST['year'] - $janOrFeb) / 100) * 5) % 7;
        $buffer = null;
        echo "<tr>";
        for ($i = 0; $i < 7; $i++) {
            if ($i >= $firstDay) {
                $buffer = 1 + $i - $firstDay;
            }
            echo "<td>" . $buffer . "</td>";
        }
        echo "</tr>";
        for ($i = 0; $i < 6; $i++) {
            if ($buffer == null) {
                break;
            }
            echo "<tr>";
            for ($j = 0; $j < 7; $j++) {
                if ($buffer != null) {
                    $buffer++;
                }
                echo "<td>" . $buffer . "</td>";
                if ($buffer == $days) {
                    $buffer = null;
                }
            }
            echo "</tr>";
        }
        ?>

    </table>
    <footer> Zeller's congruence</footer>

</body>
</html>
