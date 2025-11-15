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

// Template for the e-mail message that is sent back to users who e-mail an unknown address

// URL: None (Internal Function)

$template = <<< HERE

Hello $sender,

	I am the Postmaster from AKALink Communications I regret to inform you that your e-mail to $recipient has not been delivered.
$recipient no longer exists on the AKALink Global IP Network. Please try and contact this person by other means.


Regards,

AKALink Postmaster

http://www.akalink.com
AKALink Communications - Also Known As Your Link To The World.

________________________________________________________________________________

   Visit our Site at http://www.akalink.com

   AKALink is an International ISP that services small and large sized businesses, including ISPs.

________________________________________________________________________________
HERE;

?>
