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
    <td width="581" height="24" valign="bottom"><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><b>Delete 
      E-Mail From Mail Server</b></font></td>
  </tr>
  <tr>
    <td width="7" height="47">&nbsp;</td>
    <td width="581" height="47" align="left" valign="top"><p>This unique option 
        is only provided by AKAMail, and allows you to automatically delete e-mail 
        messages from your POP account when you make specific transactions. This 
        may include when an e-mail is read, deleted, forwarded, replied to, or 
        marked as spam.<br>
      </p>
      </td>
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
