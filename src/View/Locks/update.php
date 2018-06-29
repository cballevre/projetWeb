<?php
/**
 * Created by PhpStorm.
 * room: jcarfantan
 * Date: 12/06/18
 * Time: 17:53
 */ ?>
<form action="" method="post">
    <div class="card card-block">
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"
                   for="length"> Longueur
                barillet : </label>
            <div class="col-sm-10">
                <input type="text" name="length" class="form-control boxed"
                       value="<?php echo $lock->getLength(); ?>" required></div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10 col-sm-offset-2">
                <button type="submit" class="btn btn-primary"> Modifier</button>
            </div>
        </div>
    </div>
</form>