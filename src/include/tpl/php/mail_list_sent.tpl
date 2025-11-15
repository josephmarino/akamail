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

// Prints all e-mail messages in the users 'sent' folder, all outgoing e-mails will be logged to this folder
// unless the user specifies otherwise (disabled save of sent emails to this folder)
// This template displays when the recipient has read the email what time the user sent the email etc

// URL: /login/sent/

$template = <<< HERE
	
		<tr class="akalink"> 
		<td width="20" bgcolor="$bgcolor"><div align="center"> 
		<input name="mid[$mid]" type="checkbox" id="box2" value="$mid" onClick="CCA(this);">
		</div></td>
                <td width="18" bgcolor="#FFFFFF"><div align="center"><font color="#000000">$mstatus</font></div></td>
                <td width="18" bgcolor="#FFFFFF"> <div align="center"><font color="#000000">$mpriority</font></div></td>
                <td width="226" bgcolor="#FFFFFF"><font color="#000000">$mfrom</font></td>
                <td width="263" bgcolor="#FFFFFF"><font color="#000000">$mfile $msubject</font></td>
                <td width="137" bgcolor="#FFFFFF"><font color="#000000">$mdate</font></td>
		    <td width="137" bgcolor="#FFFFFF"><font color="#000000">$mrcptdate</font></td>
                <td width="51" bgcolor="#FFFFFF"><font color="#000000">$msize</font></td>
                </tr>
HERE;
?>
