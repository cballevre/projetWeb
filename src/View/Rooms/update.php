<?php
/**
 * Created by PhpStorm.
 * room: aymeric
 * Date: 12/06/18
 * Time: 17:53
 */ ?>

<form action="" method="post">
    <div class="card card-block">
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Salle
                : </label>
            <div class="col-sm-10">
                <input type="text" name="roomName" class="form-control boxed"
                       value="<?php echo $room->getRoomName(); ?>"></div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Étage
                : </label>
            <div class="col-sm-10">
                <input type="text" name="floor" class="form-control boxed"
                       value="<?php echo $room->getFloor(); ?>"></div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Bâtiment
                : </label>
            <div class="col-sm-10">
                <input type="text" name="building" class="form-control boxed"
                       value="<?php echo $room->getBuilding(); ?>"></div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10 col-sm-offset-2">
                <button type="submit" class="btn btn-primary"> Modifier</button>
            </div>
        </div>
    </div>
</form>