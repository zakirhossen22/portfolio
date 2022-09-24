<?php get_header();?>
<section class="breadcumb-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcumb">
                    <h4><?php the_title();?></h4>
                    <ul>
                        <li><a href="<?php echo site_url();?>"></a>Home</li> / 
                        <li><?php the_title();?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="portfolio-single pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                <h2><?php the_title();?></h2>
                <img src="<?php the_post_thumbnail_url();?>" alt="">
                <?php the_content();?>
                <div class="row">
                   <div class="col-xl-12">
                     <h4>project gallery</h4>
                   </div>
                   <?php 
                   if($gallerys = get_field('project_gallery')) {

                     foreach($gallerys as $gallery) {
                        ?>
                         <div class="col-xl-4">
                       <div class="project-gallery">
                          <img src="<?php echo $gallery['url'];?>" alt="">
                       </div>
                    </div>
 
                      <?php
                     }
                   }
                   ?> 
                </div>
                <br><br>
                <div class="row">
                   <div class="col-xl-12">
                        <h4>project overview</h4>
                        <?php the_field('project_video');?>
                   </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="portfolio-sidebar">
                    <h4>Technology Used</h4>
                    <ul>
                  <?php 
                    if($techs = get_field('project_tech')){

                     foreach($techs as $tech) {
                        ?>
                         <li><i class="fa fa-arrow-right"></i><?php echo $tech['tech_name'];?></li>
 
                      <?php
                     }
                    }
                    ?>
                    
                    </ul>
                </div>
                <div class="portfolio-sidebar">
                    <h4>project features</h4>
                    <ul>
                    <?php 
                    if( $features = get_field('project_feature')) {
                     foreach($features as $feature) {
                        ?>
                         <li><i class="fa fa-arrow-right"></i><?php echo $feature['feature_name'];?></li>
 
                      <?php
                     }
                    }
                  ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
 <?php get_footer();?>