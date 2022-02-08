window.addEventListener('load', e => {
    document.body.classList.add('show');
});
function start() {
    const startBtn = document.querySelector('#start-btn');
    startBtn.addEventListener('click', e => {
        document.querySelector('body').classList.add('started');
    });
}

function faq() {
    const questions = document.querySelectorAll('.faq-item .question') ?? null;
    if (questions === null) return;
    questions.forEach(q => {
        q.addEventListener('click', e => {
            q.parentElement.classList.toggle('open-question');
        });
    });
}

function contactSend() {
    const btn = document.querySelector('#send') ?? null;
    if (btn === null) return;
    const form = document.querySelector('#send-msg');
    form.addEventListener('submit', e => {
        e.preventDefault();
        const modal = document.querySelector('.modal-contact-form');
        modal.classList.add('show');
        // setTimeout(() => {
        //     form.submit();
        // }, 1500);
    });
    const close = document.querySelector('.modal-contact-form .close');
    close.addEventListener('click', e => {
        const modal = document.querySelector('.modal-contact-form');
        modal.classList.remove('show');
        form.submit();
    });
}

function customSelect() {
    const selects = document.querySelectorAll('select') ?? null;
    selects.forEach(select => {
        $(select).select2({
            dropdownCssClass: 'custom-dropdown',
            selectionCssClass: 'custom-selection'
        });
        // select2-results__options ul
        // select2-results__option li
        // select2-search input
        // select2-selection__rendered
        // select2-selection__arrow
    });
}

function mobileMenu() {
    const burger = document.querySelector('.burger') ?? null;
    if (burger === null) return;

    burger.addEventListener('click', e => {
        const menu = document.querySelector('.nav-menu');
        menu.classList.toggle('show');
        burger.classList.toggle('arrow');
    });
}

function depositModal() {
    const btns = document.querySelectorAll('.invest, .deposit') ?? null;
    if (btns === null) return;
    btns.forEach(btn => {
        btn.addEventListener('click', e => {
            const modal = document.querySelector('.modal-pay-tariff');
            modal.classList.add('show');
        });
    });

    const close = document.querySelector('.modal-pay-tariff .close') ?? null;
    if(close === null) return;
    close.addEventListener('click', e => {
        const modal = document.querySelector('.modal-pay-tariff');
        modal.classList.remove('show');
    });
}

function registerForm() {
    const registerForm = document.querySelector('#register-form') ?? null;
    if(registerForm === null) return;
    registerForm.addEventListener("submit", e => {
        e.preventDefault();
    });
}

function saveAvatar() {
    const form = document.querySelector('#save-avatar-form') ?? null;
    if(form === null) return;

    const input = form.querySelector('input[type="file"]');
    input.addEventListener('input', e => form.submit());
}

document.addEventListener('DOMContentLoaded', e => {
    start();
    faq();
    contactSend();
    // customSelect();
    mobileMenu();
    depositModal();
    saveAvatar();
});
