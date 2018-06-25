<?php
/**
 * Created by PhpStorm.
 * User: aymeric
 * Date: 12/06/18
 * Time: 17:53
 */
$room = $array['room'];
$doors = $array['doors'];
?>
<section>
    <h4>Portes</h4>
    <form action="" method="post">
        <div class="card card-block">
            <div class="form-group row">
                <label class="col-sm-2 form-control-label text-xs-right"> Id de la porte : </label>
                <div class="col-sm-10">
                    <select class="custom-select" id="idDoor" name="idDoor" >
                        <?php foreach($doors as $door){?>
                            <option value="<?php echo $door->getId(); ?>">Porte n°<?php echo $door->getId() . " - Barillet : " . $door->getIdLock(); ?></option>
                        <?php } ?>
                    </select>
                </div>
                <input type="hidden" name="idRoom" value="<?php echo $room->getId(); ?>"/>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 col-sm-offset-2">
                    <button type="submit" class="btn btn-primary"> Associer </button>
                </div>
            </div>
        </div>
    </form>

</section>