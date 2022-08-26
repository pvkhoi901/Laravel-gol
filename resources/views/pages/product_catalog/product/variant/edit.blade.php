<div class="card">
    <table class="table table-hover table-striped" id="table-variant">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ $product->attr_one->name }}</th>

                @if ($product->attr_two)
                    <th>{{ $product->attr_two->name }}</th>
                @endif

                @if ($product->attr_three)
                    <th>{{ $product->attr_three->name }}</th>
                @endif

                <th>Quantity</th>
                <th>Retail Price</th>
                <th>New Enroll Price</th>
                <th>Existing Price</th>
                <th>Agent Price</th>
                <th>Sku</th>
                <th>Barcode</th>
                <th>Updated By</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product->variants as $variant)
                <tr>
                    <th>{{ $variant->id }}</th>
                    <th>{{ $variant->option_1 }}</th>

                    @if ($product->attr_two)
                        <th>{{ $variant->option_2 }}</th>
                    @endif

                    @if ($product->attr_three)
                        <th>{{ $variant->option_3 }}</th>
                    @endif

                    <td>{{ $variant->quantity }}</td>
                    <td>{{ $variant->retail_price->price ?? 0 }}</td>
                    <td>{{ $variant->ne_price->price ?? 0 }}</td>
                    <td>{{ $variant->existing_price->price ?? 0 }}</td>
                    <td>{{ $variant->agent_price->price ?? 0 }}</td>
                    <td>{{ $variant->sku }}</td>
                    <td>{{ $variant->barcode }}</td>
                    <td>{{ $variant->user->name }}</td>
                    <td>{{ $variant->status }}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-outline-primary editingTRbutton" data-variant="{{ $variant->id }}" data-toggle="modal"
                            data-target="#updateVariantModal">
                            Edit
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="updateVariantModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Update Variant</h5>
            </div>
            <div id="update-variant-content"></div>
        </div>
    </div>
</div>
