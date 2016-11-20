function validacijaFormeProizvodi()
{
	
	var forma = document.getElementById("forma-proizvodi");
	
	if(forma.chTorte.checked == false)
	{
		var x = document.getElementsByClassName("torta");
		
		for (i = 0; i < x.length; i++) { 
		x[i].style.display = "none";
		}
	}
	
	if(forma.chKolaci.checked == false)
	{
		var x = document.getElementsByClassName("kolac");
		
		for (i = 0; i < x.length; i++) { 
		x[i].style.display = "none";
		}
	}
	
	if(forma.chTorte.checked == true)
	{
		var x = document.getElementsByClassName("torta");
		
		for (i = 0; i < x.length; i++) { 
		x[i].style.display = "block";
		}
	}
	
	if(forma.chKolaci.checked == true)
	{
		var x = document.getElementsByClassName("kolac");
		
		for (i = 0; i < x.length; i++) { 
		x[i].style.display = "block";
		}
	}
}



function validacijaFormeKupovina()
{
    var forma = document.getElementById("forma-kupovina");
	if( validirajPodatke() == false || validirajNarudzbu() == false)
	{		
		return false;
	}
	
	var but = document.getElementById("potvrda");
	but.type="submit";
    return true;
}

function validirajPodatke(){
	var forma = document.getElementById("forma-kupovina");
	var greska = document.getElementById("greska");
	
	greska.innerHTML=""; // ocistimo prethodne greske
	forma.ime.style="border-color:none; background-color:white";
	forma.prezime.style="border-color:none; background-color:white";
	forma.adresa.style="border-color:none; background-color:white";
	forma.telefon.style="border-color:none; background-color:white";
	forma.mail.style="border-color:none; background-color:white";
	
	if(testirajIme(forma.ime.value) == false)
	{
		forma.ime.style="border-color:red; background-color:#FDEDEC";
		forma.ime.focus();
		greska.innerHTML+="Polje ime nije validno<br>";
		return false;
	}
	else if(testirajIme(forma.prezime.value) == false)
	{
		forma.prezime.style="border-color:red; background-color:#FDEDEC";
		forma.prezime.focus();
		greska.innerHTML+="Polje prezime nije validno<br>";
		return false;
	}
	else if(testirajAdresu(forma.adresa.value) == false)
	{
		forma.adresa.style="border-color:red; background-color:#FDEDEC";
		forma.adresa.focus();
		greska.innerHTML+="Polje adresa nije validno<br>";
		return false;
	}
	else if(testirajTelefon(forma.telefon.value) == false)
	{
		forma.telefon.style="border-color:red; background-color:#FDEDEC";
		forma.telefon.focus();
		greska.innerHTML+="Polje telefon nije validno<br>";
		return false;
	}
	else if(validateEmail(forma.mail.value) == false)
	{
		forma.mail.style="border-color:red; background-color:#FDEDEC";
		forma.mail.focus();
		greska.innerHTML+="Polje email nije validno<br>";
		return false;
	}
	
	greska.innerHTML="Podaci su validni.";
	unesiPodatke(forma.ime.value,forma.prezime.value,forma.adresa.value,forma.telefon.value,forma.mail.value);
	return true;
}

function testirajDatum(datum)
{
	var patt = /^(\d{1,2})[/](\d{1,2})[/](2017)$/;
	return patt.test(datum);
}

function validirajNarudzbu()
{
	//alert("bla");
	var forma = document.getElementById("forma-kupovina");
	var greska = document.getElementById("greska_n");
	
	greska.innerHTML=""; // ocistimo prethodne greske
	forma.datum.style="border-color:none; background-color:white";
	forma.lista_kolaca.style="border-color:none; background-color:white";
	forma.kolicina_k.style="border-color:none; background-color:white";
	forma.lista_torti.style="border-color:none; background-color:white";
	forma.kolicina_t.style="border-color:none; background-color:white";
	
	if(testirajDatum(forma.datum.value) == false)
	{
		forma.datum.style="border-color:red; background-color:#FDEDEC";
		forma.datum.focus();
		greska.innerHTML="datum nije ok dd/mm/2017<br>Narudzbe primamo za period:<br>01/01/2017 - 31/12/2017";
		return false;
	}
	
	
	else if(forma.lista_kolaca.value == "" && forma.lista_torti.value == "")
	{
		greska.innerHTML="Niste odabrali ni kolac ni tortu"; 
		return false;
	}
	
	unesiNarudzbu(forma.datum.value,forma.lista_kolaca.value,forma.kolicina_k.value,forma.lista_torti.value,forma.kolicina_t.value,forma.dodatno.value);
	greska.innerHTML = "sve je validno";
	return true;
}

function unesiNarudzbu(datum,kolaci,k_k,torte,k_t,dodatno)
{
	var narudzba = document.getElementById("narudzba_podaci");
	var suma = 0;
	narudzba.innerHTML="<br><br>Podaci o narudzbi:<br>Datum: " + datum + "<br>";
	if(kolaci != "")
	{
		suma = suma + 2*k_k;
		narudzba.innerHTML+="Kolaci: " + kolaci + "    kolicina: " + k_k + "     cijena: " + 2*k_k + "KM<br>";
	}
	if(torte != "")
	{
		suma = suma + 30*k_t;
		narudzba.innerHTML+="Torte: " + torte + "    kolicina: " + k_t + "     cijena:" + 30*k_t + "KM<br>";
	}
	
	narudzba.innerHTML+="<br><br> UKUPNO: " +suma + "KM" + "<br><br> Dodatno: " + dodatno;
}

function unesiPodatke(ime, prezime, adresa, telefon,mail){
	var narudzba = document.getElementById("osoba_podaci");
	
	narudzba.innerHTML="Podaci o naručiocu: <br><br>Ime i prezime: "+ime+" "+ prezime+"<br>Adresa: "+adresa+"<br>Telefon: "+telefon+"<br>mail: "+mail+"<br>";
}

function testirajIme(ime)
{
	var patt_ime = /([a-zA-Z]{3,30}\s*)+/i;
	return patt_ime.test(ime);
}

function testirajTelefon(telefon)
{
	var patt_telefon = /^[(]{0,1}06[0-6]{1}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{3,4}$/;
	return patt_telefon.test(telefon);
}

function testirajAdresu(adresa)
{
	var patt = /^[a-zA-Z0-9\s,'-]*$/;
	if(adresa=="") return false;
	return patt.test(adresa);
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function validacijaFormeKontakt() {
var greska = document.getElementById('greska');
    
var forma = document.getElementById("kontakt-forma");
	
	greska.innerHTML=""; // ocistimo prethodne greske
	forma.ime.style="border-color:none; background-color:white";
	forma.email.style="border-color:none; background-color:white";
	forma.poruka.style="border-color:none; background-color:white";
	
	if (testirajIme(forma.ime.value) == false) 
	{    
		forma.ime.style="border-color:red; background-color:#FDEDEC";
		forma.ime.focus();
        greska.innerHTML+="Ime nije validno.";
		return false;
	}
	
	else if(validateEmail(forma.email.value) == false)
	{
		forma.email.style="border-color:red; background-color:#FDEDEC";
		forma.email.focus();
		greska.innerHTML+="Mail nije validan.<br>";
		return false;
	}
	
	else if(forma.poruka.value.length < 3)
	{
		forma.poruka.style="border-color:red; background-color:#FDEDEC";
		greska.innerHTML+="Poruka prekratka.<br>";
		forma.poruka.focus();
		return false;
	}
	return true;
}

/*--------------slika uvecavanje---------------*/

function uvecaj(src) {
         var divObj = document.getElementById("slikica");
		 divObj.src=src;
		 divObj.style="width:100%; height:100%";
		 
       //Use the specification method before using prefixed versions
      if (divObj.requestFullscreen) {
        divObj.requestFullscreen();
      }
      else if (divObj.msRequestFullscreen) {
        divObj.msRequestFullscreen();               
      }
      else if (divObj.mozRequestFullScreen) {
        divObj.mozRequestFullScreen();      
      }
      else if (divObj.webkitRequestFullscreen) {
        divObj.webkitRequestFullscreen();       
      } else {
        console.log("Fullscreen API is not supported");
      } 

    }


onkeydown = function(ev) {
	var divObj = document.getElementById("slikica");
		 divObj.style="width:0%";
}

function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-sadrzaj");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

/*-----------------sa tutorijala------------*/

function pribavi_stranicu(url,broj){
      var ajax = new XMLHttpRequest();
ajax.onreadystatechange = function() {// Anonimna funkcija
	if (ajax.readyState == 4 && ajax.status == 200)
		document.getElementById("glavni").innerHTML = ajax.responseText;
	if (ajax.readyState == 4 && ajax.status == 404)
		document.getElementById("glavni").innerHTML = "Greska: nepoznat URL";
}
ajax.open("GET", url, true);
ajax.send();


var a = document.getElementsByClassName("meni_opcija");
for(i=0;i<5;i++){
if(i==broj)a[i].style="background-color:white";
else a[i].style="background-color:#c5e8ec";
}
}
/*-----------------kraj-----------------*/

//document.getElementById("kontakt-forma").addEventListener( "submit", 
//validacijaForme, false );
