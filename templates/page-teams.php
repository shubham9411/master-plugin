<?php
get_header();
?>
<div class="row">
	<div class="col-xs-offset-1 col-md-offset-3 col-xs-10 col-md-6">
		<div class="kidprint text-center">
			<h1 class="border-bottom-text">Meet Our Team</h1>
		</div>
		<div>
			<p class="text-center">
				Our practice specializes in the treatment of developmental disabilities and childhood disorders affecting the way children function and communicate in their world.<br><br>
				Our licensed physical therapists, occupational therapists, and speech-language pathologists are trained specifically in the treatment of infants, children and adolescents. In our practice it is our goal to help each and every child exceed expectations on a daily basis
			</p>
		</div>
	</div>
</div>
<div class="gap-div"></div>
<div class="row">
	<div class="col-xs-offset-1 col-xs-10">
		<?php
		$args = array('post_type' => 'members', 'posts_per_page' => 10);
		$loop = new WP_Query($args);
		while($loop->have_posts()){
			$loop->the_post();
			$values = get_post_custom(get_the_id());
			$designation = isset($values['cc_member_designation']) ? esc_attr($values['cc_member_designation'][0]) : '';
			$email = isset($values['cc_member_mail']) ? esc_attr($values['cc_member_mail'][0]) : '';
			$therapy = isset($values['cc_member_therapy']) ? esc_attr($values['cc_member_therapy'][0]) : '';
		?>
		<div class="member">
			<div class="col-xs-offset-1 col-md-offset-3 col-xs-10 col-md-6">
				<div class="kidprint text-center">
					<h1><?php echo $therapy;?></h1>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="gap-xs"></div>
			<div class="mediumpurple-color">
				<div class="team-heading font-white row">
					<div class="col-xs-12 col-sm-7">
						<h2>
						<p class="inline-block-text member-title"><?php the_title();?></p>
						<p class="inline-block-text member-designation"><i><?php echo $designation; ?></i></p>
						</h2>
					</div>
					<div class="col-sm-5">
						<h2 class="pull-right  hidden-xs">
						<a href="mailto:Opportunities@SpecialNeedsPT.com">
							<p class="member-title font-white">
								<?php echo $email;?>
							</p>
						</a>
						</h2>
					</div>
				</div>
			</div>
			<div class="full-border-purple">
				<div class="gap-top">
					<div class="row">
						<div class="col-xs-6 col-sm-4 full-width-xs">
							<?php echo get_the_post_thumbnail(0,'medium','class=img-responsive');?>
						</div>
						<div class="col-xs-6 col-sm-8 full-width-xs">
							<p class="excerpt">
								<?php echo get_the_content();?>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="gap-top"></div>
		</div>
		<?php
		}
		?>
		<div class="member">
			<div class="mediumpurple-color col-xs-12">
				<div class="team-heading font-white	">
					<h2 class="inline-block-text"><p class="member-title">You</p></h2>
					<h2 class="pull-right">
					<a href="mailto:Opportunities@SpecialNeedsPT.com">
						<p class="member-title font-white">
							Email Resume at: Opportunities@SpecialNeedsPT.com
						</p>
					</a>
					</h2>
				</div>
			</div>
			<div class="full-border-purple col-xs-12">
				<div class="gap-top">
					<div class="row">
						<div class="col-xs-6 col-sm-4 graphite-bg your-image full-width-xs">
							<h1 class="text-center">YOU</h1>
						</div>
						<div class="col-xs-6 col-sm-8 full-width-xs">
							<p class="excerpt">
								Special Needs Pediatric Therapy Services will consider licensed physical and occupational therapists with a minimum of one year pediatric experience. NDT &amp; SI training is highly favored.
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="gap-top"></div>
		</div>
	</div>
</div>
<div class="gap-top"></div>
<?php
get_footer();
?>