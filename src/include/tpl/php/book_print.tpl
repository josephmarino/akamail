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

// Addressbook printable view

// Template prints out the users addressbook contacts in a neat printable format allowing the user to print
// their selected contacts or group contacts onto paper

// URL: /login/addressbook/print/view/

$template = <<< HERE

<TABLE width="600" border=0 align="center" cellpadding=0 cellspacing=0 class="akalink">
  <TR class="akalink"> 
    <TD width=50% valign=top><img src="/img/thug_mansion.gif" width="600" height="1"></td>
  </tr>
  <tr> 
    <td colspan=5 align="left" valign="top"><TABLE width="100%" cellpadding=4 cellspacing=0 border=0>
        <TR bgcolor="#EEFBF4" class="headc"> 
          <TD width="100%" class="akalink"><B><font color="#000000" size="2">$contactarr[name]</font></B></TD>
        </TR>
      </TABLE></td>
  </tr>
  <tr> 
    <td colspan=5 align="left" valign="top"><img src="/img/thug_mansion.gif" width="600" height="1"></td>
  </tr>
</table>
<TABLE width="600" border=0 align="center" cellpadding=0 cellspacing=0 class="akalink">
  <tr> 
    <td align="left" valign="top"><TABLE width="100%" border=0 cellpadding=4 cellspacing=0>
        <TR class="akalink"> 
          <TD width="50%" align="left" valign=top>
		$contactarr[pheader]
		$contactarr[paddress]
		$contactarr[pcountry]
		$contactarr[ptel]
		$contactarr[pftel]
		$contactarr[pctel]
		$contactarr[pptel]
		$contactarr[pemail]
            	<BR></TD>
          <TD width="50%" align="left" valign=top>
		$contactarr[bheader]
		$contactarr[bcompany]
		$contactarr[baddress]
		$contactarr[bcountry]
		$contactarr[btel]
		$contactarr[bftel]
		$contactarr[bemail]
             </TD>
        </TR>
      </TABLE></td>
  </tr>
</table>
$contactarr[notes]

HERE;
?>
