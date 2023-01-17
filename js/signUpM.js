console.log("signup.js");

const form = document.getElementById("form");
let pp = form.querySelector("#pp");
let showPP = document.querySelector(".showPP");
let signUpBtn = document.getElementById("btn");
let errorText = document.querySelector(".errorText");
console.log(pp.value);


pp.onchange = () => {
    console.log("something is changed");
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

signUpBtn.onclick = () => {
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
                    errorText.style.opacity = "1";
                    errorText.textContent = data;
                    setTimeout(() => {
                        errorText.style.opacity = "0";
                    }, 3000);
                }
                // console.log("else part " + data);
            }
        }
    }
   

    let formData = new FormData(form);
    xhr.send(formData);
}