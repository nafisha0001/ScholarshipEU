var loginOption = document.querySelectorAll(".loginOption");

for (var i = 0; i < loginOption.length; i++) {
    var currentOption = loginOption[i];
    currentOption.addEventListener("click", function () {
        if (this.textContent.trim() === "Student") {
            this.style.backgroundColor = "#9B6867";
            for (var j = 0; j < loginOption.length; j++) {
                if (loginOption[j] !== this) {
                    loginOption[j].style.backgroundColor = "#C08A90";
                }
            }
        } 
        if (this.textContent.trim() === "Admin") {
            this.style.backgroundColor = "#9B6867";
            for (var j = 0; j < loginOption.length; j++) {
                if (loginOption[j] !== this) {
                    loginOption[j].style.backgroundColor = "#C08A90";
                }
            }
        }
    });
}

const myForm = document.getElementById('login');
myForm.addEventListener('submit', (event) => {
    event.preventDefault(); 


// const email = myForm.elements.email.value.trim();
// const emailError = document.querySelector('#email + .errorMessage');
// const emailInput = document.getElementById('email');
//     if (email === '') {
//       emailError.textContent = 'Email is required.';
//       emailInput.parentNode.classList.add('error');
//       emailInput.parentNode.classList.remove('success');
//     } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
//       emailError.textContent = 'Please enter a valid email address.';
//       emailInput.parentNode.classList.add('error');
//       emailInput.parentNode.classList.remove('success');
//     } else {
//       emailError.textContent = '';
//       emailInput.parentNode.classList.add('success');
//       emailInput.parentNode.classList.remove('error');
//     }

    const password = myForm.elements.password.value.trim();
    const passwordError = document.querySelector('#password + .errorMessage');
    const passwordInput = document.getElementById('password');
    if (password === '') {
      passwordError.textContent = 'Password is required.';
      passwordInput.parentNode.classList.add('error');
      passwordInput.parentNode.classList.remove('success');
    } else if (password.length < 8) {
      passwordError.textContent = 'Password is expected to be 8 characters.';
      passwordInput.parentNode.classList.add('error');
      passwordInput.parentNode.classList.remove('success');
    } else {
      passwordError.textContent = '';
      passwordInput.parentNode.classList.add('success');
      passwordInput.parentNode.classList.remove('error');
    }

    if (emailError.textContent === '' && passwordError.textContent === '') {
        myForm.submit();
      }
    });