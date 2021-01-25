let oInput = $("form>div input");

oInput.change((e)=>{
    ev = e.target;
    oDiv = ev.parentNode.children[1]
    oDiv.classList.remove("text-fill")
    if(ev.value !== ""){
        oDiv.classList.toggle("text-fill")
    }
})