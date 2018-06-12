<?php
/**
 * Created by PhpStorm.
 * User: jcarfantan
 * Date: 12/06/2018
 * Time: 12:29
 */
?>

<section class="section">
    <a href="<?php echo WEBROOT; ?>?controller=doors&action=store" class="btn btn-primary">Ajouter</a>
</section>
<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Id du barillet</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($doors as $door): ?>
                            <tr>
                                <td><?php echo $door->getId(); ?></td>
                                <td><?php echo $door->getIdLock(); ?></td>
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
        </div>
    </div>
</section>
