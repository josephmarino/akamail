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

// Displays the users address book entries in alphabetical order allows them to select a letter from the alphabet
// quickly and will display the current entries beginning with that letter

// URL: /login/addressbook/
// As you can see this is the top navigation that displays the letters that contain links are letters
// that lead to addressbook entries

$template = <<< HERE

       <table width="100%" border=0 cellpadding=0 cellspacing=1 class="akalink">
        <tbody> 
        <tr valign="middle" bgcolor="#ffffff"> 
        <td height="27"> 
        
      <div align="center"><b><font color="#000000">&nbsp;</font></b>$letterarr[A]<font color="#FFFFFF"> 
        - </font>$letterarr[B]<font color="#FFFFFF"> - </font>$letterarr[C]<font color="#FFFFFF"> 
        - </font>$letterarr[D]<font color="#FFFFFF"> - </font>$letterarr[E]<font color="#FFFFFF"> 
        - </font>$letterarr[F]<font color="#FFFFFF"> - </font>$letterarr[G]<font color="#FFFFFF"> 
        - </font>$letterarr[H]<font color="#FFFFFF"> - </font>$letterarr[I]<font color="#FFFFFF"> 
        - </font>$letterarr[J]<font color="#FFFFFF"> - </font>$letterarr[K]<font color="#FFFFFF"> 
        - </font>$letterarr[L]<font color="#FFFFFF"> - </font>$letterarr[M]<font color="#FFFFFF"> 
        - </font>$letterarr[N]<font color="#FFFFFF"> - </font>$letterarr[O]<font color="#FFFFFF"> 
        - </font>$letterarr[P]<font color="#FFFFFF"> - </font>$letterarr[Q]<font color="#FFFFFF"> 
        - </font>$letterarr[R]<font color="#FFFFFF"> - </font>$letterarr[S]<font color="#FFFFFF"> 
        - </font>$letterarr[T]<font color="#FFFFFF"> - </font>$letterarr[U]<font color="#FFFFFF"> 
        - </font>$letterarr[V]<font color="#FFFFFF"> - </font>$letterarr[W]<font color="#FFFFFF"> 
        - </font>$letterarr[X]<font color="#FFFFFF"> - </font>$letterarr[Y]<font color="#FFFFFF"> 
        - </font>$letterarr[Z]<font color="#000000"> - </font>$letterarr[ALL] 
        - $letterarr[GROUP]</div>
        </td>
        </tr>
        </tbody> 
        </table>

HERE;
?>
