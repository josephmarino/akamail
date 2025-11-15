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

// Displays current e-mail messages in the users folder\mailbox  
// This appears on folders Inbox, Deleted Items, Drafts and Custom Folders (Does not print e-mails in sent folder see mail_list_sent.tpl)
// Prints all new e-mail messages in neat rows

// URL: /login/inbox/ & /login/deleted/ & /login/drafts/

$template = <<< HERE
	
				    <tr bgcolor="#FFFFFF" class="akalink">
                            <td width="20" bgcolor="$bgcolor"><div align="center">
                            <input name="mid[$mid]" type="checkbox" id="box2" value="$mid" onClick="CCA(this);">
                            </div></td>
                            <td width="18"><div align="center"><font color="#000000">$mstatus</font></div></td>
                            <td width="18"> <div align="center"><font color="#000000">$mpriority</font></div></td>
                            <td width="226"><font color="#000000">$mfrom</font></td>
                            <td width="263"><font color="#000000">$mfile $msubject</font></td>
                            <td width="137"><font color="#000000">$mdate</font></td>
                            <td width="51"><font color="#000000">$msize</font></td>
                          </tr>

HERE;

?>
