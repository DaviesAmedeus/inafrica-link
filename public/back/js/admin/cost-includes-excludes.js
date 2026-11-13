   /* --- COST INCLUDES MECHANISM START --- */

        let costIncludeIndex = 0;

        function addCostIncludeRow() {
            let costIncludeItem = `
    <div class="row mb-2 align-items-center cost-include-item">

        <div class="col">
            <input
                type="text"
                name="costInclude[${costIncludeIndex}]"
                class="form-control"
                placeholder="Enter cost include...">
                <span
                class="text-danger error-text d-none"
                data-error="costInclude.${costIncludeIndex}">
            </span>
        </div>

        <div class="col-auto">
            <button
                type="button"
                class="btn btn-danger remove-cost-include-item">
                <i class="icon-copy dw dw-delete-3"></i>
            </button>
        </div>

    </div>
`;

            $('#cost-include-container').append(costIncludeItem);
            costIncludeIndex++;
        }

        addCostIncludeRow();

        $('#add_cost_include_item').on('click', function() {
            let lastCostIncludeItem = $('#cost-include-container input').last().val();
            if (lastCostIncludeItem !== undefined && lastCostIncludeItem.trim() === '') {
                $('#cost-include-error')
                    .removeClass('d-none')
                    .text('Can not allow empty cost include!');
                return;
            }

            // Clearing the cost include error
            $('#cost-include-error').addClass('d-none').text('');

            addCostIncludeRow();
        });


        // Remove cost include item from the list
        $('#cost-include-container').on('click', '.remove-cost-include-item', function() {

            if ($('.cost-include-item').length == 1) {
                $('#cost-include-error')
                    .removeClass('d-none')
                    .text('At least one "Cost include Item" is required!');
                return;
            }

            $(this).closest('.cost-include-item').remove();
        });

        /* --- COST INCLUDES MECHANISM END --- */



        /* --- COST EXCLUDES MECHANISM START --- */

        let costExcludeIndex = 0;

        function addCostExcludeRow() {
            let costExcludeItem = `
    <div class="row mb-2 align-items-center cost-exclude-item">

        <div class="col">
            <input
                type="text"
                name="costExclude[${costExcludeIndex}]"
                class="form-control"
                placeholder="Enter cost exclude...">
                  <span
                class="text-danger error-text d-none"
                data-error="costExclude.${costExcludeIndex}">
            </span>
        </div>

        <div class="col-auto">
            <button
                type="button"
                class="btn btn-danger remove_cost_exclude_item">
                <i class="icon-copy dw dw-delete-3"></i>
            </button>
        </div>

    </div>
`;

            $('#cost-exclude-container').append(costExcludeItem);
            costExcludeIndex++;
        }

        addCostExcludeRow();

        $('#add-cost-exclude-item').on('click', function() {
            let lastCostExcludeItem = $('#cost-exclude-container input').last().val();
            if (lastCostExcludeItem !== undefined && lastCostExcludeItem.trim() === '') {
                $('#cost-exclude-error')
                    .removeClass('d-none')
                    .text('Can not allow empty cost exclude!');
                return;
            }

            // Clearing the cost exclude error
            $('#cost-exclude-error').addClass('d-none').text('');

            addCostExcludeRow();
        });


        // Remove cost exclude item from the list
        $('#cost-exclude-container').on('click', '.remove_cost_exclude_item', function() {

            if ($('.cost-exclude-item').length == 1) {
                $('#cost-exclude-error')
                    .removeClass('d-none')
                    .text('At least one "Cost exclude Item" is required!');
                return;
            }

            $(this).closest('.cost-exclude-item').remove();
        });



        /* --- COST EXCLUDES MECHANISM END --- */

