<?php
/**
 * Created by PhpStorm.
 * User: ba
 * Date: 12/06/18
 * Time: 17:31
 */
?>
<form action="" method="post">
    <div class="card card-block">
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Creation Date : </label>
            <div class="col-sm-10">
                <input type="text" name="creationDate" class="form-control boxed" placeholder="Entrez la date de création !" required> </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Destruction Date : </label>
            <div class="col-sm-10">
                <input type="text" name="destructionDate" class="form-control boxed" placeholder="Entrez la date de destruction" required> </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10 col-sm-offset-2">
                <button type="submit" class="btn btn-primary"> Submit </button>
            </div>
        </div>
    </div>
</form>
