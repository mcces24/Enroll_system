"use strict";

// Class definition
var KTCreateAccount = function () {
	// Elements
	var modal;	
	var modalEl;

	var stepper;
	var form;
	var formSubmitButton;
	var formContinueButton;

	// Variables
	var stepperObj;	
	var validations = [];
	// var formData = {};
	var formElements = document.getElementById('kt_create_account_form').elements;

	var selectElement = document.getElementById('kt_select2_9');


	 const selectedValues = Array.from(document.getElementById('kt_select2_9').selectedOptions).map(option => option.value);

	// Add the selected values to the form data
	const formData = new FormData(document.getElementById('kt_create_account_form'));
	formData.append('acafail', selectedValues);

	function saveFormDataToDatabaseStep1(formData) {
		return new Promise((resolve, reject) => {
			// Create a new XMLHttpRequest
			var xhr = new XMLHttpRequest();
			xhr.open('POST', '../Master/POST/POSTS.php', true);
			xhr.setRequestHeader('Content-Type', 'application/json');
	
			// Define what happens on successful data submission
			xhr.onreadystatechange = function () {
				if (xhr.readyState == 4) {
					if (xhr.status == 200) {
						console.log(formData); // Log the form data
						resolve(xhr.responseText); // Resolve the promise with the response
					} else {
						reject('Error: ' + xhr.status); // Reject the promise on error
					}
				}
			};
	
			// Prepare the data to send
			var data = { type: 'saveApplicantGuidanceRecord', data: formData };
			xhr.send(JSON.stringify(data)); // Send the JSON data
		});
	}

	function submitForm(formData) {
		return new Promise((resolve, reject) => {
			// Make an AJAX request to the PHP script
			var xhr = new XMLHttpRequest();
			xhr.open('POST', '../Master/POST/POST.php', true);
			xhr.setRequestHeader('Content-Type', 'application/json');
	
			xhr.onreadystatechange = function () {
				if (xhr.readyState == 4) {
					if (xhr.status == 200) {
						// Handle the response from the server if needed
						console.log('Response from server:', xhr.responseText);
						console.log(formData); // Log the form data
						resolve(xhr.responseText); // Resolve the promise with the response
					} else {
						// Reject the promise if there's an error
						reject('Error: ' + xhr.status);
					}
				}
			};
	
			// Prepare the data to send
			var data = { type: 'updateApplicantStatus', data: formData };
			xhr.send(JSON.stringify(data)); // Send the JSON data
		});
	}

	// Private Functions
	var initStepper = function () {
		// Initialize Stepper
		stepperObj = new KTStepper(stepper);

		// Stepper change event
		stepperObj.on('kt.stepper.changed', function (stepper) {
			if (stepperObj.getCurrentStepIndex() === 8) {
				formSubmitButton.classList.remove('d-none');
				formSubmitButton.classList.add('d-inline-block');
				formContinueButton.classList.add('d-none');
			} else if (stepperObj.getCurrentStepIndex() === 9) {
				formSubmitButton.classList.add('d-none');
				formContinueButton.classList.add('d-none');
			} else {
				formSubmitButton.classList.remove('d-inline-block');
				formSubmitButton.classList.remove('d-none');
				formContinueButton.classList.remove('d-none');
			}
		});

		// Validation before going to next page
		stepperObj.on('kt.stepper.next', function (stepper) {
			console.log('stepper.next');

			// Validate form before change stepper step
			var validator = validations[stepper.getCurrentStepIndex() - 1]; // get validator for currnt step

			if (validator) {
				validator.validate().then(function (status) {
					console.log('validated!');

					if (status == 'Valid') {

						

						for (var i = 0; i < formElements.length; i++) {
							if (formElements[i].type === 'radio' && formElements[i].checked) {
						        formData[formElements[i].name] = formElements[i].value;
						    } else if (formElements[i].type === 'checkbox') {
							      if (formElements[i].checked) {
							        if (!formData[formElements[i].name]) {
							          formData[formElements[i].name] = [];
							        }
							        formData[formElements[i].name].push(formElements[i].value);
							      }
						    } else if (formElements[i].type === 'text') {
						        
						        if (formElements[i].value == '') {
						        	formData[formElements[i].name] = 'None';
						        } else {
						        	formData[formElements[i].name] = formElements[i].value;
						        }
						    }
						}


						saveFormDataToDatabaseStep1(formData)
							.then(response => {
								console.log('Data saved successfully:', response);

								stepper.goNext();
						
								KTUtil.scrollTop();
							})
							.catch(error => {
								console.error('Failed to save data:', error);
								Swal.fire({
									text: "There are some errors in your submission. Please try again.",
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Okay",
									customClass: {
										confirmButton: "btn btn-success"
									}
								}).then(function () {
									// KTUtil.scrollTop();
								});
							});
					} else {
						Swal.fire({
							text: "Please fill the required items.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn btn-success"
							}
						}).then(function () {
							// KTUtil.scrollTop();
						});
					}
				});
			} else {
				stepper.goNext();

				KTUtil.scrollTop();
			}
		});

		// Prev event
		stepperObj.on('kt.stepper.previous', function (stepper) {
			console.log('stepper.previous');

			stepper.goPrevious();
			KTUtil.scrollTop();
		});
	}

	

	var handleForm = function() {
		formSubmitButton.addEventListener('click', function (e) {
			// Validate form before change stepper step
			var validator = validations[7]; // get validator for last form

			validator.validate().then(function (status) {
				console.log('validated!');
				
				if (status == 'Valid') {

					for (var i = 0; i < formElements.length; i++) {
						if (formElements[i].type === 'radio' && formElements[i].checked) {
					        formData[formElements[i].name] = formElements[i].value;
					    } else if (formElements[i].type === 'checkbox') {
						      if (formElements[i].checked) {
						        if (!formData[formElements[i].name]) {
						          formData[formElements[i].name] = [];
						        }
						        formData[formElements[i].name].push(formElements[i].value);
						      }
					    } else if (formElements[i].type === 'text') {
					        if (formElements[i].value == '') {
						        	formData[formElements[i].name] = 'None';
						        } else {
						        	formData[formElements[i].name] = formElements[i].value;
						        }
					    }
					    var selectedOptions = Array.from(selectElement.selectedOptions).map(option => option.value);
  						formData['acafail'] = selectedOptions;
					}

					// Prevent default button action
					e.preventDefault();

					// Disable button to avoid multiple click 
					formSubmitButton.disabled = true;
								
					// Show loading indication
					formSubmitButton.setAttribute('data-kt-indicator', 'on');

					saveFormDataToDatabaseStep1(formData)
						.then(response => {
							console.log('Data saved successfully111:', response);

							submitForm(formData)
								.then(response => {
									console.log('Status updated submitForm:', response);
									// Hide loading indication
									formSubmitButton.removeAttribute('data-kt-indicator');

									// Enable button
									formSubmitButton.disabled = false;

									stepperObj.goNext();
									KTUtil.scrollTop();
								})
								.catch(error => {
									console.error('Failed to save data:', error);
									Swal.fire({
										text: "There are some errors in your submission. Please try again.",
										icon: "error",
										buttonsStyling: false,
										confirmButtonText: "Okay",
										customClass: {
											confirmButton: "btn btn-success"
										}
									}).then(function () {
										// KTUtil.scrollTop();
									});
								});
						})
						.catch(error => {
							console.error('Failed to save data:', error);
							Swal.fire({
								text: "There are some errors in your submission. Please try again.",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Okay",
								customClass: {
									confirmButton: "btn btn-success"
								}
							}).then(function () {
								// KTUtil.scrollTop();
							});
						});
				} else {
					Swal.fire({
						text: "Sorry, please try again.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-light"
						}
					}).then(function () {
						KTUtil.scrollTop();
					});
				}
			});
		});

	
	}

	var initValidation = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		// Step 1
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					fname: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							}
						}
					},
					mname: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							}
						}
					},
					lname: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							}
						}
					},
					nname: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							}
						}
					},
					sex: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							}
						}
					},
					dbirth: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							}
						}
					},
					age: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							},
							digits:{
								message: 'The value is not a valid digits'
							}
						}
					},
					pbirth: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							},
						}
					},
					cadd: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							},
						}
					},
					padd: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							},
						}
					},
					height: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							},
						}
					},
					weight: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							},
						}
					},
					complex: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							},
						}
					},
					religion: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							},
						}
					},
					langdi: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							},
						}
					},
					email: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							},
						}
					}

				},
				
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		));

		// Step 2
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					ffullname: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							}
						}
					},
					fdbirth: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							}
						}
					},
					fage: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							}
						}
					},
					fcontact: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							},
						}
					},
					foccopation: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							},
						}
					},
					femploy: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							},
						}
					},
					feducattend: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							},
						}
					},
					fhomeadd: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							},
						}
					},
					mfullname: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							},
						}
					},
					mdbirth: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							},
						}
					},
					mage: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							},
						}
					},
					mcontact: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							},
						}
					},
					moccupation: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							},
						}
					},
					memply: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							},
						}
					},
					meducattend: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							},
						}
					},
					madd: {
						validators: {
							notEmpty: {
								message: 'Field is required'
							},
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		));

		// Step 3
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					'business_name': {
						validators: {
							notEmpty: {
								message: 'Busines name is required'
							}
						}
					},
					'business_descriptor': {
						validators: {
							notEmpty: {
								message: 'Busines descriptor is required'
							}
						}
					},
					'business_type': {
						validators: {
							notEmpty: {
								message: 'Busines type is required'
							}
						}
					},
					'business_description': {
						validators: {
							notEmpty: {
								message: 'Busines description is required'
							}
						}
					},
					'business_email': {
						validators: {
							notEmpty: {
								message: 'Busines email is required'
							},
							emailAddress: {
								message: 'The value is not a valid email address'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		));

		// Step 4
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					'card_name': {
						validators: {
							notEmpty: {
								message: 'Name on card is required'
							}
						}
					},
					'card_number': {
						validators: {
							notEmpty: {
								message: 'Card member is required'
							},
                            creditCard: {
                                message: 'Card number is not valid'
                            }
						}
					},
					'card_expiry_month': {
						validators: {
							notEmpty: {
								message: 'Month is required'
							}
						}
					},
					'card_expiry_year': {
						validators: {
							notEmpty: {
								message: 'Year is required'
							}
						}
					},
					'card_cvv': {
						validators: {
							notEmpty: {
								message: 'CVV is required'
							},
							digits: {
								message: 'CVV must contain only digits'
							},
							stringLength: {
								min: 3,
								max: 4,
								message: 'CVV must contain 3 to 4 digits only'
							}
						}
					}
				},

				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		));

		// Step 5
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					'card_name': {
						validators: {
							notEmpty: {
								message: 'Name on card is required'
							}
						}
					},
					'card_number': {
						validators: {
							notEmpty: {
								message: 'Card member is required'
							},
                            creditCard: {
                                message: 'Card number is not valid'
                            }
						}
					},
					'card_expiry_month': {
						validators: {
							notEmpty: {
								message: 'Month is required'
							}
						}
					},
					'card_expiry_year': {
						validators: {
							notEmpty: {
								message: 'Year is required'
							}
						}
					},
					'card_cvv': {
						validators: {
							notEmpty: {
								message: 'CVV is required'
							},
							digits: {
								message: 'CVV must contain only digits'
							},
							stringLength: {
								min: 3,
								max: 4,
								message: 'CVV must contain 3 to 4 digits only'
							}
						}
					}
				},

				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		));

		// Step 6
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					'card_name': {
						validators: {
							notEmpty: {
								message: 'Name on card is required'
							}
						}
					},
					'card_number': {
						validators: {
							notEmpty: {
								message: 'Card member is required'
							},
                            creditCard: {
                                message: 'Card number is not valid'
                            }
						}
					},
					'card_expiry_month': {
						validators: {
							notEmpty: {
								message: 'Month is required'
							}
						}
					},
					'card_expiry_year': {
						validators: {
							notEmpty: {
								message: 'Year is required'
							}
						}
					},
					'card_cvv': {
						validators: {
							notEmpty: {
								message: 'CVV is required'
							},
							digits: {
								message: 'CVV must contain only digits'
							},
							stringLength: {
								min: 3,
								max: 4,
								message: 'CVV must contain 3 to 4 digits only'
							}
						}
					}
				},

				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		));

		// Step 7
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					'card_name': {
						validators: {
							notEmpty: {
								message: 'Name on card is required'
							}
						}
					},
					'card_number': {
						validators: {
							notEmpty: {
								message: 'Card member is required'
							},
                            creditCard: {
                                message: 'Card number is not valid'
                            }
						}
					},
					'card_expiry_month': {
						validators: {
							notEmpty: {
								message: 'Month is required'
							}
						}
					},
					'card_expiry_year': {
						validators: {
							notEmpty: {
								message: 'Year is required'
							}
						}
					},
					'card_cvv': {
						validators: {
							notEmpty: {
								message: 'CVV is required'
							},
							digits: {
								message: 'CVV must contain only digits'
							},
							stringLength: {
								min: 3,
								max: 4,
								message: 'CVV must contain 3 to 4 digits only'
							}
						}
					}
				},

				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		));

		// Step 8
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					'card_name': {
						validators: {
							notEmpty: {
								message: 'Name on card is required'
							}
						}
					},
					'card_number': {
						validators: {
							notEmpty: {
								message: 'Card member is required'
							},
                            creditCard: {
                                message: 'Card number is not valid'
                            }
						}
					},
					'card_expiry_month': {
						validators: {
							notEmpty: {
								message: 'Month is required'
							}
						}
					},
					'card_expiry_year': {
						validators: {
							notEmpty: {
								message: 'Year is required'
							}
						}
					},
					'card_cvv': {
						validators: {
							notEmpty: {
								message: 'CVV is required'
							},
							digits: {
								message: 'CVV must contain only digits'
							},
							stringLength: {
								min: 3,
								max: 4,
								message: 'CVV must contain 3 to 4 digits only'
							}
						}
					}
				},

				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		));
	}

	var handleFormSubmit = function() {
		
	}

	return {
		// Public Functions
		init: function () {
			// Elements
			modalEl = document.querySelector('#kt_modal_create_account');
			if (modalEl) {
				modal = new bootstrap.Modal(modalEl);	
			}					

			stepper = document.querySelector('#kt_create_account_stepper');
			form = stepper.querySelector('#kt_create_account_form');
			formSubmitButton = stepper.querySelector('[data-kt-stepper-action="submit"]');
			formContinueButton = stepper.querySelector('[data-kt-stepper-action="next"]');

			initStepper();
			initValidation();
			handleForm();
		}
	};
}();

// Class definition

var KTBootstrapDatepicker = function () {

	var arrows;
	if (KTUtil.isRTL()) {
		arrows = {
			leftArrow: '<i class="la la-angle-right"></i>',
			rightArrow: '<i class="la la-angle-left"></i>'
		}
	} else {
		arrows = {
			leftArrow: '<i class="la la-angle-left"></i>',
			rightArrow: '<i class="la la-angle-right"></i>'
		}
	}

	// Private functions
	var demos = function () {
		// minimum setup
		$('#kt_datepicker_1').datepicker({
			rtl: KTUtil.isRTL(),
			todayHighlight: true,
			orientation: "bottom left",
			templates: arrows
		});

		// minimum setup for modal demo
		$('#kt_datepicker_1_modal').datepicker({
			rtl: KTUtil.isRTL(),
			todayHighlight: true,
			orientation: "bottom left",
			templates: arrows
		});

		// input group layout
		$('#kt_datepicker_2').datepicker({
			rtl: KTUtil.isRTL(),
			todayHighlight: true,
			orientation: "bottom left",
			templates: arrows
		});

		// input group layout for modal demo
		$('#kt_datepicker_2_modal').datepicker({
			rtl: KTUtil.isRTL(),
			todayHighlight: true,
			orientation: "bottom left",
			templates: arrows
		});

		// enable clear button
		$('#kt_datepicker_3, #kt_datepicker_3_validate').datepicker({
			rtl: KTUtil.isRTL(),
			todayBtn: "linked",
			clearBtn: true,
			todayHighlight: true,
			templates: arrows
		});

		// enable clear button for modal demo
		$('#kt_datepicker_3_modal').datepicker({
			rtl: KTUtil.isRTL(),
			todayBtn: "linked",
			clearBtn: true,
			todayHighlight: true,
			templates: arrows
		});

		// orientation
		$('#kt_datepicker_4_1').datepicker({
			rtl: KTUtil.isRTL(),
			orientation: "top left",
			todayHighlight: true,
			templates: arrows
		});

		$('#kt_datepicker_4_2').datepicker({
			rtl: KTUtil.isRTL(),
			orientation: "top right",
			todayHighlight: true,
			templates: arrows
		});

		$('#kt_datepicker_4_3').datepicker({
			rtl: KTUtil.isRTL(),
			orientation: "bottom left",
			todayHighlight: true,
			templates: arrows
		});

		$('#kt_datepicker_4_4').datepicker({
			rtl: KTUtil.isRTL(),
			orientation: "bottom right",
			todayHighlight: true,
			templates: arrows
		});

		// range picker
		$('#kt_datepicker_5').datepicker({
			rtl: KTUtil.isRTL(),
			todayHighlight: true,
			templates: arrows
		});

		 // inline picker
		$('#kt_datepicker_6').datepicker({
			rtl: KTUtil.isRTL(),
			todayHighlight: true,
			templates: arrows
		});
	}

	return {
		// public functions
		init: function() {
			demos();
		}
	};
}();

jQuery(document).ready(function() {
	KTBootstrapDatepicker.init();
});

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTCreateAccount.init();
});
// Class definition
var KTSelect2 = function() {
	// Private functions
	var demos = function() {
		// basic
		$('#kt_select2_1').select2({
			placeholder: "Select a state"
		});

		// nested
		$('#kt_select2_2').select2({
			placeholder: "Select a state"
		});

		// multi select
		$('#kt_select2_3').select2({
			placeholder: "Select a state",
		});

		// basic
		$('#kt_select2_4').select2({
			placeholder: "Select a state",
			allowClear: true
		});

		// loading data from array
		var data = [{
			id: 0,
			text: 'Enhancement'
		}, {
			id: 1,
			text: 'Bug'
		}, {
			id: 2,
			text: 'Duplicate'
		}, {
			id: 3,
			text: 'Invalid'
		}, {
			id: 4,
			text: 'Wontfix'
		}];

		$('#kt_select2_5').select2({
			placeholder: "Select a value",
			data: data
		});

		// loading remote data

		function formatRepo(repo) {
			if (repo.loading) return repo.text;
			var markup = "<div class='select2-result-repository clearfix'>" +
				"<div class='select2-result-repository__meta'>" +
				"<div class='select2-result-repository__title'>" + repo.full_name + "</div>";
			if (repo.description) {
				markup += "<div class='select2-result-repository__description'>" + repo.description + "</div>";
			}
			markup += "<div class='select2-result-repository__statistics'>" +
				"<div class='select2-result-repository__forks'><i class='fa fa-flash'></i> " + repo.forks_count + " Forks</div>" +
				"<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> " + repo.stargazers_count + " Stars</div>" +
				"<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> " + repo.watchers_count + " Watchers</div>" +
				"</div>" +
				"</div></div>";
			return markup;
		}

		function formatRepoSelection(repo) {
			return repo.full_name || repo.text;
		}

		$("#kt_select2_6").select2({
			placeholder: "Search for git repositories",
			allowClear: true,
			ajax: {
				url: "https://api.github.com/search/repositories",
				dataType: 'json',
				delay: 250,
				data: function(params) {
					return {
						q: params.term, // search term
						page: params.page
					};
				},
				processResults: function(data, params) {
					// parse the results into the format expected by Select2
					// since we are using custom formatting functions we do not need to
					// alter the remote JSON data, except to indicate that infinite
					// scrolling can be used
					params.page = params.page || 1;

					return {
						results: data.items,
						pagination: {
							more: (params.page * 30) < data.total_count
						}
					};
				},
				cache: true
			},
			escapeMarkup: function(markup) {
				return markup;
			}, // let our custom formatter work
			minimumInputLength: 1,
			templateResult: formatRepo, // omitted for brevity, see the source of this page
			templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
		});

	

		// limiting the number of selections
		$('#kt_select2_9').select2({
			placeholder: "Select an option",
			maximumSelectionLength: 5
		});

	}

	

	var modalDemos = function() {
		$('#kt_select2_modal').on('shown.bs.modal', function () {
			// basic
			$('#kt_select2_1_modal').select2({
				placeholder: "Select a state"
			});

			// nested
			$('#kt_select2_2_modal').select2({
				placeholder: "Select a state"
			});

			// multi select
			$('#kt_select2_3_modal').select2({
				placeholder: "Select a state",
			});

			// basic
			$('#kt_select2_4_modal').select2({
				placeholder: "Select a state",
				allowClear: true
			});
		});
	}

	// Public functions
	return {
		init: function() {
			demos();
			modalDemos();
		}
	};
}();

// Initialization
jQuery(document).ready(function() {
	KTSelect2.init();
});

