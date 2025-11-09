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
include($mail->tpl['html'] . '/main_login/info_header.html'); 
?> 
<style type="text/css">
@import url("/css/aka.css");
</style>
<? include($mail->tpl['html'] . "/main_login/info_bg.html"); ?>
<table width="600" border="0" height="95">
  <tr> 
    <td width="7" height="138" rowspan="2">&nbsp;</td>
    <td width="581" height="35" valign="middle"><font face="Arial, Helvetica, sans-serif" size="3"><b>You've 
      got questions we've got answers. <a name="top"></a></b></font></td>
  </tr>
  <tr> 
    <td width="581" height="381" align="left" valign="top"> <table width="583" border="0">
        <tr> 
          <td class="akalink">Most Frequently Asked Questions:</td>
        </tr>
        <tr valign="bottom"> 
          <td height="25" class="akalink"><b><font color="#000000">About AKAMail</font></b></td>
        </tr>
      </table>
      <table width="583" border="0">
        <tr> 
          <td class="akalink"><a href="#a">What is AKAMail?</a></td>
        </tr>
        <tr> 
          <td class="akalink"><a href="#a">What is my e-mail storage space limit on my account?</a></td>
        </tr>
        <tr> 
          <td class="akalink"><a href="#a">Where can I get technical support?</a></td>
        </tr>
      </table>
      <table width="583" border="0">
        <tr valign="bottom"> 
          <td height="25" class="akalink"><b><font color="#000000">AKAMail Privacy 
            and Security</font></b></td>
        </tr>
      </table>
      <table width="583" border="0">
        <tr> 
          <td class="akalink"><font face="Arial, Helvetica, sans-serif" size="2"><a href="#d">How 
            can I avoid or block unwanted spam e-mail's?</a></font></td>
        </tr>
        <tr> 
          <td class="akalink"><font face="Arial, Helvetica, sans-serif" size="2"><a href="#e">Does 
            AKAMail protect me from vicious e-mail viruses and worms?</a></font></td>
        </tr>
        <tr> 
          <td class="akalink"><font face="Arial, Helvetica, sans-serif" size="2"><a href="#f">Are 
            all of my e-mail's private and secure?</a></font></td>
        </tr>
      </table>
      <table width="583" border="0">
        <tr valign="bottom"> 
          <td height="25" class="akalink"><b><font color="#000000">Using AKAMail 
            </font></b></td>
        </tr>
      </table>
      <table width="583" border="0">
        <tr> 
          <td class="akalink"><a href="#g">Can I check my corporate or school e-mail using AKAMail?</a></td>
        </tr>
        <tr> 
          <td class="akalink"><a href="#h">Can I send and receive e-mail from my wireless\mobile 
            device?</a></td>
        </tr>
        <tr> 
          <td class="akalink"><a href="#i">Can I send and receive attachments with AKAMail?</a></td>
        </tr>
      </table>
      <table width="583" border="0">
        <tr> 
          <td class="akalink"><a href="#j">Can I send images and colorful html messages with AKAMail?</a></td>
        </tr>
        <tr> 
          <td class="akalink"><a href="#k">I have misplaced/forgotten my password, whom do I contact?</a></td>
        </tr>
        <tr> 
          <td class="akalink">&nbsp;</td>
        </tr>
      </table>
      <table width="583" border="0">
        <tr> 
          <td class="akalink">Answers:</td>
        </tr>
        <tr valign="bottom"> 
          <td height="25" class="akalink"><b><font color="#000000">About AKAMail</font></b><font color="#000000"><a name="a"></a></font></td>
        </tr>
      </table>
      <table width="583" border="0">
        <tr> 
          <td class="akalink"><b>Q</b> - <font color="#000066">What is AKAMail? <a href="#top"><img src="/img/top_of_pg.gif" width="73" height="13" border="0"></a></font></td>
        </tr>
        <tr> 
          <td class="akalink"><b>A</b> - AKAMail is a secure web based e-mail system that allows 
            AKALink clients to send and receive their e-mail anywhere anytime. 
          </td>
        </tr>
        <tr> 
          <td class="akalink"> <div align="center"></div></td>
        </tr>
        <tr> 
          <td class="akalink"><b>Q</b> - <font color="#000066">What is my e-mail storage space 
            limit on my account? </font> <font color="#000066"><a href="#top"><img src="/img/top_of_pg.gif" width="73" height="13" border="0"></a></font> 
          </td>
        </tr>
        <tr> 
          <td class="akalink"><b>A</b> - Each AKAMail client is assigned 100 Megabytes of storage 
            space. Extra storage space can be purchased online through your <a href="http://my.akalink.com" target="_blank">My 
            AKALink control panel</a>, or by contacting our sales department.</td>
        </tr>
        <tr> 
          <td class="akalink">&nbsp;</td>
        </tr>
        <tr> 
          <td class="akalink"><b>Q</b> - <font color="#000066">Where can I get technical support? 
            <a href="#top"><img src="/img/top_of_pg.gif" width="73" height="13" border="0"></a></font></td>
        </tr>
        <tr> 
          <td class="akalink"><b>A</b> - You can obtain live technical support from an AKALink 
            representative by contacting our <a href="http://www.akalink.com/helpdesk/" target="_blank">online 
            interactive help desk.</a></td>
        </tr>
      </table>
      <table width="583" border="0">
        <tr valign="bottom"> 
          <td height="25" class="akalink"><b><font color="#000000">AKAMail Privacy 
            and Security</font></b><font color="#000000"><a name="d"></a><a name="e"></a><a name="f"></a></font></td>
        </tr>
      </table>
      <table width="583" border="0">
        <tr> 
          <td class="akalink"><b>Q</b> - <font color="#000066">How can I avoid or block unwanted 
            spam e-mail's? <a href="#top"><img src="/img/top_of_pg.gif" width="73" height="13" border="0"></a></font></td>
        </tr>
        <tr> 
          <td class="akalink"><b>A</b> - AKAMail has advanced IntelliSpam� technology. IntelliSpam�, 
            when enabled, allows you to instantly block and filter unwanted spam 
            e-mail. IntelliSpam� also has an Intelligent Filtering System which 
            scans for provocative unwanted e-mail's. When the IntelliSpam� system 
            detects a provocative e-mail, it will automatically filter it out 
            from your inbox.</td>
        </tr>
        <tr> 
          <td class="akalink">&nbsp;</td>
        </tr>
        <tr> 
          <td class="akalink"><b>Q</b> - <font color="#000066">Does AKAMail protect me from vicious 
            e-mail viruses and worms? <a href="#top"><img src="/img/top_of_pg.gif" width="73" height="13" border="0"></a></font></td>
        </tr>
        <tr> 
          <td class="akalink"><b>A</b> - AKAMail has a secure virus scanning system that thoroughly 
            scans every piece of e-mail that routed through the AKALink network. 
            Our partner company Network Associates has provided us with their 
            industry leading virus scanning software. This allows us to guarantee 
            that your e-mail's are 100% clean from any vicious virus or worm that 
            may lurk on the Internet. </td>
        </tr>
        <tr> 
          <td class="akalink">&nbsp;</td>
        </tr>
        <tr> 
          <td class="akalink"><b>Q</b> - <font color="#000066">Are all of my e-mail's private 
            and secure? <a href="#top"><img src="/img/top_of_pg.gif" width="73" height="13" border="0"></a></font></td>
        </tr>
        <tr> 
          <td class="akalink"><b>A</b> - Yes, every e-mail you send or receive using the AKAMail 
            system, is secured by our reinforced 128-bit encrypted SSL (Secure 
            Sockets Layer) certificates. It is nearly impossible for anyone to 
            intercept your e-mail messages.</td>
        </tr>
      </table>
      <table width="583" border="0">
        <tr valign="bottom"> 
          <td height="25" class="akalink"><b>Using AKAMail </b><a name="g"></a><a name="h"></a><a name="i"></a><a name="j"></a><a name="k"></a></td>
        </tr>
      </table>
      <table width="583" border="0">
        <tr> 
          <td class="akalink"><b>Q</b> - C<font color="#000066">an I check my corporate or school 
            e-mail using AKAMail? <a href="#top"><img src="/img/top_of_pg.gif" width="73" height="13" border="0"></a></font></td>
        </tr>
        <tr> 
          <td class="akalink"><b>A</b> - Yes, you can by using our web based POP3 option. Checking 
            your other POP3 accounts are very easy when using AKAMail.</td>
        </tr>
        <tr> 
          <td class="akalink">&nbsp;</td>
        </tr>
        <tr> 
          <td class="akalink"><b>Q</b> - <font color="#000066">Can I send and receive e-mail from 
            my wireless\mobile device? <a href="#top"><img src="/img/top_of_pg.gif" width="73" height="13" border="0"></a></font></td>
        </tr>
        <tr> 
          <td class="akalink"><b>A </b>- Yes, you can send and receive your e-mail from any wireless 
            or mobile device, anywhere anytime.</td>
        </tr>
        <tr> 
          <td class="akalink">&nbsp;</td>
        </tr>
        <tr> 
          <td class="akalink"><b>Q</b> - <font color="#000066">Can I send and receive attachments 
            with AKAMail? <a href="#top"><img src="/img/top_of_pg.gif" width="73" height="13" border="0"></a></font></td>
        </tr>
        <tr> 
          <td class="akalink"><b>A</b> - Yes, you can but the attachment cannot exceed your e-mail 
            storage space limit. </td>
        </tr>
        <tr> 
          <td class="akalink">&nbsp;</td>
        </tr>
      </table>
      <table width="583" border="0">
        <tr> 
          <td class="akalink"><b>Q</b> - <font color="#000066">Can I send images and colorful 
            html messages with AKAMail? <a href="#top"><img src="/img/top_of_pg.gif" width="73" height="13" border="0"></a></font></td>
        </tr>
        <tr> 
          <td class="akalink"><b>A</b> - Yes, sending images and colorful html messages has never 
            been easier. With AKAMail you can instantly insert any image into 
            the body message of your e-mail or you can even input any color or 
            text by using the color\font selection toolbar.</td>
        </tr>
        <tr> 
          <td class="akalink">&nbsp;</td>
        </tr>
        <tr> 
          <td class="akalink"><b>Q</b> - <font color="#000066">I have misplaced/forgotten my password, 
            whom do I contact? <a href="#top"><img src="/img/top_of_pg.gif" width="73" height="13" border="0"></a></font></td>
        </tr>
        <tr> 
          <td class="akalink"><b>A</b> - If you have misplaced your password you can easily change 
            it by logging into your My AKALink account administration control 
            panel located at <a href="http://my.akalink.com" target="_blank">http://my.akalink.com</a>. 
            If you require further assistance do not hesitate to contact an AKALink 
            representative at our <a href="http://www.akalink.com/helpdesk/" target="_blank">interactive 
            online help desk</a>. </td>
        </tr>
        <tr> 
          <td class="akalink">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table>
<table width="600" border="0">
  <tr> 
    <td height="34"> 
      <div align="center"><font face="Arial, Helvetica, sans-serif" size="2"><a href="javascript: self.close()" onMouseOver="window.status='Click here to close this window'; return true;" onMouseOut="window.status=''; return true;">Click 
        here to Close Window</a></font></div>
    </td>
  </tr>
</table>
</body>
</html>
