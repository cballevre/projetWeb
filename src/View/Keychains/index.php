<?php
/**
 * Created by PhpStorm.
 * User: alioune
 * Date: 30/05/2018
 * Time: 12:29
 */
?>

<section class="section">
    <a href="/users/add" class="btn btn-primary">Ajouter</a>
    <a href="/users/import" class="btn btn-secondary">Importer</a>
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
                            <th scope="col">Création date</th>
                            <th scope="col">Destruction date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($this->var as $keychain): ?>
                            <tr>
                                <td><?php echo $keychain->getId(); ?></td>
                                <td><?php echo $keychain->getCreationDate()->format('Y-m-d H:i:s'); ?></td>
                                <td><?php echo $keychain->getDestructionDate()->format('Y-m-d H:i:s'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

