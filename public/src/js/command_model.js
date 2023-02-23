const commands = document.querySelectorAll(".activate_model");
const model = document.querySelector("#model");

commands.forEach((command)=>{
    command.addEventListener("click", (e)=>{
        id = e.target.id.substring(5);
        const formdata = new FormData();
        formdata.append("id", id);
        fetch("http://localhost:9000/Order/commandInfo", {
            method: "POST",
            body: formdata,
        }).then((res)=>res.json()).then((data)=>{
            console.log(data);
        });
    });
});