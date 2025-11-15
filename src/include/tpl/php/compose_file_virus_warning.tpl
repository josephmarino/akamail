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

// Alerts the user of a virus found on the file they are trying to upload to their outgoing e-mail
// Alert tells the user what type of virus it is and links them to a page telling them how they can remove the virus


// URL: /login/compose/attach/

$template = <<< HERE

<table width="70%" height="47" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF0000">
        <tr> 
        <td width="5%" height="26" align="left" valign="middle"><table width="599" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="7%" height="20" valign="middle"><div align="center"><img src="/img/ico_stop_sign.gif" width="20" height="20"></div></td>
          <td width="93%" align="left" valign="top"> $viruslist
            <table width="465" border="0" cellpadding="0" cellspacing="0">
              <tr> 
                <td width="94%" class="akalink"> Please delete this file from 
                  your computer immediately!</td>
              </tr>
            </table></td>
        </tr>
      </table></td>
        </tr>
        </table>

HERE;

?>
