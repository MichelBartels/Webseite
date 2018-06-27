
<html>
<head>
<meta charset="utf-8">
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet"> 
<link rel="stylesheet" href="css/index.css">


</head>

<body>



<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">     
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Calligraffitti" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet"> 
<title>EdelErden</title>
<link rel="shortcut icon" type="image/x-icon" href="Bilder/Bild.jpg">
<meta charset="utf-8">
<style>


/* Aussehen Knopf */
.dropbtn {
    background-color: black;
    color: white;
    left: 0px;
    font-size: 25px;
    border: none;
    cursor: pointer;
	width: 162px;
	height: 40px;
	z-index: 10;
    font-family: 'Roboto', sans-serif;
}

.dropdown {
    position: relative;
    display: inline-block;
	z-index: 10;
}

/* Dropdown Menü */
.dropdown-content {
    display: none;
    position: absolute;
    background-color:black;
    min-width: 162px;
    box-shadow: 1px 1px 1px black;
	z-index: 10;
	font-family: 'Roboto', sans-serif;
	
}


/* Links im Menü */
.dropdown-content a {
    color: white;
    padding: 0px 0px;
    text-decoration: none;
    display: block;
	z-index: 10;
	font-family:Microsoft YaHei Boot;
	font-size:23px;
	font-family: 'Roboto', sans-serif;
}

/*Links bei hover */
.dropdown-content a:hover {background-color:#060606;  }

/* dropdown menü bei hover */
.dropdown:hover .dropdown-content {
    display: block;
	z-index: 10;
}

/* Knopf bei hover*/
.dropdown:hover .dropbtn {
    background-color: black;
	z-index: 10;

}



* {padding: 0px; margin:0px; }
 body { background-color:white; }
 
 header { height: 100px; background-color:black; opacity:0.9; width:100%; z-index: 10; } 
 
 #Überschrift{font-size:82px; color:white; font-family: 'Indie Flower', cursive; font-style:italic;
              text-shadow:white 1px 1px 5px; width:1000px; margin-left:auto; margin-right:auto;
			   position:relative; z-index: 10; left:45px; font-family: 'Calligraffitti', cursive;}			  
			
#Überschrift i { color:white;}

#Überschrift a {font-size:82px; cursor:text; font-family: 'Calligraffitti', cursive;}
			
#Sticky {position:Sticky; background-color:black; height: 40px; width:100%; top:0%;
         opacity: 0.90; z-index: 10;}
 
		
#Navigation {  width:1000px ; height:40px; padding:0px; margin:0px;  margin-left:auto; 
               margin-right:auto; z-index: 10; visibility:none;}
				
a {font-size:25px; text-decoration:none; color:white; z-index: 10; font-family: 'Roboto', sans-serif;}
 
#Button {width:166px; height:100%;  font-size: 25px; background-color: black;
         color:white;  cursor: pointer; border:none; padding-top:0px; z-index: 10;}

#input {width:166px; background-color:black; color:white; border:none; height:40px;
        font-size:20px; z-index:10; font-family: 'Roboto', sans-serif;; }	
	
#input:hover {background-color:#060606 !important; }	 	 

#suchicon {width:40px; height:40px; border:none; position:absolute; padding-bottom:0px;
           background-color:black; color:white; z-index: 10; box-shadow: 1px 1px 1px black;}
	
#suchicon:hover {background-color:#060606 !important;}	
	
#klein {font-size:23px; z-index: 10;}		 

#Leer {opacity:0;}





</style>



</head>

<body>
<header> 
<div id="Überschrift">

<i>Ede<a href="egg.php">l</a>Erden</i>

</div>
</header>

<header id="Sticky">
<header id="Navigation">



<a href="index.php">
<div class="dropdown">
<button class="dropbtn">
Home
</button>
</a>

<div class="dropdown-content">
<a href="index.php">EdelErden-Home </a>
<div id="Leer">Hier ist nichts!</div>
<a href="http://35.157.66.141/Webseite/Online-Shop">Werbepartner</a>
</div>
</div>



<a href="Produkte.php">
<div class="dropdown">
<button class="dropbtn">
Produkte
</button>
<div class="dropdown-content">
<div id="klein">
<a href="Produkte.php">
Sehen sie sich alle Produkte an.
</a>
</div> 
</div>
</div>
</a>



<a href="mailto:schmiel767@gmail.com">
<div class="dropdown">
<button class="dropbtn">
Kontakt
</button>
<div class="dropdown-content">
<div id="klein">
<a href="mailto:schmiel767@gmail.com">
Mail an die Ersteller senden.
(Fragen,
Anregungen,
Wünsche)
</a>

</div>
</div>
</div>
</a>


<a href="Warenkorb.php">
<div class="dropdown">
<button class="dropbtn">
Warenkorb
</button>
<div class="dropdown-content">
Korb öffnen</a>
<a href="Warenkorbleeren.php">Korb leeren</a>
</div>
</div>


<div class="dropdown">
<button class="dropbtn">Login</button>
<div class="dropdown-content">

<form method="POST">

<input type="text" name="vorname" minlength="2" maxlength="25" 
placeholder= Vorname id="input" required/>

<input type="text" name="nachname" minlength="2" maxlength="25"
placeholder= Nachname id="input" required/>

<input type="text" name="adresse" minlength="2" maxlength="25"
 placeholder= Adresse id="input" required/>
 
<input type="email"  id="input" maxlength="25" name="mail" 
 pattern="[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,4}$" placeholder="E-Mail">
 
<input type="submit" value="Bestätigen" id="input"/>
</form>

<form action="Reset.php" method="POST">
<input type="submit" value="Reset" id="input" />
</form>

</div>
</div>


<div class="dropdown">
<button class="dropbtn">
Suche 
</button>
<div class="dropdown-content">


<form action="suche.php" method="POST" height="40px" >
<datalist id="Produkte"> <option value="vergoldete Erde"><option value="Kaffeeerde">
<option value="Zuckererde"><option value="schwerelose Erde"><option value="explosive Erde"> 
<option value="Das Erde"><option value="kristallisierte Erde"><option value="lebende Erde">
<option value="Holzerde"><option value="Schneeerde">     
    
</datalist> 

<input type="search" list="Produkte" name="Suche" placeholder="Suchen... " id="input" />
<input type="image" src="Bilder/Suche.png" width="25" height="25" id="Suchicon"> 
</form>


</div>
</div>


</header>
</header>


<div style='text-align: right;position: fixed;z-index:9999999;bottom: 0; width: 100%;cursor: pointer;line-height: 0;display:block !important;'><a title="000webhost logo" rel="nofollow" target="_blank" href="https://www.000webhost.com/?utm_source=000webhostapp&amp;utm_campaign=000_logo&amp;utm_campaign=ss-footer_logo&amp;utm_medium=000_logo&amp;utm_content=website"><img src="https://cdn.rawgit.com/000webhost/logo/e9bd13f7/footer-powered-by-000webhost-white2.png" alt="000webhost logo"></a></div></body>
</html>




<div id="Box">
<a href="Produkte.php">
<div id="Bilder">
<figure>
<img src="Bilder/A6.jpg">
</figure>    
<figure>
<img src="Bilder/C7.jpg">
</figure>
<figure>
<img src="Bilder/D6.jpg">
</figure>
<figure>
<img src="Bilder/D4.jpg">
</figure>
<figure>
<img src="Bilder/D1.jpg">
</figure>
</div>
</a>


<div id="Ubers">

<h1>Eine Investition in die Zukunft.</h1>
<p>
 Das ist diese Seite. Eine Möglichkeit Ihr zukünftiges 
 Dasein zu sichern und ein stabiles Haus der finanziellen Sicherheit
 zu schaffen. Wir bitten Sie darum, keine Mauer des Schweigens um diese Website zu errichten,
 sondern ihre wunderbaren Erfahrungen mit ihrer Familie und Ihren Freunden zu teilen. 
 </p>

</div>

<div id="Beschreib">
<p>
Unser Produkte helfen natürlich niemanden bei irgendwas, aber wenn wir das zugeben würden, 
würde ja schließlich niemand mehr unsere Produkte kaufen, also ignoriert diese, für 
einen Onlineshop sehr unpassende Beschreibung und kaufen Sie, wie die Doofen, unsere
schrott-Produkte.

</p>
</div>

</div>

<footer>
<center>
Made by Noble-earth international &copy; 
</center>
</footer>

</body>

</html>
 
