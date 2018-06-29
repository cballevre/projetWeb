<?php
/**
 * Created by PhpStorm.
 * User: ba
 * Date: 12/06/18
 * Time: 17:12
 */
$keys = $array['keys'];
$keychain = $array['keychain'];
?>

<h5>Date de création : <?php echo $keychain->getCreationDate()->format(
        'Y-m-d H:i:s'
    ); ?></h5>
<h5>Date de destruction : <?php echo $keychain->getDestructionDate()->format(
        'Y-m-d H:i:s'
    ); ?></h5>

<section>
    <h4>Clés associées</h4>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Type de clé</th>
                    <th scope="col">Disponibilité</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($keys as $key): ?>
                    <tr>
                        <td>
                            <a href="<?php echo WEBROOT; ?>?controller=keys&action=single&id=<?php echo $key->getId(
                            ); ?>">
                                <?php echo $key->getId(); ?>
                            </a>
                        </td>
                        <td><?php echo $key->getType(); ?></td>
                        <td><?php echo $key->getEtat(); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
