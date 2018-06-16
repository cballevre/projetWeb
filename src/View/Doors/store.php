<?php
/**
 * Created by PhpStorm.
 * User: jcarfantan
 * Date: 12/06/2018
 * Time: 23:00
 */
?>

<form action="" method="post">
    <div class="card card-block">
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Id du barillet : </label>
            <div class="col-sm-10">
                <select class="custom-select" id="idLock" name="idLock" >
                    <?php foreach($locks as $lock){?>
                        <option value="<?php echo $lock->getId(); ?>"><?php echo $lock->getId(); ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10 col-sm-offset-2">
                <button type="submit" class="btn btn-primary"> Ajouter </button>
            </div>
        </div>
    </div>
</form>
