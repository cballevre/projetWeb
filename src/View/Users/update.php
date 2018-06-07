<?php
/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 08/06/2018
 * Time: 00:23
 */?>

<form action="" method="post">
    <div class="card card-block">
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Username : </label>
            <div class="col-sm-10">
                <input type="text" name="username" class="form-control boxed" placeholder="" value="<?php echo $user->getUsername();?>"> </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Name : </label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control boxed" placeholder="" value="<?php echo $user->getName();?>"> </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Surname : </label>
            <div class="col-sm-10">
                <input type="text" name="surname" class="form-control boxed" placeholder="" value="<?php echo $user->getSurname();?>"> </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Phone : </label>
            <div class="col-sm-10">
                <input type="text" name="phone" class="form-control boxed" placeholder="" value="<?php echo $user->getPhone();?>"> </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Status : </label>
            <div class="col-sm-10">
                <input type="text" name="status" class="form-control boxed" placeholder="" value="<?php echo $user->getStatus();?>"> </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Email : </label>
            <div class="col-sm-10">
                <input type="text" name="email" class="form-control boxed" placeholder="" value="<?php echo $user->getEmail();?>"> </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10 col-sm-offset-2">
                <button type="submit" class="btn btn-primary"> Modifier </button>
            </div>
        </div>
    </div>
</form>