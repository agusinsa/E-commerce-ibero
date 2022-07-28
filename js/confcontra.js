function passwo{
	var p1=document.getElementById("contra").value;
	var p2=document.getElementById("contra2").value;

	if (p1 != p2) {
  alert("Las passwords deben de coincidir");
  return false;
} else {
  alert("Todo esta correcto");
  return true; 
}
}