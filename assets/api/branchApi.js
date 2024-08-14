$("#submit-billing").hide();

const validationRules = [
  {
    element: "#Brnch",
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
  // {
  //   element: "#Dt",
  //   rules: {
  //     required: true,
  //     regex: regexPatterns.numbersregex,
  //     minlength: 6,
  //     // maxlength: 20,
  //   },
  //   errorMessages: {
  //     requiredError: "Date is required",
  //     regexError: "Date is invalid. only characters are allowed",
  //     minlengthError: "Date should have minimun 6 characters",
  //     // maxlengthError: "Date should be below 20 characters",
  //   },
  // },
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
