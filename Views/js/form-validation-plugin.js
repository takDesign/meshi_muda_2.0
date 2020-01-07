// customize validation for jquery.validate.min.js
$.validator.addMethod(
	"myregex",
	function (value, element, reg_str) {
		var re = new RegExp(reg_str);
		return re.test(value);
	},
	"Invalid input"
);

var pReg = /^(?=.*?[a-zA-Z])(?=.*?\d)(?=.*?[!-\/:-@[-`{-~])[!-~]/; // regular expression for password
var eReg = /.+@.+\..+/; // regular expression for email

$("#login").validate({
	rules: {
		email: {
			minlength: 5,
			maxlength: 100,
			myregex: eReg,
			required: true
		},
		password: {
			minlength: 8,
			maxlength: 100,
			// myregex: "^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)(?=.*?[!\"#$%&\'\(\)\*\+\-\.,\/:;<=>?@\[\\\]^_\`{|}~]",
			myregex: pReg,
			required: true
		}
	},
	messages: {
		email: {
			required: "Please enter valid email"
		},
		password: {
			required: "The password must contain at least 1 Uppercase character, lowercase character, number and special charactor."
		}
	}
});

$("#register").validate({
	rules: {
		strFirstName: {
			minlength: 2,
			maxlength: 100,
			myregex: "^[a-zA-Z]",
			required: true
		},
		strLastName: {
			minlength: 2,
			maxlength: 100,
			myregex: "^[a-zA-Z]",
			required: true
		},
		strEmail: {
			maxlength: 100,
			myregex: eReg,
			required: true
		},
		strUserName: {
			minlength: 2,
			maxlength: 100,
			myregex: "^[a-zA-Z]",
			required: true
		},
		strPassword: {
			minlength: 8,
			maxlength: 100,
			// myregex: "^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)(?=.*?[!\"#$%&\'\(\)\*\+\-\.,\/:;<=>?@\[\\\]^_\`{|}~]",
			myregex: pReg,
			required: true
		}
	},
	messages: {
		strFirstName: {
			required: "First name must have at least 2 charactors and contain only letters."
		},
		strLastName: {
			required: "Last name must have at least 2 charactors and contain only letters."
		},
		strEmail: {
			required: "Please enter valid email"
		},
		strUserName: {
			required: "The user name must have at least 2 charactors and contain only letters."
		},
		strPassword: {
			required: "The password must contain at least 1 Uppercase character, lowercase character, number and special charactor."
		}
	}
});

// Bootstrap validator script
// (function() {
// 	//anon funtion
// 	"use strict";
// 	window.addEventListener(
// 		"load",
// 		function() {
// 			// Fetch all the forms we want to apply custom styles to
// 			var forms = document.getElementsByClassName("needs-validation");
// 			// Loop over them and prevent submission on SUBMIT if the fields are vacant
// 			var validation = Array.prototype.filter.call(forms, function(form) {
// 				form.addEventListener(
// 					"submit",
// 					function(event) {
// 						if (form.checkValidity() === false) {
// 							event.preventDefault();
// 							event.stopPropagation();
// 						}
// 						form.classList.add("was-validated");
// 					},
// 					false
// 				);
// 			});
// 		},
// 		false
// 	);
// })();