<?php
/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 24/06/2018
 * Time: 15:27
 */ ?>

<section class="mt-4">
    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    Emprunt en retard
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Utilisateurs</th>
                        <th scope="col">Trousseaux</th>
                        <th scope="col">Date de retour</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($borrowKeychainDelays as $borrowKeychain): ?>
                        <tr>
                            <td><?php echo $borrowKeychain->user()->getSurname(); ?> <?php echo $borrowKeychain->user()->getName(); ?></td>
                            <td>Trouseau n°<?php echo $borrowKeychain->getIdKeychain(); ?></td>
                            <td><?php echo $borrowKeychain->getDateRetour()->format('Y-m-d H:i'); ?></td>
                            <td>
                                <a href="<?php echo WEBROOT?>?controller=borrowKeychains&action=reminder&id=<?php echo $borrowKeychain->getId(); ?>"
                                   class="btn btn-primary btn-sm"
                                   role="button"
                                   aria-pressed="true">Relance</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    Accès Rapide
                </div>
                <ul class="list-group list-group-flush">
                    <button type="button" class="list-group-item list-group-item-action">Réaliser un emprunt</button>
                    <button type="button" class="list-group-item list-group-item-action">Clore un emprunt</button>
                    <button type="button" class="list-group-item list-group-item-action">Prolonger un emprunt</button>
                    <button type="button" class="list-group-item list-group-item-action">Créer un trousseau</button>
                </ul>
            </div>
        </div>
    </div>
</section>
