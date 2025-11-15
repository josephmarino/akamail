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

// Template is used to print "Group" files, if a group file is existant this row in this template will be 
// printed displaying the name of the group along with how many addresses are inside of the group

// URL: /login/addressbook/

$template = <<< HERE

	<tr bgcolor="#FFFFFF" class="akalink"> 
	<td width="22"><div align="center"> 
	<input name="gid[to][$mgid]" type="checkbox" onClick="CCA(this);">
	</div></td>
	<td><div align="center"> 
	<input name="gid[cc][$mgid]" type="checkbox" onClick="CCA(this);">
	</div></td>
	<td> <div align="center"> 
	<input name="gid[bcc][$mgid]" type="checkbox" onClick="CCA(this);">
	</div></td>
	<td width="141"><a href="/login/addressbook/index.aka?viewgroup=$mgid" onMouseOver="window.status='View the people who are in this group file'; return true;" onMouseOut="window.status=''; return true;">$mgroup</a> 
	<img src="/img/newgroup.gif" width="14" height="14" onMouseOver="window.status='Indicates that this file is a group file with multiple people assigned to it.'; return true;" onMouseOut="window.status=''; return true;"> 
	</td>
	<td width="195"><a href="/login/compose/?togroup=$mgid" onMouseOver="window.status='Send an e-mail to everyone in this group'; return true	;" onMouseOut="window.status=''; return true;">$mgroup</a>  - $mcount person(s)</td>
	<td width="139">&nbsp;</td>
	<td width="89">&nbsp;</td>
	<td width="100">&nbsp;</td>
	</tr>
HERE;

?>
