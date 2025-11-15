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

// When a user has no e-mail messages in their inbox, sent box etc this message will be displayed
// alerting the user that there is no e-mail messages inside of the selected folder

// URL: /login/inbox/ & /login/deleted/ & /login/drafts/ & /login/sent/

$template = <<< HERE

<table width="100%" border="0" cellpadding="1" cellspacing="1"><tr> 
    <td height="19" valign="bottom" bgcolor="#FFFFFF" class="akalink"><font color="#FFFFFF">-</font> 
      This folder has no e-mail messages.</td>
  </tr></table>

HERE;
?>
