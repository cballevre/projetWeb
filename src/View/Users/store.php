<?php
/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 23/06/2018
 * Time: 16:25
 */ ?>
<?php
$etats[] = array(
    "Outsider",
    "Staff",
    "Student"
);
?>

<div class="form-group row">
    <label class="col-sm-2 form-control-label text-xs-right"> Username
        : </label>
    <div class="col-sm-10">
        <input type="text" name="username" class="form-control boxed"
               placeholder="Entrez le nom d'utilisateur" required></div>
</div>
<div class="form-group row">
    <label class="col-sm-2 form-control-label text-xs-right"> Name : </label>
    <div class="col-sm-10">
        <input type="text" name="name" class="form-control boxed"
               placeholder="Entrez le nom de l'utilisateur" required></div>
</div>
<div class="form-group row">
    <label class="col-sm-2 form-control-label text-xs-right"> Surname : </label>
    <div class="col-sm-10">
        <input type="text" name="surname" class="form-control boxed"
               placeholder="Entrez le prénom de l'utilisateur" required></div>
</div>
<div class="form-group row">
    <label class="col-sm-2 form-control-label text-xs-right"> Phone : </label>
    <div class="col-sm-10">
        <input type="text" name="phone" class="form-control boxed"
               placeholder="Numéro de téléphone" required></div>
</div>
<div class="form-group row">
    <label class="col-sm-2 form-control-label text-xs-right"> Status : </label>
    <div class="col-sm-10">
        <select class="custom-select" id="status" name="status" required>
            <?php foreach($etats as $etat) { ?>
                <option value="<?php echo $etat; ?>"><?php echo $etat; ?></option>
            <?php } ?>
        </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 form-control-label text-xs-right"> Email : </label>
    <div class="col-sm-10">
        <input type="email" name="email" class="form-control boxed"
               placeholder="toto@tata.fr" required></div>
</div>