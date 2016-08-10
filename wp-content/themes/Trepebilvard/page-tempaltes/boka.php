<?php
/*



Template name: offert



*/



get_header();



?>



<?php

// define variables and set to empty values

$car_brand = $car_model = $car_motor = $car_year = $name = $lastname = $email = $subject = $ovrigt = $nameErr = $lastnameErr = $emailErr = $tack = $phone =  "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {



$captcha = $_POST["g-recaptcha-response"];


$car_brand = test_input($_POST["car_brand"]);

$car_model = test_input($_POST["car_model"]);

$car_motor = test_input($_POST["car_motor"]);

$car_year = test_input($_POST["car_year"]);

  $name = test_input($_POST["customer_name"]);


  $lastname = test_input($_POST["customer_lastname"]);


  $email = test_input($_POST["customer_email"]);

  $phone = test_input($_POST["customer_phone"]);

  $done1 = test_input($_POST["done1"]);

  $done2 = test_input($_POST["done2"]);

  $ovrigt = test_input($_POST["ovrigt"]);


  	if(!empty($_POST['check_list'])) {
    foreach($_POST['check_list'] as $check) {


    	$services[] = $check;

    	//print_r($services);
            //echo $check; //echoes the value set in the HTML form for each checked checkbox.
                         //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                         //in your case, it would echo whatever $row['Report ID'] is equivalent to.
    }
}



  if (empty($_POST["customer_name"])) {

    $nameErr = "Name is required";

  } else {

    $name = test_input($_POST["customer_name"]);

  }


    if (empty($_POST["customer_lastname"])) {

    $lastnameErr = "Vänligen fyll i efternamn";

  } else {

    $lastname = test_input($_POST["customer_lastname"]);

  }



  if (empty($_POST["customer_email"])) {

    $emailErr = "Email is required";

  } else {

    $email = test_input($_POST["customer_email"]);




    $subject = "Offertförfrågan";

    $mailservice = implode("<br />- ",$services);



$headers[] = 'Content-Type: text/html; charset=UTF-8';

$headers[] = 'From: Hemsidan - Förfrågan <info@trepebilvard.se.mediahelpcrm.se>';

$body = "<h1>Offertförfrågan</h1>Bilmärke: ".$car_brand."<br />Bilmodell: ".$car_model."<br />Motorstorlek/variant:".$car_motor."<br />Registreringsdatum: ".$car_year."<br/>Namn: ".$name." Efternamn:".$lastname."<br />Telefon: ".$phone."<br />Email: ".$email."<br/>Önskade tjänster:<br />- ".$mailservice."<br />Arbetet ska vara klart tidigast: ".$done1."<br />Arbetet ska vara klart som senast: ".$done2."<br />Meddelande: ".$ovrigt;

$recipients = array($email, 'johanwendin@gmail.com','info@trepebilvard.se');

    if(wp_mail( $recipients, $subject, $body, $headers)){



    	$tack = "Tack! Vi återkopplar inom kort!";

    }





  }

}


function test_input($data) {

  $data = trim($data);

  $data = stripslashes($data);

  $data = htmlspecialchars($data);

  return $data;

}

?>



<section class="section-white single offert">

	<div class="container">

	<div class="container-wrap">

	<div class="content">

		<?php 

			if ( have_posts() ) {

				while ( have_posts() ) {

					the_post(); 

					//print_r($post);


					// Post Content here

					the_content();

					//

				} // end while

			} // end if

?>



<?php $query8 = new WP_Query(array( 'post_type' => 'page', 'post_parent' => 7, 'post_per_page' => -1) );

//print_r($query8);

					  while ( $query8->have_posts() ) : $query8->the_post(); ?>



		<?php the_title('<h2>', '</h2>');  ?>



		<?php the_content();?>

	    <?php endwhile;?>



</div>




<div class="row">




	    <div class="form col-md-8 boka-wrap">

<form method="POST" name="offert"  onsubmit="return form_validation()" action="<?php the_permalink(); ?>">


<div class="info-section" id="bil">


<div class="row">


<div class="col-md-6 col-sm-6">

							<label>Välj bilmärke</label>



							<input type="text" name="car_brand" placeholder="">



							<label>skriv in modell</label>



							<input type="text" name="car_model" placeholder="">



</div>


<div class="col-md-6 col-sm-6">

							<label>Motorstorlek/variant</label>



							<input type="text" name="car_motor" placeholder="">



							<label>Registreringsdatum:</label>



							<input type="text" name="car_year" placeholder="">



</div>

</div>

</div>

<div class="info-section" id="tjanst">
	<h4 class="sub-title">Vilken tjänst är du intresserad av? Klicka på rubriken för att läsa mer</h4>
	<?php $count = 0; ?>
	<?php $query8 = new WP_Query(array( 'post_type' => 'tjanst', 'post_per_page' => -1) );
	while ( $query8->have_posts() ) : $query8->the_post(); ?>
	<?php $parent_id = $post->post_parent;

	?>

					<?php if ($post->post_parent == 0) {  


						$prev_parent_id = $post->ID



						?>


												<?php if($count != 0){ ?>



					<div class="clearfix"></div>	



						</div>



						<?php }else { ?>


							<?php } ?>



							<div class="service-boka-wrap">



		



								<div class="service-header">



																							<?php the_title('<h4>', '</h4>');?>



									<div class="tjanst-image"><?php the_post_thumbnail();?></div>







									<?php $count++ ?>



								</div>



								<?php }else if($post->post_parent == $prev_parent_id){ ?>



									<div class="tjanst-item-boka col-md-3 col-sm-3">



										<?php 



										the_title('<h5>', '</h5>'); ?>







										<input type="checkbox" name="check_list[]" value="<?php echo get_the_title(); ?>">



									</div>







									<?php }







									?>







								<?php endwhile;?>



								<?php wp_reset_postdata(); ?>





								<div class="clearfix"></div>


							</div>





</div>


<div class="info-section" id="person">


<h4 class="sub-title">Dina uppgifter</h4>



<div class="row">


<div class="col-md-6 col-sm-6">
	<label>Förnamn:</label> <span class="error">* <?php echo $nameErr;?></span>
	<input type="text" id="customer_name" name="customer_name" /><br />
</div>

<div class="col-md-6 col-sm-6">
	<label>Efternamn:</label> <span class="error">* <?php echo $lastnameErr;?></span>
	<input type="text" id="customer_name" name="customer_lastname" /><br />
</div>


<div class="col-md-6 col-sm-6">

<label>Din Email:</label>

  <span class="error">* <?php echo $emailErr;?></span>

<input type="text" id="customer_email" name="customer_email" /><br /></div>

<div class="col-md-6 col-sm-6">
<label>Ditt Telefonnummer: </label>
<input type="text" id="customer_phone" name="customer_phone" value=""/><br /></div>
</div>

								<div class="calendar-wrap">



								<h4 class="sub-title">Önskemål om tid</h4>



								<div class='col-md-5'>



								<label>Jobbet ska utföras tidigast</label>



									<div class="form-group">



										<div class='input-group date' id='datetimepicker1'>







											<input type='text' name="done1" class="form-control" />



											<span class="input-group-addon">



												<span class="glyphicon glyphicon-calendar"></span>



											</span>



										</div>



									</div>



								</div>



								<div class='col-md-5'>



									<label>Jobbet ska utföras senast</label>



									<div class="form-group">



										<div class='input-group date' id='datetimepicker2'>



											<input type='text' name="done2" class="form-control" />



											<span class="input-group-addon">



												<span class="glyphicon glyphicon-calendar"></span>



											</span>



										</div>



									</div>



								</div>



																<div class="clearfix"></div>



								</div>

<div class="row">

								<div class="col-sm-12 col-md-12">



									<label>Meddelande till verkstaden. Vänligen specificera så noggrant du kan vad du önskar ha hjälp med på bilen gällande service & reparation.</label>



									<textarea name="ovrigt" id="ovrigt"></textarea>



								</div>

</div>


<div id="finalrow" class="row">

<div class="col-md-6 col-sm-6">
<div class="g-recaptcha" data-sitekey="6Le_-yATAAAAAAAARa700XsGrtz34vxwQJzpOj28"></div>
</div>

<div class="col-md-6 col-sm-6">
<input type="submit" value="Skicka Förfrågan"/>
</div>
</div>

</div>



</form>

<div class="tack">

	<h2><?php echo $tack; ?></h2>

</div>

</div>

</div>

</div>

</div>

</section>







<script type="text/javascript">

function form_validation() {

/* Check the Customer Name for blank submission*/

var customer_name = document.forms["customer_details"]["customer_name"].value;

if (customer_name == "" || customer_name == null) {

alert("Name field must be filled.");

return false;

}



/* Check the Customer Email for invalid format */

var customer_email = document.forms["customer_details"]["customer_email"].value;

var at_position = customer_email.indexOf("@");

var dot_position = customer_email.lastIndexOf(".");

if (at_position<1 || dot_position<at_position+2 || dot_position+2>=customer_email.length) {

alert('Given email address is not valid.');

return false;

}

}

</script>



<script type="text/javascript">



(function($) { 


   		$('#datetimepicker1').datetimepicker({
   		});



		$('#datetimepicker2').datetimepicker({

		});



})(jQuery)



   $(document).ready(function(){



	$('.service-header').click(function(){



			console.log(this);



			var parent = $(this).parent();



			$('.tjanst-item-boka', parent).slideToggle();



		})



	});







</script>








<?php 



get_footer();



?>