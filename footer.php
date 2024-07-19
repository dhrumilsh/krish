<footer class="footer" <?php if( get_field('footer_links_color', 'option') ): ?>data-footer-color="<?php the_field('footer_links_color', 'option');?>" <?php endif; ?>>
	<div class="container">
		<div class="footer_col_container">
			<div class="footer_menus_container">				
				<div class="menu_container">
					<div><?php wp_nav_menu( array('menu' => 'Footer Menu') ); ?></div>
					<div class="hours desktop"><?php the_field('fhours','option') ?></div>
				</div>
			</div>
			<div class="footer_contact_container">
				<div class="footer_phone_number">					
					<?php $number = get_field('fphone_number','option'); if( $number ): ?>
				<a href="<?php echo $number['url']; ?>" target="<?php echo $number['target']; ?>"><?php echo $number['title']; ?></a>
					<?php endif; $number = NULL; ?>
				</div>
				

			
				<div class="freview-btn">					
				<?php $link = get_field('freview_link','option'); if( $link ): ?>				
					
				<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
					<?php $google_icon = get_field('google_icon','option'); if( $google_icon ): ?>
						<img src="<?php echo $google_icon['url']; ?>" alt="<?php echo $google_icon['title']; ?>">
					<?php endif; $google_icon = NULL; ?>
					<?php echo $link['title']; ?></a>
				<?php endif; $link = NULL; ?>
				</div>
			

			</div>	
				<div class="footer_contact_container">
			

				<div class="footer_logo">
					<?php $logolink = get_field('fsite_logo','option'); if( $logolink ): ?>
					<a href="<?php echo home_url(); ?>"><img src="<?php echo $logolink['url']; ?>" alt="<?php echo $logolink['title']; ?>"></a>
					<?php endif; $logolink = NULL; ?>
				</div>
				
				<div class="fyoutube">					
				<?php $youtube = get_field('youtube_url','option'); if( $youtube ): ?>	
					<a href="<?php the_field('youtube_url', 'option'); ?>" target="_target">		
					<?php $youtube_icon = get_field('youtube_icon','option'); if( $youtube_icon ): ?>
						<img src="<?php echo $youtube_icon['url']; ?>" alt="<?php echo $youtube_icon['title']; ?>">
					<?php endif; $youtube_icon = NULL; ?>
					<?php echo $link['title']; ?>
					</a>
				<?php endif; $link = NULL; ?>
				</div>

			</div>		
		</div>
		
		<div class="footer_bottom">
			<div class="lft">
			<div class="copyright">&copy;<?php echo date("Y"); ?> <?php the_field('copyright_message', 'option'); ?></div>			
			<ul class="footer_legal_menu">
				<?php $privacy_policy = get_field('privacy_policy','option'); if( $privacy_policy ): ?>
				<li><a href="<?php echo $privacy_policy['url']; ?>" target="<?php echo $privacy_policy['target']; ?>"><?php echo $privacy_policy['title']; ?></a></li>
				<?php endif; $privacy_policy = NULL; ?>
				<?php $terms_conditions = get_field('terms_conditions','option'); if( $terms_conditions ): ?>
				<li><a href="<?php echo $terms_conditions['url']; ?>" target="<?php echo $terms_conditions['target']; ?>"><?php echo $terms_conditions['title']; ?></a></li>
				<?php endif; $terms_conditions = NULL; ?>
			</ul>
			
		</div>
		<div class="rgt">
			<div class="footer_address"><a href="https://maps.app.goo.gl/fE7gUPM4JW1Z8qPr9" target="_blank"><?php the_field('faddress', 'option'); ?></a></div><!-- end .footer-address -->
			<ul class="footer_social">
				<li><a href="<?php the_field('facebook_url', 'option'); ?>" target="_target">
					<img class="default" src="<?php echo get_field('facebook_icon', 'option')['url']; ?>" alt="<?php echo get_field('facebook_icon', 'option')['title']; ?>">
					<img class="hover" src="<?php echo get_field('facebook_icon_hover', 'option')['url']; ?>" alt="<?php echo get_field('facebook_icon', 'option')['title']; ?>">
			</a>
				</li>
				<li><a href="<?php the_field('instagram_url', 'option'); ?>" target="_target">
					<img class="default" src="<?php echo get_field('instagram_icon', 'option')['url']; ?>" alt="<?php echo get_field('instagram_icon', 'option')['title']; ?>">
				<img class="hover" src="<?php echo get_field('instagram_icon_hover', 'option')['url']; ?>" alt="<?php echo get_field('instagram_icon', 'option')['title']; ?>"></a>
				</li>
				<li><a href="<?php the_field('linkedin_url', 'option'); ?>" target="_target">
					<img class="default" src="<?php echo get_field('linkedin_icon', 'option')['url']; ?>" alt="<?php echo get_field('linkedin_icon', 'option')['title']; ?>">
				<img class="hover" src="<?php echo get_field('linkedin_icon_hover', 'option')['url']; ?>" alt="<?php echo get_field('linkedin_icon', 'option')['title']; ?>"></a>
				</li>
			</ul>
			<div class="hours mobile"><?php the_field('fhours','option') ?></div>
		</div>
	</div>
		
	<p style="margin: 30px 0 0; color: #fff; text-align: center; font-size: 12px;">Powered by <a href="https://lmh.agency/" style="text-decoration: underline !important; color: #fff;" target="_blank">LMH Agency</a></p>
	</div>
</footer> <!-- end footer -->
		
</div> <!-- end #container -->

<!-- all js scripts are loaded in library/primer.php -->
<?php wp_footer(); ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>




</body>

</html> <!-- end page. what a ride! -->
