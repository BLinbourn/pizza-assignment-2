<?php

    include_once 'dashboard_header.php';
    include_once '../functions/dbh-inc.php';
    include_once '../functions/func-inc.php';

?>

    <form action="../functions/times-inc.php" method="post">
        <label for="day">Day</label>
        <input type="text" id="day" name="day" readonly>
        <label for="closingTime">Opening Time</label>
        <input type="time" id="openingTime" name="openingTime" step="15:00" required>
        <label for="closingTime">Closing Time</label>
        <input type="time" id="closingTime" name="closingTime" required>
        <input type="hidden" id="closed" name="closed" value=0>
        <input type="checkbox" id="closed" name="closed" value=1>
        <label for="closed">Closed</label>
        <button type="submit" name="editTime">Submit</button>
    </form>

    <table>
        <tr>
            <td>Day</td>
            <td>Opening Time</td>
            <td>Closing Time</td>
            <td>Closed</td>
        </tr>
        <?php
            $timeInfo = getAllTimeInfo($conn);

            foreach ($timeInfo as $times) {

                $day = $times['day'];

                echo "
                <tr>
                    <td>{$day}</td>
                    <td>{$times['openingtime']}</td>
                    <td>{$times['closingtime']}</td>
                    <td>{$times['closed']}</td>
                    <td><button onclick='editTime(\"$day\")'>Edit</button></td>
                </tr>
                ";
            }
        ?>
    </table>

<?php

include_once 'dashboard_footer.php';

?>