const nav = document.querySelector(".navbar-class");
console.log(nav);
document.querySelector(".close-icon").addEventListener("click", ()=>{
    nav.classList.add("hidden");
    console.log("clicked");
});

document.querySelector(".open-nav").addEventListener("click", ()=>{
    nav.classList.remove("hidden");
});