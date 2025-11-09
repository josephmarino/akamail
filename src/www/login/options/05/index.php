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

if( strstr($_SERVER['HTTP_REFERER'],'/login/view/?mid=') ) {

	$_SESSION['option']['referer'] = $_SERVER['HTTP_REFERER'];
}
 
if( $mail->MailPostIs('viewfolder') ) {
	
	if( $_POST['viewfolder'] == 'create' ) {
		
		$mail->MailFolderRegister($_POST['newfolder']);
	
	} elseif( $_POST['viewfolder'] != $_SESSION['folder_cur'] ) {
	
		$mail->MailFolderRedirect($_POST['viewfolder']);
	}
}

if( $mail->MailPostIs('update') ) {

	if( $mail->MailOptionFormat($_POST) ) {
		
		$mail->MailOptionUpdate($_POST);
	}
}

$mail->MailOptionList();
$mail->MailLoginExpire();
$mail->MailFolderView();
?>
<? include($mail->tpl['html'] . '/header.html'); ?>
<script>
function interactivehelp() {
	h3ll0=window.open('/info/help/','elite','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=492,height=350');
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
      <td style="BORDER-RIGHT: #A3A3A3 1px solid; BORDER-TOP: #A3A3A3 1px solid; BORDER-LEFT: #A3A3A3 1px solid; BORDER-BOTTOM: #A3A3A3 1px solid" height="1008"> 
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
            <td height="2"> 
              <table width="800" border="0" cellspacing="0" cellpadding="0" height="12">
                <tr> 
                  <td height="2"> 
                    <table width="800" border="0" cellspacing="0" cellpadding="0">
                      <tr> 
                        <td width="365"><img src="/img/1_dv.gif" width="365" height="31"></td>
                        <td width="80"><a href="http://<? print($mail->server['main']); ?>/login/inbox/" onMouseOver="window.status='View your inbox for new e-mail'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/5_in.gif" width="79" height="31" border="0"></a></td>
                        <td width="76"><a href="http://<? print($mail->server['main']); ?>/login/sent/" onMouseOver="window.status='View your sent e-mail folder'; return true;"><img src="/img/1_sent.gif" width="76" height="31" border="0"></a></td>
                        <td width="118"><a href="http://<? print($mail->server['main']); ?>/login/deleted/" onMouseOver="window.status='View all deleted e-mail'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/1_del.gif" width="118" height="31" border="0"></a></td>
                        <td width="62"><a href="http://<? print($mail->server['main']); ?>/login/options/" onMouseOver="window.status='Edit your account settings'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/1_opt.gif" width="93" height="31" border="0"></a></td>
                        <td width="99"><a href="http://<? print($mail->server['main']); ?>/login/drafts/" onMouseOver="window.status='View your drafted e-mail folder'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/1_drafts.gif" width="69" height="31" border="0"></a></td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        <? include($mail->tpl['html'] . '/toolbar.html'); ?>
        <table width="800" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="29" height="947">&nbsp;</td>
            <td width="761" align="left" valign="top" height="947"> 
              <table width="627" border="0" cellpadding="0" cellspacing="0" class="akalink">
                <tr> 
                  <td width="627" height="24" valign="bottom"><strong><font color="#FF0000">
                    <? $mail->MailErrorPrint(); ?>
                    </font></strong></td>
                </tr>
                <tr> 
                  <td height="14" valign="bottom">&nbsp;</td>
                </tr>
              </table>
              <table width="75%" border="0" cellpadding="0" cellspacing="0">
                <tr class="akalink"> 
                  <td width="18%"><strong><font color="#000000">Security Options: 
                    </font></strong></td>
                  <td width="82%">&nbsp;</td>
                </tr>
              </table>
              <table width="89%" border="0" cellpadding="0" cellspacing="0">
                <tr> 
                  <td>
                    <hr size="1" noshade>
                  </td>
                </tr>
              </table>
              <table width="89%" border="0" cellpadding="0" cellspacing="0">
                <tr class="akalink">
                  <td width="25%" align="left">
                    <input name="sslout" type="checkbox" id="sslout" value="1" <? ($mail->mail_option_list['sslout'] == 1) ? print('checked') : NULL; ?>>
      Secure all outgoing e-mail(s) with 128-Bit SSL encryption.</td>
                </tr>
              </table>
              <table width="89%" border="0" cellpadding="0" cellspacing="0">
                <tr class="akalink">
                  <td width="25%" align="left">
                    <input name="sslin" type="checkbox" id="sslin" value="1" <? ($mail->mail_option_list['sslin'] == 1) ? print('checked') : NULL; ?>>
      Secure all incoming e-mail(s) with 128-Bit SSL encrypton.</td>
                </tr>
              </table>
              <table width="89%" border="0" cellpadding="0" cellspacing="0">
                <tr class="akalink"> 
                  <td width="25%" align="left"> 
                    <input name="blockvirus" type="checkbox" id="secure3" value="2" checked onClick="return confirm('We DO NOT recommend that you remove this option. Please keep in mind that once you have removed this option you will be vulnerable to all incoming e-mails that contain any viruses or worms.\n\n Are you sure you want to remove all virus protection of incoming e-mails?');" disabled>
                    Automatically delete and notify me of any incoming e-mail 
                    that contains a virus or worm.</td>
                </tr>
              </table>
              <table width="89%" border="0" cellpadding="0" cellspacing="0">
                <tr class="akalink"> 
                  <td width="25%" align="left"> 
                    <input type="checkbox" name="blockmedia" value="1" <? ($mail->mail_option_list['blockmedia'] == 1) ? print('checked') : NULL; ?>>
                    Automatically block graphics and animations from being displayed 
                    in incoming e-mails.</td>
                </tr>
              </table>
                <table width="75%" border="0" cellpadding="0" cellspacing="0">
                <tr class="akalink"> 
                  <td width="20%">&nbsp;</td>
                  <td width="80%">&nbsp;</td>
                </tr>
              </table>
              <table width="75%" border="0" cellpadding="0" cellspacing="0">
                <tr class="akalink"> 
                  <td width="31%"><strong><font color="#000000">Auto Logout After: 
                    </font></strong></td>
                  <td width="69%">&nbsp;</td>
                </tr>
              </table>
              <table width="89%" border="0" cellpadding="0" cellspacing="0">
                <tr> 
                  <td>
                    <hr size="1" noshade>
                  </td>
                </tr>
              </table>
              <table width="89%" border="0" cellpadding="0" cellspacing="0">
                <tr class="akalink"> 
                  <td width="5%" align="left" valign="middle">
                    <input type="radio" name="sessexp" value="1" <? ($mail->mail_option_list['sessexp'] == 1) ? print('checked') : NULL; ?>>
                    30 Minutes </td>
                  <td width="5%" align="left" valign="middle">
                    <input type="radio" name="sessexp" value="2" <? ($mail->mail_option_list['sessexp'] == 2) ? print('checked') : NULL; ?>>
                    1 Hour </td>
                  <td width="5%" align="left" valign="middle">
                    <input type="radio" name="sessexp" value="3" <? ($mail->mail_option_list['sessexp'] == 3) ? print('checked') : NULL; ?>>
                    2 Hours </td>
                  <td width="5%" align="left" valign="middle">
                    <input type="radio" name="sessexp" value="4" <? ($mail->mail_option_list['sessexp'] == 4) ? print('checked') : NULL; ?>>
                    5 Hours</td>
                  <td width="5%" align="left" valign="middle">
                    <input type="radio" name="sessexp" value="0" <? ($mail->mail_option_list['sessexp'] == 0) ? print('checked') : NULL; ?>>
                    Never</td>
                </tr>
              </table>
              <table width="75%" border="0" cellpadding="0" cellspacing="0">
                <tr class="akalink"> 
                  <td width="20%">&nbsp;</td>
                  <td width="80%">&nbsp;</td>
                </tr>
              </table>
	    
	    <? if( !$ae->isnotIEMS() ) { ?>
	                 
             <table width="75%" border="0" cellpadding="0" cellspacing="0">
                <tr class="akalink"> 
                  <td width="26%"><strong><font color="#000000">Compose E-Mail 
                    Options:</font></strong></td>
                  <td width="74%">&nbsp;</td>
                </tr>
              </table>
              <table width="89%" border="0" cellpadding="0" cellspacing="0">
                <tr> 
                  <td>
                    <hr size="1" noshade>
                  </td>
                </tr>
              </table>
              <table width="75%" border="0">
                <tr class="akalink"> 
                  <td width="24%" align="left" valign="middle">Outgoing E-Mail 
                    Format:</td>
                  <td width="76%"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000088"> 
                    <select name="sendformat" class="dropdowns" id="select5" >
                      <? if( $mail->mail_option_list['sendformat'] == 1 ) {
                        
                        	$sendformatselected[1] = 'selected';
                           
                           } else {
                           	
                           	$sendformatselected[0] = 'selected';
                           }
                        ?>
                      <option <? print($sendformatselected[1]); ?> value="1">Rich 
                      Text</option>
                      <option <? print($sendformatselected[0]); ?> value="0">Plain 
                      Text</option>
                    </select>
                    </font> </td>
                </tr>
              </table>
                <table width="75%" border="0">
                  <tr class="akalink"> 
                    <td width="25%" align="left" valign="middle"> <input name="sendsave" type="checkbox" id="autoaddreply" value="1" <? ($mail->mail_option_list['sendsave'] == 1) ? print('checked') : NULL; ?>>
                      Save copy of sent e-mails to my 'Sent' folder</td>
                  </tr>
                </table>
                <table width="75%" border="0" cellpadding="0" cellspacing="0">
                <tr class="akalink"> 
                  <td width="20%">&nbsp;</td>
                  <td width="80%">&nbsp;</td>
                </tr>
              </table>
              
              <? } ?>
              <table width="75%" border="0" cellpadding="0" cellspacing="0">
                <tr class="akalink"> 
                  <td width="26%"><strong><font color="#000000">Received E-Mail 
                    Options:</font></strong></td>
                  <td width="74%">&nbsp;</td>
                </tr>
              </table>
              <table width="89%" border="0" cellpadding="0" cellspacing="0">
                <tr> 
                  <td>
                    <hr size="1" noshade>
                  </td>
                </tr>
              </table>
              <table width="75%" border="0">
                <tr class="akalink"> 
                  <td width="24%" align="left" valign="middle">Incoming E-Mail 
                    Format:</td>
                  <td width="76%"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000088"> 
                    <select name="recvformat" class="dropdowns" id="select2">
                      <? if( $mail->mail_option_list['recvformat'] == 1 ) {
                        
                        	$recvformatselected[1] = 'selected';
                           
                           } else {
                           	
                           	$recvformatselected[0] = 'selected';
                           }
                        ?>
                      <option <? print($recvformatselected[1]); ?> value="1">Rich 
                      Text</option>
                      <option <? print($recvformatselected[0]); ?> value="0">Plain 
                      Text</option>
                    </select>
                    </font> </td>
                </tr>
              </table>
              <table width="75%" border="0">
                <tr class="akalink"> 
                  <td width="25%" align="left" valign="middle">
                    <input name="recvchecksnd" type="checkbox" id="autoaddreply3" value="1" <? ($mail->mail_option_list['recvchecksnd'] == 1) ? print('checked') : NULL; ?>>
                    Play &quot;new e-mail&quot; sound when new e-mail arrives.</td>
                </tr>
              </table>
              <table width="75%" border="0">
                <tr class="akalink"> 
                  <td width="43%" align="left" valign="middle"> 
                    <input name="recvcheck" type="checkbox" id="checkmsgevery" value="1"  onClick="if (this.checked) { this.form.recvcheckdelay.disabled = false;  } else { this.form.recvcheckdelay.disabled = true; }" <? ($mail->mail_option_list['recvcheck'] == 1) ? print('checked') : NULL; ?>>
                    Check for new e-mail messages every:</td>
                  <td width="57%"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000088"> 
                    <select name="recvcheckdelay" <? ($mail->mail_option_list['recvcheck'] != 1) ? print('disabled') : NULL; ?> class="dropdowns" id="select6">
                      <option <? ($mail->mail_option_list['recvcheckdelay'] == 1) ? print('selected') : NULL; ?> value="1">5 Minutes</option>
                      <option <? ($mail->mail_option_list['recvcheckdelay'] == 2) ? print('selected') : NULL; ?> value="2">30 Minutes</option>
                      <option <? ($mail->mail_option_list['recvcheckdelay'] == 3) ? print('selected') : NULL; ?> value="3">1 Hour</option>
                      <option <? ($mail->mail_option_list['recvcheckdelay'] == 4) ? print('selected') : NULL; ?> value="4">2 Hours</option>
                      <option <? ($mail->mail_option_list['recvcheckdelay'] == 5) ? print('selected') : NULL; ?> value="5">5 Hours</option>
                    </select>
                    </font> </td>
                </tr>
              </table>
              <table width="75%" border="0" cellpadding="0" cellspacing="0">
                <tr class="akalink"> 
                  <td width="20%">&nbsp;</td>
                  <td width="80%">&nbsp;</td>
                </tr>
              </table>
              <table width="75%" border="0" cellpadding="0" cellspacing="0">
                <tr class="akalink"> 
                  <td width="27%"><strong><font color="#000000">Inbox\Folders 
                    Appearance:</font></strong></td>
                  <td width="73%">&nbsp;</td>
                </tr>
              </table>
              <table width="89%" border="0" cellpadding="0" cellspacing="0">
                <tr> 
                  <td>
                    <hr size="1" noshade>
                  </td>
                </tr>
              </table>
              <table width="91%" border="0">
                <tr class="akalink"> 
                  <td width="24%" align="left" valign="top">Default Display:</td>
                  <td align="left"> 
                    <input name="folderview" type=radio value="0" <? ($mail->mail_option_list['folderview'] == 0) ? print('checked') : NULL; ?>>
                    Descending by date &amp; time<font color="#000000">&nbsp; 
                    </font> </td>
                  <td>(new messages appear at<font color="#000000"><strong> </strong></font>top)</td>
                </tr>
                <tr class="akalink"> 
                  <td width="24%" rowspan="4" align="left" valign="top">&nbsp;</td>
                  <td width="27%" height="7" align="left">
                    <input type=radio name="folderview" value="1" <? ($mail->mail_option_list['folderview'] == 1) ? print('checked') : NULL; ?>>
                    Ascending by date &amp; time</td>
                  <td width="49%"> (new messages appear at bottom)</td>
                </tr>
                <tr class="akalink"> </tr>
              </table>
              <table width="75%" border="0">
                <tr class="akalink"> 
                  <td width="164" height="26" align="left" valign="middle"> E-Mails 
                    Displayed Per Page:</td>
                  <td width="404"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000088"> 
                    <select name="folderpage" class="dropdowns" >
                      <option <? if( $mail->mail_option_list['folderpage'] == 10 ) print('selected'); ?> value="10">10</option>
                      <option <? if( $mail->mail_option_list['folderpage'] == 50 ) print('selected'); ?> value="50">50</option>
                      <option <? if( $mail->mail_option_list['folderpage'] == 100 ) print('selected'); ?> value="100">100</option>
                      <option <? if( $mail->mail_option_list['folderpage'] == 200 ) print('selected'); ?> value="200">200</option>
                      <option <? if( $mail->mail_option_list['folderpage'] == 500 ) print('selected'); ?> value="500">500</option>
                    </select>
                    </font> </td>
                </tr>
              </table>
              <table width="75%" border="0" cellpadding="0" cellspacing="0">
                <tr class="akalink"> 
                  <td width="20%">&nbsp;</td>
                  <td width="80%">&nbsp;</td>
                </tr>
              </table>
              <table width="75%" border="0" cellpadding="0" cellspacing="0">
                <tr class="akalink"> 
                  <td width="24%"><strong><font color="#000000">Address Book Options: 
                    </font><font class="body" color="#FFFFFF"></font><font color="#000088"></font></strong></td>
                  <td width="76%"><font color="#000088">&nbsp;<strong></strong></font></td>
                </tr>
              </table>
              <table width="89%" border="0" cellpadding="0" cellspacing="0">
                <tr> 
                  <td>
                    <hr size="1" noshade>
                  </td>
                </tr>
              </table>
              <table width="75%" border="0">
                <tr class="akalink"> 
                  <td width="166" height="22" align="left" valign="middle"> Contacts 
                    Displayed Per Page:</td>
                  <td width="402"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000088"> 
                    <select name="bookpage" class="dropdowns" id="select3" >
                      <option <? if( $mail->mail_option_list['bookpage'] == 10 ) print('selected'); ?> value="10">10</option>
                      <option <? if( $mail->mail_option_list['bookpage'] == 50 ) print('selected'); ?> value="50">50</option>
                      <option <? if( $mail->mail_option_list['bookpage'] == 100 ) print('selected'); ?> value="100">100</option>
                    </select>
                    </font> </td>
                </tr>
              </table>
              <table width="75%" border="0" cellpadding="0" cellspacing="0">
                <tr class="akalink"> 
                  <td width="20%">&nbsp;</td>
                  <td width="80%">&nbsp;</td>
                </tr>
              </table>
              <table width="75%" border="0" cellpadding="0" cellspacing="0">
                <tr class="akalink"> 
                  <td width="25%"><strong><font color="#000000">When Replying 
                    to E-Mail:</font></strong></td>
                  <td width="75%">&nbsp;</td>
                </tr>
              </table>
              <table width="89%" border="0" cellpadding="0" cellspacing="0">
                <tr> 
                  <td>
                    <hr size="1" noshade>
                  </td>
                </tr>
              </table>
              <table width="75%" border="0">
                <tr class="akalink"> 
                  <td width="25%" align="left" valign="middle">
                    <input name="replybookadd" type="checkbox" id="replyinclude" value="1" <? ($mail->mail_option_list['replybookadd'] == 1) ? print('checked') : NULL; ?>>
                      Automatically put people I reply to in my Address Book.</td>
                </tr>
              </table>
              <table width="75%" border="0">
                <tr class="akalink"> 
                  <td width="25%" align="left" valign="middle">
                    <input name="replyinclude" type="checkbox" id="includeoriginal" value="1" <? ($mail->mail_option_list['replyinclude'] == 1) ? print('checked') : NULL; ?>>
                    Always include original message when replying.</td>
                </tr>
              </table>
              <table width="75%" border="0">
                <tr class="akalink"> 
                  <td width="25%" align="left" valign="middle">
                    <input name="replyccme" type="checkbox" id="cctome" value="1" <? ($mail->mail_option_list['replyccme'] == 1) ? print('checked') : NULL; ?>>
                    Always CC a copy to me. (
                    <? print($mail->lp['login']); ?>
                    )</td>
                </tr>
              </table>
              <table width="75%" border="0">
                <tr class="akalink"> 
                  <td width="41%" align="left" valign="middle">
                    <input name="replyccother" type="checkbox" id="cctoother" value="1" <? ($mail->mail_option_list['replyccother'] == 1) ? print('checked') : NULL; ?>>
                    Always CC a copy to another address: 
                    <input name="replyccaddr" type="text" class=textfields id="addr" value="<? (isset($mail->mail_option_list['replyccaddr'])) ? print($mail->mail_option_list['replyccaddr']) : NULL; ?>" size="21" maxlength="64">
                    <? ($mail->mail_option_img_error['replyccaddr']) ? print('<img src="/img/xmark.gif">') : NULL; ?>
                  </td>
                </tr>
              </table>
              <table width="75%" border="0" cellpadding="0" cellspacing="0">
                <tr class="akalink"> 
                  <td width="20%">&nbsp;</td>
                  <td width="80%">&nbsp;</td>
                </tr>
              </table>
              <table width="75%" border="0" cellpadding="0" cellspacing="0">
                <tr class="akalink"> 
                  <td width="29%"><strong><font color="#000000">E-Mail Headers 
                    Appearance: </font></strong></td>
                  <td width="71%">&nbsp;</td>
                </tr>
              </table>
              <table width="89%" border="0" cellpadding="0" cellspacing="0">
                <tr> 
                  <td>
                    <hr size="1" noshade>
                  </td>
                </tr>
              </table>
              <table width="75%" border="0">
                <tr class="akalink"> 
                  <td width="29%" align="left" valign="middle">Show E-Mail Header 
                    Details:</td>
                  <td width="71%"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000088"> 
                    <select name="headerview" class="dropdowns" id="select7" >
                      <?      			
      			
      			$headerviewselected[$mail->mail_option_list['headerview']] = 'selected';
          			
                        ?>
                      <option <? print($headerviewselected[0]); ?> value="0">Brief 
                      Headers</option>
                      <option <? print($headerviewselected[1]); ?> value="1">Detailed 
                      Headers</option>
                    </select>
                    </font> </td>
                </tr>
              </table>
              <table width="75%" border="0" cellpadding="0" cellspacing="0">
                <tr class="akalink"> 
                  <td width="20%">&nbsp;</td>
                  <td width="80%">&nbsp;</td>
                </tr>
              </table>
              <table width="75%" border="0" cellpadding="0" cellspacing="0">
                <tr class="akalink"> 
                  <td width="16%"><strong><font color="#000000">General Alerts:</font></strong></td>
                  <td width="84%">&nbsp;</td>
                </tr>
              </table>
              <table width="89%" border="0" cellpadding="0" cellspacing="0">
                <tr> 
                  <td>
                    <hr size="1" noshade>
                  </td>
                </tr>
              </table>
              <table width="75%" border="0">
                <tr class="akalink"> 
                  <td width="25%" align="left" valign="middle" height="11"> 
                    <input name="alertsubject" type="checkbox" id="secure3" value="1"  <? ($mail->mail_option_list['alertsubject'] == 1) ? print('checked') : NULL; ?>>
                    Alert me when I send an e-mail with a blank subject.</td>
                </tr>
              </table>
              <table width="75%" border="0">
                <tr class="akalink"> 
                  <td width="80%">
                    <input name="alertmsg" type="checkbox" id="alertmsg2" value="1" <? ($mail->mail_option_list['alertmsg'] == 1) ? print('checked') : NULL; ?>>
                    Alert me when I send an e-mail with a blank message.</td>
                </tr>
              </table>
              <table width="545" border="0">
                <tr> 
                  <td width="539" height="39" valign="bottom"> 
                    <input name="update" type="image" id="update" src="/img/web_apply.gif" width="100" height="30" border="0">
                    <a href="http://<? print($mail->server['main']); ?>/login/options/"><img src="/img/web_cancel.gif" width="100" height="30" border="0"></a> 
                  </td>
                </tr>
              </table>
              <table width="75%" border="0" cellpadding="0" cellspacing="0">
                <tr class="akalink"> 
                  <td width="20%">&nbsp;</td>
                  <td width="80%">&nbsp;</td>
                </tr>
              </table>
            </td>
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
