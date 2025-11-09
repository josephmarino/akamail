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

if( isset($_POST['section']) ) {

	foreach($_POST[section] as $name => $id) {
	
		if( isset($_GET['cid']) ) {
			
			if( $name == 'summary') {
			
				header('Location: http://' . $mail->server['main'] . '/login/addressbook/view/?cid=' . $_GET['cid']);
				exit();
				
			} else {
				
				header('Location: http://' . $mail->server['main'] . '/login/addressbook/edit/' . $name . '/?cid=' . $_GET['cid']);
				exit();
			}
			
		} else {
			
			if( $name == 'summary') {
			
				$mail->error['result'] = $mail->errorcode['107'];
				
			} elseif( $name == 'other')  {
			
				$mail->error['result'] = $mail->errorcode['107'];
			
			} else {
			
				header('Location: http://' . $mail->server['main'] . '/login/addressbook/edit/' . $name);
				exit();
			}
		}
	}
}

if( $mail->MailPostIs('viewfolder') ) {
	
	if( $_POST['viewfolder'] == 'create' ) {
		
		$mail->MailFolderRegister($_POST['newfolder']);
	
	} elseif( $_POST['viewfolder'] != $_SESSION['folder_cur'] ) {
	
		$mail->MailFolderRedirect($_POST['viewfolder']);
	}
}

if( isset($_GET['cid']) ) {

	if( $mail->MailBookContactIs($_GET['cid']) ) {
		
		if( empty($_POST) ) {
		
			$mail->MailBookContactList($_GET['cid']);
			$_POST['business'] = $mail->mail_book_contact_list;
		}
		
	} else {
	
		$_SESSION['result'] = $mail->errorcode['104'];
		header('Location: http://' . $mail->server['main'] . '/login/addressbook');
		exit();
	}
}

if( $mail->MailPostIs('apply') ) {

	if( $mail->MailBookFormat($_POST['business']) ) {
		
		if( isset($_GET['cid']) ) {
		
			if( $mail->MailBookUpdate($_GET['cid'],$_POST['business']) ) {
			
				$_SESSION['result'] = $mail->errorcode['108'];
				header('Location: http://' . $mail->server['main'] . '/login/addressbook/view/?cid=' . $_GET['cid']);
				exit();
			}		
		
		} else {
			
			if( $mail->MailBookRegister('business',$_POST['business']) ) {
	
				$_SESSION['result'] = $mail->errorcode['109'];
				header('Location: http://' . $mail->server['main'] . '/login/addressbook/view/?cid=' . mysql_insert_id());
				exit();
			}		
		}
	}
}

$mail->MailFolderView();
?>
<? include($mail->tpl['html'] . '/header.html'); ?>
<script language="JavaScript">

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
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>

</head>



<STYLE type=text/css>@import url("/css/aka.css");

A:hover {
	COLOR: #666666
}
</STYLE>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="20" marginwidth="0" marginheight="0" onLoad="MM_preloadImages('../../img/compose_eml_d.jpg','../../img/address_book_d.jpg','../../img/collect_email_d.jpg')" link="#0000cc" vlink="#0000cc" alink="#0000cc">
<form method="post" action="" name="email">
<input type=hidden name="newfolder" value="">
  <table cellspacing=0 cellpadding=0 width=800 border=0 align="center">
    <tbody> 
    <tr align=left valign="top"> 
      <td style="BORDER-RIGHT: #A3A3A3 1px solid; BORDER-TOP: #A3A3A3 1px solid; BORDER-LEFT: #A3A3A3 1px solid; BORDER-BOTTOM: #A3A3A3 1px solid"> 
        <table width="800" border="0" cellspacing="0" cellpadding="0" height="28">
          <tr align="left" valign="bottom"> 
            <td height="47" width="11" valign="middle"> 
              <div align="left"></div>
            </td>
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
            <td width="29">&nbsp;</td>
            <td width="761" align="left" valign="top"> 
              <table width="590" border="0" cellpadding="0" cellspacing="0" class="akalink">
                <tr> 
                  <td height="2">&nbsp;</td>
                </tr>
                <tr> 
                    <td><strong><font color="#FF0000"><? $mail->MailErrorPrint(); ?></font></strong></td>
                </tr>
                <tr> 
                    <td><strong><font color="#FFFFFF">-</font></strong></td>
                </tr>
              </table>
                <table width="95%" border="0" cellpadding="0" cellspacing="0">
                  <tr> 
            <td width="100%" align="left" valign="top"><input type="image" name="section[summary]" src="/img/btn_ctn_summary.gif" width="150" height="26" border="0" onMouseOver="window.status='View a summary of this persons information'; return true;" onMouseOut="window.status=''; return true;"><input type="image" name="section[personal]" src="/img/btn_ctn_personal.gif" width="112" height="26" border="0" onMouseOver="window.status='Edit personal contact information for this person'; return true;" onMouseOut="window.status=''; return true;"><input type="image" name="section[business]" src="/img/btn_ctn_business.gif" width="110" height="26" border="0" onMouseOver="window.status='Edit business contact information for this person'; return true;" onMouseOut="window.status=''; return true;"><input type="image" name="section[other]" src="/img/btn_ctn_other.gif" width="106" height="26" border="0" onMouseOver="window.status='Edit any other notes stored about this person'; return true;" onMouseOut="window.status=''; return true;"></td>
                  </tr>
                  <tr>
                    <td height="262" align="left" valign="top"><table cellspacing=0 cellpadding=0 width="714" border=0>
                        <tbody>
                          <tr> 
                            <td width="714" align="left" valign="top" bgcolor=#B8B7B7 class="akalink"> 
                              <table width="100%" cellpadding="2" cellspacing="1">
                                <tr bgcolor="#ebebe3" class="akalink"> 
                                  <td width="746" height="207" align="left" valign="top" bgcolor="#FFFFFF"><table width="75%" border="0" cellpadding="0" cellspacing="0">
                                      <tr> 
                                        <td><font color="#FFFFFF" size="1">o</font></td>
                                      </tr>
                                    </table>
                                    <table width="626" border="0" cellpadding="0" cellspacing="0">
                                      <tr class="akalink"> 
                                        <td width="10" align="left" valign="middle">&nbsp;</td>
                                        <td width="616" align="left" valign="middle"><strong><font color="#000000">Business 
                                          contact information for this person.</font></strong></td>
                                      </tr>
                                    </table>
                                    <table width="700" border="0" cellpadding="0" cellspacing="0">
                                      <tr class="akalink"> 
                                        <td width="11" align="left" valign="middle">&nbsp;</td>
                                        <td width="689" align="left" valign="middle"><hr size="1" noshade></td>
                                      </tr>
                                    </table>
                                    <table width="710" border="0">
                                      <tr class="akalink"> 
                                        <td width="1" height="9" align="left" valign="middle">&nbsp;</td>
                                        <td width="147" align="left" valign="top">Business 
                                          Information: </td>
                                        <td width="548"> <table border=0 cellpadding=0 cellspacing=0 class="akalink">
                                            <tr> 
                                              <td width="145" align="left" valign="top"><input name="business[bcompany]" value="<? print($_POST['business']['bcompany']); ?>" type="text" class=sm  style="FONT-SIZE: 9px; BORDER-RIGHT: #7F9DB9 1px solid; BORDER-TOP: #7F9DB9 1px solid; FONT-FAMILY: verdana; BORDER-LEFT: #7F9DB9 1px solid; BORDER-BOTTOM: #7F9DB9 1px solid; BACKGROUND-COLOR: #FFFFFF" size="25" maxlength="60">
                                              </td>
                                              <td width="358" align="left" valign="top"><input name="business[bposition]" value="<? print($_POST['business']['bposition']); ?>" type="text" class=sm   style="FONT-SIZE: 9px; BORDER-RIGHT: #7F9DB9 1px solid; BORDER-TOP: #7F9DB9 1px solid; FONT-FAMILY: verdana; BORDER-LEFT: #7F9DB9 1px solid; BORDER-BOTTOM: #7F9DB9 1px solid; BACKGROUND-COLOR: #FFFFFF" size="20" maxlength="20">
                                              </td>
                                            </tr>
                                            <tr> 
                                              <td>Company Name 
                                                 <? $mail->MailErrorXmarkPrint($mail->mail_book_img_error['bcompany']); ?>
                                              </td>
                                              <td>Job Title\Position</td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                      <tr class="akalink"> 
                                        <td width="1">&nbsp;</td>
                                        <td>Office Address:</td>
                                        <td width="548"> <table border=0 cellpadding=0 cellspacing=0 class="akalink">
                                            <tr> 
                                              <td width="142" align="left" valign="top"><input name="business[baddress]" value="<? print($_POST['business']['baddress']);  ?>" type="text" class=sm style="FONT-SIZE: 9px; BORDER-RIGHT: #7F9DB9 1px solid; BORDER-TOP: #7F9DB9 1px solid; FONT-FAMILY: verdana; BORDER-LEFT: #7F9DB9 1px solid; BORDER-BOTTOM: #7F9DB9 1px solid; BACKGROUND-COLOR: #FFFFFF" size="25" maxlength="30">
                                                Street &nbsp;&nbsp;</td>
                                              <td width="141" align="left" valign="top"><input name="business[bcity]" value="<? print($_POST['business']['bcity']); ?>"  type="text" class=sm  style="FONT-SIZE: 9px; BORDER-RIGHT: #7F9DB9 1px solid; BORDER-TOP: #7F9DB9 1px solid; FONT-FAMILY: verdana; BORDER-LEFT: #7F9DB9 1px solid; BORDER-BOTTOM: #7F9DB9 1px solid; BACKGROUND-COLOR: #FFFFFF" size="25" maxlength="20">
                                                City &nbsp;&nbsp;</td>
                                              <td width="176" align="left" valign="top"><select name="business[bstate]"  style="FONT-SIZE: 9px; BORDER-LEFT-COLOR: #FFFFFF; BORDER-BOTTOM-COLOR: #FFFFFF; COLOR: #000000; BORDER-TOP-COLOR: #FFFFFF; FONT-FAMILY: verdana; BACKGROUND-COLOR: #FFFFFF; BORDER-RIGHT-COLOR: #FFFFFF">
                                       
                                       		<?

                                                $stateinit =  $_POST['business']['bstate'];

                                                	if( !empty($stateinit) ) {

                                                       	 	if( $stateinit == 'UC' ) {

                                                                	print('<option value="UC">Outside US or Canada</option>');

                                                	} elseif( ($state = $mail->MailContactStatePrint($stateinit)) !== FALSE ) {

                                                                print('<option value="' . $stateinit . '">'. $state . '</option>');

                                               		 } elseif( ($state = $mail->MailContactProvincePrint($stateinit)) !== FALSE) {

                                                       		 print('<option value="' . $stateinit . '">' . $state . '</option>');
                                                
                                                	} elseif( $stateinit != 'UN' ) {
                                                
                                                		print('<option value="' . $stateinit . '">' . $stateinit . '</option>');
                                              		  }
                                        	}
                                        	?>

                                                  <option value="UN"></option>
                                                  <option value="UC">Outside US 
                                                  or Canada</option>
                                                  <option value="UN">------- US 
                                                  STATES -------</option>
                                                  <option value="AL">Alabama</option>
                                                  <option value="AK">Alaska</option>
                                                  <option value="AZ">Arizona</option>
                                                  <option value="AR">Arkansas</option>
                                                  <option value="CA">California</option>
                                                  <option value="CO">Colorado</option>
                                                  <option value="CT">Connecticut</option>
                                                  <option value="DE">Delaware</option>
                                                  <option value="DC">District 
                                                  of Columbia</option>
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
                                                  <option value="NC">North Carolina</option>
                                                  <option value="ND">North Dakota</option>
                                                  <option value="OH">Ohio</option>
                                                  <option value="OK">Oklahoma</option>
                                                  <option value="OR">Oregon</option>
                                                  <option value="PA">Pennsylvania</option>
                                                  <option value="RI">Rhode Island</option>
                                                  <option value="SC">South Carolina</option>
                                                  <option value="SD">South Dakota</option>
                                                  <option value="TN">Tennessee</option>
                                                  <option value="TX">Texas</option>
                                                  <option value="UT">Utah</option>
                                                  <option value="VT">Vermont</option>
                                                  <option value="VA">Virginia</option>
                                                  <option value="WA">Washington</option>
                                                  <option value="WV">West Virginia</option>
                                                  <option value="WI">Wisconsin</option>
                                                  <option value="WY">Wyoming</option>
                                                  <option value="UN">- CANADIAN 
                                                  PROVINCES -</option>
                                                  <option value="AB">Alberta</option>
                                                  <option value="BC">British Columbia</option>
                                                  <option value="MB">Manitoba</option>
                                                  <option value="NF">Newfoundland</option>
                                                  <option value="NB">New Brunswick</option>
                                                  <option value="NT">Northwest 
                                                  Territories</option>
                                                  <option value="NS">Nova Scotia</option>
                                                  <option value="NU">Nunavut</option>
                                                  <option value="ON">Ontario</option>
                                                  <option value="PE">Prince Edward 
                                                  Island</option>
                                                  <option value="QC">Quebec</option>
                                                  <option value="SK">Saskatchewan</option>
                                                  <option value="YT">Yukon</option>
                                                </select>
                                                State\Province </td>
                                              <td width="89" align="left" valign="top"><input name="business[bzip]"  value="<? if( isset($_POST['business']['bzip']) ) { print($_POST['business']['bzip']); } elseif( isset($mail->mail_book_contact_list['bzip']) ) { print($mail->mail_book_contact_list['bzip']); } ?>" type="text" class=sm  style="FONT-SIZE: 9px; BORDER-RIGHT: #7F9DB9 1px solid; BORDER-TOP: #7F9DB9 1px solid; FONT-FAMILY: verdana; BORDER-LEFT: #7F9DB9 1px solid; BORDER-BOTTOM: #7F9DB9 1px solid; BACKGROUND-COLOR: #FFFFFF" size="15" maxlength="15">
                                                Zip\Postal Code </td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                      <tr class="akalink"> 
                                        <td width="1">&nbsp;</td>
                                        <td>Country\Territory:</td>
                                        <td width="548"> <select name="business[bcountry]"  size="1"  style="FONT-SIZE: 9px; BORDER-LEFT-COLOR: #FFFFFF; BORDER-BOTTOM-COLOR: #FFFFFF; COLOR: #000000; BORDER-TOP-COLOR: #FFFFFF; FONT-FAMILY: verdana; BACKGROUND-COLOR: #FFFFFF; BORDER-RIGHT-COLOR: #FFFFFF">
                                            <?
						
                                                $country =  $_POST['business']['bcountry'];

                                                if( !empty($country) && $country != 'UN' ) {
							
							$cntry = $mail->MailContactCountryPrint($country);
							
							if( !empty($cntry) ) {
						
                                                       		print('<option value="' . $country . '">' . $cntry . '</option>');
                                                	
                                                	} else {
                                                		
                                                		print('<option value="' . $country . '">' . $country . '</option>');
                                                	}
                                                }

                                            ?>
                                            <option value="UN"></option>
                                            <option value="US">United States of 
                                            America</option>
                                            <option value="AF">Afghanistan</option>
                                            <option value="AL">Albania</option>
                                            <option value="DZ">Algeria</option>
                                            <option value="AS">American Samoa</option>
                                            <option value="AD">Andorra</option>
                                            <option value="AO">Angola</option>
                                            <option value="AI">Anguilla</option>
                                            <option value="AQ">Antarctica</option>
                                            <option value="AG">Antigua and Barbuda</option>
                                            <option value="AR">Argentina</option>
                                            <option value="AM">Armenia</option>
                                            <option value="AW">Aruba</option>
                                            <option value="AU">Australia</option>
                                            <option value="AT">Austria</option>
                                            <option value="AZ">Azerbaijan</option>
                                            <option value="BS">Bahamas</option>
                                            <option value="BH">Bahrain</option>
                                            <option value="BD">Bangladesh</option>
                                            <option value="BB">Barbados</option>
                                            <option value="BY">Belarus</option>
                                            <option value="BE">Belgium</option>
                                            <option value="BZ">Belize</option>
                                            <option value="BJ">Benin</option>
                                            <option value="BM">Bermuda</option>
                                            <option value="BT">Bhutan</option>
                                            <option value="BO">Bolivia</option>
                                            <option value="BA">Bosnia and Herzegowina</option>
                                            <option value="BW">Botswana</option>
                                            <option value="BV">Bouvet Island</option>
                                            <option value="BR">Brazil</option>
                                            <option value="IO">British Indian 
                                            Ocean Territory</option>
                                            <option value="BN">Brunei Darussalam</option>
                                            <option value="BG">Bulgaria</option>
                                            <option value="BF">Burkina Faso</option>
                                            <option value="BI">Burundi</option>
                                            <option value="KH">Cambodia</option>
                                            <option value="CM">Cameroon</option>
                                            <option value="CA">Canada</option>
                                            <option value="CV">Cape Verde</option>
                                            <option value="KY">Cayman Islands</option>
                                            <option value="CF">Central African 
                                            Republic</option>
                                            <option value="TD">Chad</option>
                                            <option value="CL">Chile</option>
                                            <option value="CN">China</option>
                                            <option value="CX">Christmas Island</option>
                                            <option value="CC">Cocos (Keeling) 
                                            Islands</option>
                                            <option value="CO">Colombia</option>
                                            <option value="KM">Comoros</option>
                                            <option value="CG">Congo</option>
                                            <option value="CD">Congo, the Democratic 
                                            Republic of the</option>
                                            <option value="CK">Cook Islands</option>
                                            <option value="CR">Costa Rica</option>
                                            <option value="CI">Cote d'Ivoire</option>
                                            <option value="HR">Croatia (Hrvatska)</option>
                                            <option value="CU">Cuba</option>
                                            <option value="CY">Cyprus</option>
                                            <option value="CZ">Czech Republic</option>
                                            <option value="DK">Denmark</option>
                                            <option value="DJ">Djibouti</option>
                                            <option value="DM">Dominica</option>
                                            <option value="DO">Dominican Republic</option>
                                            <option value="TP">East Timor</option>
                                            <option value="EC">Ecuador</option>
                                            <option value="EG">Egypt</option>
                                            <option value="SV">El Salvador</option>
                                            <option value="GQ">Equatorial Guinea</option>
                                            <option value="ER">Eritrea</option>
                                            <option value="EE">Estonia</option>
                                            <option value="ET">Ethiopia</option>
                                            <option value="FK">Falkland Islands 
                                            (Malvinas)</option>
                                            <option value="FO">Faroe Islands</option>
                                            <option value="FJ">Fiji</option>
                                            <option value="FI">Finland</option>
                                            <option value="FR">France</option>
                                            <option value="FX">France, Metropolitan</option>
                                            <option value="GF">French Guiana</option>
                                            <option value="PF">French Polynesia</option>
                                            <option value="TF">French Southern 
                                            Territories</option>
                                            <option value="GA">Gabon</option>
                                            <option value="GM">Gambia</option>
                                            <option value="GE">Georgia</option>
                                            <option value="DE">Germany</option>
                                            <option value="GH">Ghana</option>
                                            <option value="GI">Gibraltar</option>
                                            <option value="GR">Greece</option>
                                            <option value="GL">Greenland</option>
                                            <option value="GD">Grenada</option>
                                            <option value="GP">Guadeloupe</option>
                                            <option value="GU">Guam</option>
                                            <option value="GT">Guatemala</option>
                                            <option value="GN">Guinea</option>
                                            <option value="GW">Guinea-Bissau</option>
                                            <option value="GY">Guyana</option>
                                            <option value="HT">Haiti</option>
                                            <option value="HM">Heard and Mc Donald 
                                            Islands</option>
                                            <option value="VA">Holy See (Vatican 
                                            City State)</option>
                                            <option value="HN">Honduras</option>
                                            <option value="HK">Hong Kong</option>
                                            <option value="HU">Hungary</option>
                                            <option value="IS">Iceland</option>
                                            <option value="IN">India</option>
                                            <option value="ID">Indonesia</option>
                                            <option value="IR">Iran, Islamic Republic 
                                            of</option>
                                            <option value="IQ">Iraq</option>
                                            <option value="IE">Ireland</option>
                                            <option value="IL">Israel</option>
                                            <option value="IT">Italy</option>
                                            <option value="JM">Jamaica</option>
                                            <option value="JP">Japan</option>
                                            <option value="JO">Jordan</option>
                                            <option value="KZ">Kazakhstan</option>
                                            <option value="KE">Kenya</option>
                                            <option value="KI">Kiribati</option>
                                            <option value="KP">Korea, Democratic 
                                            People's Republic of</option>
                                            <option value="KR">Korea, Republic 
                                            of</option>
                                            <option value="KW">Kuwait</option>
                                            <option value="KG">Kyrgyzstan</option>
                                            <option value="LA">Lao, Democratic 
                                            People's Republic of</option>
                                            <option value="LV">Latvia</option>
                                            <option value="LB">Lebanon</option>
                                            <option value="LS">Lesotho</option>
                                            <option value="LR">Liberia</option>
                                            <option value="LY">Libyan Arab Jamahiriya</option>
                                            <option value="LI">Liechtenstein</option>
                                            <option value="LT">Lithuania</option>
                                            <option value="LU">Luxembourg</option>
                                            <option value="MO">Macau</option>
                                            <option value="MK">Macedonia, The 
                                            Former Yugoslav Republic of</option>
                                            <option value="MG">Madagascar</option>
                                            <option value="MW">Malawi</option>
                                            <option value="MY">Malaysia</option>
                                            <option value="MV">Maldives</option>
                                            <option value="ML">Mali</option>
                                            <option value="MT">Malta</option>
                                            <option value="MH">Marshall Islands</option>
                                            <option value="MQ">Martinique</option>
                                            <option value="MR">Mauritania</option>
                                            <option value="MU">Mauritius</option>
                                            <option value="YT">Mayotte</option>
                                            <option value="MX">Mexico</option>
                                            <option value="FM">Micronesia, Federated 
                                            States of</option>
                                            <option value="MD">Moldova, Republic 
                                            of</option>
                                            <option value="MC">Monaco</option>
                                            <option value="MN">Mongolia</option>
                                            <option value="MS">Montserrat</option>
                                            <option value="MA">Morocco</option>
                                            <option value="MZ">Mozambique</option>
                                            <option value="MM">Myanmar</option>
                                            <option value="NA">Namibia</option>
                                            <option value="NR">Nauru</option>
                                            <option value="NP">Nepal</option>
                                            <option value="NL">Netherlands</option>
                                            <option value="AN">Netherlands Antilles</option>
                                            <option value="NC">New Caledonia</option>
                                            <option value="NZ">New Zealand</option>
                                            <option value="NI">Nicaragua</option>
                                            <option value="NE">Niger</option>
                                            <option value="NG">Nigeria</option>
                                            <option value="NU">Niue</option>
                                            <option value="NF">Norfolk Island</option>
                                            <option value="MP">Northern Mariana 
                                            Islands</option>
                                            <option value="NO">Norway</option>
                                            <option value="OM">Oman</option>
                                            <option value="PK">Pakistan</option>
                                            <option value="PW">Palau</option>
                                            <option value="PA">Panama</option>
                                            <option value="PG">Papua New Guinea</option>
                                            <option value="PY">Paraguay</option>
                                            <option value="PE">Peru</option>
                                            <option value="PH">Philippines</option>
                                            <option value="PN">Pitcairn</option>
                                            <option value="PL">Poland</option>
                                            <option value="PT">Portugal</option>
                                            <option value="PR">Puerto Rico</option>
                                            <option value="QA">Qatar</option>
                                            <option value="RE">Reunion</option>
                                            <option value="RO">Romania</option>
                                            <option value="RU">Russian Federation</option>
                                            <option value="RW">Rwanda</option>
                                            <option value="KN">Saint Kitts and 
                                            Nevis</option>
                                            <option value="LC">Saint LUCIA</option>
                                            <option value="VC">Saint Vincent and 
                                            the Grenadines</option>
                                            <option value="WS">Samoa</option>
                                            <option value="SM">San Marino</option>
                                            <option value="ST">Sao Tome and Principe 
                                            </option>
                                            <option value="SA">Saudi Arabia</option>
                                            <option value="SN">Senegal </option>
                                            <option value="SC">Seychelles</option>
                                            <option value="SL">Sierra Leone</option>
                                            <option value="SG">Singapore </option>
                                            <option value="SK">Slovakia (Slovak 
                                            Republic)</option>
                                            <option value="SI">Slovenia</option>
                                            <option value="SB">Solomon Islands</option>
                                            <option value="SO">Somalia </option>
                                            <option value="ZA">South Africa</option>
                                            <option value="GS">South Georgia and 
                                            the South Sandwich Islands</option>
                                            <option value="ES">Spain</option>
                                            <option value="LK">Sri Lanka</option>
                                            <option value="SH">St. Helena</option>
                                            <option value="PM">St. Pierre and 
                                            Miquelon</option>
                                            <option value="SD">Sudan</option>
                                            <option value="SR">Suriname</option>
                                            <option value="SJ">Svalbard and Jan 
                                            Mayen Islands</option>
                                            <option value="SZ">Swaziland</option>
                                            <option value="SE">Sweden</option>
                                            <option value="CH">Switzerland</option>
                                            <option value="SY">Syrian Arab Republic</option>
                                            <option value="TW">Taiwan, Province 
                                            of China</option>
                                            <option value="TJ">Tajikistan</option>
                                            <option value="TZ">Tanzania, United 
                                            Republic of</option>
                                            <option value="TH">Thailand</option>
                                            <option value="TG">Togo</option>
                                            <option value="TK">Tokelau</option>
                                            <option value="TO">Tonga</option>
                                            <option value="TT">Trinidad and Tobago</option>
                                            <option value="TN">Tunisia</option>
                                            <option value="TR">Turkey</option>
                                            <option value="TM">Turkmenistan</option>
                                            <option value="TC">Turks and Caicos 
                                            Islands</option>
                                            <option value="TV">Tuvalu</option>
                                            <option value="UG">Uganda</option>
                                            <option value="UA">Ukraine</option>
                                            <option value="AE">United Arab Emirates</option>
                                            <option value="GB">United Kingdom</option>
                                            <option value="UM">United States Minor 
                                            Outlying Islands</option>
                                            <option value="UY">Uruguay</option>
                                            <option value="UZ">Uzbekistan</option>
                                            <option value="VU">Vanuatu</option>
                                            <option value="VE">Venezuela</option>
                                            <option value="VN">Viet Nam</option>
                                            <option value="VG">Virgin Islands 
                                            (British)</option>
                                            <option value="VI">Virgin Islands 
                                            (U.S.)</option>
                                            <option value="WF">Wallis and Futuna 
                                            Islands</option>
                                            <option value="EH">Western Sahara</option>
                                            <option value="YE">Yemen</option>
                                            <option value="YU">Yugoslavia</option>
                                            <option value="ZM">Zambia</option>
                                            <option value="ZW">Zimbabwe</option>
                                          </select></tr>
                                    </table>
                                    <table width="75%" border="0" cellpadding="0" cellspacing="0">
                                      <tr> 
                                        <td><font color="#FFFFFF" size="1">o</font></td>
                                      </tr>
                                    </table>
                                    <table width="710" border="0">
                                      <tr class="akalink"> 
                                        <td width="1">&nbsp;</td>
                                        <td width="147">Phone Numbers:</td>
                                        <td width="548"> <table border=0 cellpadding=0 cellspacing=0 class="akalink">
                                            <tr> 
                                              <td width="144"><input name="business[bftel]" value="<? print($_POST['business']['bftel']);  ?>" type="text" class=sm  style="FONT-SIZE: 9px; BORDER-RIGHT: #7F9DB9 1px solid; BORDER-TOP: #7F9DB9 1px solid; FONT-FAMILY: verdana; BORDER-LEFT: #7F9DB9 1px solid; BORDER-BOTTOM: #7F9DB9 1px solid; BACKGROUND-COLOR: #FFFFFF" size="25" maxlength="20"></td>
                                              <td width="401"> <input name="business[btel]" value="<?  print($_POST['business']['btel']);  ?>" type="text" class=sm  style="FONT-SIZE: 9px; BORDER-RIGHT: #7F9DB9 1px solid; BORDER-TOP: #7F9DB9 1px solid; FONT-FAMILY: verdana; BORDER-LEFT: #7F9DB9 1px solid; BORDER-BOTTOM: #7F9DB9 1px solid; BACKGROUND-COLOR: #FFFFFF" size="25" maxlength="20">
                                                - 
                                                <input name="business[btelext]" value="<? print($_POST['business']['btelext']); ?>" type="text" class=sm  style="FONT-SIZE: 9px; BORDER-RIGHT: #7F9DB9 1px solid; BORDER-TOP: #7F9DB9 1px solid; FONT-FAMILY: verdana; BORDER-LEFT: #7F9DB9 1px solid; BORDER-BOTTOM: #7F9DB9 1px solid; BACKGROUND-COLOR: #FFFFFF" size="5" maxlength="5">
                                                (Extension) </td>
                                            </tr>
                                            <tr> 
                                              <td>Business Fax</td>
                                              <td>Business Phone</td>
                                            </tr>
                                          </table></tr>
                                    </table>
                                    <table width="75%" border="0" cellpadding="0" cellspacing="0">
                                      <tr> 
                                        <td><font color="#FFFFFF" size="1">o</font></td>
                                      </tr>
                                    </table>
                                    <table width="710" border="0">
                                      <tr class="akalink"> 
                                        <td width="1" height="28">&nbsp;</td>
                                        <td width="147">Business Web Site:</td>
                                        <td width="128"><input name="business[burl]" value="<? print($_POST['business']['burl']); ?>" type="text" class=sm id="business[burl]3"  style="FONT-SIZE: 9px; BORDER-RIGHT: #7F9DB9 1px solid; BORDER-TOP: #7F9DB9 1px solid; FONT-FAMILY: verdana; BORDER-LEFT: #7F9DB9 1px solid; BORDER-BOTTOM: #7F9DB9 1px solid; BACKGROUND-COLOR: #FFFFFF" size="25" maxlength="128"></td>
                                        <td width="416"><img src="/img/ie_icon.gif" width="16" height="16"></td>
                                      </tr>
                                      <tr class="akalink"> 
                                        <td width="1">&nbsp;</td>
                                        <td>Business E-Mail Address:</td>
                                        <td><input name="business[bemail]" value="<? print($_POST['business']['bemail']); ?>" type="text" class=sm id="business[bemail]3"  style="FONT-SIZE: 9px; BORDER-RIGHT: #7F9DB9 1px solid; BORDER-TOP: #7F9DB9 1px solid; FONT-FAMILY: verdana; BORDER-LEFT: #7F9DB9 1px solid; BORDER-BOTTOM: #7F9DB9 1px solid; BACKGROUND-COLOR: #FFFFFF" size="25" maxlength="64"> <? $mail->MailErrorXmarkPrint($mail->mail_book_img_error['bemail']); ?></td>
                                        <td><img src="/img/email_icn.gif" width="18" height="13"></td>
                                      </tr>
                                    </table>
                                    <table width="624" border="0">
                                      <tr> 
                                        <td width="130" height="41">&nbsp;</td>
                                        <td width="484" valign="bottom"> <input name="apply" type="image" id="apply5" src="/img/web_apply.gif" width="100" height="30" border="0" onMouseOver="window.status='Save changes to this contact'; return true;" onMouseOut="window.status=''; return true;"> 
                                          <a href="/login/addressbook/"><img src="/img/web_cancel.gif" width="100" height="30" border="0" onMouseOver="window.status='Go back to your address book'; return true;" onMouseOut="window.status=''; return true;"></a> 
                                        </td>
                                      </tr>
                                    </table> </td>
                                </tr>
                              </table></td>
                          </tr>
                        </tbody>
                      </table>
                      <table width="75%" border="0" cellpadding="0" cellspacing="0">
                        <tr> 
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                      </table></td>
                  </tr>
                </table>
                
              </td>
          </tr>
        </table>
      </td>
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