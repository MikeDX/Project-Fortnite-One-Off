<?php
session_start();
$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"x-api-key: [You_Gota_Get_A_Key_And_Paste_It_Here_Thx]"

  )
);

$itembef = $_GET['item'];
$item = str_replace(" ","+",$itembef);
$context = stream_context_create($opts);
$url = 'https://fnbr.co/api/images?search=' . $item;

// Open the file using the HTTP headers set above
$file = file_get_contents($url, false, $context);

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

      <h1 style="font-family: fortnite;"><img style="width: auto; height: 50px;" src="<?php echo $json['data']['0']['images']['icon']; ?>"> <?php echo $json['data']['0']['name']; ?></h1>
      <hr>

<div class="row">

    <div class="col-6">
    <img style="width: 100%; height: auto;" src="<?php echo $json['data']['0']['images']['gallery']; ?>">
</div>

<div class="col-3">
    <h4 style="font-family: fortnite;">Name: <?php echo $json['data']['0']['name']; ?></h4>
                  <h4 style="font-family: fortnite;">Price: <?php echo $json['data']['0']['price']; ?></h4>

</div>

<div class="col-3">
             <h4 style="font-family: fortnite;">Rarity: <?php echo $json['data']['0']['rarity']; ?></h4>
         <h4 style="font-family: fortnite;">Type: <?php echo $json['data']['0']['readableType']; ?></h4>
</div>

</div>



</div>
