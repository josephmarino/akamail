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
		  <td width="58%" valign="bottom"><a href="/login/compose/insert_smiley/static/?instance=<? print($_GET['instance']); ?>"><img src="/img/tab_smiley_static.jpg" width="151" height="24" border="0"></a><img src="/img/tab_smiley_animated.jpg" width="184" height="24" border="0"></td>
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
							  <td><img src="/img/tl_animatedexpressionstp.jpg" width="132" height="15"></td>
							</tr>
						  </table>
						  <div class="maindiv" STYLE="overflow-X:hidden;overflow-x:scroll; width:370;height:95;"> 
							<!-- start textures -->
							<table width="83%" border="0">
							  <tr> 
								<td width="15%" height="69" align="left" valign="top"><table width="5%" border="0">
									<tr> 
									  <td height="33" align="left" valign="bottom"><div align="center"><a href="javascript:insert_smiley('<img src=http://<? print($mail->server['main']); ?>/img/art/smiley/animated/animated_blush.gif width=30 height=33>');"><img src="/img/art/smiley/animated/animated_blush.gif" width="30" height="33" border="0"></a> 
										</div></td>
									</tr>
								  </table>
								  <table width="67%" border="0">
									<tr> 
									  <td height="33" align="left" valign="bottom"><div align="center"><a href="javascript:insert_smiley('<img src=http://<? print($mail->server['main']); ?>/img/art/smiley/animated/animated_confused.gif width=35 height=40>');"><img src="/img/art/smiley/animated/animated_confused.gif" width="35" height="40" border="0"></a> 
										</div></td>
									</tr>
								  </table></td>
								<td width="13%" align="left" valign="top"><table width="83%" border="0">
									<tr> 
									  <td height="33" align="left" valign="bottom"><div align="center"><a href="javascript:insert_smiley('<img src=http://<? print($mail->server['main']); ?>/img/art/smiley/animated/animated_kissing.gif width=30 height=30>');"><img src="/img/art/smiley/animated/animated_kissing.gif" width="30" height="30" border="0"></a> 
										</div></td>
									</tr>
								  </table>
								  <table width="5%" border="0">
									<tr> 
									  <td height="45" align="left" valign="bottom"><div align="center"><a href="javascript:insert_smiley('<img src=http://<? print($mail->server['main']); ?>/img/art/smiley/animated/animated_tounge.gif width=35 height=35>');"><img src="/img/art/smiley/animated/animated_tounge.gif" width="35" height="35" border="0"></a> 
										</div></td>
									</tr>
								  </table> </td>
								<td width="14%" align="left" valign="top"><table width="69%" border="0">
									<tr> 
									  <td height="37" align="left" valign="bottom"><div align="center"><a href="javascript:insert_smiley('<img src=http://<? print($mail->server['main']); ?>/img/art/smiley/animated/animated_laughing.gif width=30 height=35>');"><img src="/img/art/smiley/animated/animated_laughing.gif" width="30" height="35" border="0"></a> 
										</div></td>
									</tr>
								  </table>
								  <table width="5%" border="0">
									<tr> 
									  <td height="37" align="left" valign="bottom"><div align="center"><a href="javascript:insert_smiley('<img src=http://<? print($mail->server['main']); ?>/img/art/smiley/animated/animated_very_angry.gif width=33 height=35>');"><img src="/img/art/smiley/animated/animated_very_angry.gif" width="33" height="35" border="0"></a> 
										</div></td>
									</tr>
								  </table></td>
								<td width="58%" align="left" valign="top"><table width="5%" border="0">
									<tr> 
									  <td height="33" align="left" valign="bottom"><div align="center"><a href="javascript:insert_smiley('<img src=http://<? print($mail->server['main']); ?>/img/art/smiley/animated/animated_yelling.gif width=30 height=30>');"><img src="/img/art/smiley/animated/animated_yelling.gif" width="30" height="30" border="0"></a> 
										</div></td>
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
