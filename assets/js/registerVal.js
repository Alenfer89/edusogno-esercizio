let submitButton = document.getElementById('submit');
let checkErrors = {};
submitButton.addEventListener('click', function(event){
    
    const errors = {};
    const stringErrors = document.querySelectorAll(".string-error");
    stringErrors.forEach(element => {
        element.remove()
    });

    if(inputFirstName.value.trim() === ""){
        errors.inputFirstName = 'Inserisci un nome per poterti registrare!';
    } else if (inputFirstName.value.trim().length > 45) {
        errors.inputFirstName = 'Il nome inserito è troppo lungo!';
    }

    if(inputLastName.value.trim() === ""){
        errors.inputLastName = 'Inserisci un cognome per poterti registrare!';
    } else if (inputLastName.value.trim().length > 45) {
        errors.inputLastName = 'Il cognome inserito è troppo lungo!';
    }

    if(inputEmail.value.trim() === ""){
        errors.inputEmail = 'Inserisci una eamil per poterti registrare!';
    } else if (inputEmail.value.trim().length > 45) {
        errors.inputEmail = 'L\'email inserita è troppo lunga! Usa un massimo di 45 caratteri';
    } else if (!inputEmail.value.match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
        errors.inputEmail = 'Inserisci un indirizzo email valido!';
    }

    if(inputPassword.value.trim() === ""){
        errors.inputPassword = 'Inserisci una password per poterti registrare!';
    } else if (inputPassword.value.trim().length > 45) {
        errors.inputPassword = 'La password inserita è troppo lunga! Usa un massimo di 45 caratteri';
    }

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

    checkErrors = errors;
    if(Object.keys(checkErrors).length !== 0){
    event.preventDefault();
    }
})
