<?php
/**
 * Created by PhpStorm.
 * User: aymeric
 * Date: 12/06/18
 * Time: 17:53
 */
$room = $array['room'];
$doors = $array['doors'];
?>
<section>
    <h4>Portes associées</h4>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Id du barillet</th>
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
                                <td><?php echo $door->getIdLock(); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
            </table>
        </div>
    </div>
</section>