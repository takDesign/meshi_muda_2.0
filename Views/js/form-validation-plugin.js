// customize validation for jquery.validate.min.js
$.validator.addMethod(
    "myregex",
    function(value, element, reg_str) {
        var re = new RegExp(reg_str);
        return re.test(value);
    },
    "Invalid input"
);

// var pReg = /^(?=.*?[a-zA-Z])(?=.*?\d)(?=.*?[!-\/:-@[-`{-~])[!-~]/; // regular expression for password
var pReg = /^(?=.*[0-9]+.*)(?=.*[a-zA-Z]+.*)[0-9a-zA-Z]{6,}$/; 
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
            myregex: pReg,
            required: true
        }
    },
    messages: {
        email: {
            required: "Please enter valid email"
        },
        password: {
            required:
                "The password must contain at least 1 Uppercase character, lowercase character, number and special charactor."
        }
    }
});

$("#register").validate({
    rules: {
        email: {
            maxlength: 100,
            myregex: eReg,
            required: true
        },
        password: {
            minlength: 8,
            maxlength: 100,
            myregex: pReg,
            required: true
        }
    },
    messages: {
        email: {
            required: "Please enter valid email."
        },
        password: {
            required: "Please enter valid password."
        }
    }
});
