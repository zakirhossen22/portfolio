<?php get_header();
?>
      <!-- Header Area Start -->
      <?php get_template_part('inc/breadcum');?>

<section class="blog-area pb-100 pt-100" id="blog">
         <div class="container">
            <div class="row">
            <?php
         	
         while( have_posts()) {
             the_post();
            ?>
            <div class="col-md-4">
                  <div class="single-blog">
                     <img src="<?php the_post_thumbnail_url();?>" alt="" />
                     <div class="post-content">
                        <div class="post-title">
                           <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                        </div>
                        <div class="pots-meta">
                           <ul>
                              <li><a href="#"><?php the_date();?></a></li>
                              <li><?php the_category('; ');?></li>
                              <li><?php the_author();?></li>
                           </ul>
                        </div>
                        <p><?php the_excerpt();?></p>
                        <a href="<?php the_permalink();?>" class="box-btn">read more <i class="fa fa-angle-double-right"></i></a>
                     </div>
                  </div>
               </div>
            <?php
            
         }
            ?>
            </div>
         </div>
      </section>
      <!-- Latest News Area End -->
 <?php get_footer();?>
