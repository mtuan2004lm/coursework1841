  <label for='posttext'>edit your question here;</label>
  <form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="postid" value="<?=$post['id'];?>">'
<input type="" name="posttext" value="<?=$post['posttext'];?>">       
<input type="file" name="fileToUpload">
  
    <select name="module">
        <option value="">select a module</option>
        <?php foreach($module as $module):?>
            <option value="<?=htmlspecialchars($module['id'],ENT_QUOTES, 'UTF-8'); ?>">
        <?=htmlspecialchars($module['moduleName'], ENT_QUOTES, 'UTF-8'); ?>
        </option>
        <?php endforeach;?>
    </select>
    <img height="100px" src="uploads/<?=htmlspecialchars($post['uploads'], ENT_QUOTES ,'UTF-8'); ?>"/>
     <td wight="150px">
    <input type="submit" name="submit" value="Save">
</form>

