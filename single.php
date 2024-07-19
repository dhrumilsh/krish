<?php get_header(); ?>



<section id="single_blog" class="single-blog">

<div class="blog-banner">
            	<!-- image -->
<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
if($featured_img_url){ ?>
<div class="featured-img">
	<img alt="<?php the_title(); ?>" src="<?php echo $featured_img_url; ?>">
</div><!--end section-->
<?php } ?>
<div class="banner-cnt">
	 <div class="container">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                	<div class="time"><?php echo display_read_time(); ?></div>
                	<div class="date"><?php the_date( 'm/d/Y' ); ?></div>
                	<h1><?php the_title() ;?></h1>   
</div>
</div>
</div>
    <div class="blog-iner-cnt">


    <div class="container">
        <div class="row b-content">
            <div class="text-left col-lg-9">              
            	<div class="blog-inr-lft">              

                	<?php the_content(); ?> 
                	
                	<div class="social_sharing">
	                    <?php if(get_field('ss_label', 'option')){ ?>
	                     <div class="social_title"><?php echo get_field('ss_label', 'option'); ?></div>
	                    <?php } ?>
	                    
	                    <div class="social_ul">
	                        <?php if(get_field('ss_facebook_icon', 'option')){ ?>
	                           <a aria-label="Facebook" class="social_facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" title="Facebook" rel="nofollow noopener" target="_blank">
	                              <span class="ss_svg">
	                                 <img src="<?php echo get_field('ss_facebook_icon', 'option')['url']; ?>" alt="<?php echo get_field('ss_facebook_icon', 'option')['title']; ?>">
	                              </span>
	                           </a>
	                        <?php } ?>
	                        <?php if(get_field('ss_linkedIn_icon', 'option')){ ?>
	                           <a aria-label="Linkedin" class="social_linkedin" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo get_the_permalink(); ?>" title="Linkedin" rel="nofollow noopener" target="_blank">
	                              <span class="ss_svg">
	                                 <img src="<?php echo get_field('ss_linkedIn_icon', 'option')['url']; ?>" alt="<?php echo get_field('ss_linkedIn_icon', 'option')['title']; ?>">
	                              </span>
	                           </a>
	                        <?php } ?>
	                        <?php if(get_field('ss_twitter_icon', 'option')){ ?>
	                           <a aria-label="Twitter" class="social_twitter" href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&amp;url=<?php echo get_the_permalink(); ?>" title="Twitter" rel="nofollow noopener" target="_blank">
	                              <span class="ss_svg">
	                                 <img src="<?php echo get_field('ss_twitter_icon', 'option')['url']; ?>" alt="<?php echo get_field('ss_twitter_icon', 'option')['title']; ?>">
	                              </span>
	                           </a>
	                        <?php } ?>
	                        <?php if(get_field('ss_copy_link_icon', 'option')){ ?>
	                              <a aria-label="Copy Link" class="social_copy_link" title="Copy Link" rel="nofollow noopener" href="<?php echo get_the_permalink(); ?>">
	                              <span class="ss_svg">
	                                 <img src="<?php echo get_field('ss_copy_link_icon', 'option')['url']; ?>" alt="<?php echo get_field('ss_copy_link_icon', 'option')['title']; ?>">
	                              </span>
	                           </a>
	                        <?php } ?>
	                    </div>
                    </div>
                    <div class="heateorSssClear"></div>                                      

               <?php endwhile; endif; ?>
               </div>
            </div><!-- end .text-left -->

            <div class="text-right col-lg-3">
           
  			</div><!-- end .text-right -->

        </div><!-- end .row -->
    </div><!-- end .container -->
     <div class="blog-sidebar">       	
    			<?php if (get_field('bcta_heading', 'option')) : ?>
					<h3><?php the_field('bcta_heading', 'option') ?></h3>
				<?php endif; ?>
				<?php if (get_field('bcta_button_link', 'option')) : ?>
                    <div class="blue-btn-div ">
                       <a class="blue-btn primary_btn" href="<?php echo get_field('bcta_button_link', 'option')['url']; ?>" target="<?php echo get_field('bcta_button_link', 'option')['target']; ?>"><?php echo get_field('bcta_button_link', 'option')['title']; ?></a>
                    </div>
                <?php endif; ?>
  			</div>

  		</div>
</section><!-- end section -->

<?php get_footer(); ?>
