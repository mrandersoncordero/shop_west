const action_menu_user = document.querySelector('#action_menu_user');
const menu_user = document.querySelector('.menu_user');

action_menu_user.addEventListener('click', () => {
  menu_user.classList.toggle('inactive');
});