var quill = null;

function selectLocalImage() {
    const input = document.createElement("input");
    input.setAttribute("type", "file");
    input.click();

    input.onchange = () => {
        const file = input.files[0];

        if (/^image\//.test(file.type)) {
            imageHandler(file);
        } else {
            console.warn("You cloud only upload images.");
        }
    };
}

function imageHandler(image) {
    var formData = new FormData();
    formData.append("image", image);
    formData.append("_token", $("meta[name=csrf-token]").attr("content"));

    var url = $('[data-toggle="quill"]').data("imageUrl");

    $.ajax({
        type: "post",
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.url) {
                insertToEditor(response.url, quill);
            }
        },
    });
}

function insertToEditor(url, editor) {
    const range = editor.getSelection();
    editor.insertEmbed(range.index, "image", url);
}

var QuillEditor = (function () {
    // Variables
    var $quill = $('[data-toggle="quill"]');

    // Methods
    function init($this) {
        // Get placeholder
        var placeholder = $this.data("quill-placeholder");

        // Init editor
        quill = new Quill($this.get(0), {
            modules: {
                toolbar: [
                    ["bold", "italic"],
                    ["link", "blockquote", "image"],
                    [
                        {
                            list: "ordered",
                        },
                        {
                            list: "bullet",
                        },
                    ],
                ],
            },
            placeholder: placeholder,
            theme: "snow",
        });

        quill.getModule("toolbar").addHandler("image", () => {
            selectLocalImage();
        });

        quill.on("text-change", function (delta, oldDelta, source) {
            $('input[data-toggle="quill-value"]').val(quill.root.innerHTML);
        });
    }

    // Events
    if ($quill.length) {
        $quill.each(function () {
            init($(this));
        });
    }
})();
