// console.log("signup.js");

const form = document.querySelector(".signup form");
let pp = form.querySelector("#pp");
let showPP = form.querySelector(".showPP");
let continueBtn = form.querySelector(".submitBtn button");
let errorText = document.querySelector(".errorText");
// console.log(errorText);
console.log(pp.value);

pp.onchange = () => {
    console.log("something is changed");
    showPP.style.display = "block";
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "php/showUserPicture.php", true);
    xhr.onload = () => {
        let data = xhr.response;
        // console.log(data);
        showPP.innerHTML = data;
    }

    let formData = new FormData(form);
    xhr.send(formData);
    // showPP.innerHTML = `<img src="images/mkm.jpg">`;
}

form.onsubmit = (e) => {
    e.preventDefault();
}

continueBtn.onclick = () => {
    console.log(pp.value);
    const xhr = new XMLHttpRequest();
    console.log("clicked");
    xhr.open("POST", "php/signup.php", true);

    
    xhr.onload = () => {
        if (xhr.status == 200) {
            let data = xhr.response;
            // console.log(data);
            // if (data !== "") {
            //     console.log(data);
                
            // }
            if ((data == "loginSuccessful")) {
                // console.log(location.href);
                location.href = "user.php";
            }else{
                if(data !== ""){
                    errorText.style.display = "block";
                    errorText.textContent = data;
                    setTimeout(() => {
                        errorText.style.display = "none";
                    }, 3000);
                }
                // console.log("else part " + data);
            }
        }
    }
   

    let formData = new FormData(form);
    xhr.send(formData);
}
