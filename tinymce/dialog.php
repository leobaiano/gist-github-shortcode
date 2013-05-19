<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title>Add Gist</title>
<script src="<?php echo includes_url( 'js/jquery/jquery.js' ); ?>" type="text/javascript"></script>
<script src="<?php echo includes_url( 'js/tinymce/tiny_mce_popup.js' ); ?>" type="text/javascript"></script>
<script>
jQuery(document).ready(function($) {

    var Gist = {
        e: '',
        init: function(e) {
            Gist.e = e;
            tinyMCEPopup.resizeToInnerSize();
        },
        insert: function createGalleryShortcode(e) {

            var GistID = $('#gist-id').val();
            var GistFile = $('#gist-file').val();

            var output = '[gist';

            if (GistID) {
                output += ' id="' + GistID + '"';
            }

            if (GistFile) {
                output += ' file="' + GistFile + '"';
            }

            output += ']';

            tinyMCEPopup.execCommand('mceReplaceContent', false, output);

            tinyMCEPopup.close();
        }
    }
    tinyMCEPopup.onInit.add(Gist.init, Gist);

    $('#gist-form').on('submit', function(e) {
        var required_id = $('#gist-id');
        required_id.removeClass('invalid');
        $('label.invalid').remove();

        if (required_id.val() == '') {
            e.preventDefault();
            required_id.addClass('invalid');
            required_id.after('<label class="invalid" style="display: block;">Required Field!</label>');
        } else {
            Gist.insert(Gist.e);
        }
    });

});
</script>
</head>
<body>
    <form id="gist-form" action="#">
        <p>
            <label for="gist-id">ID:</label><br/>
            <input id="gist-id" type="text" value="" />
        </p>
        <p>
            <label for="gist-file">File:</label><br/>
            <input id="gist-file" type="text" value="" />
        </p>
        <p>
            <input type="submit" id="insert" value="Add Gist" />
        </p>
    </form>
</body>
</html>