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

const inputText = document.getElementById('input-Chtext');
const button = document.getElementById('serch-ChBtn');
inputText.addEventListener('keyup', (e) => {
    if (0 < e.target.value.length) {
        button.disabled = false;
    }
    else if(0 === e.target.value.length){
        button.disabled = true;
    }
})
