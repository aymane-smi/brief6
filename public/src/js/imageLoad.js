const imgContainer = document.querySelector(".upload-container");
const input = document.querySelector(".img-input");
const resetImg = document.querySelector(".reset-image");
const displayContainer = document.querySelector(".display-container");

imgContainer.addEventListener("click", ()=>{
    input.click();
});
input.onchange = ({target})=>{
    console.log(target.files);
    document.querySelector(".img-display").src = window.URL.createObjectURL(target.files[0]);
    document.querySelector(".img-size").innerText = Number.parseInt(target.files[0].size / 1024)+"kb";
    document.querySelector(".img-name").innerText = target.files[0].name;
    displayContainer.classList.remove("hidden");
};

resetImg.addEventListener("click", ()=>{
    input.value = "";
    displayContainer.classList.add("hidden");

})