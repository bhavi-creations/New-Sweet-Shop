function validateFormFields(validationRules) {
  let validationErrs = [];
  validationRules.forEach((field) => {
    let element = $(field.element);
    let rules = field.rules;
    let errors = field.errorMessages;
    let value = element.val();

    if (element.attr("type") == "file") {
      handleImages(element, errors.maxsizeError, validationErrs, rules);
    } else if (element.is("select")) {
      handleSelectValidations(element, rules, errors, validationErrs);
    } else if (element.is("textarea")) {
      handleCkEditor(element, errors.maxsizeError, validationErrs, rules);
    } else {
      if (rules.required && !value) {
        handleErrors(element, errors.requiredError, validationErrs);
      } else if (rules.minlength && value.length < rules.minlength) {
        handleErrors(element, errors.minlengthError, validationErrs);
      } else if (rules.maxlength && value.length > rules.maxlength) {
        handleErrors(element, errors.maxlengthError, validationErrs);
      } else if (rules.regex && !checkRegex(value, rules.regex)) {
        handleErrorMessages(element, errors.regexError, validationErrs);
      } else {
        clearErrors(element);
      }
    }
  });

  return validationErrs;
}

// function checkRegex(value, regexPattern) {
//   return regexPattern.test(value);
// }

function handleSelectValidations(element, rules, errors, validationErrs) {
  let value = element.val();
  console.log(value);
  if (rules.required && (!value || value == "0")) {
    console.log("select is error");
    element.addClass("is-invalid");
    handleErrors(element, errors.requiredError, validationErrs);
  } else {
    console.log("select is error free");
    clearErrors(element);
  }
}


function handleCkEditor(element, rules, validationErrs, errors) {
  console.log(`handle ck for ${element} is triggered`);
  let val = CKEDITOR.instances[`${element.attr("id")}`].getData();
  console.log("ck editor val is" + " " + val);
  console.log(val.length);
  if (rules.required && !val) {
    handleErrorMessages(element, errors.requiredError, validationErrs);
  } else {
    clearErrors(element);
  }
}

function handleImages(element, errors, validationErrs, rules) {
  let file = element[0].files[0];
  console.log("image file----",file);
 
  let validImageTypes = ["image/jpg", "image/jpeg", "image/png"];
  if (rules.required && !file) {
    handleErrors(element, errors.requiredError, validationErrs);
  } else if (rules.fileTypes && !validImageTypes.includes(file["type"])) {
    handleErrors(element, errors.fileTypeError, validationErrs);
  } else if (rules.maxsize && file.size > rules.maxsize) {
    handleErrors(element, errors.maxsizeError, validationErrs);
  } else {
    clearErrors(element);
  }
}

function checkRegex(value, regexPattern) {
  return regexPattern.test(value);
}

function handleErrors(ele, err, validationErrs) {
  ele.addClass("is-invalid");
  ele.siblings("#errText").text(err);
  validationErrs.push(err);
}

function clearErrors(ele) {
  ele.removeClass("is-invalid");
  ele.addClass("is-valid");
  ele.siblings("#errText").text("");
}
