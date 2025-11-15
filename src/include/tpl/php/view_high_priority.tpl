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

// Displays the high priority alert when the e-mail they are reading has been marked as high priority by its sender

// URL: /login/view/

$template = <<< HERE

<table width="775" border=0 cellpadding=3 cellspacing=0>
  	<tr class=akalink> 
    	<td width="7%" height="21" align=right valign=top nowrap><b><font color="#000000">Priority:</font></b></td>
    	<td width="93%" align="left" valign="middle"><table width="75%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="15%" class="akalink"><font color="EC3434"><strong>High Priority 
            </strong></font></td>
        <td width="85%"><img src="/img/icons/mailboxes/ico_high_priority_view.gif" alt="Indicates that this e-mail has been marked high priority" width="11" height="11"></td>
        </tr>
        </table></td>
        </tr>
	</table>

HERE;
?>
