// BOTTONE E LOADER IMMAGINE FORM
let announcementCreate = document.querySelector("#announcementCreate");
if (announcementCreate) {
    const btnCustom = document.querySelector("#btnCustom");

    document.addEventListener("DOMContentLoaded", function () {

        const imgInput = document.querySelector("#imgInput");
        const imgUploaded = document.querySelector("#imgUploaded");
        const uploadSwitch = document.querySelector("#uploadSwitch");
        // Disable the button
        imgInput.addEventListener("change", function (event) {
            if (imgInput.files.length > 0) {
                btnCustom.style.display = "none";
                uploadSwitch.classList.replace("d-none", "d-block");
            } else{
                btnCustom.style.display = "block";
                uploadSwitch.classList.replace("d-block", "d-none");
            }

        });
        
    });

    btnCustom.addEventListener("click", function () {
        window.scrollTo(0, -100);  // Correct way to scroll the window
    });
}

