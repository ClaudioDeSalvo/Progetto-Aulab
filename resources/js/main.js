document.addEventListener('DOMContentLoaded', function() {
    const button = document.querySelector('#btnCustom');
    const imgInput = document.querySelector('#imgInput');
    // Disable the button
    imgInput.addEventListener('click', function() {
        button.style.display = 'none';

        // Re-enable the button after 3 seconds
    });


});