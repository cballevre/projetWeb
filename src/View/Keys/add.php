<?php
/**
 * Created by PhpStorm.
 * User: cballevre, aaudemard
 * Date: 30/05/2018
 * Time: 12:29
 */
?>

<section class="section">
    <a href="/keys/index" class="btn btn-primary">Accueil clé</a>
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
                            <th scope="col">Type clé</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($this->var as $key): ?>
                            <tr>
                                <td><?php echo $key->getId(); ?></td>
                                <td><?php echo $key->getType(); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>