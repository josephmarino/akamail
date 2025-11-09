///
// +--------------------------------------------------------------------------------------------------------+
// | AKA Mail - Revision 1.0                                                                                |
// | Copyright (c) 2003 AKA Link Communications Corporation                                                 |
// +--------------------------------------------------------------------------------------------------------+
// | Author: Jeremy Anderson <jeremy@jaydoublay.com>                                                        |
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

function isBlank(s) {
	var blank = 0;
	
	for (var k = 0; k < s.length; k++) {
		var c = s.charAt(k);
		if ((c != ' ') && (c != '\n') && (c != '\t')) {
			blank++;
		}
	}
	if (blank < 1) {
		return true;
	}
	else {
		return false;
	}
}

function validateEntry(field) {
	var value;
	value = field.value;

	if ((value == null) || (value == "") || isBlank(value)) {
		alert("Please enter a value.");
		field.value = "";
		field.focus();
		return false;
	}
	return true;
}
