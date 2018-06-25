<?php
/**
 * Created by PhpStorm.
 * User: aymeric
 * Date: 25/06/18
 * Time: 15:43
 */

$key = $array['key'];
$locks = $array['locks'];
?>
<section>
    <h4>Portes</h4>
    <form action="" method="post">
        <div class="card card-block">
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right"> Id du barillet : </label>
                <div class="col-sm-10">
                    <select class="custom-select" id="idLock" name="idLock" >
                        <?php foreach($locks as $lock){?>
                            <option value="<?php echo $lock->getId(); ?>">Barillet <?php echo $lock->getId()?></option>
                        <?php } ?>
                    </select>
                </div>
                <input type="hidden" name="idKey" value="<?php echo $key->getId(); ?>"/>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 col-sm-offset-2">
                    <button type="submit" class="btn btn-primary"> Associer </button>
                </div>
            </div>
        </div>
    </form>
</section>