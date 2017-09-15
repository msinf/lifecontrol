<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="LC.ico" />
    <title>Live Control</title>
    <!-- CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<link rel="stylesheet" href="css/style.css" >

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>



    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

          </button>
          <a class="navbar-brand" <a href="Home.html"> <img src="immagini/lclogo.png"  height="50" width="150" alt="Brand" ></a></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

          <ul class="nav navbar-nav navbar-right">
            <li><a href="Home.html">HOME <span class="sr-only">(current)</span></a></li>
            <li><a href="logout.php">LOGOUT</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MENÚ<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li> <a href="sensori.php">Sensori</a></li>
				   <li role="separator" class="divider"></li>
				 <li> <a href="utenti.php">Utenti</a></li>
				  <li role="separator" class="divider"></li>
				 <li> <a href="ambienti.php">Impianti</a></li>
				  <li role="separator" class="divider"></li>
				 <li> <a href="siti.php">Siti</a></li>
				  <li role="separator" class="divider"></li>
				 <li> <a href="marche.php">Marche</a></li>
              </ul>
            </li>
          </ul>



        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

  <div class="container">

<table border="0">
<a href='sensori.php'><img src='immagini/indietro.jpg' height='30' width='25'>				</a>
  <tr>
    <td align="center" ><strong>Inserisci i dati richiesti</strong></td>
  </tr>
  <tr>
    <td>
      <table>
	  <form method="POST" action="canc_sen.php">
        <tr>
          <td>ID Sensore</td>
          <td><input type="text" name="id" size="20">
          </td>
        </tr>
        <tr>
		<td></td>
          <td align="left"><input type="submit" 
          name="cancella" value="cancella"></td>
          <td></td>
          <td align="right"><input type="submit" 
          name="submit" value="Sent"></td>
          
        </tr>
        </tr>
        </form>
        </table>
      </td>
    </tr>
</table>
<?php
session_start();
$host='localhost'; // Host name 
$username='root'; // Mysql username 
$password=''; // Mysql password 
$db_name='live'; // Database name 
$tbl_name='sensori'; // Table name 
// Connect to server and select databse.
$link=mysqli_connect((string)$host,(string)$username,(string)$password,(string)$db_name);
if(isset($link)){
$sql="SELECT * FROM $tbl_name WHERE attivo=1;";
$result=mysqli_query($link,$sql);
if(isset($result)){
$str =<<<HTML
<TABLE><TR><TH>ID sensore <TH> Tipo <TH> Marca <TH> Sito</TR> 
HTML;
echo $str;
$alt=true;
$number = mysqli_num_rows($result);
$i=0;
while($number>$i){
$riga = (mysqli_fetch_array($result));	
$id=htmlspecialchars($riga['id_sensore']);
$tipo=htmlspecialchars($riga['tipo']);
$marca=htmlspecialchars($riga['marca']);
$sito=htmlspecialchars($riga['sito']);
$str =<<<HTML
<TR>
<TD>$id<TD>$tipo<TD>$marca<TD>$sito</TR> 
HTML;
echo ($str);
$alt=!$alt;
$i++;
}
}else{
echo'QUERY FALLITA';}
}else{
echo'cannot connect';}
?>

</div>
<footer class="footer">
  <div id="footer" class="d-flex justify-content-center align-items-center">
<p>
<a>
   Powered by <a href="http://www.iot-inc.com/"> <img src="immagini/iotlogo.png" height="70" width="140" hspace=”20″>
   </a>
 </p>
  </div>

</footer>
</body>
</html>

<html>
