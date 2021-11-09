// JavaScript Document

function chargesubmitter() {
  var calculate = document.getElementById("calculate");
  var resultbox = document.getElementById("cresult");

 calculate.classList.add("hide");
 resultbox.classList.remove("hide");
  
 //  calculate.classList.toggle("hide");
// resultbox.classList.toggle("hide");
}


function updateOutput() { 
 

	//get form
	var form = document.getElementById("calc");
	//get output
	var out = form.elements["z"];
	//get inputs for calculation
	var pcode = form.elements["postcode"].value;//tpostcode*---
	var groundworks = form.elements["groundworks"].value;//yes or no*---
	var wallpost = form.elements["wallpost"].value;//wall or post*---
	var trenchlength = form.elements["trenchlength"].value;//length of trench*---
	var surface = form.elements["surface"].value;// surface type*---
	var cablelength = form.elements["cablelength"].value;//length of cablee*---
	var equipment = form.elements["equipment"].value;//length of cablee*---
 var myoutput = 0;
 
 //ensure trench and cable are whole metres only
  trenchlength = Math.floor(trenchlength);
  cablelength = Math.floor(cablelength);
 
 
 //responsive display hidden sections
   var element = document.getElementById("trench");
  var thesurface = document.getElementById("surfacetype");
 if(form.elements["groundworks"].value == 'yes'){
  element.classList.remove("hide");
  thesurface.classList.remove("hide");
}
else{
	element.classList.add("hide");
	thesurface.classList.add("hide");
}

// hide or display the entire main form
var commwr = document.getElementById("commercialwrap"); 
var domewr = document.getElementById("domesticwrap");
var workwr = document.getElementById("workplacewrap");

if(form.elements["comdom"].value == 'domestic'){
domewr.classList.remove("hide");
domewr.classList.add("fadein");
commwr.classList.add("hide");
workwr.classList.add("hide");
//and swap the pics
document.getElementById("boxa").innerHTML = "<img src='/wp-content/uploads/2020/06/commercial-grey-new.gif'>";
document.getElementById("boxb").innerHTML = "<img src='/wp-content/uploads/2020/06/domestic-orange-new.gif'>";
document.getElementById("boxc").innerHTML = "<img src='/wp-content/uploads/2020/06/work-grey-new.gif'>";
}
else if(form.elements["comdom"].value == 'commercial'){
commwr.classList.remove("hide");
commwr.classList.add("fadein");
domewr.classList.add("hide");
workwr.classList.add("hide");
//and swap the pics
document.getElementById("boxa").innerHTML = "<img src='/wp-content/uploads/2020/06/commercial-orange-new.gif'>";
document.getElementById("boxb").innerHTML = "<img src='/wp-content/uploads/2020/06/domestic-grey-new.gif'>";
document.getElementById("boxc").innerHTML = "<img src='/wp-content/uploads/2020/06/work-grey-new.gif'>";
}
else if(form.elements["comdom"].value == 'work'){
workwr.classList.remove("hide");
workwr.classList.add("fadein");
domewr.classList.add("hide");
commwr.classList.add("hide");
//and swap the pics
document.getElementById("boxa").innerHTML = "<img src='/wp-content/uploads/2020/06/commercial-grey-new.gif'>";
document.getElementById("boxb").innerHTML = "<img src='/wp-content/uploads/2020/06/domestic-grey-new.gif'>";
document.getElementById("boxc").innerHTML = "<img src='/wp-content/uploads/2020/06/work-orange-new.gif'>";
}


	
	
//var local = ["BA", "SN", "SP"];
//var national = ["BS", "OX", "GL", "RG", "GU", "DT", "BH", "SL", "SO"];
var postcodeprice =40;
var wallpostprice =0;
var trenchprice =0;
var cableprice =0;
var rebate =350;
var equipmentprice = (859 - rebate);	

//set output 
// if(local.includes(postcode) === true){postcodeprice = 40;}
if(pcode == "BA"){postcodeprice = 40;}
if(pcode == "SN"){postcodeprice = 40;}
if(pcode == "SP"){postcodeprice = 40;}
if(pcode == "BS"){postcodeprice = 160;}
if(pcode == "OX"){postcodeprice = 160;}
if(pcode == "GL"){postcodeprice = 160;}
if(pcode == "RG"){postcodeprice = 160;}
if(pcode == "GU"){postcodeprice = 160;}
if(pcode == "DT"){postcodeprice = 160;}
if(pcode == "BH"){postcodeprice = 160;}
if(pcode == "SL"){postcodeprice = 160;}
if(pcode == "SO"){postcodeprice = 160;}

if(wallpost == "post"){wallpostprice = 525;}
// surface soft or hard affects price to dig trench
if(surface == "soft"){	
	if(trenchlength==1){trenchprice = 200;}
	if(trenchlength >= 2 && trenchlength <= 5){trenchprice = 350;}
	if(trenchlength >=6 ){trenchprice = 120*trenchlength;}
}
if(surface == "hard"){
	if(trenchlength==1){trenchprice = 200;}
	if(trenchlength >= 2 && trenchlength <= 5){trenchprice = 350;}
	if(trenchlength >=6 ){trenchprice = 150*trenchlength;}
	}

if (groundworks =="no"){trenchprice = 0;trenchlength = 0;}
//cable length
//send back rounded lengths
document.getElementById("trenchlength").value = trenchlength;
document.getElementById("cablelength").value = cablelength;


cableprice = cablelength * 10;

//set equipment price  (minus rebate for podpoint and wallbox) and change images
if(equipment == "podpoint"){equipmentprice = (859-350); 
document.getElementById("box1").innerHTML = "<img src='https://efs.thwhite.co.uk/wp-content/uploads/2020/05/pod-point-2-tick.jpg'>";
document.getElementById("box2").innerHTML = "<img src='https://efs.thwhite.co.uk/wp-content/uploads/2020/05/wall-box-1.jpg'>";
document.getElementById("box3").innerHTML = "<img src='https://efs.thwhite.co.uk/wp-content/uploads/2020/05/tesla.jpg'>";
document.getElementById("box4").innerHTML = "<img src='https://efs.thwhite.co.uk/wp-content/uploads/2020/05/tesla.jpg'>";
document.getElementById("box5").innerHTML = "<img src='https://efs.thwhite.co.uk/wp-content/uploads/2020/09/eo.jpg'>";
document.getElementById("grant-info").innerHTML = "(grant deducted)";
}
if(equipment == "wallbox"){equipmentprice = (949-350);
document.getElementById("box1").innerHTML = "<img src='https://efs.thwhite.co.uk/wp-content/uploads/2020/05/pod-point-2.jpg'>";
document.getElementById("box2").innerHTML = "<img src='https://efs.thwhite.co.uk/wp-content/uploads/2020/05/wall-box-tick-1.jpg'>";
document.getElementById("box3").innerHTML = "<img src='https://efs.thwhite.co.uk/wp-content/uploads/2020/05/tesla.jpg'>";
document.getElementById("box4").innerHTML = "<img src='https://efs.thwhite.co.uk/wp-content/uploads/2020/05/tesla.jpg'>";
document.getElementById("box5").innerHTML = "<img src='https://efs.thwhite.co.uk/wp-content/uploads/2020/09/eo.jpg'>";
document.getElementById("grant-info").innerHTML = "(grant deducted)";
}
if(equipment == "tesla"){equipmentprice = 1135;
document.getElementById("box1").innerHTML = "<img src='https://efs.thwhite.co.uk/wp-content/uploads/2020/05/pod-point-2.jpg'>";
document.getElementById("box2").innerHTML = "<img src='https://efs.thwhite.co.uk/wp-content/uploads/2020/05/wall-box-1.jpg'>";
document.getElementById("box3").innerHTML = "<img src='https://efs.thwhite.co.uk/wp-content/uploads/2020/05/tesla-tick.jpg'>";
document.getElementById("box4").innerHTML = "<img src='https://efs.thwhite.co.uk/wp-content/uploads/2020/05/tesla.jpg'>";
document.getElementById("box5").innerHTML = "<img src='https://efs.thwhite.co.uk/wp-content/uploads/2020/09/eo.jpg'>";
document.getElementById("grant-info").innerHTML = "Tesla Chargers are not currently eligible for the OLEV grant";
}
if(equipment == "owncharger"){equipmentprice = 715;
document.getElementById("box1").innerHTML = "<img src='https://efs.thwhite.co.uk/wp-content/uploads/2020/05/pod-point-2.jpg'>";
document.getElementById("box2").innerHTML = "<img src='https://efs.thwhite.co.uk/wp-content/uploads/2020/05/wall-box-1.jpg'>";
document.getElementById("box3").innerHTML = "<img src='https://efs.thwhite.co.uk/wp-content/uploads/2020/05/tesla.jpg'>";
document.getElementById("box4").innerHTML = "<img src='https://efs.thwhite.co.uk/wp-content/uploads/2020/05/tesla-tick.jpg'>";
document.getElementById("box5").innerHTML = "<img src='https://efs.thwhite.co.uk/wp-content/uploads/2020/09/eo.jpg'>";
document.getElementById("grant-info").innerHTML = "Tesla Chargers are not currently eligible for the OLEV grant";
}

if(equipment == "eo"){equipmentprice = (949-350);
document.getElementById("box1").innerHTML = "<img src='https://efs.thwhite.co.uk/wp-content/uploads/2020/05/pod-point-2.jpg'>";
document.getElementById("box2").innerHTML = "<img src='https://efs.thwhite.co.uk/wp-content/uploads/2020/05/wall-box-1.jpg'>";
document.getElementById("box3").innerHTML = "<img src='https://efs.thwhite.co.uk/wp-content/uploads/2020/05/tesla.jpg'>";
document.getElementById("box4").innerHTML = "<img src='https://efs.thwhite.co.uk/wp-content/uploads/2020/05/tesla.jpg'>";
document.getElementById("box5").innerHTML = "<img src='https://efs.thwhite.co.uk/wp-content/uploads/2020/09/eo-tick.jpg'>";
document.getElementById("grant-info").innerHTML = "(grant deducted)";
}
//output actual figures

//calculate the result
myoutput = myoutput + postcodeprice + wallpostprice + trenchprice + cableprice + equipmentprice;
//output the result
document.getElementById("calculation").value = myoutput;
out.value = myoutput;

}
