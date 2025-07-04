<?php
    require_once 'functions/dbh-inc.php';
    require_once 'functions/func-inc.php';

    $menuItems = getAllMenuItems($conn);

    $specialInfo = '';
?>

<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<style>
body, html {height: 100%}
body,h1,h2,h3,h4,h5,h6 {font-family: "Amatic SC", sans-serif}
.menu {display: none}
.bgimg {
  background-repeat: no-repeat;
  background-size: cover;
  background-image: url("img/pizza.jpg");
  min-height: 90%;
}
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top w3-hide-small">
  <div class="w3-bar w3-xlarge w3-black w3-opacity w3-hover-opacity-off" id="myNavbar">
    <a href="#" class="w3-bar-item w3-button">HOME</a>
    <a href="#menu" class="w3-bar-item w3-button">MENU</a>
    <a href="#about" class="w3-bar-item w3-button">ABOUT</a>
    <a href="#myMap" class="w3-bar-item w3-button">CONTACT</a>
    <a href="pages/login.php" class="w3-bar-item w3-button">LOGIN</a>
  </div>
</div>
  
<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-bottomleft w3-padding">
    <span class="w3-tag w3-xlarge">Open from 10am to 12pm</span>
  </div>
  <div class="w3-display-middle w3-center">
    <span class="w3-text-white w3-hide-small" style="font-size:100px">thin<br>CRUST PIZZA</span>
    <span class="w3-text-white w3-hide-large w3-hide-medium" style="font-size:60px"><b>thin<br>CRUST PIZZA</b></span>
    <p><a href="#menu" class="w3-button w3-xxlarge w3-black">Let me see the menu</a></p>
  </div>
</header>

<!-- Menu Container -->
<div class="w3-container w3-black w3-padding-64 w3-xxlarge" id="menu">
  <div class="w3-content">
  
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">THE MENU</h1>
    <div class="w3-row w3-center w3-border w3-border-dark-grey">
      <a href="javascript:void(0)" onclick="openMenu(event, 'Pizza');" id="myLink">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Pizza</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'Pasta');">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Salads</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'Starter');">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Starter</div>
      </a>
    </div>

    <div id="Pizza" class="w3-container menu w3-padding-32 w3-white">
      <?php
        foreach ($menuItems as $menuItem) {
          $price = number_format((float)$menuItem['price'], 2, '.', '');

          switch ($menuItem['specialCondition']) {
            case ("New"):
              $specialInfo = "<span class='w3-tag w3-grey w3-round'>New</span>";
              break;
            case ("Popular"):
              $specialInfo = "<span class='w3-tag w3-grey w3-round'>Popular</span>";
              break;
            case ("Hot"):
              $specialInfo = "<span class='w3-tag w3-red w3-round'>Hot!</span>";
              break;
            case ("Seasonal"):
              $specialInfo = "<span class='w3-tag w3-grey w3-round'>Seasonal</span>";
              break;
            case (""):
              $specialInfo = "";
              break;
          }

          if ($menuItem['category'] == 'Pizza') {
            echo "
              <h1><b>{$menuItem['title']}</b> {$specialInfo} <span class='w3-right w3-tag w3-dark-grey w3-round'>£{$price}</span></h1>
              <p class='w3-text-grey'>{$menuItem['description']}</p>
            ";
          }
        }
      ?>
    </div>

    <div id="Pasta" class="w3-container menu w3-padding-32 w3-white">
      <?php
        foreach ($menuItems as $menuItem) {
          $price = number_format((float)$menuItem['price'], 2, '.', '');

          switch ($menuItem['specialCondition']) {
            case ("New"):
              $specialInfo = "<span class='w3-tag w3-grey w3-round'>New</span>";
              break;
            case ("Popular"):
              $specialInfo = "<span class='w3-tag w3-grey w3-round'>Popular</span>";
              break;
            case ("Hot"):
              $specialInfo = "<span class='w3-tag w3-red w3-round'>Hot!</span>";
              break;
            case ("Seasonal"):
              $specialInfo = "<span class='w3-tag w3-grey w3-round'>Seasonal</span>";
              break;
            case (""):
              $specialInfo = "";
              break;
          }

          if ($menuItem['category'] == 'Salad') {
            echo "
              <h1><b>{$menuItem['title']}</b> {$specialInfo} <span class='w3-right w3-tag w3-dark-grey w3-round'>£{$price}</span></h1>
              <p class='w3-text-grey'>{$menuItem['description']}</p>
            ";
          }
        }
      ?>
    </div>


    <div id="Starter" class="w3-container menu w3-padding-32 w3-white">
      <?php
        foreach ($menuItems as $menuItem) {
          $price = number_format((float)$menuItem['price'], 2, '.', '');

          switch ($menuItem['specialCondition']) {
            case ("New"):
              $specialInfo = "<span class='w3-tag w3-grey w3-round'>New</span>";
              break;
            case ("Popular"):
              $specialInfo = "<span class='w3-tag w3-grey w3-round'>Popular</span>";
              break;
            case ("Hot"):
              $specialInfo = "<span class='w3-tag w3-red w3-round'>Hot!</span>";
              break;
            case ("Seasonal"):
              $specialInfo = "<span class='w3-tag w3-grey w3-round'>Seasonal</span>";
              break;
            case (""):
              $specialInfo = "";
              break;
          }

          if ($menuItem['category'] == 'Starter') {
            echo "
              <h1><b>{$menuItem['title']}</b> {$specialInfo} <span class='w3-right w3-tag w3-dark-grey w3-round'>£{$price}</span></h1>
              <p class='w3-text-grey'>{$menuItem['description']}</p>
            ";
          }
        }
      ?>
    </div><br>

  </div>
</div>

<!-- About Container -->
<div class="w3-container w3-padding-64 w3-red w3-grayscale w3-xlarge" id="about">
  <div class="w3-content">
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">About</h1>
    <p>The Pizza Restaurant was founded in blabla by Mr. Italiano in lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    <p><strong>The Chef?</strong> Mr. Italiano himself<img src="img/chef.jpg" style="width:150px" class="w3-circle w3-right" alt="Chef"></p>
    <p>We are proud of our interiors.</p>
    <img src="img/onepage_restaurant.jpg" style="width:100%" class="w3-margin-top w3-margin-bottom" alt="Restaurant">
    <h1><b>Opening Hours</b></h1>
    
    <div class="w3-row">
      <div class="w3-col s6">
        <?php
          $timeInfo = getAllTimeInfo($conn);

            foreach ($timeInfo as $times) {
              if ($times['day'] == 'Monday' || $times['day'] == 'Tuesday' || $times['day'] == 'Wednesday' || $times['day'] == 'Thrusday') {
                if ($times['closed'] == 1) {
                  echo "
                    <p>{$times['day']}: <span>Closed</span></p>
                  ";
                } else {
                  echo "
                    <p>{$times['day']}: <span>{$times['openingtime']}</span> - <span>{$times['closingtime']}</span></p>
                  ";
                }
              }
            }
        ?>
      </div>
      <div class="w3-col s6">
        <?php
          $timeInfo = getAllTimeInfo($conn);

            foreach ($timeInfo as $times) {
              if ($times['day'] == 'Friday' || $times['day'] == 'Saturday' || $times['day'] == 'Sunday') {
                if ($times['closed'] == 1) {
                  echo "
                    <p>{$times['day']}: <span>Closed</span></p>
                  ";
                } else {
                  echo "
                    <p>{$times['day']}: <span>{$times['openingtime']}</span> - <span>{$times['closingtime']}</span></p>
                  ";
                }
              }
            }
        ?>
      </div>
    </div>
    
  </div>
</div>

<!-- Image of location/map -->
<img src="img/map.jpg" class="w3-image w3-greyscale" style="width:100%;" id="myMap">

<!-- Contact -->
<div class="w3-container w3-padding-64 w3-blue-grey w3-grayscale-min w3-xlarge">
  <div class="w3-content">
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">Contact</h1>
    <p>Find us at some address at some place or call us at 05050515-122330</p>
    <p><span class="w3-tag">FYI!</span> We offer full-service catering for any event, large or small. We understand your needs and we will cater the food to satisfy the biggerst criteria of them all, both look and taste.</p>
    <p class="w3-xxlarge"><strong>Reserve</strong> a table, ask for today's special or just send us a message:</p>
    <form action="functions/contact-inc.php" method="post">
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="number" placeholder="How many people" required name="People"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="datetime-local" placeholder="Date and time" required name="date" value="2025-06-21T20:00"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Message \ Special requirements" name="Message"></p>
      <p><button class="w3-button w3-light-grey w3-block" type="submit" name="customerMessage">SEND MESSAGE</button></p>
    </form>
  </div>
</div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-48 w3-xxlarge">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

<script>
// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-red";
}
document.getElementById("myLink").click();
</script>

</body>
</html>
