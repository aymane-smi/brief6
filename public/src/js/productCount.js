const price = document.querySelector(".init-price");

const up = document.querySelector(".up-counter");

const down = document.querySelector(".down-counter");

let counter = document.querySelector(".counter");

up.addEventListener("click", function(){
    let tmp = Number.parseInt(counter.innerText)+1;
    document.querySelector(".qte-input").value = tmp+"";
    counter.innerText = tmp;  
  });

down.addEventListener("click", function(){
    if(Number.parseInt(counter.innerText) > 0){
        let tmp = Number.parseInt(counter.innerText)-1;
        document.querySelector(".qte-input").value = tmp+"";
        counter.innerText = tmp;
    }
});

document.querySelector("form").addEventListener("submit", (e)=>{
    if(counter.innerText == "0")
        e.preventDefault();
});