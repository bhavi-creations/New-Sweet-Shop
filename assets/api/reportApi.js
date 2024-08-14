$("#submit-billing").hide();

const validationRules = [
  {
    element: "#BArea",
    rules: {
      required: true,
      regex: regexPatterns.alphabetsregex,
      minlength: 4,
      maxlength: 20,
    },
    errorMessages: {
      requiredError: "Branch Area is required",
      regexError: "Branch Area is invalid. only characters are allowed",
      minlengthError: "Branch Area should have minimun 4 characters",
      maxlengthError: "Branch Area should be below 20 characters",
    },
  },
  {
    element: "#IName",
    rules: {
      required: true,
      regex: regexPatterns.alphabetsregex,
      minlength: 4,
      maxlength: 20,
    },
    errorMessages: {
      requiredError: "Incharge Area is required",
      regexError: "Incharge Area is invalid. only characters are allowed",
      minlengthError: "Incharge Area should have minimun 4 characters",
      maxlengthError: "Incharge Area should be below 20 characters",
    },
  },
  {
    element: "#Erng",
    rules: {
      required: true,
      regex: regexPatterns.numbersregex,
    },
    errorMessages: {
      requiredError: "No of Items is required",
    },
  },
  {
    element: "#MNex",
    rules: {
      required: true,
      regex: regexPatterns.numbersregex,
    },
    errorMessages: {
      requiredError: "Monthly expenses is required",
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
