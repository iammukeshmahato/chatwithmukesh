let userScroll = document.querySelector(".users-scroll");
// let searchText = document.querySelector("#searchBox");


// console.log("mukesh");
setInterval(() => {
    checkActive();
}, 2000);
setInterval(() => {
    if (searchText.value == "") {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "./php/getUserScroll.php", true);
        xhr.onload = () => {
            let data = xhr.response;
            userScroll.innerHTML = data;
        }
        xhr.send();
    }
}, 500);



function checkActive() {
    // console.log("check activity is running");
    const xhr = new XMLHttpRequest();
        xhr.open("GET", "./php/checkActive.php?checkActive=1", true);
        xhr.onload = () => {
            let data = xhr.response;
            // console.log(data);
            if (data == "loginExpire") {
                window.location.href = "./php/logout.php";
            }
        }
        xhr.send();
}