function changeHTML(idName,newValue){
	var toChange = document.getElementById(idName);
	toChange.innerHTML = newValue;
}
function changeDisplay(idName,disp){
	var toShow = document.getElementById(idName);
	
	toShow.style.display = disp;
}
function changeColor(elementId,color){
	var toChange = document.getElementById(elementId);
	
	toChange.style = "background-color:"+color+";";
}
function backToTop(idName,newValue) {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
	
	var inp = document.getElementById(idName);
	inp.value = newValue;
}
function addUnit(idName,newValue){
	var inp = document.getElementById(idName);
	inp.value = newValue;
}
function noSubmit(idName){
	document.getElementById(idName).addEventListener("click", function(event){
		event.preventDefault()
	});
}
function changeCSS(idName,properTy,values){
	var toChange = document.getElementById(idName);
	
	toChange.style.setProperty(properTy,values);
}

function myMap() {
	var mapProp= {
		center:new google.maps.LatLng(7.1907,125.4553),
		zoom:6,
	};
	var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
