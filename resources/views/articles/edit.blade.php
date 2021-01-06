<div class="col-start-2 col-span-3">

    <form class="form" method="post" action="/articles">

        {{ csrf_field() }}

        <input type="hidden" name="article_id" value="{{ $article->id }}" />

        <div class="form_input_container col-start-2 col-span-3">
            <input type="text" class="text" name="title" value="" />
        </div>

        <div class="form_input_container col-start-2 col-span-3">
            <input type="text" class="text" name="subtitle" value="" />
        </div>

        <div class="form_input_container col-start-2 col-span-3">
            <input type="text" class="text" name="introduction" value="" />
        </div>

        <div class="form_input_container col-start-2 col-span-3">
            <input type="text" class="text" name="content" value="" />
        </div>

        <div class="form_input_container col-start-2 col-span-3">
            <input type="text" class="text" name="main_image" value="" />
        </div>

        <div class="form_input_container col-start-1 col-span-1">
            <input type="text" class="text" name="article_category_id" value="" />
        </div>

        <div class="form_input_container col-start-2 col-span-2">
            <input type="text" class="text" name="slug" value="" />
        </div>

    </form>

</div>