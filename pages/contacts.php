<?php

    include_once 'dashboard_header.php';
    include_once '../functions/dbh-inc.php';
    include_once '../functions/func-inc.php';

?>
<main>

    <h2>Booking Requests</h2>

    <table id="messages">
        <tr>
            <th>Name</th>
            <th>Number of People</th>
            <th>Date and Time</th>
            <th>Message</th>
        </tr>
        <?php
            $contactInfo = getAllContactInfo($conn);

            foreach ($contactInfo as $contacts) {

                $datetime = strtotime($contacts['datetime']);
                $datetime = date('d.m.Y H:i', $datetime);

                $name = htmlspecialchars($contacts['name']);
                $message = htmlspecialchars($contacts['message']);
                echo "
                <tr>
                    <td>{$name}</td>
                    <td>{$contacts['nopeople']}</td>
                    <td>{$datetime}</td>
                    <td>{$message}</td>
                </tr>
                ";
            }
        ?>
    </table>
</main>

<?php

include_once 'dashboard_footer.php';

?>