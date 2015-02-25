<?php
    require_once ('admin.php');
    include_once ('./admin-header.php');
?>
<div class="wrap nosubsub">
    <?php screen_icon('edit'); ?>
    <h2><?php echo esc_html( $title ); ?></h2>
    <br />
    <?php echo "Ceci est mon script perso."; ?>
</div>
<?php
include('./admin-footer.php');