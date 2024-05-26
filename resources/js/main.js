// BOTTONE E LOADER IMMAGINE FORM
document.addEventListener("DOMContentLoaded", function () {
    const button = document.querySelector("#btnCustom");
    const imgInput = document.querySelector("#imgInput");
    const imgUploaded = document.querySelector("#imgUploaded");
    const uploadSwitch = document.querySelector("#uploadSwitch");
    // Disable the button
    imgInput.addEventListener("click", function () {
        button.style.display = "none";
        uploadSwitch.classList.replace("d-none", "d-block");
        // Re-enable the button after 3 seconds
    });
    if (imgInput.checked) {
        uploadSwitch.classList.replace("d-block", "d-none");
    }
});


