<?php

/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 27/05/2018
 * Time: 23:22
 */

?>

<!DOCTYPE html>
<html lang="fr" class="no-js gr__modularcode_io">
<head>

    <!-- Basic Page Needs
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title>Key Manager</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONT
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,800,700,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- CSS
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo WEBROOT; ?>assets/css/style.css">

    <!-- Javascripts
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Favicon
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<body>
<div class="container-fluid">

    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <?php  /**
                     * Require le fichier de conf du menu
                     */
                    $menu = require ROOT. '/config/menu.php';

                    foreach ($menu as $item): ?>
                        <li class="nav-item">
                            <?php if(isset($item["children"])): ?>
                                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                                    <span>
                                        <?php if(isset($item['icon'])) :  ?>
                                            <i class="<?php echo $item['icon']; ?>"></i>&nbsp;
                                        <?php endif; ?>
                                        <?php echo $item['title']; ?>
                                    </span>
                                </h6>
                                <ul class="nav flex-column mb-2 px-3">
                                    <?php foreach ($item['children'] as $child): ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo WEBROOT . $child['route']; ?>">
                                                <?php echo $child['title']; ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                <a class="nav-link" href="<?php echo WEBROOT . $item['route']; ?>">
                                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center mb-1">
                                            <span>
                                                <?php if(isset($item['icon'])) :  ?>
                                                    <i class="<?php echo $item['icon']; ?>"></i>&nbsp;
                                                <?php endif; ?>
                                                <?php echo $item['title']; ?>
                                            </span>
                                    </h6>
                                </a>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <?php $this->flash->render(); ?>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 border-bottom">
                <h1 class="h2">
                    <?php if(!is_null($this->back)): ?>
                        <a href="<?php echo WEBROOT . $this->back; ?>" class="pr-3"><i class="fas fa-angle-left"></i></a>
                    <?php endif; ?>
                    <?php echo $this->getHeadline(); ?></h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <?php if(!is_null($this->button_add)): ?>
                            <button type="button" class="btn btn-sm btn-outline-secondary" id="btn-add" data-action="<?php echo WEBROOT . $this->button_add; ?> ">Ajouter</button>
                        <?php endif; ?>
                        <?php if(!is_null($this->button_import)): ?>
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#modal-import">Importer</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php echo $getContent; ?>
        </main>
    </div>
</div>
<?php if(!is_null($this->button_import)): ?>
    <div class="modal fade" id="modal-import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form enctype="multipart/form-data" action="<?php echo WEBROOT; ?>?controller=<?php echo $this->name;?>&action=import" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Votre fichier d'import au format csv</label>
                            <input type="file" class="form-control-file" name="import">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Importer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if(!is_null($this->button_add)): ?>
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="modal-form" action="" method="post">
                    <div class="modal-body">
                        <?php $form = file(ROOT."/src/View/".$this->getName()."/store.php");
                        foreach($form as $form_group) {
                            echo $form_group;
                        } ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary" id="modal-submit">Créer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>
<script>
    $(document).ready(function(){
        $( "#btn-add" ).click(function() {
            $('#modal-title').text("Ajouter un ");
            $('#modal-form').attr('action', $(this).data('action'));
            $('#modal-submit').text("Ajouter");
            $('#modal').modal('show');
        });
    });
    $(document).ready(function(){
        $( ".btn-modif" ).click(function() {
            var id =  $(this).data('id');

            $.ajax({
                type : 'GET',
                url : "<?php echo WEBROOT ?>?controller=<?php echo $this->getName() ?>&action=singleToJson&id=" + id,
                dataType:'json',
                success : function(data) {
                    $('#modal-title').text("Modifier " + data.surname + " " + data.name);
                    Object.keys(data).forEach(function (key) {
                        $(".modal-body").find("input[name=" + key + "]").attr('value', data[key]);
                    });
                    $('#modal-form').attr('action', "<?php echo WEBROOT ?>?controller=<?php echo $this->getName() ?>&action=update&id=" + id);
                    $('#modal-submit').text("Modifier");
                    $('#modal').modal('show');
                },
                error : function(request,error)
                {}
            });
        });
    });
</script>
</body>
</html>