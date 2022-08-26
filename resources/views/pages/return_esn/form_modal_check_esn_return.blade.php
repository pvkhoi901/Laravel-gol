<section style="overflow: auto">
<table class="table table-hover table-bordered" id="table_esn_return_today">
    <thead>
    <tr>
        <th>ID</th>
        <th>ESN (DEC)</th>
        <th>ESN (HEX)</th>
        <th>Model</th>
        <th>SO#</th>
        <th>Master Agent</th>
        <th>Receiver</th>
        <th>Status</th>
        <th>RMA Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($esnRma as $esn)
            <tr>
                <td>
                    {{ $esn->id ?? '' }}
                </td>
                <td>
                    {{ $esn->dec ?? '' }}
                </td>
                <td>
                    {{ $esn->hex ?? '' }}
                </td>
                <td>
                    {{ $esn->model_name ?? '' }}
                </td>
                <td>
                    {{ $esn->sale_order ?? '' }}
                </td>
                <td>
                    {{ $esn->box->orderAgent->agent->full_name ?? '' }}
                </td>
                <td>
                    {{ $esn->box->orderAgent->attention_name }}
                </td>
                <td>
                    <span class="{{ $esn->status ? 'btn btn-success' : 'btn btn-danger' }}">{{ $esn->status ? 'ACTIVE' : 'INACTIVE' }}</span>
                </td>
                <td>
                    <span class="btn btn-success">{{ \App\Models\InventoryStock::STATUS_RMA_ESN[$esn->status_rma] ?? '' }}</span>
                </td>
                <td>
                    <a data-id="{{ $esn->id }}" data-sale_order="{{ $esn->sale_order ?? '' }}" data-dec="{{ $esn->dec ?? '' }}" data-hex="{{ $esn->hex ?? '' }}" data-uccid="{{ $esn->uccid ?? '' }}"
                       data-model_name="{{ $esn->model_name ?? '' }}" data-defect_reason="{{ $esn->defect_reason ?? '' }}" data-status_return="{{ $esn->status_return }}" class="btn btn-success add_esn_return">
                        {{ \App\Models\InventoryStock::ACTION_RETURN[$esn->status_return] }}
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</section>

