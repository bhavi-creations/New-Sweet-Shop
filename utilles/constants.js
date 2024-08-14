

let regexPatterns = {
    allwhitespace: /(\s+)/gu,
    numbersregex: /^[0-9]*$/,
    mobileregex: /^\d{10}$/,
    smallAlphabetsRegex: /^[a-z]*$/,
    capsAlphabetsRegex: /^[A-Z]*$/,
    alphabetsregex: /^[a-zA-Z ]*$/,
    alphabetsregexspecial: /^[a-zA-Z0-9!@#\$%\^\&*\ \\?\)(+=.-]*$/,
    alphaNumeric: /^([a-zA-Z\d_]){4,8}$/,
    emailregex: /^\w+([\.-]?\w+)@\w+([-]?\w+)\.([a-z]{2,3})(\.[a-z]{2,3})?$/,
    // urlregex: /^(http[s]?:\/\/)?(www\.)?[a-zA-Z0-9]+([-]?\w+)\.([a-z]{2,12})(\.[a-z]{2,12})?$/,
    urlregex: /((([A-Za-z]{3,9}:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)((?:\/[\+~%\/.\w-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[\w]*))?)/,

    phone: /^[0-9]{10}$/,
    price:/^[0-9 -+]+$/,
};

