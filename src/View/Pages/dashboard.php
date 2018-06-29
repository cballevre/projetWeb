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
                    <?php foreach($borrowKeychainDelays as $borrowKeychain): ?>
                        <tr>
                            <td><?php echo $borrowKeychain->user()->getSurname(
                                ); ?><?php echo $borrowKeychain->user()
                                                               ->getName(
                                                               ); ?></td>
                            <td>Trouseau
                                n°<?php echo $borrowKeychain->getIdKeychain(
                                ); ?></td>
                            <td><?php echo $borrowKeychain->getDateRetour()
                                                          ->format(
                                                              'Y-m-d H:i'
                                                          ); ?></td>
                            <td>
                                <a target="_blank"
                                   href='mailto:<?php echo $borrowKeychain->user(
                                   )->getEmail(
                                   ) ?>?subject=Rappel emprunt trousseau&body=Bonjour <?php echo $borrowKeychain->user(
                                   )->getSurname(
                                   ) ?> <?php echo $borrowKeychain->user()
                                                                  ->getName(
                                                                  ) ?>,%0D%0DVous êtes prié de ramener le trousseau que vous avez emprunté car la date limite approche à grand pas.%0D%0DBonne journée à vous.%0DBien cordialement, le service technique'
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
                    <button type="button"
                            class="list-group-item list-group-item-action">
                        Emprunter un trousseau
                    </button>
                    <button type="button"
                            class="list-group-item list-group-item-action">
                        Rendre un trousseau
                    </button>
                    <button type="button"
                            class="list-group-item list-group-item-action">
                        Prolonger un emprunt
                    </button>
                </ul>
            </div>
        </div>
    </div>
</section>
