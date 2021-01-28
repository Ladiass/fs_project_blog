$().ready(()=>{
    let oDiv =$("main");
    oDiv.load("/views/dashboard/views/all_posts.php");
})

let nav_posts =$("div[data-dropbtn]");

var timeOut;
var tar;
var time = (e)=>{
    timeOut = setTimeout(() => {
        e.removeClass("nav_show")
    }, 250)
};
nav_posts.hover((ev)=>{
    if(window.innerWidth > 762){
        let attr_id = ev.target.getAttribute("data-dropbtn");
        tar = nav_posts.siblings("[data-dropmenu=" + attr_id + "]") ;
        tar.addClass("nav_show");
    }
},()=>{
    if(window.innerWidth > 762){
        time(tar);
        tar.hover(()=>{clearTimeout(timeOut)},()=>{time(tar)})
    }
})

nav_posts.click((ev)=>{
    let attr_id = ev.target.getAttribute("data-dropbtn");
    tar = nav_posts.siblings("[data-dropmenu=" + attr_id + "]") ;
    tar.addClass("nav_show");
})

$(".nav_close").click(()=>{
    $("[data-dropmenu]").removeClass("nav_show");
})

let oDiv =$("main");
$("#posts_add").click(()=>{
    oDiv.load("/views/dashboard/views/add_posts.php")
})
$("#posts_all").click(()=>{
    oDiv.load("/views/dashboard/views/all_posts.php")
})
$("#profile").click(()=>{
    // oDiv.load("/views/dashboard/views/add_posts.php")

})
$("#change_pass").click(()=>{
    oDiv.load("/views/dashboard/views/change_pass.php")

})
$("#add_user").click(()=>{
    oDiv.load("/views/dashboard/views/register.php")
})



