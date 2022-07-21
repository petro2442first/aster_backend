function tabs() {
    const blocks = document.querySelectorAll(".admin__block");
    const btns = document.querySelectorAll(".admin__menu-item") ?? null;
    if (btns === null) return;
    btns.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            blocks.forEach((block) => {
                if (block.dataset.tab == btn.dataset.tab_id) {
                    block.classList.add("active");
                } else {
                    block.classList.remove("active");
                }
            });
        });
    });
}
function user() {
    const userModals = document.querySelectorAll(".user");
    userModals.forEach((userModal) => {
        const closeBtn = userModal.querySelector(".user__close");
        closeBtn.addEventListener("click", (e) => {
            userModal.classList.remove("show");
        });
    });

    const btns = document.querySelectorAll(".clients-item__open-btn");
    btns.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            document.querySelector(btn.dataset.modal).classList.add("show");
        });
    });

    const historyItems = document.querySelectorAll(".history-item");
    historyItems.forEach((item) => {
        const btn = item.querySelector(".remove");
        btn.addEventListener("click", (e) => {
            if (confirm("Подвердите удаление операции")) return true;
            else e.preventDefault();
        });
    });
    const tariffs = document.querySelectorAll(".tariff");
    tariffs.forEach((tariff) => {
        let btn = tariff.querySelector(".add");
        if (tariff.classList.contains("added")) {
            btn = tariff.querySelector(".remove");
        }
        btn.addEventListener("click", (e) => {
            if (confirm("Подвердите изменение списка тарифов")) return true;
            else e.preventDefault();
        });
    });
    const deleteBtns = document.querySelectorAll(".user__delete");
    deleteBtns.forEach((btn) => {
        btn.parentElement.addEventListener("submit", (e) => {
            e.preventDefault();
            if (confirm("Подвердите удаление пользователя"))
                btn.parentElement.submit();
            else e.preventDefault();
        });

        console.log(btn.parentElement);
    });

    const reqDeleteBtns = document.querySelectorAll(".requests__no");
    reqDeleteBtns.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            if (confirm("Подвердите удаление запроса на вывод")) return true;
            else e.preventDefault();
        });
    });
}
function preloader() {
    window.addEventListener("load", (e) =>
        document.body.classList.add("loaded")
    );
}
preloader();
tabs();
user();
