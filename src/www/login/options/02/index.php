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

if( $mail->MailPostIs('update') ) {

	$mail->MailPasswdAlter($_POST['cpasswd'],$_POST['npasswd'],$_POST['cnpasswd']);
}
?>
<? include($mail->tpl['html'] . '/header.html'); ?>
<style type="text/css">
@import url("/css/aka.css");
</style>
</head>

<body bgcolor="#FFFFFF">
<form method="post" action="">
<input type=hidden name="newfolder" value="">
  <div align="center">
    <table width="251" border="0">
      <tr> 
        <td width="245"><img src="/img/d.gif" width="242" height="48"></td>
      </tr>
    </table>
    <table width="236" border="0">
      <tr align="left" valign="middle"> 
        <td width="230" height="3"><font face="Arial, Helvetica, sans-serif" size="3"><b>Change 
          You Password</b></font></td>
      </tr>
    </table>
    <table width="250" border="0" class="akalink">
      <tr> 
        <td width="244" height="20"><b> <font color="#FF0000">
          <? $mail->MailErrorPrint(); ?>
          </font> </b></td>
      </tr>
    </table>
    <table width="249" border="0" class="akalink">
      <tr> 
        <td width="108" height="2"> Current Password:</td>
        <td width="131" height="2"> <input type="password" class=sm style="FONT-SIZE: 9px; BORDER-RIGHT: #7F9DB9 1px solid; BORDER-TOP: #7F9DB9 1px solid; FONT-FAMILY: verdana; BORDER-LEFT: #7F9DB9 1px solid; BORDER-BOTTOM: #7F9DB9 1px solid; BACKGROUND-COLOR: #FFFFFF" name="cpasswd" size="20" maxlength="16"> 
          &nbsp;</td>
      </tr>
    </table>
    <table width="249" border="0" class="akalink">
      <tr> 
        <td width="108" height="2"> New Password:</td>
        <td width="131" height="2"> <input type="password" class=sm style="FONT-SIZE: 9px; BORDER-RIGHT: #7F9DB9 1px solid; BORDER-TOP: #7F9DB9 1px solid; FONT-FAMILY: verdana; BORDER-LEFT: #7F9DB9 1px solid; BORDER-BOTTOM: #7F9DB9 1px solid; BACKGROUND-COLOR: #FFFFFF" name="npasswd" size="20" maxlength="16"> 
          &nbsp;</td>
      </tr>
    </table>
    <table width="249" border="0" class="akalink">
      <tr> 
        <td width="109" height="2"> Confirm Password:</td>
        <td width="130" height="2"> <input type="password" class=sm style="FONT-SIZE: 9px; BORDER-RIGHT: #7F9DB9 1px solid; BORDER-TOP: #7F9DB9 1px solid; FONT-FAMILY: verdana; BORDER-LEFT: #7F9DB9 1px solid; BORDER-BOTTOM: #7F9DB9 1px solid; BACKGROUND-COLOR: #FFFFFF" name="cnpasswd" size="20" maxlength="16"> 
          &nbsp;</td>
      </tr>
    </table>
    <table width="249" border="0">
      <tr> 
        <td width="10" height="61"> <div align="right"></div></td>
        <td width="229" height="61"><font 
            face="Arial, helvetica, sans-serif" color=#000000 size=2> 
          <input type="image" border="0" name="update" src="/img/web_submit.gif" width="100" height="30">
          <a href="javascript: self.close()"><img src="/img/web_cancel.gif" width="100" height="30" border="0"></a> 
          </font></td>
      </tr>
    </table>
  </div>
</form>
</body>
</html>
