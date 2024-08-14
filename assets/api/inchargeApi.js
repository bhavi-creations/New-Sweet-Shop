$("#submit-billing").hide();

const validationRules = [
  {
    element: "#IMGg",
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
    element: "#Pname",
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
    element: "#ADdress",
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
    element: "#AGee",
    rules: {
      required: true,
      regex: regexPatterns.numbersregex,
    },
    errorMessages: {
      requiredError: "Age is required",
    },
  },
  {
    element: "#AnUm",
    rules: {
      required: true,
      regex: regexPatterns.numbersregex,
    },
    errorMessages: {
      requiredError: "Account Number is required",
    },
  },
  {
    element: "#PNum",
    rules: {
      required: true,
      regex: regexPatterns.numbersregex,
    },
    errorMessages: {
      requiredError: "Phone Number is required",
    },
  },
  {
    element: "#Salar",
    rules: {
      required: true,
      regex: regexPatterns.numbersregex,
    },
    errorMessages: {
      requiredError: "Salary is required",
    },
  },
  {
    element: "#FBranch",
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

$("#add-billing").click(function () {
  let IsFormValid = validations(validationRules);
  if (IsFormValid.length > 0) {
    return;
  } else {
    $("#add-billing").hide();
    $("#submit-billing").show();
    $("#submit-billing").trigger("click");
  }
});
