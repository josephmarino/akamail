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

if( $mail->MailEntityIs($mail->lp['login']) ) {

	header('Location: http://' . $mail->server['main'] . '/login/inbox');
	exit();
}

if( $mail->MailPostIs('register') ) {
		
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
			$_POST['contact']['state']	= $_POST['canada_personal_state'];
			$_POST['contact']['city']	= $_POST['canada_personal_city'];
			$_POST['contact']['address']	= $_POST['canada_personal_address'];
			$_POST['contact']['zip']	= $_POST['canada_personal_zip'];
			break;
				
		default:
				
			$_POST['contact']['country']	= $_POST['personal_country'];
			$_POST['contact']['state']	= $_POST['outside_personal_state'];
			$_POST['contact']['city']	= $_POST['outside_personal_city'];
			$_POST['contact']['address']	= $_POST['outside_personal_address'];
			$_POST['contact']['zip']	= $_POST['outside_personal_zip'];
			break;
	}
		
	$_POST['contact']['bdate'] = $_POST['contact']['bdyear'] . '-' .  $_POST['contact']['bdmonth'] . '-' . $_POST['contact']['bdday'];  
	 
	if( $mail->MailContactFormat($_POST['contact']) ) {
					
		if( $mail->MailContactRegister($_POST['contact']) ) {
				
			if( $mail->MailEntityRegister($_POST['contact']) ) {
				
				unset($_SESSION['result']);	
				header('Location: https://' . $mail->server['main'] . '/login/inbox');
				exit();
			}
		}
	}
}

if( isset($_POST['contact']['country']) ) {
			
	$countryindex = 'document.email.personal_country.selectedIndex = ' . $mail->addrindexarr['country'][$_POST['contact']['country']] . ';' . "\n";
				
	switch($_POST['contact']['country']) {
   	    	
   		case 'CA':
   			
   	    		$provinceindex		= 'document.email.canada_personal_state.selectedIndex = ' . $mail->addrindexarr['province'][$_POST['contact']['state']] . ';' . "\n";		
   	    		$javacode		= ' setlocation(); showCANADA(document.email);';
   	    		break;
   	    					
   	    	case 'US':
   	    			
   	    		$stateindex		 = 'document.email.personal_state.selectedIndex = ' . $mail->addrindexarr['state'][$_POST['contact']['state']] . ';' . "\n";
   	    		$javacode		 = ' setlocation(); showUSA(document.email);';
   	    		break;
   	    			
   	    	default:
				
			$javacode 		 = 'setlocation(); showOUTSIDE(document.email);';
			break;	
	}
}
?>
<html>
<head>
<script language="JavaScript">

function interactivehelp() {
	h3ll0=window.open('/info/help/','elite','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=492,height=350');
}

function centerminibook(url,theWidth,theHeight) { 
	var theTop=(screen.height/2)-(theHeight/2); 
	var theLeft=(screen.width/2)-(theWidth/2); 
	var features='height='+theHeight+',width='+theWidth+',top='+theTop+',left='+theLeft+",scrollbars=yes"; 
	theWin=window.open(url,'',features); }
	
	function centerwindow(url,theWidth,theHeight) { 
	var theTop=(screen.height/2)-(theHeight/2); 
	var theLeft=(screen.width/2)-(theWidth/2); 
	var features='height='+theHeight+',width='+theWidth+',top='+theTop+',left='+theLeft+",scrollbars=no"; 
	theWin=window.open(url,'',features); }  
	
	
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
	
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
	document.email.outside_personal_city.value = "";
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

function setlocation() {
<?  
    print($countryindex); 
    print($stateindex); 
    print($provinceindex); 
?>
}

function centerwindow(url,theWidth,theHeight) {  
 var theTop=(screen.height/2)-(theHeight/2);  
 var theLeft=(screen.width/2)-(theWidth/2);  
 var features='height='+theHeight+',width='+theWidth+',top='+theTop+',left='+theLeft+",scrollbars=no";  
 theWin=window.open(url,'',features); 
}  

</script>
</head>
 
<STYLE type=text/css>
@import url("/css/aka.css");
A:hover {

	COLOR: #666666

}
.style1 {color: #FF0000}
</STYLE>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="20" marginwidth="0" marginheight="0" link="#0000cc" vlink="#0000cc" alink="#0000cc" onLoad="<? print($javacode); ?>">
<div id="Layer1" style="position:absolute; left:406px; top:301px; width:182px; height:84px; z-index:1"><a href="http://www.akalink.com/helpdesk/policies/03.aka" target="_blank"><img src="/img/wedonotsellyourinfo.jpg" width="183" height="81" border="0"></a></div>
<form action="" method="post" enctype="multipart/form-data" name="email">
	<table cellspacing=0 cellpadding=0 width=800 border=0 align="center">
    <tbody> 
    <tr align=left valign="top"> 
        <td style="BORDER-RIGHT: #A3A3A3 1px solid; BORDER-TOP: #A3A3A3 1px solid; BORDER-LEFT: #A3A3A3 1px solid; BORDER-BOTTOM: #A3A3A3 1px solid"><table width="800" border="0" cellspacing="0" cellpadding="0" height="28">
			<tr align="left" valign="bottom"> 
			  <td height="47" width="11" valign="middle"> <div align="left"></div></td>
			  <td height="47" width="789" valign="middle"> <img src="/img/top_logo_left.gif" width="388" height="48" border="0"></td>
			</tr>
		  </table>
		  <table width="800" border="0" cellspacing="0" cellpadding="0">
			<tr bgcolor="80ADC1"> 
			  <td height="2">&nbsp;</td>
			</tr>
		  </table>
		  <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr> 
              <td width="5%" height="430">&nbsp;</td>
              <td width="95%" align="left" valign="top"><table width="770" height="47" border="0" cellpadding="0" cellspacing="0">
				  <tr> 
					<td width="557" height="47" valign="bottom"><font face="Arial, Helvetica, sans-serif" size="3"><b>Welcome 
					  to AKAMail</b></font></td>
					<td width="178" valign="bottom"><a href="javascript:centerwindow('http://www.akalink.com/policy/secure_transaction.aka',620,400)"",620,400)" onMouseOver="window.status=' '; return true;" onMouseOut="window.status=''; return true;"><img src="/img/secure_trans_store.gif" width="150" height="19" border="0"></a></td>
				  </tr>
				</table>
				<table width="95%" height="71" border="0" cellpadding="0" cellspacing="0">
				  <tr> 
					<td height="22" align="left" valign="middle" class="akalink"><strong><font color="#FF0000"><? print($mail->error['result']); ?></font></strong></td>
				  </tr>
				  <tr> 
					<td height="30" align="left" valign="top" class="akalink">This information is ONLY needed to verify who you are just incase you forget your e-mail address or password.<br>
					We do not sell your information to anyone we have no reason to. (<a href="http://www.akalink.com/helpdesk/policies/03.aka" target="_blank">TRUSTe Certified Privacy Policy</a>)</td>
				  </tr>
				  <tr>
					<td height="19" align="left" valign="top" class="akalink">&nbsp;</td>
				  </tr>
				</table>
				<table width="71%" border="0" cellpadding="0" cellspacing="0">
				  <tr> 
					<td width="70%" valign="bottom" align="left"><a href="/login/options/01/"><img src="/img/tp_lprn3.jpg" width="160" height="26" border="0"></a></td>
					<td width="30%" valign="bottom" align="left">&nbsp;</td>
				  </tr>
				  <tr> 
					<td colspan="4"> <table cellspacing=0 cellpadding=0 width="534" border=0>
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
													  <span class="style1">*</span><font face="Arial, Helvetica, sans-serif" size="2"><? $mail->MailErrorXMarkPrint($mail->mail_contact_img_error['fname']); ?>
													  </font></td>
													<td width="34">MI: 
													 <? $mail->MailErrorXMarkPrint($mail->mail_contact_img_error['mname']); ?>
													</td>
													<td width="131">Last Name: 
													  <span class="style1">*</span><font face="Arial, Helvetica, sans-serif" size="2"> 
													 <? $mail->MailErrorXMarkPrint($mail->mail_contact_img_error['lname']); ?>
													  </font></td>
												  </tr>
												  <tr class="akalink"> 
													<td width="130"><font face="Arial, Helvetica, sans-serif" size="2"> 
													  <input  name="contact[fname]" value="<? print($_POST['contact']['fname']); ?>" type="text" class="textfields" id="contact[fname]" size="20" maxlength="20">
													  </font></td>
													<td width="34"> <input name="contact[mname]" value="<? print($_POST['contact']['mname']); ?>" type="text" class="textfields" id="middleinitial2" size="4" maxlength="2"> 
													</td>
													<td width="131"><font face="Arial, Helvetica, sans-serif" size="2"> 
													  <input  name="contact[lname]" value="<? print($_POST['contact']['lname']); ?>" type="text" class="textfields" id="contact[lname]" size="20" maxlength="20">
													  </font></td>
												  </tr>
												</table></td>
											  <td height="39" align="left" valign="top" width="41%"> 
												<div align="center"> 
												  <table width="96%" border="0" cellpadding="0" cellspacing="0">
													<tr> 
													  <td height="19" align="center" valign="bottom" class="akalink"><span class="style1">*</span>														Indicates required information 
													  </td>
													</tr>
												  </table>
												</div></td>
											</tr>
										  </table>
										  <table width="376" border="0">
											<tr class="akalink"> 
											  <td width="368">Company Name: <font face="Arial, Helvetica, sans-serif" size="2"> 
												<? $mail->MailErrorXMarkPrint($mail->mail_contact_img_error['bizname']); ?>
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
											  <td width="370">Country: <span class="style1">*</span><font face="Arial, Helvetica, sans-serif" size="2"> 
												<? $mail->MailErrorXMarkPrint($mail->mail_contact_img_error['country']); ?>
												</font></td>
											</tr>
											<tr class="akalink"> 
											  <td><font face="Arial, Helvetica, sans-serif" size="2"> 
												<select  name="personal_country"  size="1" class="dropdowns" id="personal_country" onChange="if (this.selectedIndex == 0) { showUSA(this.form); } ; if (this.selectedIndex == 1) { showCANADA(this.form); } ; if (this.selectedIndex > 1) { showOUTSIDE(this.form);  }">
												  <option value="US">United States of America</option>
					                                                            <option value="CA">Canada</option>
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
								                                    <option value="IO">British Indian Ocean Territory</option>
								                                    <option value="BN">Brunei Darussalam</option>
								                                    <option value="BG">Bulgaria</option>
								                                    <option value="BF">Burkina Faso</option>
								                                    <option value="BI">Burundi</option>
								                                    <option value="KH">Cambodia</option>
								                                    <option value="CM">Cameroon</option>
								                                    <option value="CV">Cape Verde</option>
								                                    <option value="KY">Cayman Islands</option>
								                                    <option value="CF">Central African Republic</option>
								                                    <option value="TD">Chad</option>
								                                    <option value="CL">Chile</option>
								                                    <option value="CN">China</option>
								                                    <option value="CX">Christmas Island</option>
								                                    <option value="CC">Cocos (Keeling) Islands</option>
								                                    <option value="CO">Colombia</option>
								                                    <option value="KM">Comoros</option>
								                                    <option value="CG">Congo</option>
								                                    <option value="CD">Congo, the Democratic Republic 
								                                    of the</option>
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
								                                    <option value="FK">Falkland Islands (Malvinas)</option>
								                                    <option value="FO">Faroe Islands</option>
								                                    <option value="FJ">Fiji</option>
								                                    <option value="FI">Finland</option>
								                                    <option value="FR">France</option>
								                                    <option value="FX">France, Metropolitan</option>
								                                    <option value="GF">French Guiana</option>
								                                    <option value="PF">French Polynesia</option>
								                                    <option value="TF">French Southern Territories</option>
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
								                                    <option value="HM">Heard and Mc Donald Islands</option>
								                                    <option value="VA">Holy See (Vatican City 
								                                    State)</option>
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
								                                    <option value="KP">Korea, Democratic People's 
								                                    Republic of</option>
								                                    <option value="KR">Korea, Republic of</option>
								                                    <option value="KW">Kuwait</option>
								                                    <option value="KG">Kyrgyzstan</option>
								                                    <option value="LA">Lao, Democratic People's 
								                                    Republic of</option>
								                                    <option value="LV">Latvia</option>
								                                    <option value="LB">Lebanon</option>
								                                    <option value="LS">Lesotho</option>
								                                    <option value="LR">Liberia</option>
								                                    <option value="LY">Libyan Arab Jamahiriya</option>
								                                    <option value="LI">Liechtenstein</option>
								                                    <option value="LT">Lithuania</option>
								                                    <option value="LU">Luxembourg</option>
								                                    <option value="MO">Macau</option>
								                                    <option value="MK">Macedonia, The Former Yugoslav 
								                                    Republic of</option>
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
								                                    <option value="FM">Micronesia, Federated States 
								                                    of</option>
								                                    <option value="MD">Moldova, Republic of</option>
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
								                                    <option value="MP">Northern Mariana Islands</option>
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
								                                    <option value="KN">Saint Kitts and Nevis</option>
								                                    <option value="LC">Saint LUCIA</option>
								                                    <option value="VC">Saint Vincent and the Grenadines</option>
								                                    <option value="WS">Samoa</option>
								                                    <option value="SM">San Marino</option>
								                                    <option value="ST">Sao Tome and Principe </option>
								                                    <option value="SA">Saudi Arabia</option>
								                                    <option value="SN">Senegal </option>
								                                    <option value="SC">Seychelles</option>
								                                    <option value="SL">Sierra Leone</option>
								                                    <option value="SG">Singapore </option>
								                                    <option value="SK">Slovakia (Slovak Republic)</option>
								                                    <option value="SI">Slovenia</option>
								                                    <option value="SB">Solomon Islands</option>
								                                    <option value="SO">Somalia </option>
								                                    <option value="ZA">South Africa</option>
								                                    <option value="GS">South Georgia and the South 
								                                    Sandwich Islands</option>
								                                    <option value="ES">Spain</option>
								                                    <option value="LK">Sri Lanka</option>
								                                    <option value="SH">St. Helena</option>
								                                    <option value="PM">St. Pierre and Miquelon</option>
								                                    <option value="SD">Sudan</option>
								                                    <option value="SR">Suriname</option>
								                                    <option value="SJ">Svalbard and Jan Mayen 
								                                    Islands</option>
								                                    <option value="SZ">Swaziland</option>
								                                    <option value="SE">Sweden</option>
								                                    <option value="CH">Switzerland</option>
								                                    <option value="SY">Syrian Arab Republic</option>
								                                    <option value="TW">Taiwan, Province of China</option>
								                                    <option value="TJ">Tajikistan</option>
								                                    <option value="TZ">Tanzania, United Republic 
								                                    of</option>
								                                    <option value="TH">Thailand</option>
								                                    <option value="TG">Togo</option>
								                                    <option value="TK">Tokelau</option>
								                                    <option value="TO">Tonga</option>
								                                    <option value="TT">Trinidad and Tobago</option>
								                                    <option value="TN">Tunisia</option>
								                                    <option value="TR">Turkey</option>
								                                    <option value="TM">Turkmenistan</option>
								                                    <option value="TC">Turks and Caicos Islands</option>
								                                    <option value="TV">Tuvalu</option>
								                                    <option value="UG">Uganda</option>
								                                    <option value="UA">Ukraine</option>
								                                    <option value="AE">United Arab Emirates</option>
								                                    <option value="GB">United Kingdom</option>
								                                    <option value="UM">United States Minor Outlying 
								                                    Islands</option>
								                                    <option value="UY">Uruguay</option>
								                                    <option value="UZ">Uzbekistan</option>
								                                    <option value="VU">Vanuatu</option>
								                                    <option value="VE">Venezuela</option>
								                                    <option value="VN">Viet Nam</option>
								                                    <option value="VG">Virgin Islands (British)</option>
								                                    <option value="VI">Virgin Islands (U.S.)</option>
								                                    <option value="WF">Wallis and Futuna Islands</option>
								                                    <option value="EH">Western Sahara</option>
								                                    <option value="YE">Yemen</option>
								                                    <option value="YU">Yugoslavia</option>
								                                    <option value="ZM">Zambia</option>
								                                    <option value="ZW">Zimbabwe</option>
												</select>
												</font></td>
											</tr>
										  </table>
										  <div id="usapersonal" style="visibility: visible; display:"> 
											<table width="473" border="0">
											  <tr class="akalink"> 
												<td width="467">Address: <span class="style1">*</span><font face="Arial, Helvetica, sans-serif" size="2"> 
												  <? $mail->MailErrorXMarkPrint($mail->mail_contact_img_error['address']); ?>
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
												  <span class="style1">*</span><font face="Arial, Helvetica, sans-serif" size="2"><? $mail->MailErrorXMarkPrint($mail->mail_contact_img_error['city']); ?>
												  </font></td>
												<td width="118">State: <span class="style1">*</span><font face="Arial, Helvetica, sans-serif" size="2"> 
												 <? $mail->MailErrorXMarkPrint($mail->mail_contact_img_error['state']); ?>
												  </font></td>
												<td width="147" align="left">Zip: 
												  <span class="style1">*</span><font face="Arial, Helvetica, sans-serif" size="2"> 
												 <? $mail->MailErrorXMarkPrint($mail->mail_contact_img_error['zip']); ?>
												  </font></td>
											  </tr>
											  <tr class="akalink"> 
												<td align="left" valign="top" width="194"><font face="Arial, Helvetica, sans-serif" size="2"> 
												  <input  name="personal_city" value="<? print($_POST['contact']['city']); ?>" type="text" class="textfields" id="personal_city" size="31" maxlength="20">
												  </font></td>
												<td width="118"> <select name="personal_state" class="dropdowns" id="personal_state">
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
												  </select> </td>
												<td align="left" valign="top" width="147"><font face="Arial, Helvetica, sans-serif" size="2"> 
												  <input  name="personal_zip" value="<? print($_POST['contact']['zip']); ?>" type="text" class="textfields" id="personal_zip" size="10" maxlength="15">
												  </font></td>
											  </tr>
											</table>
										  </div>
										  <div id="canadapersonal" style="visibility: hidden; display: none;"> 
											<table width="472" border="0">
											  <tr class="akalink"> 
												<td width="466">Address: <span class="style1">*</span><font face="Arial, Helvetica, sans-serif" size="2"> 
												   <? $mail->MailErrorXMarkPrint($mail->mail_contact_img_error['address']); ?>
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
												  <? $mail->MailErrorXMarkPrint($mail->mail_contact_img_error['city']); ?>
												  </font></td>
												<td width="138" align="left">Province: 
												  * <font face="Arial, Helvetica, sans-serif" size="2"> 
												  <? $mail->MailErrorXMarkPrint($mail->mail_contact_img_error['state']); ?>
												  </font></td>
												<td width="128" align="left">Postal 
												  Code: *<font face="Arial, Helvetica, sans-serif" size="2"> 
												  <? $mail->MailErrorXMarkPrint($mail->mail_contact_img_error['zip']); ?>
												  </font></td>
											  </tr>
											  <tr class="akalink"> 
												<td align="left" valign="top" width="192"><font face="Arial, Helvetica, sans-serif" size="2"> 
												  <input  name="canada_personal_city" value="<? print($_POST['contact']['city']); ?>" type="text" class="textfields" id="canada_personal_city" size="31" maxlength="20">
												  </font></td>
												<td align="left" valign="top" width="138"> 
												  <select name="canada_personal_state" class="dropdowns" id="canada_personal_state">
													<option value="AB">Alberta</option>
													<option value="BC">British 
													Columbia</option>
													<option value="MB">Manitoba</option>
													<option value="NF">Newfoundland</option>
													<option value="NB">New Brunswick</option>
													<option value="NT">Northwest 
													Territories</option>
													<option value="NS">Nova Scotia</option>
													<option value="NU">Nunavut</option>
													<option value="ON">Ontario</option>
													<option value="PE">Prince 
													Edward Island</option>
													<option value="QC">Quebec</option>
													<option value="SK">Saskatchewan</option>
													<option value="YT">Yukon</option>
												  </select> </td>
												<td align="left" valign="top" width="128"><font face="Arial, Helvetica, sans-serif" size="2"> 
												  <input  name="canada_personal_zip" value="<? print($_POST['contact']['zip']); ?>" type="text" class="textfields" id="canada_personal_zip" size="12" maxlength="15">
												  </font></td>
											  </tr>
											</table>
										  </div>
										  <div id="outsidepersonal" style="visibility: hidden; display: none;"> 
											<table width="475" border="0">
											  <tr class="akalink"> 
												<td width="469">Address: <span class="style1">*</span><font face="Arial, Helvetica, sans-serif" size="2"> 
												  <? $mail->MailErrorXMarkPrint($mail->mail_contact_img_error['address']); ?>
												  </font><font face="Arial, Helvetica, sans-serif" size="2">&nbsp; 
												  </font></td>
											  </tr>
											  <tr class="akalink"> 
												<td width="469"><font face="Arial, Helvetica, sans-serif" size="2"> 
												  <input name="outside_personal_address" value="<? print($_POST['contact']['address']); ?>" type="text" class="textfields" id="outside_personal_address" size="35" maxlength="30">
												  </font></td>
											  </tr>
											</table>
											<table width="475" border="0">
											  <tr class="akalink"> 
												<td width="165" align="left">City: 
												  *<font face="Arial, Helvetica, sans-serif" size="2"> 
												  <? $mail->MailErrorXMarkPrint($mail->mail_contact_img_error['city']); ?>
												  </font></td>
												<td width="162" align="left">Province:</td>
												<td width="134" align="left">Postal 
												  Code: <font face="Arial, Helvetica, sans-serif" size="2">&nbsp; 
												  </font></td>
											  </tr>
											  <tr class="akalink"> 
												<td align="left" valign="top" width="165"><font face="Arial, Helvetica, sans-serif" size="2"> 
												  <input  name="outside_personal_city" value="<? print($_POST['contact']['city']); ?>" type="text" class="textfields" id="outside_personal_city" size="31" maxlength="20">
												  </font></td>
												<td align="left" valign="top" width="162"> 
												  <select name="outside_personal_state" class="dropdowns" id="outside_personal_state">
													<option value="UC">Outside 
													of U.S or Canada</option>
												  </select> </td>
												<td align="left" valign="top" width="134"><font face="Arial, Helvetica, sans-serif" size="2"> 
												  <input name="outside_personal_zip"  value="<? print($_POST['contact']['zip']); ?>" type="text" class="textfields" id="outside_personal_zip" size="10" maxlength="15">
												  </font></td>
											  </tr>
											</table>
										  </div>
										  <table width="416" border="0">
											<tr class="akalink"> 
											  <td width="197" align="left">Day 
												Time Telephone: <span class="style1">*</span><font face="Arial, Helvetica, sans-serif" size="2"><span class="akalink"><font face="Arial, Helvetica, sans-serif" size="2"> 
												 <? $mail->MailErrorXMarkPrint($mail->mail_contact_img_error['dtel']); ?>
												</font></span> </font></td>
											  <td width="14" align="left">&nbsp;</td>
											  <td width="191" align="left">Fax 
												Telephone:<font face="Arial, Helvetica, sans-serif" size="2"> 
												<span class="akalink"><font face="Arial, Helvetica, sans-serif" size="2"> 
												 <? $mail->MailErrorXMarkPrint($mail->mail_contact_img_error['etel']); ?>
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
											  <td height="10" valign="bottom" class="akalink">The information below is needed just incase you forget your password. <font color="#000000"><strong><br>
											    All 
												of your account information is 
												kept strictly confidential.</strong></font></td>
											</tr>
											<tr> 
											  <td align="left" valign="top"> <table width="408" border="0">
												  <tr class="akalink"> 
													<td width="174">Mothers Maiden 
													  Name:<span class="style1"> *</span>													  <? $mail->MailErrorXMarkPrint($mail->mail_contact_img_error['maiden']); ?>
													</td>
												  </tr>
												  <tr class="akalink"> 
													<td width="174"> <input  name="contact[maiden]" value="<? print($_POST['contact']['maiden']); ?>" type="password" class="textfields" size="25" maxlength="20"> 
													</td>
												  </tr>
												</table>
												<table width="408" border="0">
												  <tr class="akalink"> 
													<td width="174">Birth Date: <span class="style1">*</span>													  <? $mail->MailErrorXMarkPrint($mail->mail_contact_img_error['bdate']); ?>
													</td>
												  </tr>
												  <tr class="akalink"> 
													<td width="174"> <select name="contact[bdmonth]" class="dropdowns" id="month">
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
													  </select> <select name="contact[bdday]" class="dropdowns" id="day">
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
													  </select> <select name="contact[bdyear]" class="dropdowns" id="year">
														   <? if( $_POST['contact']['bdate'] != 0 ) { 
                                                          		
                                                          									list($year,$month,$day) = explode('-',$_POST['contact']['bdate']);
                                                          									print('<option value="' . $year . '">' . $year . '</option>'); 
                                                             								}
                                                         
                                                        							     for($year=date('Y')-5; $year>1905; $year--) { 
                                        	
                                        	 							            		print('<option value="' . $year . '">' . $year . '</option>');
                                              		     							     }
                                           		  							?>
													  </select> </td>
												  </tr>
												</table></td>
											</tr>
										  </table>
										  <table width="332" border="0">
											<tr> 
											  <td width="326" height="38" valign="bottom"> 
												<input name="register" type="image" id="savechanges" src="/img/btn_savechanges.gif" width="127" height="28" border="0"> 
											  </td>
											</tr>
										  </table></td>
									  </tr>
									</table></td>
								</tr>
							  </table></td>
						  </tr>
						</tbody>
					  </table></td>
				  </tr>
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
    </tbody> 
  </table>
  <? include($mail->tpl['html'] . '/footer.html'); ?>
</form>
</body>
</html>