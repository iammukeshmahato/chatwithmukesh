const form = document.querySelector(".container form");
let userInput = form.querySelector(".inputMsg");
let sendBtn = form.querySelector("button");
const msgArea = document.querySelector(".msgArea");
let notScrolling = true;
form.onsubmit = (e) => {
    e.preventDefault();
};

msgArea.onmouseenter = () => {
    notScrolling = false;
};
msgArea.onmouseleave = () => {
    notScrolling = true;
};

userInput.onkeyup = () => {
    if (userInput.value != "") {
        sendBtn.style.opacity = 1;
    } else {
        sendBtn.style.opacity = 0.5;
    }
};

sendBtn.onclick = () => {
    if (userInput.value != "") {
        const xhr = new XMLHttpRequest();

        xhr.open("POST", "./php/insertMessage.php", true);
        xhr.onload = () => {
            let data = xhr.response;
            if (data == "successfull") {
                userInput.value = "";
            }
        };

        let formData = new FormData(form);
        xhr.send(formData);
    }
};

setInterval(() => {
    const xhr = new XMLHttpRequest();

    xhr.open("POST", "./php/getMessage.php", true);
    xhr.onload = () => {
        let data = xhr.response;
        msgArea.innerHTML = data;
        if (notScrolling) {
            goToBottom();
        }
    };

    let formData = new FormData(form);
    xhr.send(formData);
}, 500);

function goToBottom() {
    msgArea.scrollTop = msgArea.scrollHeight;
}
