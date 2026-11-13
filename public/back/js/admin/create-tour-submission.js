/* ---SUBMITING THE FORM USING AJAX (CREATING THE TOUR) --- */
$('#addPostForm').on('submit', function (e) {
    e.preventDefault();
    var form = this;
    var overview = CKEDITOR.instances.overview.getData();
    var formdata = new FormData(form);
    formdata.append('overview', overview);
    // for (let [key, value] of formdata.entries()) {
    //     console.log(key, value);
    // }

    $.ajax({
        url: $(form).attr('action'),
        method: $(form).attr('method'),
        data: formdata,
        processData: false,
        dataType: 'json',
        contentType: false,
        beforeSend: function () {
            $(form).find('span.error-text').text('');
        },
        success: function (data) {
            if (data.status == 1) {

                $().notifa({
                    vers: 2,
                    cssClass: 'success',
                    html: data.message,
                    delay: 1500
                });

                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                $().notifa({
                    vers: 2,
                    cssClass: 'error',
                    html: data.message,
                    delay: 2500
                });
            }
        },
        error: function (data) {
            $.each(data.responseJSON.errors, function (prefix, val) {

                // Handle nested itinerary validation
                if (prefix.startsWith('itinerary.')) {

                    $(form).find('[data-error="' + prefix + '"]')
                        .removeClass('d-none')
                        .text(val[0]);

                    return;
                }

                // Handle nested pricing validation
                if (prefix.startsWith('pricing.')) {

                    $(form).find('[data-error="' + prefix + '"]')
                        .removeClass('d-none')
                        .text(val[0]);

                    return;
                }

                // Handle nested costInclude validation
                if (prefix.startsWith('costInclude.')) {
                    $(form).find('[data-error="' + prefix + '"]')
                        .removeClass('d-none')
                        .text(val[0]);

                    return;
                }

                // Handle nested costExclude validation
                 if (prefix.startsWith('costExclude.')) {
                    $(form).find('[data-error="' + prefix + '"]')
                        .removeClass('d-none')
                        .text(val[0]);

                    return;
                }



                // Handle ordinary form validation
                $(form).find('span.' + prefix + '_error')
                    .removeClass('d-none')
                    .text(val[0]);

            });
        }
    });
});

