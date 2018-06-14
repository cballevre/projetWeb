<?php
/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 12/06/2018
 * Time: 21:54
 */

$doors = $array['doors'];
$lock = $array['lock'];

?>
<section>
    <h4>Portes associées</h4>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                        <tr>
                            <th scope="col">Numéro</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($doors as $door): ?>
                            <tr>
                                <td>
                                    <a href="<?php echo WEBROOT; ?>?controller=doors&action=single&id=<?php echo $door->getId(); ?>">
                                        <?php echo $door->getId(); ?>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
            </table>
        </div>
    </div>
</section>