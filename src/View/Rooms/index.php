<?php
/**
 * Created by PhpStorm.
 * User: aymeric
 * Date: 12/06/18
 * Time: 17:52
 */?>

<section>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Salle</th>
                        <th scope="col">Étage</th>
                        <th scope="col">Bâtiment</th>
                        <th scope="col"></th>
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
                        <td>
                            <a href="<?php echo WEBROOT; ?>?controller=rooms&action=update&id=<?php echo $room->getId(); ?>"">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?php echo WEBROOT; ?>?controller=rooms&action=destroy&id=<?php echo $room->getId(); ?>"">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
