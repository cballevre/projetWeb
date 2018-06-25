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
                    <th scope="col">Utilisateurs</th>
                    <th scope="col">Trousseaux</th>
                    <th scope="col">Date de retour</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($borrowKeychains as $borrowKeychain): ?>
                    <tr>
                        <td>Emprunt n°<?php echo $borrowKeychain->getId(); ?></td>
                        <td><?php echo $borrowKeychain->getIdUser(); ?></td>
                        <td><a href="<?php echo WEBROOT?>?controller=keychains&action=single&id=<?php echo $borrowKeychain->getId(); ?>">
                                Trousseau n°<?php echo $borrowKeychain->getIdKeychain(); ?></a></td>
                        <td><?php echo $borrowKeychain->getDateRetour()->format('Y-m-d H:i:s'); ?></td>
                        <td>
                            <button type="button" class="btn btn-link btn-sm btn-modif" data-id="<?php echo $borrowKeychain->getId(); ?>"><i class="fas fa-edit"></i></button>
                            <a href="<?php echo WEBROOT?>?controller=borrowKeychains&action=destroy&id=<?php echo $borrowKeychain->getId(); ?>"
                               class="btn btn-link btn-sm">
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
