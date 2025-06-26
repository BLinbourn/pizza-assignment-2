<?php

    include_once 'dashboard_header.php';
    include_once '../functions/dbh-inc.php';
    include_once '../functions/func-inc.php';

?>
<main>
    <form id="times" action="../functions/times-inc.php" method="post">
        <label for="day">Day</label>
        <input type="text" id="day" name="day" readonly>
        <label for="closingTime">Opening Time</label>
        <input type="time" id="openingTime" name="openingTime" step="15:00" required>
        <label for="closingTime">Closing Time</label>
        <input type="time" id="closingTime" name="closingTime" required>
        <input type="hidden" id="closed" name="closed" value=0>
        <label for="closed">Closed</label>
        <input type="checkbox" id="closed" name="closed" value=1>
        <button type="submit" name="editTime">Submit</button>
    </form>

    <table>
        <tr>
            <th>Day</th>
            <th>Opening Time</th>
            <th>Closing Time</th>
            <th>Closed</th>
            <th></th>
        </tr>
        <?php
            $timeInfo = getAllTimeInfo($conn);

            foreach ($timeInfo as $times) {

                $closed = 'Closed';

                if ($times['closed'] == 0) {
                    $closed = 'Open';
                }

                $day = $times['day'];

                echo "
                <tr>
                    <td>{$day}</td>
                    <td>{$times['openingtime']}</td>
                    <td>{$times['closingtime']}</td>
                    <td>{$closed}</td>
                    <td><button onclick='editTime(\"$day\")'>Edit</button></td>
                </tr>
                ";
            }
        ?>
    </table>
</main>

<?php

include_once 'dashboard_footer.php';

?>