
<script>

    $("#btn-translation-save").addClass('display-hidden');

    $("#category_id").on('change', function() {
        get_filtered_data();
    });

    $("#type").on('change', function() {
        get_filtered_data();
    });

    $("#language_id").on('change', function() {
        get_filtered_data();
    });

    function get_filtered_data() {
        const category_id = $("#category_id").val();
        const url         = "<?php echo route('api.translations.get_data') ?>";
        const type        = $("#type").val();
        const language_id = $("#language_id").val();

        const data = {
            language_id: language_id,
            chapter_id : category_id,
            type       : type,
        }

        if( data.language_id !== null && data.type !== null && data.chapter_id !== null) {
            // Hit an API and get the transalation list data for this users based on his permission.
            $.get(url, data, function (resData, textStatus, jqXHR) {
                    $("#search-result").html(resData);
                    $("#btn-translation-save").removeClass('display-hidden');
                    $("#btn-translation-save").addClass('display-block-inline');
                }
            );
        }
    }

</script>
