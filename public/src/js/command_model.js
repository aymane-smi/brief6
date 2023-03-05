const commands = document.querySelectorAll(".activate_model");
const model = document.querySelector("#model");
const close = document.querySelector(".close-model");
const client = document.querySelector(".client-info");
const products = document.querySelector(".products");

close.addEventListener("click", ()=>{
    model.classList.remove("flex");
    model.classList.add("hidden");
    client.innerHTML = "";
    products.innerHTML = "";
});
commands.forEach((command)=>{
    command.addEventListener("click", (e)=>{
        id = e.target.id.substring(5);
        model.classList.add("flex");
        model.classList.remove("hidden");
        const formdata = new FormData();
        formdata.append("id", id);
        fetch("http://localhost:9000/Order/commandInfo", {
            method: "POST",
            body: formdata,
        }).then((res)=>res.json()).then((data)=>{
            client.innerHTML = `
                <p class="font-bold">full name <span class="font-medium">${data[0].full_name}</span></p>
                <p class="font-bold">email <span class="font-medium">${data[0].email}</span></p>
                <p class="font-bold">phone <span class="font-medium">${data[0].phone}</span></p>
                <p class="font-bold">city <span class="font-medium">${data[0].city}</span></p>
            `;
            for(const row of data){
                const div = document.createElement("div");
                div.classList.add(...["grid","grid-cols-3","gap-3","mt-5","module-details"]);
                div.innerHTML = `
                <p class="rounded-[10px] p-3 flex justify-center font-bold">${row.label}</p>
                <p class="rounded-[10px] p-3 flex justify-center font-bold">${row.qte}</p>
                <p class="rounded-[10px] p-3 flex justify-center font-bold">${row.qte * row.final_price} $</p>
                `;
                products.append(div);
            }
        });
    });
});