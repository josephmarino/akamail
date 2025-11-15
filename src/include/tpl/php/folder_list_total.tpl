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

// Display detailed totals for folders (located at the bottom of the folder entries)

// URL: /login/manage_folders/

$template = <<< HERE

	<tr bgcolor="#FCFCFC" class="akalink"> 
	<td width="46"><div align="right"><font color="#990000">Total:</font></div></td>
	<td width="265"><font color="#990000">$builtcnt Default, $custcnt Custom Folder(s)</font></td>
	<td width="117"><font color="#990000">$totalmsg</font></td>
	<td width="127" bgcolor="#FCFCFC"><font color="#990000">&nbsp;</font></td>
	<td width="124"><font color="#990000">&nbsp;</font></td>
	<td width="50"><font color="#990000">$totalsize</font></td>
	</tr>

HERE;
?>
