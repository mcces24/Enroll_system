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
        // Create a data object with email and password
        

        // Make an AJAX request to the PHP script
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'insert_user.php', true);
        xhr.setRequestHeader('Content-Type', 'application/json');

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Handle the response from the server if needed
                console.log('formData: ', formData);
            }
        };

        // Send the data as JSON in the request body
        xhr.send(JSON.stringify(formData));
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
                a.validate().then(function (validationStatus) {
                    if (validationStatus === "Valid") {
                        

                        for (var i = 0; i < formElements.length; i++) {
                            formData[formElements[i].name] = formElements[i].value;
                        }

                        submitForm(formData);

                        t.setAttribute("data-kt-indicator", "on");
                        t.disabled = true;
                        setTimeout(function () {
                            t.removeAttribute("data-kt-indicator");
                            t.disabled = false;
                            Swal.fire({
                                text: "Account created success!",
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

                                    window.location.href = "./step/students/login/index.php";
                                }
                            });
                        }, 1500);
                    } else {
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
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
