// Picture Preview
function generateCustomPreview(input){
    console.log("Generate Preview is running...");

    let preview_container = $(input).closest('.preview-container');
    let image_container = $(preview_container).find('.img-preview img');
    let reset_button = $(preview_container).find('.btn-preview_remove');
    let fileName;
    let fileLabel = $(preview_container).find('.custom-file-label');

    if (input[0].files[0] && input[0].files[0]) {
        let reader = new FileReader();
        fileName = input[0].files[0].name;
        reader.onload = function(e) {
            // Append Image on Image Container
            image_container.attr('src', e.target.result);
        }

        reader.readAsDataURL(input[0].files[0]);
        // Remove Disabled from Reset Button
        reset_button.prop('disabled', false);
    } else {
        fileName = 'Choose File';
        // Reset Preview
        $(reset_button).click();
    }

    // Set Label
    $(fileLabel).text(fileName);
}
function removeCustomPreview(input, old_value = ''){
    console.log("Remove Preview is running...");

    let preview_container = $(input).closest('.preview-container');
    let image_container = $(preview_container).find('.img-preview img');
    let reset_button = $(preview_container).find('.btn-preview_remove');
    let image_input = $(preview_container).find('.custom-file-input');
    let fileLabel = $(preview_container).find('.custom-file-label');

    // Add Disabled from Reset Button
    $(reset_button).attr('disabled', true);

    // Check if Old Value Exists
    if(old_value != ''){
        // Append Old Value to Image Container
        image_container.attr('src', old_value);
    } else {
        // Remove Preview from Image Container
        image_container.removeAttr('src');
    }

    // Set Input and Input Label
    image_input.val('');
    fileLabel.text('Choose file');
}