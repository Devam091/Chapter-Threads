const all = document.getElementById('all');
function handleRadioOnclick() {
    if(document.getElementById('google').checked){
        all.style.display = 'none';
    } else{
        all.style.display = 'block';
    }
}
const radioButtons = document.querySelectorAll('input[name="payment-method"]');
radioButtons.forEach(radio => {
radio.addEventListener('click', handleRadioClick);
});