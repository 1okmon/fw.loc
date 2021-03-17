<div class="container">
    <form action="check" method="post" enctype="multipart/form-data">
        
        Выберите класс: <select  name="class_owner"> 
            <?php foreach ($classes as $class):?>              
                <option><?=$class['class_name']?></option>
            <?php endforeach;?>
        </select><br />
        
	Имя объекта: <p><textarea name="name"></textarea></p><br />
    <input type="submit" value="Отправить форму" /> 
</form>
	   
    
</div>
