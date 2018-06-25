<?php
/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 30/05/2018
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
                            <th scope="col">Type clé</th>
                            <th scope="col">État</th>
                            <th scope="col">Accède</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($keys as $key): ?>
                            <tr>
                                <td>
                                    <a href="<?php echo WEBROOT; ?>?controller=keys&action=single&id=<?php echo $key->getId(); ?>">
                                        <?php echo $key->getId(); ?>
                                    </a>
                                </td>
                                <td><?php echo $key->getType(); ?></td>
                                <td><?php echo $key->getEtat(); ?></td>
                                <td>
                                    <?php if($key->getType() == "Total"): ?>

                                    <?php else: foreach ($key->doors() as $door): ?>
                                        <a class="btn btn-info btn-sm"
                                           href="<?php echo WEBROOT; ?>?controller=doors&action=single&id=<?php echo $door->getId(); ?>"
                                           role="button">Porte n°<?php echo $door->getId(); ?></a>
                                    <?php endforeach; endif; ?>
                                </td>
                                <td>
                                    <a href="<?php echo WEBROOT; ?>?controller=keys&action=update&id=<?php echo $key->getId(); ?>"">
                                        <i class="fas fa-edit"></i>
                                    </a>&nbsp;
                                    <a href="<?php echo WEBROOT; ?>?controller=keys&action=destroy&id=<?php echo $key->getId(); ?>"">
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


