<?php
/**
 * Created by PhpStorm.
 * User: aymeric
 * Date: 12/06/18
 * Time: 17:53
 */
$room = $array['room'];
$doors = $array['doors'];
$keys = $array['keys'];
$users = $array['users'];
?>
<h5>Etage : <?php echo $room->getFloor(); ?> </h5>
<h5>Bâtiment : <?php echo $room->getBuilding(); ?> </h5>
<section>
    <div class="row">
        <div class="col-md-12">
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="door-tab" data-toggle="tab" href="#door" role="tab">Portes associées</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="key-tab" data-toggle="tab" href="#key" role="tab" aria-controls="profile" aria-selected="false">Clés associées</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="user-tab" data-toggle="tab" href="#user" role="tab" aria-controls="profile" aria-selected="false">Utilisateur ayant eu accès à la salle</a>
                        </li>
                    </ul>
                </div>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="door" role="tabpanel" aria-labelledby="door-tab">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Id de la porte</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($doors as $door): ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo WEBROOT; ?>?controller=doors&action=single&id=<?php echo $door->getId();?>">
                                            Porte n°<?php echo $door->getId();?>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="col-sm-10 col-sm-offset-2 text-left">
                            <a href="<?php echo WEBROOT; ?>?controller=rooms&action=linkDoor&id=<?php echo $room->getId(); ?>">
                                <button class="btn btn-primary"> Ajouter porte </button>
                            </a>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="key" role="tabpanel" aria-labelledby="key-tab">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Id de la clé</th>
                                <th scope="col">Type</th>
                                <th scope="col">Etat</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($keys as $key): ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo WEBROOT; ?>?controller=keys&action=single&id=<?php echo $key->getId(); ?>">
                                            Clé n°<?php echo $key->getId(); ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php echo $key->getType(); ?>
                                    </td>
                                    <td>
                                        <?php echo $key->getEtat(); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="user-tab">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Prénom Nom</th>
                                <th scope="col">Surnom</th>
                                <th scope="col">Numéro de téléphone</th>
                                <th scope="col">Statut</th>
                                <th scope="col">Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($users as $user): ?>
                                <tr>
                                    <td><?php echo $user->getEnssatPrimaryKey(); ?></td>
                                    <td>
                                        <a href="<?php echo WEBROOT; ?>?controller=keys&action=single&id=<?php echo $user->getEnssatPrimaryKey(); ?>">
                                            <?php echo $user->getSurname();?><?php echo $user->getName(); ?>
                                        </a>
                                    </td>
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
    </div>
</section>