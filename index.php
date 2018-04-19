<?php
session_start();
$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"x-api-key: [You_Gota_Get_A_Key_And_Paste_It_Here_Thx]"

  )
);

$context = stream_context_create($opts);

// Open the file using the HTTP headers set above
$file = file_get_contents('http://fnbr.co/api/shop', false, $context);

$json = json_decode($file, true);



?>
<head>
<style>

    @font-face {
    font-family: fortnite;
    src: url(fortnite.otf);
}

    .grid-container {
  display: grid;
  grid-column-gap: 50px;
}

.grid-container {
  display: grid;
  grid-template-columns: auto auto auto;
  padding: 10px;
}
.grid-item {
  padding: 20px;
  font-size: 30px;
  text-align: center;
}

.card{
  border-radius: 0;
  border-color: yellow;
  border-width: 10px;
}

.card-img-top{
  border-radius: 0;
  border-color: yellow;
}

.card:hover{
    border-color: yellow;
}


</style>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
  <a class="navbar-brand" href="#" style="font-family: fortnite; font-size: 50px;">FORTNITE <small>COMPANION HUB</small></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <form class="form-inline my-2 my-lg-0" method="post" action="search.php">
      <input name="search" class="form-control mr-sm-2" type="search" style="font-family: fortnite; font-size: 30px;" placeholder="Enter Item Name" aria-label="Search">
      <button class="btn btn-success my-2 my-sm-0" type="submit" style="font-family: fortnite; font-size: 30px;">View</button>
    </form>
  </div>
  </div>
</nav>

    <div class="container">


    <br>

      <h1 style="font-family: fortnite;"><i class="fas fa-shopping-basket"></i> TODAYS STORE:</h1>
      <hr style="background-color: white;">

      <h3 style="font-family: fortnite;">FEATURED ITEMS:</h3>

<div class="row">

<?php

$countw1 = count($json['data']['featured']);

$count = $countw1 - 1;

$x1 = 0;


do {


    $gallery =  $json['data']['featured'][$x1]['images']['gallery'];
    echo '  <div class="col-auto" style="padding-bottom: 27px;">'
            .'<div class="card" style="width: 330px; border-radius: 0px; border-width: 10px;">'
            ."<a href='item.php?item=", $json['data']['featured'][$x1]['name'] ,"'><img class='card-img-top img-fluid' src='";
    echo $gallery;
    echo "' alt='Card image cap' style='border-radius: 0px; border-width: 10px;'></a>"
            .'</div>'
            .'</div>';
    $x1++;
} while ($x1 <= $count);

?>
</div>


      <h3 style="font-family: fortnite;">DAILY ITEMS:</h3>
      <div class="row">
      <?php

$countw1 = count($json['data']['daily']);

$count = $countw1 - 1;

$x2 = 0;


do {
    $gallery =  $json['data']['daily'][$x2]['images']['gallery'];
    echo '  <div class="col-auto" style="padding-bottom: 27px;">'
            .'<div class="card" style="width: 150px; border-radius: 0px; border-width: 5px;">'
            ."<a href='item.php?item=", $json['data']['daily'][$x2]['name'] ,"'><img class='card-img-top' src='";
    echo $gallery;
    echo "' alt='Card image cap' style='border-radius: 0px'></a>"
            .'</div>'
            .'</div>';
    $x2++;
} while ($x2 <= $count);

?>
</div>


    <h1 style="font-family: fortnite;"><i class="fas fa-map-marker"></i> Vending Machine Locations:</h1>
      <hr>
      <div class="row">

          <div class="col-3">

         <h4 style="font-family: fortnite;">Anarchy Acres (1)</h4>
                  <h4 style="font-family: fortnite;">'The Motel' (1)</h4>
         <h4 style="font-family: fortnite;">Pleasant Park (2)</h4>
         <h4 style="font-family: fortnite;">Loot Lake (2)</h4>
         <h4 style="font-family: fortnite;">Tilted Towers (2)</h4>
         <h4 style="font-family: fortnite;">'Football Pitch' (1)</h4>
         <br>
         <a style="font-family: fortnite; font-size: 20px;" class="btn btn-success" href="vending_map.png" download role="button"><i class="fas fa-cloud-download-alt"></i> Download A Map</a>

         </div>

                   <div class="col-3">

         <h4 style="font-family: fortnite;">Tomato Town (1)</h4>
                  <h4 style="font-family: fortnite;">'Containers' (1)</h4>
         <h4 style="font-family: fortnite;">Lonely Lodge (1)</h4>
         <h4 style="font-family: fortnite;">'Dirt Track' (1)</h4>
         <h4 style="font-family: fortnite;">'Bridge', by prison (1)</h4>
         <h4 style="font-family: fortnite;">Salty Springs (1)</h4>

         </div>

                   <div class="col-3">

         <h4 style="font-family: fortnite;">'Factories' by SS (1)</h4>
                  <h4 style="font-family: fortnite;">Lucky Landing (1)</h4>
         <h4 style="font-family: fortnite;">'Factories' by FF (1)</h4>
         <h4 style="font-family: fortnite;">Shifty Shafts (1)</h4>
         <h4 style="font-family: fortnite;">Greasy Grove (1)</h4>
         <h4 style="font-family: fortnite;">'Mountain' by FF (1)</h4>

         </div>

                   <div class="col-3">

         <h4 style="font-family: fortnite;">'Containers' (1)</h4>
                  <h4 style="font-family: fortnite;">'Houses' By WW (2)</h4>
         <h4 style="font-family: fortnite;">'Building' By MM (1)</h4>

         </div>


      </div>
      <br>
       <br>
 <br>


</div>
