let cookieModal = document.querySelector(".cookie-consent-modal")
let cancelCookieBtn = document.querySelector(".btn.cancel")
let acceptCookieBtn = document.querySelector(".btn.accept")

cancelCookieBtn.addEventListener("click", function () {
    cookieModal.classList.remove("active")
    localStorage.setItem("cookieDeclined", "yes");
})

acceptCookieBtn.addEventListener("click", function () {
    cookieModal.classList.remove("active")
    localStorage.setItem("cookieAccepted", "yes")
})

setTimeout(function () {
    let cookieAccepted = localStorage.getItem("cookieAccepted");
    let cookieDeclined = localStorage.getItem("cookieDeclined");
    if (cookieAccepted !== "yes" && cookieDeclined !== "yes") {
        cookieModal.classList.add("active");
    }
}, 1000)


