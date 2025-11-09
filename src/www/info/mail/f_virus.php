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
<table width="455" border="0" height="95">
  <tr> 
    <td width="8" height="138" rowspan="2">&nbsp;</td>
    <td width="437" height="35" valign="middle"><font face="Arial, Helvetica, sans-serif" size="3"><b>Keep 
      Yourself Clean.</b></font></td>
  </tr>
  <tr> 
    <td width="437" height="69" align="left" valign="top"> <p class="akalink">The 
		AKA Mail web based e-mail system is equipped with real-time Anti-Virus 
		protection prowered by our strategic partner, <a href="http://www.mcafee.com" target="_blank">McAfee&copy; Inc </a></p>
      <p class="akalink">The AKA Mail virus database is updated daily from the 
        real-time <a href="http://www.mcafee.com">McAfee</a> Anti-Virus database system. This ensures that all of your 
        incoming, and outgoing e-mail is virus free from any new vicious virus 
        or worm. </p>
      <p class="akalink"><b><font color="#000000">AKA Mail is the industry leader 
    of secure web based e-mail solutions.</font></b></p></td>
  </tr>
</table>
<table width="456" border="0">
  <tr> 
    <td height="34"> 
      <div align="center"><font face="Arial, Helvetica, sans-serif" size="2"><a href="javascript: self.close()" onMouseOver="window.status='Click here to close this window'; return true;" onMouseOut="window.status=''; return true;">Click 
        here to Close Window</a></font></div>
    </td>
  </tr>
</table>
</body>
</html>
