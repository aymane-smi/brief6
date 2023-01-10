const stripe = Stripe("pk_test_51KeibcFYTJeltiPV5wNs4HYHVjqexC4znbtV9vSjnRVxoX7iNZ78UcAWF8KFTZuPYhOAgX3Q05Jt4lLHu1dkl5Hg00sEc9rjPu");
let cart = stripe.elements().create("card");
cart.mount("#bank_info");
document.querySelector(".form-payment").addEventListener("submit", (e)=>{
    e.preventDefault();
    fetch("https://api.stripe.com/v1/payment_intents", {
        method: "POST",
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': "Bearer sk_test_51KeibcFYTJeltiPVfEOrlZUtnQU3WXOKbWhtqBqguxQQQpcYoAveZYfNUJfkizMK9znoL9lBhsV7jX6tuUHnzQFd00MefRC40S",
        },
        body: "payment_method_types[]=card&currency=usd&amount=10000",
    }).then((res)=>res.json())
    .then(async(data)=>{
        console.log(data.client_secret);
        let intent = await stripe.confirmCardPayment(
            data.client_secret,
            {payment_method:{
                card: cart,
            }}
        );
        if(intent.error){
            alert(intent.error.message);
            return;
        }else{
            (async()=>{
                await fetch("http://localhost:9000/Order/payment", {
                    metod: "POST",
                });
                window.location.href = "/";
            })();
        }
        
    });
});