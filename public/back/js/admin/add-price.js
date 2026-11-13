
        /* ---TOUR PRICING MECHANISM START --- */
        let pricingIndex = 0;

        function addPricingRow() {
            let row = `
            <tr>
                <td>
                    <input type="number"
                        name="pricing[${pricingIndex}][people]"
                        class="form-control people-input"
                        placeholder="e.g 5"
                        min="1"
                        max="10">
                         <span
                class="text-danger error-text d-none"
                data-error="pricing.${pricingIndex}.people">
            </span>
                </td>

                <td>
                    <input type="number"
                        name="pricing[${pricingIndex}][price]"
                        class="form-control price-input"
                        placeholder="e.g 1200"
                        min="0"
                        step="0.01">
            <span
                class="text-danger error-text d-none"
                data-error="pricing.${pricingIndex}.price">
            </span>
                </td>

                <td>
                    <button type="button"
                        class="btn btn-danger remove-row">
                        <i class="icon-copy dw dw-delete-3"></i>
                    </button>
                </td>

            </tr>
        `;

            $('#pricing-body').append(row);

            pricingIndex++;
        };

        addPricingRow();

        $('#add-price-group').click(function() {

            let lastRow = $('#pricing-body tr:last');
            let people = lastRow.find('.people-input').val();
            let price = lastRow.find('.people-price').val();

            // VALIDATION (checking if either of the fields are empty)
            if (people == '' || price == '') {
                $('#pricing-error')
                    .removeClass('d-none')
                    .text('Please complete the current pricing group first.');
                return;
            }

            // CLEAR ERROR
            $('#pricing-error').addClass('d-none').text('');

            addPricingRow();
        });

        // Removing the pricing group row
        $(document).on('click', '.remove-row', function() {

            if ($('#pricing-body tr').length == 1) {

                $('#pricing-error')
                    .removeClass('d-none')
                    .text('At least one pricing group is required.');
                return;
            }
            $(this).closest('tr').remove();
        });

        /* ---PRICING MECHANISM END --- */
