/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/admin.js ***!
  \*******************************/
function tabs() {
  var _document$querySelect;

  var blocks = document.querySelectorAll(".admin__block");
  var btns = (_document$querySelect = document.querySelectorAll(".admin__menu-item")) !== null && _document$querySelect !== void 0 ? _document$querySelect : null;
  if (btns === null) return;
  btns.forEach(function (btn) {
    btn.addEventListener("click", function (e) {
      blocks.forEach(function (block) {
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
  var userModal = document.querySelector(".user");
  var closeBtn = userModal.querySelector(".user__close");
  closeBtn.addEventListener("click", function (e) {
    userModal.classList.remove("show");
  });
  var btns = document.querySelectorAll(".clients-item__open-btn");
  btns.forEach(function (btn) {
    btn.addEventListener("click", function (e) {
      userModal.classList.add("show");
    });
  });
}

tabs();
user();
/******/ })()
;