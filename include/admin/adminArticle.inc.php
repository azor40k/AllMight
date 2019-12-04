<div class="adminArticle">


    <form method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="size" value="1000000">
        <div>
            <input type="file" name="file_img" onchange="preview_article(event)" ><br><br>
        </div>
        <div>
            <input type="text" name="titre" placeholder="Titre de l'article"><br><br>
            <textarea id="text" cols="40" rows="4" name="text" placeholder="Contenu de l'article..."></textarea>
        </div>
        <div>
            <button type="submit" name="upload-art">Poster l'article</button>
        </div>
    </form>
    
    <img id="prev_article" height="200px" />


</div>
