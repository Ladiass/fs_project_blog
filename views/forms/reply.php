<!-- <div class="w-full row bg-gray-600 py-7 px-4 shadow-2xl  my-3 justify-between items-center mx-10"> -->
    <form action="/methods.php" method="POST" class="w-full relative">
        <input type="hidden" name="action" value="reply">
        <input type="hidden" name="comment_id" value="<?php echo $_POST["comment_id"] ?>">
        <input type="hidden" name="pid" value="<?php echo $_POST["pid"] ?>">
        <label for="cmm" class="font-bold text-base">Reply : <?php echo $_POST["reply_user"] ?>
        <input type="hidden" name="reply_user" value="<?php echo $_POST["reply_user"] ?>"></label>
        <div class="px-5 pt-4">
            <textarea name="content" id="cmm"  class="w-full h-40 rounded-xl shadow border-2 outline-none focus:border-red-500 focus:shadow-inner text-black p-3 "></textarea>
        </div>
        <input type="submit" value="Reply" class="btn py-1 mt-3 px-4 bg-pinker active:bg-pinker outline-none rounded-full block ml-auto mr-7 absolute bottom-3 right-0">
    </form>
<!-- </div> -->