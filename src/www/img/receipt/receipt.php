<?
require($_SERVER['DOCUMENT_ROOT'] . '/include/akamail.class');
$mail = new Mail();

if( isset($_GET['rid']) ) {

	if( $mail->MailReceiptIs($_GET['rid']) ) {

		$mail->MailReceiptUpdate($_GET['rid']);
	}
}

header('Content-Type: image/gif');
header('Content-Disposition: inline; filename="receipt1x1.gif"');
readfile('./receipt1x1.gif');
?>
