<?php
/**
 * Created by PhpStorm.
 * User: alioune
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
                            <th scope="col">Création date</th>
                            <th scope="col">Destruction date</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($keychains as $keychain): ?>
                            <tr>
                                <td>
                                    <a href="<?php echo WEBROOT?>?controller=keychains&action=single&id=<?php echo $keychain->getId()?>">
                                        <?php echo $keychain->getId(); ?>
                                    </a>
                                 </td>
                                <td><?php echo $keychain->getCreationDate()->format('Y-m-d H:i:s'); ?></td>
                                <td><?php echo $keychain->getDestructionDate()->format('Y-m-d H:i:s'); ?></td>
                                <td>
                                    <a href="<?php echo WEBROOT?>?controller=keychains&action=update&id=<?php echo $keychain->getId(); ?>">
                                    <i class="fas fa-edit"></i>
                                    </a>&nbsp;
                                    <a href="<?php echo WEBROOT?>?controller=keychains&action=destroy&id=<?php echo $keychain->getId(); ?>">
                                    <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
            </table>
        </div>
    </div>
</section>