<?php
/**
 * Created by PhpStorm.
 * User: ba
 * Date: 12/06/18
 * Time: 17:32
 */
?>

<form action="" method="post">
    <div class="card card-block">
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Modifier Date : </label>
            <div class="col-sm-10">
                <input type="date" name="creationDate" class="form-control boxed" placeholder="" value="<?php echo $keychain->getCreationDate();?>"> </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Destruction Date : </label>
            <div class="col-sm-10">
                <input type="date" name="destructionDate" class="form-control boxed" placeholder="" value="<?php echo $keychain->getDestructionDate();?>"> </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10 col-sm-offset-2">
                <button type="submit" class="btn btn-primary"> Modifier </button>
            </div>
        </div>
    </div>
</form>
