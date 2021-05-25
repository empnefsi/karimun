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
            thumbnailWidth: null,
            thumbnailHeight: null,
            previewsContainer: preview.get(0),
            previewTemplate: preview.html(),
            maxFiles: !multiple ? 1 : null,
            acceptedFiles: !multiple ? "image/*" : null,
            autoProcessQueue: false,
            init: function () {
                this.on("addedfile", function (file) {
                    if (!multiple && currentFile) {
                        this.removeFile(currentFile);
                    }
                    currentFile = file;
                });

                var myDropzone = this;
                
                // Update selector to match your button
                $("#submit").click(function (e) {
                    myDropzone.processQueue();
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
