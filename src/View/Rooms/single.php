<?php
/**
 * Created by PhpStorm.
 * User: aymeric
 * Date: 12/06/18
 * Time: 17:53
 */
$room = $array['room'];
$doors = $array['doors'];
$keys = $array['keys'];
?>
<h5>Etage : <?php echo $room->getFloor(); ?> </h5>
<h5>Bâtiment : <?php echo $room->getBuilding(); ?> </h5>
<section>
    <div class="row">
        <div class="col-md-12">
            <h4>Portes associées</h4>
            <table class="table table-striped">
                <thead>
                        <tr>
                            <th scope="col">Id du barillet</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($doors as $door): ?>
                            <tr>
                                <td>
                                    <a href="<?php echo WEBROOT; ?>?controller=locks&action=single&id=<?php echo $door->getIdLock(); ?>">
                                        <?php echo $door->getIdLock(); ?>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
            </table>

            <table class="table table-striped">
                <thead>
                        <tr>
                            <th scope="col">Id de la clé</th>
                            <th scope="col">Type</th>
                            <th scope="col">Etat</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($keys as $key): ?>
                            <tr>
                                <td>
                                    <a href="<?php echo WEBROOT; ?>?controller=keys&action=single&id=<?php echo $key->getId(); ?>">
                                        <?php echo $key->getId(); ?>
                                    </a>
                                </td>
                                <td>
                                    <?php echo $key->getType(); ?>
                                </td>
                                <td>
                                    <?php echo $key->getEtat(); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
            </table>
                        
            <div class="col-sm-10 col-sm-offset-2">
                <a href="<?php echo WEBROOT; ?>?controller=rooms&action=linkDoor&id=<?php echo $room->getId(); ?>">
                    <button class="btn btn-primary"> Ajouter porte </button>
                </a>
            </div>
        </div>
    </div>
</section>