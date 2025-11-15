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

// Inputs the users signature at the bottom of the outgoing e-mail
// This template is used to show the user that their signature is attached to the outgoing e-mail
// This template appears whenever the user selects signature or the auto signature feature

// URL: /login/compose/

$template = <<< HERE

<table width="673" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="673" class="akalink"><hr size="1" noshade></td>
  </tr>
  <tr> 
    <td align="left" valign="top" class="akalink">$signature</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="akalink">&nbsp;</td>
  </tr>
</table>

HERE;
?>
