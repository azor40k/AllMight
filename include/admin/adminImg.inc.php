<div class="adminImg">

    <!-- AFFICHAGE D'ERREUR  -->
    <?php echo $error; ?>

    <form action="" method="post" enctype="multipart/form-data">

        <input type="file" name="file_img" onchange="preview_image(event)" />
        <input type="submit" name="upload" value="Ajouter Images">

    </form>

    <img id="prev_image" height="200px" />

</div>
