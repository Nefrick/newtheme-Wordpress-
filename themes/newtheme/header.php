<?php
$theme_opts         =    get_option('sj_opts');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php the_title(); ?></title>

    <?php wp_head(); ?>

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <?php
        if($theme_opts['logo_type'] == 1){
            ?><a class="navbar-brand" href="#"><?php bloginfo('name'); ?></a><?php
        }else{
            ?><a class="navbar-brand" href="#"><img src="<?php echo $theme_opts['logo_img']; ?>" alt=""></a><?php
        }
        ?>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <?php wp_nav_menu( ['theme_location' => 'primery'] ); ?>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <?php
            if(!empty($theme_opts['twitter'])){
                ?><li><a href="https://twitter.com/<?php echo $theme_opts['twitter']; ?>"><i class="fa fa-twitter"></i></a></li><?php
            }
            ?>
            <?php
            if(!empty($theme_opts['facebook'])){
                ?><li><a href="https://facebook.com/<?php echo $theme_opts['facebook']; ?>"><i class="fa fa-facebook"></i></a></li><?php
            }
            ?>
            <?php
            if(!empty($theme_opts['youtube'])){
                ?><li><a href="https://youtube.com/user/<?php echo $theme_opts['youtube']; ?>"><i class="fa fa-youtube"></i></a></li><?php
            }
            ?>
        </ul>
    </div>
</nav>
