<?php
/**
 * Created by PhpStorm.
 * User: cballevre
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
                            <th scope="col">Prénom</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Surnom</th>
                            <th scope="col">Numéro de téléphone</th>
                            <th scope="col">Status</th>
                            <th scope="col">Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($this->var as $user): ?>
                            <tr>
                                <td><?php echo $user->getEnssatPrimaryKey(); ?></td>
                                <td><?php echo $user->getSurname(); ?></td>
                                <td><?php echo $user->getName(); ?></td>
                                <td><?php echo $user->getUsername(); ?></td>
                                <td><?php echo $user->getPhone(); ?></td>
                                <td><?php echo $user->getStatus(); ?></td>
                                <td><?php echo $user->getEmail(); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
