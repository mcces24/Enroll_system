
 function loadDoc() {
  

  setInterval(function(){

   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("total").innerHTML = this.responseText;
    }
   };
   xhttp.open("GET", "total.php", true);
   xhttp.send();

  },1000);


 }
 loadDoc();

