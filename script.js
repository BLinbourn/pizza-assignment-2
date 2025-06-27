// Show and hide questions for menu.

let menuMain = document.getElementById("menuItems");

if (menuMain) {

    let newItemButton = document.getElementById("newItem");
    let menuForm = document.getElementById("menu");
    let menuUpdateButton = document.getElementsByName('updateMenuItem');
    let menuUpdateButtons = document.getElementsByName('editMenuItems');
    let menuAddButton = document.getElementsByName('addMenuItem');

    newItemButton.addEventListener('click', function (){
        showMenuForm(); 
    });

    for (var i = 0 ; i < menuUpdateButton.length; i++) {
        menuUpdateButton[i].addEventListener('click', function (){
            menuForm.style.display = 'none';
        });
    }

    for (var i = 0 ; i < menuUpdateButtons.length; i++) {
        menuUpdateButtons[i].addEventListener('click', function (){
            updateMenuForm();
        });
    }

    function showMenuForm() {
        menuForm.style.display = 'grid';
        newItemButton.style.display = 'none';
    }

    function updateMenuForm() {
        menuForm.style.display = 'grid';
        menuUpdateButton[0].style.display = 'grid';
        newItemButton.style.display = 'none';
        menuAddButton[0].style.display = 'none';
    }

    function editMenu(title, description, price, category, specialCondition) {
        menuForm.style.display = 'grid';

        // inputs
        titleInput = document.getElementsByName("title");
        categoryInput = document.getElementsByName("food_category");
        descriptionInput = document.getElementsByName("description");
        priceInput = document.getElementsByName("price");
        specialConditionInput = document.getElementsByName("specialCondition");

        // set values
        titleInput.value = (title);
        categoryInput.value = (category);
        descriptionInput.value = (description);
        priceInput.value = (price);
        specialConditionInput.value = (specialCondition);

        // Set to readonly
        titleInput.readOnly = true;

    }
}

// Opening Times Page

let timeMain = document.getElementById("timeMain");

if (timeMain) {

    let timeButtons = document.getElementsByName('editTime');
    let timeForm = document.getElementById("times");

    function editTime(day) {
        timeForm.style.display = 'grid';

        input = document.getElementById("day");
        input.value = (day);
    }

    for (var i = 0 ; i < timeButtons.length; i++) {
        timeButtons[i].addEventListener('click', function (){
            timeForm.style.display = 'none';
        });
    }
}