let single = document.getElementById("single");
let multi = document.getElementById("multi");

function col(value){
    let oDiv = document.querySelectorAll(".card-main");
    let lists = Array("lg:w-8/12","w-8/12","xl:w-4/12","lg:w-1/3","w-6/12","md:w-8/12","w-full","w-2/3","w-9/12")
    oDiv.forEach((val,i) => {
        lists.forEach((list,i)=>{
            val.classList.remove(list);
        })
        // val.className += (" "+value);
        value.forEach((value2,key)=>{
            val.classList.add(value2);
        })
    })
}
single.addEventListener("click",()=>col(["lg:w-8/12","w-full"]));
multi.addEventListener("click",()=>col(["xl:w-4/12","md:w-3/6","w-9/12"]));