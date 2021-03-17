<div class="container">
    <form action="attributeCreate" method="post" enctype="multipart/form-data">
        <?php for  ($i=0; $i<$number; $i++ ): ?>
        <input type="hidden" name="class_owner" value=<?php echo $id;?>>
            Атрибут: <input type="text" name="name[]">
            Тип:<select name="type[]"> 
            <?php foreach ($types as $type):?>              
                <option><?=$type?></option>
            <?php endforeach;?>
            </select><br />
       <?php endfor; ?>    
    <input type="submit" value="Отправить форму" /> 
</form>
	   
    
</div>