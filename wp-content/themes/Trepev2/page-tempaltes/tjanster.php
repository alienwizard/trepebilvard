<?php







/*







Template name: Våra Tjänster







*/







get_header();







?>







<section class="section-white single">















	<div class="container">







	<h1>Våra tjänster</h1>







	<div class="row">















	<div class="service-wrap">











		<?php 







		/*







			if ( have_posts() ) {







				while ( have_posts() ) {







					the_post(); 







					//print_r($post);







					//







					// Post Content here







					the_content();







					//







				} // end while







			} // end if







			*/



?>











<?php $query8 = new WP_Query(array( 'post_type' => 'tjanst', 'post_per_page' => -1) );







					  while ( $query8->have_posts() ) : $query8->the_post(); ?>







					<?php //print_r($post);



					$parent_id = $post->post_parent;







					?>











					<?php if ($post->post_parent == 0) { 







						$prev_parent_id = $post->ID







						?>



						<div class="service-header">







							<div class="tjanst-image"><?php the_post_thumbnail();?></div>



							<?php the_title('<h2>', '</h2>');?>



							<?php the_content();?>







						</div>



					<?php }else if($post->post_parent == $prev_parent_id){ ?>



					<div class="tjanst-item">

					<i class="fa fa-check" aria-hidden="true"></i>

						<?php 



						the_title('<h4>', '</h4>'); ?>



						<div class="hidden-tjanst"><?php the_content(); ?></div>



					</div>







					<?php }







					?>







	    <?php endwhile;?>










<!--
<div class="ajax-field">







	<div class="ajax-title"></div>







	<div class="ajax-content" id="single-post-container">







		<?php 







			if ( have_posts() ) {







				while ( have_posts() ) {







					the_post(); 







					//print_r($post);







					//







					// Post Content here







					the_content();







					//







				} // end while







			} // end if







?>







	</div>







</div>


-->




<div class="row">







	<div class="col-md-12">







		<div class="offert"></div>







	</div>







</div>



</div>







<div class="sibebar-map">

	<div class="map-wrap">



	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d8014.600742244588!2d17.6581475!3d59.8549495!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb6c1699fb559b48f!2sTrepe+Bilv%C3%A5rd+AB+-+Autoexperten!5e0!3m2!1ssv!2sse!4v1463573083032" width="300" height="800" frameborder="0" style="border:0" allowfullscreen></iframe>

</div>

</div>



</div>



</div>







</section>























<script>







   $(document).ready(function(){





   	var sideMapPos = $('.sibebar-map').offset();





var sideMapStartPos = sideMapPos.top;







   	$('.tjanst-item').click(function(){



   		$('.hidden-tjanst',this).slideToggle();









   	});







   	

$(window).scroll(function(){





	var top = $(window).scrollTop()









	headerpos = $('.bottom-header').offset();







	var headertop  = headerpos.top;





	var sideMapPos = $('.sibebar-map').offset();





	if (top >= sideMapStartPos){

		$('.map-wrap').addClass('fixed');

		$('.map-wrap').offset({ top: headertop + $('.bottom-header').height()});



	}else if(top < sideMapStartPos){

		$('.map-wrap').removeClass('fixed');

	}



});









    });







</script>















<?php 







get_footer();







?>