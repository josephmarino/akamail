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

// 2nd welcome e-mail that is sent to all new akamail users

// this is the body message

$template = <<< HERE

<html>
<head>
<style type="text/css">
@import url(http://www.akalink.com/css/aka.css);
</style>
</head>

<body>
<table width="75%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
	<td align="left" valign="top"><span class="akalink">Dear $name,<br>
	  <br>
	  Thank you for choosing AKALink's AKAMail for your secure e-mail messaging 
	  needs. First and foremost I would like to say thank you for your business, 
	  and we look forward to serving your future business and personal needs. 
	  If you have any technical questions please view our <a href="javascript:interactivehelp();">AKAMail 
	  Online Interactive Tutorial</a>, or simply give us a call directly at $tel_techsupport</span>. 
	  <p class="akalink">I would like to bring your attention to a highly important 
		issue involving everyone who uses e-mail as a method of communication. 
		This important issue is Spam. Spam is a problem that costs many people 
		and businesses time and money. Spam not only is an annoyance, but a large 
		majority of Spam is used to promote scams and other illegal business practices. 
		Government official's and innovative Internet Service Providers, like 
		AKALink are joining together to rid the Internet of this plague. Remember 
		we hate Spam as much as you do.<br>
		<br>
		Because we hate spam as much as you do, we have implemented our own proprietary 
		module called Spam Cube&#8482;. This is our very own effective real-time 
		Spam filtration system. Although Spam Cube&#8482; has strict filtration 
		standards, on rare occasions Spam may pass through the Spam Cube&#8482; 
		system. </p>
	  <p class="akalink">In the event that spam does get into your e-mail box, 
		we have implemented a &quot;This Is Spam&quot; button, by clicking this 
		button you have done your part in helping us eliminate spam from the Internet 
		and from your Inbox permanently.</p>
	  <p class="akalink">Once again I would like to thank you for your business, 
		and welcome you to the AKALink community.</p>
	  <p><span class="akalink">Sincerely,<br>
		<a href="http://www.akalink.com/corporateinfo/profiles/jpm/" target="_blank">Joseph 
		P. Marino</a><br>
		Chief Executive Officer<br>
		AKALink Communications Corporation<br>
		<img src="http://www.akalink.com/corporateinfo/profiles/jpm/jpm_signature.jpg" width="129" height="63"> 
		</span></p></td>
  </tr>
</table>
</body>
</html>

HERE;
?>
