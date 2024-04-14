// form_validation.js

document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("registrationForm");
  
    form.addEventListener("submit", function(event) {
      event.preventDefault();
  
      const password = form.password.value;
      const repeatPassword = form['repeate-password'].value;
  
      if (password === repeatPassword) {
        if (verificarSenha(password)) {
          form.submit();
        } else {
          const errorMessage = "A senha deve ter pelo menos 8 caracteres, incluindo pelo menos uma letra minúscula, uma letra maiúscula, um número e um caractere especial.";
          alert(errorMessage);
        }
      } else {
        const errorMessage = "As senhas não coincidem.";
        alert(errorMessage);
      }
    });
  
    function verificarSenha(senha) {
      if (senha.length < 8) {
        return false;
      }
  
      if (!/[a-z]/.test(senha)) {
        return false;
      }
  
      if (!/[A-Z]/.test(senha)) {
        return false;
      }
  
      if (!/\d/.test(senha)) {
        return false;
      }
  
      if (!/[^A-Za-z0-9]/.test(senha)) {
        return false;
      }
  
      return true;
    }
});
  