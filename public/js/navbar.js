/** 
 * Evento para desplegar mobile-navbar
*/
const menuHamburguer = document.getElementById('icon-hamburguer');

menuHamburguer.addEventListener('click', function() {
    const mobileNavbar = document.querySelector('.mobile-navbar');

    const icon = document.querySelector('#icon-hamburguer');

    if (icon.getAttribute('name') == 'reorder-four-outline') {
        mobileNavbar.style.left = '0px';
        icon.setAttribute('name','close-outline');
    }else{
        mobileNavbar.style.left = '-260px';
        icon.setAttribute('name','reorder-four-outline');
    }
});

/**
 * Evento para desplegar submenu de mobile-navbar
 */
const submenuItems = document.querySelectorAll('.mobile-navbar .mobile-menu');

submenuItems.forEach(function(item) {
  item.addEventListener('click', function() {
    const submenu = this.querySelector('.mobile-submenu');
    const isExpanded = submenu.style.maxHeight;
    const icon = this.querySelector('#angle');

    submenuItems.forEach(function(item) {
      item.querySelector('.mobile-submenu').style.maxHeight = null;
    });
    
    if (isExpanded) {
      submenu.style.maxHeight = null;
      if (icon.classList.contains('fa-angle-up')){
        icon.classList.remove('fa-angle-up');
        icon.classList.add('fa-angle-down')
      }
    } else {
      submenu.style.maxHeight = submenu.scrollHeight + 'px';
      if (icon.classList.contains('fa-angle-down')){
        icon.classList.remove('fa-angle-down');
        icon.classList.add('fa-angle-up')
      }
    }
  });
});