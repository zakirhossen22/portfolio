<?php get_header();

/*

Template Name: Home Template
 */
?>
      <!-- Slider Area Start -->
      <section class="slider-area" id="home">
         <div class="slider owl-carousel">

         <?php
         $args = array(
            'post_type' => 'sliders',
            'post_per_page' => 3
         );
         $query = new WP_Query($args);
         while( $query -> have_posts()) {
            $query -> the_post();
         ?>
            <div class="single-slide" style="background-image:url('<?php the_post_thumbnail_url();?>')">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-12">
                        <div class="slide-table">
                           <div class="slide-tablecell">
                              <?php
                                 if(class_exists('ACF')) {
                                    $subtitle = get_field('slider_subtitle');
                                    $btn_url = get_field('slider_btn_link');
                                    $btn_text = get_field('slider_btn_text');
                                 }
                              ?>
                              <h4><?php echo $subtitle;?></h4>
                              <h2><?php the_title();?></h2>
                              <p><?php the_content();?></p>
                              <?php 
                              if(get_field('slider_btn_link')) {
                                 ?>
                                 <a href="<?php echo esc_url($btn_url);?>" class="box-btn"><?php echo $btn_text;?><i class="fa fa-angle-double-right"></i></a>
                               <?php
                              }
                              ?>  
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         <?php
         }
         wp_reset_postdata();
         ?>
            
         </div>
      </section>
      <!-- Slider Area end -->
      <!-- About Area Start -->
      <section class="about-area pt-100 pb-100" id="about">
         <div class="container">
            <div class="row section-title">
               <div class="col-md-6 text-right">
                  <?php
                  if(class_exists('ACF')) {
                     $about_title = get_field('about_section_title','option');
                  }
                  ?>
                  <h3><span><?php echo $about_title ['sub_heading'];?></span> <?php echo $about_title['heading'];?></h3>
               </div>
               <div class="col-md-6">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry.d </p>
               </div>
            </div>
            <div class="row">
               <div class="col-md-7">
                  <div class="about">
                     <div class="page-title">
                     <?php
                     if(class_exists('ACF')) {
                        $about_content = get_field('about_content','option');
                     }
                     ?>
                        <h4><?php echo $about_content  ['title'];?></h4>
                     </div>
                     <p><?php echo $about_content  ['description'];?></p>
                     <a href="<?php echo $about_content  ['btn_link'];?>" class="box-btn"><?php echo $about_content  ['btn_text'];?><i class="fa fa-angle-double-right"></i></a>
                  </div>
               </div>
               <div class="col-md-5">
               <?php
                     if(class_exists('ACF')){
                        $about_features = get_field('about_features','option');
                        foreach($about_features as $feature) {
                     ?>
                  <div class="single_about">
                     <i class="fa <?php echo $feature ['icon'];?>"></i>
                     <h4><?php echo $feature['title'];?></h4>
                     <p><?php echo  $feature['description'];?></p>
                  </div>
                  <?php
               }
            }      
               ?>
               </div>
            </div>
         </div>
      </section>
      <!-- About Area End -->
      <!-- Choose Area End -->
      < <section class="choose">
         <div class="container">
            <div class="row pt-100 pb-100">
               <div class="col-md-6">
                  <div class="faq">
                     <div class="page-title">
                        <h4><?php the_field('faq_title','option');?></h4>
                     </div>
                     <div class="accordion" id="accordionExample">
                    <?php
                  $faqs = get_field('faqs','option');
                  $i = 0;
                  foreach($faqs as $faq){
                     $i++;
               ?>
                  <div class="card">
                           <div class="card-header" id="heading<?php echo $i;?>">
                              <h5 class="mb-0">
                                 <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo $i;?>" aria-expanded="true" aria-controls="collapse<?php echo $i;?>">
                                 <?php echo $faq ['title'];?></thead>
                                 </button>
                              </h5>
                           </div>
                           <div id="collapse<?php echo $i;?>" class="collapse<?php if($i==1){
                              echo 'show'
                                 ;}?>" aria-labelledby="heading<?php echo $i;?>" data-parent="#accordionExample">
                              <div class="card-body">
                              <?php echo $faq ['description'];?>
                              </div>
                           </div>
                        </div>
                  <?php
                  }
                  ?>    
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="skills">
                     <div class="page-title">
                        <h4><?php the_field('skills_title','option');?></h4>
                     </div>
                     <?php
                     $skills = get_field('skills','option');
                     foreach($skills as $skill) {
                        ?>
                        <div class="single-skill">
                        <h4><?php echo $skill['title'];?></h4>
                        <div class="progress-bar" role="progressbar" style="width:<?php echo $skill['number'];?>;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $skill['number'];?></div>
                     </div>

                        <?php
                     }
                  ?> 
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Choose Area End -->
      
      <!-- Services Area Start -->
      <section class="services-area pt-100 pb-50" id="services">
         <div class="container">
            <div class="row section-title">
               <div class="col-md-6 text-right">
                  <h3><span>who we are?</span> our services</h3>
               </div>
               <div class="col-md-6">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry.d </p>
               </div>
            </div>
            <div class="row">
               
             <?php
               $args = array(
            'post_type' => 'services',
            'posts_per_page' => 6
         );
         	
         $query = new WP_Query($args);
         while( $query -> have_posts()) {
            $query -> the_post();

            ?>
            
            <div class="col-lg-4 col-md-6">
            <!-- Single Service -->
            <div class="single-service">
               <i class="<?php the_field('icon');?>"></i>
               <h4><?php the_title();?> </h4>
               <p><?php the_content();?> </p>
            </div>
         </div>
         <?php
         }
         wp_reset_postdata();

         ?>
            </div>
         </div>
      </section>
      <!-- Services Area End -->
      
      <!-- Counter Area Start-->
      <section class="counter-area">
         <div class="container-fluid">
            <div class="row">
               <?php
               $args = array(
            'post_type' => 'counters',
            'posts_per_page' => 4
         );
         	
         $query = new WP_Query($args);
         while( $query -> have_posts()) {
            $query -> the_post();
            ?>
            <div class="col-md-3">
                  <div class="single-counter">
                     <h4><i class="<?php the_field('counter_icon');?>"></i><span class="counter"><?php the_field('counter_number');?></span><?php the_title();?></span></h4>
                  </div>
               </div>
               <?php
         }
         wp_reset_postdata();
            ?>
            </div>
         </div>
      </section>
      <!-- Counter Area End -->

      <!-- Team Area Start -->
      <section class="team-area pb-100 pt-100" id="team">
         <div class="container">
            <div class="row section-title">
               <div class="col-md-6 text-right">
                  <h3><span>who we are?</span> creative team</h3>
               </div>
               <div class="col-md-6">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry.d </p>
               </div>
            </div>
            <div class="row">  
            <?php
            $args = array(
            'post_type' => 'teams',
            'posts_per_page' => 3
         );
         	
         $query = new WP_Query($args);
         while( $query -> have_posts()) {
            $query -> the_post();
            ?>
            <div class="col-md-4">
                  <div class="single-team">
                     <img src="<?php the_post_thumbnail_url();?>" alt="" />
                     <div class="team-hover">
                        <div class="team-content">
                           <h4><?php the_title();?><span><?php the_field('team_designation');?></span></h4>
                           <ul>
                              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                              <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                           </ul>
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
         </div>
      </section>
      <!-- Team Area End -->
     
      <!-- Testimonials Area Start -->
      <section class="testimonial-area pb-100 pt-100" id="testimonials">
         <div class="container">
            <div class="row section-title white-section">
               <div class="col-md-6 text-right">
                  <h3><span>who we are?</span> what client say</h3>
               </div>
               <div class="col-md-6">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry.d </p>
               </div>
            </div>
         </div>
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  <div class="testimonials owl-carousel">
                  <?php
                     $args = array(
                     'post_type' => 'testimonials',
                     'post_per_page' => 4
         );
         	
         $query = new WP_Query($args);
         while( $query -> have_posts()) {
            $query -> the_post();
            ?>
            <div class="single-testimonial">
                        <div class="testi-img">
                           <img src="<?php the_post_thumbnail_url();?>" alt="" />
                        </div>
                        <p><?php the_content();?></p>
                        <h4><?php the_field('testimonial_text');?><span><?php the_field('testimonial_designation');?></span></h4>
                     </div>
                     <?php
                   }
                   wp_reset_postdata();
                     ?>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Testimonilas Area End -->

      <!-- Latest News Area Start -->
      <section class="blog-area pb-100 pt-100" id="blog">
         <div class="container">
            <div class="row section-title">
               <div class="col-md-6 text-right">
                  <h3><span>who we are?</span> latest news</h3>
               </div>
               <div class="col-md-6">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry.d </p>
               </div>
            </div>
            <div class="row">

            <?php
                     $args = array(
                     'post_type' => 'post',
                     'posts_per_page' => 3
         );
         	
         $query = new WP_Query($args);
         while( $query -> have_posts()) {
            $query -> the_post();
            ?>
            <div class="col-md-4">
                  <div class="single-blog">
                     <img src="<?php the_post_thumbnail_url();?>" alt=""/>
                     <div class="post-content">
                        <div class="post-title">
                           <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                        </div>
                        <div class="pots-meta">
                           <ul>
                              <li><a href="#">25 oct 2018</a></li>
                              <li><a href="#">admin</a></li>
                           </ul>
                        </div>
                        <p><?php the_excerpt();?></p>
                        <a href="<?php the_permalink();?>" class="box-btn">read more <i class="fa fa-angle-double-right"></i></a>
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
      <!-- Latest News Area End -->
<?php get_footer();?>

