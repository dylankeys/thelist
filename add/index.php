<html>
<head>
   <title>The list</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <link rel="stylesheet" href="../styles.css">
   <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="icon" href="../images/favicon.gif" type="image/gif">

   <script>
      function rating(number){
         var rating = number;

         if (rating > 0){
            document.getElementById('rating').value = rating;
            document.getElementById('rating-form').submit();
         }
      }
      function count(number) {
         var count = number;
         document.getElementById('count').innerHTML = count;
      }
   </script>
   <?php
      include ("../dbConnect.php");
   ?>
</head>
<body class="w3-light-grey">

<!-- Navigation Bar -->
   <div class="w3-bar w3-white w3-border-bottom w3-xlarge">
      <a href="http://list.dylankeys.com" class="w3-bar-item w3-text-red"><img src="../images/logo.png" style="padding:5px;margin-top:-5px" height="50px" alt="logo" /></a>
      <a href="#" class="w3-bar-item w3-right w3-text-grey dk-search"><i class="fa fa-search fa-lg"></i></a>
      <a href="#" class="w3-bar-item w3-right w3-text-grey dk-add"><i class="fa fa-cog fa-lg"></i></a>
      <a href="http://list.dylankeys.com/add" class="w3-bar-item w3-right w3-text-grey dk-add"><i class="fa fa-plus fa-lg"></i></a>
      <a href="http://list.dylankeys.com" class="w3-bar-item w3-right w3-text-grey dk-add"><i class="fa fa-home fa-lg"></i></a>
   </div>

   <br>

   <?php if (isset($_POST["rating"])) {
      $rating = $_POST["rating"];
      $title = $_POST["rating-title"];

      $dbQuery=$db->prepare("insert into list values(null,:title,:rating,0)");
      $dbParams=array('title'=>$title,'rating'=>$rating);
      $dbQuery->execute($dbParams);

      //unset($_SESSION["title"]);

      echo '<div style="width:50%;text-align:center;margin: 0 auto;" class="w3-panel w3-green w3-display-container">
               <span onclick="this.parentElement.style.display=\'none\'" class="w3-button w3-green w3-large w3-display-topright">&times;</span>
               <h3>Success!</h3>
               <p>Your rating has been added to the list.<br>Test: '.$rating.'</p>
            </div>';
   } ?>

   <?php if (!isset($_POST["title"])) {?>
   <div class="title-div">
      <form id="title-form" method="post" action="index.php">
         <label for="title">Enter a title to rate:</label><br>
         <input type="text" placeholder="Title" name="title" />
         <input type="submit" style="display:none"/>
      </form>
   </div>
   <?php }else {
      $title = $_POST["title"];
      echo "<p class='title-display'>". $title ."</p>";

      echo'<div class="rating-div">
         <form id="rating-form" method="post" action="index.php">
            <input id="rating" type="hidden" value="0" name="rating" />
            <input id="rating-title" type="hidden" value="'. $title .'" name="rating-title" />
            <a href="#" onmouseover="count(10)" onclick="rating(10)">☆</a>
            <a href="#" onmouseover="count(9)" onclick="rating(9)">☆</a>
            <a href="#" onmouseover="count(8)" onclick="rating(8)">☆</a>
            <a href="#" onmouseover="count(7)" onclick="rating(7)">☆</a>
            <a href="#" onmouseover="count(6)" onclick="rating(6)">☆</a>
            <a href="#" onmouseover="count(5)" onclick="rating(5)">☆</a>
            <a href="#" onmouseover="count(4)" onclick="rating(4)">☆</a>
            <a href="#" onmouseover="count(3)" onclick="rating(3)">☆</a>
            <a href="#" onmouseover="count(2)" onclick="rating(2)">☆</a>
            <a href="#" onmouseover="count(1)" onclick="rating(1)">☆</a>
         </form>
         <p id="count" class="title-display">0</p><p class="title-display">/10</p>
      </div>';
   }?>

</body>
</html>
