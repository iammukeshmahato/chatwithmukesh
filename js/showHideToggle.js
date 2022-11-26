let password = document.querySelector("#password");
// let icon = document.querySelector("showHideToggle");
var showHideToggle = document.querySelector(".showHideToggle");

showHideToggle.onclick = () => {
    if (password.type == "password") {
        password.type = "text";
        showHideToggle.src = "images/show.png";
        
    }else{
        password.type = "password";
        showHideToggle.src = "images/hide.png";
    }
}