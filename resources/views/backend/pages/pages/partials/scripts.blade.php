<script>
    // Run on initialization
    $("#search-area").addClass('display-hidden');
    $("#search-area").removeClass('display-block-inline');
    getTranslatedPost();

    function getTranslatedPost() {
        $("#search-area").removeClass('display-hidden');
        $("#search-area").addClass('display-block-inline');

        const category_id = $("#category_id").val();
        const url = "<?php echo route('api.translations.get_page_data') ?>";
        const article = $("#article").val();
        const language_id = $("#language_id").val();

        const data = {
            language_id: language_id,
            chapter_id: category_id,
            article: article,
        }

        if (data.language_id !== null && data.article !== null && data.chapter_id !== null) {
            // Hit an API and get the transalation list data for this users based on his permission.
            $.get(url, data, function(resData, textStatus, jqXHR) {
                $("#id").val(resData.id);
                $("#title").val(resData.title);
                $('#description').html(resData.description);
                tinymce.get("description").setContent(resData.description);

                $("#meta_description").val(resData.meta_description);
                $("#btn-translation-save").removeClass('display-hidden');
                $("#btn-translation-save").addClass('display-block-inline');
            });
        }

    }
</script>
