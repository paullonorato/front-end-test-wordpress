<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="canonical" href="<?php bloginfo( 'url' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo( 'stylesheet_directory' ); ?>/images/favicon.png" />
	<link rel="alternate" type="application/rss+xml" title="Feeds do blog" href="http://feeds.feedburner.com/frontendparaleigos" />
	<meta name='robots' content='index,follow' />
	
	<title><?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?></title>
	
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Maven+Pro:400,700,500' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/fontello/css/fontello.css">
	<!--[if IE 7]><link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/fontello/css/fontello-ie7.css"><![endif]-->
</head>
<body>
	<?php get_header(); ?>

	<section>
		<div class="wrapper">
			<ul class="no-bullet featured">
				<?php
					$featured = new WP_Query( array( 'posts_per_page' => 4 ));
					while ($featured->have_posts()) : $featured->the_post(); $featuredExclude[] = get_the_ID(); $loopcounter++;

					if ($loopcounter == 1 || $loopcounter == 4 ){
						$featured_size = "featured-large";
					}else if ($loopcounter == 2 ){
						$featured_size = "featured-small grid-last";
					}else{
						$featured_size = "featured-small";
					}
				?>
				<li class="grid featured-item <?php echo $featured_size ?>">
					<a href="<?php the_permalink() ?>" class="featured-link">
						<img src="<?php the_field('post_thumb'); ?>" alt="" class="featured-thumb">
						<div class="featured-description">
							<span class="featured-category"><?php foreach((get_the_category()) as $category) { echo $category->cat_name . ''; } ?></span>
							<h2 class="featured-title"><?php the_title(); ?></h2>
						</div>
					</a>
				</li>
				<?php endwhile?>
			</ul>
		</div>
	</section>
	
	<section>
		<div class="wrapper">
			<h3 class="category-title">Últimas</h3>
			<ul class="no-bullet latest">
				<?php
					$latest = new WP_Query( array( 'posts_per_page' => 4, 'post__not_in' => $featuredExclude ));
					while ($latest->have_posts()) : $latest->the_post(); $latestExclude[] = get_the_ID(); $loopcounter++;
				?>
				<li class="grid grid-3 latest-item">
					<a href="<?php the_permalink() ?>" class="latest-link">
						<img src="<?php the_field('post_thumb'); ?>" alt="" class="latest-thumb">
						<div class="latest-description">
							<span class="latest-category"><?php foreach((get_the_category()) as $category) { echo $category->cat_name . ''; } ?></span>
							<h2 class="latest-title"><?php the_title(); ?></h2>
							<span class="latest-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
						</div>
					</a>
				</li>
				<?php endwhile?>
			</ul>
		</div>

		<div class="wrapper">
			<h3 class="category-title">Lorem</h3>
			<ul class="no-bullet latest">
				<?php
					$bycategories = new WP_Query( array( 'cat'  => 3, 'posts_per_page' => 4, 'post__not_in' => $featuredExclude ));
					while ($bycategories->have_posts()) : $bycategories->the_post();
				?>
				<li class="grid grid-3 latest-item">
					<a href="<?php the_permalink() ?>" class="latest-link">
						<img src="<?php the_field('post_thumb'); ?>" alt="" class="latest-thumb">
						<div class="latest-description">
							<h2 class="latest-title"><?php the_title(); ?></h2>
							<span class="latest-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
						</div>
					</a>
				</li>
				<?php endwhile?>
			</ul>
		</div>

		<div class="wrapper">
			<h3 class="category-title">Ipsum</h3>
			<ul class="no-bullet latest">
				<?php
					$bycategories = new WP_Query( array( 'cat'  => 4, 'posts_per_page' => 4, 'post__not_in' => $featuredExclude ));
					while ($bycategories->have_posts()) : $bycategories->the_post();
				?>
				<li class="grid grid-3 latest-item">
					<a href="<?php the_permalink() ?>" class="latest-link">
						<img src="<?php the_field('post_thumb'); ?>" alt="" class="latest-thumb">
						<div class="latest-description">
							<h2 class="latest-title"><?php the_title(); ?></h2>
							<span class="latest-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
						</div>
					</a>
				</li>
				<?php endwhile?>
			</ul>
		</div>
	</section>
	
	<?php get_footer(); ?>
</body>
</html>