if (document.querySelector('.content_alert')) {
  const content_alert = document.querySelector('.content_alert');
  const layer = document.querySelector('.layer');

  layer.addEventListener('click', () => {
    content_alert.style.display = 'none';
  });
}