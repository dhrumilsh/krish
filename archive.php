<?php get_header(); ?>

<!-- blogs -->
<section class="blog-wrp">
    <div class="container">
        <div class="row">
	        <div class="col-md-12 c-center">  
	            <h2><?php echo single_cat_title(); ?></h2>
	        </div>
        </div>
        <div class="row">
        <div class="col-md-3 blog-filter">
        	<?php 
        	$queried_object = get_queried_object();
			$term_id = $queried_object->term_id;

        	$post_cats = get_terms( 'category', array('hide_empty' => 1, 'orderby' => 'ID', 'order' => 'ASC'));
        	if($post_cats){ ?>
	        	<h4>Categories:</h4>
	        	<div class="select-dc">
				<h5 id="mobile-select-toggle"><a href="javascript:void(0)">Select Category</a></h5>
		        	<ul class="desktop" id="mobilecont">
		        		<li><a href="<?php echo get_site_url() .'/blog/'; ?>">All</a></li>
		        	<?php foreach($post_cats as $post_cat) : ?>
		       			<li class="<?php if($term_id == $post_cat->term_id){ echo 'active'; } ?>" ><a href="<?php echo get_category_link($post_cat->term_id); ?>"><?php echo $post_cat->name; ?></a></li>
		            <?php endforeach; ?>
		            </ul>
  				</div>
        	<?php } ?>

        </div>
         
        <div class="col-md-9 blog-list ajax-addpost">
        	<?php 
			if(have_posts()): 
				$default_ppp = get_option( 'posts_per_page' );
			  	$max_num_pages = $wp_query->max_num_pages; ?>

        		<input type="hidden" id="blog_pages" value="1">
				<input type="hidden" id="blogs_per_page" value="<?php echo $default_ppp; ?>">
				<input type="hidden" id="blogs_max_pages" value="<?php echo $max_num_pages; ?>">
				<input type="hidden" id="ajaxurl" value="<?php echo admin_url( 'admin-ajax.php' ); ?>">

				<?php while (have_posts()) : the_post(); ?>
					<div class="s-blog">
						<?php if(get_the_post_thumbnail_url(get_the_ID(), 'full')){ ?>
		                <div class="imgwrap">
		                <a href="<?php echo get_the_permalink(); ?>">
		                	<img alt="<?php the_title(); ?>" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" class="w100" >
		                    <div class="time"><?php echo display_read_time(); ?></div>
		                    <div class="date"><?php the_date( 'm/d/Y' ); ?></div>		                    
		                </a>
		                </div>
						<?php } ?>
		                <div class="blog-cont">
		                <a href="<?php echo get_the_permalink(); ?>"><h5><?php the_title() ;?></h5></a>
		                <p><?php echo get_the_excerpt(); ?></p>
		                <a href="<?php echo get_the_permalink(); ?>" class="read-more" >Read More</a>
		                </div>                  
            		</div>
				<?php endwhile; wp_reset_query(); ?>			

				<?php if($max_num_pages > 1){ ?>
					<button id="loadmorepost">Load More</button>
				<?php } ?>

				<?php else : ?>
				<p class="post-not-found"><?php _e( 'No Posts To Display.' ); ?></p>
				<?php endif; ?>

			</div>
			</div>
               
      </div>
</section>

<!-- cta -->
<section id="image_list" class="image-list">
	<div class="container-fluid p-0">
				
		<?php if ( have_rows('bctat_images', 'option') ) : ?>
		<div class="image-list-wrapper">			
			<ul class="images">
				<?php while( have_rows('bctat_images', 'option') ) : the_row(); ?>				
					<?php if (get_sub_field('bcta_image', 'option')) : ?>
						<li><img src="<?php echo get_sub_field('bcta_image', 'option')['url']; ?>" alt="<?php echo get_sub_field('bcta_image', 'option')['title']; ?>"></li>
					<?php endif; ?>					
				<?php endwhile; ?>
			</ul>
		</div>
		<?php endif; ?>
		
	</div><!--end .container-->
</section><!--end section-->

<section id="img_list" class="img-cta">
	<div class="container-fluid p-0">				
		
		<div class="icta-wrapper">
			<?php if (get_field('bcta_image_1', 'option')) : ?>	
			<div class="img1">
				<img src="<?php echo get_field('bcta_image_1', 'option')['url']; ?>" alt="<?php echo get_field('bcta_image_1', 'option')['title']; ?>">
			</div>
			<?php endif; ?>
			<div class="cta-content">
				<div class="cta-content-in">
					<div class="cta-content-in2">
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
			</div>
			<?php if (get_field('bcta_image_2', 'option')) : ?>
			<div class="img2">
				<img src="<?php echo get_field('bcta_image_2', 'option')['url']; ?>" alt="<?php echo get_field('bcta_image_2', 'option')['title']; ?>">
			</div>
			<?php endif; ?>
		</div>
		
	</div><!--end .container-->
</section><!--end section-->

<section id="image_list" class="image-list">
	<div class="container-fluid p-0">
				
		<?php if ( have_rows('bctab_images', 'option') ) : ?>
		<div class="image-list-wrapper">			
			<ul class="images">
				<?php while( have_rows('bctab_images', 'option') ) : the_row(); ?>				
					<?php if (get_sub_field('bcta_image2', 'option')) : ?>
						<li><img src="<?php echo get_sub_field('bcta_image2', 'option')['url']; ?>" alt="<?php echo get_sub_field('bcta_image2', 'option')['title']; ?>"></li>
					<?php endif; ?>					
				<?php endwhile; ?>
			</ul>
		</div>
		<?php endif; ?>
		
	</div><!--end .container-->
</section><!--end section-->

<?php get_footer(); ?>