<?php
/**
 * Created by PhpStorm.
 * User: jcarfantan
 * Date: 12/06/18
 * Time: 17:12
 */
?>
<?php

$rooms = $array['rooms'];
$door = $array['door'];

?>
<h5>Barillet :  
    <a href="<?php echo WEBROOT; ?>?controller=locks&action=single&id=<?php echo $door->getIdLock(); ?>">
        <?php echo $door->getIdLock(); ?>
    </a>
</h5>

<section>
    <h4>Salles associées</h4>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Salle</th>
                        <th scope="col">Étage</th>
                        <th scope="col">Bâtiment</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($rooms as $room): ?>
                    <tr>
                        <td><?php echo $room->getId(); ?></td>
                        <td colspan="1">
                            <a href="<?php echo WEBROOT; ?>?controller=rooms&action=single&id=<?php echo $room->getId(); ?>">
                                <?php echo $room->getRoomName(); ?>
                            </a>
                        </td>
                        <td><?php echo $room->getFloor(); ?></td>
                        <td><?php echo $room->getBuilding(); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>