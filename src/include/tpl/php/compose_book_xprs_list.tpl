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

// Prints entries in the users "express book" on the compose e-mail form
// this feature allows the user to quickly add users to the to field without going through their whole addressbook

// URL: /login/compose/

$template = <<< HERE

	<table width="196" cellpadding="0"><tr> 
	<td width="19"><a href="javascript:ADDEXP('$entry$cnt');" onMouseOver="window.status='Send an e-mail to this person.';return true;" onMouseOut="window.status=''; return true;"><img src="/img/arrow_exp_book.jpg" width="16" height="15" border="0"></a></td>
	<td width="176" class="akalink"><a href="javascript:ADDEXP('$entry$cnt');" onMouseOver="window.status='Send an e-mail to this person.'; return true;" onMouseOut="window.status=''; return true;">$name</a></td></tr></table>

HERE;
?>
