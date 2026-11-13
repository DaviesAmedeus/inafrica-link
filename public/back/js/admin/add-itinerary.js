        let itineraryIndex = 0;

        function addItineraryItem() {
            let itineraryItem = `
        <div class="card mb-2 p-2 itinerary-item">

            <input type="text"
                name="itinerary[${itineraryIndex}][title]"
                class="form-control mb-2"
                placeholder="Itinerary title (Required)...">

            <span
                class="text-danger error-text d-none"
                data-error="itinerary.${itineraryIndex}.title">
            </span>

            <textarea
                name="itinerary[${itineraryIndex}][content]"
                class="form-control mb-2"
                placeholder="Itinerary content (Optional)..."></textarea>

            <button type="button" class="btn btn-danger btn-sm remove-itinerary">
                Remove
            </button>

        </div>
    `;

            $('#itinerary_container').append(itineraryItem);
            itineraryIndex++;
        }
        addItineraryItem();

        $('#add_itinerary').on('click', function() {

            let lastItineraryTitle = $('.itinerary-item input').last().val();

            if (lastItineraryTitle !== undefined && lastItineraryTitle.trim() === '') {
                $('#itinerary-error')
                    .removeClass('d-none')
                    .text('"Itinerary title" is required but "Itinerary content" is optional!.');
                return;
            }
            // Clearing error
            $('#itinerary-error').addClass('d-none').text('');

            addItineraryItem();
        });

        // Remove itinerary from the list
        $(document).on('click', '.remove-itinerary', function() {
            if ($('#itinerary_container div').length == 1) {
                $('#itinerary-error')
                    .removeClass('d-none')
                    .text('At least one "Itinerary Item" is required!');
                return;
            }
            $(this).closest('.itinerary-item').remove();
        });


