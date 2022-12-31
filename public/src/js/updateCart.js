up.addEventListener("click", (e)=>{
    let formData = new FormData();
    formData.append("value", e.target.parentNode.childNodes[3].innerText);
    formData.append("id", e.target.dataset.id);
    fetch("http://localhost:9000/Cart/plus", {
        method: "post",
        body:formData,
    });
});

down.addEventListener("click", (e)=>{
    if(e.target.parentNode.childNodes[3].innerText === "0"){
        fetch("http://localhost:9000/Cart/Delete/"+e.target.dataset.id, {method: "POST"}).then((res)=>location.reload());
        //location.reload();
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