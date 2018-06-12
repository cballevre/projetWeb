<?php
/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 11/06/2018
 * Time: 08:59
 */
?>

<section>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Utilisateurt</th>
                    <th scope="col">Trousseaux</th>
                    <th scope="col">Date de retour</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($borrowKeychains as $borrowKeychain): ?>
                    <tr>
                        <td><?php echo $borrowKeychain->getId(); ?></td>
                        <td><?php echo $borrowKeychain->getIdUser(); ?></td>
                        <td><?php echo $borrowKeychain->getIdKeychain(); ?></td>
                        <td><?php echo $borrowKeychain->getDateRetour()->format('Y-m-d H:i:s'); ?></td>
                        <td>
                            <a href="<?php echo WEBROOT; ?>?controller=borrowKeychains&action=update&id=<?php echo $borrowKeychain->getId(); ?>">
                                <i class="fas fa-edit"></i>
                            </a>&nbsp;
                            <a href="<?php echo WEBROOT; ?>?controller=borrowKeychains&action=destroy&id=<?php echo $borrowKeychain->getId(); ?>">
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
