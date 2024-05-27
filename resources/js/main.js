// BOTTONE E LOADER IMMAGINE FORM
const button = document.querySelector("#btnCustom");
document.addEventListener("DOMContentLoaded", function () {
    
    const imgInput = document.querySelector("#imgInput");
    const imgUploaded = document.querySelector("#imgUploaded");
    const uploadSwitch = document.querySelector("#uploadSwitch");
    // Disable the button
    imgInput.addEventListener("click", function () {
        button.style.display = "none";
        uploadSwitch.classList.replace("d-none", "d-block");
        
    });
});
button.addEventListener("click", function () {
    window.scrollY = start;
});

