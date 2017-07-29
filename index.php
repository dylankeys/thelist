<html>
<head>
   <title>The list</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="icon" href="images/favicon.gif" type="image/gif">
   <link rel="stylesheet" href="styles.css">

   <script>
      function rating(number){
         var rating = number;

         if (rating > 0){
            document.getElementById('rating').value = rating;
            document.getElementById('rating-form').submit();
         }
      }
   </script>
   <?php include ("dbConnect.php"); ?>
</head>
<body class="w3-light-grey">

<!-- Navigation Bar -->
   <div class="w3-bar w3-white w3-border-bottom w3-xlarge">
      <a href="http://list.dylankeys.com" class="w3-bar-item w3-text-red"><img src="images/logo.png" style="padding:5px;margin-top:-5px" height="50px" alt="logo" /></a>
      <a href="#" class="w3-bar-item w3-right w3-text-grey dk-search"><i class="fa fa-search fa-lg"></i></a>
      <a href="#" class="w3-bar-item w3-right w3-text-grey dk-add"><i class="fa fa-cog fa-lg"></i></a>
      <a href="http://list.dylankeys.com/add" class="w3-bar-item w3-right w3-text-grey dk-add"><i class="fa fa-plus fa-lg"></i></a>
      <a href="http://list.dylankeys.com" class="w3-bar-item w3-right w3-text-grey dk-add"><i class="fa fa-home fa-lg"></i></a>
   </div>

   <br>
   <button class="w3-button w3-gray">all</i></button>
   <button class="w3-button w3-gray">films</i></button>
   <button class="w3-button w3-gray">tvshows</i></button>

   <br><br>

   <!-- The list -->
   <div>
      <table style="margin: 0 auto;width:50%;" class="w3-table-all w3-hoverable w3-large w3-card-4">
         <?php
            //load each list item
            $dbQuery=$db->prepare("select * from list where `deleted`=0 order by rating desc, title asc");
            //$dbParams=array('id'=>$id);
            $dbQuery->execute();
            //$votecount=$dbQuery->rowCount();

            while ($dbRow = $dbQuery->fetch(PDO::FETCH_ASSOC))
            {
              $title=$dbRow["title"];
              $rating=$dbRow["rating"];

              if ($rating == 10)
              {
                 $colour = "color:#e8d003";
              }
              else {
                 $colour = "";
              }

            echo "<tr><td style='".$colour."'>".$title."</td><td style='".$colour."'>".$rating."/10</td></tr>";
            }
         ?>
      </table>
   </div>

</body>
</html>
