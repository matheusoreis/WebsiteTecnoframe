(function () {
  "use strict";

  let forms = document.querySelectorAll('.php-email-form');

  forms.forEach(function (e) {

    e.addEventListener('submit', function (event) {
      event.preventDefault();

      let thisForm = this;

      let action = thisForm.getAttribute('action');

      // Se for diferente de ter uma ação "nula"
      if (!action) {
        displayError(thisForm, 'Erro de ação, contate um administrador!')
        return;
      }

      // Adiciona a Class Loading
      thisForm.querySelector('.loading').classList.add('d-block');

      // Remove a Class Sent
      thisForm.querySelector('.sent-message').classList.remove('d-block');

      let formData = new FormData(thisForm);

      // Envia o formulário
      php_email_form_submit(thisForm, action, formData);

    });

  });

  function php_email_form_submit(thisForm, action, formData) {

    fetch(action, {
      method: 'POST',
      body: formData,
      headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })

    setTimeout(function () {

      // Adiciona a Class Sent Message
      thisForm.querySelector('.sent-message').classList.add('d-block');

      // Remove a Class Loading
      thisForm.querySelector('.loading').classList.remove('d-block');

    }, 3000);

  }

})();
