<?php
?>
<div class="form-group nomargin">
    <select id="select6" name="<?=$data['inputName'].'[]'?>" class="form-control select2-hidden-accessible" style="width: 100%" data-placeholder="请输入或选择标签" multiple="" tabindex="-1" aria-hidden="true">
        <?php if(!empty($data['inputValue'])):?>
        <?php foreach ($data['inputValue'] as $value):?>
        <option value="<?=$value?>" selected=""><?=$value?></option>
        <?php endforeach;?>
        <?php endif;?>
    </select>
</div>