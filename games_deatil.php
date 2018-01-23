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
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <title>Games | for Real Players</title>
        <!--lib css-->
        <link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">

        <!--custom css-->
        <!-- <link href='../css/main.css' rel='stylesheet' type='text/css'> -->
        <link href='css/home.css' rel='stylesheet' type='text/css'>

        <link rel="icon" type="image/x-icon" href="images/logo.png">

        <style media="screen">
        body{
          font-family: 'Roboto', sans-serif;
          background-image: url('images/gameswall/wall.jpg');
          color:#c83985;


        }
        .table-bordered {
          border: 3px dashed #c83985;
        }
        .btn-default:hover {
          background-color: transparent;
        }
        .table-hover>tbody>tr:hover{background-color:rgba(0,0,0,0.10);cursor: hand;}
  .table>tbody>tr>td{
    padding-top: 25px;
    padding-left: 25px;
  }
  .form-control{
    height: 108px;
    font-size: 75px;
    border: 6px solid #c83985;
    color: #c83985;
    border-radius: 25px;
  }

  .btn{
    position: relative;
    bottom:7px;
  }

  .glu{
    font-size: 19px;
    font-weight: 100;
    position: absolute;
    color: #4CAF50;
    left: 367px;
    top: 357px;
  }

.col-lg-12{
  /*margin-top: -12px;*/
}
  th{
    cursor: hand;
    position: relative;
    top: -9px;
  }
        </style>
    </head>
    <body>
      <?php

       ?>
      <div class="banner">
        <div class="background-color">
          <img src="images/gameswall/banner.jpg"  class="jumbotron-image hidden-xs" alt="" width="1440px" height="380px"></img>

        </div>

      </div>

  <p class="jumbotron-subheading text-center" style="border: 5px solid mediumvioletred;top:45px;">List of Games</p>
  <p class="jumbotron-subheading text-center" style="border: 5px solid mediumvioletred;top:45px;left: 1230px;">   <a href="index.php">Home</a> <span class="glyphicon glyphicon-arrow-right"></span> </p>
  <!-- <div class="" style="height:200px;">

  </div> -->
  <div class="container-fluid text-center backgroun" style="margin-top:55px;">

    <div class="col-md-6 col-md-offset-3">

        <div class="col-md-3 ">
          <img class="status_glyphicon" src="images/day.svg"></img>
          <p class="btn btn-default area_of_score_btn" style="border-color:#4a90e2;">&nbsp;99&nbsp;&nbsp;</p><br>DAY

        </div>


        <div class="col-md-3 ">
          <img class="status_glyphicon" src="images/completion.svg"></img>
        <p class="btn btn-default area_of_score_btn" style="border-color:#48cdaf;" >45%</p><br>COMPLETION

        </div>


        <div class="col-md-3 ">
          <img class="status_glyphicon" src="images/score.svg"></img>
          <p class="btn btn-default area_of_score_btn" style="border-color:#bd10e0;">&nbsp;33&nbsp;&nbsp;</p><br>SCORE

        </div>
        <div class="col-md-3 ">
          <img class="status_glyphicon" src="images/accuracy.svg"></img>
          <p  class="btn btn-default area_of_score_btn" style="border-color:#7a10d8">82%</p><br>RATINGS


        </div>
    </div>
    <br>

    <br><br><br><br>
    <hr style="border-top: 5px solid #eee;padding-top:14px;">
</div>
<div class="container">
<br>
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <table class="table table-bordered ">
    <thead>
      <tr >
        <th id="menu-toggle1" onclick="sortTable(0)" style="padding-bottom: 19px;padding-top:32px;color:black;">No.</span> </th>
        <th id="menu-toggle1" onclick="sortTable(0)" style="padding-bottom: 19px;padding-top:32px;color:black;">Name </span> </th>
        <th id="menu-toggle2" onclick="sortTable(1)" style="padding-bottom: 19px;padding-top:32px;color:black;">Platform:</span></th>
        <th id="menu-toggle3" onclick="sortTable(2)" style="padding-left:18px;padding-bottom: 19px;padding-top:32px;color:black;">Score:</th>
        <th id="menu-toggle4" onclick="sortTable(3)" style="padding-left:18px;padding-bottom: 19px;padding-top:32px;color:black;">Category </th>
        <th id="menu-toggle5" onclick="sortTable(4)" style="padding-left:18px;padding-bottom: 19px;padding-top:32px;color:black;">Editors Choice</th>

      </tr>
      <hr>
    </thead>
    <tbody id="myTable">
      <?php
      foreach($game as $game_data){
        if($i>0){
      ?>

      <tr>
        <td><?=$i;?></td>
        <td><?=$game_data['title']?></td>
        <td><?=$game_data['platform']?></td>
        <td>
          <? $score=$game_data['score'];
          if($score>9 ){
            ?>
          <button type="button" name="button" class="btn btn-success "><?=$score?></button>
        <?php }  ?>
        <?php
          if($score<=3){?>
          <button type="button" name="button" class="btn btn-danger "><?=$score?></button>
        <?php }  ?>
       <?php if($score<=6 &&$score>3  ){ ?>
        <button type="button" name="button" class="btn btn-primary "><?=$score?></button>
        <?php }  ?>

      <?php if($score<=9 &&$score>6  ){ ?>
        <button type="button" name="button" class="btn btn-success "><?=$score?></button>
       <?php }  ?>

        </td>
        <td><?=$game_data['genre']?></td>
        <td><?=(($game_data['editors_choice']=='Y')?'Yes':'NO')?></td>

      </tr>
    <?php } $i++;}?>
    </tbody>

  </table>

</div>




  <div class="col-12 col-sm-12 col-lg-12">
   <div class="table-responsive">
</div>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <!-- <h4 class="modal-title">Modal Header</h4> -->
      </div>
      <div class="modal-body">
        <h2 class="text-center text-danger"> <span class="red">Plesae Click on Head of table For sorting!</span> </h2>   <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>




    </body>
    <script type="text/javascript" src="bootstrap/js/jquery-2.0.2.min.js"></script>

    <script type="text/javascript">

        $(window).load(function(){
      $('#myModal').modal('show');
       });

    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });


    </script>



    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/details.js">  </script>
</html>
