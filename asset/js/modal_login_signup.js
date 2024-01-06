// Lấy "Đăng nhập", "Đăng ký" và modal con
const openModalButton = document.querySelector(".js-modal-login");
const modal = document.querySelector(".js-modal");
const closeModalButtonSignup = document.querySelector(".js-modal-signup-close");
const modalSignup = document.querySelector(".js-modal-signup");
const switchSigup = document.querySelector(".js-modal-switch");

// Lấy heade, icon menu
var headerElm = document.getElementById("header");
var headerH = headerElm.clientHeight; // Lấy height
const moblieElm = document.querySelector(".mobile-btn");
const headerUr = document.querySelector(".header__user");

// khi click menu => header = height = auto
moblieElm.addEventListener("click", () => {
  var isOpen = headerElm.clientHeight === headerH;
  if (isOpen) {
    headerElm.style.height = "auto";
  } else {
    headerElm.style.height = null;
  }
});

headerUr.addEventListener("click", () => {
  var isOpen = headerElm.clientHeight === headerH;
  if (isOpen) {
    headerElm.style.height = "auto";
  } else {
    headerElm.style.height = null;
  }
});

// Lấy thẻ đóng modal (icon x)
const closeModalButton = document.querySelector(".js-modal-close");
const closeModalButton2 = document.querySelector(".js-modal-close2");

// Khi click vào "Đăng nhập", hiện modal
openModalButton.addEventListener("click", () => {
  modal.style.display = "block";
});
closeModalButtonSignup.addEventListener("click", () => {
  modalSignup.style.display = "block";
});

// Khi click vào icon x, đóng modal
closeModalButton.addEventListener("click", () => {
  modal.style.display = "none";
});
closeModalButton2.addEventListener("click", () => {
  modalSignup.style.display = "none";
});
switchSigup.addEventListener("click", () => {
  //chuyển từ modal -> modalSignup
  modal.style.display = "none";
  modalSignup.style.display = "block";
});

// Đóng modal khi click ra ngoài nó
window.addEventListener("click", (event) => {
  if (event.target === modal) {
    modal.style.display = "none";
  }
});
window.addEventListener("click", (event) => {
  if (event.target === modalSignup) {
    modalSignup.style.display = "none";
  }
});
