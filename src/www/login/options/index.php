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

$mail->MailPageNoCache();
$mail->MailLoginInit();
$mail->MailOptionList();
$mail->MailLoginExpire();

if( isset($_SERVER['HTTPS']) ) {

	header('Location: http://' . $mail->server['main'] . '/login/options');
	exit();
}

if( $mail->MailPostIs('viewfolder') ) {
	
	if( $_POST['viewfolder'] == 'create' ) {
		
		$mail->MailFolderRegister($_POST['newfolder']);
	
	} else {
	
		$mail->MailFolderRedirect($_POST['viewfolder']);
	}
}

if( $mail->MailWindowsIEIs() ) {
	
	$server_main	= $mail->server['main'];
	include($mail->tpl['php'] . '/option_akamail.tpl');
	$mail->mail_option_akamail = $template;
}

$mail->MailFolderView();
?>
<? include($mail->tpl['html'] . '/header.html'); ?>
<script language="JavaScript">

function interactivehelp() {

	h3ll0=window.open('/info/help/','elite','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=492,height=350');

}

function centerwindow(url,theWidth,theHeight) { 
	var theTop=(screen.height/2)-(theHeight/2); 
	var theLeft=(screen.width/2)-(theWidth/2); 
	var features='height='+theHeight+',width='+theWidth+',top='+theTop+',left='+theLeft+",scrollbars=no"; 
	theWin=window.open(url,'',features); } 


</script>
<STYLE type=text/css>
@import url("/css/aka.css");
A:hover {COLOR: #666666}
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
		  <table width="800" border="0" cellspacing="0" cellpadding="0">
			<tr> 
			  <td width="368"><img src="/img/4_dv.gif" width="368" height="31"></td>
			  <td width="80"><a href="http://<? print($mail->server['main']); ?>/login/inbox/" onMouseOver="window.status='View your inbox for new e-mail'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/4_in.gif" width="80" height="31" border="0"></a></td>
			  <td width="68"><a href="http://<? print($mail->server['main']); ?>/login/sent/" onMouseOver="window.status='View your sent e-mail folder'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/4_sent.gif" width="68" height="31" border="0"></a></td>
			  <td width="118"><a href="http://<? print($mail->server['main']); ?>/login/deleted/" onMouseOver="window.status='View all deleted e-mail'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/4_del.gif" width="118" height="31" border="0"></a></td>
			  <td width="60"><a href="http://<? print($mail->server['main']); ?>/login/options/" onMouseOver="window.status='Edit your account settings'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/4_opt.gif" width="94" height="31" border="0"></a></td>
			  <td width="106"><a href="http://<? print($mail->server['main']); ?>/login/drafts/" onMouseOver="window.status='View your e-mail drafts folder'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/4_draft.gif" width="72" height="31" border="0"></a></td>
			</tr>
		  </table>
		  <? include($mail->tpl['html'] . '/toolbar.html'); ?>
          <table width="75%" border="0" cellpadding="0" cellspacing="0">
            <tr> 
              <td height="19">&nbsp;</td>
            </tr>
          </table> 
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
			<tr> 
			  <td width="2%">&nbsp;</td>
			  <td width="98%"><table width="791" border="0" height="399">
				  <tr> 
					<td height="2" width="248" align="left" valign="middle"><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><strong>
                      <? $mail->MailErrorPrint(); ?>
                      </strong></font> </td>
					<td height="2" align="left" valign="top" width="4">&nbsp;</td>
					<td height="2" width="272">&nbsp;</td>
					<td height="2" width="10">&nbsp;</td>
					<td height="2" width="246">&nbsp;</td>
				  </tr>
				  <tr> 
					<td height="372" width="248" align="left" valign="top"> <table width="245" border="0">
						<tr> 
						  <td> <div align="left"><font face="Arial, Helvetica, sans-serif" size="2"><img src="/img/opt_myinfo.jpg" width="87" height="8"> 
							  </font></div></td>
						</tr>
						<tr align="left" valign="top"> 
						  <td height="203"> <table width="213" border="0" cellspacing="0" cellpadding="3">
							  <tr> 
								<td width="207" height="26" class="akalink"><a href="http://<? print($mail->server['main']); ?>/login/options/01/" onMouseOver="window.status=' '; return true;" onMouseOut="window.status=''; return true;">Personal 
								  Information</a></td>
							  </tr>
							  <tr> 
								<td width="207" valign="top" class="akalink">Change 
								  your personal information. Your name, address, 
								  etc.</td>
							  </tr>
							</table>
							<table width="239" border="0" cellspacing="0" cellpadding="3">
							  <tr> 
								<td width="233" height="26" class="akalink"><a href="javascript:centerwindow('https://<? print($mail->server['main']); ?>/login/options/02/',300,260)"",300,260)" onMouseOver="window.status=' '; return true;" onMouseOut="window.status=''; return true;">Change 
								  Password </a></td>
							  </tr>
							  <tr> 
								<td width="233" class="akalink">Change your e-mail 
								  account password.</td>
							  </tr>
							</table>
							<table width="229" border="0" cellspacing="0" cellpadding="3">
							  <tr> 
								<td width="223" height="26" class="akalink"><a href="/login/options/03/" onMouseOver="window.status=' '; return true;" onMouseOut="window.status=''; return true;">E-Signatures 
								  </a></td>
							  </tr>
							  <tr> 
								<td width="223" class="akalink">Add or edit personalized 
								  E-Signatures for your outgoing e-mail.</td>
							  </tr>
							</table>
							<table width="265" border="0" cellspacing="0" cellpadding="3">
							  <tr> 
								<td width="259" height="26" class="akalink"><a href="/login/options/08/" onMouseOver="window.status=' '; return true;" onMouseOut="window.status=''; return true;">Send 
								  Us Feedback About AKAMail</a></td>
							  </tr>
							  <tr> 
								<td width="259" class="akalink">Help us make AKAMail 
								  even better. </td>
							  </tr>
							  <tr> 
								<td class="akalink">If you have any suggestions 
								  about how we can make AKAMail better, please 
								  tell us. We love to read feedback from all of 
								  our clients.</td>
							  </tr>
							</table></td>
						</tr>
					  </table></td>
					<td height="372" width="4" align="left" valign="top" background="/img/l1n333ee.gif">&nbsp;</td>
					<td height="372" width="272" align="left" valign="top"> <table width="272" border="0">
						<tr> 
						  <td> <div align="left"><font face="Arial, Helvetica, sans-serif" size="2"><img src="/img/opt_settings.jpg" width="77" height="8"> 
							  </font></div></td>
						</tr>
						<tr align="left" valign="top"> 
						  <td height="198""options"> <table width="264" border="0" cellspacing="0" cellpadding="3">
							  <tr> 
								<td width="258" height="26" class="akalink"><a href="/login/options/05/" onMouseOver="window.status=' '; return true;" onMouseOut="window.status=''; return true;">General 
								  Preferences</a> </td>
							  </tr>
							  <tr> 
								<td width="258" class="akalink">Customize your 
								  Inbox display, archiving, security options and 
								  more.</td>
							  </tr>
							</table>
							<table width="266" border="0" cellspacing="0" cellpadding="3">
							  <tr> 
								<td width="260" height="26" class="akalink"><a href="/login/options/04/" onMouseOver="window.status=' '; return true;" onMouseOut="window.status=''; return true;">Spam 
								  Cube&copy;</a></td>
							  </tr>
							  <tr> 
								<td width="260" class="akalink">Manage your Spam 
								  E-Mail filtering settings, or switch in and 
								  out of Private Mode.</td>
							  </tr>
							</table>
							<table width="266" border="0" cellspacing="0" cellpadding="3">
							  <tr> 
								<td width="260" height="26" class="akalink"><a href="/login/othermail/" onMouseOver="window.status=' '; return true;" onMouseOut="window.status=''; return true;">E-Mail 
								  Accounts </a></td>
							  </tr>
							  <tr> 
								<td width="260" class="akalink"> Add or edit the 
								  e-mail accounts that are currently assigned 
								  to AKAMail.</td>
							  </tr>
							</table>
							<table width="265" border="0" cellspacing="0" cellpadding="3">
							  <tr> 
								<td width="259" height="26" class="akalink"><a href="/login/options/06/" onMouseOver="window.status=' '; return true;" onMouseOut="window.status=''; return true;">Block 
								  Sender</a></td>
							  </tr>
							  <tr> 
								<td width="259" class="akalink">Block an address, 
								  domain, multiple addresses and domains from 
								  sending you e-mail.</td>
							  </tr>
							</table></td>
						</tr>
					  </table></td>
					<td height="372" width="4" align="left" valign="top" background="/img/l1n333ee.gif">&nbsp;</td>
					<td height="372" width="246" align="left" valign="top"><table width="223" border="0">
						<tr> 
						  <td width="217" height="19"> <div align="left"><img src="/img/opt_additional.jpg" width="114" height="8"></div></td>
						</tr>
						<tr align="left" valign="top"> 
						  <td height="329"> <table width="211" border="0" cellspacing="0" cellpadding="3">
							  <tr> 
								<td width="205" height="26" class="akalink"><a href="/login/options/09/" onMouseOver="window.status=' '; return true;" onMouseOut="window.status=''; return true;">Auto 
								  Response System</a></td>
							  </tr>
							  <tr> 
								<td width="205" class="akalink">Set AKAMail to 
								  auto respond to your e-mail while you are on 
								  vacation.</td>
							  </tr>
							</table>
							<table width="211" border="0" cellspacing="0" cellpadding="3">
							  <tr> 
								<td width="205" height="26" class="akalink"><a href="/login/options/10/" onMouseOver="window.status=' '; return true;" onMouseOut="window.status=''; return true;">Express 
								  Book&#8482; Settings</a></td>
							  </tr>
							  <tr> 
								<td width="205" class="akalink">Edit your Address 
								  Express Book&#8482; display settings and manage 
								  Express Book&#8482; users.</td>
							  </tr>
							</table>
							
						    <? print($mail->mail_option_akamail); ?> </td>
						</tr>
					  </table></td>
				  </tr>
				</table></td>
			</tr>
		  </table></td>
	  </tr>
	</tbody>
  </table>
  <? include($mail->tpl['html'] . '/footer.html'); ?>
</form>
</body>
</html>
