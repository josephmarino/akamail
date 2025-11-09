<?
///
// +--------------------------------------------------------------------------------------------------------+
// | AKA Mail - Revision 1.0                                                                                |
// | Copyright (c) 2003 AKA Link Communications Corporation, Joseph P. Marino, Jonathan Fortin              |
// +--------------------------------------------------------------------------------------------------------+
// | Authors: Joseph P. Marino <joseph@marino.net> and Jonathan Fortin <jonathan@fortin.com>                |
// +--------------------------------------------------------------------------------------------------------+
// | AGPLv3 License                                                                                         |
// |                                                                                                        |
// | This file is part of AKA Mail.                                                                         |
// |                                                                                                        |
// | AKA Mail is free software: you can redistribute it and/or modify it under the terms of the             |
// | GNU Affero General Public License as published by the Free Software Foundation, either version 3       |
// | of the License, or (at your option) any later version.                                                 |
// |                                                                                                        |
// | AKA Mail is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even     |
// | the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.                           |
// |                                                                                                        |
// | See the GNU Affero General Public License for more details.                                            |
// |                                                                                                        |
// | You should have received a copy of the GNU Affero General Public License along with AKA Mail.          |
// | If not, see <https://www.gnu.org/licenses/>.                                                           |
// +--------------------------------------------------------------------------------------------------------+
///

require($_SERVER['DOCUMENT_ROOT'] . '/include/akamail.class');
$mail	= new Mail();
session_start();

$mail->MailPageNoCache();
$mail->MailLoginInit();
$mail->MailOptionList();
$mail->MailLoginExpire();

if( $mail->MailPostIs('bookxprs') ) { 

	$mail->MailExpressOptionUpdate($_POST['bookxprs']);	
}

if( $mail->MailPostIs('register') ) {

	$mail->MailExpressRegister($_POST['book']);
}

if( $mail->MailPostIs('release') ) {

	$mail->MailExpressRelease($_POST['xprs']);
}

$mail->MailOptionList();
$mail->MailExpressList();
?>
<? include($mail->tpl['html'] . '/header.html'); ?>
<script language="JavaScript">

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}

}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;

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

function closeall(){
opener.location.reload();
}

</script>
<style type="text/css">
@import url("/css/aka.css");

A:hover {
	COLOR: #666666
}
</style>
<body  bgcolor="#FFFFFF" background="/img/bg_akamail.jpg" link="#0000cc" vlink="#0000cc" alink="#0000cc" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >
 
<form method="post" action="" name="email">
<input type=hidden name="newfolder" value="">
  <table width="449" border="0">
    <tr valign="bottom"> 
      <td width="443" height="50" align="left" valign="top"><font color="#000000"><strong>
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="https://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="437" height="48">
          <param name="movie" value="/flash/akamail_top.swf">
          <param name="quality" value="high">
		  <param name=menu VALUE=false>
          <embed src="/flash/akamail_top.swf" quality="high" pluginspage="https://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="437" height="48"></embed></object>
        </strong></font></td>
    </tr>
  </table>
  <table width="581" border="0">
    <tr> 
      <td width="10">&nbsp;</td>
      <td width="561" align="left" valign="top"> 
        <table width="439" border="0" class="akalink">
																																								<tr valign="bottom"> 
																																																<td width="632" height="9"><font color="#000000"><strong><span class="headers">Edit 
																																																								Your Express Book </span></strong></font></td>
																																								</tr>
																																								<tr align="left" valign="top"> 
																																																<td height="212"> <span class="akalink"><font color="#FF0000"><b><? $mail->MailErrorPrint(); ?></b></font> 
																																																								</span> <table width="555" border="0">
																																																																<tr> 
																																																																								<td width="549" class="akalink"> 
																																																																																<input name="bookxprs" type="radio" value="1" onClick="email.submit();"  <? ($mail->mail_option_list['bookxprs'] == 1) ? print('checked') : NULL;?>>
																																																																																Always 
																																																																																use 
																																																																																the 
																																																																																5 
																																																																																most 
																																																																																frequently 
																																																																																e-mailed 
																																																																																addresses.</td>
																																																																</tr>
																																																																<tr> 
																																																																								<td class="akalink"> 
																																																																																<input type="radio" name="bookxprs" value="0" onClick="email.submit();" <? ($mail->mail_option_list['bookxprs'] == 0) ? print('checked') : NULL;?>>
																																																																																Always 
																																																																																use 
																																																																																the 
																																																																																<strong><font color="#000000">same 
																																																																																5 
																																																																																selected 
																																																																																addresses</font></strong><font color="#000000">&nbsp; 
																																																																																</font>in 
																																																																																my 
																																																																																Express 
																																																																																Book.</td>
																																																																</tr>
																																																																<tr>
																																																																								<td class="akalink">&nbsp;</td>
																																																																</tr>
																																																								</table>
																																																								<table width="556" border="0">
																																																																<tr> 
																																																																								<td width="38%" height="106" align="left" valign="top"><table width="204" border="0" cellpadding="0" cellspacing="0">
																																																																																								<tr class="akalink"> 
																																																																																																<td width="41%" height="19" valign="bottom"><strong><font face="Arial,Helvetica,sans-serif" size="2"><strong><font color="#000000">Address 
																																																																																																								Book 
																																																																																																								Contacts: 
																																																																																																								<? print($mail->mail_express_book_cnt); ?> 
																																																																																																								<select name="book[]" size="5" multiple class="dropdowns" style=width:18em;>
																																																																																																																<? print($mail->mail_express_book_list); ?> 
																																																																																																								</select>
																																																																																																								</font></strong></font></strong></td>
																																																																																								</tr>
																																																																																</table></td>
																																																																								<td align="left" valign="top"><table width="109" border="0" align="center" cellpadding="0" cellspacing="0">
																																																																																								<tr class="akalink"> 
																																																																																																<td height="9" valign="bottom">&nbsp;</td>
																																																																																								</tr>
																																																																																								<tr> 
																																																																																																<td width="16%" align="left" valign="middle"> 
																																																																																																								<table width="25" border="0" cellpadding="0" cellspacing="0">
																																																																																																																<tr> 
																																																																																																																								<td><input name="register" type="image" id="register6" src="/img/BTN_addcontacts.gif" width="117" height="24" border="0"></td>
																																																																																																																</tr>
																																																																																																																<tr> 
																																																																																																																								<td height="27" valign="bottom"><input name="release" type="image" id="release6" src="/img/btn_deletecontacts.gif" width="118" height="22" border="0"></td>
																																																																																																																</tr>
																																																																																																								</table></td>
																																																																																								</tr>
																																																																																</table></td>
																																																																								<td width="38%" align="left" valign="top"><table width="204" border="0" cellpadding="0" cellspacing="0">
																																																																																								<tr class="akalink"> 
																																																																																																<td width="43%" height="19" valign="bottom"><strong><font face="Arial,Helvetica,sans-serif" size="2"><strong><font color="#000000">Express 
																																																																																																								Book 
																																																																																																								Address 
																																																																																																								List: 
																																																																																																								<? print($mail->mail_express_xprs_cnt); ?> 
																																																																																																								<select name="xprs[]" size="5" multiple class="dropdowns" style=width:18em;>
																																																																																																																<? print($mail->mail_express_xprs_list); ?> 
																																																																																																								</select>
																																																																																																								</font><font class="body" color="#0f3f7f" face="Arial, Helvetica, sans-serif" size="2"> 
																																																																																																								</font></strong></font></strong></td>
																																																																																								</tr>
																																																																																</table></td>
																																																																</tr>
																																																								</table>
																																																								<table width="603" border="0" class="akalink">
																																																																<tr align="left" valign="top"> 
																																																																								<td width="315" height="30" align="right">&nbsp;</td>
																																																																								<td width="278" align="left"><a href="javascript:window.close();closeall();"><img src="/img/btn_save_all_changes.gif" width="130" height="28" border="0"></a><a href="javascript:window.close();"><img src="/img/btn_cancel.gif" width="100" height="28" border="0"></a></td>
																																																																</tr>
																																																								</table></td>
																																								</tr>
																																</table>
      </td>
    </tr>
  </table>
</form>
</body>
</html>