$("#submit-billing").hide();

const validationRules = [
  {
    element: "#Iname",
    rules: {
      required: true,
      regex: regexPatterns.alphabetsregex,
      minlength: 4,
      maxlength: 20,
    },
    errorMessages: {
      requiredError: "Item Name is required",
      regexError: "Item Name is invalid. only characters are allowed",
      minlengthError: "Item Name should have minimun 4 characters",
      maxlengthError: "Item Name should be below 20 characters",
    },
  },
  {
    element: "#KGS",
    rules: {
      required: true,
      regex: regexPatterns.numbersregex,
    },
    errorMessages: {
      requiredError: "Kg's is required",
    },
  },
  {
    element: "#Amnt",
    rules: {
      required: true,
      regex: regexPatterns.numbersregex,
    },
    errorMessages: {
      requiredError: "Amount is required",
    },
  },
  {
    element: "#Disc",
    rules: {
      required: true,
      regex: regexPatterns.numbersregex,
    },
    errorMessages: {
      requiredError: "Discount is required",
    },
  },
  {
    element: "#INName",
    rules: {
      required: true,
      regex: regexPatterns.alphabetsregex,
      minlength: 4,
      maxlength: 20,
    },
    errorMessages: {
      requiredError: "Incharge Name is required",
      regexError: "Incharge Name is invalid. only characters are allowed",
      minlengthError: "Incharge Name should have minimun 4 characters",
      maxlengthError: "Incharge Name should be below 20 characters",
    },
  },
  {
    element: "#Brnch",
    rules: {
      required: true,
      regex: regexPatterns.alphabetsregex,
      minlength: 4,
      maxlength: 20,
    },
    errorMessages: {
      requiredError: "Branch Name is required",
      regexError: "Branch Name is invalid. only characters are allowed",
      minlengthError: "Branch Name should have minimun 4 characters",
      maxlengthError: "Branch Name should be below 20 characters",
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
