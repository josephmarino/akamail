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

// Prints the akamail for windows software download link if the user is running any version of windows

// URL: /login/options/

$template = <<< HERE

 <table width="211" border="0" cellspacing="0" cellpadding="3">
  <tr> 
	<td width="205" height="26" class="akalink"><a href="http://$server_main/shortcut/AKAMail.exe" onMouseOver="	window.status=' '; return true;" onMouseOut="window.status=''; return true;">AKAMail 
	  For Windows</a></td>
  </tr>
  <tr> 
	<td width="205" class="akalink">Instantly access AKAMail directly from your 
	  Windows desktop.</td>
  </tr>
</table>

HERE;
?>
