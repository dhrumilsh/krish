<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">		

		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<!-- Mobile Meta -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	    

	    <!-- Bootstrap CSS -->
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" crossorigin="anonymous">
	        
		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->

		<!-- Google Analytics-->
		<!-- end analytics -->
		
		<!-- Fallback for AOS in case of disabled JS -->
		<noscript>
	        <style type="text/css">
	            [data-aos] {
	                opacity: 1 !important;
	                transform: translate(0) scale(1) !important;
	            }
	        </style>
	    </noscript>
	 

	</head>

	<body <?php body_class();?> style="color:<?php the_field('body_text_color', 'option');?>" >
    
	
		<header>
		<?php if( get_field('hphone_number', 'option') ): ?>
			<?php $hphone_number = get_field('hphone_number', 'option'); ?>
			<div class="header-callnow stick-head">
				<a href="<?php echo $hphone_number['url']; ?>" class="callnow"><?php echo $hphone_number['title']; ?></a>
			</div>
		<?php endif; ?>
			
			<?php $nav_item = get_field('nav_items_hover_color', 'option'); ?>
			<?php $sub_item = get_field('subnav_hover_item_color', 'option'); ?>
			
			<div class="container header-wrap" id="main__header"

			<?php if( get_field('nav_items_color', 'option') ): ?>data-color="<?php the_field('nav_items_color', 'option');?>" <?php endif; ?>
			<?php if($nav_item): ?>data-hover-color="<?php echo $nav_item['color_1']; ?>" data-hover-color2="<?php echo $nav_item['color_2']; ?>" <?php endif; ?>
			<?php if( get_field('subnav_item_color', 'option') ): ?>data-subnav-item-color="<?php the_field('subnav_item_color', 'option');?>" <?php endif; ?>
			<?php if($sub_item): ?>data-subnav-hover-item-color="<?php echo $sub_item['color_1']; ?>" data-subnav-hover-item-color2="<?php echo $sub_item['color_2']; ?>" <?php endif; ?> >

			<div class="logo">
			<?php $logotype = get_field('logotype', 'option'); ?>
			<?php $mobile_logotype = get_field('mobile_logotype', 'option'); ?>
	            <a href="<?php echo home_url(); ?>">
	            	<img src="<?php echo $logotype['url']; ?>" alt="<?php echo $logotype['title']; ?>" class="default-logo">
	            	<img src="<?php echo $mobile_logotype['url']; ?>" alt="<?php echo $mobile_logotype['title']; ?>" class="fix-logo">
	            </a>
			</div>
			<div class="header-right">
				<div class="navigation"> <a href="#" class="lines-button x2"><span class="lines"></span></a>
					<div class="main_menu">								
					</div>
				</div>
				<?php if( get_field('hphone_number', 'option') ): ?>
					<?php $hphone_number = get_field('hphone_number', 'option'); ?>
					<div class="header-callnow desktop">
						<a href="<?php echo $hphone_number['url']; ?>" class="callnow"><?php echo $hphone_number['title']; ?></a>
					</div>
				<?php endif; ?>				
			</div>

			</div>		  	
		</header>
