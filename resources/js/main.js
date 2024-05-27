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

document.addEventListener("scroll", function() {
    // Function to create the interval for counting
    function createInterval(total, element, time) {
        let counter = 0;
        let interval = setInterval(() => {
            if (counter < total) {
                counter++;
                element.innerHTML = '+' + counter;
            } else {
                clearInterval(interval);
            }
        }, time);
    }

    // Initialize the observer and counters
    let check = true;
    let observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting && check) {
                createInterval(600, document.getElementById('firstNumber'), 20);
                createInterval(1000, document.getElementById('secondNumber'), 10);
                createInterval(50, document.getElementById('thirdNumber'), 100);
                
            }
        });
    });

    // Assuming 'thirdNumber' is the element to observe
    let thirdNumber = document.getElementById('thirdNumber');
    observer.observe(thirdNumber);
});
