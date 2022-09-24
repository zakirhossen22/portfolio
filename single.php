<?php get_header();?>

<?php get_template_part('inc/breadcum');?>

<section class="blog-single pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                <h2><?php the_title();?></h2>
                <img src="<?php echo the_post_thumbnail_url();?>" alt="">
                <p><?php the_content();?></p>
                <div class="comments">
                    <h4>leave a reply</h4>
                    <form action="">
                        <input type="text" placeholder="Name">
                        <input type="text" placeholder="Email">
                        <input type="text" placeholder="Subject">
                        <textarea placeholder="Message"></textarea>
                        <input type="submit" value="Send">
                    </form>
                </div>
            </div>
            <div class="col-xl-4">
            <?php 
            if (is_active_sidebar( 'sidebar-1' )) { 
                     dynamic_sidebar( 'sidebar-1' ); 
            }
                 ?>
            </div>
        </div>
    </div>
</section>

 <?php get_footer();?>