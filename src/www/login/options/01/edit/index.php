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

$mail->MailPageForceSSL();
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

	if( $mail->MailPostIs('update') ) {
		
		switch($_POST['personal_country']) {
		
			case 'US':
			
				$_POST['contact']['country']	= $_POST['personal_country'];
				$_POST['contact']['state']	= $_POST['personal_state'];
				$_POST['contact']['city']	= $_POST['personal_city'];
				$_POST['contact']['address']	= $_POST['personal_address'];
				$_POST['contact']['zip']	= $_POST['personal_zip'];
				break;
			
			case 'CA':
			
				$_POST['contact']['country']	= $_POST['personal_country'];
				$_POST['contact']['state'] 	= $_POST['canada_personal_state'];
				$_POST['contact']['city'] 	= $_POST['canada_personal_city'];
				$_POST['contact']['address'] 	= $_POST['canada_personal_address'];
				$_POST['contact']['zip'] 	= $_POST['canada_personal_zip'];
				break;
				
			default:
				
				$_POST['contact']['country']	= $_POST['personal_country'];
				$_POST['contact']['state'] 	= $_POST['outside_personal_state'];
				$_POST['contact']['city']	= $_POST['outside_personal_city'];
				$_POST['contact']['address']	= $_POST['outside_personal_address'];
				$_POST['contact']['zip']	= $_POST['outside_personal_zip'];
				break;
		}
		
		$_POST['contact']['bdate'] = $_POST['contact']['bdyear'] . '-' .  $_POST['contact']['bdmonth'] . '-' . $_POST['contact']['bdday'];  
	 	
		if( $mail->MailContactFormat($_POST['contact']) ) {
					
			$mail->MailContactUpdate($_POST['contact']);
		}
	}

$mail->MailFolderView();
$mail->MailContactList();

if( empty($_POST) ) {

	$_POST['contact'] = $mail->mail_contact_list;
}
?>
<? include($mail->tpl['html'] . '/header.html'); ?>
<script language="JavaScript" type="text/JavaScript">

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i>a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function interactivehelp() {
	h3ll0=window.open('/info/help/','elite','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=492,height=350');
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

</script>
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

function showUSA (f) {
hideLayer('canadapersonal');
hideLayer('outsidepersonal');
showLayer('usapersonal');
document.email.outside_personal_address.value = "";
document.email.outside_personal_city.value ="";
document.email.outside_personal_zip.value = "";
document.email.canada_personal_address.value = "";
document.email.canada_personal_city.value ="";
document.email.canada_personal_zip.value = "";
}

function showCANADA (f) {
hideLayer('usapersonal');
hideLayer('outsidepersonal');
showLayer('canadapersonal');
document.email.personal_address.value = "";
document.email.personal_city.value ="";
document.email.personal_zip.value = "";
document.email.outside_personal_address.value = "";
document.email.outside_personal_city.value ="";
document.email.outside_personal_zip.value = "";
}

function showOUTSIDE(f) {
hideLayer('usapersonal');
hideLayer('canadapersonal');
showLayer('outsidepersonal');
document.email.personal_address.value = "";
document.email.personal_city.value ="";
document.email.personal_zip.value = "";
document.email.canada_personal_address.value = "";
document.email.canada_personal_city.value ="";
document.email.canada_personal_zip.value = "";
}

function centerwindow(url,theWidth,theHeight) {  
 var theTop=(screen.height/2)-(theHeight/2);  
 var theLeft=(screen.width/2)-(theWidth/2);  
 var features='height='+theHeight+',width='+theWidth+',top='+theTop+',left='+theLeft+",scrollbars=no";  
 theWin=window.open(url,'',features); 
}  

</script>
 
<STYLE type=text/css>
@import url("/css/aka.css");
@import url("aka.css");

A:hover {
	COLOR: #666666
}
</STYLE>
<? if( $_POST['contact']['country'] == 'CA' ) {
	
	print('<body bgcolor="#FFFFFF" leftmargin="0" topmargin="20" marginwidth="0" marginheight="0" link="#0000cc" vlink="#0000cc" alink="#0000cc" onLoad="showCANADA(this.form)">');
   
   } elseif( $_POST['contact']['country'] == 'US' ) {
   	
	print('<body bgcolor="#FFFFFF" leftmargin="0" topmargin="20" marginwidth="0" marginheight="0" link="#0000cc" vlink="#0000cc" alink="#0000cc" onLoad="showUSA(this.form)">');
	
   } elseif( $_POST['contact']['country'] )  {
   	
	print('<body bgcolor="#FFFFFF" leftmargin="0" topmargin="20" marginwidth="0" marginheight="0" link="#0000cc" vlink="#0000cc" alink="#0000cc" onLoad="showOUTSIDE(this.form)">');
   }
?>
<form method="post" action="" name="email">
<input type=hidden name="newfolder" value="">
  <table cellspacing=0 cellpadding=0 width=800 border=0 align="center">
    <tbody> 
    <tr align=left valign="top"> 
      <td style="BORDER-RIGHT: #A3A3A3 1px solid; BORDER-TOP: #A3A3A3 1px solid; BORDER-LEFT: #A3A3A3 1px solid; BORDER-BOTTOM: #A3A3A3 1px solid"> 
        <table width="800" border="0" cellspacing="0" cellpadding="0" height="28">
          <tr align="left" valign="bottom"> 
            <td height="47" width="11" valign="middle"> </td>
            <td height="47" width="595" valign="middle"> <a href="http://<? print($mail->server['main']); ?>"><img src="/img/top_logo_left.gif" width="388" height="48" border="0"></a></td>
              <td height="47" width="194" valign="top" align="left"> <? print($mail->mail_folder_view_top); ?></td>
          </tr>
        </table>
        <table width="800" border="0" cellspacing="0" cellpadding="0" height="12">
          <tr> 
            <td height="2"> 
              <table width="800" border="0" cellspacing="0" cellpadding="0" height="12">
                <tr> 
                  <td height="2"> 
                    <table width="800" border="0" cellspacing="0" cellpadding="0">
                      <tr> 
                        <td width="365"><img src="/img/1_dv.gif" width="365" height="31"></td>
                        <td width="80"><a href="http://<? print($mail->server['main']); ?>/login/inbox/" onMouseOver="window.status='View your inbox for new e-mail'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/5_in.gif" width="79" height="31" border="0"></a></td>
                        <td width="76"><a href="http://<? print($mail->server['main']); ?>/login/sent/" onMouseOver="window.status='View your sent e-mail folder'; return true;"><img src="/img/1_sent.gif" width="76" height="31" border="0"></a></td>
                        <td width="118"><a href="http://<? print($mail->server['main']); ?>/login/deleted/" onMouseOver="window.status='View all deleted e-mail'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/1_del.gif" width="118" height="31" border="0"></a></td>
                        <td width="62"><a href="http://<? print($mail->server['main']); ?>/login/options/" onMouseOver="window.status='Edit your account settings'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/1_opt.gif" width="93" height="31" border="0"></a></td>
                        <td width="99"><a href="http://<? print($mail->server['main']); ?>/login/drafts/" onMouseOver="window.status='View your drafted e-mail folder'; return true;" onMouseOut="window.status=''; return true;"><img src="/img/1_drafts.gif" width="69" height="31" border="0"></a></td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        <? include($mail->tpl['html'] . '/toolbar.html'); ?>
        <table width="800" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="29">&nbsp;</td>
            <td width="761" align="left" valign="top"> 
              <table width="770" border="0" cellspacing="0" cellpadding="0">
                  <tr> 
                    <td height="2" colspan="3">&nbsp;</td>
                  </tr>
                  <tr> 
                    <td width="35"><font face="Arial, Helvetica, sans-serif" size="3">&nbsp;</font></td>
                    <td width="557"><font face="Arial, Helvetica, sans-serif" size="3"><b>Edit 
                      Personal Information: 
                      <? $mail->MailContactNamePrint(); ?>
                      </b></font></td>
                    <td width="178"><a href="javascript:centerwindow('http://www.akalink.com/policy/secure_transaction.aka',620,400)"",620,400)" onMouseOver="window.status=' '; return true;" onMouseOut="window.status=''; return true;"><img src="/img/secure_trans_store.gif" width="150" height="19" border="0"></a></td>
                  </tr>
                  <tr> 
                    <td>&nbsp;</td>
                    <td colspan="2" class="akalink"><strong><font color="#FF0000"> 
                      <? $mail->MailErrorPrint(); ?> </font></strong></td>
                  </tr>
                </table>
              <table width="678" border="0">
                <tr> 
                  <td width="29" height="336">&nbsp;</td>
                  <td width="639" height="336" align="left" valign="top">
                    <table width="71%" border="0" cellpadding="0" cellspacing="0">
                      <tr> 
                        <td width="30%" valign="bottom" align="left"><a href="/login/options/01/"><img src="/img/tp_lprn3.jpg" width="160" height="26" border="0"></a></td>
                        <td width="40%" valign="bottom" align="left"><a href="/login/options/01/edit/"><img src="/img/tp_lprn4.jpg" width="220" height="24" border="0"></a></td>
                        <td width="30%" valign="bottom" align="left">&nbsp;</td>
                      </tr>
                      <tr> 
                        <td colspan="5">
                          <table cellspacing=0 cellpadding=0 width="534" border=0>
                            <tbody> 
                            <tr> 
                              <td width="534" align="left" valign="top" bgcolor=#B8B7B7 class="akalink"> 
                                <table width="100%" cellpadding="2" cellspacing="1">
                                  <tr bgcolor="#ebebe3" class="akalink"> 
                                    <td width="537" align="left" valign="top" bgcolor="#FFFFFF"> 
                                      <table width="528" border="0">
                                        <tr> 
                                          <td width="5">&nbsp;</td>
                                          <td width="513" align="left" valign="top"> 
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr> 
                                                <td height="39" align="left" valign="top" width="59%"> 
                                                  <table width="309" border="0">
                                                    <tr class="akalink"> 
                                                      <td width="130">First Name: 
                                                        *<font face="Arial, Helvetica, sans-serif" size="2"> 
                                                        <? $mail->MailErrorXmarkPrint($mail->mail_contact_img_error['fname']); ?>
                           				
                                                        </font></td>
                                                      <td width="34">MI: 
                                                     <? $mail->MailErrorXmarkPrint($mail->mail_contact_img_error['mname']); ?>
                                                      </td>
                                                      <td width="131">Last Name: 
                                                        *<font face="Arial, Helvetica, sans-serif" size="2"> 
                                                       	<? $mail->MailErrorXmarkPrint($mail->mail_contact_img_error['lname']); ?>
                                                        </font></td>
                                                    </tr>
                                                    <tr class="akalink"> 
                                                      <td width="130"><font face="Arial, Helvetica, sans-serif" size="2"> 
                                                        <input  name="contact[fname]" value="<? print($_POST['contact']['fname']); ?>" type="text" class="textfields" id="contact[fname]" size="20" maxlength="20">
                                                        </font></td>
                                                      <td width="34"> 
                                                        <input name="contact[mname]" value="<? print($_POST['contact']['mname']); ?>" type="text" class="textfields" id="middleinitial2" size="4" maxlength="2">
                                                      </td>
                                                      <td width="131"><font face="Arial, Helvetica, sans-serif" size="2"> 
                                                        <input  name="contact[lname]" value="<? print($_POST['contact']['lname']); ?>" type="text" class="textfields" id="contact[lname]" size="20" maxlength="20">
                                                        </font></td>
                                                    </tr>
                                                  </table>
                                                </td>
                                                <td height="39" align="left" valign="top" width="41%">
                                                  <div align="center">
                                                        <table width="96%" border="0" cellpadding="0" cellspacing="0">
                                                          <tr> 
                                                            <td height="19" align="center" valign="bottom" class="akalink">* 
                                                              indicates required 
                                                              information </td>
                                                          </tr>
                                                        </table>
                                                      </div>
                                                </td>
                                              </tr>
                                            </table>
                                            <table width="376" border="0">
                                              <tr class="akalink"> 
                                                <td width="368">Company Name: 
                                                  <font face="Arial, Helvetica, sans-serif" size="2"> 
                                                  <? $mail->MailErrorXmarkPrint($mail->mail_contact_img_error['bizname']); ?>
                                                  </font></td>
                                              </tr>
                                              <tr class="akalink"> 
                                                <td><font face="Arial, Helvetica, sans-serif" size="2"> 
                                                  <input  name="contact[bizname]"  value="<? print($_POST['contact']['bizname']); ?>" type="text" class="textfields" id="contact[company]" size="30" maxlength="60">
                                                  </font></td>
                                              </tr>
                                            </table>
                                            <table width="376" border="0">
                                              <tr class="akalink"> 
                                                <td width="370">Country: * <font face="Arial, Helvetica, sans-serif" size="2"> 
                          			  <? $mail->MailErrorXmarkPrint($mail->mail_contact_img_error['country']); ?>	
                                                  </font></td>
                                              </tr>
                                              <tr class="akalink"> 
                                                <td><font face="Arial, Helvetica, sans-serif" size="2"> 
                                                  <select  name="personal_country"  size="1" class="dropdowns" id="personal_country" onChange="if (this.selectedIndex == 0) { showUSA(this.form); } ; if (this.selectedIndex == 1) { showCANADA(this.form); } ; if (this.selectedIndex > 1) { showOUTSIDE(this.form);  }">
                                                    <?
                                                   	$mail->MailContactCountryPrint($_POST['contact']['country']);
                                                  	print($mail->mail_contact_country_list);
                                                   ?>
                                                   
                                                  </select>
                                                  </font></td>
                                              </tr>
                                            </table>
                                            <div id="usapersonal" style="visibility: visible; display:"> 
                                              <table width="473" border="0">
                                                <tr class="akalink"> 
                                                  <td width="467">Address: * <font face="Arial, Helvetica, sans-serif" size="2"> 
                                                    <? $mail->MailErrorXmarkPrint($mail->mail_contact_img_error['address']); ?>
                                                    </font><font face="Arial, Helvetica, sans-serif" size="2">&nbsp; 
                                                    </font></td>
                                                </tr>
                                                <tr class="akalink"> 
                                                  <td width="467"><font face="Arial, Helvetica, sans-serif" size="2"> 
                                                    <input  name="personal_address" value="<? print($_POST['contact']['address']); ?>" type="text" class="textfields" id="personal_address" size="30" maxlength="30">
                                                    </font></td>
                                                </tr>
                                              </table>
                                              <table width="473" border="0">
                                                <tr class="akalink"> 
                                                  <td width="194" align="left">City: 
                                                    *<font face="Arial, Helvetica, sans-serif" size="2"> 
                                                    <? $mail->MailErrorXmarkPrint($mail->mail_contact_img_error['city']); ?>
                                                    </font></td>
                                                  <td width="118">State: * <font face="Arial, Helvetica, sans-serif" size="2"> 
                                                   <? $mail->MailErrorXmarkPrint($mail->mail_contact_img_error['state']); ?>
                                                    </font></td>
                                                  <td width="147" align="left">Zip: 
                                                    *<font face="Arial, Helvetica, sans-serif" size="2"> 
                                                    <? $mail->MailErrorXmarkPrint($mail->mail_contact_img_error['zip']); ?>
                                                    </font></td>
                                                </tr>
                                                <tr class="akalink"> 
                                                  <td align="left" valign="top" width="194"><font face="Arial, Helvetica, sans-serif" size="2"> 
                                                    <input  name="personal_city" value="<? print($_POST['contact']['city']); ?>" type="text" class="textfields" id="personal_city" size="31" maxlength="20">
                                                    </font></td>
                                                  <td width="118"> 
                                                    <select name="personal_state" class="dropdowns" id="personal_state">
                                                      <?
                                                    	
                                                    	if( $_POST['contact']['country'] == 'US' ) {
                                                    	
                                                    		print('<option selected value="' . $_POST['contact']['state'] . '">' . $mail->MailContactStatePrint($_POST['contact']['state']) . '</option>');
                                                    	}
                                                       
                                                       ?>
                                                      <option value="AL">Alabama</option>
                                                      <option value="AK">Alaska</option>
                                                      <option value="AZ">Arizona</option>
                                                      <option value="AR">Arkansas</option>
                                                      <option value="CA">California</option>
                                                      <option value="CO">Colorado</option>
                                                      <option value="CT">Connecticut</option>
                                                      <option value="DE">Delaware</option>
                                                      <option value="DC">Washington 
                                                      D.C.</option>
                                                      <option value="FL">Florida</option>
                                                      <option value="GA">Georgia</option>
                                                      <option value="HI">Hawaii</option>
                                                      <option value="ID">Idaho</option>
                                                      <option value="IL">Illinois</option>
                                                      <option value="IN">Indiana</option>
                                                      <option value="IA">Iowa</option>
                                                      <option value="KS">Kansas</option>
                                                      <option value="KY">Kentucky</option>
                                                      <option value="LA">Louisiana</option>
                                                      <option value="ME">Maine</option>
                                                      <option value="MD">Maryland</option>
                                                      <option value="MA">Massachusetts</option>
                                                      <option value="MI">Michigan</option>
                                                      <option value="MN">Minnesota</option>
                                                      <option value="MS">Mississippi</option>
                                                      <option value="MO">Missouri</option>
                                                      <option value="MT">Montana</option>
                                                      <option value="NE">Nebraska</option>
                                                      <option value="NV">Nevada</option>
                                                      <option value="NH">New Hampshire</option>
                                                      <option value="NJ">New Jersey</option>
                                                      <option value="NM">New Mexico</option>
                                                      <option value="NY">New York</option>
                                                      <option value="NC">North 
                                                      Carolina</option>
                                                      <option value="ND">North 
                                                      Dakota</option>
                                                      <option value="OH">Ohio</option>
                                                      <option value="OK">Oklahoma</option>
                                                      <option value="OR">Oregon</option>
                                                      <option value="PA">Pennsylvania</option>
                                                      <option value="RI">Rhode 
                                                      Island</option>
                                                      <option value="SC">South 
                                                      Carolina</option>
                                                      <option value="SD">South 
                                                      Dakota</option>
                                                      <option value="TN">Tennessee</option>
                                                      <option value="TX">Texas</option>
                                                      <option value="UT">Utah</option>
                                                      <option value="VT">Vermont</option>
                                                      <option value="VA">Virginia</option>
                                                      <option value="WA">Washington</option>
                                                      <option value="WV">West 
                                                      Virginia</option>
                                                      <option value="WI">Wisconsin</option>
                                                      <option value="WY">Wyoming</option>
                                                    </select>
                                                  </td>
                                                  <td align="left" valign="top" width="147"><font face="Arial, Helvetica, sans-serif" size="2"> 
                                                    <input  name="personal_zip" value="<? print($_POST['contact']['zip']); ?>" type="text" class="textfields" id="personal_zip" size="10" maxlength="15">
                                                    </font></td>
                                                </tr>
                                              </table>
                                            </div>
                                            <div id="canadapersonal" style="visibility: hidden; display: none;"> 
                                              <table width="472" border="0">
                                                <tr class="akalink"> 
                                                  <td width="466">Address: * <font face="Arial, Helvetica, sans-serif" size="2"> 
                                                    <? $mail->MailErrorXmarkPrint($mail->mail_contact_img_error['address']); ?>
                                                    </font><font face="Arial, Helvetica, sans-serif" size="2">&nbsp; 
                                                    </font></td>
                                                </tr>
                                                <tr class="akalink"> 
                                                  <td width="466"><font face="Arial, Helvetica, sans-serif" size="2"> 
                                                    <input  name="canada_personal_address" value="<? print($_POST['contact']['address']); ?>" type="text" class="textfields" id="canada_personal_address" size="35" maxlength="30">
                                                    </font></td>
                                                </tr>
                                              </table>
                                              <table width="472" border="0">
                                                <tr class="akalink"> 
                                                  <td width="192" align="left">City: 
                                                    *<font face="Arial, Helvetica, sans-serif" size="2"> 
                                                   <? $mail->MailErrorXmarkPrint($mail->mail_contact_img_error['city']); ?>
                                                    </font></td>
                                                  <td width="138" align="left">Province: 
                                                    * <font face="Arial, Helvetica, sans-serif" size="2"> 
                                                    <? $mail->MailErrorXmarkPrint($mail->mail_contact_img_error['state']); ?>
                                                    </font></td>
                                                  <td width="128" align="left">Postal 
                                                    Code: *<font face="Arial, Helvetica, sans-serif" size="2"> 
                                                    <? $mail->MailErrorXmarkPrint($mail->mail_contact_img_error['zip']); ?>
                                                    </font></td>
                                                </tr>
                                                <tr class="akalink"> 
                                                  <td align="left" valign="top" width="192"><font face="Arial, Helvetica, sans-serif" size="2"> 
                                                    <input  name="canada_personal_city" value="<? print($_POST['contact']['city']); ?>" type="text" class="textfields" id="canada_personal_city" size="31" maxlength="20">
                                                    </font></td>
                                                  <td align="left" valign="top" width="138"> 
                                                    <select name="canada_personal_state" class="dropdowns" id="canada_personal_state">
                                                      <?
                                                    	if( $_POST['contact']['country'] == 'CA' ) {
                                                    	
                                                    		print('<option  value="' . $_POST['contact']['state'] . '">' . $mail->MailContactProvincePrint($_POST['contact']['state']) . '</option>');
                                                    	}
                                                    ?>
                                                      <option value="AB">Alberta</option>
                                                      <option value="BC">British 
                                                      Columbia</option>
                                                      <option value="MB">Manitoba</option>
                                                      <option value="NF">Newfoundland</option>
                                                      <option value="NB">New Brunswick</option>
                                                      <option value="NT">Northwest 
                                                      Territories</option>
                                                      <option value="NS">Nova 
                                                      Scotia</option>
                                                      <option value="NU">Nunavut</option>
                                                      <option value="ON">Ontario</option>
                                                      <option value="PE">Prince 
                                                      Edward Island</option>
                                                      <option value="QC">Quebec</option>
                                                      <option value="SK">Saskatchewan</option>
                                                      <option value="YT">Yukon</option>
                                                    </select>
                                                  </td>
                                                  <td align="left" valign="top" width="128"><font face="Arial, Helvetica, sans-serif" size="2"> 
                                                    <input  name="canada_personal_zip" value="<? print($_POST['contact']['zip']); ?>" type="text" class="textfields" id="canada_personal_zip" size="12" maxlength="15">
                                                    </font></td>
                                                </tr>
                                              </table>
                                            </div>
                                            <div id="outsidepersonal" style="visibility: hidden; display: none;"> 
                                              <table width="475" border="0">
                                                <tr class="akalink"> 
                                                  <td width="469">Address: * <font face="Arial, Helvetica, sans-serif" size="2"> 
                                                   <? $mail->MailErrorXmarkPrint($mail->mail_contact_img_error['address']); ?>
                                                    </font><font face="Arial, Helvetica, sans-serif" size="2">&nbsp; 
                                                    </font></td>
                                                </tr>
                                                <tr class="akalink"> 
                                                  <td width="469"><font face="Arial, Helvetica, sans-serif" size="2"> 
                                                    <input  name="outside_personal_address" value="<? print($_POST['contact']['address']); ?>" type="text" class="textfields" id="outside_personal_address" size="35" maxlength="30">
                                                    </font></td>
                                                </tr>
                                              </table>
                                              <table width="475" border="0">
                                                <tr class="akalink"> 
                                                  <td width="165" align="left">City: 
                                                    *<font face="Arial, Helvetica, sans-serif" size="2"> 
                                                    <? $mail->MailErrorXmarkPrint($mail->mail_contact_img_error['city']); ?>
                                                    </font></td>
                                                  <td width="162" align="left">Province: <? $mail->MailErrorXmarkPrint($mail->mail_contact_img_error['state']); ?></td>
                                                  <td width="134" align="left">Postal 
                                                    Code: <font face="Arial, Helvetica, sans-serif" size="2">&nbsp; 
                                                    </font><? $mail->MailErrorXmarkPrint($mail->mail_contact_img_error['zip']); ?></td>
                                                </tr>
                                                <tr class="akalink"> 
                                                  <td align="left" valign="top" width="165"><font face="Arial, Helvetica, sans-serif" size="2"> 
                                                    <input  name="outside_personal_city" value="<? print($_POST['contact']['city']); ?>" type="text" class="textfields" id="outside_personal_city" size="31" maxlength="20">
                                                    </font></td>
                                                  <td align="left" valign="top" width="162"> 
                                                    <select name="outside_personal_state" class="dropdowns" id="outside_personal_state">
                                                      <option value="UC">Outside 
                                                      of U.S or Canada</option>
                                                    </select>
                                                  </td>
                                                  <td align="left" valign="top" width="134"><font face="Arial, Helvetica, sans-serif" size="2"> 
                                                    <input name="outside_personal_zip"  value="<? print($_POST['contact']['zip']); ?>" type="text" class="textfields" id="outside_personal_zip" size="10" maxlength="15">
                                                    </font></td>
                                                </tr>
                                              </table>
                                            </div>
                                            <table width="416" border="0">
                                              <tr class="akalink"> 
                                                <td width="197" align="left">Day 
                                                  Time Telephone: *<font face="Arial, Helvetica, sans-serif" size="2"> 
                                                  <span class="akalink"><font face="Arial, Helvetica, sans-serif" size="2"> 
                                                 <? $mail->MailErrorXmarkPrint($mail->mail_contact_img_error['dtel']); ?>
                                                  </font></span> </font></td>
                                                <td width="14" align="left">&nbsp;</td>
                                                <td width="191" align="left">Evening 
                                                  Telephone:<font face="Arial, Helvetica, sans-serif" size="2"> 
                                                  <span class="akalink"><font face="Arial, Helvetica, sans-serif" size="2"> 
                                                  <? $mail->MailErrorXmarkPrint($mail->mail_contact_img_error['etel']); ?>
                                                  </font></span> </font></td>
                                              </tr>
                                              <tr class="akalink"> 
                                                <td align="left" valign="top"><font face="Arial, Helvetica, sans-serif" size="2"> 
                                                  <input  name="contact[dtel]" value="<? print($_POST['contact']['dtel']); ?>" type="text" class="textfields" id="personal_dayphone2" size="10"  maxlength="20">
                                                  - 
                                                  <input  name="contact[dtelext]" value="<? print($_POST['contact']['dtelext']); ?>" type="text" class="textfields" id="contact[dtelext]" size="5" maxlength="5">
                                                  </font> (Ext)<font face="Arial, Helvetica, sans-serif" size="2">&nbsp; 
                                                  </font></td>
                                                <td align="left" valign="top">&nbsp;</td>
                                                <td align="left" valign="top"><font face="Arial, Helvetica, sans-serif" size="2"> 
                                                  <input  name="contact[etel]" value="<? print($_POST['contact']['etel']); ?>" type="text" class="textfields" id="contact[etel]" size="10" maxlength="20">
                                                  - 
                                                  <input  name="contact[etelext]" value="<? print($_POST['contact']['etelext']); ?>" type="text" class="textfields" id="contact[etelext]" size="5" maxlength="5">
                                                  </font>(Ext)<font face="Arial, Helvetica, sans-serif" size="2">&nbsp; 
                                                  </font></td>
                                              </tr>
                                            </table>
                                                <table width="99%" border="0" cellspacing="0" cellpadding="0">
                                              <tr> 
                                                <td height="12" align="left" valign="middle"><img src="/img/prod_line_horizontal.jpg" width="500" height="3"> 
                                                </td>
                                              </tr>
                                            </table>
                                            <table width="94%" border="0">
                                              <tr> 
                                                <td height="22" valign="top"><img src="/img/ed_accountsecurity.jpg" width="181" height="15"></td>
                                              </tr>
                                              <tr> 
                                                <td height="10" valign="bottom" class="akalink">The 
                                                  information below is needed 
                                                  so that we can verify who you 
                                                  are, when you contact us regarding 
                                                  your account. Please remeber 
                                                  that <font color="#000000"> 
                                                  <strong>all of your account 
                                                  information is kept strictly 
                                                  confidential</strong></font> 
                                                  and is protected by our <a href="http://www.akalink.com/helpdesk/policies/03.aka" target="_blank">Privacy 
                                                  Policy</a>.</td>
                                              </tr>
                                              <tr> 
                                                <td align="left" valign="top">
                                                  <table width="408" border="0">
                                                    <tr class="akalink"> 
                                                      <td width="174">Mothers 
                                                        Maiden Name:* 
                                                       <? $mail->MailErrorXmarkPrint($mail->mail_contact_img_error['maiden']); ?>
                                                      </td>
                                                    </tr>
                                                    <tr class="akalink"> 
                                                      <td width="174"> 
                                                        <input  name="contact[maiden]" value="<? print($_POST['contact']['maiden']); ?>" type="password" class="textfields" size="25" maxlength="20">
                                                      </td>
                                                    </tr>
                                                  </table>
                                                  <table width="408" border="0">
                                                    <tr class="akalink"> 
                                                      <td width="174">Birth Date 
                                                        :* 
                                                   <? $mail->MailErrorXmarkPrint($mail->mail_contact_img_error['bdate']); ?>
                                                      </td>
                                                    </tr>
                                                    <tr class="akalink"> 
                                                      <td width="174"> 
                                                        <select name="contact[bdmonth]" class="dropdowns" id="month">
                                                         
                                                         <? if( $_POST['contact']['bdate'] != 0 ) {
                                                          		
                                 					list($year,$month,$day) = explode('-',$_POST['contact']['bdate']);
                                 					if( $month[0] == 0 ) $month = $month[1];
                                                          		print('<option value="' . $month. '">' . date('M',mktime(0,0,0,$month,1,2000)) . ' (' . $month . ')</option>'); 
                                                              }
                                                          ?>
                                                          <option value="1">Jan 
                                                          (01)</option>
                                                          <option value="2">Feb 
                                                          (02)</option>
                                                          <option value="3">Mar 
                                                          (03)</option>
                                                          <option value="4">Apr 
                                                          (04)</option>
                                                          <option value="5">May 
                                                          (05)</option>
                                                          <option value="6">Jun 
                                                          (06)</option>
                                                          <option value="7">Jul 
                                                          (07)</option>
                                                          <option value="8">Aug 
                                                          (08)</option>
                                                          <option value="9">Sep 
                                                          (09)</option>
                                                          <option value="10">Oct 
                                                          (10)</option>
                                                          <option value="11">Nov 
                                                          (11)</option>
                                                          <option value="12">Dec 
                                                          (12)</option>
                                                        </select>
                                                        <select name="contact[bdday]" class="dropdowns" id="day">
                                                          <? if( $_POST['contact']['bdate'] != 0 ) {
                                                          		
                                                          		list($year,$month,$day) = explode('-',$_POST['contact']['bdate']);
                                                          		if( $day[0] == 0 ) $day = $day[1];
                                                          		print('<option value="' . $day . '">' . $day . '</option>'); 
                                                              }
                                                          ?>
                                                           
                                                          <option value="1">1</option>
                                                          <option value="2">2</option>
                                                          <option value="3">3</option>
                                                          <option value="4">4</option>
                                                          <option value="5">5</option>
                                                          <option value="6">6</option>
                                                          <option value="7">7</option>
                                                          <option value="8">8</option>
                                                          <option value="9">9</option>
                                                          <option value="10">10</option>
                                                          <option value="11">11</option>
                                                          <option value="12">12</option>
                                                          <option value="13">13</option>
                                                          <option value="14">14</option>
                                                          <option value="15">15</option>
                                                          <option value="16">16</option>
                                                          <option value="17">17</option>
                                                          <option value="18">18</option>
                                                          <option value="19">19</option>
                                                          <option value="20">20</option>
                                                          <option value="21">21</option>
                                                          <option value="22">22</option>
                                                          <option value="23">23</option>
                                                          <option value="24">24</option>
                                                          <option value="25">25</option>
                                                          <option value="26">26</option>
                                                          <option value="27">27</option>
                                                          <option value="28">28</option>
                                                          <option value="29">29</option>
                                                          <option value="30">30</option>
                                                          <option value="31">31</option>
                                                        </select>
                                                        <select name="contact[bdyear]" class="dropdowns" id="year">
                                                          
                                                          <? if( $_POST['contact']['bdate'] != 0 ) { 
                                                          		
                                                          		list($year,$month,$day) = explode('-',$_POST['contact']['bdate']);
                                                          		print('<option value="' . $year . '">' . $year . '</option>'); 
                                                             }
                                                         
                                                             for($year=date('Y')-5; $year>1900; $year--) { 
                                        	
                                        	             		print('<option value="' . $year . '">' . $year . '</option>');
                                              		     }
                                           		  ?>
                                                        </select>
                                                      </td>
                                                    </tr>
                                                  </table>
                                                </td>
                                              </tr>
                                            </table>
                                            <table width="332" border="0">
                                              <tr> 
                                                <td width="326" height="38" valign="bottom"> 
                                                  <input name="update" type="image" id="update" src="/img/web_apply.gif" width="100" height="30" border="0">
                                                  <a href="https://<? print($mail->server['main']); ?>/login/options/01/"><img src="/img/web_cancel.gif" width="100" height="30" border="0"></a> 
                                                </td>
                                              </tr>
                                            </table>
                                          </td>
                                        </tr>
                                      </table>
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                            </tbody> 
                          </table>
                        </td>
                      </tr>
                    </table>
                    <table width="200" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                    </table></td>
                </tr>
              </table>
              <p></p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    </tbody> 
  </table>
  <? include($mail->tpl['html'] . '/footer.html'); ?></form>
