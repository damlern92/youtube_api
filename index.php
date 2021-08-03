<?php
require_once($_SERVER['DOCUMENT_ROOT'] ."/youtube_api/config.php");
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="main.css" rel="stylesheet">

<!------ Include the above in your HEAD tag ---------->

<!-- details card section starts from here -->
<section class="details-card">
    <div class="container">

        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 text-center">
                <h2><span class="ion-minus"></span>Search YouTube videos by keywords <span class="inon-minus"></span></h2>
                <p>In this application you will can to use YouTube API with PHP</p>
            </div>
           
        </div>

        <div class="row">
            <div class="search-form">
                <form id="keywordForm" method="post" action="">
                <div class="input-row">
                    <label>Search Keyword :</label><br>
                    <input class="input-field" type="search" id="keyword" name="keyword" placeholder="Enter keyword">
                    <input class="btn btn-primary btn-lg" type="submit" name="submit" value="Search">
                </div>
                </form>
            </div>
        </div>

        <div class="row">
            <?php 
                if(isset($_POST['submit'])){
                    $keyword = $_POST['keyword'];
                    $yt = new Youtube();
                    $value = $yt->yt_search($keyword);

                for($i=0;$i < MAX_VIDEOS; $i++){
                    // var_dump($value['items']);die; // Testing
                    // the same $value['items'][$i]['id']['videoId']... add other
                    $videoId = $value['items'][$i]['id']['videoId'];
                    $title = $value['items'][$i]['snippet']['title'];
                    $description = $value['items'][$i]['snippet']['description'];
                ?>
                    <div class="col-md-4">
                        <div class="card-content">
                            <iframe style="width: 200px;height: 200px" src="//www.youtube.com/embed/<?php echo $videoId ?>"></iframe>
                            <div class="card-desc">
                                <h3><?php echo $title; ?></h3>
                                <p><?php echo $description ?></p>
                            </div>

                        </div><!-- .card-content -->
                    </div> <!-- .col-md-4 -->
                <?php } } ?>
            
            
        </div> <!-- .row -->

    </div> <!-- .container -->
</section>
<!-- details card section starts from here -->