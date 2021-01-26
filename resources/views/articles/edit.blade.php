<div class="col-start-2 col-span-3">

    <form class="form" method="post" action="/articles">

        {{ csrf_field() }}

        <input type="hidden" name="article_id" value="{{  isset($article) ? $article->id : 0 }}" />

        <div class="form_input_container col-start-2 col-span-3">
            <label for="title">Titel:</label>
            <input id="title" type="text" class="text" name="title" value="" />
        </div>

        <div class="form_input_container col-start-2 col-span-3">
            <label for="subtitle">Subitel:</label>
            <input id="subtitle" type="text" class="text" name="subtitle" value="" />
        </div>

        <div class="form_input_container col-start-2 col-span-3">
            <label for="introduction">Inleiding:</label>
            <input id="introduction" type="text" class="text" name="introduction" value="" />
        </div>

        <div class="form_input_container col-start-2 col-span-3">
            <label for="content">Inhoud:</label>
            <input id="content" type="text" class="text" name="content" value="" />
        </div>

        <div class="form_input_container col-start-2 col-span-3">
            <label for="main_image">Afbeelding:</label>
            <input id="main_image" type="text" class="text" name="main_image" value="" />
        </div>

        <div class="form_input_container col-start-1 col-span-1">
            <label for="article_category_id">Artikel Categorie:</label>
            <input id="article_category_id" type="text" class="text" name="article_category_id" value="" />
        </div>

        <div class="form_input_container col-start-2 col-span-2">
            <label for="slug">Slug:</label>
            <input id="slug" type="text" class="text" name="slug" value="" />
        </div>

        <div class="form_input_container col-start-2 col-span-3">
            <button class="button" type="submit">Save</button>
        </div>

    </form>

</div>