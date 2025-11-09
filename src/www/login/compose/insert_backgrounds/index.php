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
              eval(parent).opener.OnBackGround(<? print($_GET['instance']); ?>,img,imgname);
      }
                      
</script>
</head>

<style type="text/css">
@import url("/css/aka.css");
</style>


<body topmargin="0">
<input name="background" type="hidden" id="background" value="http://www.akalink.com">
<table width="75%" border="0">
  <tr> 
	<td width="1%">&nbsp;</td>
	<td width="98%"><table width="48%" border="0" cellpadding="0" cellspacing="0">
		<tr> 
		  <td width="58%" valign="bottom"><img src="/img/tab_backgrounds.gif" width="151" height="27" border="0"><a href="/login/compose/insert_textures/?instance=<? print($_GET['instance']); ?>"><img src="/img/tab_textures.gif" width="196" height="27" border="0"></a></td>
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
							  <td><img src="/img/backgrounds_tp.gif" width="115" height="17"></td>
							</tr>
						  </table>
		
		<div class="maindiv" STYLE="overflow-X:hidden;overflow-x:scroll; width:420;height:122;">
						  
						    <table width="100%" height="131" border="0" cellpadding="0" cellspacing="0">
							  <tr> 
								<td width="49%" height="131" align="left" valign="top"><table width="408" border="0">
									<tr> 
									  <td width="27%"><a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_backgrounds/backgrounds/hello.jpg','hello.jpg');"><img src="backgrounds/thumbs/thumbhello.jpg" width="99" height="83" border="0"></a></td>
									  <td width="25%"><a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_backgrounds/backgrounds/dog.jpg','dog.jpg');"><img src="backgrounds/thumbs/thumbdog.jpg" width="99" height="83" border="0"></a></td>
									  <td width="24%"><a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_backgrounds/backgrounds/hello2.jpg','hello2.jpg');"><img src="backgrounds/thumbs/thumbhello2.jpg" width="99" height="83" border="0"></a></td>
									  <td width="24%"><a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_backgrounds/backgrounds/lighthouse.jpg','lighthouse.jpg');"><img src="backgrounds/thumbs/thumblighthouse.jpg" width="99" height="83" border="0"></a></td>
									</tr>
									<tr> 
									  <td class="akalink"><strong><font color="#000000">Title: 
										</font></strong><a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_backgrounds/backgrounds/hello.jpg','hello.jpg');">Hello</a></td>
									  <td class="akalink"><strong><font color="#000000">Title:</font></strong> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_backgrounds/backgrounds/dog.jpg','dog.jpg');">Paw 
										Prints</a></td>
									  <td class="akalink"><strong><font color="#000000">Title:</font></strong> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_backgrounds/backgrounds/hello2.jpg','hello2.jpg');">Hello 
										II</a></td>
									  <td class="akalink"><strong><font color="#000000">Title:</font></strong> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_backgrounds/backgrounds/lighthouse.jpg','lighthouse.jpg');">Light 
										House</a></td>
									</tr>
								  </table></td>
								<td width="24%" align="left" valign="top"><table width="408" border="0">
									<tr> 
									  <td width="27%"><a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_backgrounds/backgrounds/littlebelieve.jpg','littlebelieve.jpg');"><img src="backgrounds/thumbs/thumblittlebelieve.jpg" width="99" height="83" border="0"></a></td>
									  <td width="25%"><a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_backgrounds/backgrounds/music.jpg','music.jpg');"><img src="backgrounds/thumbs/thumbmusic.jpg" width="99" height="83" border="0"></a></td>
									  <td width="24%"><a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_backgrounds/backgrounds/relax.jpg','relax.jpg');"><img src="backgrounds/thumbs/thumbrelax.jpg" width="99" height="83" border="0"></a></td>
									  <td width="24%"><a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_backgrounds/backgrounds/rose.jpg','rose.jpg');"><img src="backgrounds/thumbs/thumbrose.jpg" width="99" height="83" border="0"></a></td>
									</tr>
									<tr> 
									  <td class="akalink"><strong><font color="#000000">Title: 
										</font></strong><a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_backgrounds/backgrounds/littlebelieve.jpg','littlebelieve.jpg');">Believe</a></td>
									  <td class="akalink"><strong><font color="#000000">Title:</font></strong> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_backgrounds/backgrounds/music.jpg','music.jpg');">Melody 
										</a></td>
									  <td class="akalink"><strong><font color="#000000">Title:</font></strong> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_backgrounds/backgrounds/relax.jpg','relax.jpg');">Relax</a></td>
									  <td class="akalink"><strong><font color="#000000">Title:</font></strong> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_backgrounds/backgrounds/rose.jpg','rose.jpg');">Roses</a></td>
									</tr>
								  </table></td>
								<td width="25%" align="left" valign="top"><table width="408" border="0">
									<tr> 
									  <td width="27%"><a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_backgrounds/backgrounds/daisy.jpg','daisy.jpg');"><img src="backgrounds/thumbs/bgdaisy.jpg" width="99" height="83" border="0"></a></td>
									  <td width="25%"><a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_backgrounds/backgrounds/fishy.jpg','fishy.jpg');"><img src="backgrounds/thumbs/bgfishy.jpg" width="99" height="83" border="0"></a></td>
									  <td width="24%"><a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_backgrounds/backgrounds/leaff.jpg','leaff.jpg');"><img src="backgrounds/thumbs/bgleaff.jpg" width="99" height="83" border="0"></a></td>
									  <td width="12%"><a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_backgrounds/backgrounds/sun.jpg','sun.jpg');"><img src="backgrounds/thumbs/bgsun.jpg" width="99" height="83" border="0"></a></td>
									  <td width="12%"><a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_backgrounds/backgrounds/sznow.jpg','sznow.jpg');"><img src="backgrounds/thumbs/bgsznow.jpg" width="90" height="83" border="0"></a></td>
									</tr>
									<tr> 
									  <td class="akalink"><strong><font color="#000000">Title: 
										</font></strong><a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_backgrounds/backgrounds/daisy.jpg','daisy.jpg');">Daisy</a></td>
									  <td class="akalink"><strong><font color="#000000">Title:</font></strong> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_backgrounds/backgrounds/fishy.jpg','fishy.jpg');">Fishy</a></td>
									  <td class="akalink"><strong><font color="#000000">Title:</font></strong> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_backgrounds/backgrounds/leaff.jpg','leaff.jpg');">Leaf</a></td>
									  <td class="akalink"><strong><font color="#000000">Title:</font></strong> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_backgrounds/backgrounds/sun.jpg','sun.jpg');">Sun 
										</a></td>
									  <td class="akalink"><strong><font color="#000000">Title:</font></strong> 
										<a href="javascript:insert_background('http://<? print($mail->server['main']); ?>/login/compose/insert_backgrounds/backgrounds/sznow.jpg','sznow.jpg');">Snow</a></td>
									</tr>
								  </table></td>
							  </tr>
							</table>

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
