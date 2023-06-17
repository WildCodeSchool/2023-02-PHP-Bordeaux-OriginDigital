import Cookies from 'js-cookie';

document.addEventListener("DOMContentLoaded", function () {
    const cookieConsentPopup = document.getElementById("cookie-consent-popup");
    const cookieConsentAccept = document.getElementById("cookie-consent-accept");
    const cookieConsentDecline = document.getElementById("cookie-consent-decline");

    cookieConsentAccept.addEventListener("click", function () {
        // L'utilisateur a accepté les cookies
        cookieConsentPopup.style.display = "none";
        // Enregistrez le consentement de l'utilisateur dans un cookie
        Cookies.set('cookie_consent', 'true', { expires: 365 }); // Le cookie expire après 365 jours
    });

    cookieConsentDecline.addEventListener("click", function () {
        // L'utilisateur a refusé les cookies
        cookieConsentPopup.style.display = "none";
        // Supprimez le cookie de consentement existant
        Cookies.remove('cookie_consent');
    });

    // Vérifiez si l'utilisateur a déjà donné son consentement en vérifiant le cookie
    if (Cookies.get('cookie_consent') === 'true') {
        cookieConsentPopup.style.display = "none";
    } else {
        cookieConsentPopup.style.display = "block";
    }
});







