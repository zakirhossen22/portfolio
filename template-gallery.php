<?php get_header();
/*

Template Name: Gallery Template
 */
?>
<?php get_template_part('inc/breadcum');?>

<section class="gallery-area pt-100 pb-100">
    <div class="container">
        <div class="row">
        <?php
         $args = array(
            'post_type' => 'gallerys',
            'posts_per_page' => 10
         );
         $query = new WP_Query($args);
         while( $query -> have_posts()) {
            $query -> the_post();

         ?>
         <div class="col-xl-4">
                <div class="single-gallery">
                     <img src="<?php echo esc_url(the_post_thumbnail_url());?> " alt="">
                     <div class="gallery-hover">
                        <div class="gallery-content">
                           <?php
                           if(class_exists('ACF')) {
                              $big_image = get_field('big_image');
                           }
                           ?>
                           <h3><a href="<?php echo $big_image ?>" class="gallery"><i class="fa fa-plus"></i><?php the_title();?></a></h3>
                        </div>
                    </div>
                </div>
            </div>
         <?php
         }
         wp_reset_postdata();
         ?>
        </div>
    </div>
</section>
 <?php get_footer();?>
