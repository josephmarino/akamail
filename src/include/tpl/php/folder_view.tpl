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

// Manage folder drop down displays all current folders in the users akamail account
// This appears at the top right hand side of every page within akamail

// URL: Universal appears on every page

$template = <<< HERE

	<table width="222" border="0">
  	<tr>
        <td width="208" height="44" align="left" valign="middle"><table width="237" border="0" cellpadding="0" cellspacing="0">
        <tr>
        <td width="81" valign="middle"><div align="right"><img src="/img/view_fldr.jpg" width="70" height="9"></div></td>
        <td width="3" valign="middle">&nbsp;</td>
        <td width="146"><div align="left"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000088"> 
			  <select name="viewfolder" class="dropdowns" onChange="if (this.selectedIndex > $cnt ) { javascript:new_folder();  } else { document.email.submit(); }">
		$templateline
                <option value="create">Create Folder</option>
			  </select>
			  <a href="http://$server_main/login/manage_folders"><img src="/img/btn_edit_folder.gif" width="44" height="13" border="0"></a>
			  </font></div></td>
        </tr>
        </table></td>
  	</tr>
	</table>

HERE;
?>
