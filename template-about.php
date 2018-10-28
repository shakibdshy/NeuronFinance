<?php 

/*
Template Name: About Template

*/ 


get_header(); ?>

        <?php while ( have_posts() ) : the_post(); ?>
<!-- ::::::::::::::::::::: Page Title Section:::::::::::::::::::::::::: -->
		<section class="page-title">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<!-- breadcrumb content -->
						<div class="page-breadcrumbd">
							<h2><?php the_title(); ?></h2>
							<p><a href="<?php echo site_url(); ?>">Home</a> / <?php the_title(); ?></p>
						</div><!-- end breadcrumb content -->
					</div>
				</div>
			</div>
        </section><!-- end breadcrumb -->
        
        <?php get_content_part('content/promo'); ?>
        <?php get_template_part('content/about'); ?>
        <?php endwhile;?>


<?php get_footer(); ?>