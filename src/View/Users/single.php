<?php
/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 07/06/2018
 * Time: 15:34
 */?>



<section class="mt-4">

    <div class="row">
        <div class="col-3">
            <div class="card">
                <img class="card-img-top" src="http://placekitten.com/g/200/200" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $user->getSurname(); ?> <?php echo $user->getName(); ?></h5>
                    <p>Surnom : <?php echo $user->getUsername(); ?></p>
                    <p>Téléphone : <?php echo $user->getPhone(); ?></p>
                    <p>Status : <?php echo $user->getStatus(); ?></p>
                    <p>Email : <?php echo $user->getEmail(); ?></p>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="borrowKeychain-tab" data-toggle="tab" href="#borrowKeychain" role="tab">Trousseaux emprunter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="door-tab" data-toggle="tab" href="#door" role="tab" aria-controls="profile" aria-selected="false">Porte accéder</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="borrowKeychain" role="tabpanel" aria-labelledby="borrowKeychain-tab">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Trousseaux</th>
                                <th scope="col">Date de retour</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($user->borrowKeychains() as $borrowKeychain): ?>
                                <tr>
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
                    <div class="tab-pane fade" id="door" role="tabpanel" aria-labelledby="door-tab">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>