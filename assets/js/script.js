let toggle = document.getElementById('passwordToggler');
console.log(toggle);
toggle.addEventListener('click', function(event){
    const passwordInput = document.getElementById('inputPassword');
    const attribute = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', attribute);
    if(toggle.classList.contains('fa-eye-slash')){
        toggle.classList.remove('fa-eye-slash')
        toggle.classList.add('fa-eye')
    } else {
        toggle.classList.add('fa-eye-slash')
        toggle.classList.remove('fa-eye')
    }
})