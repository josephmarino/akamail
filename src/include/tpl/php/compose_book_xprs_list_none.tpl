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

// Prints no entries available in the users "express book" on the compose e-mail form
// when the user has no entries in their express book

// URL: /login/compose/

$template = <<< HERE

	<table width="194" cellpadding="0">
	<tr><td width="188" align="left" class="akalink">Your Express Book currently has no people in it. To add people to your Express Book <a href="javascript:centerwindow('http://$server_main/login/options/10/editlist/',625,330)" onMouseOver="window.status='Edit your Express Book'; return true;" onMouseOut="window.status=''; return true;">click here.</a></td>
	</tr></table>
HERE;
?>
