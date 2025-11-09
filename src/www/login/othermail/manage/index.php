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
$mail = new Mail();
session_start();

$mail->MailPageForceSSL();
$mail->MailPageNoCache();
$mail->MailLoginInit();
$mail->MailOptionList();
$mail->MailLoginExpire();

if( isset($_GET['mid']) && !$mail->MailAccountIs($_GET['mid']) ) {
	
	$_SESSION['result'] = $mail->errorcode['36'];
	header('Location: http://' . $mail->server['main'] . '/login/othermail');	
	exit();
}

if( $mail->MailPostIs('viewfolder') ) {
	
	if( $_POST['viewfolder'] == 'create' ) {
		
		$mail->MailFolderRegister($_POST['newfolder']);
	
	} elseif( $_POST['viewfolder'] != $_SESSION['folder_cur'] ) {
	
		$mail->MailFolderRedirect($_POST['viewfolder']);
	}
}

if( isset($_GET['mid']) ) {
	
	if( $mail->MailAccountPrimaryIs($_GET['mid']) ) {

		$primaryis = TRUE;
	}
		
	$mail->MailAccountNameList($_GET['mid']);
	$_SESSION['folder_cur'] = $mail->mail_account_name_list['folder'];
}

if( $mail->MailPostIs('submit') ) {
	
	if( isset($_GET['mid']) ) {
		
		if( $mail->MailAccountFormat($_POST['account']) ) {
				
			$mail->MailAccountUpdate($_GET['mid'],$_POST['account']);
	
		}
		
	} elseif( $mail->MailAccountFormat($_POST['account'],1) )  {
		
		$mail->MailAccountRegister($_POST['account']);
	}
}

if( !is_array($_POST['account']) && !isset($_GET['mid']) ) {
	
	$_POST['account']['auto'] 	= '1';
	$_POST['account']['color'] 	= 'FFFFFF';
	$_POST['account']['port'] 	= 110;
	$_POST['account']['rmcycle'] 	= 3;
	$_POST['account']['saveto'] 	= 'existant';

} elseif( !is_array($_POST['account']) && isset($_GET['mid']) ) {	
	
	$_POST['account']		= $mail->mail_account_name_list;
	$_POST['account']['saveto'] 	= 'existant';
}

$mail->MailFolderView();
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

</script>
<script>
function interactivehelp() {
	h3ll0=window.open('/info/help/','elite','toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,width=540,height=400');
}

function accountinfo() {
	h3ll0=window.open('/info/importmail/01.aka','elite','toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,width=540,height=400');
}

function colorcoordinate() {
	h3ll0=window.open('/info/importmail/02.aka','elite','toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,width=540,height=400');
}

function savemessages() {
	h3ll0=window.open('/info/importmail/03.aka','elite','toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,width=540,height=400');
}

function advancedoptions() {
	h3ll0=window.open('/info/importmail/04.aka','elite','toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,width=540,height=400');
}

function autodel() {
	h3ll0=window.open('/info/importmail/05.aka','elite','toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,width=540,height=400');
}

function autodell() {
	h3ll0=window.open('/info/importmail/06.aka','elite','toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,width=540,height=400');
}

function centerwindow(url,theWidth,theHeight) {  
 var theTop=(screen.height/2)-(theHeight/2);  
 var theLeft=(screen.width/2)-(theWidth/2);  
 var features='height='+theHeight+',width='+theWidth+',top='+theTop+',left='+theLeft+",scrollbars=no";  
 theWin=window.open(url,'',features); 
}  

</script>


<STYLE type=text/css>
@import url("/css/aka.css");

A:hover {
	COLOR: #666666
}
</STYLE>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="20" marginwidth="0" marginheight="0" onLoad="MM_preloadImages('../../img/compose_eml_d.jpg','../../img/address_book_d.jpg','../../img/collect_email_d.jpg')" link="#0000cc" vlink="#0000cc" alink="#0000cc">
<form method="post" action="" name="email">
<input type=hidden name="newfolder" value="">
  <table cellspacing=0 cellpadding=0 width=800 border=0 align="center">
    <tbody> 
    <tr align=left valign="top"> 
      <td style="BORDER-RIGHT: #A3A3A3 1px solid; BORDER-TOP: #A3A3A3 1px solid; BORDER-LEFT: #A3A3A3 1px solid; BORDER-BOTTOM: #A3A3A3 1px solid"> 
        <table width="800" border="0" cellspacing="0" cellpadding="0" height="28">
          <tr align="left" valign="bottom"> 
            <td height="47" width="11" valign="middle"> 
              <div align="left"></div>
            </td>
            <td height="47" width="595" valign="middle"> <a href="http://<? print($mail->server['main']); ?>"><img src="/img/top_logo_left.gif" width="388" height="48" border="0"></a></td>
              <td height="47" width="194" valign="top" align="left"> <? print($mail->mail_folder_view_top); ?></td>
          </tr>
        </table>
          <table width="800" border="0" cellspacing="0" cellpadding="0" height="12">
            <tr> 
              <td height="2"> <table width="800" border="0" cellspacing="0" cellpadding="0" height="12">
                  <tr> 
                    <td height="2"> <table width="800" border="0" cellspacing="0" cellpadding="0">
                        <tr> 
                          <td width="365"><img src="/img/1_dv.gif" width="365" height="31"></td>
                          <td width="80"><a href="http://<? print($mail->server['main']); ?>/login/inbox/" onMouseOver="window.status='View your inbox for new e-mail'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/5_in.gif" width="79" height="31" border="0"></a></td>
                          <td width="76"><a href="http://<? print($mail->server['main']); ?>/login/sent/" onMouseOver="window.status='View your sent e-mail folder'; return true;"><img src="/img/1_sent.gif" width="76" height="31" border="0"></a></td>
                          <td width="118"><a href="http://<? print($mail->server['main']); ?>/login/deleted/" onMouseOver="window.status='View all deleted e-mail'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/1_del.gif" width="118" height="31" border="0"></a></td>
                          <td width="62"><a href="http://<? print($mail->server['main']); ?>/login/options/" onMouseOver="window.status='Edit your account settings'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/1_opt.gif" width="93" height="31" border="0"></a></td>
                          <td width="99"><a href="http://<? print($mail->server['main']); ?>/login/drafts/" onMouseOver="window.status='View your drafted e-mail folder'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/1_drafts.gif" width="69" height="31" border="0"></a></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
          </table>
          <? include($mail->tpl['html'] . '/toolbar.html'); ?>
          <table width="800" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="29">&nbsp;</td>
            <td width="761" align="left" valign="top"> 
              <table width="315" border="0" cellspacing="0" cellpadding="0">
                  <tr> 
                    <td width="315" height="2">&nbsp;</td>
                  </tr>
                </table>  
                <table width="770" border="0" class="akalink">
                  <tr> 
                    <td width="590" height="21" align="left"><input name="account[auto]" type="checkbox" value="1" <? if( $_POST['account']['auto'] == 1) { print('checked'); } ?>>
                      Auto check for new messages</td>
                    <td width="170" align="left"><? $mail->MailSecurePrint(); ?></td>
                  </tr>
                </table>
                <table width="315" border="0" class="akalink">
                  <tr> 
                    <td width="309" height="22" valign="bottom"><strong><font color="#000000">Account 
                      Information:</font></strong> <font color="#000000"><b><span class="akalink"><font class="body" color="#FFFFFF" face="Arial, Helvetica, sans-serif" size="2"><a href="javascript:accountinfo();"><img 
                  height=16 
                  width=12 border=0 src="/img/qmark.gif" alt="AKALink Help Files"></a></font> 
                      </span></b></font></td>
                  </tr>
                </table>
                <table width="41%" border="0" cellpadding="0" cellspacing="0">
                  <tr> 
                    <td align="left" valign="top" class="akalink"><strong><font color="#FF0000"><? $mail->MailErrorPrint(); ?></font></strong></td>
                  </tr>
                </table>
                
                <? if( !isset($primaryis) ) { ?>
                <table width="754" border="0" class="akalink">
                  <tr> 
                    <td width="87">Nick Name:</td>
                    <td width="657"> <input class=textfields  maxlength="32" size="25" name="account[nick]" value="<? print($_POST['account']['nick']); ?>">
                    <? $mail->MailErrorXmarkPrint($mail->mail_account_img_error['nick']); ?>
                    <font class="body">(e.g My E-Mail)</font> </td>
                  </tr>
                </table>
                <? } ?>
                <table width="754" border="0" class="akalink">
                  <tr> 
                    <td width="87">Full Name:</td>
                    <td width="657"> <input class=textfields  maxlength="32" size="25" name="account[name]" value="<?  print($_POST['account']['name']); ?>">
                      <? $mail->MailErrorXmarkPrint($mail->mail_account_img_error['name']); ?>
                      <span class="akalink"><font class="body">(e.g John Doe)</font></span> 
                    </td>
                  </tr>
                </table>
              
              <? if( !isset($primaryis) ) { ?>
                
              <table width="755" border="0" class="akalink">
                <tr> 
                  <td width="87"> E-Mail Address:</td>
                  <td width="658"> 
                    <input class="textfields"  maxlength="64" size="25" name="account[email]" value=<? print($_POST['account']['email']); ?>>
                     <? $mail->MailErrorXmarkPrint($mail->mail_account_img_error['email']); ?>
                    (e.g <? print($mail->lp['login']); ?>) </td>
                </tr>
              </table>
              
              <? } ?>
              
                <table width="755" border="0" class="akalink">
                  <tr> 
                    <td width="87"> Reply Address:</td>
                    <td width="658"> 
                    <input class="textfields"  maxlength="64" size="25" name="account[reply]" value=<? print($_POST['account']['reply']); ?>>
                      <? $mail->MailErrorXmarkPrint($mail->mail_account_img_error['reply']); ?>
                      (e.g <? print($mail->lp['login']); ?>) </td>
                  </tr>
                </table>
                
             <? if( !isset($primaryis) ) { ?>
              
                <table width="755" border="0" class="akalink">
                  <tr> 
                    <td width="87"> Mail Server:</td>
                    <td width="658"> <input class="textfields"  maxlength="64" size="25" name="account[host]" value="<? print($_POST['account']['host']); ?>">
                      <? $mail->MailErrorXmarkPrint($mail->mail_account_img_error['host']); ?>
                      (e.g <? print($mail->server['main']); ?>) </td>
                  </tr>
                </table>
                <table width="755" border="0" class="akalink">
                  <tr> 
                    <td width="87" height="20"> User ID/Name:</td>
                    <td width="658"> <input class="textfields"  maxlength="64" size="25" name="account[login]" value="<? print($_POST['account']['login']); ?>">
                      <? $mail->MailErrorXmarkPrint($mail->mail_account_img_error['login']); ?>
                      (e.g <? print($mail->lp['login']); ?> or <? list($user,$domain) = explode('@',$mail->lp['login']); print($user); ?> )</td>
                  </tr>
                </table>
                <table width="349" border="0" class="akalink">
                  <tr> 
                    <td width="88"> Password:</td>
                    <td width="253"> <input class="textfields" maxlength="32" size="25" name="account[passwd]" value="<? print($_POST['account']['passwd']); ?>"  type="password"> 
                    <? $mail->MailErrorXmarkPrint($mail->mail_account_img_error['passwd']); ?>
                    </td>
                  </tr>
                </table>
                
                <? }?>
                
                <table width="322" border="0" class="akalink">
                  <tr> 
                    <td width="316" height="22" valign="bottom"><strong><font color="#000000">Color 
                      Coordinate New Messages:</font></strong> <font color="#000000"><b><span class="akalink"><font class="body" color="#FFFFFF" face="Arial, Helvetica, sans-serif" size="2"><a href="javascript:colorcoordinate();"><img 
                  height=16 
                  width=12 border=0 src="/img/qmark.gif" alt="AKALink Help Files"></a></font> 
                      </span></b></font></td>
                  </tr>
                </table>
                <table width="386" border="0" class="akalink">
                  <tr> 
                    <td width="60" height="21" valign="top"> <table width="60" border="0" cellspacing="0" cellpadding="0">
                        <tr> 
                          <td width="20"><font color=#000000> 
                            <input type="radio" name="account[color]" value="FFFFFF" <? if( $_POST['account']['color'] == 'FFFFFF' ) { print('checked'); } ?>>
                            </font></td>
                          <td width="40" class="akalink">None</td>
                        </tr>
                      </table></td>
                    <td width="30" align="left" valign="top"> <table width="30" border="0" cellspacing="0" cellpadding="0">
                        <tr> 
                          <td width="24"><font color=#000000> 
                            <input type="radio" name="account[color]" value="F1F1F1" <? if( $_POST['account']['color'] == 'F1F1F1' ) { print('checked'); } ?>>
                            </font></td>
                          <td width="10" bgcolor="#F1F1F1">&nbsp;</td>
                        </tr>
                      </table></td>
                    <td width="30" valign="top"> <table width="30" border="0" cellspacing="0" cellpadding="0">
                        <tr> 
                          <td width="24"><font color=#000000> 
                            <input type="radio" name="account[color]" value="FFECFF" <? if( $_POST['account']['color'] == 'FFECFF' ) { print('checked'); } ?>>
                            </font></td>
                          <td width="10" bgcolor="#FFECFF">&nbsp;</td>
                        </tr>
                      </table></td>
                    <td width="30" align="left" valign="top"> <table width="30" border="0" cellspacing="0" cellpadding="0">
                        <tr> 
                          <td width="24"><font color=#000000> 
                            <input type="radio" name="account[color]" value="FEFFD0" <? if( $_POST['account']['color'] == 'FEFFD0' ) { print('checked'); } ?>>
                            </font></td>
                          <td width="10" bgcolor="#FEFFD0">&nbsp;</td>
                        </tr>
                      </table></td>
                    <td width="30" align="left" valign="top"><table width="30" border="0" cellspacing="0" cellpadding="0">
                        <tr> 
                          <td width="24"><font color=#000000> 
                            <input type="radio" name="account[color]" value="DBE5FF" <? if( $_POST['account']['color'] == 'DBE5FF' ) { print('checked'); } ?>>
                            </font></td>
                          <td width="10" bgcolor="#DBE5FF">&nbsp; </td>
                        </tr>
                      </table></td>
                    <td width="30" align="left" valign="top"><table width="30" border="0" cellspacing="0" cellpadding="0">
                        <tr> 
                          <td width="24"><font color=#000000> 
                            <input type="radio" name="account[color]" value="D3F7AC" <? if( $_POST['account']['color'] == 'D3F7AC' ) { print('checked'); } ?>>
                            </font></td>
                          <td width="10" bgcolor="#D3F7AC">&nbsp; </td>
                        </tr>
                      </table></td>
                    <td width="146" align="left" valign="top"><table width="30" border="0" cellspacing="0" cellpadding="0">
                        <tr> 
                          <td width="24"><font color=#000000> 
                            <input type="radio" name="account[color]" value="FDDDC0" <? if( $_POST['account']['color'] == 'FDDDC0' ) { print('checked'); } ?>>
                            </font></td>
                          <td width="10" bgcolor="#FDDDC0">&nbsp; </td>
                        </tr>
                      </table></td>
                  </tr>
                  <? $mail->MailErrorXmarkPrint($mail->mail_account_img_error['color']); ?>
                </table>
                <table width="322" border="0" class="akalink">
                  <tr> 
                    <td width="316" height="22" valign="bottom"><strong><font color="#000000">Save 
                      Messages:</font></strong> <font color="#000000"><b><span class="akalink"><font class="body" color="#FFFFFF" face="Arial, Helvetica, sans-serif" size="2"><a href="javascript:savemessages()"> 
                      <img 
                  height=16 
                  width=12 border=0 src="/img/qmark.gif" alt="AKALink Help Files"></a></font> 
                      </span></b></font></td>
                  </tr>
                </table>
                <table width="349" border="0">
                  <tr> 
                    <td width="20" height="22"><input type="radio" name="account[saveto]" value="new" <? if( $_POST['account']['saveto'] == 'new' ) { print('checked'); }  ?>></td>
                    <td width="116"><span class="akalink">To a new folder:</span><span class="akalink"> 
                      </span></td>
                    <td width="199"><span class="akalink"> 
                      <input class="textfields"  maxlength="16" size="20" name="account[newfolder]" value="<? print($_POST['account']['newfolder']) ?>">
                      </span> 
                      <? $mail->MailErrorXmarkPrint($mail->mail_account_img_error['newfolder']); ?>
                    </td>
                  </tr>
                </table>
                <table width="349" border="0">
                  <tr> 
                    <td width="20" height="22"><input name="account[saveto]" type="radio" value="existant" <? if( $_POST['account']['saveto'] == 'existant' ) { print('checked'); } ?>></td>
                    <td width="115"><span class="akalink">To an existing folder:</span><span class="akalink"> 
                      </span></td>
                    <td width="200"><span class="akalink"> 
                      <select name="account[existantfolder]" class="dropdowns">
                        <? print($mail->mail_folder_view_move); ?> 
                      </select>
                      </span>
                      <? $mail->MailErrorXmarkPrint($mail->mail_account_img_error['existantfolder']); ?>
                      </td>
                  </tr>
                </table>
                <? if( !isset($primaryis) ) { ?>
                 
				<table width="322" border="0" class="akalink">
                  <tr> 
                    <td width="316" height="22" valign="bottom"><strong><font color="#000000">Advanced 
                      Options:</font></strong> <font color="#000000"><b><span class="akalink"><font class="body" color="#FFFFFF" face="Arial, Helvetica, sans-serif" size="2"><a href="javascript:advancedoptions();"><img 
                  height=16 
                  width=12 border=0 src="/img/qmark.gif" alt="AKALink Help Files"></a></font> 
                      </span></b></font></td>
                  </tr>
                </table>
				<table width="209" border="0">
                  <tr> 
                    <td width="79" height="22"><span class="akalink">Use POP port:</span><span class="akalink"> 
                      </span></td>
                    <td width="120"><span class="akalink"> 
                      <input class="textfields"  maxlength="5" size="8" name="account[port]" value="<? print($_POST['account']['port']);  ?>">
                     <? $mail->MailErrorXmarkPrint($mail->mail_account_img_error['port']); ?>
                      </span></td>
                  </tr>
                </table>
		<? } ?>	
              <table width="322" border="0" class="akalink">
                  <tr> 
                    <td width="316" height="22" valign="bottom"><span class="akalink"><b><font color="#000000">Auto 
                      Delete E-Mail From Mail Server Every:</font></b></span><font color="#000000"><b><span class="akalink"> 
                      <font class="body" color="#FFFFFF" face="Arial, Helvetica, sans-serif" size="2"><a href="javascript:autodel();"> 
                      <img 
                  height=16 
                  width=12 border=0 src="/img/qmark.gif" alt="AKALink Help Files"></a></font> 
                      </span></b></font></td>
                  </tr>
                </table>
                <table width="279" border="0" class="akalink">
                  <tr> 
                    <td width="273" height="22"> <input type="radio" name="account[rmcycle]" value="1" <? if( $_POST['account']['rmcycle'] == 1 ) { print('checked');  } ?>>
                      Day 
                       <input name="account[rmcycle]" type="radio" value="2" <? if( $_POST['account']['rmcycle'] == 2 ) { print('checked');  } ?>>
                      Week 
                       <input name="account[rmcycle]"  type="radio" value="3" <? if( $_POST['account']['rmcycle'] == 3 ) { print('checked');  } ?>>
                      Month 
                       <input name="account[rmcycle]" type="radio" value="4" <? if( $_POST['account']['rmcycle'] == 4 ) { print('checked');  }  ?>>
                      Never<span class="akalink"> </span></td>
                  </tr>
                </table>
                <table width="221" border="0">
                  <tr> 
                    <td width="215" height="42" valign="bottom"><div align="center"><font 
            face="Arial, helvetica, sans-serif" color=#000000 size=2> 
                        <input type="image" border="0" name="submit" src="/img/web_submit.gif" width="100" height="30">
                        <a href="http://<? print($mail->server['main']); ?>/login/othermail/"><img src="/img/web_cancel.gif" width="100" height="30" border="0"></a> 
                        </font></div></td>
                  </tr>
                </table>
                <table width="75%" border="0" cellpadding="0" cellspacing="0">
                  <tr> 
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                </table></td>
          </tr>
        </table>
      </td>
    </tr>
    </tbody> 
  </table>
  <? include($mail->tpl['html'] . '/footer.html'); ?> 
</form>
</body>
</html>
