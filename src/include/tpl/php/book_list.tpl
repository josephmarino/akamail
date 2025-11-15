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

// Template prints out addressbook entry rows
// Template currently prints First, Last name, e-mail address, aol instant messenger, ICQ, MSN messenger contacts
// All entries are functional and lead to proper links

// URL: /login/addressbook/

$template = <<< HERE

         <tr bgcolor="$bgcolor" class="akalink"> 
         <td width="22"><div align="center"> 
         <input name="cid[to][$cid]" type="checkbox" onClick="CCA(this);">
         </div></td>
         <td><div align="center"> 
         <input name="cid[cc][$cid]" type="checkbox"  onClick="CCA(this);">
         </div></td>
         <td> <div align="center"> 
         <input name="cid[bcc][$cid]" type="checkbox"  onClick="CCA(this);">
         </div></td>
         <td width="141"><a 
         href="/login/addressbook/view/?cid=$cid" onMouseOver="window.status='Edit address book information for this user'; return true;" onMouseOut="window.status=''; return true;">$name</a></td>
         <td width="195"><a href="/login/compose/?to=$emailref" onMouseOver="window.status='Send an e-mail to this person'; return true;" onMouseOut="window.status=''; return true;">$email</a></td>
         <td width="139">$aim</td>
         <td width="89">$icq</td>
         <td width="100">$msn</td>
         </tr>

HERE;
?>
