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
require( $_SERVER[ 'DOCUMENT_ROOT' ] . '/include/akamail.class' );
$mail = new Mail();
session_start();
$mail->MailPageNoCache();
$mail->MailLoginInit();
$mail->MailOptionList();
$mail->MailLoginExpire();
if ( isset( $_SESSION[ 'bookresult' ] ) ) {
	$bookresult = $_SESSION[ 'bookresult' ];
	unset( $_SESSION[ 'bookresult' ] );
} else {
	header( 'Location: http://' . $mail->server[ 'main' ] . '/login/addressbook/print' );
	exit();
}
?> < ? include( $mail->tpl[ 'html' ] . '/header.html' );
?>
<style type="text/css">
	@import url(/css/aka.css);
</style> < /head><body><table width="606" border="0" align="center" cellpadding="0" cellspacing="0">  <tr>     <td width="270"><img src="http:/ / < ? print( $mail->server[ 'main' ] );
?> / img / top_logo_left . gif "></td>  </tr></table><? print($bookresult); ?> <table width="
600 " height="
18 " border=0 align="
center " cellpadding=0 cellspacing=0 class="
akalink ">  <tr class="
akalink ">     <td width=50% height="
2 " align="
left " valign=top><img src=" / img / thug_mansion . gif " width="
600 " height="
1 "></td>  </tr>  <tr>     <td height="
15 " colspan=5 align="
left " valign="
top "><table width="
100 % " border=0 cellpadding=4 cellspacing=0 class="
akalink ">        <tr bgcolor=" #EEFBF4" class="akalink">           <td width="55%" height="26" align="left" valign="middle"><font color="#FF0000">Get             your own FREE AKAMail account today at: AKALink.com</font></td>          <td width="45%" align="left" valign="middle">&nbsp;</td>        </tr>      </table></td>  </tr></table></body></html>