<?php
/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 12/06/2018
 * Time: 21:54
 */ ?>

<div class="form-group row">
    <label class="col-sm-2 form-control-label text-xs-right"> Utilisateur
        : </label>
    <div class="col-sm-10">
        <select class="form-control" name="idUser">
            <?php foreach($users as $user): ?>
                <option value="<?php echo $user->getEnssatPrimaryKey(
                ); ?>"><?php echo $user->getSurname() . $user->getName(
                        ); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 form-control-label text-xs-right">Clés disponible
        :</label>
    <div class="col-sm-10">
        <select name="keys[]" class="form-control" multiple>
            <?php foreach($keys as $key): ?>
                <option value="<?php echo $key->getId(); ?>">Clés
                    n°<?php echo $key->getId(); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 form-control-label text-xs-right"> Date de retour
        : </label>
    <div class="col-sm-10">
        <input type="datetime-local" name="dateRetour"
               class="form-control boxed"
               placeholder="Entrez la date de retour"></div>
</div>
