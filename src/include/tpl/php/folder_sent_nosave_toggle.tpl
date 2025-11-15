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

// If a user has the option to not save outgoing "sent" e-mails to their sent folder this reminder will appear
// notifying the user that they have this option enabled this template only appears when this option is enabled
// not when it is disabled (disabled meaning all outgoing emails are being sent to their sent folder)

// URL: /login/sent/

$template = <<< HERE

<table width="59%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="29" align="center" valign="bottom"><table width="430" border="1" cellpadding="0" cellspacing="0" bordercolor="D2BF60">
        <tr> 
          <td width="426" height="17" bgcolor="FFFFC7"><div align="center" class="akalink"> 
              <table width="85%" border="0" cellpadding="0" cellspacing="0">
                <tr> 
                  <td width="24%" align="right"><img src="/img/warningind_status.gif" width="16" height="16"></td>
                  <td width="76%"><table width="355" border="0" cellpadding="0" cellspacing="0">
                      <tr> 
                        <td width="355" align="left" valign="top" class="akalink"><div align="center"><font color="C30C0E"><strong>All 
                            sent e-mail is not being saved to your 'sent' folder.</strong></font></div></td>
                      </tr>
                      <tr> 
                        <td align="left" valign="top" class="akalink"><div align="center"><font color="C30C0E"><strong>If 
                            you would like to turn this feature off please <a href="/login/options/05/" target="_blank">click 
                            here</a></strong></font></div></td>
                      </tr>
                    </table></td>
                </tr>
              </table>
              <font color="C30C0E"><strong> </strong></font></div></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="19" align="center" valign="bottom">&nbsp;</td>
  </tr>
</table>

HERE;
?>
