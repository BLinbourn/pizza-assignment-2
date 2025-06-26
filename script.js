// Show and hide questions for menu.

let menuMain = document.getElementById("menuItems");

if (menuMain) {

    let newItemButton = document.getElementById("newItem");
    let menuForm = document.getElementById("menu");

    newItemButton.addEventListener('click', function (){
        showMenuForm(); 
    });

    function showMenuForm() {
        menuForm.style.display = 'grid';
        newItemButton.style.display = 'none';
    }
}

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