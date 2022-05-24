let d = document,
  load = window.addEventListener("DOMContentLoaded", lazyLoad),
  authBtn = d.querySelector(".auth-primary"),
  widthType = d.querySelector(".width-type"),
  headerBlock = d.querySelector(".head"),
  body = d.querySelector("body"),
  profile = d.querySelector(".profile"),
  nav = d.querySelector(".nav"),
  width = window.innerWidth,
  footer = d.querySelector(".wrap_footer"),
  titleOfPage = d.querySelector(".length"),
  modalPay = d.querySelector(".modal-pay"),
  modalCall = d.querySelector(".Autho-pay"),
  style = d.createElement("link"),
  head = d.getElementsByTagName("head")[0],
  phone = d.querySelector(".index_player"),
  iframe = d.querySelector(".frame");
let timeDate = Date.now();
function lazyLoadYouTube() {
  iframe.src = "https://www.youtube.com/embed/RciTnNIC3Tg?rel=0";
  nav.classList.add("nav-trf");
  body.classList.add("UpBg");
}
function LoadImg() {
  phone.classList.add("index_player_post");
}
// function LoadDeferredStyles() {
//   // style.rel = "stylesheet";
//   // style.href = "/public/deferred.css?" + timeDate;
//   // head.appendChild(style);
// }
function lazyLoad() {
  footer.classList.add("footer-bg");
  //LoadDeferredStyles();
}
function lengthTitle() {
  if (titleOfPage.clientWidth <= 376) {
    titleOfPage.classList.add("title-min");
  }
}
function AuthFix() {
  body.classList.add("body-min-long");
}
if (titleOfPage) {
  lengthTitle();
}
if (phone != null) {
  lazyLoadYouTube();
  LoadImg();
}
if (profile != null) {
  AuthFix();
}
if (widthType != null && body.clientWidth >= 670) {
  let widthHeader = widthType.clientWidth;
  headerBlock.style.width = widthHeader + "" + "px";
}

$("body").on("click", ".modal-room__clouse", function (event) {
  // close modals

  event.preventDefault();
  $(".modal-overflow").addClass("modal-overflow-clouse");
  $(".modal-overflow").empty();
});

function close_modals() {
  event.preventDefault();
  $(".modal-overflow").addClass("modal-overflow-clouse");
  $(".modal-overflow").empty();
}

let secretModal = document.querySelector(".modal-overflow"),
  secretClouse = document.querySelectorAll(".modal-secret-clouse__js");

function modalToggleSecret() {
  secretModal.classList.toggle("modal-overflow-clouse");
}

for (let i = 0; i < secretClouse.length; i++) {
  secretClouse[i].addEventListener("click", modalToggleSecret);
}

let modeUl = document.querySelector(".mode"),
  wrapForUl = document.querySelector(".wrap-ul"),
  modeUlBtn = document.querySelector(".mode_btn"),
  profileMode = document.querySelector(".profile");

function flareAnimationClass() {
  modeUl.classList.toggle("animate");
  setTimeout(function () {
    modeUl.classList.remove("animate");
  }, 3000);
}
function toggleModeUl() {
  modeUl.classList.toggle("open");
}
if (modeUl !== null) {
  modeUl.addEventListener("click", toggleModeUl);
  setInterval(flareAnimationClass, 13000);
}

let profileLight = document.querySelector(".profile-light_ul"),
  profileLightArrow = document.querySelector(".profile-light_txt span"),
  profileLightBtn = document.querySelector(".profile-light_txt");

function toggleHeaderDropMenu() {
  profileLight.classList.toggle("active");
  profileLightBtn.classList.toggle("rotate");
  profileLight.classList.toggle("back");
}

if (profileLightBtn !== null) {
  profileLightBtn.addEventListener("click", toggleHeaderDropMenu);
}

let modeMore = document.querySelector(".mode-block_yet"),
  modeWrap = document.querySelector(".mode-block"),
  mobaileMenu = document.querySelectorAll(".mobaile"),
  mobaileWrap = document.querySelector(".modal-mobaile-overflow"),
  clickBurger = document.querySelector(".head-mobaile-cont_burger");

function toggleBlock() {
  modeWrap.classList.toggle("hidden");
}

function toggleMenu() {
  mobaileWrap.classList.toggle("hiddenOverflow");
  clickBurger.classList.toggle("activeBurger");
}

for (let i = 0; i < mobaileMenu.length; i++) {
  mobaileMenu[i].addEventListener("click", toggleMenu);
}
// modeMore.addEventListener('click', toggleBlock);
