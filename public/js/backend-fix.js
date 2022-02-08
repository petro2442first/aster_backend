function validationWithdraw() {
    const  form = document.querySelector('#withdraw-form') ?? null;
    if(form === null) return;
    form.addEventListener('submit', validateInput.bind(form, event));

    function validateInput(e) {
        const input = this.querySelector('input[type="number"]');
        if(input.value < 10) return false;
    }
}

function register() {
    const form = document.querySelector('#register-form') ?? null;
    if(form === null) return;
    const submit = form.querySelector('.submit');
    submit.classList.add('disabled');
    const checkbox = form.querySelector('input[type="checkbox"]');
    checkbox.addEventListener('input', e => {
       const submit = form.querySelector('.submit');

       submit.classList.toggle('disabled');
    });
}

function deleteUser() {
    const forms = document.querySelectorAll('.delete-user-form') ?? null;
    if(forms === null) return;
    forms.forEach(form => {

        form.addEventListener('submit', e => {
            e.preventDefault();
            let confirmed = confirm('Вы точно хотите удалить данного пользователя?');
            if(confirmed) form.submit();
        });
    });
}
function deleteRequest() {
    const forms = document.querySelectorAll('.delete-withdraw-request') ?? null;
    if(forms === null) return;
    forms.forEach(form => {

        form.addEventListener('submit', e => {
            e.preventDefault();
            let confirmed = confirm('Вы точно хотите удалить этот запрос на вывод?');
            if(confirmed) form.submit();
        });
    });
}
function initMap() {
    const map = document.getElementById('contacts-map') ?? null;
    if(map === null) return;
    // The location of Uluru
    const uluru = { lat: 24.79141318522589, lng: 121.01249294020009 };
    // 24.79141318522589, 121.01249294020009
    // The map, centered at Uluru
    const googleMap = new google.maps.Map(map, {
        zoom: 4,
        center: uluru,
        // query: ''
    });
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
        position: uluru,
        map: googleMap,
    });
}

// function editUserTariffs() {
//     const btns = document.querySelectorAll('.edit-tariffs');
//     if(btns === null) return;


//     const modal = document.querySelector('#modal-edit-tariffs');
//     btns.forEach(btn => {
//         btn.addEventListener('click', e => {

//             render(modal, btn.dataset.user_id);
//             buttons(modal, btn.dataset.user_id);
//         })
//     });
//     function render(modal, id) {
//         const req = new Request(`admin/get-tariffs/${id}`);
//         fetch(req)
//         .then(response => response.json())
//         .then(data => {
//             const acqList = modal.querySelector('ul.acquired');
//             const acquired = data['acquired'];
//             acquired.forEach(item => {
//                 acqList.insertAdjacentHTML('beforeend', /* html */`
//                 <li class="item">
//                         <div class="title">${item['title']}</div>
//                         <button class="remove" data-tariff_id="${item['id']}">&times;</button>
//                 </li>
//                 `)
//             });
//             const availList = modal.querySelector('ul.available');
//             const available = data['available'];
//             available.forEach(item => {
//                 availList.insertAdjacentHTML('beforeend', /* html */`
//                 <li class="item">
//                         <div class="title">${item['title']}</div>
//                         <button class="add" data-tariff_id="${item['id']}">+</button>
//                 </li>
//                 `)
//             });


//             modal.classList.add('show');
//         });

//     }
//     function buttons(modal, id) {
//         const acqList = modal.querySelector('ul.acquired');
//         console.log(acqList);
//         const availList = modal.querySelector('ul.available');
//         removeBtns = acqList.querySelectorAll('.remove');
//         console.log(removeBtns);
//         addBtns = availList.querySelectorAll('.add');
//         removeBtns.forEach(btn => {
//             btn.addEventListener('click', removeTariff.bind(btn, e));
//         });
//         addBtns.forEach(btn => {
//             btn.addEventListener('click', addTariff);
//         });
//         function removeTariff(e) {

//         console.log('work')
//             fetch(`/admin/remove-tariff/${this.dataset.tariff_id}`, {
//                 method: 'POST'
//             })
//             .then(response => response.json())
//             .then(data => console.log(data))
//             render(modal, id);
//         }
//     }
// }

document.addEventListener('DOMContentLoaded', e => {
    validationWithdraw();
    register();
    deleteUser();
    initMap();
    deleteRequest();

    // editUserTariffs();
});
