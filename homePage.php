<?php
	get_header();
/**
Template Name: Home template
*/
?>
<!-- HomePage Template -->
<div class="parallax-window" data-parallax="scroll" data-image-src="<?php echo get_template_directory_uri();?>/images/header.jpg">
    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="<?php echo get_template_directory_uri();?>/images/profile.png" alt="">
                    <div class="intro-text">
                        <span class="name"><?php bloginfo('title'); ?> </span>
                        <hr class="star-light">
                        <span class="skills">Web Developer - Graphic Artist - User Experience Designer</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
<!-- end header -->

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Portfolio</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
            <!-- portofolio loop -->
            <?php $portfolio = new WP_Query(array('category_name' => "portfolio"));?>
            <?php while($portfolio->have_posts() ):$portfolio->the_post();?>
                  <div class="col-sm-4 portfolio-item">
                    <a href="#<?php echo basename(get_permalink());?>" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                                <div><?php the_title();?></div>
                            </div>
                        </div>
                        <?php
                            
                            if ( has_post_thumbnail() ) {
                                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' );
                                echo '<img width="360" height="260" src="'.$thumb[0].'" claass="img-responsive"/>';
                            }
                            else {
                                echo '<img width="360" height="260" src="' . get_bloginfo( 'stylesheet_directory' ) 
                                    . '/images/thumbnail-default.png" claass="img-responsive"/>';
                            }
                        ?>
                    </a>
                </div>
            <?php endwhile;?>
            <!-- end of portofolio loop -->
        </div>
    </section>
<!-- End Section Portofolio -->

    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>About me</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                <?php 
                    $about_post_id=33;
                    $about  = get_post($about_post_id);
                    $resume_link= get_post_custom_values("resume-link",$about_post_id);
                    var_dump($resume_link);
                ?>

                <p><?php echo($about->post_content);?></p>
                </div>
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <a href="#" class="btn btn-lg btn-outline">
                        <i class="fa fa-download"></i> Download Full Resume
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contact Me</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email Address</label>
                                <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Phone Number</label>
                                <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Message</label>
                                <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php
	get_footer();
?>
