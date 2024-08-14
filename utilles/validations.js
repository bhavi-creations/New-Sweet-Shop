function validations(fields) {
  let errors = [];
  fields.forEach((field) => {
    let element = $(field.element);
    let rules = field.rules;
    let fieldErrs = field.errorMessages;
    let value = element.val();
    if (element.attr("type") == "file") {
      handleImages(element, rules, fieldErrs, errors);
    } else if (element.is("select")) {
      handleSelectDropdown(element, rules, fieldErrs, errors);
    } else if (element.is("textarea")) {
      handleCkEditor(element, rules, fieldErrs, errors);
    } else {
      if (rules.required && !value) {
        handleErrors(element, fieldErrs.requiredError, errors);
      } else if (rules.minlength && value.length < rules.minlength) {
        handleErrors(element, fieldErrs.minlengthError, errors);
      } else if (rules.maxlength && value.length > rules.maxlength) {
        handleErrors(element, fieldErrs.maxlengthError, errors);
      } else if (rules.regex && !checkRegex(value, rules.regex)) {
        handleErrors(element, fieldErrs.regexError, errors);
      } else {
        clearErrors(element);
      }
    }
  });
  return errors;
}

function handleImages(element, rules, fieldErrs, errors) {
  let file = element[0].files[0];
  let validImageTypes = ["image/jpg", "image/jpeg", "image/png"];
  console.log(file);
  if (rules.required && !file) {
    handleErrors(element, fieldErrs.requiredError, errors);
  } else if (rules.fileTypes && !validImageTypes.includes(file["type"])) {
    handleErrors(element, fieldErrs.fileTypeError, errors);
  } else if (rules.maxsize && file["size"] > rules.maxsize) {
    handleErrors(element, fieldErrs.maxsizeError, errors);
  } else {
    clearErrors(element);
  }
}

function handleSelectDropdown(element, rules, fieldErrs, errors) {
  let val = element.val();
  if (rules.required && (!val || val == "0")) {
    handleErrors(element, fieldErrs.requiredError, errors);
  } else {
    clearErrors(element);
  }
}

function handleCkEditor(element, rules, fieldErrs, errors) {
  console.log(`handle ck for ${element} is triggered`);
  // let val = editor.getData();
  let val = CKEDITOR.instances[`${element.attr("id")}`].getData();

  console.log("ck editor val is" + " " + val);

  if (rules.required && !val) {
    handleErrors(element, fieldErrs.requiredError, errors);
  } else {
    clearErrors(element);
  }
}

function checkRegex(value, regexPattern) {
  return regexPattern.test(value);
}

function handleErrors(element, errorMsg, errors) {
  errors.push(errorMsg);
  element.addClass("is-invalid");
  element.siblings("#errText").text(errorMsg);
}

function clearErrors(element) {
  element.removeClass("is-invalid").addClass("is-valid");
  element.siblings("#errText").text("");
}
