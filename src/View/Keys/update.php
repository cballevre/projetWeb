<?php
/**
 * Created by PhpStorm.
 * User: aymeric
 * Date: 12/06/18
 * Time: 17:10
 */?>

<form action="" method="post">
    <div class="card card-block">
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Type de clé : </label>
            <div class="col-sm-10">
                <input type="text" name="type" class="form-control boxed" placeholder="" value="<?php echo $key->getType();?>"> </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> État : </label>
            <div class="col-sm-10">
                <input type="text" name="etat" class="form-control boxed" placeholder="" value="<?php echo $key->getEtat();?>"> </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Nombre de clé à commander : </label>
            <div class="col-sm-10">
                <input type="text" name="nbCommande" class="form-control boxed" placeholder="" value="<?php echo $key->getNbCommande();?>"> </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10 col-sm-offset-2">
                <button type="submit" class="btn btn-primary"> Modifier </button>
            </div>
        </div>
    </div>
</form>
