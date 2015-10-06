if(window.location.hostname=="localhost"){
var base_url="http://"+window.location.hostname+':'+location.port+"/SMS/";
//alert(base_url);
}
if(window.location.hostname=="junctiontech.in"){
var base_url="http://"+window.location.hostname+':'+location.port+"/projects/school_management/";

}
if(window.location.hostname=="junctiondev.cloudapp.net"){
var base_url="http://"+window.location.hostname+':'+location.port+"/sms/";

}
function showRoseIndia(paraId)
{
	
  var element = document.getElementById(paraId);
  element.scrollIntoView(true);
	
}


