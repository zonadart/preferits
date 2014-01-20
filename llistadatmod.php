<?php require_once('Connections/conn_preferits.php'); ?>

<?php

if (!function_exists("GetSQLValueString")) {

function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 

{

  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;



  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);



  switch ($theType) {

    case "text":

      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";

      break;    

    case "long":

    case "int":

      $theValue = ($theValue != "") ? intval($theValue) : "NULL";

      break;

    case "double":

      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";

      break;

    case "date":

      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";

      break;

    case "defined":

      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;

      break;

  }

  return $theValue;

}

}



$colname_rcdDat = "-1";

if (isset($_GET['tipus_rec'])) {

  $colname_rcdDat = (get_magic_quotes_gpc()) ? $_GET['tipus_rec'] : addslashes($_GET['tipus_rec']);

}

mysql_select_db($database_conn_preferits, $conn_preferits);

$query_rcdDat = sprintf("SELECT dat.iddat, dat.adreca, tip.tipus, dat.observacions, dat.login, dat.password FROM dat JOIN tip WHERE dat.tipus = %s AND dat.tipus = tip.idtip ORDER BY adreca ASC", GetSQLValueString($colname_rcdDat, "int"));

$rcdDat = mysql_query($query_rcdDat, $conn_preferits) or die(mysql_error());

$row_rcdDat = mysql_fetch_assoc($rcdDat);

$totalRows_rcdDat = mysql_num_rows($rcdDat);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
	<title>Zona d'Art - Preferits</title>
    <style type="text/css">
<!--
.Estilo3 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
    </style>
	<script type="text/JavaScript">

<!--

function MM_swapImgRestore() { //v3.0

  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;

}



function MM_preloadImages() { //v3.0

  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();

    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)

    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}

}



function MM_findObj(n, d) { //v4.01

  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {

    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}

  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];

  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);

  if(!x && d.getElementById) x=d.getElementById(n); return x;

}



function MM_swapImage() { //v3.0

  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)

   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}

}

//-->

</script>
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body onload="MM_preloadImages('/imatges/in.gif')">
<div align="center">
<table id="main" border="0" cellpadding="0" cellspacing="0" width="70%">
    <tbody><tr>
    <td><a href="index.html" target="_self"><img src="imatges/capsal02.png" border="0" /></a></td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
  </tr>
  <tr>
      <td background="assets/body_main_header.gif" class="main">&nbsp;
        <div align="center"><span class="Estilo3">MODIFICACIO&acute; DE DADES</span></div></td>
  </tr>
</tbody>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="70%">
  <tbody><tr>
    <td width="560" align="center" valign="top">
	  <div align="center">
	   <img src="imatges/body_main_header.gif" /><br>
	   <table width="100%" border="0" cellpadding="4" cellspacing="0" style="border: 1px solid rgb(23, 23, 222);">
	   <tr>
	 	<td><p class="italicsbold">&nbsp;</p>
			<p align="center">
			
			

  <?php do { ?>

    <tr>

      <td><?php echo $row_rcdDat['iddat']; ?></td>

      <td><a href="<?php echo $row_rcdDat['adreca']; ?>" target="_blank"><?php echo $row_rcdDat['adreca']; ?></a></td>

      <td><?php echo $row_rcdDat['observacions']; ?></td>

      <td align="center" valign="middle"><div align="center"><a href="modif.php?recordID=<?php echo $row_rcdDat['iddat']; ?> " target="_blank" onmouseover="MM_swapImage('modif','','imatges/in.gif',1)" onmouseout="MM_swapImgRestore()"><img src="imatges/presionat.gif" width="20" height="20" border="0" align="middle" title="MODIFICAR" /></a></div></td>

      <td align="center" valign="middle">&nbsp;</td>

    </tr>

    <?php } while ($row_rcdDat = mysql_fetch_assoc($rcdDat)); ?>
			
			</p></td>
		</tr>
		</table>
	   <br></div>
	 </td>
  </tr>
</tbody></table>
<table border="0" cellpadding="0" cellspacing="0" width="70%">
  <tbody><tr>
      <td><div align="center"><img src="imatges/body_main_footer.gif" /></div></td>
  </tr>
</tbody></table>
</div>
</body>
</html>
<?php
mysql_free_result($rcdDat);
?>
