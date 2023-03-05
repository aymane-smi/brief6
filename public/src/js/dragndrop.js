const dragstart = (e)=>{
    e.dataTransfer.setData("text", e.target.id);
}

const drop = (e)=>{
    e.preventDefault();
}

const changeStatus = async(id, status)=>{
    const form = new FormData();
    form.append("id", parseInt(id.substring(4)));
    form.append("status", status);
    await fetch("http://localhost:9000/Order/changeStatus", {
        method: "POST",
        body: form,
    });
}

const dragdrop = (e)=>{
    e.preventDefault();
    const tmp = e.dataTransfer.getData("text");
    const ticket = document.getElementById(tmp);
    //if created

    if(ticket.childNodes[1].classList.value.includes("blue")){
        console.log("trigger blue");
        ticket.childNodes[1].classList.remove("bg-blue-300");
        ticket.childNodes[3].childNodes[5].classList.remove("border-blue-500");
        if(e.explicitOriginalTarget.id === "shipped"){
            ticket.childNodes[1].classList.add("bg-orange-300");
            ticket.childNodes[3].childNodes[5].classList.add("border-orange-500");
            ticket.childNodes[3].childNodes[5].textContent = "envoyer";
            changeStatus(tmp, "shipped");
        }else if(e.explicitOriginalTarget.id === "delivred"){
            ticket.childNodes[1].classList.add("bg-green-300");
            ticket.childNodes[3].childNodes[5].classList.add("border-green-500");
            ticket.childNodes[3].childNodes[5].textContent = "reçu";
            changeStatus(tmp, "delivred");
        }
    
    //if shipped
    }else if(ticket.childNodes[1].classList.value.includes("orange")){
        console.log("trigger orange");
        if(e.explicitOriginalTarget.id === "delivred"){
            ticket.childNodes[1].classList.remove("bg-orange-300");
            ticket.childNodes[1].classList.add("bg-green-300");
            ticket.childNodes[3].childNodes[5].classList.remove("border-orange-500");
            ticket.childNodes[3].childNodes[5].classList.add("border-green-500");
            ticket.childNodes[3].childNodes[5].textContent = "reçu";
            changeStatus(tmp, "delivred");
        }
    }
    //console.log(e.target);
    e.target.appendChild(ticket);
}