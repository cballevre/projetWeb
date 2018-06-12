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
                            <th scope="col">Nombre de commande</th>
                            <th scope="col"></th>
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
                                <td><?php echo $key->getNbCommande(); ?></td>
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


