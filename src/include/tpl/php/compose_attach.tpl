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

// Prints attachment list on a new outgoing e-mail
// When a user attaches files, the files will be printed in an attachment list on /login/compose/
// This template prints that attachment list

// URL: /login/compose/

$template = <<< HERE

<table width="525" border="0" cellpadding="0" cellspacing="0">
  <tr class="akalink"> 
	<td width="3%" height="21">$icon</td>
	<td width="54%">$file <font color="#FFFFFF">--</font>($size) </td>
	<td width="43%" align="left"><input name="removefile[$fid]" type="image" id="removefile" src="/img/btn_removefile.gif" width="70" height="12" border="0"> 
	  <img src="/img/btn_split.gif" width="8" height="14"> <input name="removeall" type="image" id="removeall" src="/img/btn_removeall.gif" width="67" height="12" border="0"></td>
  </tr>
</table>

HERE;

?>
