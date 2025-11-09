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
require($_SERVER['DOCUMENT_ROOT'] . '/include/webedit/WebEdit.inc');
require($_SERVER['DOCUMENT_ROOT'] . '/include/webedit/inc/default.inc');
$mail	= new Mail();
$ae	= new WebEdit();
session_start();

$mail->MailPageNoCache();
$mail->MailLoginInit();
$mail->MailOptionList();
$mail->MailLoginExpire();

if( $mail->MailPostIs('viewfolder') ) {
	
	if( $_POST['viewfolder'] == 'create' ) {
		
		$mail->MailFolderRegister($_POST['newfolder']);
	
	} elseif( $_POST['viewfolder'] != $_SESSION['folder_cur'] ) {
	
		$mail->MailFolderRedirect($_POST['viewfolder']);
	}
}

if( $mail->MailPostIs('delete') ) {

	$mail->MailSignatureDelete($_POST['signature']);
	unset($_POST['signature']);
}

if( isset($_POST['signature']) ) {

	$mail->MailSignatureView($_POST['signature']);
		
} elseif( $mail->MailSignatureDefaultGet() ) {

	$mail->MailSignatureView($mail->mail_signature_default);	
}

if( !$mail->MailPostIs('save') && !$mail->MailPostIs('delete') ) {

	if( isset($_POST['format']) ) {
	
		$mail->mail_signature_view['fmt']	= $_POST['format'];
	}
}

if( $mail->MailPostIs('save') ) {
			
	$mail->MailSignatureRegister($_POST['name'],$_POST['text'],$_POST['format'],$_POST['default']);
	$mail->mail_signature_view['name']	= $_POST['name'];
	$mail->mail_signature_view['text']	= $_POST['text'];
	$mail->mail_signature_view['fmt']	= $_POST['format'];
	$_POST['signature'] 			= mysql_insert_id();
} 

if( $mail->mail_signature_view['fmt'] == 1 && !$ae->isnotIEMS() ) {
		
	$selectedit[1] 				= 'selected';
	$OnRich 				= 'aka_onSubmit();';
	list($user,$domain)			 = explode('@',$mail->lp['login']);	
        
        $ae->attributes['alloweditsource'] 	= 'no';
        $ae->attributes['applet'] 		= 'auto';
        $ae->attributes['appletlicense'] 	= $mail->server['appletlicense'];
        $ae->attributes['defaultfont'] 		= '10pt Verdana';
        $ae->attributes['height'] 		= 200;
        $ae->attributes['image'] 		= 'yes';
        $ae->attributes['imagepath'] 		= $mail->path['data'] . '/' . $domain . '/' . $user[0] . '/' . $user[0] . $user[1] . '/' . $user . '/signature/';
        $ae->attributes['imageurl'] 		= 'http://' . $mail->server['main'] . '/data/' . $domain . '/' . $user[0] . '/' . $user[0] . $user[1] . '/' . $user . '/signature/';
        $ae->attributes['inc'] 			= 'http://' . $mail->server['main'] . '/include/webedit/inc/';
        $ae->attributes['name'] 		= 'text';
        $ae->attributes['quickfontcolors'] 	= 'Black,Red,Green,Blue';
        $ae->attributes['quickfonts'] 		= 'Arial,Verdana';
        $ae->attributes['quickstyles'] 		= 'highlight';
        $ae->attributes['quickstylesname'] 	= 'Highlight';
        $ae->attributes['stylesheet'] 		= '/style.css';
        $ae->attributes['tabview'] 		= 'true';
	$ae->attributes['toolbar'] 		= 'quickfont,quickfontsize,|,image,|,font,bold,italic,underline';
        $ae->attributes['upload'] 		= 'no';
        $ae->attributes['width'] 		= 500;
        
        if( !empty($mail->mail_signature_view['text']) ) {
        
        	  $ae->attributes['content'] = $mail->mail_signature_view['text'];
        }
	        
        $editbox 	= $ae->printAE();
      
} else {

	$selectedit[0]	= 'selected';
	$editbox 	= '<textarea name="text" cols="60" rows="10">' . $mail->mail_signature_view['text'] . '</textarea>';	
}

$mail->MailSignatureList($_POST['signature']);
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

function vacation() {
	h3ll0=window.open('/info/email/autoresponse/vacation.aka','elite','toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,width=540,height=400');
}

function datehelp() {
	h3ll0=window.open('/info/email/autoresponse/schedule.aka','elite','toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,width=540,height=400');
}

function accountlist() {
	h3ll0=window.open('/info/email/autoresponse/accountlist.aka','elite','toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,width=540,height=400');
}

function enabledlist() {
	h3ll0=window.open('/info/email/autoresponse/enabledlist.aka','elite','toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,width=540,height=400');
}

function calendar() {
	h3ll0=window.open('/info/email/autoresponse/calendar.aka','elite','toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,width=540,height=400');
}

function from() {
	h3ll0=window.open('/info/email/autoresponse/from.aka','elite','toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,width=540,height=400');
}

function to() {
	h3ll0=window.open('/info/email/autoresponse/to.aka','elite','toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,width=540,height=400');
}

function interactivehelp() {

	h3ll0=window.open('/info/help/','elite','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=492,height=350');

}

function submit_form() {
<? print($OnRich); ?>
document.email.submit();
}	

</script>
</head>

<STYLE type=text/css>
@import url("/css/aka.css");

A:hover {
	COLOR: #666666
}
</STYLE>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="20" marginwidth="0" marginheight="0" link="#0000cc" vlink="#0000cc" alink="#0000cc">
<form method="post" action="" name="email">
<input type=hidden name="newfolder" value="">
  <table cellspacing=0 cellpadding=0 width=800 border=0 align="center">
    <tbody> 
    <tr align=left valign="top"> 
        <td style="BORDER-RIGHT: #A3A3A3 1px solid; BORDER-TOP: #A3A3A3 1px solid; BORDER-LEFT: #A3A3A3 1px solid; BORDER-BOTTOM: #A3A3A3 1px solid"><table width="800" border="0" cellspacing="0" cellpadding="0" height="28">
            <tr align="left" valign="bottom"> 
              <td height="47" width="11" valign="middle"> <div align="left"></div></td>
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
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr> 
              <td width="29">&nbsp;</td>
              <td width="763" align="left" valign="top"> <table width="770" border="0" cellspacing="0" cellpadding="0">
                  <tr> 
                    <td height="24" class="akalink">&nbsp;</td>
                    <td height="24" valign="bottom" class="akalink">&nbsp;</td>
                  </tr>
                  <tr> 
                    <td width="509" height="23" valign="top" class="akalink"><strong><font color="#FF0000"><? $mail->MailErrorPrint(); ?></font></strong></td>
                    <td width="261" class="akalink">&nbsp;</td>
                  </tr>
                </table>
                <table width="69%" border="0" cellpadding="0" cellspacing="0">
                  <tr> 
                    <td width="28%" valign="bottom"><a href="/login/options/03/"><img src="/img/btn_esignature1.gif" width="151" height="27" border="0" onMouseOver="window.status='Manage your E-Signature(s)'; return true;" onMouseOut="window.status=''; return true;"></a></td>
                    <td width="72%" valign="bottom">&nbsp;</td>
                  </tr>
                  <tr> 
                    <td colspan="4"><table cellspacing=0 cellpadding=0 width="534" border=0>
                        <tbody>
                          <tr> 
                            <td width="534" align="left" valign="top" bgcolor=#B8B7B7 class="akalink"> 
                              <table width="100%" cellpadding="2" cellspacing="1">
                                <tr bgcolor="#ebebe3" class="akalink"> 
                                  <td width="534" align="left" valign="top" bgcolor="#FFFFFF"><table width="75%" border="0" cellpadding="0" cellspacing="0">
                                      <tr> 
                                        <td><font color="#FFFFFF" size="1">o</font></td>
                                      </tr>
                                    </table>
                                    <table width="456" border="0" cellpadding="0" cellspacing="0">
                                      <tr class="akalink"> 
                                        <td width="10" align="left" valign="middle">&nbsp;</td>
                                        <td width="445" align="left" valign="middle"><strong><font color="#000000">Manage 
                                          your custom E-Signatures.</font></strong></td>
                                      </tr>
                                    </table>
                                    <table width="506" border="0" cellpadding="0" cellspacing="0">
                                      <tr class="akalink"> 
                                        <td width="10" align="left" valign="middle">&nbsp;</td>
                                        <td width="496" align="left" valign="middle"><hr size="1" noshade></td>
                                      </tr>
                                    </table>
                                    <table width="514" border="0">
                                      <tr class="akalink"> 
                                        <td width="3" align="left" valign="middle">&nbsp;</td>
                                        <td width="107" align="left" valign="middle">Select 
                                          a Signature: </td>
                                        <td width="390"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000088"> 
                                          <select name="signature" class="dropdowns" id="select3" onChange="this.document.email.submit()">
                                            <? print($mail->mail_signature_list); ?> 
                                          </select>
                                          </font> </td>
                                      </tr>
                                    </table>
                                    <table width="514" border="0">
                                      <tr class="akalink"> 
                                        <td width="3" align="left" valign="middle">&nbsp;</td>
                                        <td width="107" align="left" valign="middle">Signature 
                                          Name:</td>
                                        
                                    <td width="390"><font color="#000000"> 
                                      <input class=textfields maxlength="32" size="32" name="name" value="<? if( isset($mail->mail_signature_view['name']) ) { print($mail->mail_signature_view['name']); } ?>">
                                          </font></td>
                                      </tr>
                                    </table>
                              	
                              		<? if( !$ae->isnotIEMS() ) { ?>
 					  
						<table width="530" height="30" border="0"><tr> <td width="45" height="26" align="right" valign="middle" class="akalink">Format: 
						</td><td width="475" align="left" valign="middle" class="akalink"><font color=#000000> 
						<select name="format" class="dropdowns" id="select4" onChange="if (this.selectedIndex > 0) { submit_form();  } else { return false; }">
						<option value="#">-- Editing Mode --</option>
						<option <? print($selectedit[0]); ?> value="0">Plain Text Editing Mode</option>      
                       			 	<option <? print($selectedit[1]); ?> value="1">Rich Text Editing Mode</option>     
						</select>
						</font></td>
						</tr>
						</table>
			
					<? } ?>	
				
					<table width="514" border="0">
                                      <tr class="akalink"> 
                                        <td width="2" align="left" valign="top">&nbsp;</td>
                                        <td width="494" align="left" valign="middle"><? print($editbox); ?></td>
                                      </tr>
                                    </table>
                                    <table width="67%" border="0">
                                      <tr class="akalink"> 
                                        <td width="1">&nbsp;</td>
                                        <td width="20" align="left"> <input name="default" type="checkbox" id="sig" value="1"> 
                                        </td>
                                        <td width="317" align="left">Add this signature to 
                                          all outgoing e-mails (Set as default)</td>
                                      </tr>
                                    </table>
                                    <table width="98%" border="0">
                                      <tr> 
                                        <td width="2" align="left" valign="top">&nbsp;</td>
                                        <td width="495" align="left" valign="top"><input name="save" type="image" id="save" src="/img/btn_save_esignature.gif" width="148" height="30" border="0">
                                          <input name="delete" type="image" id="del_signature" src="/img/btn_DEL_esignature.gif" width="164" height="30" border="0" onClick="return confirm('Are you sure you want to delete this E-Signature?')";>
                                          <a href="/login/options/"><img src="/img/web_cancel.gif" width="100" height="30" border="0"></a></td>
                                      </tr>
                                    </table> 
                                    
                                  </td>
                                </tr>
                              </table></td>
                          </tr>
                        </tbody>
                      </table></td>
                  </tr>
                </table> 
                <table width="75%" border="0" cellpadding="0" cellspacing="0">
                  <tr> 
                    <td>&nbsp;</td>
                  </tr>
                </table></td>
            </tr>
          </table> </td>
    </tr>
    </tbody> 
  </table>
  <? include($mail->tpl['html'] . '/footer.html'); ?>
</form>
<script language="JavaScript">
frm = document.email;
</script>
</body>
</html>
