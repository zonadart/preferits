<?php require_once('Connections/conn_preferits.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_rcdDats = 10;
$pageNum_rcdDats = 0;
if (isset($_GET['pageNum_rcdDats'])) {
  $pageNum_rcdDats = $_GET['pageNum_rcdDats'];
}
$startRow_rcdDats = $pageNum_rcdDats * $maxRows_rcdDats;

mysql_select_db($database_connPreferits, $connPreferits);
$query_rcdDats = "SELECT adreca, tipus, observacions FROM dat ORDER BY adreca ASC";
$query_limit_rcdDats = sprintf("%s LIMIT %d, %d", $query_rcdDats, $startRow_rcdDats, $maxRows_rcdDats);
$rcdDats = mysql_query($query_limit_rcdDats, $connPreferits) or die(mysql_error());
$row_rcdDats = mysql_fetch_assoc($rcdDats);

if (isset($_GET['totalRows_rcdDats'])) {
  $totalRows_rcdDats = $_GET['totalRows_rcdDats'];
} else {
  $all_rcdDats = mysql_query($query_rcdDats);
  $totalRows_rcdDats = mysql_num_rows($all_rcdDats);
}
$totalPages_rcdDats = ceil($totalRows_rcdDats/$maxRows_rcdDats)-1;

$queryString_rcdDats = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rcdDats") == false && 
        stristr($param, "totalRows_rcdDats") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rcdDats = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rcdDats = sprintf("&totalRows_rcdDats=%d%s", $totalRows_rcdDats, $queryString_rcdDats);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Zona d'Art - Preferits</title>
    <style type="text/css">
<!--
.Estilo6 {
	color: #000000;
	font-family: "Courier New", Courier, monospace;
	font-weight: bold;
}
-->
    </style>
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<center>
<table id="main" border="0" cellpadding="0" cellspacing="0" width="70%">
    <tbody><tr>
    <td><a href="index.html" target="_self"><img src="imatges/capsal02.png" width="766" height="104" border="0" /></a></td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
  </tr>
  <tr>
      <td background="assets/body_main_header.gif" class="main"><div align="center"><strong>TOTES LES  DADES </strong></div></td>
  </tr>
</tbody>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="70%">
  <tbody><tr>
    <td width="560" align="center" valign="top">
	  <center>
	   <img src="imatges/body_main_header.gif" width="766" height="25" /><br>
	   <table width="766" border="0" cellpadding="4" cellspacing="0" style="border: 1px solid rgb(23, 23, 222);">
	   <tr>
	 	<td><table width="100%" border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#0000FF" bgcolor="#0066FF">
          <tr>
            <th class="Estilo6" scope="row"><table width="100%" border="1" cellspacing="2" cellpadding="2">
              <?php do { ?>
                <tr>
                    <th width="34%" scope="col"><?php echo $row_rcdDats['adreca']; ?></th>
                  <th width="10%" scope="col"><?php echo $row_rcdDats['tipus']; ?></th>
                  <th width="56%" scope="col"><?php echo $row_rcdDats['observacions']; ?></th>
                </tr>
                <?php } while ($row_rcdDats = mysql_fetch_assoc($rcdDats)); ?>
            </table></th>
          </tr>
          
        </table>
	 	</td>
	   </tr>
		</table>
	   <div align="center">
	     <table width="100%" border="0" cellspacing="2" cellpadding="2">
           <tr>
             <th scope="row"><div align="left"><a href="<?php printf("%s?pageNum_rcdDats=%d%s", $currentPage, 0, $queryString_rcdDats); ?>">Primer</a></div></th>
             <td><div align="center"><a href="<?php printf("%s?pageNum_rcdDats=%d%s", $currentPage, max(0, $pageNum_rcdDats - 1), $queryString_rcdDats); ?>"><strong>Anterior</strong></a></div></td>
             <td><div align="center"><a href="<?php printf("%s?pageNum_rcdDats=%d%s", $currentPage, min($totalPages_rcdDats, $pageNum_rcdDats + 1), $queryString_rcdDats); ?>"><strong>Següent</strong></a></div></td>
             <td><div align="right"><a href="<?php printf("%s?pageNum_rcdDats=%d%s", $currentPage, $totalPages_rcdDats, $queryString_rcdDats); ?>"><strong>Últim</strong></a></div></td>
           </tr>
         </table>
	     <br>
	     </div>
	  </center>
	 </td>
  </tr>
</tbody></table>
<table border="0" cellpadding="0" cellspacing="0" width="70%">
  <tbody><tr>
      <td><div align="center"><img src="imatges/body_main_footer.gif" width="766" height="25" /></div></td>
  </tr>
</tbody></table>
</center>
</body>
</html>
<?php
mysql_free_result($rcdDats);
?>