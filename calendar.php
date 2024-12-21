<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calendar with Date Search</title>
    <link rel="stylesheet" href="design.css">
</head>
<body>


<div class="calendar-container">
        <button class="new-task"><a href="createTask.php">Add New Task</a></button>
        <form method="GET" class="search-form">
            <input type="text" name="search_date" placeholder="Enter date (dd/mm/yyyy)" required>
            <button type="submit">Search</button>
        </form>

        <div class="calendar-header">
            <?php
                $month = $_GET['month'] ?? date('m');
                $year = $_GET['year'] ?? date('Y');

                $searched_day = null;
                $today_day = date('d');
                $today_month = date('m');
                $today_year = date('Y');

                // Validate and process search date
                if (!empty($_GET['search_date'])) {
                    if (preg_match('/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/', $_GET['search_date'], $matches)) {
                        $searched_day = $matches[1];
                        $month = $matches[2];
                        $year = $matches[3];
                    } else {
                        echo '<p class="error">Invalid date format. Please use dd/mm/yyyy.</p>';
                    }
                }

                $month_names = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                $prev_month = $month - 1 ?: 12;
                $next_month = $month == 12 ? 1 : $month + 1;
                $prev_year = $prev_month == 12 ? $year - 1 : $year;
                $next_year = $next_month == 1 ? $year + 1 : $year;

                echo '<button><a href="?month=' . $prev_month . '&year=' . $prev_year . '">◄</a></button>';
                echo '<h2>' . $month_names[$month - 1] . ' ' . $year . '</h2>';
                echo '<button><a href="?month=' . $next_month . '&year=' . $next_year . '">►</a></button>';
            ?>
        </div>

        <div class="calendar-grid">
            <div class="day">Sun</div>
            <div class="day">Mon</div>
            <div class="day">Tue</div>
            <div class="day">Wed</div>
            <div class="day">Thu</div>
            <div class="day">Fri</div>
            <div class="day">Sat</div>

            <?php
                $first_day_of_month = mktime(0, 0, 0, $month, 1, $year);
                $total_days = date('t', $first_day_of_month);
                $start_day_of_week = date('w', $first_day_of_month);

                for ($i = 0; $i < $start_day_of_week; $i++) {
                    echo '<div class="day-cell inactive"></div>';
                }

                for ($day = 1; $day <= $total_days; $day++) {
                    $class = "day-cell";

                    if ($day == $today_day && $month == $today_month && $year == $today_year) {
                        $class .= " highlighted"; // Highlight today
                    }

                    if ($day == $searched_day) {
                        $class .= " searched"; // Highlight searched day
                    }

                    echo '<div class="' . $class . '">' . $day . '</div>';
                }
            ?>
        </div>
    </div>
</body>
</html>



