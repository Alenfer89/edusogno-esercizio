let submitButton = document.getElementById('submit');
let checkErrors = {};

submitButton.addEventListener('click', function(event){
    //errors object container created and reset
    const errors = {};
    //removal of previous errors DOM elements if any
    const stringErrors = document.querySelectorAll(".string-error");
    stringErrors.forEach(element => {
        element.remove()
    });

    //start of errors checks
    //# email input
    if(inputEmail.value.trim() === ""){
        errors.inputEmail = 'Inserisci una eamil per poterti registrare!';
    } else if (inputEmail.value.trim().length > 45) {
        errors.inputEmail = 'L\'email inserita è troppo lunga! Usa un massimo di 45 caratteri';
    } else if (!inputEmail.value.match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
        errors.inputEmail = 'Inserisci un indirizzo email valido!';
    }
    //# password input
    if(inputPassword.value.trim() === ""){
        errors.inputPassword = 'Inserisci una password per poterti registrare!';
    } else if (inputPassword.value.trim().length > 45) {
        errors.inputPassword = 'La password inserita è troppo lunga! Usa un massimo di 45 caratteri';
    }

    //creation of errors DOM EL, if any
    for (const key in errors) {
        const brothers = document.querySelectorAll("label")
        brothers.forEach(brother => {
            let attribute = brother.getAttribute('for');
            if (key == attribute){
                const errorSpan = document.createElement("span");
                errorSpan.classList.add("text-danger", "string-error", "ms-5");
                errorSpan.innerHTML = errors[key];
                brother.after(errorSpan);
            }
        });
    }

    //resources savings
    checkErrors = errors;
    if(Object.keys(checkErrors).length !== 0){
    event.preventDefault();
    }
})