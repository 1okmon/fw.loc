<div class="container">
    <?php if(!empty($posts)):?>
    <?php foreach ($posts as $post):?>
    <div class="panel panel-default">
        <div class="panel-heading"><?=$post['title']?>
         <form action="check" method="post" enctype="multipart/form-data"> 
             <input type="hidden" name ="idk" value="<?=$post['id']?>" />
            <input type="submit" value="Удалить" />    
        </form>
        </div>            
        </div>    
    <?php endforeach;?>
    <?php endif;?>
</div>
