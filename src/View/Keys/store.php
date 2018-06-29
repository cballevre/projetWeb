<?php
/**
 * Created by PhpStorm.
 * User: ba
 * Date: 12/06/18
 * Time: 17:10
 */ ?>

<?php
$types = array(
    "Simple",
    "Partiel",
    "Total"
);

$etats = array(
    "Disponible",
    "Empruntée",
    "Perdue"
);
?>

<div class="form-group row">
    <label class="col-sm-2 form-control-label text-xs-right"> Type de clé
        : </label>
    <div class="col-sm-10">
        <select class="custom-select" id="type" name="type">
            <?php foreach($types as $type) { ?>
                <option value="<?php echo $type; ?>"><?php echo $type; ?></option>
            <?php } ?>
        </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 form-control-label text-xs-right"> État de la clé
        : </label>
    <div class="col-sm-10">
        <select class="custom-select" id="etat" name="etat">
            <?php foreach($etats as $etat) { ?>
                <option value="<?php echo $etat; ?>"><?php echo $etat; ?></option>
            <?php } ?>
        </select>
    </div>
</div>

