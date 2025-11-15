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

// This template is for the e-mail message that is sent out to the users new imported address book list
// notifying everyone on the list of the users new akamail e-mail address

// This is the Message template
// URL: /login/addressbook/import/

$template = <<< HERE

	<html>
	<body>
	<table cellspacing=0 cellpadding=0 width=800 border=0>
	<tbody>
    	<tr align=left valign="top"> 
        <td style="BORDER-RIGHT: #A3A3A3 1px solid; BORDER-TOP: #A3A3A3 1px solid; BORDER-LEFT: #A3A3A3 1px solid; BORDER-BOTTOM: #A3A3A3 1px solid"> 
        <table width="800" border="0" cellspacing="0" cellpadding="0" height="28">
        <tr align="left" valign="bottom"> 
        <td height="47" width="267" valign="middle"> <div align="left"><a href="http://www.akalink.com" target="_blank"><img src="http://$server_main/img/top_logo_left.gif" width="388" height="48" border="0"></a></div></td>
        <td height="47" width="533" valign="middle"> <div align="right"></div></td>
        </tr>
        </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr> 
	<td bgcolor="#80ADC1">&nbsp;</td>
	</tr>
	</table> 
	<table width="91%" border="0">
	<tr> 
	<td width="3%" height="135">&nbsp;</td>
	<td width="97%" valign="bottom"><p><font size="2" face="Arial, Helvetica, sans-serif">Hello 
	everyone it's $name, I have changed my e-mail address to $sender. 
	Please add my new e-mail address to your address book and contact 
	me at this e-mail address from now on. <IMG height=22 src="http://$server_main/img/art/smiley/1.gif" width=25> 
	</font></p>
        <p><font size="2" face="Arial, Helvetica, sans-serif">Kind Regards,</font></p>
	<p><font size="2" face="Arial, Helvetica, sans-serif">$name</font></p>
	</td>
	</tr>
	</table>
	<p><font size="2" face="Arial, Helvetica, sans-serif"></font><font size="2" face="Arial, Helvetica, sans-serif"> 
	</font></p>
	</td>
        </tr>
        </tbody>
        </table>
        </body>
        </html>
HERE;
?>
