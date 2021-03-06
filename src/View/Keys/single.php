<?php
/**
 * Created by PhpStorm.
 * User: aymeric
 * Date: 12/06/18
 * Time: 17:10
 */
$key = $array['key'];
$keychains = $array['keychains'];
?>

<h5>Type : <?php echo $key->getType(); ?> </h5>
<h5>Disponibilité : <?php echo $key->getEtat(); ?> </h5>

<section>
    <h4>Trousseaux associés</h4>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date de création</th>
                    <th scope="col">Date de destruction</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($keychains as $keychain): ?>
                    <tr>
                        <td>
                            <a href="<?php echo WEBROOT; ?>?controller=keychains&action=single&id=<?php echo $keychain->getId(
                            ); ?>">
                                Trousseau n°<?php echo $keychain->getId(); ?>
                            </a>
                        </td>
                        <td>
                            <?php echo $keychain->getCreationDate()->format(
                                'Y-m-d H:i:s'
                            );; ?>
                        </td>
                        <td>
                            <?php echo $keychain->getDestructionDate()->format(
                                'Y-m-d H:i:s'
                            );; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <div class="col-sm-10 col-sm-offset-2 text-left">
                <a href="<?php echo WEBROOT; ?>?controller=keys&action=linkLock&id=<?php echo $key->getId(
                ); ?>">
                    <button class="btn btn-primary"> Ajouter barillet</button>
                </a>
            </div>
        </div>
    </div>
</section>
