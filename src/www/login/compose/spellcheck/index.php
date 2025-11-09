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

require($_SERVER['DOCUMENT_ROOT']  . '/include/akamail.class');
$mail = new Mail();
include($mail->tpl['html']. '/main_login/info_header.html'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<script type="text/javascript" src="speling.js"></script>
</head>
<body>
<?
if (isset($_GET['data'])) {

    $text 	= strip_tags(stripslashes($_GET['data']),'<P>');
    $num_errors = $mail->MailComposeSpellCheck($text);
    
    if ($num_errors > 0) {
     
        $errors 	= $mail->errors;
        $oldtext 	= $text;
      
        foreach ($errors as $word => $suggestions) {
       
            $title	= trim(implode(', ', $suggestions));
            $span 	= '<|||'.$title.'|||>'.$word.'</||>';
            $text 	= preg_replace("/(\W|^)$word(\W|\$)/i", "$1$span$2", $text);
        }
    }
    
    $text 	= str_replace('<|||', '<span class="speling" title="', $text);
    $text 	= str_replace('|||>', '">', $text);
    $text 	= str_replace('</||>', '</span>', $text);
    $text	= nl2br($text);
    $s 		= ($num_errors == 1) ? '' : 's';
    print 	"<p><strong>{$num_errors} Error{$s} Found...</strong></p>\n\n";
    print 	"<p class=\"displaytext\">$text</p>";
} 
?>
</body>
</html>