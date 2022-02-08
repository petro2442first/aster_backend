function removeUser() {
    const form = document.querySelector('#remove-user-form') ?? null;
    if (form === null) return;

    form.addEventListener('submit', e => {
        e.preventDefault();
        let confirmForm = confirm('Delete user?');
        if (confirmForm) {
            form.submit();
        } else return false;
    });
}

function userInfo() {
    const modal = document.querySelector('.modal-user-info') ?? null;
    const btns = document.querySelectorAll('.open') ?? null;
    const host = 'https://unique-ibc.com';
    if (btns === null || modal === null) return;

    if(modal.dataset.id != '') {
        getUserInfo(host, modal.dataset.id);
        modal.classList.add('show');
    }
    btns.forEach(btn => {
        btn.addEventListener('click', e => {
            getUserInfo(host, btn.dataset.user_id);
            modal.classList.add('show');
        });
        const close = document.querySelector('.modal-user-info .close');
        close.addEventListener('click', e => {
            const modal = document.querySelector('.modal-user-info');
            modal.classList.remove('show');
        });
    });

    function getUserInfo(host, user_id) {
        fetch(`${host}/admin/user-info/${user_id}`)
                .then(response => response.json())
                .then(data => {
                    const balanceId     =   document.querySelector('#user-balance-id');
                    const id            =   document.querySelector('#user-id-info');
                    const name          =   document.querySelector('#user-name');
                    const email         =   document.querySelector('#user-email');
                    const phone         =   document.querySelector('#user-phone');
                    const ip            =   document.querySelector('#user-ip');
                    const balance       =   document.querySelector('#user-balance');
                    const safeBalance   =   document.querySelector('#user-safe-balance');
                    const profileLink   =   document.querySelector('#profile-link');
                    const lastLogin     =   document.querySelector('#user-last-login');
                    profileLink.href = `${host}/feed/${data['id']}`
                    id.value = data['id'];
                    name.textContent = data['name'];
                    email.textContent = data['email'];
                    phone.textContent = data['phone'];
                    ip.textContent = data['ip'];
                    balance.value = data['balance'];
                    safeBalance.textContent = data['balance'];
                    balanceId.value = data['id'];
                    lastLogin.textContent = data['last_login'];

                    const acquired = document.querySelector('.tariffs.aquired');
                    acquired.innerHTML = '';
                    for (let i = 0; i < data['acquired_plans'].length; i++) {
                        const tariffItem = document.createElement('li');
                        const removeTariffBtn = document.createElement('a');
                        const p = document.createElement('p');
                        tariffItem.classList.add('item');
                        removeTariffBtn.className = 'btn remove';
                        removeTariffBtn.innerHTML = '&times;';
                        tariffItem.append(p);
                        tariffItem.append(removeTariffBtn);
                        tariffItem.querySelector('p').textContent = data['acquired_plans'][i].title;
                        tariffItem.querySelector('.remove').href = `${host}/admin/remove-tariff/${user_id}/${data['acquired_plans'][i].id}`;

                        acquired.append(tariffItem);
                    }
                    const available = document.querySelector('.tariffs.available');
                    available.innerHTML = '';
                    for (let i = 0; i < data['available_plans'].length; i++) {
                        const tariffItem = document.createElement('li');
                        const removeTariffBtn = document.createElement('a');
                        const p = document.createElement('p');
                        tariffItem.classList.add('item');
                        removeTariffBtn.className = 'btn add';
                        removeTariffBtn.innerHTML = '+';
                        tariffItem.append(p);
                        tariffItem.append(removeTariffBtn);
                        tariffItem.querySelector('p').textContent = data['available_plans'][i].title;
                        tariffItem.querySelector('.add').href = `${host}/admin/add-tariff/${user_id}/${data['available_plans'][i].id}`;
                        available.append(tariffItem);
                    }
                    const transfers = document.querySelector('.history');

                    transfers.innerHTML = '';
                    for (let i = 0; i < data['transfers_length']; i++) {
                        const transferItem = document.createElement('li');
                        const removeTariffBtn = document.createElement('a');
                        const date = document.createElement('form');
                        const dateInput = document.createElement('input');
                        dateInput.type = 'date';
                        dateInput.value = data['transfers'][i].date;
                        dateInput.setAttribute('name', 'date');
                        console.log(data['transfers'][i].date);
                        dateSubmit = document.createElement('button');
                        dateSubmit.type = 'submit';
                        dateSubmit.textContent = 'Confirm';
                        dateSubmit.classList.add('submit');
                        date.append(dateInput);
                        date.append(dateSubmit);
                        date.method = 'GET';
                        date.action = `${host}/admin/edit-transfer-date/${data['transfers'][i].id}/${user_id}`;
                        removeTariffBtn.className = 'btn remove';
                        const p = document.createElement('p');
                        const span = document.createElement('span');
                        span.textContent = data['transfers'][i].appointment;
                        p.textContent = data['transfers'][i].value;
                        p.prepend(span);
                        transferItem.classList.add('item');
                        if(data['transfers'][i].appointment == '+') {
                            transferItem.classList.add('deposit');
                        } else {
                            transferItem.classList.add('withdraw');
                        }
                        removeTariffBtn.className = 'btn remove';
                        removeTariffBtn.innerHTML = '&times;';
                        transferItem.append(p);
                        transferItem.append(date);
                        transferItem.append(removeTariffBtn);
                        transferItem.querySelector('.remove').href = `${host}/admin/remove-transfer/${data['transfers'][i].id}`;
                        transferItem.querySelector('.remove').addEventListener('click', e => {
                            if(!confirm('Delete transfer?')) e.preventDefault();
                        });
                        transfers.prepend(transferItem);
                    }
                });
    }
}
function request() {
    const btns = document.querySelectorAll('.remove-request') ?? null;
    if(btns === null) return;
    btns.forEach(btn => {
        btn.addEventListener('click', e => {
            confirm('Delete request?') ? null : e.preventDefault();
        });
    })
}
document.addEventListener('DOMContentLoaded', e => {
    removeUser();
    userInfo();
    request();
});
