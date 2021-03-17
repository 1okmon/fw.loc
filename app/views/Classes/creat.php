<div class="container">
    <form action="check" method="post" enctype="multipart/form-data">
	Название класса: <p><textarea name="class_name"></textarea></p><br />
	Описание: <p><textarea name="class_comment"></textarea></p><br />
        Атрибуты: <br />
        Название: <input type="text" name="attributeName">
        Тип:<select> 
            <?php foreach ($types as $type):?>              
                <option><?=$type?></option>
            <?php endforeach;?>
        </select><br />
   


</form>
	<input type="submit" value="Отправить форму" />    
    
</div>
