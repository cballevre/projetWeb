<?php
/**
 * Created by PhpStorm.
 * User: jcarfantan
 * Date: 12/06/2018
 * Time: 12:29
 */
?>

<section>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Longueur (en mm)</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($locks as $lock): ?>
                    <tr>
                        <td>
                            <a href="<?php echo WEBROOT; ?>?controller=locks&action=single&id=<?php echo $lock->getId(
                            ); ?>">
                                Barillet <?php echo $lock->getId(); ?>
                            </a>
                        </td>
                        <td><?php echo $lock->getLength(); ?></td>
                        <td>
                            <a href="<?php echo WEBROOT; ?>?controller=locks&action=update&id=<?php echo $lock->getId(
                            ); ?>">
                                <i class="fas fa-edit"></i>
                            </a>&nbsp;
                            <a href="<?php echo WEBROOT; ?>?controller=locks&action=destroy&id=<?php echo $lock->getId(
                            ); ?>">
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
