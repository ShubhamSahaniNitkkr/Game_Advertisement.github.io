<html>
    <head>
      <?php
          $json = file_get_contents('web-data/gamesarena.json');
          $data = json_decode($json,true);
          $game=$data['games'];
          $i=0;
      ?>
        <!-- mobile meta -->
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <title>Games | for Real Players</title>
        <!--lib css-->
        <link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">

        <!--custom css-->
        <link href='css/home.css' rel='stylesheet' type='text/css'>

        <link rel="icon" type="image/x-icon" href="images/logo.png">
    </head>



<style media="screen">
body{font-family: 'Roboto', sans-serif;
background-image: url('images/gameswall/wall.jpg');
}
.k p{
  font-size: 16px;
}

</style>



  <body>


    <div class="background-color">
      <iframe width="100%" height="810" src="https://www.youtube.com/embed/RRViSISYi2g?rel=0&amp;autoplay=1" frameborder="0" allow="autoplay=1; encrypted-media" allowfullscreen></iframe>
      <!-- <video autoplay muted loop id="myVideo" style="width:100%">
  <source src="rain.mp4" type="video/mp4">
  Your browser does not support HTML5 video.
</video> -->

    <p class="jumbotron-heading col-xs-12 text-center" style="font-size:40px;background-color: #66339961;"><span style="color:red;">"</span> Gaming has been a great way to get to know people. That's part of what I love about games, that they are social ! <span style="color:red;">"</span></p>
      <p class="jumbotron-subheading text-center" style="border: 5px solid mediumvioletred;top:365px;"><a href="games_deatil.php" style="background-color: white; color:rgba(0, 0, 0, 0.77);text-decoration:none;" class="search" >Check Games!</a></p>
  </div>


  <div class="container-fluid k" style="margin-top:100px;margin-right: 35px; margin-left: 35px; margin-bottom: 65px;">

    <p class="jumbotron-subheading text-center" style="border: 5px solid mediumvioletred;top:855px;border-radius: 1px;    border: 5px solid mediumvioletred;
    font-size: 24px;
    border-radius: 29px;"><a href="" style="background-color: white; color:rgba(0, 0, 0, 0.77);" class="search" >Trending Games!</a></p>

    <?php
    foreach($game as $game_data){
      if($i>0){
    ?>
    <div class="row">
      <?php if ($i%2!=0) {?>
        <div class="col-sm-4 col-md-6"><img src="images/gameswall/<?=$i;?>.jpg" alt="" width="100%" class="img-responsive"  style="
    box-shadow: 0px 0px 155px rgba(8, 8, 8, 0.62);"></div>
    <?php }  ?>
      <div class="col-sm-4 col-md-6 content1">
        <p class="heading">Name: <span style="color:mediumvioletred"><?=$game_data['title']?></span> </p>
        <p class="subheading">Platform: <span style="color:red"><?=$game_data['platform']?></span> </p>
        <p >Score: <span style="color:red"><?=$game_data['score']?></span> </p>
        <p >Category: <span style="color:red"><?=$game_data['genre']?></span> </p>
        <p >Editor's Choice: <span style="color:red"><?=(($game_data['editors_choice']=='Y')?'Yes':'NO')?></span> </p>
      </div>
      <?php if ($i%2==0) {?>
        <div class="col-sm-4 col-md-6"><img src="images/gameswall/<?=$i;?>.jpg" alt="" width="100%" class="img-responsive" style="
    box-shadow: 0px 0px 155px rgba(8, 8, 8, 0.62);" ></div>
    <?php }  ?>

    </div>



  <?php } $i++;
  if($i==10)
  $i=1;
}?>

  </div>


  </body>

    <script type="text/javascript" src="bootstrap/js/jquery-2.0.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/home.js"></script>
  </html>
