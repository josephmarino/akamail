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

// This alert only appears when the user has set the option to block all media such as images, active x, flash etc
// in all incoming e-mails
// this alert appears whent hey are viewing the email

// URL: /login/view/

$template = <<< HERE

<table width="75%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
	<td height="58" align="center" valign="bottom"><table width="601" border="1" cellpadding="0" cellspacing="0" bordercolor="D2BF60">
		<tr> 
		  <td width="597" height="17" bgcolor="FFFFC7"><div align="center" class="akalink"> 
			  <table width="99%" border="0" cellpadding="0" cellspacing="0">
				<tr> 
				  <td width="9%"><img src="/img/warningind_status.gif" width="16" height="16"></td>
				  <td width="91%"><table width="573" border="0" cellpadding="0" cellspacing="0">
					  <tr> 
						<td width="579" align="left" valign="top" class="akalink"><div align="center"><font color="C30C0E"><strong>AKAMail 
							has blocked all graphics in this e-mail because your 
							content filtering settings are enabled.</strong></font></div></td>
					  </tr>
					  <tr> 
						<td align="left" valign="top" class="akalink"><div align="center"><font color="C30C0E"><strong>If 
							you would like to turn content filtering off please 
							<a href="/login/options/05/">click 
							here</a></strong></font></div></td>
					  </tr>
					</table></td>
				</tr>
			  </table>
			  <font color="C30C0E"><strong> </strong></font></div></td>
		</tr>
	  </table></td>
  </tr>
</table>

HERE;
?>
