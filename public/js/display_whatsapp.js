document.addEventListener("DOMContentLoaded", function () {
    var button = document.getElementById('button_display_whatsapp');
    var dropdownList = document.querySelector('.dropdown-list');

    button.addEventListener('click', function () {
        dropdownList.style.display = (dropdownList.style.display === 'flex') ? 'none' : 'flex';
    });

    window.addEventListener('scroll', function () {
        var displayWhatsapp = document.querySelector('.display_whatsapp');
        displayWhatsapp.style.bottom = '2%';
        displayWhatsapp.style.top = 'initial';
    });
});