const inputText = document.getElementById('input-text');
const button = document.getElementById('serchBtn');
inputText.addEventListener('keyup', (e) => {
    if (0 < e.target.value.length) {
        button.disabled = false;
    }
    else if(0 === e.target.value.length){
        button.disabled = true;
    }
})
