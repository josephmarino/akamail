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

// Displays the type of file that is available inside of the attachment
// This template integrates with view_attach.tpl
// this template prints the specs of the attachment telling the user the type of file it is displays the file size etc
// And a link to save the attachment to their desktop

// URL: /login/view/

$template = <<< HERE

<table width="100%" cellpadding="2" cellspacing="1">
        <tr bgcolor="#ebebe3" class="akalink"> 
        
  <td width="444" height="77" align="left" valign="top" bgcolor="#FFFFFF"><table width="301" border="0" bgcolor="#FFFFFF">
      <tr> 
        <td width="24%" height="50" bgcolor="#FFFFFF"><div align="center" class="akalink">$icon</div></td>
        <td width="76%" align="left" bgcolor="#FFFFFF"><table width="75%" border="0" cellpadding="0" cellspacing="0">
			  <tr> 
				<td height="19">&nbsp;</td>
			  </tr>
			</table>
			<table width="224" border="0" cellpadding="0" cellspacing="0">
			  <tr bgcolor="#FFFFFF"> 
				<td class="akalink">&nbsp;</td>
				<td class="akalink"><strong><font color="#000000">File Name:</font></strong> 
				  $location</td>
			  </tr>
			  <tr bgcolor="#FFFFFF"> 
				<td class="akalink">&nbsp;</td>
				<td class="akalink"><strong><font color="#000000">File Size:</font></strong> 
				  $size</td>
			  </tr>
			  <tr bgcolor="#FFFFFF"> 
				<td width="4%" height="23" valign="middle" class="akalink">&nbsp;</td>
				<td width="96%" valign="middle" class="akalink"><font color="#000000">No 
				  virus found!</font> <img src="/img/icons/attachments/ico_attachment_no_virus_che.gif" width="15" height="14"></td>
			  </tr>
			</table>
			<table width="75%" border="0" cellpadding="0" cellspacing="0">
			  <tr> 
				<td height="43" align="left" valign="middle"><a href="javascript:virus();"><img src="/img/mc_viri_logo.gif" width="120" height="30" border="0" onMouseOver="window.status='Protected by McAfee Virus Scanner'; return true;" onMouseOut="window.status=''; return true;"></a></td>
			  </tr>
			</table></td>
      </tr>
    </table>
	</table>

HERE;
