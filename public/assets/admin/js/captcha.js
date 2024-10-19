function sendForm(token) {
    console.log("ITT: ",token);
    $("#gRecaptchaResponse").val(token);
    $("#form").submit();
}