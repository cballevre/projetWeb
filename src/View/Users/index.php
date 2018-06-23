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
                        <th scope="col">Nom / Prénom</th>
                        <th scope="col">Surnom</th>
                        <th scope="col">Numéro de téléphone</th>
                        <th scope="col">Status</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $user->getEnssatPrimaryKey(); ?></td>
                            <td colspan="2">
                                <a href="<?php echo WEBROOT?>?controller=users&action=single&id=<?php echo $user->getEnssatPrimaryKey(); ?>">
                                    <?php echo $user->getSurname(); ?>
                                    <?php echo $user->getName(); ?>
                                </a>
                            </td>
                            <td><?php echo $user->getUsername(); ?></td>
                            <td><?php echo $user->getPhone(); ?></td>
                            <td><?php echo $user->getStatus(); ?></td>
                            <td><?php echo $user->getEmail(); ?></td>
                            <td>
                                <a href="<?php echo WEBROOT?>?controller=users&action=update&id=<?php echo $user->getEnssatPrimaryKey(); ?>">
                                <i class="fas fa-edit"></i>
                                </a>&nbsp;
                                <a href="<?php echo WEBROOT?>?controller=users&action=destroy&id=<?php echo $user->getEnssatPrimaryKey(); ?>">
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
