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
 
require($_SERVER['DOCUMENT_ROOT'] . '/include/akamail.class');
$mail = new Mail();
include($mail->tpl['html']. '/main_login/info_header.html'); 
?> 
<html>
<head>
<script language="javascript1.1">
      
      function insert_background(img,imgname) {
              eval(parent).opener.OnTexture(<? print($_GET['instance']); ?>,img,imgname);
      }
                      
</script>
<title>AKAMail - Art</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
@import url("/css/aka.css");
</style>
</head>

<body topmargin="0">
<table width="75%" border="0">
  <tr> 
	<td width="1%">&nbsp;</td>
	<td width="98%"><table width="56%" border="0" cellpadding="0" cellspacing="0">
		<tr> 
		  <td width="58%" valign="bottom"><a href="/login/compose/insert_backgrounds/?instance=<? print($_GET['instance']); ?>"><img src="/img/tab_backgrounds.gif" width="151" height="27" border="0"></a><img src="/img/tab_textures.gif" width="196" height="27" border="0"></td>
		  <td width="42%" valign="bottom">&nbsp;</td>
		</tr>
		<tr> 
		  <td colspan="4"> <table cellspacing=0 cellpadding=0 width="434" border=0>
			  <tbody>
				<tr> 
				  <td width="434" align="left" valign="top" bgcolor=#B8B7B7 class="akalink"> 
					<table width="100%" cellpadding="2" cellspacing="1">
					  <tr bgcolor="#ebebe3" class="akalink"> 
						<td width="486" align="left" valign="top" bgcolor="#FFFFFF"> 
						  <table width="75%" border="0" cellpadding="0" cellspacing="0">
							<tr> 
							  <td><font color="#FFFFFF" size="1">o</font></td>
							</tr>
						  </table>
						  <table width="75%" border="0" cellpadding="0" cellspacing="0">
							<tr> 
							  <td><img src="/img/TExture_patterns_tp.gif" width="115" height="17"></td>
							</tr>
						  </table>
						  
						  <div class="maindiv" STYLE="overflow-X:hidden;overflow-x:scroll; width:420;height:120;">
						  <!-- start textures -->
						  <table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
	<td width="0%"><table width="438" border="0">
		<tr> 
		  							  <td width="95%" align="left" valign="top"><a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumb1.jpg','thumb1.jpg');"><img src="textures/thumb1.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumb2.jpg','thumb2.jpg');"><img src="textures/thumb2.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumb3.jpg','thumb3.jpg');"><img src="textures/thumb3.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumb4.jpg','thumb4.jpg');"><img src="textures/thumb4.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumb5.jpg','thumb5.jpg');"><img src="textures/thumb5.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumb6.jpg','thumb6.jpg');"><img src="textures/thumb6.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumb7.jpg','thumb7.jpg');"><img src="textures/thumb7.jpg" width="49" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbpattern01.jpg','thumbpattern01.jpg');"><img src="textures/thumbpattern01.jpg" width="50" height="50" border="0"></a> 
									  </td>
		</tr>
		<tr> 
		  							  <td align="left" valign="top"><a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbpattern02.jpg','thumbpattern02.jpg');"><img src="textures/thumbpattern02.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbpattern03.jpg','thumbpattern03.jpg');"><img src="textures/thumbpattern03.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbpattern04.jpg','thumbpattern04.jpg');"><img src="textures/thumbpattern04.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbpattern05.jpg','thumbpattern05.jpg');"><img src="textures/thumbpattern05.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbpattern06.jpg','thumbpattern06.jpg');"><img src="textures/thumbpattern06.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbpattern07.jpg','thumbpattern07.jpg');"><img src="textures/thumbpattern07.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbpattern08.jpg','thumbpattern08.jpg');"><img src="textures/thumbpattern08.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbpattern09.jpg','thumbpattern09.jpg');"><img src="textures/thumbpattern09.jpg" width="50" height="50" border="0"></a> 
									  </td>
		</tr>
	  </table></td>
	<td width="68%"><table width="438" border="0">
		<tr> 
		  							  <td align="left" valign="top"><a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbpattern10.jpg','thumbpattern10.jpg');"><img src="textures/thumbpattern10.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbpattern11.jpg','thumbpattern11.jpg');"><img src="textures/thumbpattern11.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbpattern12.jpg','thumbpattern12.jpg');"><img src="textures/thumbpattern12.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbpattern13.jpg','thumbpattern13.jpg');"><img src="textures/thumbpattern13.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbpattern14.jpg','thumbpattern14.jpg');"><img src="textures/thumbpattern14.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbpattern15.jpg','thumbpattern15.jpg');"><img src="textures/thumbpattern15.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbpattern16.jpg','thumbpattern16.jpg');"><img src="textures/thumbpattern16.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbpattern17.jpg','thumbpattern17.jpg');"><img src="textures/thumbpattern17.jpg" width="50" height="50" border="0"></a> 
									  </td>
		</tr>
		<tr> 
		  							  <td align="left" valign="top"><a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbpattern18.jpg','thumbpattern18.jpg');"><img src="textures/thumbpattern18.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbpattern20.jpg','thumbpattern20.jpg');"><img src="textures/thumbpattern20.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbpattern21.jpg','thumbpattern21.jpg');"><img src="textures/thumbpattern21.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbpattern22.jpg','thumbpattern22.jpg');"><img src="textures/thumbpattern22.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbpattern24.jpg','thumbpattern24.jpg');"><img src="textures/thumbpattern24.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbpattern26.jpg','thumbpattern26.jpg');"><img src="textures/thumbpattern26.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbpattern29.jpg','thumbpattern29.jpg');"><img src="textures/thumbpattern29.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbTexture0101.jpg','thumbTexture0101.jpg');"><img src="textures/thumbTexture0101.jpg" width="50" height="50" border="0"></a> 
									  </td>
		</tr>
	  </table></td>
	<td width="16%"><table width="438" border="0">
		<tr> 
		  							  <td align="left" valign="top"><a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbTexture0102.jpg','thumbTexture0102.jpg');"><img src="textures/thumbTexture0102.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbTexture0103.jpg','thumbTexture0103.jpg');"><img src="textures/thumbTexture0103.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbTexture0104.jpg','thumbTexture0104.jpg');"><img src="textures/thumbTexture0104.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbTexture0105.jpg','thumbTexture0105.jpg');"><img src="textures/thumbTexture0105.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbTexture0106.jpg','thumbTexture0106.jpg');"><img src="textures/thumbTexture0106.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbTexture0110.jpg','thumbTexture0110.jpg');"><img src="textures/thumbTexture0110.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbTexture0112.jpg','thumbTexture0112.jpg');"><img src="textures/thumbTexture0112.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbTexture0115.jpg','thumbTexture0115.jpg');"><img src="textures/thumbTexture0115.jpg" width="50" height="50" border="0"></a> 
									  </td>
		</tr>
		<tr> 
		  							  <td align="left" valign="top"><a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbTexture0117.jpg','thumbTexture0117.jpg');"><img src="textures/thumbTexture0117.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbTexture0119.jpg','thumbTexture0119.jpg');"><img src="textures/thumbTexture0119.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbTexture0120.jpg','thumbTexture0120.jpg');"><img src="textures/thumbTexture0120.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbTexture0205.jpg','thumbTexture0205.jpg');"><img src="textures/thumbTexture0205.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbTexture0207.jpg','thumbTexture0207.jpg');"><img src="textures/thumbTexture0207.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbTexture0212.jpg','thumbTexture0212.jpg');"><img src="textures/thumbTexture0212.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbTexture0219.jpg','thumbTexture0219.jpg');"><img src="textures/thumbTexture0219.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbTexture0402.jpg','thumbTexture0402.jpg');"><img src="textures/thumbTexture0402.jpg" width="50" height="50" border="0"></a> 
									  </td>
		</tr>
	  </table></td>
	<td width="16%" align="left" valign="top"><table width="438" border="0">
		<tr> 
		  							  <td align="left" valign="top"><a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbTexture0404.jpg','thumbTexture0404.jpg');"><img src="textures/thumbTexture0404.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbTexture0409.jpg','thumbTexture0409.jpg');"><img src="textures/thumbTexture0409.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbTexture0413.jpg','thumbTexture0413.jpg');"><img src="textures/thumbTexture0413.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbTexture0414.jpg','thumbTexture0414.jpg');"><img src="textures/thumbTexture0414.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbTexture0415.jpg','thumbTexture0415.jpg');"><img src="textures/thumbTexture0415.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbTexture0418.jpg','thumbTexture0418.jpg');"><img src="textures/thumbTexture0418.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbTexture0419.jpg','thumbTexture0419.jpg');"><img src="textures/thumbTexture0419.jpg" width="50" height="50" border="0"></a> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_textures/textures/thumbTexture0420.jpg','thumbTexture0420.jpg');"><img src="textures/thumbTexture0420.jpg" width="50" height="50" border="0"></a> 
									  </td>
		</tr>
	  </table></td>
  </tr>
</table>
						  <!-- end textures -->
						  </div> 
						  
						  <table width="75%" border="0" cellpadding="0" cellspacing="0">
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
	  </table></td>
  </tr>
</table>
</body>
</html>
