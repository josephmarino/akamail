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
$mail	= new Mail();
session_start();

$mail->MailPageNoCache();
$mail->MailLoginInit();
$mail->MailOptionList();
$mail->MailLoginExpire();

$mail->MailBookSort($_POST['sort']);
$mail->MailBookMiniList();
?>
<? include($mail->tpl['html'] . '/header.html'); ?>
<style type="text/css">
@import url(/css/aka.css);
</style>

<script language="JavaScript">

ie = document.all?1:0
ns4 = document.layers?1:0

function CA(r){
	for (var i=0;i<frm.elements.length;i++) {
		var e = frm.elements[i];
		if ((e.name != 'allbox') && (e.type=='checkbox')) {
			if (r) {
				hL(e);
				e.checked = true;
			}
			else {
				dL(e);
				e.checked = false;
			}
		}
	}
}
function CCA(CB){
	if (CB.checked) {
		hL(CB);
	}
	else {
		dL(CB);
	}
}
function hL(E){
	if (ie) {
		while (E.tagName!="TR") {
			E=E.parentElement;
		}
	}
	else {
		while (E.tagName!="TR") {
			E=E.parentNode;
		}
	}
	E.style.background = "#E8F2FF";
}
function dL(E){
	if (ie) {
		while (E.tagName!="TR") {
			E=E.parentElement;
		}
	}
	else {
		while (E.tagName!="TR") {
			E=E.parentNode;
		}
	}
	E.style.background = "#ffffff";
}
</script>
</head>

<body link="#0000CC" vlink="#0000CC" alink="#0000CC">
<form action="" method="post" name="expressbook" id="expressbook">
<input type=hidden name="newfolder" value="">
  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="https://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="437" height="48">
    <param name="movie" value="/flash/akamail_top.swf">
    <param name="quality" value="high">
	<param name=menu VALUE=false>
    <embed src="/flash/akamail_top.swf" quality="high" pluginspage="https://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="437" height="48"></embed></object>
  <table width="53%" border="0">
    <tr> 
      <td width="3%" align="left" valign="top">&nbsp; </td>
      <td width="96%" align="left" valign="top"><table cellspacing=0 cellpadding=0 width="100" border=0>
          <tbody>
            <tr> 
              <td align="left" valign="top" bgcolor=#dcdcdc> <table width="424" border="0" cellpadding="2" cellspacing="1" class="akalink">
                  <tr bgcolor="#FFFFFF" class="akalink"> 
                    <td width="22"><div align="center"><font color="#000000"><b>To</b></font> 
                      </div></td>
                    <td width="22"><div align="center"><font color="#000000"><b>Cc</b></font></div></td>
                    <td width="25"><div align="center"><strong><font color="#000000">Bcc</font></strong></div></td>
                    <td width="131"><table cellspacing=0 cellpadding=0 border=0>
                        <tbody>
                          <tr class="akalink"> 
                            <td width="45"><font color="#000000"><b>First 
                      	
                      	     <? if( $mail->addrbook['sort'] == 'pfname ASC' ) { ?>
                      	     	        
                              		<input name="sort[pfname DESC]" type="image"  src="/img/sort_dwn.gif" width="11" height="12" border="0">
                    		 
                    	     <? } else { ?>
                    		 
                    		 	<input name="sort[pfname ASC]" type="image"  src="/img/sort_up.gif" width="11" height="12" border="0">
                    	     <? } ?> 	
                    	      
                              </b></font></td>
                            <td width="90" valign=bottom><font color="#000000"><b>Last 
                              
                             <? if( $mail->addrbook['sort'] == 'plname ASC' ) { ?>
                      	     	        
                             		<input name="sort[plname DESC]" type="image"  src="/img/sort_dwn.gif" width="11" height="12" border="0">
                    		 
                    	     <? } else { ?>
                    		 
                    		 	<input name="sort[plname ASC]" type="image"  src="/img/sort_up.gif" width="11" height="12" border="0">
                    	     <? } ?> 	
                    	      
                              
                              </b></font></td>
                          </tr>
                        </tbody>
                      </table></td>
                    <td width="198"><font color="#000000"><b>Email 
                      
                     <? if( $mail->addrbook['sort'] == 'pemail ASC' ) { ?>
                      	     	        
                       		<input name="sort[pemail DESC]" type="image"  src="/img/sort_dwn.gif" width="11" height="12" border="0">
                    		 
                    <? } else { ?>
                    		 
                    		<input name="sort[pemail ASC]" type="image"  src="/img/sort_up.gif" width="11" height="12" border="0">
                	
                    <? } ?>
                      
                      </b></font></td>
                  </tr>   
                  <? print($mail->mail_book_mini_list); ?>
                </table></td>
            </tr>
          </tbody>
        </table>
        <table width="229" border="0" cellspacing="0" cellpadding="0">
          <tr class="akalink"> 
            <td width="229" height="21" valign="middle"><a href="javascript:CA(true);" onMouseOver="window.status='Select all entries'; return true;" onMouseOut="window.status=''; return true;">Select 
              All</a> - <a href="javascript:CA(false);" onMouseOver="window.status='Deselect all entries'; return true;" onMouseOut="window.status=''; return true;">Deselect 
              All</a></td>
          </tr>
        </table>
        <table width="75%" border="0">
          <tr> 
            <td height="36" align="left" valign="bottom"><a href="javascript:Attach_Names('all');"><img src="/img/btn_add_selected_expbook.gif" width="178" height="28" border="0"></a> 
              <a href="javascript:this.window.close();"><img src="/img/btn_cancel.gif" width="100" height="28" border="0"></a></td>
          </tr>
        </table>
        <input type="hidden" name="remainingtostr" value=""> <input type="hidden" name="remainingccstr" value=""> 
        <input type="hidden" name="remainingbccstr" value=""> <script language="JavaScript">
	ie = document.all?1:0
	var frm = document.expressbook;

function Attach_Names(where){

	var e1, e2, e3, tmpStr;
	
	
				if ((where == 'to') || (where == 'all')) {
						e1 =  document.expressbook.remainingtostr.value;
		}
				if ((where == 'cc') || (where == 'all')) {
						e2 =  document.expressbook.remainingccstr.value;
	}
				if ((where == 'bcc') || (where == 'all')) {
						e3 =  document.expressbook.remainingbccstr.value;
}
				
				for (var i = 0; i < document.expressbook.elements.length; i++)	{
					var e = document.expressbook.elements[i];
					
				if ((e.name.indexOf('to:')==0) && e.checked && (e1.indexOf(e.value) == -1)) 
	{
					tmpStr = e.value;
					
				if (tmpStr.indexOf("; ")>0 || tmpStr.indexOf(";")>0 || tmpStr.indexOf(" ")>0 )
{
					tmpStr = e.name.substring(e.name.indexOf(":")+1);
					
				if (e1) 
					e1 += "; ";
					e1 += tmpStr;
			}
		else
	{	
				if (e1) 
					e1 += "; ";
					e1 += e.value;
	}
}
				if ((e.name.indexOf('cc:')==0) && e.checked && (e2.indexOf(e.value) == -1)) 
{
					tmpStr = e.value;
				if (tmpStr.indexOf("; ")>0 || tmpStr.indexOf(";")>0 || tmpStr.indexOf(" ")>0 )
{
					tmpStr = e.name.substring(e.name.indexOf(":")+1);
					
				if (e2) 
					e2 += "; ";
					e2 += tmpStr;
					}
				else
			{
			
				if (e2) 
					e2 += "; ";
					e2 += e.value;
	}
}
				if ((e.name.indexOf('bcc:')==0) && e.checked && (e3.indexOf(e.value) == -1)) 
{
					tmpStr = e.value;
					
				if (tmpStr.indexOf("; ")>0 || tmpStr.indexOf(";")>0 || tmpStr.indexOf(" ")>0 )
{
					tmpStr = e.name.substring(e.name.indexOf(":")+1);
					
				if (e3) 
					e3 += "; ";
					e3 += tmpStr;
				}
			else
		{
		
				if (e3) 
					e3 += "; ";
					e3 += e.value;			
			}
		}
	}
							window.opener.document.email.to.value
							
						if ((where == 'to') || (where == 'all')) {
							window.opener.document.email.to.value = e1;
}

						if ((where == 'cc') || (where == 'all')) {
						if (window.opener.document.email.cc != null)
							window.opener.document.email.cc.value = e2;
		}
		
						if ((where == 'bcc') || (where == 'all')) {
						if (window.opener.document.email.bcc != null)
							window.opener.document.email.bcc.value = e3;
						}
	
		window.close();
}

</script></td>
    </tr>
  </table>
</form>
<p class="akalink">&nbsp;</p>
</body>
</html>