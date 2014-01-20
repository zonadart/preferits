<?php require_once('Connections/conn_preferits.php'); ?>
<?php
mysql_select_db($database_conn_preferits, $conn_preferits);
$query_rcdTipus = "SELECT * FROM tip ORDER BY tipus DESC";
$rcdTipus = mysql_query($query_rcdTipus, $conn_preferits) or die(mysql_error());
$row_rcdTipus = mysql_fetch_assoc($rcdTipus);
$totalRows_rcdTipus = mysql_num_rows($rcdTipus);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
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
        <div align="center"><span class="Estilo3">MODIFICACIO&acute; DE DADES </span></div></td>
  </tr>
</tbody>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="70%">
  <tbody><tr>
    <td width="560" align="center" valign="top">
	   <div align="left"><img src="imatges/body_main_header.gif" /><br>
	     <table width="100%" border="0" cellpadding="4" cellspacing="0" style="border: 1px solid rgb(23, 23, 222);">
	       <tr>
	         <td><p align="center" class="italicsbold">&nbsp;</p>
		          <form action="llistadatmod.php" method="get" name="tip" target="_self" id="tip">
		            <label>
                    <div align="center">
                      
                            <select name="tipus_rec" id="tipus_rec">
      <?php
do {  
?>
      <option value="<?php echo $row_rcdTipus['idtip']?>"<?php if (!(strcmp($row_rcdTipus['idtip'], $row_rcdTipus['idtip']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rcdTipus['tipus']?></option>
      <?php
} while ($row_rcdTipus = mysql_fetch_assoc($rcdTipus));
  $rows = mysql_num_rows($rcdTipus);
  if($rows > 0) {
      mysql_data_seek($rcdTipus, 0);
      $row_rcdTipus = mysql_fetch_assoc($rcdTipus);
  }
?>
    </select>
                      
                      <p>
                        <label>
                        <input type="submit" name="Submit" value="Enviar" />
                        </label>
</p>
                    </div>
                    </label>
                  </form>			<p align="center">&nbsp;</p></td>
	          </tr>
	        </table>
	     <br>
        </div></td>
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
mysql_free_result($rcdTipus);
?>