const contactForm = document.querySelector('.js-contact-form');
const modalButtons = document.querySelectorAll('[data-micromodal-trigger]');
const contactFormBtn = document.querySelector('#contact-form-btn');

modalButtons.forEach((button) => {
  button.addEventListener('click', function () {
    const companyName = button.getAttribute('data-company-name');
    const companyBudget = button.getAttribute('data-company-budget');
    const companyOrder =
      button.getAttribute('data-company-order')?.trim() || 'orderGeneral';

    const companyNameInput = document.querySelector(
      '.js-company-name-hidden-input'
    );
    const companyBudgetInput = document.querySelector(
      '.js-company-budget-hidden-input'
    );

    contactForm.className = 'contact-form js-contact-form';
    contactFormBtn.className = 'btn contact-form-btn';

    contactForm.classList.add(companyOrder);
    contactForm.classList.add(
      companyName
        ?.trim()
        .replace(/\s+/g, '')
        .replace(/[^a-zA-Z0-9-_]/g, '')
    );

    contactFormBtn.classList.add(companyOrder);
    contactFormBtn.classList.add(
      companyName
        ?.trim()
        .replace(/\s+/g, '')
        .replace(/[^a-zA-Z0-9-_]/g, '')
    );

    if (companyName && companyNameInput) {
      companyNameInput.value = companyName;
    }

    if (companyBudget && companyBudgetInput) {
      companyBudgetInput.value = companyBudget;
    }
  });
});

///--------------------------------

const micromodalConfig = {
  disableScroll: true,
  awaitCloseAnimation: true,
  disableFocus: true,
  closeOnBackdropClick: true,
};

const tomSelectInstance = new TomSelect('#services', {
  plugins: ['remove_button'],
  searchField: [],
  controlInput: null,
  onItemAdd(value, item) {
    this.close();
  },
});

// document.querySelector('#services-ts-control').style.display = 'none';

contactForm.addEventListener('bouncerFormValid', async (e) => {
  e.preventDefault();

  Notiflix.Loading.standard({ svgColor: '#e4f2ff' });

  const formData = new FormData(e.target);
  const services = tomSelectInstance.getValue();

  formData.delete('services');
  formData.append('client', e.target.full_name.value);
  const dataObject = Object.fromEntries(formData.entries());
  dataObject.services = services;

  try {
    const response = await fetch(
      'https://clicklift-ad5f0897452d.herokuapp.com/api/newLead',
      {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(dataObject),
      }
    );

    if (response.ok) {
      if (document.getElementById('modal-form')) {
        MicroModal.close('modal-form', micromodalConfig);
      }

      Notiflix.Loading.remove();

      MicroModal.show('modal-success', micromodalConfig);

      tomSelectInstance.clear();

      contactForm.reset();
    } else {
      Notiflix.Loading.remove();
      Notiflix.Notify.failure('An error occurred, please try again.', {
        timeout: 3000,
        showOnlyTheLastOne: true,
      });
      console.error(response.statusText);
    }
  } catch (error) {
    console.error('Fetch error:', error);

    Notiflix.Notify.failure('An error occurred, please try again.', {
      timeout: 3000,
      showOnlyTheLastOne: true,
    });

    Notiflix.Loading.remove();
  }
});

/*-------------------*/

const contactUsForm = document.querySelector('.js-contact-us-form');

contactUsForm?.addEventListener('bouncerFormValid', async (e) => {
  e.preventDefault();

  Notiflix.Loading.standard({ svgColor: '#e4f2ff' });

  const formData = new FormData(e.target);
  formData.append('action', 'send_form_to_email');

  try {
    const response = await fetch('/wp-admin/admin-ajax.php', {
      method: 'POST',
      body: formData,
    });

    // Парсимо JSON-відповідь
    const data = await response.json();

    Notiflix.Loading.remove();

    if (data.success) {
      MicroModal.show('modal-success', micromodalConfig);
      contactUsForm.reset();
    } else {
      Notiflix.Notify.failure(data.data.message || 'Error, please try again.', {
        timeout: 3000,
        showOnlyTheLastOne: true,
      });
    }
  } catch (error) {
    console.error('Fetch error:', error);
    Notiflix.Notify.failure('An error occurred, please try again.', {
      timeout: 3000,
      showOnlyTheLastOne: true,
    });
    Notiflix.Loading.remove();
  }
});
