<?phpget_header();$_COOKIE['post'] = $post->ID;$error = $_SESSION['error_msg'];?><section class="slider">	<div class="container">		<div class="row">		<div class="col-md-4 col-xs-12" class="login-box">		<div class="register">		<h3>Logga in och hitta en tid som passar</h3>			<form method="post" accept="<?php bloginfo('url');?>/wp-content/plugins/userlogin">				<input type="text" name="reg" id="reg" placeholder="ABC 123" style="background-image:url('<?php bloginfo( 'template_url' );?>/img/reg.png')">				<div class="phone-wrap">				<input type="text" name="phone" placeholder="070 ...">				<i class="fa fa-mobile" aria-hidden="true"></i>				</div>				<input type="hidden" name="ID" value="<?php echo $post->ID; ?>">									<input type="submit" name="reg-submitted" value="logga in">					<div class="error">						<?php if ($error && $error != ""){							//echo $_SESSION['error_msg'];							echo "<h3 id='error'>" .$error. "</h3>";						}?>					</div>																</form>			<div class="login-info">				<h4>För att logga in och boka en tid för dig och ditt fordon behöver du endast fylla i de två fälten ovan och sedan klicka på "logga in"</h4>			</div>		</div>					</div>			<div id="slideshow" class="col-md-8 col-xs-12">				<div class="swiper-container">					<div class="swiper-wrapper" >						<?php $query8 = new WP_Query(array( 'post_type' => 'banner', 'post_per_page' => -1) );						//print_r($query8);						while ( $query8->have_posts() ) : $query8->the_post(); ?>						<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>						<div class="swiper-slide" style="background-image:url(<?php echo $url;?>);">							<div class="banner-text-box animated">								<?php the_title('<h3>', '</h3>');  ?>								<?php the_content();?>								<a class="btn-blue" href="<?php the_permalink(); ?>">Läs mer</a>															</div>							<div class="overlay"></div>						</div>						<?php endwhile;?>						<?php wp_reset_postdata(); ?>					</div>					<div class="swiper-pagination"></div>										<div class="swiper-button-prev"></div>					<div class="swiper-button-next"></div>				</div>			</div>		</div>	</div></section><section class="welcome">	<div class="container">		<div class="row">			<div class="col-md-8 col-sm8">								<div class="welcome-content">					<div class="border-wrap">						<div class="welcome-text section">						<h4 class="small-title">Välkommen!</h4>							<?php							if ( have_posts() ) {								while ( have_posts() ) {									the_post();							//							// Post Content here									the_content();							//							} // end while							} // end if							?>						</div>						</div>						<div class="border-wrap">							<div class="fb-like" 								data-href="<?php bloginfo('url');?>/tips-tricks" 								data-layout="button_count" 								data-action="like" 								data-share="true"								data-show-faces="true">							</div>						<div class="newsletter section">							<h4 class="small-title">Tips och tricks</h4>							<?php the_field('tips_och_tricks'); ?>							<p>Vi lanserar strax vår tips och tricks-section. Där kommer du kunna läsa om alla möjliga tips som vår kunniga personal tagit fram</p>							<?php $query8 = new WP_Query(array( 'post_type' => 'tips', 'post_per_page' => 4) ); ?>				<div id="tipsslider">				<div class="swiper-container">					<div class="swiper-wrapper" >						<?php	while ( $query8->have_posts() ) : $query8->the_post(); ?>							<div class="swiper-slide tips-slide">							<div class="top-slide-b" style="background-image:url('<?php the_post_thumbnail_url('medium') ?>')">							<?php //the_post_thumbnail('medium');?>							</div>							<h3><?php the_title(); ?></h3>							<?php the_excerpt();?>								</div>								<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>							<?php endwhile;?>						</div>											<div class="swiper-button-prev"></div>					<div class="swiper-button-next"></div>						</div>						</div>						</div>						</div>						<div class="border-wrap">						<div class="newsletter section">													<h4 class="small-title">Nyhetsbrev</h4>							<div class="news-image">							<img src="http://localhost:8080/trepe/wp-content/uploads/2016/08/footer-mail-ico.png">							</div>							<div class="news-text">							<?php the_field('nyhetsbrev'); ?>							<p>Vi skickar ut ett nyhetsbrev varje vecka med Tips och tricks kring skötsels av er bil, många erbjudanden exklusiva erbjudanden, och mycket, mycket mer.</p>							<p>Fyll i din e-post här nere för att anmäla dig till nyhetsbrevet och börja få all möjlig nyttig information innom kort!</p>							<div class="newletter-form">														<?php echo do_shortcode('[contact-form-7 id="252" title="Nyhetsformulär"]');?>							</div>							</div>							<div class="clearfix"></div>						</div>						</div>					</div>		<div class="row">			<div class="col-md-12">							</div>		</div>		<div class="row">			<div class="col-md-12">				<div class="search-wrap">				<h3 class="small-title">Sök upp oss i följande tjänster<!--<i class="fa fa-calendar" aria-hidden="true"></i>--></h3>					<div class="search-item-wrap">						<div class="service-item">							<div class="service-image">								<a href=""><img src="<?php bloginfo('template_url');?>/img/carly-logo-black.png"></a></div>															</div>							<div class="service-item">								<div class="service-image"><a href=""><img src="<?php bloginfo('template_url');?>/img/lasingoo.png"></a></div>															</div>							<div class="service-item">								<div class="service-image"><a href=""><img src="<?php bloginfo('template_url');?>/img/autobutler-logo.png"></a></div>															</div>						</div>						<div class="clear"></div>					</div>				</div>			</div>				</div>							<div class="col-md-4 col-sm-4">				<div class="border-wrap">					<div class="sidebar-offer">						<h4 class="small-title">Veckans erbjudande</h4>						<?php 						$post_object = get_field('veckans_erbjudande');						if( $post_object ): 							$post = $post_object;							setup_postdata( $post ); 						?>						<div class="offerimg">												<?php the_post_thumbnail('large'); ?>						<h4><?php the_title(); ?></h4>						</div>						<?php the_content(); ?>						<a class="btn-blue small" href="<?php the_permalink(); ?>">Läs mer</a>						   <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?><?php endif; ?>					</div>					</div>					<div class="border-wrap">					<div class="facebook-wrap">						<h4 class="small-title">Gilla oss på facebook</h4>						<?php the_field('facebook',4);?>					</div>				</div>					<div class="border-wrap">					<div class="pay-wrap">						<h4 class="small-title">BETALA PÅ DITT SÄTT</h4>						<div class="pay-image"><img src="http://localhost:8080/trepe/wp-content/uploads/2016/08/card-logos.png"></div>						<div class="pay-text"><p>Hos Autoexperten kan du betala på det sätt som passar dig! Vi jobbar med säkra betalningar med kryptering för din säkerhet.</p></div>						<div class="clearfix"></div>											</div>				</div>			</div>			</div>			<div class="clearfix"></div>		</div>	</div></section><!--<section id="ratings">		<div class="container">				<div class="row">						<div class="section-wrap">								<h3>Några av våra nöjda kunder</h3>								<div class="row">										<div class="col-md-6">												<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fbkreseblogg%2Fposts%2F10153558252353037%3A0&width=500" width="500" height="316" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>										</div>										<div class="col-md-6">												<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fdanne.helmet%2Fposts%2F951151908292651%3A0&width=500" width="500" height="316" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>										</div>								</div>						</div>				</div>		</div></section>-->	<!--		<section class="section-blue">				<div class="container"><div class="main-text-wrap"><i class="fa fa-clock-o"></i><h2>Vårt kontor i Bålsta har öppet vardagar 08:30-16:30.</h2></div></div>		</section>	-->	<script type="text/javascript">		$(document).ready(function(){				var h = $('.banner').height();			$('.banner').prepend('<div class="overlay">');			$('.banner').append('</div>');			console.log(h);		});	</script>	<?php get_footer(); ?>