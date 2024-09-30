"use strict";

var KTSignupGeneral = function () {
    var e, t, a, s;

    var isPasswordValid = function () {
        var score = s.getScore();
        console.log("Password Score:", score);
    
        return score === 50;
    };

    var formData = {};

    var formElements = document.getElementById('kt_sign_up_form').elements;

    function submitForm(formData) {
        var datas = {
            email: formData.email
        }
        return new Promise((resolve, reject) => {
            var xhrCheckEmail = new XMLHttpRequest();
            xhrCheckEmail.open('POST', 'Master/POST/POST.php', true);
            xhrCheckEmail.setRequestHeader('Content-Type', 'application/json');
            xhrCheckEmail.onreadystatechange = function () {
                if (xhrCheckEmail.readyState == 4 && xhrCheckEmail.status == 200) {
                    var response = JSON.parse(xhrCheckEmail.responseText);
                    console.log('response: ', response);
                    if (response.emailExists) {
                        resolve("failed");
                    } else {
                        resolve("success");
                        //submitFormData(formData);
                    }
                }
            };
            var data = { type: 'check_email', data: datas }; // Assuming `data` is your email data
            xhrCheckEmail.send(JSON.stringify(data));
        });
    }

    function submitFormData(formData) {
        // Make an AJAX request to insert user data
        var xhrInsertUser = new XMLHttpRequest();
        xhrInsertUser.open('POST', 'Master/POST/POST.php', true);
        xhrInsertUser.setRequestHeader('Content-Type', 'application/json');
        xhrInsertUser.onreadystatechange = function () {
            if (xhrInsertUser.readyState == 4 && xhrInsertUser.status == 200) {
                var response = JSON.parse(xhrInsertUser.responseText);
                if (response.isSave) {
                    Swal.fire({
                        text: "Account created successfully. Please login. Email verification was send your email. Please verify your account.",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Login Now",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(function (result) {

                        if (result.isConfirmed) {
                            e.reset();
                            s.reset();

                            window.location.href = "./step/students/login/";
                        }
                    });
                } else {
                    Swal.fire({
                        text: "Internal error occurred. Please try again later.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
            }
        };
        var data = { type: 'register', data: formData }; // Assuming `data` is your email data
        xhrInsertUser.send(JSON.stringify(data));
    }
    

    return {
        init: function () {
            e = document.querySelector("#kt_sign_up_form");
            t = document.querySelector("#kt_sign_up_submit");
            s = KTPasswordMeter.getInstance(e.querySelector('[data-kt-password-meter="true"]'));

            a = FormValidation.formValidation(e, {
                fields: {
                    email: {
                        validators: {
                            notEmpty: {
                                message: "Email address is required"
                            },
                            emailAddress: {
                                message: "The value is not a valid email address"
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: "The password is required"
                            },
                            callback: {
                                message: "Please enter a valid password",
                                callback: {
                                    message: "Please enter a valid password",
                                    callback: function (e) {
                                        console.log("Password Value:", e.value);
                                        console.log("Password Length:", e.value.length);
                                        console.log("Is Password Valid?", isPasswordValid());
                                
                                        if (e.value.length > 0) {
                                            return isPasswordValid();
                                        }
                                    }
                                }
                                
                            }
                        }
                    },
                    "confirm-password": {
                        validators: {
                            notEmpty: {
                                message: "The password confirmation is required"
                            },
                            identical: {
                                compare: function () {
                                    return e.querySelector('[name="password"]').value;
                                },
                                message: "The password and its confirmation are not the same"
                            }
                        }
                    },
                    toc: {
                        validators: {
                            notEmpty: {
                                message: "You must accept the terms and conditions"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger({
                        event: {
                            password: false
                        }
                    }),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            });

            t.addEventListener("click", function (r) {
                r.preventDefault();
                a.revalidateField("password");
                t.setAttribute("data-kt-indicator", "on");
                t.disabled = true;
                a.validate().then(function (validationStatus) {
                    if (validationStatus === "Valid") {

                        for (var i = 0; i < formElements.length; i++) {
                            formData[formElements[i].name] = formElements[i].value;
                        }
                        
                        submitForm(formData).then((response) => {
                            console.log('response: ', response);
                            if (response == 'success') {
                                submitFormData(formData);
                            } else {
                                Swal.fire({
                                    text: "Email already exists. Please use a different email address.",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                }).then(function (result) {
                                    t.setAttribute("data-kt-indicator", "off");
                                    t.disabled = false;
                                });
                            }
                        });
                        
                    } else {
                        Swal.fire({
                            text: "Please fill the required items.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then(function (result) {
                            t.setAttribute("data-kt-indicator", "off");
                            t.disabled = false;
                        });
                    }
                });
            });

            e.querySelector('input[name="password"]').addEventListener("input", function () {
                if (this.value.length > 0) a.updateFieldStatus("password", "NotValidated");
            });
        }
    };
}();

KTUtil.onDOMContentLoaded(function () {
    KTSignupGeneral.init();
});
