<?php
get_header();
?>
<div class="row">
	<div class="text-center">
		<h1>Parent Testimonial</h1>
	</div>
</div>
<div class="row">
	<div class="col-xs-offset-1 col-md-offset-2 col-xs-10 col-md-8">
		<?php
		$args = array('post_type' => 'testimonial', 'posts_per_page' => 10);
		$loop = new WP_Query($args);
		while($loop->have_posts()){
			$loop->the_post();
		?>
		<h1 class="row"><?php echo get_the_title(); ?></h1>
		<hr class="hr-purple">
		<div class="row">
			<div class="col-xs-3 full-width-xs thumbnail-testimonial">
				<?php 
				if(has_post_thumbnail($loop->post_id)){
					echo get_the_post_thumbnail( 0, 'medium' , 'class=img-responsive' );
				}
				else{
					echo '<img src="'.plugins_url('img/quotation.png',__DIR__).'" class="img-responsive">';
				}
				?>
			</div>
			<div class="col-xs-9 full-width-xs">
				<p class="excerpt"><?php echo get_the_content();?></p>
			</div>
		</div>
		<div class="gap-div"></div>
		<?php
		}
		?>
	</div>
</div>
<div class="gap-div"></div>
<?php
get_footer();
?>