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

if( !isset($_GET['cid']) || !$mail->MailBookContactIs($_GET['cid']) ) {
	
	$_SESSION['result'] = $mail->errorcode['104'];
	header('Location: http://' . $mail->server['main'] . '/login/addressbook');
	exit();
}

if( isset($_SESSION['result']) ) {

	$mail->error['result'] = $_SESSION['result'];
	unset($_SESSION['result']);
}

$mail->MailBookContactList($_GET['cid']);
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


<STYLE type=text/css>
@import url("/css/aka.css");

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
                    <td height="204" align="left" valign="top"><table width="714" height="117" border=0 cellpadding=0 cellspacing=0>
                        <tbody>
                          <tr> 
                            <td width="714" height="117" align="left" valign="top" bgcolor=#B8B7B7 class="akalink"> 
                              <table width="100%" cellpadding="2" cellspacing="1">
                                <tr bgcolor="#ebebe3" class="akalink"> 
                                  <td width="746" height="113" align="left" valign="top" bgcolor="#FFFFFF"><table width="75%" border="0" cellpadding="0" cellspacing="0">
                                      <tr> 
                                        <td><font color="#FFFFFF" size="1">o</font></td>
                                      </tr>
                                    </table>
                                    
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                      <tr> 
                                        <td height="97" align="left" valign="top"><table width="626" border="0" cellpadding="0" cellspacing="0">
                                            <tr class="akalink"> 
                                              <td width="10" align="left" valign="middle">&nbsp;</td>
                                              <td width="616" align="left" valign="middle"><strong><font color="#000000">Summary 
                                                of information for <? print($mail->mail_book_contact_list['pfname'] . ' ' . $mail->mail_book_contact_list['pmname'] . ' ' . $mail->mail_book_contact_list['plname']); ?></font></strong></td>
                                            </tr>
                                          </table>
                                          <table width="626" border="0" cellpadding="0" cellspacing="0">
                                            <tr class="akalink"> 
                                              <td width="10" align="left" valign="middle">&nbsp;</td>
                                              <td width="616" align="left" valign="middle"><hr size="1" noshade></td>
                                            </tr>
                                          </table>
				
				  <? if( isset($mail->mail_book_contact_list['pfname']) ) { ?>
					
					    <table width="626" border="0" cellpadding="0" cellspacing="0">
                                            <tr class="akalink"> 
                                            <td width="12" height="18" align="left" valign="middle">&nbsp;</td>
                                            <td width="614" align="left" valign="top"><strong><font color="#000000">Personal 
                                             Contact Information: </font></strong></td>
                                             </tr>
                                             </table>
                                          
					    <table width="628" border="0">
                                            <tr class="akalink"> 
                                            <td width="6" align="left" valign="middle">&nbsp;</td>
                                            <td width="140" align="left" valign="middle">Full 
                                            Name:</td>
                                            <td width="468"><? print($mail->mail_book_contact_list['pfname'] . ' ' . $mail->mail_book_contact_list['pmname'] . ' ' . $mail->mail_book_contact_list['plname']); ?></td>
                                            </tr>
					    </table>
											                                     
                                    <? if( $mail->mail_book_contact_list['pbdate'] != 0 ) { ?>
                                     		
                                     		<? list($year,$month,$day) = explode('-',$mail->mail_book_contact_list['pbdate']); ?>
                                     		
                                      		<table width="628" border="0">
                                   		<tr class="akalink"> 
                                       	 	<td width="6" align="left" valign="middle">&nbsp;</td>
                                                <td width="140" align="left" valign="middle">Birthday:</td>
                                                <td width="468"><? print(date('M jS, Y',mktime(0,0,0,$month,$day,$year))) ?> </td>
                                                </tr>
                                                </table>
                                     <? } ?>
                                     
                                     <? 	
					$address	= (isset($mail->mail_book_contact_list['paddress'])) ? $mail->mail_book_contact_list['paddress'] . ', ' : NULL;
                                     	$city 		= (isset($mail->mail_book_contact_list['pcity']))    ? $mail->mail_book_contact_list['pcity'] . ', ' : NULL;
                                     	$state 		= (!empty($mail->mail_book_contact_list['pstate'])   && $mail->mail_book_contact_list['pstate'] != 'UN') ? $mail->mail_book_contact_list['pstate'] . ', ' : NULL;
                                     	$zip 		= (isset($mail->mail_book_contact_list['pzip']))     ? $mail->mail_book_contact_list['pzip'] . ', ' : NULL;
                                        ($state == 'UC, ') ? $state = 'Outside U.S or Canada, ' : NULL;    		
                                      	
                                      	if( !empty($mail->mail_book_contact_list['pcountry']) && $mail->mail_book_contact_list['pcountry'] != 'UN' ) {
                                      		
                                      		$country = $mail->MailContactCountryPrint($mail->mail_book_contact_list['pcountry']);
                                      		
                                      	}
                                      	
                                      	if( $mail->mail_book_contact_list['pcountry'] == 'UN' ) {
                                      			
                                      		$mail->mail_book_contact_list['pcountry'] = '';
                                      	}
                                      		
                                      	if( !empty($address) && !empty($city) && !empty($state) && !empty($zip) ) {
                                      			
                                      		$location 	= $address . $city . $state . $zip . $country;
                                      		$href		= '<a href="http://www.mapquest.com/maps/map.adp?country=' . urlencode($mail->mail_book_contact_list['pcountry'])  . '&address=' . urlencode($mail->mail_book_contact_list['paddress']) . '&city=' . urlencode($mail->mail_book_contact_list['pcity']) . '&state=' . urlencode($mail->mail_book_contact_list['pstate']) . '&zipcode=' . urlencode($mail->mail_book_contact_list['pzip']) . '" target="_blank">' . $location . '</a>';  
                                	
                                	} elseif( !empty($city) && !empty($state) ) {
                                		
                                		$location	= $address . $city . $state . $zip . $country;
                                      		$href 		= '<a href="http://www.mapquest.com/maps/map.adp?country=' . urlencode($mail->mail_book_contact_list['pcountry'])  . '&city=' . urlencode($mail->mail_book_contact_list['pcity']) . '&state=' . urlencode($mail->mail_book_contact_list['pstate']) . '" target="_blank">' . $location . '</a>';  
                                      	
                                      	} else {
                                      		
                                      		$href 		= $address . $city . $state . $zip . $country;
                                      	}
                                      	
                                      	if( !empty($address) || !empty($city) || !empty($state) || !empty($zip) || !empty($country) ) {
                                      	
                                     		print('<table width="628" border="0">
                                        	<tr class="akalink"> 
                                        	<td width="6" align="left" valign="middle">&nbsp;</td>
                                        	<td width="140" align="left" valign="middle">Home Address: </td>
                                        	<td>' . $href  . '</td>
                                        	</tr>
                                        	</table>');
                                         }
                                    ?>
                                    
                                    <? if( isset($mail->mail_book_contact_list['ptel']) ) { ?>
                                    
                                    	   <table width="628" border="0">
                                           <tr class="akalink"> 
                                           <td width="6">&nbsp;</td>
                                           <td width="140">Home Phone:</td>
                                           <td width="468"> <? print($mail->mail_book_contact_list['ptel']); ?> 
                                           </td>
                                           </tr>
                                           </table>
                                           
                                   <? } ?>
                     
                                   <? if( isset($mail->mail_book_contact_list['pftel']) ) { ?>
                                      
                                      	  <table width="628" border="0">
                                          <tr class="akalink"> 
                                          <td width="6">&nbsp;</td>
                                          <td width="140">Home Fax:</td>
                                          <td> <? print($mail->mail_book_contact_list['pftel']); ?> </td>
                                          </tr>
                                          </table>
                                     
                                    <? } ?>
                                      
                                    <? if( isset($mail->mail_book_contact_list['pptel']) ) { ?>
                                      
                                      		<table width="628" border="0">
                                                <tr class="akalink"> 
                                                <td width="6">&nbsp;</td>
                                                <td width="140">Pager:</td>
                                                <td width="468"><? print($mail->mail_book_contact_list['pptel']); ?> </td>
                                                </tr>
                                                </table>
                                     <? } ?>
                                      
                                     <? if( isset($mail->mail_book_contact_list['pctel']) ) { ?>
                                      
                                      	  	   <table width="628" border="0">
                                      	           <tr class="akalink"> 
                                                   <td width="6">&nbsp;</td>
                                                   <td width="140">Cellular Phone:</td>
                                                   <td width="468"><? print($mail->mail_book_contact_list['pctel']); ?></td>
                                                   </tr>
                                                   </table>
                          	      <? } ?>
                          	                   
                                      <? if( isset($mail->mail_book_contact_list['purl']) ) { ?>
                                      
                                      		   <table width="628" border="0">
                                                   <tr class="akalink"> 
                                                   <td width="6">&nbsp;</td>
                                                   <td width="140">Personal Web Site:</td>
                                                   <td width="468"><a href="http://<? print($mail->mail_book_contact_list['purl']); ?>" target="_blank"><? print($mail->mail_book_contact_list['purl']); ?></a></td>
                                                   </tr>
                                                   </table>
                                      <? } ?>
                                      
                                      <? if( isset($mail->mail_book_contact_list['pemail']) ) { ?>
                                     
                                      		   <table width="628" border="0">
                                                   <tr class="akalink"> 
                                                   <td width="6">&nbsp;</td>
                                                   <td width="140">Personal E-Mail:</td>
                                                   <td width="468"><a href="/login/compose/?to=<? print(urlencode($mail->mail_book_contact_list['pemail']) . '">' . $mail->mail_book_contact_list['pemail']); ?></a></td>
                                                   </tr>
                                                   </table>
                                      <? } ?>
                                      
                                      <? if( isset($mail->mail_book_contact_list['picq']) ) { ?>
                                      
                                      		<table width="628" border="0">
						<tr class="akalink">
                                       		<td width="6">&nbsp;</td>
                                        	<td width="140">ICQ UIN:</td>
                                        	<td width="468"><a href="http://people.icq.com/wwp/<? print($mail->mail_book_contact_list['picq'] . ' " target="_blank">' . $mail->mail_book_contact_list['picq']);?></a></td>
                                      		</tr></table>
                                      <? } ?>
                                      
                                      <? if( isset($mail->mail_book_contact_list['paim']) ) { ?>
                                      
                                      		<table width="628" border="0">
						<tr class="akalink">
                                        	<td width="6">&nbsp;</td>
                                        	<td width="140">AIM Screen Name:</td>
                                        	<td width="468"><a href="aim:goim?screenname=<? print($mail->mail_book_contact_list['paim'] . '">' . $mail->mail_book_contact_list['paim']); ?></a></td>
                                      		</tr></table>
                                      <? } ?>
                                    
                                      <? if( isset($mail->mail_book_contact_list['pmsn']) ) { ?>
                                      
                                      		<table width="628" border="0">
						<tr class="akalink">
                                        	<td width="6">&nbsp;</td>
                                        	<td width="140">MSN Sign-In Name:</td>
                                                <td width="468"><a href=/login/compose/?to=<? print(urlencode($mail->mail_book_contact_list['pmsn']) . '>' . $mail->mail_book_contact_list['pmsn']); ?> </a></td>
                                      		</tr></table>
                                     <? } ?>
                                        
                                     </table>
                                     
                                   <? } ?>
                                   
                                   <? 
                                   if( isset($mail->mail_book_contact_list['bcompany']) || isset($mail->mail_book_contact_list['bposition']) ||
                                       isset($mail->mail_book_contact_list['baddress']) || isset($mail->mail_book_contact_list['bcity']) ||
                                       isset($mail->mail_book_contact_list['bstate']) || isset($mail->mail_book_contact_list['bcountry']) || 
                                       isset($mail->mail_book_contact_list['bzip']) || isset($mail->mail_book_contact_list['btel']) ||
                                       isset($mail->mail_book_contact_list['bftel']) || isset($mail->mail_book_contact_list['burl']) ||
                                       isset($mail->mail_book_contact_list['bemail']) ) { ?>
                                                
                                          	<table width="626" border="0" cellpadding="0" cellspacing="0">
                                            	<tr class="akalink"> 
                                              	<td width="10" align="left" valign="middle">&nbsp;</td>
                                              	<td width="616" align="left" valign="middle"><hr size="1" noshade></td>
                                            	</tr>
                                          	</table>
                                          	<table width="626" border="0" cellpadding="0" cellspacing="0">
                                            	<tr class="akalink"> 
                                              	<td width="12" height="18" align="left" valign="middle">&nbsp;</td>
                                              	<td width="614" align="left" valign="top"><strong><font color="#000000">Business 
                                                Contact Information: </font></strong></td>
                                            	</tr>
                                          	</table>
                                           
                                      
                                      	<? if( isset($mail->mail_book_contact_list['bcompany']) ) { ?>
                                      
                                      		<table width="628" border="0">
						<tr class="akalink"> 
    						<td width="6">&nbsp;</td>
    						<td width="140">Company Name:</td>
    						<td width="468"><? print($mail->mail_book_contact_list['bcompany']); ?></td>
  						</tr></table>
                                      	<? } ?>
                                      
                                         <? if( isset($mail->mail_book_contact_list['bposition']) ) { ?>
                                      
                                      		<table width="628" border="0"> 
					        <tr class="akalink"> 
						<td width="6">&nbsp;</td>
						<td width="140">Job Position:</td>
						<td width="468"><? print($mail->mail_book_contact_list['bposition']); ?></td>
						</tr></table>
                                         
                                         <? } ?>
                                    
                                    	 <?
                                    	 	unset($address); unset($city); unset($state); unset($zip); unset($country);
                                     		$address= (isset($mail->mail_book_contact_list['baddress'])) ? $mail->mail_book_contact_list['baddress'] . ' ' : NULL;
                                     		$city	= (isset($mail->mail_book_contact_list['bcity']))    ? $mail->mail_book_contact_list['bcity'] . ', ' : NULL;
                                     		$state	= (!empty($mail->mail_book_contact_list['bstate'])   && $mail->mail_book_contact_list['bstate'] != 'UN') ? $mail->mail_book_contact_list['bstate'] . ', ' : NULL;
                                     		$zip	= (isset($mail->mail_book_contact_list['bzip']))      ? $mail->mail_book_contact_list['bzip'] . ', ' : NULL;
                                     		($state == 'UC, ') ? $state = 'Outside U.S or Canada, ' : NULL;    
                                      
                                      		if( !empty($mail->mail_book_contact_list['bcountry']) && $mail->mail_book_contact_list['bcountry'] != 'UN' ) {
                                      		
                                      			$country = $mail->MailContactCountryPrint($mail->mail_book_contact_list['bcountry']);
                                      		}
                                      			
                                      	if( $mail->mail_book_contact_list['bcountry'] == 'UN' ) {
                                      			
                                      		$mail->mail_book_contact_list['bcountry'] = '';
                                      	}
                                      		
                                      	if( !empty($address) && !empty($city) && !empty($state) && !empty($zip) ) {
                                      			
                                      		$location	= $address . $city . $state . $zip . $country;
                                      		$href 		= '<a href="http://www.mapquest.com/maps/map.adp?country=' . urlencode($mail->mail_book_contact_list['bcountry'])  . '&address=' . urlencode($mail->mail_book_contact_list['baddress']) . '&city=' . urlencode($mail->mail_book_contact_list['bcity']) . '&state=' . urlencode($mail->mail_book_contact_list['bstate']) . '&zipcode=' . urlencode($mail->mail_book_contact_list['bzip']) . '" target="_blank">' . $location . '</a>';  
                                	
                                	} elseif( !empty($city) && !empty($state) ) {
                                		
                                		$location	= $address . $city . $state . $zip . $country;
                                      		$href 		= '<a href="http://www.mapquest.com/maps/map.adp?country=' . urlencode($mail->mail_book_contact_list['bcountry'])  . '&city=' . urlencode($mail->mail_book_contact_list['bcity']) . '&state=' . urlencode($mail->mail_book_contact_list['bstate']) . '" target="_blank">' . $location . '</a>';  
                                      	
                                      	} else {
                                      		
                                      		$href 		= $address . $city . $state . $zip . $country;
                                      	}
                                      	
                                      	if( !empty($address) || !empty($city) || !empty($state) || !empty($zip) || !empty($country) ) {
                                      		 	
                                      		print('<table width="628" border="0">
						<tr class="akalink">
                                        	<td width="6">&nbsp;</td>
                                        	<td width="140">Business Address:</td>
                                        	<td width="468">' . $href . '</td>
                                      		</tr>');
                                       }
                                      
                                      ?>
                                      <? if( isset($mail->mail_book_contact_list['btel']) ) { ?>
                                      
                                      		<table width="628" border="0">
						<tr class="akalink"> 
						<td width="6">&nbsp;</td>
						<td width="140">Business Phone:</td>
						<td width="468"><? print($mail->mail_book_contact_list['btel'] . ' ' . $mail->mail_book_contact_list['btelext']); ?> </tr>
                                      <? } ?>
                                      
                                      <? if( isset($mail->mail_book_contact_list['bftel']) ) { ?>
                                      
                                      		<table width="628" border="0">
						<tr class="akalink"> 
						<td width="6">&nbsp;</td>
						<td width="140">Business Fax:</td>
    						<td width="468"><? print($mail->mail_book_contact_list['bftel']); ?></tr>
                                     <? } ?>
                                             
                                     <?  if( isset($mail->mail_book_contact_list['burl']) ) { ?>
                                      
                                      		<table width="628" border="0">
						<tr class="akalink">
                                        	<td width="6">&nbsp;</td>
                                        	<td width="140">Business Web Site:</td>
						<td width="468"><a href="http://<? print($mail->mail_book_contact_list['burl'] . '" target="_blank">' . $mail->mail_book_contact_list['burl']); ?></a></td>
						</tr>
                                      <? } ?>
                                         
                                      
                                     <? if( isset($mail->mail_book_contact_list['bemail']) ) { ?>
                                      
                                      		<table width="628" border="0">
						<tr class="akalink"> 
						<td width="6">&nbsp;</td>
						<td width="140">Business E-Mail:</td>
						<td width="468"><a href="/login/compose/?to=<? print(urlencode($mail->mail_book_contact_list['bemail']) . '">' . $mail->mail_book_contact_list['bemail']); ?></a></td>
						</tr>
                                     <? } ?>
                                         
                                           </table>
				
				     <? } ?>
					
				<? if( isset($mail->mail_book_contact_list['notes']) ) { ?>
					
					
                                          	<table width="75%" border="0" cellpadding="0" cellspacing="0"><tr> <td><font color="#FFFFFF" size="1">o</font></td></tr></table>
						<table width="626" border="0" cellpadding="0" cellspacing="0">
  						<tr class="akalink"> 
    						<td width="10" align="left" valign="middle">&nbsp;</td>
    						<td width="616" align="left" valign="middle"><hr size="1" noshade></td>
  						</tr>
						</table>
						<table width="626" border="0" cellpadding="0" cellspacing="0">
						<tr class="akalink"> 
						<td width="10" align="left" valign="middle">&nbsp;</td>                        	
    						<td width="616" align="left" valign="middle"><strong><font color="#000000">Notes and other information:</font></strong></td></tr>
						</table> 
						<table width="626" border="0" cellpadding="0" cellspacing="0">
						<tr class="akalink"> 
						<td width="10" height="19" align="left" valign="middle">&nbsp;</td>
						<td width="616" align="left" valign="middle"><table width="615" border="0"><tr> 
					        <td width="609" align="left" valign="top" class="akalink"><a href="http://<? print($mail->server['main'] . '/login/addressbook/edit/other?cid=' . $_GET['cid'] . '">' . htmlspecialchars(substr($mail->mail_book_contact_list['notes'],0,64))); ?>... </a></td>
						</tr></table></td></tr></table>
					<? } ?>									  
					
                                          <table width="626" border="0" cellpadding="0" cellspacing="0">
                                            <tr class="akalink"> 
                                              <td width="10" align="left" valign="middle">&nbsp;</td>
                                              <td width="616" align="left" valign="middle"><strong></strong></td>
                                            </tr>
                                          </table>
                                          <table width="437" border="0">
                                            <tr> 
                                              <td width="119" height="37">&nbsp;</td>
                                              <td width="141" valign="bottom"> 
                                                <a href="/login/addressbook/edit/personal/?cid=<?print($_GET['cid']); ?>"><img src="/img/btn_edit_entry_addr.gif" width="136" height="28" border="0" onMouseOver="window.status='Edit this persons information'; return true;" onMouseOut="window.status=''; return true;"></a></td>
                                              <td width="163" valign="bottom"><a href="/login/addressbook/"><img src="/img/btn_cancel29393.gif" width="100" height="28" border="0" onMouseOver="window.status=' '; return true;" onMouseOut="window.status=''; return true;"></a></td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                    </table> </td>
                                </tr>
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