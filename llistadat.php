<?php require_once('Connections/conn_preferits.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_rcdDat = 10;
$pageNum_rcdDat = 0;
if (isset($_GET['pageNum_rcdDat'])) {
  $pageNum_rcdDat = $_GET['pageNum_rcdDat'];
}
$startRow_rcdDat = $pageNum_rcdDat * $maxRows_rcdDat;

$colname_rcdDat = "-1";
if (isset($_GET['tipus_rec'])) {
  $colname_rcdDat = (get_magic_quotes_gpc()) ? $_GET['tipus_rec'] : addslashes($_GET['tipus_rec']);
}
mysql_select_db($database_conn_preferits, $conn_preferits);
$query_rcdDat = sprintf("SELECT dat.iddat, dat.adreca, tip.tipus, dat.observacions, dat.login, dat.password FROM dat JOIN     tip WHERE dat.tipus = %s AND dat.tipus = tip.idtip ORDER BY adreca ASC", $colname_rcdDat);
$query_limit_rcdDat = sprintf("%s LIMIT %d, %d", $query_rcdDat, $startRow_rcdDat, $maxRows_rcdDat);
$rcdDat = mysql_query($query_limit_rcdDat, $conn_preferits) or die(mysql_error());
$row_rcdDat = mysql_fetch_assoc($rcdDat);

if (isset($_GET['totalRows_rcdDat'])) {
  $totalRows_rcdDat = $_GET['totalRows_rcdDat'];
} else {
  $all_rcdDat = mysql_query($query_rcdDat);
  $totalRows_rcdDat = mysql_num_rows($all_rcdDat);
}
$totalPages_rcdDat = ceil($totalRows_rcdDat/$maxRows_rcdDat)-1;

mysql_select_db($database_conn_preferits, $conn_preferits);
$query_rcdTip = "SELECT * FROM tip";
$rcdTip = mysql_query($query_rcdTip, $conn_preferits) or die(mysql_error());
$row_rcdTip = mysql_fetch_assoc($rcdTip);
$totalRows_rcdTip = mysql_num_rows($rcdTip);

$queryString_rcdDat = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rcdDat") == false && 
        stristr($param, "totalRows_rcdDat") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rcdDat = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rcdDat = sprintf("&totalRows_rcdDat=%d%s", $totalRows_rcdDat, $queryString_rcdDat);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
        <div align="center"><span class="Estilo3">RESULTATS DE LA RECERCA </span></div></td>
  </tr>
</tbody>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="70%">
  <tbody><tr>
    <td width="560" align="center" valign="top">
	  <div align="center">
	   <img src="imatges/body_main_header.gif" /><br>
	   <table width="100%" border="0" cellpadding="4" cellspacing="0" style="border: 1px solid rgb(23, 23, 222);">
	     <?php do { ?>
	       <tr>
	              <td><table width="100%" border="1" cellspacing="2" cellpadding="2">
                     <tr>
                      <th width="40%" scope="col"><a href="<?php echo $row_rcdDat['adreca']; ?>" target="_blank"><?php echo $row_rcdDat['adreca']; ?></a></th>
                       <th width="60%" scope="col"><?php echo $row_rcdDat['observacions']; ?></th>
                     </tr>
                           </table>
                    </td>
	       </tr>
	       <?php } while ($row_rcdDat = mysql_fetch_assoc($rcdDat)); ?>
		</table>
	   <div align="center"><br>
	     <table width="100%" border="1" cellspacing="2" cellpadding="2">
           <tr>
             <th scope="col"><div align="left"><a href="<?php printf("%s?pageNum_rcdDat=%d%s", $currentPage, 0, $queryString_rcdDat); ?>">Primer</a></div></th>
             <th scope="col"><div align="center"><a href="<?php printf("%s?pageNum_rcdDat=%d%s", $currentPage, max(0, $pageNum_rcdDat - 1), $queryString_rcdDat); ?>">Anterior</a></div></th>
             <th scope="col"><div align="center"><a href="<?php printf("%s?pageNum_rcdDat=%d%s", $currentPage, min($totalPages_rcdDat, $pageNum_rcdDat + 1), $queryString_rcdDat); ?>">Següent</a></div></th>
             <th scope="col"><div align="right"><a href="<?php printf("%s?pageNum_rcdDat=%d%s", $currentPage, $totalPages_rcdDat, $queryString_rcdDat); ?>">Últim</a></div></th>
           </tr>
         </table>
	   </div>
	  </div>
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

mysql_free_result($rcdTip);
?>