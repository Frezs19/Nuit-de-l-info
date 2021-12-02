/*
    GLOW COOKIES
    CREATED BY MANUEL CARRILLO
    WWW.GLOWMEDIA.ES
    2020 - v 2.0.3
*/

/* ======================================
ADD THE CSS WITH CDN
====================================== */
const linkElement = document.createElement('link');
linkElement.setAttribute('rel', 'stylesheet');
linkElement.setAttribute('href', `https://cdn.jsdelivr.net/gh/manucaralmo/GlowCookies@2.0.3/src/glowCookies.min.css`); 
document.head.appendChild(linkElement);


/* ======================================
CHECK USER VARIABLES & SET DEFAULTS
====================================== */
var bannerDescription, linkTexto, linkHref, bannerPosition, bannerBackground, descriptionColor, cookiesPolicy, btn1Text,
btn1Background, btn1Color, btn2Text, btn2Background, btn2Color, manageColor, manageBackground, manageText, border, policyLink, hideAfterClick, 
HotjarTrackingCode, AnalyticsCode, FacebookPixelCode

bannerDescription = bannerDescription || "Nous utilisons des cookies à des fins non commerciales afin d'améliorer votre expérience. ";
linkTexto = linkTexto  || 'En apprendre plus sur les cookies';
linkHref = linkHref  || '';
bannerPosition = bannerPosition  || 'left';
bannerBackground = bannerBackground  || '#fff';
descriptionColor = descriptionColor  || '#505050';
cookiesPolicy = cookiesPolicy || 'no';
// Accept cookies btn
btn1Text = btn1Text  || 'Accepter  les cookies';
btn1Background = btn1Background  || '#9151a8';
btn1Color = btn1Color  || '#fff';
// Disable cookies btn
btn2Text = btn2Text  || 'Refuser';
btn2Background = btn2Background  || '#E8E8E8';
btn2Color = btn2Color  || '#636363';
// Manage cookies Btn
manageColor = manageColor  || '#24273F';
manageBackground = manageBackground  || '#fff';
manageText = manageText  || 'Gérer les cookies';
hideAfterClick = hideAfterClick || false;
// Extras
border === "none" ? border = "none" : border = "border";

/* ======================================
HTML ELEMENTS
====================================== */
// COOKIES BUTTON
const PreBanner = document.createElement("div");
PreBanner.innerHTML = `<button type="button" id="prebanner" onClick="openSelector()" class="prebanner prebanner-${bannerPosition} ${border}" style="color: ${manageColor}; background-color: ${manageBackground};">
                            <svg fill="currentColor" style="margin-right: 0.25em; margin-top: 0.15em; vertical-align: text-top;" height="1.05em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path d="M510.52 255.82c-69.97-.85-126.47-57.69-126.47-127.86-70.17 0-127-56.49-127.86-126.45-27.26-4.14-55.13.3-79.72 12.82l-69.13 35.22a132.221 132.221 0 0 0-57.79 57.81l-35.1 68.88a132.645 132.645 0 0 0-12.82 80.95l12.08 76.27a132.521 132.521 0 0 0 37.16 72.96l54.77 54.76a132.036 132.036 0 0 0 72.71 37.06l76.71 12.15c27.51 4.36 55.7-.11 80.53-12.76l69.13-35.21a132.273 132.273 0 0 0 57.79-57.81l35.1-68.88c12.56-24.64 17.01-52.58 12.91-79.91zM176 368c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm32-160c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm160 128c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32z"/>
                            </svg>
                            ${manageText}
                        </button>`;
PreBanner.style.display = "none";
document.body.appendChild(PreBanner);

// COOKIES BANNER
const Cookies = document.createElement("div");
Cookies.innerHTML = `<div class="banner banner-${bannerPosition} ${border}" style="background-color: ${bannerBackground};">
                        <div class="cookie-consent-banner__inner">
                            <div class="cookie-consent-banner__copy">
                                <div class="cookie-consent-banner__description" style="color: ${descriptionColor};">
                                    ${bannerDescription} 
                                    <a href="${linkHref}" class="link-btn" style="color: ${descriptionColor};" target="_blank">${linkTexto}</a>
                                </div>
                            </div>
                            <div class="buttons">
                                <button type="button" id="aceptarCookies" onClick="acceptCookies()" class="cookie-consent-btn" style="background-color: ${btn1Background}; color: ${btn1Color};">
                                <svg fill="currentColor" style="margin-right: 0.25em; margin-top: 0.15em; vertical-align: text-top;" height="1.05em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path d="M510.52 255.82c-69.97-.85-126.47-57.69-126.47-127.86-70.17 0-127-56.49-127.86-126.45-27.26-4.14-55.13.3-79.72 12.82l-69.13 35.22a132.221 132.221 0 0 0-57.79 57.81l-35.1 68.88a132.645 132.645 0 0 0-12.82 80.95l12.08 76.27a132.521 132.521 0 0 0 37.16 72.96l54.77 54.76a132.036 132.036 0 0 0 72.71 37.06l76.71 12.15c27.51 4.36 55.7-.11 80.53-12.76l69.13-35.21a132.273 132.273 0 0 0 57.79-57.81l35.1-68.88c12.56-24.64 17.01-52.58 12.91-79.91zM176 368c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm32-160c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm160 128c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32z"/>
                                </svg>
                                ${btn1Text}
                                </button>
                                <button type="button" id="rechazarCookies" onClick="rejectCookies()" class="cookie-consent-btn-secondary" style="background-color: ${btn2Background}; color: ${btn2Color};">
                                ${btn2Text}
                                </button>
                            </div>
                        </div>
                    </div>`;
Cookies.style.display = "none";
document.body.appendChild(Cookies);




/* ======================================
FUNCTIONS
====================================== */
    
// === ACCEPT AND DENY COOKIES ===
// Accept Cookies
const acceptCookies = () => {
    localStorage.setItem("GlowCookies", "1");
    openManageCookies();
}
// Deny Cookies
const rejectCookies = () => {
    if (confirm('Si vous refuser les cookies, vous ne pourrez pas accéder au site. Etes vous sûrs de vouloir faire cela ?')) {
        document.getElementsByTagName('body')[0].innerHTML = '<div id="cookieRefuse"><h1> Shome </h1> <p> Si vous souhaitez accéder au site, rechargez la page et accepter les cookies.</p></div>'; 
        localStorage.setItem("GlowCookies", "0");
        openManageCookies();
      } else {
      }
}
    
// === OPEN AND CLOSE BANNER & BUTTON ===
// OPEN COOKIES BUTTON
const openSelector = () => {
    PreBanner.style.display = "none";
    Cookies.style.display = "block";
}
// OPEN MANAGE COOKIES BUTTON
const openManageCookies = () => {
    if (hideAfterClick) {
        PreBanner.style.display = "none";
    } else {
        PreBanner.style.display = "block";
    }
    Cookies.style.display = "none";
}

/* ======================================
CHECK -- ACCEPTED OR DISABLED
====================================== */
window.addEventListener('load', () => {
    switch(localStorage.getItem("GlowCookies")) {
        case "1":
            openManageCookies();
            activateTracking();
            break;
        case "0":
            openManageCookies();
            break;
        default:
            openSelector();
    }
})