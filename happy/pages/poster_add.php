
<div>
    <form action="index.php?go=poster_add_do" method="post" enctype="multipart/form-data" >
       
        <input type="hidden" name="pid" id="pid" value="<?php echo $pid; ?>" />

        <div>图书ID: <?php echo $pid; ?></div>

        <div>上传封面：<input type="file" name="file[]" multiple accept="image/*" /> </div>

        <div><input type="submit" value="上传" /></div>
    </form>
</div>
