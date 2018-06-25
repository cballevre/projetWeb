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
                            <th scope="col">Id du barillet</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($doors as $door): ?>
                            <tr>
                                <td>
                                    <a href="<?php echo WEBROOT; ?>?controller=doors&action=single&id=<?php echo $door->getId(); ?>">
                                        Porte n°<?php echo $door->getId(); ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo WEBROOT; ?>?controller=locks&action=single&id=<?php echo $door->getIdLock(); ?>">
                                        Barillet <?php echo $door->getIdLock(); ?>
                                    </a>
                                <td>
                                    <a href="<?php echo WEBROOT; ?>?controller=doors&action=update&id=<?php echo $door->getId(); ?>">
                                        <i class="fas fa-edit"></i>
                                    </a>&nbsp;
                                    <a href="<?php echo WEBROOT; ?>?controller=doors&action=destroy&id=<?php echo $door->getId(); ?>">
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
