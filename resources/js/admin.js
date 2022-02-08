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
  const userModal = document.querySelector(".user");
  const closeBtn = userModal.querySelector(".user__close");
  closeBtn.addEventListener("click", (e) => {
    userModal.classList.remove("show");
  });
  const btns = document.querySelectorAll(".clients-item__open-btn");
  btns.forEach((btn) => {
    btn.addEventListener("click", (e) => {
      userModal.classList.add("show");
    });
  });
}
tabs();
user();
