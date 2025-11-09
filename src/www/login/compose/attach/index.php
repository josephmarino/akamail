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
session_start();
$mail = new Mail();

$mail->MailPageNoCache();
$mail->MailLoginInit();
$mail->MailOptionList();
$mail->MailLoginExpire();
$mail->MailLimitList();
set_time_limit($mail->limit['page_wait_sec']);

$_SESSION['referer'] = '/login/compose';

if( $mail->MailPostIs('viewfolder') ) {
	
	if( $_POST['viewfolder'] == 'create' ) {
		
		$mail->MailFolderRegister($_POST['newfolder']);
	
	} elseif( $_POST['viewfolder'] != $_SESSION['folder_cur'] ) {
	
		$mail->MailFolderRedirect($_POST['viewfolder']);
	}
}

if( !isset($_SESSION['attach']['size']) ) {

	$_SESSION['attach']['size'] = 0;
}

if( $mail->MailPostIs('fileattach') ) {

	$mail->MailComposeFileAttach($_FILES);
}

if( $mail->MailPostIs('filedetach') ) {

	$mail->MailComposeFileDetach($_POST['fid']);
}

$mail->MailComposeFileList();
$mail->MailFolderView();
?>
<? include($mail->tpl['html'] . '/header.html'); ?>
<script language="JavaScript">

function Layr(name) { 
        if (document.getElementById) { 
                return document.getElementById(name); 
        } 
        if (document.all) { 
                return document.all[name]; 
        } 
        if (document.layers) { 
                if (document.layers[name]) { 
                        return document.layers[name]; 
                } 
        } 
} 
 
function showLayer (name) { 
        layerShow = new Layr(name); 
        layerShow.style.visibility = ''; 
        layerShow.style.display = ''; 
} 
 
function hideLayer (name) { 
        layerHide = new Layr(name); 
        layerHide.style.visibility = 'hidden'; 
        layerHide.style.display = 'none'; 
} 

ie = document.all?1:0
ns4 = document.layers?1:0

function CA(r) {
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

function virus() {
	h3ll0=window.open('/info/mail/f_virus.aka','elite','toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,width=540,height=400');
}

function interactivehelp() {
	h3ll0=window.open('/info/help/','elite','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=492,height=350');
}

function progress(url,theWidth,theHeight) { 
	var theTop=(screen.height/2)-(theHeight/2); 
	var theLeft=(screen.width/2)-(theWidth/2); 
	var features='height='+theHeight+',width='+theWidth+',top='+theTop+',left='+theLeft+",scrollbars=no"; 
	theWin=window.open(url,'',features); } 

function closeall(){
opener.location.reload();
}


function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);


function checkfiles() {
	if (document.attach.file1.value == "" && document.attach.file2.value == "" && document.attach.file3.value == "" && document.attach.file4.value == "" && document.attach.file5.value == "") {
		alert("Please select a file to upload/attach to your e-mail.");
		return false;
	} else { 
		showLayer('uploadstatus');
		return true;
}
}


</script>
<STYLE type=text/css>
@import url("/css/aka.css");
A:hover {
	COLOR: #666666
}
</STYLE>
<? include($mail->tpl['html'] . '/main_login/info_header.html');  ?>
<? include($mail->tpl['html'] . "/main_login/info_bg.html"); ?>
<body bgcolor="#FFFFFF" link="#0000cc" vlink="#0000cc" alink="#0000cc" leftmargin="0" topmargin="5" marginwidth="0" marginheight="0">
<div id="uploadstatus" style="position:absolute; left:38px; top:200px; width:500px; height:169px; z-index:1; visibility: hidden; display: none;"> 
  <table width="500" border="0" cellpadding="0" cellspacing="0" bgcolor="#000000">
    <tr> 
      <td width="500" height="28" align="left" valign="top"><iframe width="502" height="165" name="uploadstatus" src="/login/compose/attach/progress/" align="left" frameborder="0" scrolling="no"></iframe></td>
    </tr>
  </table>
  <table width="500" border="0" cellpadding="0" cellspacing="0" background="/img/sff/sff_bg_btm.gif" bgcolor="#F3F3F3">
    <tr> 
      <td width="500" height="28" valign="top">&nbsp;</td>
    </tr>
  </table>
</div>
<table width="554" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="5%" height="454">&nbsp;</td>
    <td width="95%" align="left" valign="bottom"> 
      <form action="" method="post" enctype="multipart/form-data" name="attach" id="attach">
        <table width="99%" border="0">
          <tr> 
            <td width="69%" class="akalink"> Click <strong><font color="#000000">&quot;Browse&quot;</font></strong> 
              to attach a file to your outgoing e-mail. <br>
              Total attachments should not exceed: <? print($mail->mail_limit_list['file_size'] / 1024 / 1024); ?> 
              MB.</td>
            <td width="31%" class="akalink"><a href="javascript:virus();"><img src="/img/mc_viri_logo.gif" width="120" height="30" border="0" onMouseOver="window.status=' '; return true;" onMouseOut="window.status=''; return true;"></a></td>
          </tr>
        </table>
        <table width="501" border="0" cellpadding="0" cellspacing="0">
          <tr> 
            <td width="543" height="29" valign="middle" class="akalink"><table width="429" border="0" cellspacing="0" cellpadding="0">
                <tr> 
                  <td width="429" class="akalink"><strong><font color="#FF0000"> 
                    <? print($mail->mail_compose_file_virus_warning); ?> 
                    <? $mail->MailErrorPrint(); ?>
                    </font></strong></td>
                </tr>
              </table></td>
          </tr>
        </table>
        <table width="81%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="65%" align="left" valign="top"> <table cellspacing=0 cellpadding=0 width="500" border=0>
                <tbody>
                  <tr> 
                    <td align="left" valign="top" bgcolor=#dcdcdc> <table width="500" cellpadding="2" cellspacing="1">
                        <tr bgcolor="#FFFFFF" class="akalink"> 
                          <td width="23"> <input name="allbox" type="checkbox" <? if($mail->mail_compose_file_size == 0) print('disabled'); ?> onClick="CA(this.checked);" value="1"> 
                          </td>
                          <td width="14"> <div align="center"></div></td>
                          <td width="359"><b><b><font color="#000000">Total Files 
                            Attached: <? print($mail->mail_compose_file_total); ?> 
                            (<strong> <? print($mail->mail_compose_file_size); ?> 
                            </strong>)</font></b> </b></td>
                          <td width="81"><b><font color="#000000">File Size</font> 
                            </b></td>
                        </tr>
                        <? print($mail->mail_compose_file_list); ?> 
                      </table>
                      <? print($mail->mail_compose_nofile_list); ?> </td>
                  </tr>
                </tbody>
              </table></td>
            <td width="35%"> <div align="right"></div></td>
          </tr>
        </table>
        <table width="55%" border="0" cellpadding="0" cellspacing="0">
          <tr> 
            <td height="18" valign="bottom" class="akalink"><a href="javascript:CA(true);" onMouseOver="window.status='Select all e-mails'; return true;" onMouseOut="window.status=''; return true;">Select 
              All</a> - <a href="javascript:CA(false);" onMouseOver="window.status='Deselect all e-mails'; return true;" onMouseOut="window.status=''; return true;">Deselect 
              All</a></td>
          </tr>
        </table>
        <table width="55%" border="0">
          <tr> 
            <td height="30" valign="bottom" class="akalink"><strong><font color="#000000">Upload 
              File(s)</font><font face="Arial, Helvetica, sans-serif" size="2"> 
              </font></strong></td>
          </tr>
          <tr> 
            <td width="88%" align="left" valign="top"><table width="396" border="0">
                <tr> 
                  <td width="89%" height="24" align="left" valign="top" class="akalink">Select 
                    A File From Your Computer: 
                    <input name="file1" type="file" class="textfields" id="file[]4" size="40"></td>
                </tr>
              </table>
              <table width="396" border="0">
                <tr> 
                  <td width="89%" height="24" align="left" valign="top" class="akalink">Select 
                    A File From Your Computer: 
                    <input name="file2" type="file" class="textfields" id="file[]10" size="40"></td>
                </tr>
              </table>
              <table width="396" border="0">
                <tr> 
                  <td width="89%" height="24" align="left" valign="top" class="akalink">Select 
                    A File From Your Computer: 
                    <input name="file3" type="file" class="textfields" id="file[]11" size="40"></td>
                </tr>
              </table>
              <table width="396" border="0">
                <tr> 
                  <td width="89%" height="24" align="left" valign="top" class="akalink">Select 
                    A File From Your Computer: 
                    <input name="file4" type="file" class="textfields" id="file[]12" size="40"></td>
                </tr>
              </table>
              <table width="396" border="0">
                <tr> 
                  <td width="89%" height="24" align="left" valign="top" class="akalink">Select 
                    A File From Your Computer: 
                    <input name="file5" type="file" class="textfields" id="file[]13" size="40"></td>
                </tr>
              </table></td>
          </tr>
        </table>
        <table width="90%" border="0">
          <tr> 
            <td><input name="fileattach" type="image" id="attach" src="/img/btn_uploadfiles_attach.jpg" width="121" height="28" border="0" onClick="return checkfiles();">
              <input name="filedetach" type="image" id="deletefiles" src="/img/btn_delete_files.gif" width="82" height="28" border="0">
            <a href="javascript:window.close();closeall();"><img src="/img/BTN_attach.gif" width="118" height="28" border="0"></a></td>
          </tr>
        </table>
      </form></td>
  </tr>
</table>
<script language="JavaScript">
frm = document.attach;
</script>
</body>
</html>