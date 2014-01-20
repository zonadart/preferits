<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=WINDOWS-1252" />
<title>Zona d'Art - Preferits</title>
<style type="text/css">
<!--
#menu {
	position:absolute;
	left:24px;
	top:15px;
	width:159px;
	height:400px;
	z-index:8;
	visibility: visible;
}
#cos01 {
	position:absolute;
	left:196px;
	top:100px;
	width:380px;
	height:166px;
	z-index:1;
	visibility: hidden;
}
#capsal {
	position:absolute;
	left:196px;
	top:15px;
	width:380px;
	height:52px;
	z-index:9;
	visibility: visible;
}
#cos02 {
	position:absolute;
	left:196px;
	top:100px;
	width:380px;
	height:166px;
	z-index:2;
	visibility: hidden;
}
#cos03 {
	position:absolute;
	left:196px;
	top:100px;
	width:380px;
	height:166px;
	z-index:3;
	visibility: hidden;
}
#cos04 {
	position:absolute;
	left:196px;
	top:100px;
	width:380px;
	height:166px;
	z-index:4;
	visibility: hidden;
}
#cos05 {
	position:absolute;
	left:196px;
	top:100px;
	width:380px;
	height:166px;
	z-index:5;
	visibility: hidden;
}
#cos06 {
	position:absolute;
	left:196px;
	top:100px;
	width:380px;
	height:166px;
	z-index:6;
	visibility: visible;
}
#cos07 {
	position:absolute;
	left:196px;
	top:100px;
	width:380px;
	height:166px;
	z-index:7;
	visibility: visible;
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

function MM_showHideLayers() { //v6.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) if ((obj=MM_findObj(args[i]))!=null) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}
//-->
</script>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body onload="MM_preloadImages('imatges/boton_intro_dades_inv.png','imatges/boton_llistat_tipus_inv.png','imatges/boton_llistat_dades_inv.png','imatges/boton_modificacions_inv.png','imatges/boton_totes_dades_inv.png','imatges/boton_recerques_inv.png')">
<div id="menu">
  <table width="100%" border="0">
    <tr>
      <th scope="row">&nbsp;</th>
    </tr>
    <tr>
      <th scope="row"><a href="introdat.php" target="_self" onmouseover="MM_showHideLayers('menu','','show','cos01','','hide','capsal','','show','cos02','','show','cos03','','hide','cos04','','hide','cos05','','hide','cos06','','hide','cos07','','hide');MM_swapImage('introdades','','imatges/boton_intro_dades_inv.png',1)" onmouseout="MM_swapImgRestore()"><img src="imatges/boton_intro_dades.png" name="introdades" width="150" height="50" border="0" id="introdades" /></a></th>
    </tr>
    <tr>
      <th scope="row"><a href="llistatip.php" target="_self" onmouseover="MM_swapImage('llistattipus','','imatges/boton_llistat_tipus_inv.png',1);MM_showHideLayers('menu','','show','cos01','','hide','capsal','','show','cos02','','hide','cos03','','show','cos04','','hide','cos05','','hide','cos06','','hide','cos07','','hide')" onmouseout="MM_swapImgRestore()"><img src="imatges/boton_llistat_tipus.png" name="llistattipus" width="150" height="50" border="0" id="llistattipus" /></a></th>
    </tr>
    <tr>
      <th scope="row"><a href="recercadat.php" target="_self" onmouseover="MM_swapImage('llistatdades','','imatges/boton_llistat_dades_inv.png',1);MM_showHideLayers('menu','','show','cos01','','hide','capsal','','show','cos02','','hide','cos03','','hide','cos04','','show','cos05','','hide','cos06','','hide','cos07','','hide')" onmouseout="MM_swapImgRestore()"><img src="imatges/boton_llistat_dades.png" name="llistatdades" width="150" height="50" border="0" id="llistatdades" /></a></th>
    </tr>
    <tr>
      <th scope="row"><a href="recercadatmod.php" target="_self" onmouseover="MM_swapImage('modificacions','','imatges/boton_modificacions_inv.png',1);MM_showHideLayers('menu','','show','cos01','','hide','capsal','','show','cos02','','hide','cos03','','hide','cos04','','hide','cos05','','show','cos06','','hide','cos07','','hide')" onmouseout="MM_swapImgRestore()"><img src="imatges/boton_modificacions.png" name="modificacions" width="150" height="50" border="0" id="modificacions" /></a></th>
    </tr>
    <tr>
      <th scope="row"><a href="llistadat_.php" target="_self" onmouseover="MM_swapImage('totesdades','','imatges/boton_totes_dades_inv.png',1);MM_showHideLayers('menu','','show','cos01','','hide','capsal','','show','cos02','','hide','cos03','','hide','cos04','','hide','cos05','','hide','cos06','','show','cos07','','hide')" onmouseout="MM_swapImgRestore()"><img src="imatges/boton_totes_dades.png" name="totesdades" width="150" height="50" border="0" id="totesdades" /></a></th>
    </tr>
    <tr>
      <th scope="row"><a href="introrecerca.php" target="_self" onmouseover="MM_swapImage('recerques','','imatges/boton_recerques_inv.png',1);MM_showHideLayers('menu','','show','cos01','','hide','capsal','','show','cos02','','hide','cos03','','hide','cos04','','hide','cos05','','hide','cos06','','hide','cos07','','show')" onmouseout="MM_swapImgRestore()"><img src="imatges/boton_recerques.png" name="recerques" width="150" height="50" border="0" id="recerques" /></a></th>
    </tr>
  </table>
</div>
<div id="cos01"><img src="imatges/01.png" width="380" height="166" /></div>
<div id="capsal"><a href="http://quicksilver/preferits/" target="_blank"><img src="imatges/capsal02.png" border="0" /></a></div>
<div id="cos02"><img src="imatges/02.png" width="380" height="166" /></div>
<div id="cos03"><img src="imatges/03.png" width="380" height="166" /></div>
<div id="cos04"><img src="imatges/04.png" width="380" height="166" /></div>
<div id="cos05"><img src="imatges/05.png" width="380" height="166" /></div>
<div id="cos06"><img src="imatges/06.png" width="380" height="166" /></div>
<div id="cos07"><img src="imatges/07.png" width="380" height="166" /></div>
</body>
</html>
