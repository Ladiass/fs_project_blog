let oBtn = $(".reply_btn");
// console.log($(".reply-box"));
oBtn.click((e)=>{
    let ev = e.target;
    let comment_id = $(e.target).children("[name='comment_id']").val();
    let reply_user = $(e.target).children("[name='reply_user']").val();
    let pid = $(e.target).children("[name='pid']").val();

    var rly_box = $(e.target).parent().parent().children(".reply-box");
    if(rly_box.length <= 0){
        rly_box = $(e.target).parent().parent().parent().children(".reply-box");
    }
    
    rly_box.load("/views/forms/reply.php",({
        "comment_id": comment_id,
        "reply_user": reply_user,
        "pid": pid
    }));
    rly_box.addClass("w-full row bg-gray-600 py-7 px-4 shadow-2xl  my-3 justify-between items-center mx-10");

})