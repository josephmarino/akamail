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

// Welcome e-mail that is sent to all new akamail e-mail accounts

// This is the body message

$template = <<< HERE

<html>
<head>
<style type="text/css">
@import url(http://www.akalink.com/css/aka.css);
</style>
</head>
<body>
<table width="68%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
	<td height="416" align="left" valign="top"><span class="akalink">Hello $name, 
	  </span> <p class="akalink"> Welcome to AKA Mail!  If you have any technical questions, please do not hesitate to contact us by email (<a href="https://mail.akalink.com/login/compose/?to=support@akalink.com">support@akalink.com</a>) or by telephone ($tel_sales).<br><br>
		<font color="#000000"><strong>Did you know that AKA Mail can be co-branded 
		for your business? </strong></font></p>
	  <p class="akalink">ISPs, ASPs and other businesses have co-branded the AKA Mail system to meet their specific needs. If you&rsquo;re an ISP or ASP, AKA Mail can help boost your sales revenue, reduce churn and improve your brand awareness.</p>
	  <span class="akalink"><strong><font color="#000000">How can AKA Mail help 
	  my business?</font></strong> </span> 
	  <table width="75%" border="0">
		<tr> 
		  <td width="3%">&nbsp;</td>
		  <td width="97%" align="left" valign="top" class="akalink">&#8226; All e-mails are virtually 
			Spam &amp; Virus free.<br> &#8226; Reduce churn.<br> &#8226; Improve 
			client retention.<br> &#8226; Improve your brand awareness.<br> &#8226; 
			Give your business the professional look it needs.</td>
		</tr>
	  </table>
	  <p class="akalink">If you are interested in co-branding AKA Mail, please <a href="http://www.akalink.com/helpdesk/demo/akamail/" target="_blank">click 
		here</a> or contact our direct sales line at $tel_sales to obtain more reasons why secure, web-based e-mail can help improve your brand, productivity and profits.</p>
	  <p><span class="akalink">Kind Regards,<br>
		AKALink Communications<br>
	</span> </p></td>
  </tr>
</table>
<span class="akalink"> </span> 
</body>
</html>

HERE;
?>
