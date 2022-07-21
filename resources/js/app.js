import "normalize.css";
import CustomSelect from "custom-select";

function faq() {
    const items = document.querySelectorAll(".faq__item") ?? null;
    if (items === null) return;
    items.forEach((item) => {
        item.addEventListener("click", (e) => {
            item.classList.toggle("dropdown");
        });
    });
}
function contacts() {
    const fields =
        document.querySelectorAll(
            ".feedback__group, .feedback__message, .register__group, .login__group"
        ) ?? null;
    if (fields === null) return;
    fields.forEach((field) => {
        const textArea = field.children[1];
        const label = field.children[0];
        textArea.addEventListener("focusin", (e) => {
            field.classList.add("focus");
        });
        textArea.addEventListener("focusout", (e) => {
            if (textArea.value == "") {
                field.classList.remove("focus");
            }
        });
    });
}
function mobileMenu() {
    const nav = document.querySelector(".header__nav") ?? null;
    if (nav === null) return;
    const burger = nav.querySelector(".burger");
    const list = nav.querySelector(".nav-list");
    burger.addEventListener("click", (e) => {
        nav.classList.toggle("show");
    });
}
function customSelects() {
    const selects = document.querySelectorAll("select");
    console.log(selects);
    selects.forEach((select) => {
        CustomSelect(select);
    });
}
function profile() {
    function saveAvatar() {
        const form = document.querySelector("#save-avatar-form") ?? null;
        if (form === null) return;

        const input = form.querySelector('input[type="file"]');
        input.addEventListener("input", (e) => form.submit());
    }
    saveAvatar();
    function history() {
        const btn = document.querySelector(".history__see-more") ?? null;
        if (btn === null) return;
        const modal = document.querySelector(".history-modal") ?? null;
        if (modal === null) return;
        btn.onclick = () => {
            modal.classList.add("show");
            document.documentElement.style.overflow = "hidden";
        };
        const close = modal.querySelector(".history-modal__close-btn");
        close.onclick = () => {
            modal.classList.remove("show");
            document.documentElement.style.overflow = "auto";
        };
    }
    function payTariff() {
        const btn = document.querySelector(".finance__pay-cash") ?? null;
        if (btn === null) return;
        const modal = document.querySelector(".pay-tariff-modal") ?? null;
        if (modal === null) return;
        btn.onclick = () => {
            modal.classList.add("show");
            document.documentElement.style.overflow = "hidden";
        };
        const close = modal.querySelector(".pay-tariff-modal__close-btn");
        close.onclick = () => {
            modal.classList.remove("show");
            document.documentElement.style.overflow = "auto";
        };

        const tariffs = modal.querySelectorAll(".tariff-item");
        const currTariff = modal.querySelector(".payment .tariff-item");
        tariffs.forEach((tariff) => {
            tariff.onclick = () => {
                const radio = tariff.querySelector("input[type='radio']");
                radio.click();
                currTariff.className = tariff.className;
                currTariff.querySelector(".tariff-item__title").innerText =
                    tariff.querySelector(".tariff-item__title").innerText;
                currTariff.querySelector('input[type="hidden"]').value = tariff
                    .querySelector(".tariff-item__title")
                    .innerText.toLowerCase();
            };
        });
    }
    function deposit() {
        var btn = document.getElementsByClassName("start-invest")[0] ?? null;
        if (btn === null) return;
        var tariff = document.getElementById("choose-tariff");

        var modal = document.getElementsByClassName("deposit-modal")[0];
        btn.onclick = () => {
            modal.className += " show";
            const modalTariff = modal.querySelector(".tariff-item");
            modalTariff.className = `tariff-item ${tariff.value.toLowerCase()}`;
            modalTariff.querySelector(".tariff-item__title").innerText =
                tariff.value.toUpperCase();
            modalTariff.getElementsByTagName("input")[0].value =
                tariff.value.toLowerCase();
            document.documentElement.style.overflow = "hidden";
        };
        const close = modal.getElementsByClassName(
            "deposit-modal__close-btn"
        )[0];
        close.onclick = () => {
            modal.className = "deposit-modal";
            document.documentElement.style.overflow = "auto";
        };
    }
    function withdraw() {}
    withdraw();
    deposit();
    history();
    payTariff();
}
function mobileProfile() {
    const tabs = document.querySelectorAll(".pm [data-tab]") ?? null;
    if (tabs === null) return;
    const tabBtns = document.querySelectorAll(".pm [data-tabID]") ?? null;
    if (tabBtns === null) return;
    tabBtns.forEach((btn) => {
        btn.addEventListener("click", openTab.bind(btn, event));
    });
    function openTab(event) {
        event.preventDefault();
        tabs.forEach((tab) => {
            this.dataset.tabid != tab.dataset.tab
                ? tab.classList.remove("current")
                : tab.classList.add("current");
            document.querySelector(".pm__menu").classList.remove("show");
        });
        tabBtns.forEach((btn) => btn.classList.remove("active"));
        this.classList.add("active");
    }
    const burger = document.querySelector(".pm__menu-burger") ?? null;
    if (burger === null) return;
    burger.addEventListener("click", (e) => {
        document.querySelector(".pm__menu").classList.toggle("show");
    });
    const chooseTariff = document.querySelector("#tariff");

    const tariffs = {
        silver: {
            title: "SILVER",
            price: "100$-500$",
            period: "21 bussiness days",
            percent: "0.7%",
        },
        invest: {
            title: "INVEST CASE",
            price: "from 10000$",
            period: "60 bussiness days",
            percent: "from 7%",
        },
        gold: {
            title: "GOLD",
            price: "550$-10000$",
            period: "40 bussiness days",
            percent: "1.5%",
        },
        platinum: {
            title: "PLATINUM",
            price: "1000$-5000$",
            period: "50 bussiness days",
            percent: "3%",
        },
        infinity: {
            title: "INFINITY",
            price: "5000$-1000$",
            period: "60 bussiness days",
            percent: "5%",
        },
    };
    chooseTariff.customSelect.select.addEventListener("change", (e) => {
        console.log("select");
        document.querySelector(".tariff__price").innerText =
            tariffs[chooseTariff.value].price;
        document.querySelector(".tariff__item h3").innerText =
            tariffs[chooseTariff.value].title;
        document.querySelector(".tariff__item p").innerText =
            tariffs[chooseTariff.value].percent;
        document.querySelector(".tariff__period span").innerText =
            tariffs[chooseTariff.value].period;
        document.querySelector(
            ".tariff__item"
        ).className = `tariff__item ${chooseTariff.value}`;
    });
}
function calculator() {
    const calc = document.querySelector(".calculator") ?? null;
    if (calc === null) return;
    const tariffs = {
        silver: {
            title: "SILVER",
            price: {
                min: 100,
                max: 500,
            },
            period: "21",
            percent: "0.7",
        },
        gold: {
            title: "GOLD",
            price: {
                min: 550,
                max: 1000,
            },
            period: "40",
            percent: "1.5",
        },
        platinum: {
            title: "PLATINUM",
            price: {
                min: 1000,
                max: 5000,
            },
            period: "50",
            percent: "3",
        },
        infinity: {
            title: "INFINITY",
            price: {
                min: 5000,
                max: 10000,
            },
            period: "60",
            percent: "5",
        },
    };
    const chooseTariff = calc.querySelector("#calc-tariff");
    const days = calc.querySelector("#calc-days");
    const cash = calc.querySelector("#calc-cash");
    const income = calc.querySelector("#calc-income");
    chooseTariff.customSelect.select.addEventListener("change", (e) => {
        cash.min = tariffs[chooseTariff.value].price.min;
        cash.max = tariffs[chooseTariff.value].price.max;
        cash.value = cash.min;
        income.value = (
            (tariffs[chooseTariff.value].percent / 100) *
            days.value *
            cash.value
        ).toFixed(2);
    });
    days.addEventListener("input", (e) => {
        income.value = (
            (tariffs[chooseTariff.value].percent / 100) *
            days.value *
            cash.value
        ).toFixed(2);
    });
    cash.addEventListener("input", (e) => {
        if (Number(cash.value) > cash.max) {
            cash.value = cash.max;
        }
        income.value = (
            (tariffs[chooseTariff.value].percent / 100) *
            days.value *
            cash.value
        ).toFixed(2);
    });
}
function referralLink() {
    const reflink = document.querySelector(".referral-link") ?? null;
    if (reflink === null) return;
    reflink.addEventListener("click", (e) => {
        // alert("Copied!");
        const input = reflink.querySelector("input");
        input.select();
        document.execCommand("copy");

        reflink.classList.add("success");

        setTimeout(() => reflink.classList.remove("success"), 2000);
    });
}
function preloader() {
    window.addEventListener("load", (e) =>
        document.body.classList.add("loaded")
    );
}
document.addEventListener("DOMContentLoaded", (e) => {
    faq();
    contacts();
    mobileMenu();
    customSelects();
    calculator();
    referralLink();
    profile();
    preloader();
    // window.innerWidth >= 1240 ? profile() : mobileProfile();
});
