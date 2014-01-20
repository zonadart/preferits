<?php require_once('Connections/conn_preferits.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

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



$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE dat SET adreca=%s, tipus=%s, observacions=%s, login=%s, password=%s WHERE iddat=%s",
                       GetSQLValueString($_POST['adreca'], "text"),
                       GetSQLValueString($_POST['tipus'], "int"),
                       GetSQLValueString($_POST['observacions'], "text"),
                       GetSQLValueString($_POST['login'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['iddat'], "int"));

  mysql_select_db($database_conn_preferits, $conn_preferits);
  $Result1 = mysql_query($updateSQL, $conn_preferits) or die(mysql_error());

  $updateGoTo = "ok.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_recMod = "-1";
if (isset($_GET['recordID'])) {
  $colname_recMod = (get_magic_quotes_gpc()) ? $_GET['recordID'] : addslashes($_GET['recordID']);
}
mysql_select_db($database_conn_preferits, $conn_preferits);
$query_recMod = sprintf("SELECT * FROM dat WHERE iddat = %s", $colname_recMod);
$recMod = mysql_query($query_recMod, $conn_preferits) or die(mysql_error());
$row_recMod = mysql_fetch_assoc($recMod);
$totalRows_recMod = mysql_num_rows($recMod);

mysql_select_db($database_conn_preferits, $conn_preferits);
$query_recTipus = "SELECT * FROM tip ORDER BY tipus ASC";
$recTipus = mysql_query($query_recTipus, $conn_preferits) or die(mysql_error());
$row_recTipus = mysql_fetch_assoc($recTipus);
$totalRows_recTipus = mysql_num_rows($recTipus);

/* mysql_select_db($database_conn_preferits, $conn_preferits);
$query_recSec = "SELECT * FROM users";
$recSec = mysql_query($query_recSec, $conn_preferits) or die(mysql_error());
$row_recSec = mysql_fetch_assoc($recSec);
$totalRows_recSec = mysql_num_rows($recSec); */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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
        <div align="center"><span class="Estilo3">MODIFICACIO&acute; DE DADES</span></div></td>
  </tr>
</tbody>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tbody><tr>
    <td width="560" align="center" valign="top">
    <div align="center">
	   <img src="imatges/body_main_header.gif" /><br>
	   <table width="100%" border="0" cellpadding="4" cellspacing="0" style="border: 1px solid rgb(23, 23, 222);">
	   <tr>
	 	<td><p align="center" class="italicsbold">&nbsp;</p>
			<p align="center">
			
	     <tr valign="baseline">
      <td nowrap="nowrap" align="right">Iddat:</td>
      <td><?php echo $row_recMod['iddat']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Adreca:</td>
      <td><input type="text" name="adreca" value="<?php echo htmlentities($row_recMod['adreca'], ENT_COMPAT, 'windows-1252'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tipus:</td>
      <td><select name="tipus">
        <?php 
do {  
?>
        <option value="<?php echo $row_recTipus['idtip']?>" <?php if (!(strcmp($row_recTipus['idtip'], htmlentities($row_recMod['tipus'], ENT_COMPAT, 'windows-1252')))) {echo "SELECTED";} ?>><?php echo $row_recTipus['tipus']?></option>
        <?php
} while ($row_recTipus = mysql_fetch_assoc($recTipus));
?>
      </select>
      </td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Observacions:</td>
      <td><textarea name="observacions" cols="32"><?php echo htmlentities($row_recMod['observacions'], ENT_COMPAT, 'windows-1252'); ?></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Login:</td>
      <td><input type="text" name="login" value="<?php echo htmlentities($row_recMod['login'], ENT_COMPAT, 'windows-1252'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Password:</td>
      <td><textarea name="password" cols="32"><?php echo htmlentities($row_recMod['password'], ENT_COMPAT, 'windows-1252'); ?></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"></td>
      <td><input type="submit" value="Actualitzar registre" /></td>
	  
	  <tr><input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="iddat" value="<?php echo $row_recMod['iddat']; ?>" />
</form>

  <div align="center"><a href="delete.php?recordID=<?php echo $row_recMod['iddat']; ?> " target="_parent"><img src="imatges/repos.gif" width="20" height="20" border="0" align="middle" title="BORRAR REGISTRE" /></a></div>
  <div align="center"><a href="http://cryptfire.com/" target="_blank"><b>Crypt Fire</b></a></div>
  </tr>
	  
	  
    </tr>
			
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
mysql_free_result($recMod);
mysql_free_result($recTipus);
/* mysql_free_result($recSec); */
?>
