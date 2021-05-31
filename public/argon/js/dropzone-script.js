var Dropzones = (function () {
    // Variables
    var $dropzone = $('[data-toggle="dropzone"]');
    var $dropzonePreview = $(".dz-preview");

    // Methods
    function init($this) {
        var multiple =
            $this.data("dropzone-multiple") !== undefined ? true : false;
        var preview = $this.find($dropzonePreview);
        var currentFile = undefined;

        // Init options
        var options = {
            url: $this.data("dropzone-url"),
            headers: {
                "X-CSRF-TOKEN": $("meta[name=csrf-token]").attr("content"),
            },
            success: function (response) {
                fileName = JSON.parse(response.xhr.response)['fileName'];
                $('form').append('<input type="hidden" name="document[]" value="' + fileName + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                  name = file.file_name
                } else {
                  name = uploadedDocumentMap[file.name]
                }
                $('form').find('input[name="document[]"][value="' + name + '"]').remove()
            },
            thumbnailWidth: null,
            thumbnailHeight: null,
            previewsContainer: preview.get(0),
            previewTemplate: preview.html(),
            parallelUploads: 10,
            maxFiles: !multiple ? 1 : null,
            acceptedFiles: !multiple ? "image/*" : null,
            autoProcessQueue: true,
            init: function () {
                this.on("addedfile", function (file) {
                    if (!multiple && currentFile) {
                        this.removeFile(currentFile);
                    }
                    currentFile = file;
                });
            },
        };

        // Clear preview html
        preview.html("");

        // Init dropzone
        $this.dropzone(options);
    }

    function globalOptions() {
        Dropzone.autoDiscover = false;
    }

    // Events
    if ($dropzone.length) {
        // Set global options
        globalOptions();

        // Init dropzones
        $dropzone.each(function () {
            init($(this));
        });
    }
})();
