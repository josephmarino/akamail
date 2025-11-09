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
 
require($_SERVER['DOCUMENT_ROOT']  . '/include/akamail.class');
$mail = new Mail();
include($mail->tpl['html']. '/main_login/info_header.html'); 
?> 
<html>
<head>
<script language="javascript1.1">
      
      function insert_smiley(img) {
              eval(parent).opener.OnSmiley(<? print($_GET['instance']); ?>,img);
      }
                      
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="64%" border="0">
  <tr> 
	<td width="5%">&nbsp;</td>
	<td width="95%" align="left" valign="top"><table width="56%" border="0" cellpadding="0" cellspacing="0">
		<tr> 
		  <td width="58%" valign="bottom"><img src="/img/tab_smiley_static.jpg" width="151" height="24" border="0"><a href="/login/compose/insert_smiley/animated/?instance=<? print($_GET['instance']); ?>"><img src="/img/tab_smiley_animated.jpg" width="184" height="24" border="0"></a></td>
		  <td width="42%" valign="bottom">&nbsp;</td>
		</tr>
		<tr> 
		  <td colspan="4"> <table cellspacing=0 cellpadding=0 width="377" border=0>
			  <tbody>
				<tr> 
				  <td width="377" align="left" valign="top" bgcolor=#B8B7B7 class="akalink"> 
					<table width="100%" cellpadding="2" cellspacing="1">
					  <tr bgcolor="#ebebe3" class="akalink"> 
						<td width="776" align="left" valign="top" bgcolor="#FFFFFF"><table width="75" border="0" cellpadding="0" cellspacing="0">
							<tr> 
							  <td><font color="#FFFFFF" size="1">o</font></td>
							</tr>
						  </table>
						  <table width="75" border="0" cellpadding="0" cellspacing="0">
							<tr> 
							  <td><img src="/img/tl_expressionstp.jpg" width="79" height="15"></td>
							</tr>
						  </table>
						  <div class="maindiv" STYLE="overflow-X:hidden;overflow-x:scroll; width:370;height:95;"> 
							<!-- start textures -->
							<table width="18%" border="0">
							  <tr> 
								<td width="5%" height="69" align="left" valign="top"><table width="5%" border="0">
									<tr> 
									  <td height="33" align="left" valign="bottom"><div align="center"><a href="javascript:insert_smiley('<img src=http://<? print($mail->server['main']); ?>/img/art/smiley/1.gif width=25 height=22>');"><img src="/img/art/smiley/1.gif" width="25" height="22" border=0></a></div></td>
									</tr>
								  </table>
								  <table width="5%" border="0">
									<tr> 
									  <td height="25"><div align="center"><a href="javascript:insert_smiley('<img src=http://<? print($mail->server['main']); ?>/img/art/smiley/8.gif width=19 height=23>');"><img src="/img/art/smiley/8.gif" width="19" height="23" border="0"></a></div></td>
									</tr>
								  </table></td>
								<td width="4%" align="left" valign="top"><table width="5%" border="0">
									<tr> 
									  <td height="33" align="left" valign="bottom"><div align="center"><a href="javascript:insert_smiley('<img src=http://<? print($mail->server['main']); ?>/img/art/smiley/2.gif width=20 height=20>');"><img src="/img/art/smiley/2.gif" width="20" height="20" border="0"></a></div></td>
									</tr>
								  </table>
								  <table width="5%" border="0">
									<tr> 
									  <td height="25"><div align="center"><a href="javascript:insert_smiley('<img src=http://<? print($mail->server['main']); ?>/img/art/smiley/10.gif width=19 height=20>');"><img src="/img/art/smiley/10.gif" width="19" height="20" border="0"></a></div></td>
									</tr>
								  </table></td>
								<td width="4%" align="left" valign="top"> <table width="5%" border="0">
									<tr> 
									  <td height="33" align="left" valign="bottom"><div align="center"><a href="javascript:insert_smiley('<img src=http://<? print($mail->server['main']); ?>/img/art/smiley/4.gif width=19 height=23>');"><img src="/img/art/smiley/4.gif" width="19" height="23" border="0"></a></div></td>
									</tr>
								  </table>
								  <table width="5%" border="0">
									<tr> 
									  <td height="25"><div align="center"><a href="javascript:insert_smiley('<img src=http://<? print($mail->server['main']); ?>/img/art/smiley/9.gif width=19 height=22>');"><img src="/img/art/smiley/9.gif" width="19" height="22" border="0"></a></div></td>
									</tr>
								  </table></td>
								<td width="3%" align="left" valign="top"><table width="5%" border="0">
									<tr> 
									  <td height="33" align="left" valign="bottom"><div align="center"><a href="javascript:insert_smiley('<img src=http://<? print($mail->server['main']); ?>/img/art/smiley/5.gif width=19 height=25>');"><img src="/img/art/smiley/5.gif" width="19" height="25" border="0"></a></div></td>
									</tr>
								  </table>
								  <table width="5%" border="0">
									<tr> 
									  <td height="25"><div align="center"><a href="javascript:insert_smiley('<img src=http://<? print($mail->server['main']); ?>/img/art/smiley/6.gif width=21 height=22>');"><img src="/img/art/smiley/6.gif" width="21" height="22" border="0"></a></div></td>
									</tr>
								  </table></td>
								<td width="84%" align="left" valign="top"><table width="5%" border="0">
									<tr> 
									  <td height="25"><div align="center"><a href="javascript:insert_smiley('<img src=http://<? print($mail->server['main']); ?>/img/art/smiley/11.gif width=19 height=32>');"><img src="/img/art/smiley/11.gif" width="19" height="32" border="0"></a></div></td>
									</tr>
								  </table>
								  <table width="5%" border="0">
									<tr> 
									  <td height="25"><div align="center"><a href="javascript:insert_smiley('<img src=http://<? print($mail->server['main']); ?>/img/art/smiley/7.gif width=19 height=23>');"><img src="/img/art/smiley/7.gif" width="19" height="23" border="0"></a></div></td>
									</tr>
								  </table></td>
							  </tr>
							</table>
							<!-- end textures -->
						  </div>
						  <table width="18" border="0" cellpadding="0" cellspacing="0">
							<tr> 
							  <td height="12"><font color="#FFFFFF" size="1">-</font></td>
							</tr>
						  </table>
						  <table width="75" border="0" cellpadding="0" cellspacing="0">
							<tr> 
							  <td><font color="#FFFFFF" size="1">o</font></td>
							</tr>
						  </table></td>
					  </tr>
					</table></td>
				</tr>
			  </tbody>
			</table></td>
		</tr>
	  </table> </td>
  </tr>
</table>
</body>
</html>
