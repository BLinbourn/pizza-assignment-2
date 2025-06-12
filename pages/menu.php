<?php
    include_once 'dashboard_header.php';
    include_once '../functions/dbh-inc.php';
    include_once '../functions/func-inc.php';
?>

    <h3>Edit your menu here!</h3>
    <form action="../functions/menu-inc.php" method="post">
        <label>Category</label>
        <input type="radio" id="pizza" name="food_category" value="Pizza" required>
        <label for="pizza">Pizza</label>
        <input type="radio" id="salad" name="food_category" value="Salad" required>
        <label for="salad">Salads</label>
        <input type="radio" id="starter" name="food_category" value="Starter" required>
        <label for="starter">Starter</label>
        <label>Title</label>
        <input type="text" name="title" placeholder="Menu Item Title" required>
        <label>Description</label>
        <input type="text" name="description" placeholder="Menu Item Desciption" required>
        <label>Price</label>
        <input type="number" name="price" placeholder="10.99" step=".01" required>
        <label>Special Condition</label>
        <input type="radio" id="hot" name="specialCondition" value="Hot">
        <label for="hot">Hot</label>
        <input type="radio" id="seasonal" name="specialCondition" value="Seasonal">
        <label for="seasonal">Seasonal</label>
        <input type="radio" id="popular" name="specialCondition" value="Popular">
        <label for="popular">Popular</label>
        <input type="radio" id="new" name="specialCondition" value="New">
        <label for="new">New</label>
        <button type="submit" name="addMenuItem">Add Item</button>
    </form>

    <?php
        if (isset($_GET["error"])) {
            switch ($_GET["error"]) {
                case ("emptyinput"):
                    echo "Please fill in the required fields";
                    break;
            }
        }
    ?>

    <table>
        <tr>
            <td>Category</td>
            <td>Title</td>
            <td>Description</td>
            <td>Price</td>
            <td>Special Condition</td>
        </tr>
        <?php
            $menuItems = getAllMenuItems($conn);
            foreach ($menuItems as $menuItem) {
                $price = number_format((float)$menuItem['price'], 2, '.', '');

                echo "
                <tr>
                    <td>{$menuItem['category']}</td>
                    <td>{$menuItem['title']}</td>
                    <td>{$menuItem['description']}</td>
                    <td>{$price}</td>
                    <td>{$menuItem['specialCondition']}</td>
                </tr>
                ";
            }
        ?>
    </table>
<?php

include_once 'dashboard_footer.php';

?>