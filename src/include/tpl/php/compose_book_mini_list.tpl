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

// Minibook: Prints the entries that are in the users "mini book"
// prints each entry row by row

// URL: /login/options/10/minibook/

$template = <<< HERE

	<tr bgcolor="#FFFFFF" class="akalink"> 
	<td width="22"><div align="center"> <font color="#000000"> 
	<input name="to:doog" type="checkbox" id="to:doog" onClick="CCA(this);" value="$email">
	</font></div></td><td><div align="center"> <font color="#000000"> 
	<input name="cc:doog" type="checkbox" id="cc:doog"  onClick="CCA(this);" value="$email">
	</font></div></td>
	<td> <div align="center"> <font color="#000000"> 
	<input name="bcc:doog" type="checkbox" id="bcc:doog"  onClick="CCA(this);" value="$email">
	</font></div></td>
	<td width="131" class="akalink"><font color="#000000">$name</font></td>
	<td width="198" class="akalink"><font color="#003399">$email</font></td>
	</tr>
HERE;
?>
