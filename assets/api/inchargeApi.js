$("#submit-in").hide();

const validationRules = [
  {
    element: "#IMGg1",
    rules: {
      required: true,
      maxsize: 1 * 1024 * 1024,
      fileTypes: ["image/jpg", "image/jpeg", "image/png"],
    },
    errorMessages: {
      requiredError: " image is required",
      maxsizeError: " Image size should be less than 1024KB",
      fileTypeError: " Image should be of type jpg, jpeg or png",
    },
  },
  {
    element: "#Pname1",
    rules: {
      required: true,
      regex: regexPatterns.alphabetsregex,
      minlength: 4,
      maxlength: 20,
    },
    errorMessages: {
      requiredError: "Person Name is required",
      regexError: "Person Name is invalid. only characters are allowed",
      minlengthError: "Person Name should have minimun 4 characters",
      maxlengthError: "Person Name should be below 20 characters",
    },
  },
  {
    element: "#ADdress1",
    rules: {
      required: true,
      regex: regexPatterns.alphabetsregex,
      minlength: 4,
      maxlength: 20,
    },
    errorMessages: {
      requiredError: "Address is required",
      regexError: "Address is invalid. only characters are allowed",
      minlengthError: "Address should have minimun 4 characters",
      maxlengthError: "Address should be below 20 characters",
    },
  },
  {
    element: "#AGee1",
    rules: {
      required: true,
      regex: regexPatterns.numbersregex,
    },
    errorMessages: {
      requiredError: "Age is required",
    },
  },
  {
    element: "#AnUm1",
    rules: {
      required: true,
      regex: regexPatterns.numbersregex,
    },
    errorMessages: {
      requiredError: "Account Number is required",
    },
  },
  {
    element: "#PNum1",
    rules: {
      required: true,
      regex: regexPatterns.numbersregex,
    },
    errorMessages: {
      requiredError: "Phone Number is required",
    },
  },
  {
    element: "#Salar1",
    rules: {
      required: true,
      regex: regexPatterns.numbersregex,
    },
    errorMessages: {
      requiredError: "Salary is required",
    },
  },
  {
    element: "#FBranch1",
    rules: {
      required: true,
      regex: regexPatterns.alphabetsregex,
      minlength: 4,
      maxlength: 20,
    },
    errorMessages: {
      requiredError: "Person Name is required",
      regexError: "Person Name is invalid. only characters are allowed",
      minlengthError: "Person Name should have minimun 4 characters",
      maxlengthError: "Person Name should be below 20 characters",
    },
  },
];

$("#add-in").click(function () {
  let IsFormValid = validations(validationRules);
  if (IsFormValid.length > 0) {
    return;
  } else {
    $("#add-in").hide();
    $("#submit-in").show();
    $("#submit-in").trigger("click");
  }
});
