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
                            <th scope="col">Type clé</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($this->var as $key): ?>
                            <?php var_dump($key);?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>