let searchText = document.querySelector("#searchBox");
let list = document.querySelector(".userListArea");

// console.log(searchText.value);
searchText.onkeyup = () => {
    // console.log(searchText.value);
    const xhr = new XMLHttpRequest();
    if (searchText.value != "") {
        xhr.open("GET","./php/search.php?searchText="+searchText.value, true);
        xhr.onload = () => {
            let data = xhr.response;
            // console.log(data);
            list.innerHTML = data;
        }
        xhr.send();
    }else{
        list.innerHTML = "";
    }
}