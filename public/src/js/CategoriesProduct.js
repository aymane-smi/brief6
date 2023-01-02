const categories = document.querySelectorAll("input[type='checkbox']:checked");
const ProductsContainer = document.querySelector(".products-container");
const arr = [];

for(checkbox of document.querySelectorAll("input[type='checkbox']")){
    checkbox.addEventListener("change", ()=>{
        const arr = [];
        document.querySelectorAll("input[type='checkbox']:checked").forEach((check)=>{
            arr.push(check.value);
        });
        if(arr.length){
            let formData = new FormData();
            formData.append("categories", JSON.stringify(arr));
            fetch("http://localhost:9000/Products/catgories", {
                method: "POST",
                body: formData,
            }).then((res)=>res.json())
            .then((data)=>{
                ProductsContainer.innerHTML = "";
                for(product of data){
                    let div = document.createElement("div");
                    div.innerHTML = `
                    <div class="overflow-hidden rounded-md w-fit border-[1px] border-[#5C5C5C]">
                        <img class="w-[200px] h-[200px]" src="http://localhost:9000/public/src/assets/product/${product.image}" alt="${product.reference}" />
                    </div>
                    <p class="mt-3 flex justify-between items-center">
                        <span class="font-800 text-[15px] text-gray-500">${product.reference}</span>
                        <span class="font-800 text-[11px] text-gray-500 rounded-sm p-1 bg-gray-200">${product.name}</span>
                    </p>
                    <p class="mt-3 font-semibold text-[15px] text-gray-500">${product.label}</p>
                    <p class="mt-3 flex justify-between items-center">
                        <span class="mt-3 font-semibold text-[18px]">${product.final_price} MAD</span>
                        <a class="p-1 text-gray-500 border-[1px] border-gray-200 rounded-md hover:border-black hover:bg-black hover:text-white" href="/Product/${product.id}">Détaille</a>
                    </p>
                `;
                ProductsContainer.appendChild(div);
                }
            });
        }else{
            fetch("http://localhost:9000/Products", {
                method: "POST",
            }).then((res)=>res.json())
            .then((data)=>{
                ProductsContainer.innerHTML = "";
                for(product of data){
                    let div = document.createElement("div");
                    div.innerHTML = `
                    <div class="overflow-hidden rounded-md w-fit border-[1px] border-[#5C5C5C]">
                        <img class="w-[200px] h-[200px]" src="http://localhost:9000/public/src/assets/product/${product.image}" alt="${product.reference}" />
                    </div>
                    <p class="mt-3 flex justify-between items-center">
                        <span class="font-800 text-[15px] text-gray-500">${product.reference}</span>
                        <span class="font-800 text-[11px] text-gray-500 rounded-sm p-1 bg-gray-200">${product.name}</span>
                    </p>
                    <p class="mt-3 font-semibold text-[15px] text-gray-500">${product.label}</p>
                    <p class="mt-3 flex justify-between items-center">
                        <span class="mt-3 font-semibold text-[18px]">${product.final_price} MAD</span>
                        <a class="p-1 text-gray-500 border-[1px] border-gray-200 rounded-md hover:border-black hover:bg-black hover:text-white" href="/Product/${product.id}">Détaille</a>
                    </p>
                `;
                ProductsContainer.appendChild(div);
                }
            });
        }
    });
}