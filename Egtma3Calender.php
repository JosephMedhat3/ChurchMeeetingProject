<?php
$egtma3_id=$_GET['egtID'];
$userT=$_GET['userT'];
$userN=$_GET['userN'];
$userTN=$_GET['userTN'];
$userID=$_GET['userID'];
// Set your timezone
date_default_timezone_set('Africa/Cairo');

// Get prev & next month
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    // This month
    $ym = date('Y-m');
}

// Check format
$timestamp = strtotime($ym . '-01');
if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}

// Today
$today = date('Y-m-j', time());

// For H3 title
$html_title = date('Y / M', $timestamp);
// Create prev & next month link     mktime(hour,minute,second,month,day,year)
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));
// You can also use strtotime!
// $prev = date('Y-m', strtotime('-1 month', $timestamp));
// $next = date('Y-m', strtotime('+1 month', $timestamp));

// Number of days in the month
$day_count = date('t', $timestamp);
 
// 0:Sun 1:Mon 2:Tue ...
$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
//$str = date('w', $timestamp);


// Create Calendar!!
$weeks = array();
$week = '';

// Add empty cell
$week .= str_repeat('<td></td>', $str);

for ( $day = 1; $day <= $day_count; $day++, $str++) {
     
    $date = $ym . '-' . $day;

    if($userT!=4)
    {
        if ($today == $date) {
            $week .= "<td class='today'> <a href='Egtma3Date.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."&id=".$egtma3_id."&day=".$day."&month=".$html_title."'</a>" . $day;
        } else {
            $week .= "<td>               <a href='Egtma3Date.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."&id=".$egtma3_id."&day=".$day."&month=".$html_title."'</a>" . $day;
        }
    }
    else
    {
        if ($today == $date) {
            $week .= "<td class='today'> <a href='Egtma3Date.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."&id=".$egtma3_id."&day=".$day."&month=".$html_title."'</a>" . $day;
        } else {
            $week .= "<td>". $day;
        }
    }
    //....................................




    $week .= '</td>';
     
    // End of the week OR End of the month
    if ($str % 7 == 6 || $day == $day_count) {

        if ($day == $day_count) {
            // Add empty cell
            $week .= str_repeat('<td></td>', 6 - ($str % 7));
        }

        $weeks[] = '<tr>' . $week . '</tr>';

        // Prepare for new week
        $week = '';
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP Calendar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    <style>
        .container {
            font-family: 'Noto Sans', sans-serif;
            margin-top: 80px;
        }
        h3 {
            margin-bottom: 30px;
        }
        th {
            height: 30px;
            text-align: center;
        }
        td {
            height: 100px;
        }
        .today {
            background: orange;
        }
        th:nth-of-type(1), td:nth-of-type(1) {
            color: red;
        }
        th:nth-of-type(7), td:nth-of-type(7) {
            color: blue;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3><a href="?ym=<?php echo $prev; ?> &userN= <?php echo $userN; ?> &userT= <?php echo $userT; ?> &userTN= <?php echo $userTN; ?>&userID=<?php echo $userID; ?> &egtID=<?php echo $egtma3_id; ?>">&lt;</a> 
        <?php echo $html_title; ?> 
            <a href="?ym=<?php echo $next; ?>&userN= <?php echo $userN; ?> &userT= <?php echo $userT; ?> &userTN= <?php echo $userTN; ?>&userID=<?php echo $userID; ?> &egtID=<?php echo $egtma3_id; ?>">&gt;</a></h3>
        <table class="table table-bordered">
            <tr>
                <th>Sun</th>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thr</th>
                <th>Fri</th>
                <th>Sat</th>
            </tr>
            <?php
                foreach ($weeks as $week) {
                    echo $week;
                }
            ?>
        </table>
        <?php echo"<a href='ViewEgtma3Record.php? userN=".$userN."&userT=".$userT."&userTN=".$userTN."&userID=".$userID."&id=".$egtma3_id."' class='btn btn-primary'>back</a>";?>
    </div>

</body>
</html>
