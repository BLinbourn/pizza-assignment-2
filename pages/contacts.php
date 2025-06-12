<?php

    include_once 'dashboard_header.php';
    include_once '../functions/dbh-inc.php';
    include_once '../functions/func-inc.php';

?>

    <table>
        <tr>
            <td>Name</td>
            <td>Number of People</td>
            <td>Date and Time</td>
            <td>Message</td>
        </tr>
        <?php
            $contactInfo = getAllContactInfo($conn);

            foreach ($contactInfo as $contacts) {

                $datetime = strtotime($contacts['datetime']);
                $datetime = date('d.m.Y H:i', $datetime);

                echo "
                <tr>
                    <td>{$contacts['name']}</td>
                    <td>{$contacts['nopeople']}</td>
                    <td>{$datetime}</td>
                    <td>{$contacts['message']}</td>
                </tr>
                ";
            }
        ?>
    </table>

<?php

include_once 'dashboard_footer.php';

?>