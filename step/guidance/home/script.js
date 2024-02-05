
 function loadDoc() {
  

  setInterval(function(){

   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("noti_number1").innerHTML = this.responseText;
     document.getElementById("noti_number2").innerHTML = this.responseText;
     document.getElementById("noti_number3").innerHTML = this.responseText;
     document.getElementById("noti_number4").innerHTML = this.responseText;
    }
   };
   xhttp.open("GET", "data.php", true);
   xhttp.send();

  },1000);


 }
 loadDoc();

