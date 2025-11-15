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

// Prints account list on /login/othermail/ list's the current POP e-mail account(s) added to their akamail interface 

$template = <<< HERE

			<tr class="akalink"> 
                        <td width="3" noWrap bgcolor="#$mcolor">&nbsp; </td>
                        <td bgcolor="#FFFFFF">
                        <div align="center">$mauto</div>
                        </td>
                        <td bgcolor="#FFFFFF">$mhost</td>
                        <td width="166" bgcolor="#FFFFFF">$mnick</td>
                        <td width="127" align=middle noWrap bgcolor="#FFFFFF"> 
                        <div align="left">$mfolder</div>
                        </td>
                        <td width="141" align=middle noWrap bgcolor="#FFFFFF"> 
                        <div align="left"> 
                        <input name="refresh[$mid]" type="image" src="/img/btn_check_your_mail_now.gif" width="117" height="12" border="0">
                        </div>
                        </td>
                        <td width="109" align=left noWrap bgcolor="#FFFFFF"> 
                        
    <input name="edit[$mid]" type="image" src="/img/btn_edit_pencil.gif" width="41" height="13" border="0">
                        <img src="/img/btn_split.gif" width="8" height="14"> 
			$mdelete
                      </td>
                      </tr>

HERE;

?>
