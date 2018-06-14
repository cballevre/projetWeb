<?php
/**
 * Created by PhpStorm.
 * User: jcarfantan
 * Date: 12/06/2018
 * Time: 00:23
 */
$door = $array['door'];
$locks = $array['locks'];
?>

<form action="" method="post">
    <div class="card card-block">
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Id du barillet : </label>
        <div class="col-sm-10">
            <select class="custom-select" id="idLock" name="idLock" >
                <?php foreach($locks as $lock){?>
                    <option <?php if($lock->getId() == $door->getIdLock()) echo "selected " ?> value="<?php echo $lock->getId(); ?>"><?php echo $lock->getId(); ?></option>
                <?php } ?>
            </select>
        </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10 col-sm-offset-2">
                <button type="submit" class="btn btn-primary"> Modifier </button>
            </div>
        </div>
    </div>
</form>