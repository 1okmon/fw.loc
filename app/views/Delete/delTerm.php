<div class="container">
    <?php if(!empty($termins)):?>
    <?php foreach ($termins as $termin):?>
    <?php if($termin['description']<>'imp'):?>
    <div class="panel panel-default">
        <div class="panel-heading"><?=$termin['word']?>
            <form action="checkTerm" method="post" enctype="multipart/form-data"> 
             <input type="hidden" name ="idk" value="<?=$termin['id']?>" />
            <input type="submit" value="Удалить" />    
        </form>
        </div>            
        </div>    
    <?php endif;?>
    <?php endforeach;?>
    <?php endif;?>
</div>