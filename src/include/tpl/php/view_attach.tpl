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

// Alerts the user letting them know the e-mail they are currently reading has an attachment

// URL: /login/view/

$template = <<< HERE

	<table width="57%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
        <td align="left" valign="top"><table width="44%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
        <td>&nbsp;</td>
        </tr>
        </table>
        <table width="88%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
        <td width="20%" valign="bottom"><img src="/img/attachments_top_tab.gif" width="149" height="24"></td>
        <td width="80%" valign="bottom">&nbsp;</td>
        </tr>
        <tr align="left" valign="top"> 
        <td colspan="4"><table cellspacing=0 cellpadding=0 width="317" border=0>
        <tbody>
        <tr> 
        <td width="317" align="left" valign="top" bgcolor=#CCCCCC class="akalink">$attachfile
        </td>
        </tr>
        </table></td>
        </tr>
        </table></td>
        </tr>
        </table>

HERE;
?>
