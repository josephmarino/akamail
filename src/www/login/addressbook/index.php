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
session_start();

$mail->MailPageNoCache();
$mail->MailLoginInit();
$mail->MailOptionList();
$mail->MailLoginExpire();

if( $mail->MailPostIs('viewfolder') ) {
	
	if( $_POST['viewfolder'] == 'create' ) {
		
		$mail->MailFolderRegister($_POST['newfolder']);
	
	} elseif( $_POST['viewfolder'] != $_SESSION['folder_cur'] ) {
	
		$mail->MailFolderRedirect($_POST['viewfolder']);
	}
}

if( isset($_SESSION['result']) ) {

	$mail->error['result'] = $_SESSION['result'];
	unset($_SESSION['result']);
}

if( $mail->MailPostIs('sendemail') ) {

	$mail->MailBookSend($_POST['cid'],$_POST['gid']);
}

if( $mail->MailPostIs('quickadd') ) {
	
	if( $mail->MailBookQuickRegister($_POST['quick']) ) {
	
		unset($_POST['quick']);
	}
}
if( $mail->MailPostIs('delete') ) {

	if( isset($_POST['cid']) ) {
	
		$mail->MailBookContactDelete($_POST['cid']);

	}

	if( isset($_POST['gid']) ) {
	
		$mail->MailBookGroupDelete($_POST['gid']);
	}
}

if( !empty($_POST['newgroup']) ) {

	$mail->MailBookGroupRegister($_POST['newgroup']);
}

if( $mail->MailPostIs('moveto')  ) {

	$mail->MailBookGroupMove($_POST['cid'],$_POST['movegroup']);
}

if( !isset($_POST['pagejump']) ) {
		
	$_POST['pagejump'] = 0;
}

$mail->MailBookSort($_POST['sort']);

if( $mail->MailPostIs('sort') ) {

	$_POST['pagejump'] = 0;
}

if( $mail->MailPostIs('action') ) {
	
	foreach($_POST['action'] as $action => $id) {
		
		if( $action == 'previous' ) {
		
			$_POST['pagejump'] -= $mail->mail_option_list['bookpage'];
		
		} elseif( $action == 'next' ) {
			
			$_POST['pagejump'] += $mail->mail_option_list['bookpage'];
		}
	}
}


$mail->MailBookList($_GET['browse'],$_GET['viewgroup'],$_POST['pagejump'],$_POST['search']);
$mail->MailFolderView();
$mail->MailBookGroupView();
?>
<? include($mail->tpl['html'] . '/header.html'); ?>

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





function MM_preloadImages() { //v3.0

  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}

}



function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;

}



function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;

}


function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}

}



//-->//-->

</script>
<script>

function interactivehelp() {
	h3ll0=window.open('/info/help/','elite','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=492,height=350');

}

</script>
 
<STYLE type=text/css>
@import url("/css/aka.css");
A:hover {
	COLOR: #666666
}

</STYLE>

<body bgcolor="#FFFFFF" leftmargin="0" topmargin="20" marginwidth="0" marginheight="0" onLoad="MM_preloadImages('../../img/compose_eml_d.jpg','../../img/address_book_d.jpg','../../img/collect_email_d.jpg')" link="#0000cc" vlink="#0000cc" alink="#0000cc">
<form method="post" action="" name="email">
<input type=hidden name="newfolder" value="">
  <script>

function new_group(){
	thegroup = prompt("What would you like to name your new group?","");
	if (thegroup) {
		if  (thegroup.length > 0) {
		email.newgroup.value=thegroup;
		email.submit();

	}

}

}



</script>
  <input type=hidden name="newgroup" value="">
  <table cellspacing=0 cellpadding=0 width=800 border=0 align="center">
    <tbody>
      <tr align=left valign="top"> 
        <td style="BORDER-RIGHT: #A3A3A3 1px solid; BORDER-TOP: #A3A3A3 1px solid; BORDER-LEFT: #A3A3A3 1px solid; BORDER-BOTTOM: #A3A3A3 1px solid"> 
          <table width="800" border="0" cellspacing="0" cellpadding="0" height="28">
            <tr align="left" valign="bottom"> 
              <td height="47" width="11" valign="middle">&nbsp; </td>
              <td height="47" width="595" valign="middle"> <a href="http://<? print($mail->server['main']); ?>"><img src="/img/top_logo_left.gif" width="388" height="48" border="0"></a></td>
              <td height="47" width="194" valign="top" align="left"> <? print($mail->mail_folder_view_top); ?></td>
            </tr>
          </table>
          <table width="800" border="0" cellspacing="0" cellpadding="0" height="12">
            <tr> 
              <td height="2"> <table width="800" border="0" cellspacing="0" cellpadding="0" height="12">
                  <tr> 
                    <td height="2"> <table width="800" border="0" cellspacing="0" cellpadding="0">
                        <tr> 
                          <td width="365"><img src="/img/1_dv.gif" width="365" height="31"></td>
                          <td width="80"><a href="http://<? print($mail->server['main']); ?>/login/inbox/" onMouseOver="window.status='View your inbox for new e-mail'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/5_in.gif" width="79" height="31" border="0"></a></td>
                          <td width="76"><a href="http://<? print($mail->server['main']); ?>/login/sent/" onMouseOver="window.status='View your sent e-mail folder'; return true;"><img src="/img/1_sent.gif" width="76" height="31" border="0"></a></td>
                          <td width="118"><a href="http://<? print($mail->server['main']); ?>/login/deleted/" onMouseOver="window.status='View all deleted e-mail'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/1_del.gif" width="118" height="31" border="0"></a></td>
                          <td width="62"><a href="http://<? print($mail->server['main']); ?>/login/options/" onMouseOver="window.status='Edit your account settings'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/1_opt.gif" width="93" height="31" border="0"></a></td>
                          <td width="99"><a href="http://<? print($mail->server['main']); ?>/login/drafts/" onMouseOver="window.status='View your drafted e-mail folder'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/1_drafts.gif" width="69" height="31" border="0"></a></td>
                        </tr>
                      </table></td>
                  </tr>
                </table></td>
            </tr>
          </table>
          <? include($mail->tpl['html'] . '/toolbar.html'); ?>
          <table width="800" border="0" cellspacing="0" cellpadding="0">
            <tr> 
              <td width="11">&nbsp;</td>
              <td width="789" align="left" valign="top"> <table width="771" border="0" cellpadding="0" cellspacing="0" class="akalink">
				  <tr> 
					<td width="434" height="2">&nbsp;</td>
					<td width="337">&nbsp;</td>
				  </tr>
				  <tr> 
					<td>Address Book for 
					  <? $mail->MailContactNamePrint(); ?>
					</td>
					<td align="right"><a href="/login/addressbook/print/" onMouseOver="window.status='Print this page.'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/printable_view.jpg" alt="Print this page." width="95" height="18" border="0"></a><img src="/img/btn_split.gif" width="8" height="14"><a href="/login/addressbook/import/"><img src="/img/import_contacts.jpg" width="99" height="18" border="0" onMouseOver="window.status='Import your address book.'; return true;" onMouseOut="window.status=''; return true;"></a><img src="/img/btn_split.gif" width="8" height="14"><a href="/login/addressbook/export/"><img src="/img/export_contacts.jpg" width="103" height="18" border="0" onMouseOver="window.status='Export your address book.'; return true;" onMouseOut="window.status=''; return true;"></a> 
					</td>
				  </tr>
				</table>
                <table width="76%" border="0">
                  <tr> 
                    <td height="20" valign="middle" class="akalink"><strong><font color="#FF0000"> 
                      <? $mail->MailErrorPrint(); ?> </font></strong></td>
                  </tr>
                </table>
                <table width="51%" height="20" border="0" cellpadding="0" cellspacing="0">
				  <tr> 
					<td align="left" valign="bottom"><img src="/img/tp_searchaddressbook.jpg" width="164" height="14"></td>
				  </tr>
				</table>
				<table cellspacing=0 cellpadding=2 width="100%" border=0>
                  <tbody>
                    <tr> 
                      <td width="14%" height="34"> <font face="Arial, helvetica, sans-serif" color="#000000" size="2"> 
                        <input name=search class="textfields" size=20 maxlength=20>
                        </font> </td>
                      <td width="15%"><font face="Arial, helvetica, sans-serif" color="#000000" size="2"> 
                        <input type="image" border="0" name="searchnow" src="/img/web_search.gif" width="100" height="30" onMouseOver="window.status='Search your address book'; return true;" onMouseOut="window.status=''; return true;">
                        </font></td>
                      <td align=right width="71%" valign="middle">&nbsp; </td>
                    </tr>
                  </tbody>
                </table>
                <? print($mail->mail_book_sort_list); ?> <table width="767" border="0" cellpadding="0" cellspacing="0" class="akalink">
                  <tr> 
                    <td width="767"><img src="/img/quick_add.jpg" width="62" height="9"></td>
                  </tr>
                  <tr> 
                    <td align="left" valign="top"> 
                    <table width="763" height="47" border="0" cellpadding="0" cellspacing="0">
                      <tr class="akalink"> 
                        <td width="132" height="45" align="left" valign="middle" bgcolor="#FFFFFF">First 
                          Name:<font color="#000000"> 
                          <? $mail->MailErrorXMarkPrint($mail->mail_book_img_error['pfname']); ?>
                          <input name=quick[pfname] class="textfields" value="<? print($_POST['quick']['pfname']); ?>" size=20 maxlength=20>
                          </font></td>
                        <td width="132" height="45" align="left" valign="middle" bgcolor="#FFFFFF">Last 
                          Name:<font color="#000000"> 
                           <? $mail->MailErrorXMarkPrint($mail->mail_book_img_error['plname']); ?>
                          <input name=quick[plname] class="textfields" value="<? print($_POST['quick']['plname']); ?>" size=20 maxlength=20>
                          </font></td>
                        <td width="134" height="45" align="left" valign="middle" bgcolor="#FFFFFF">E-mail 
                          Address:<font color="#000000"> 
                          <? $mail->MailErrorXMarkPrint($mail->mail_book_img_error['pemail']); ?>
                          <input name=quick[pemail] class="textfields" value="<? print($_POST['quick']['pemail']); ?>" size=20 maxlength=64>
                          </font></td>
                        <td width="136" height="45" align="left" valign="middle" bgcolor="#FFFFFF">Screen 
                          Name or UIN:<font color="#000000"> 
                            <? $mail->MailErrorXMarkPrint($mail->mail_book_img_error['picq']); ?>
                            <? $mail->MailErrorXMarkPrint($mail->mail_book_img_error['paim']); ?>
                            <? $mail->MailErrorXMarkPrint($mail->mail_book_img_error['pmsn']); ?>
                          <input name="quick[psn]" value="<? print($_POST['quick']['psn']); ?>" class="textfields" size=20 maxlength=64>
                          <span class="akalink"> </span> </font></td>
                        <td width="229" height="45" valign="top" bgcolor="#FFFFFF"> 
                          <table width="66%" border="0" cellpadding="0" cellspacing="0">
                            <tr> 
                              <td>&nbsp;</td>
                            </tr>
                            <tr> 
                              <td height="23" valign="bottom"><font color="#000000"> 
                                <select  name="quick[psnmsg]" class="dropdowns">
                                  <option value="paim"><font color="#000000"><span class="akalink">AIM</span></font></option>
                                  <option value="picq"><font color="#000000"><span class="akalink">ICQ</span></font></option>
                                  <option value="pmsn"><font color="#000000"><span class="akalink">MSN</span></font></option>
                                </select>
                                <input type="image" border="0" name="quickadd" src="/img/add_quick.gif" width="62" height="20">
                                </font></td>
                            </tr>
                          </table>
                          <font color="#000000"><span class="akalink"> </span></font></td>
                      </tr>
                    </table>
                  </td>
                  </tr>
                </table>
                <table cellspacing=0 cellpadding=0 width="98%" border=0>
                  <tbody>
                    <tr> 
                      <td align="left" valign="top" bgcolor=#dcdcdc> <table width="774" border="0" cellpadding="2" cellspacing="1">
                          <tr bgcolor="#FFFFFF" class="akalink"> 
                            <td width="22"> <div align="center"><font color="#000000"><b>To</b></font> 
                              </div></td>
                            <td width="22"> <div align="center"><font color="#000000"><b>Cc</b></font></div></td>
                            <td width="25"> <div align="center"><strong><font color="#000000">Bcc</font></strong></div></td>
                            <td width="141"> <table cellspacing=0 cellpadding=0 border=0>
                                <tbody>
                                  <tr class="akalink"> 
                                    <td width="45"><font color="#000000"><b>First 
                                  
				    <?  if( $mail->addrbook['sort'] == 'pfname ASC' ) { ?>
				    
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
                            <td width="195"><font color="#000000"><b>Email 
                              
                            <? if( $mail->addrbook['sort'] == 'pemail ASC' ) { ?>

                               		<input name="sort[pemail DESC]" type="image" src="/img/sort_dwn.gif" width="11" height="12" border="0">
			    
			    <? } else { ?>
			    	
                                    	<input name="sort[pemail ASC]" type="image" src="/img/sort_up.gif" width="11" height="12" border="0">
      
			   <? } ?>
			   
                              </b></font></td>
                            <td width="139"><img src="/img/aol_aim.gif" width="128" height="16"></td>
                            <td width="89"><img src="/img/tp_icq.jpg" width="44" height="16"></td>
                            <td width="100"><img src="/img/tp_msn_messanger.jpg" width="98" height="16"></td>
                          </tr>
                          <? print($mail->mail_book_search_list); ?> </table></td>
                    </tr>
                  </tbody>
                </table>
                <table width="763" border="0" cellpadding="0" cellspacing="0" class="akalink">
				  <tr class="akalink"> 
					<td width="408" height="31" valign="middle"><a href="javascript:CA(true);" onMouseOver="window.status='Select all e-mails'; return true;" onMouseOut="window.status=''; return true;">Select 
					  All</a> - <a href="javascript:CA(false);" onMouseOver="window.status='Deselect all e-mails'; return true;" onMouseOut="window.status=''; return true;">Deselect 
					  All</a></td>
					
					<? if( $mail->mail_book_page_cnt > 0 ) {
					
							print('<td width="314" height="31" align="right" valign="middle"> 
							<div class="akalink">Showing Contacts ' . $mail->mail_book_page_spos . ' to ' . $mail->mail_book_page_epos); 
							
							if( $mail->mail_book_page_cnt > $mail->mail_option_list['bookpage']) {
									
								print('on <select name="pagejump" class="dropdowns" id="page"  onChange="this.document.email.submit()">' . 
								      $mail->mail_book_page_list . '
								      /select>');
							}
						
                       				if( $_POST['pagejump'] != 0 ) {
                        
                        				print('<input name="action[previous]" type="image" src="/img/btn_previous.jpg" width="51" height="14" border="0">');
                        
                       				} elseif( $_POST['pagejump'] == 0 ) {
                        	
                        				print('<img src="/img/spacer.gif" width="8" height="14"><img src="/img/btn_previous_disabled.jpg" width="51" height="14">');
                        			}
                    							
						print('<font color="#FFFFFF"><img src="/img/spacer.gif" width="8" height="14">
						</font>
						</div></td>
						<td width="41" align="right" valign="middle"> <font color="#FFFFFF">');
					  
                    	    			if( $_POST['pagejump'] + $mail->mail_option_list['bookpage'] < $mail->mail_book_page_cnt  ) {
                        
                        				print('<input name="action[next]" type="image" src="/img/btn_next.jpg" width="33" height="14" border="0">');
                      	
                      				} else {
                      		
                      					print('<img src="/img/btn_next_disabled.jpg" width="33" height="14">');
                      				}
                      			   }
                   				?>
					  -</font> </td>
				  </tr>
				</table>
				<table cellspacing=0 cellpadding=2 width="100%" border=0>
                  <tbody>
                    <tr> 
                      <td height="50" valign="bottom" width="67%"> <input name="delete" type="image" id="delentry" src="/img/btn_delete_dddrrd4.gif" width="97" height="29" border="0" onClick="return confirm('Are you sure you want to delete these selected entries?');"> 
                        <input name="sendemail" type="image" id="sendemail" src="/img/btn_sendemailselected.gif" width="116" height="28" border="0"> 
                        <a href="/login/addressbook/edit/personal/"><img src="/img/web_new_contact.gif" width="120" height="30" border="0" onMouseOver="window.status='Add a new person to your address book'; return true;" onMouseOut="window.status=''; return true;"></a> 
                        <a href="javascript:new_group();"><img src="/img/web_new_group.gif" width="107" height="30" border="0" onMouseOver="window.status='Add a new group to your address book'; return true;" onMouseOut="window.status=''; return true;"></a> 
                      </td>
                      <td noWrap align=right height="50" valign="bottom" width="12%"><font face="Arial, Helvetica, sans-serif" size="2"> 
                        <input name="moveto" type="image" src="/img/btn_mvfolderaddr.gif" width="88" height="30" border="0">
                        </font> </td>
                      <td noWrap align=left valign="middle" width="21%"><span class="akalink"></span> 
                        <table width="162" border="0">
                          <tr valign="top"> 
                            
                        <td width="156" height="28" valign="middle" align="left"> 
                          <span class="akalink"><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000088"> 
                          <select  name="movegroup" class="dropdowns">
                                <? print($mail->mail_book_group_view); ?> 
                              </select>
                          </font></span> </td>
                          </tr>
                        </table></td>
                    </tr>
                  </tbody>
                </table>
                <table width="95" border="0" cellspacing="0" cellpadding="0">
                  <tr class="akalink"> 
                    <td width="95" height="21" valign="middle">&nbsp; </td>
                  </tr>
                </table></td>
            </tr>
          </table></td>
      </tr>
    </tbody>
  </table>
  <? include($mail->tpl['html'] . '/footer.html'); ?>
</form>
<script language="JavaScript">
frm = document.email;
</script>
</body>
</html>