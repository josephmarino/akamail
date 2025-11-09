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
    <td width="581" height="24" valign="bottom"><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><b>Account 
      Information </b></font></td>
  </tr>
  <tr>
    <td width="7" height="47">&nbsp;</td>
    <td width="581" height="47" align="left" valign="top">This is the section 
      where you add your POP (Post Office Protocol) e-mail account. POP e-mail 
      accounts are other e-mail accounts such as: Yahoo!, MSN, Hotmail, AKALink, 
      or any other e-mail provider. In order for these addresses to work with 
      AKAMail, you must enter the correct details. </td>
  </tr>
</table>
<table width="500" height="59" border="0" class="akalink">
  <tr> 
    <td width="7" height="21">&nbsp;</td>
    <td width="581" height="24" valign="bottom"><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><b>What 
      Is A Nick Name? </b></font></td>
  </tr>
  <tr>
    <td width="7" height="22">&nbsp;</td>
    <td width="581" height="22" align="left" valign="top">Your nick name for your 
      POP account can be anything you choose for it to be. The nick name for your 
      POP account will be shown in your import mail management settings. </td>
  </tr>
</table>
<table width="500" height="59" border="0" class="akalink">
  <tr> 
    <td width="7" height="21">&nbsp;</td>
    <td width="581" height="24" valign="bottom"><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><b>What 
      Is A Full Name? </b></font></td>
  </tr>
  <tr>
    <td width="7" height="32">&nbsp;</td>
    <td width="581" height="32" align="left" valign="top">Your full name name 
      is what your recipients will see as your from name or address on your outgoing 
      e-mails. Your full name can either be your e-mail address, your legal first 
      and last name, or an alias. </td>
  </tr>
</table>
<table width="500" height="126" border="0" class="akalink">
  <tr> 
    <td width="7" height="21">&nbsp;</td>
    <td width="581" height="24" valign="bottom"><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><b>What 
      Is A Mail Server? </b></font></td>
  </tr>
  <tr>
    <td width="7" height="96">&nbsp;</td>
    <td width="581" height="96" align="left" valign="top"> <p>The mail server 
        for your POP account must be a valid hostname that routes to your POP 
        e-mail account providers mail server. Most Internet Service Providers 
        and free web-based e-mail providers use (mail.theirdomain.com or pop.theirdomain.com). 
      </p>
      <p><strong><font color="#000066">Example:</font></strong> If you are trying 
        to add your Hotmail account to AKAMail you would enter as the mail server 
        (mail.hotmail.com).</p></td>
  </tr>
</table>
<table width="500" height="165" border="0" class="akalink">
  <tr> 
    <td width="7" height="24">&nbsp;</td>
    <td width="581" height="24" valign="bottom"><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><b>What 
      Is A User ID/Name? </b></font></td>
  </tr>
  <tr>
    <td width="7" height="130">&nbsp;</td>
    <td width="581" height="130" align="left" valign="top"> <p>A User ID or User 
        Name is what your POP e-mail account provider identifies you as. Usually 
        most providers use your full e-mail address, and some only use your User 
        ID\Name of your e-mail address. </p>
      <p><strong><font color="#000066">Example 1:</font></strong> If you are trying 
        to add an AKALink POP e-mail account to AKAMail and your e-mail address 
        is laura@mydomain.com. Your User ID/Name would be laura@mydomain.com. 
      </p>
      <p><strong><font color="#000066">Example 2:</font></strong> If you are trying 
        to add your Hotmail account to AKAMail and your e-mail address is laura@hotmail.com. 
        Your User ID/Name would be laura.</p></td>
  </tr>
</table>
<table width="500" height="77" border="0" class="akalink">
  <tr> 
    <td width="7" height="21">&nbsp;</td>
    <td width="581" height="24" valign="bottom"><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><b>What 
      Is A Password? </b></font></td>
  </tr>
  <tr>
    <td width="7" height="47">&nbsp;</td>
    <td width="581" height="47" align="left" valign="top"> <p>Your password is 
        what authenticates you to your POP e-mail account provider. Please enter 
        the correct password for your POP e-mail account provider in order for 
        AKAMail to add your account successfully.</p></td>
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
