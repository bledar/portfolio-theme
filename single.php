<?php
    get_header();
    global $more;
    $more = 1;
    $articleKey=212;
    $PinnedArticle = new WP_Query(array('category_name' => "pinned",'posts_per_page'=>10));
    $VideoArticle = new WP_Query(array('category_name' => "video",'orderby'=> 'date','order'=>'ASC'));
?>
<div class="wrapper content cf">
    <article class="singleArticle cf">            
            <?php while( have_posts() ):the_post();
               if ( in_category( 'Video' )){?>
                    <div class="videoPlayer">
                        <h1 class="title"><?php the_title();?></h1>
                        <?php the_content();?>
                    </div>
                    <?php while($VideoArticle->have_posts() ):$VideoArticle->the_post();?>
                        <div class="playlist cf">
                            <a class="cf" href="<?php the_permalink();?>">
                                <?php
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail();
                            }else {
                                echo '<img src="' . get_bloginfo( 'stylesheet_directory' ). '/images/no_image.jpg" />';}?>
                            <p><?php the_title();?></p>
                            </a>
                        </div>
                    <?php endwhile;?>


                <?php }else { ?>
<!-- Horizontal banner for ads -->
    <div class="horizontalAds">
        <?php $key="HorizontalAds";$value=get_post_custom_values($key, $articleKey);echo($value[0]);?>
    </div>
                    <div class="thumbnail-img"><?php the_post_thumbnail('thumbnail'); ?></div>
                        <div class="singleText">
                        <h1 class="title"><?php the_title();?></h1>
                        <p><?php the_content();?></p>
                    </div>
                    <?php }?>
            <?php endwhile;?>
    </article>
<div class="PinedPost sideBar cf">
    <div class="title"><h2>Pined Post!</h2></div>
            <?php
                $PinedPost=new WP_Query("post_type=post&posts_per_page=5&category_name=PinedPost");
                while($PinedPost->have_posts() ):$PinedPost->the_post();?>
                <div class="PinedPostItems cf">
                    <a href="<?php the_permalink();?>">
                        <?php
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail();
                    }else {
                        echo '<img src="' . get_bloginfo( 'stylesheet_directory' ). '/images/no_image.jpg" />';}?>
                        <p><?php the_title();?></p>
                    </a>
                </div>
            <?php endwhile;?>
    </div>
    <div class="social sideBar cf">
        <h2>Follow us:</h2>
        <ul>
            <li><a href="<?php $key='facebook_link';$value=get_post_custom_values($key,$articleKey);echo($value[0]);?>">
                <img src="<?php echo get_template_directory_uri()?>/images/facebook_btn.png"/></a>
            </li>
            <li><a href="<?php $key='youtube_link';$value=get_post_custom_values($key,$articleKey);echo($value[0]);?>">
                <img src="<?php echo get_template_directory_uri()?>/images/youtube_btn.png"></a></li>
        </ul>
           <?php $key="FacebookPage";$value=get_post_custom_values($key,$articleKey);echo($value[0]);?>
    </div>
    <div class="verticalAds sideBar cf">
        <?php $key="VerticalAds";$value=get_post_custom_values($key, $articleKey);echo($value[0]);?>
    </div>
</div>
</div>
<?php
    get_footer();
?>
