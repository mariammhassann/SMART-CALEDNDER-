<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Calendar </title>
    <link rel="stylesheet" href="css/design.css">

</head>
<body>


<div class="calendar-container">


        <form method="GET" class="search-form">
            <input type="text" name="search_date" placeholder="Enter date (dd/mm/yyyy)" required>
            <button type="submit">Search</button>
        </form>

        <div class="calendar-header">
            <?php
           
            if (isset($_GET['month']) && isset($_GET['year'])) {
                $month = $_GET['month'];
                $year = $_GET['year'];
            } else {
                $month = date('m');  
                $year = date('Y');   
            }

            
            $day_to_highlight = null;

            
            $today_day = date('d');
            $today_month = date('m');
            $today_year = date('Y');

            
            if (isset($_GET['search_date'])) {
                $search_input = trim($_GET['search_date']);
              
                if (preg_match('/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/', $search_input, $matches)) {
                    $day_to_highlight = $matches[1];  
                    $month = $matches[2];             
                    $year = $matches[3];              
                } else {
                    echo '<p class="error">Invalid date format. Please enter a valid date (dd/mm/yyyy).</p>';
                }
            } else {
               
                if ($month == $today_month && $year == $today_year) {
                    $day_to_highlight = $today_day; 
                }
            }

            
            $prev_month = $month - 1;
            $next_month = $month + 1;
            $prev_year = $year;
            $next_year = $year;

            if ($prev_month == 0) {
                $prev_month = 12;
                $prev_year--;
            }

            if ($next_month == 13) {
                $next_month = 1;
                $next_year++;
            }

           
            $month_names = ["January", "February", "March", "April", "May", "June", 
                            "July", "August", "September", "October", "November", "December"];
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
            $total_days_of_month = date('t', $first_day_of_month);
            $start_day_of_week = date('w', $first_day_of_month);  
           
            for ($i = 0; $i < $start_day_of_week; $i++) {
                echo '<div class="day-cell inactive"></div>';
            }

          
            for ($day = 1; $day <= $total_days_of_month; $day++) {
                $class = 'day-cell';

         
                if (isset($day_to_highlight) && $day == $day_to_highlight) {
                    $class .= ' highlighted';
                }

                echo '<div class="' . $class . '">' . $day . '</div>';
            }
            ?>
        </div>

<br>
<br>
      
        <button class=new-task><a href="createTask.php">Add Task</a></button>
     

    </div>
</body>
</html>

