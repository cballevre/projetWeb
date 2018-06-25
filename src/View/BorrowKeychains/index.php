<?php
/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 11/06/2018
 * Time: 08:59
 */
?>

<section>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Utilisateurs</th>
                    <th scope="col">Trousseaux</th>
                    <th scope="col">Date de retour</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($borrowKeychains as $borrowKeychain): ?>
                    <tr>
                        <td>Emprunt n°<?php echo $borrowKeychain->getId(); ?></td>
                        <td><?php echo $borrowKeychain->getIdUser(); ?></td>
                        <td><a href="<?php echo WEBROOT?>?controller=keychains&action=single&id=<?php echo $borrowKeychain->getId(); ?>">
                                Trousseau n°<?php echo $borrowKeychain->getIdKeychain(); ?></a></td>
                        <td><?php echo $borrowKeychain->getDateRetour()->format('Y-m-d H:i:s'); ?></td>
                        <td>
                            <button type="button" class="btn btn-link btn-sm btn-prolonger" data-id="<?php echo $user->getEnssatPrimaryKey(); ?>">Prolonger</button>
                            <a href="<?php echo WEBROOT?>?controller=borrowKeychains&action=return_keychain&id=<?php echo $borrowKeychain->getId(); ?>"
                               class="btn btn-link btn-sm">
                                Rendre
                            </a>
                            <a href="<?php echo WEBROOT?>?controller=borrowKeychains&action=lost&id=<?php echo $borrowKeychain->getId(); ?>"
                               class="btn btn-link btn-sm">
                                Perdu
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<div class="modal fade" id="modal-prolonger" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Prolonguer un emprunt</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="modal-prolonger-form" action="" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label text-xs-right">Date de retour : </label>
                        <div class="col-sm-10">
                            <input type="datetime-local" name="dateRetour" class="form-control boxed" placeholder="Entrez la date de retour"> </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary" id="modal-submit">Prolonger</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $( ".btn-prolonger" ).click(function() {
            var id =  $(this).data('id');

            $.ajax({
                type : 'GET',
                url : "<?php echo WEBROOT ?>?controller=<?php echo $this->getName() ?>&action=singleToJson&id=" + id,
                dataType:'json',
                success : function(data) {
                    Object.keys(data).forEach(function (key) {
                        $(".modal-body").find("input[name=" + key + "]").attr('value', data[key]);
                    });
                    $('#modal-prolonger-form').attr('action', "<?php echo WEBROOT ?>?controller=<?php echo $this->getName() ?>&action=update&id=" + id);
                    $('#modal-prolonger').modal('show');
                },
                error : function(request,error)
                {}
            });
        });
    });
</script>

