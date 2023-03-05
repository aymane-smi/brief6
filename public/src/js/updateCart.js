const upCart = document.querySelectorAll(".up-counter-cart");

const downCart = document.querySelectorAll(".down-counter-cart");

let tmp = 0;

document.querySelectorAll(".counter").forEach((x)=>{
    tmp += x.dataset.price * x.innerText;
});

document.querySelector(".price-cart").innerText = tmp;

upCart.forEach((up_)=>{
    up_.addEventListener("click", function(e){
        let tmp = Number.parseInt(e.target.nextElementSibling.innerText)+1;
        e.target.nextElementSibling.innerText = tmp;
        document.querySelector(".price-cart").innerText = Number.parseInt(document.querySelector(".price-cart").innerText) + Number.parseInt(e.target.nextElementSibling.dataset.price);
        let formData = new FormData();
        formData.append("value", tmp);
        formData.append("id", e.target.dataset.id);
        fetch("http://localhost:9000/Cart/plus", {
            method: "post",
            body:formData,
        }); 
    });
});
downCart.forEach((down_)=>{
    down_.addEventListener("click", function(e){
        if(Number.parseInt(e.target.previousElementSibling.innerText) > 0){
            let tmp = Number.parseInt(e.target.previousElementSibling.innerText)-1;
            e.target.previousElementSibling.innerText = tmp;
            document.querySelector(".price-cart").innerText = Number.parseInt(document.querySelector(".price-cart").innerText) - Number.parseInt(e.target.previousElementSibling.dataset.price);

        }

        if(e.target.parentNode.childNodes[3].innerText === "0"){
            fetch("http://localhost:9000/Cart/Delete/"+e.target.dataset.id, {method: "POST"}).then((res)=>location.reload());
            location.reload();
        }else{
            let formData = new FormData();
            formData.append("value", e.target.parentNode.childNodes[3].innerText);
            formData.append("id", e.target.dataset.id);
            fetch("http://localhost:9000/Cart/plus", {
                method: "post",
                body:formData,
            });
        }
    });
});

document.querySelector("form").addEventListener("submit", (e)=>{
    if(counter.innerText == "0")
        e.preventDefault();
});
