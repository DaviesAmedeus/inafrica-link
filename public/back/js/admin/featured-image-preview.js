      $('input[type="file"][name="featured_image"]').ijaboViewer({
            preview: 'img#featured_image_preview',
            imageShape: 'rectangular',
            allowedExtensions: ['jpeg', 'jpg', 'png'],
            onErrorShape: function(message, element) {
                alert(message);
            },
            onInvalidType: function(message, element) {
                alert(message);
            },
            onSuccess: function(message, element) {}
        });
