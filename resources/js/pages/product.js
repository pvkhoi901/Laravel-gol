var upload = new FileUploadWithPreview("galleryUpload", {
    showDeleteButtonOnImages: true,
    presetFiles: gallery,
});

$("#gallery-sortable-container").sortable({
    update: function () {
        // Get the new token order
        let newTokenOrder = $(this).sortable("toArray", {
            attribute: "data-upload-token",
        });

        // Init new array that we'll file with the correct order
        let sortedCachedFileArray = [];

        // Loop through the newTokenOrder array and add each email in place as found
        for (let x = 0; x < newTokenOrder.length; x++) {
            let foundIndex = upload.cachedFileArray
                .map((image) => image.token)
                .indexOf(newTokenOrder[x]);
            sortedCachedFileArray.push(upload.cachedFileArray[foundIndex]);
        }

        // Replace the cachedFileArray with your new sortedCachedFileArray
        upload.replaceFiles(sortedCachedFileArray);
    },
});

$(function () {
    "use strict";

    $("#description").summernote({
        placeholder: "Description...",
        tabsize: 2,
        height: 183,
        toolbar: [
            ["style", ["style"]],
            ["font", ["bold", "underline", "clear"]],
            ["color", ["color"]],
            ["para", ["ul", "ol", "paragraph"]],
            ["table", ["table"]],
            ["insert", ["link", "picture", "video"]],
            ["view", ["codeview", "help"]],
        ],
    });
});
