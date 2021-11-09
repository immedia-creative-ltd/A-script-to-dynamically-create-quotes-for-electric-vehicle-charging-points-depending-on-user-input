<?php
/**
 * Plugin Name: Chargepoint Calculator
 * Plugin URI: http://www.immedia-creative.com
 * Description: Displays calculator when shortcode 'chargecalculator' is entered on page.
 * Version: 1.0.0
 * Author: Chris Brown
 * Author URI: http://www.immedia-creative.com
 * License: GPL2
 */


function cbcalc_register_shortcodes(){
	add_shortcode( 'chargecalculator', 'charge_calculator' );
}

add_action( 'init', 'cbcalc_register_shortcodes');

function charge_calculator()
{
	
if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["sendestimate"])){	
$to ="clc@thwhite.co.uk,kld@thwhite.co.uk";
$subject="EV Chargepoint Calculator contact form";
$message="EFS Chargepoint Calculator contact.\n\n";
$headers="Cc:dan.cooper@thwhite.co.uk,nicola.feltham@thwhite.co.uk,chris.brown@immedia-creative.com";
//Cleanup Text
//Firstname
if (empty($_POST["firstname"])) {
    $firstnameErr = "Firstname is required";
  } else {
$message.= "First Name: ";
$firstname = sanitize_text_field($_POST["firstname"]);
$message.= $firstname ."\n"; 
}

//Surnname
if (empty($_POST["surname"])) {
    $surnameErr = "surname is required";
  } else {
$message.= "Surname: ";
$surname = sanitize_text_field($_POST["surname"]);
$message.= $surname."\n\n"; 
}

//Email
if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
$message.= "Email: ";
$email = sanitize_email($_POST["email"]);
$message.= $email."\n\n"; 
}

//Telephone
if ($_POST["telephone"]){
$message.= "Telephone: ";
$telephone = sanitize_text_field($_POST["telephone"]);
$message.= $telephone."\n\n"; 
}



$message.= "--  Calculator -- \n\n"; 

//output calculation value
if ($_POST["calculation"]){
$message.= "Calculated Cost: £";
$calculation = sanitize_text_field($_POST["calculation"]);
$message.= $calculation."\n\n"; 
}

//Charger Location Postcode
if ($_POST["postcode"]){
$message.= "Location Postcode Prefix: ";
$postcode = sanitize_text_field($_POST["postcode"]);
$message.= $postcode."\n\n"; 
}

//Charger on Wall or Post
if ($_POST["wallpost"]){
$message.= "Post or Wall: ";
$wallpost = sanitize_text_field($_POST["wallpost"]);
$message.= $wallpost."\n\n"; 
}

//Ground Composition (Surface)
if ($_POST["surface"]){
$message.= "Ground Composition: ";
$surface = sanitize_text_field($_POST["surface"]);
$message.= $surface."\n\n"; 
}

//Ground Composition (Surface)
if ($_POST["groundworks"]){
$message.= "Groundworks required? : ";
$groundworks = sanitize_text_field($_POST["groundworks"]);
$message.= $groundworks."\n\n"; 
}

//Trench length 
if ($_POST["trenchlength"]){
$message.= "Length of Trench: ";
$trenchlength = sanitize_text_field($_POST["trenchlength"]);
$message.= $trenchlength."\n\n"; 
}

//Length of Cable Run 
if ($_POST["cablelength"]){
$message.= "Length of Cable Run: ";
$cablelength = sanitize_text_field($_POST["cablelength"]);
$message.= $cablelength."\n\n"; 
}

//equipment
if ($_POST["equipment"]){
$message.= "Equipment Selected: ";
$equipment = sanitize_text_field($_POST["equipment"]);
$message.= $equipment."\n\n"; 
}

//send the email

if($firstnameErr){
return ('<h3>Sorry</h3><p>first name is required.<a href="javascript:history.go(-1)"> Back</a></p>');
}
else if($surnamenameErr){
return ('<h3>Sorry</h3><p>Surname is required.<a href="javascript:history.go(-1)"> Back</a></p>');
}
else if($firstnameErr){
return ('<h3>Sorry</h3><p>Email is required.<a href="javascript:history.go(-1)"> Back</a></p>');
}
else{
wp_mail ( $to, $subject, $message, $headers);
return ('<h3>Thank You</h3><p>We will get back to you shortly.</p>');
}
}

  else{	
	
	return ('
	

	
<script src="https://kit.fontawesome.com/193569e146.js" crossorigin="anonymous"></script>
<link rel="stylesheet" media="all" href="/wp-content/plugins/chargepoint-calculator/calcstyle.css" />
<script type="text/javascript" src="/wp-content/plugins/chargepoint-calculator/update-output.js"></script>
	<div id="preloader">
	<img src="/wp-content/uploads/2020/06/commercial-grey-new.gif" width="1" height="1" />
	<img src="/wp-content/uploads/2020/06/commercial-orange-new.gif" width="1" height="1" />
	<img src="/wp-content/uploads/2020/06/work-grey-new.gif" width="1" height="1" />
	<img src="/wp-content/uploads/2020/06/work-orange-new.gif" width="1" height="1" />
	<img src="/wp-content/uploads/2020/06/domestic-grey-new.gif" width="1" height="1" />
	<img src="/wp-content/uploads/2020/06/domestic-orange-new.gif" width="1" height="1" />
</div>
<div id="outer">
<div id="bigwrap">
<h2>Use our helpful tool to estimate your costs of installing an Electric Vehicle chargepoint</h2>
	
<form id="calc" name="calc" method="POST" class="wpb_content_element" onChange="updateOutput()">
	
	
<div class="inputwrap comordom">

<h3>Please choose between Commercial, Workplace or Domestic Use</h3>	
<div class="row">

<div class="col-md-4"  style="text-align:center;">
 <label for="commercial"><input type="radio" name="comdom" id="commercial" value="commercial">
<div id="boxa" class="ebox"><img src="/wp-content/uploads/2020/06/commercial-grey-new.gif" alt="commercial" /></div>
 COMMERCIAL</label>
 </div>

<div class="col-md-4"  style="text-align:center;">
 <label for="work"><input type="radio" name="comdom" id="work" value="work">
<div id="boxc" class="ebox"><img src="/wp-content/uploads/2020/06/work-grey-new.gif" alt="workplace" /></div>
 WORKPLACE</label>
 </div>
 
<div class="col-md-4" style="text-align:center;">
 <label for="domestic"><input type="radio" name="comdom" id="domestic" value="domestic">
<div id="boxb" class="ebox"><img src="/wp-content/uploads/2020/06/domestic-grey-new.gif" alt="domestic" /></div>
DOMESTIC</label>
</div>
</div>

 

	
		</div>	
		
		<div id="domesticwrap" class="hide"> 
		
		<p>Our standard home charger pricing is based on a 7kW charge and single phase supply. For more powerful options please ring us directly.</p>
		
	<div class="inputwrap">	
		<h3>Please select where the charge installation is located?</h3>
		<p><span class="tooltiptext">These are the only postcode regions we serve for residential electric vehicle charge installation.</span></p>
			
	
		<select id="P1" name="postcode">
  <option value="BA" selected>BA</option>
  <option value="SN">SN</option>
  <option value="SP">SP</option>
  <option value="BS">BS</option>
  <option value="OX">OX</option>
  <option value="GL">GL</option>
  <option value="RG">RG</option>
  <option value="GU">GU</option>
  <option value="DT">DT</option>
  <option value="BH">BH</option>
  <option value="SL">SL</option>
  <option value="SO">SO</option>
</select>
 
 </div>

<div class="inputwrap">
<h3>Do you require a wall mounted or post mounted charger?</h3>

		<p>  
		
	<input type="radio" id="wall" name="wallpost" value="wall">
		  <label for="wall">wall</label> </p>
  
		<p>  <input type="radio" id="post" name="wallpost" value="post" checked>
		  <label for="post">post</label></p>
	  
</div>




<div class="inputwrap">
<h3>Are groundworks needed?</h3>
		  <input type="radio" id="yes" name="groundworks" value="yes">
		  <label for="yes">Yes</label><br>
		  <input type="radio" id="no" name="groundworks" value="no" checked>
		  <label for="no">No</label><br>
	</div>
	
	
	
<div class="inputwrap hide" id="trench">	
<h3>Length of groundworks trench</h3>
<label for="trenchlength">Length in Metres:</label>
  <input type="number" id="trenchlength" name="trenchlength" min="0" max="1000" step="1" value="0">
</div>
	
<div class="inputwrap" id="surfacetype">
<h3>Please confirm the ground composition, where the charger will be located?</h3>
		  <input type="radio" name="surface" id="grass" value="soft" checked>
		 <label for="grass">grass</label><br />
		    <input type="radio" name="surface" id="gravel" value="soft">
		 <label for="gravel">gravel</label><br />
		    <input type="radio" name="surface" id="concrete" value="hard">
		 <label for="concrete">concrete</label><br />
		    <input type="radio" name="surface" id="tarmac" value="hard">
		 <label for="tarmac">tarmac</label><br />
		    <input type="radio" name="surface" id="blockpaving" value="hard">
		 <label for="blockpaving">block paving</label><br />
</div>	
	
	
<div class="inputwrap">
<h3>Length of Cable Run</h3>
<p><span class="tooltiptext">Use this illustration to measure your cable run accurately to the nearest metre from point of electrical supply to the base of the charger</span></p>
<p><img src="https://efs.thwhite.co.uk/wp-content/uploads/2020/05/Charge-point-cable-route-1.png" alt="Length of cable run"/></p>
<label for="cablelength">Length in Metres:</label>
  <input type="number" id="cablelength" name="cablelength" min="0" max="1000"  value="0" >
</div>


<div class="inputwrap charger">
<h3>Select Charger</h3>
<div class="row">
<div class="col-md-3 col-sm-6" style="text-align:center;">
          <label for="podpoint">
		  <input type="radio" name="equipment" id="podpoint" value="podpoint" checked>
		  <div id="box1" class="ebox"><img src="https://efs.thwhite.co.uk/wp-content/uploads/2020/05/pod-point-2-tick.jpg" alt="podpoint" /></div>
		 PODPOINT</label>
		 </div>
		 
	<div class="col-md-3  col-sm-6" style="text-align:center;">
 
		 <label for="wallbox"><input type="radio" name="equipment" id="wallbox" value="wallbox">
		 <div id="box2" class="ebox"><img src="https://efs.thwhite.co.uk/wp-content/uploads/2020/05/wall-box-1.jpg" alt="wallbox" /></div>	
		 WALLBOX</label>
		 </div>
		 
		 <div class="col-md-3 col-sm-6"  style="text-align:center;">
		 <label for="tesla">
		    <input type="radio" name="equipment" id="tesla" value="tesla">
	 <div id="box3" class="ebox"><img src="https://efs.thwhite.co.uk/wp-content/uploads/2020/05/tesla.jpg" alt="tesla" /></div>
		TESLA</label>
		 </div>
		 
		 <div class="col-md-3 col-sm-6"  style="text-align:center;">
		 <label for="owncharger"> 
		    <input type="radio" name="equipment" id="owncharger" value="IHaveTeslaChargerAlready">
			<div id="box4" class="ebox"><img src="https://efs.thwhite.co.uk/wp-content/uploads/2020/05/tesla.jpg" alt="Tesla own charger" /></div>
		TESLA INSTALL ONLY (I have the Tesla Charger already)</label>
		 </div>
		 
		 	 
			 <div class="col-md-3 col-sm-6"  style="text-align:center;">
		 <label for="eo"> 
		    <input type="radio" name="equipment" id="eo" value="eo">
			<div id="box5" class="ebox"><img src="https://efs.thwhite.co.uk/wp-content/uploads/2020/09/eo.jpg" alt="EO" /></div>
		EO CHARGER</label>
		 </div> 
		 </div>
</div>	

<div id="totalestimate">
<div id="calculate">
<label for="submitter"><input type="radio" name="submitter" id="submitter" value="submitter" onChange="chargesubmitter()">Calculate</label>
</div>

<div id="cresult" class="hide" >	  
<P>ESTIMATED COST TO INSTALL YOUR CHARGEPOINT <output id="z" form="calc" for="P1 wallpost">1424</output> <span id="grant-info">(grant deducted)</span></p>
<div id="recalculate">
<label for="resubmitter"><input type="radio" name="resubmitter" id="resubmitter" value="resubmitter" onChange="chargesubmitter()">Recalculate</label>
</div>
</div>
</div>	

<p class="small">To qualify for the OLEV grant subsidy you either lease or own an electric vehicle or are in the process of purchasing one.  This estimated cost takes account of the OLEV grant reduction. <a href="https://www.gov.uk/plug-in-car-van-grants">Full eligibility criteria for the scheme can be found here.</a></p>	
	
<input type="hidden" id="calculation" name="calculation" value="1424" />
	
	<!-- form part 2 the contact details //-->

	<p>Price quoted is inclusive of VAT. If this estimate is to your liking, please fill out the form below and we will get back to you to discuss your options in further detail.</p>	

		<p>
<input type="text" id="firstname" name="firstname" placeholder="First Name" value="'.$firstname.'">
  </p>
		
		<p>
  <input type="text" id="surname" name="surname" placeholder="Surname" value="'.$surname.'" >
  
  </p>
  
  	
  	<p>
  <input type="email" id="email" name="email" placeholder="Email" value="'.$email.'">
</p>


    	<p>
  <input type="tel" id="telephone" name="telephone"  placeholder="Telephone">
 </p> 
  
  
 


  	
 
  		<p>
  <input type="submit" name="sendestimate" value="Submit to Follow up this Quote">
 </p>
  
 
  
</div>
</div>
<!-- now workplace //-->
<div id="workplacewrap" class="hide">
<div class="inputwrap comordom">

<h3>The price of our workplace installations depends on various factors including the number and make of chargers, location of the install and connectivity.  Here are two guide costings.</h3>
<div class="row">
<div class="col-md-6">
<div class="chinputwrap">
<h3>Example A</h3>
<p>22kW Dual socket post charger with groundworks and 3 metres of trenching installed in Oxfordshire in a head office ground floor car park</p>
<div class="row">
<div class="col-md-12">
<h4>Fitted for:</h4>
</div>
<div class="col-md-6">£4,995 exc. VAT</div>
<div class="col-md-6">£5,994 inc. VAT</div>
</div>
<div class="row">
<div class="col-md-6">Grant</div>
<div class="col-md-6">-£700 inc. VAT<br />
(-£350 inc. VAT per socket)</div>
</div>
<div class="row">
<div class="col-md-12">
<h3 style="color:#ff8300;">Client Pays:</h3>
</div>
<div class="col-md-6">
<h3 style="color:#ff8300;">£4,412 exc. VAT</h3>
</div>
<div class="col-md-6">
<h3 style="color:#ff8300;">£5,294 inc. VAT</h3>
</div>
</div>
Typical ongoing maintenance cost including back office analytics:<br /> £200 to £400 per annum
</div>
&nbsp;
</div>
			<div class="col-md-6">
<div class="chinputwrap">
<h3>Example B </h3>
<p>Dual socket wall charger installed in a Buckinghamshire small business</p>
<div class="row">
<div class="col-md-12">
<h4>Fitted for:</h4>
</div>
<div class="col-md-6">£3,850 exc. VAT</div>
<div class="col-md-6">£4,620 inc. VAT</div>
</div>
<div class="row">
<div class="col-md-6">Grant</div>
<div class="col-md-6">-£700 inc. VAT<br />
(-£350 inc. VAT per socket)</div>
</div>
<div class="row">
<div class="col-md-12">
<h3 style="color:#ff8300;">Client Pays:</h3>
</div>
<div class="col-md-6">
<h3 style="color:#ff8300;">£3,267 exc. VAT</h3>
</div>
<div class="col-md-6">
<h3 style="color:#ff8300;">£3,920 inc. VAT</h3>
</div>
</div>
Typical ongoing maintenance cost including back office analytics:<br /> £200 to £400 per annum
</div>
&nbsp;

</div>
</div>
</div>


<!-- workplace cta //-->
                        <div class="item cta _full-width has-cta-button">
                            <div class="_inverse">
<div class="col-md-9">
                                <p>To discuss your workplace chargepoint requirements please call our team on 01380 726656 or complete our survey form.</p>
</div>
<div class="col-md-3">
                       <a href="/chargepoint-survey/" class="button">Get in touch</a>
</div>
                       </div>
                        </div>
</div></div>
<!-- // end of workplace cta-->
<!-- // end of workplace -->


<!-- now the commercial //-->
<div id="commercialwrap" class="hide">
<div class="inputwrap comordom">

<h3>The price of our commercial installations depends on various factors including the number and make of chargers, location of the install and connectivity.  Here are two guide costings.</h3>
<div class="row">
<div class="col-md-6">
<div class="chinputwrap">
<h3>Example A</h3>
<p>7kW Dual socket wall charger installed in a Gloucestershire golf club </p>
<div class="row">
<div class="col-md-12">
<h3 style="color:#ff8300;">Supplied and fitted for:</h3>
</div>
<div class="col-md-6"><h3 style="color:#ff8300;">£3,995 exc. VAT</h3></div>
<div class="col-md-6"><h3 style="color:#ff8300;">£4,794 inc. VAT</h3></div>
</div>


Typical ongoing maintenance costs including back office analysis: <br />£200 to £400 per annum

</div>
&nbsp;

</div>
<div class="col-md-6">
<div class="chinputwrap">
<h3>Example B </h3>
<p>22kW Dual socket post charger with groundworks and 3 metres of trenching installed in a Surrey supermarket car park</p>
<div class="row">
<div class="col-md-12">
<h3 style="color:#ff8300;">Supplied and fitted for:</h3>
</div>
<div class="col-md-6"><h3 style="color:#ff8300;">£4,850 exc. VAT</h3></div>
<div class="col-md-6"><h3 style="color:#ff8300;">£5,820 inc. VAT</h3></div>
</div>

Typical ongoing maintenance costs including back office analysis: <br />£200 to £400 per annum
</div>
&nbsp;
</div>
</div>
           
                        <div class="item cta _full-width has-cta-button">
                            <div class="_inverse">
<div class="col-md-9">
                                <p>To discuss your commercial chargepoint requirements please call our team on 01380 726656 or complete our survey form.</p>
</div>
<div class="col-md-3">
                       <a href="/chargepoint-survey/" class="button">Get in touch</a>
</div>
                       </div>
					   
					  
                        </div>

<!-- // end of commercial -->


</div>



 </form>
</div>
</div>
 
	'); }
	
}
?>