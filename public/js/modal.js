let buttonModal = document.getElementById('buttonModal');
let modal = document.getElementById('modal');
let close = document.getElementById('close');

buttonModal.onclick = function() {
    modal.style.visibility = 'visible';
}
close.onclick = function(){
    modal.style.visibility = 'hidden';
}