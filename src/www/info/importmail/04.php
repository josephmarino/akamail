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
include($mail->tpl['html'] . '/main_login/info_header.html'); 
?> 
<style type="text/css">
@import url("/css/aka.css");
</style>
<? include($mail->tpl['html'] . "/main_login/info_bg.html"); ?>
<table width="490" height="74" border="0" class="akalink">
  <tr> 
    <td width="7" height="21">&nbsp;</td>
    <td width="581" height="24" valign="bottom"><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><b>Advanced 
      Options </b></font></td>
  </tr>
  <tr>
    <td width="7" height="47">&nbsp;</td>
    <td width="581" height="47" align="left" valign="top"><p>Usually, most ISPs 
        use the POP port 110 for all POP e-mail communications with their e-mail 
        servers. If your ISP does not allow port 110 you may change it at anytime 
        by entering a different port number into AKAMail. If your POP e-mail provider 
        does not use port 110, you must contact your POP e-mail provider directly 
        and ask them which port they allow for POP e-mail communications. You 
        may contact an AKALink technical support technician at anytime (<? print($mail->tel['techsupport']); ?>), 
        and we will try and offer as much help as we can with the situation.</p>
      <p><strong><font color="#000066">Note:</font></strong> If you are using 
        AKALink, Hotmail, MSN, or Yahoo! POP e-mail account(s), you may use port 
        110.</p></td>
  </tr>
</table>
<table width="500" border="0">
  <tr> 
    <td height="34"> 
      <div align="center"><font face="Arial, Helvetica, sans-serif" size="2"><a href="javascript: self.close()" onMouseOver="window.status='Click here to close this window'; return true;" onMouseOut="window.status=''; return true;">Click 
        here to Close Window</a></font></div>
    </td>
  </tr>
</table>
</body>
</html>
