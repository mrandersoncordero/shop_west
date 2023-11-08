const action_menu_user = document.querySelector('#action_menu_user');
const menu_user = document.querySelector('.menu_user');

const action_menu_truck = document.querySelector('#button_truck');
const menu_truck = document.querySelector('.container_cart--menu');

const container_message = document.querySelector('.container_message');
const close_message = document.querySelector('#close_message');

function verify_active_message() {
  if (container_message) {
    if (!container_message.classList.contains('hidden')) {
      container_message.classList.add('hidden');
    }
  }
}
action_menu_truck.addEventListener('click', () => {
  // console.log(menu_user.classList.contains('inactive'));

  if(menu_user.classList.contains('inactive')) {
    // Si menu_user esta inactivo
    // Desplegar menu_truck sin hacer nada a menu_user

    verify_active_message();

    menu_truck.classList.toggle('inactive');
  }else{

    verify_active_message();

    menu_user.classList.add('inactive');
    menu_truck.classList.remove('inactive');
  }
});

action_menu_user.addEventListener('click', () => {
  // menu_truck.classList.toggle('inactive');

  if (menu_truck.classList.contains('inactive')) {

    verify_active_message();

    // Si menu-truck esta inactivo
    // Desplegar menu_user sin hacer nada a menu_truck
    menu_user.classList.toggle('inactive');
  }else{

    verify_active_message();
    
    menu_truck.classList.add('inactive');
    menu_user.classList.remove('inactive');
  }
});

if (container_message) {
  close_message.addEventListener('click', function(e) {
    container_message.classList.add('hidden');
  });
}
