<div class="list-order-tab">
    <ul class="nav nav-tabs nav-tab-" id="enroll-order-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="identity-tab" data-toggle="tab" href="#identity" role="tab" aria-controls="home" aria-selected="true">Identity</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="eligibility-tab" data-toggle="tab" href="#eligibility" role="tab" aria-controls="profile" aria-selected="false">Eligibility</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="order-history-tab" data-toggle="tab" href="#order-history" role="tab" aria-controls="order-history" aria-selected="false">Order History</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="comment-history-tab" data-toggle="tab" href="#comment-history" role="tab" aria-controls="comment-history" aria-selected="false">Comment History</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="enrollment-document-tab" data-toggle="tab" href="#enrollment-document" role="tab" aria-controls="enrollment-document" aria-selected="false">Document</a>
        </li>
    </ul>
    <div class="tab-content border border-top-0 p-3">
        <div class="tab-pane fade show active" id="identity" role="tabpanel" aria-labelledby="identity-tab">
            @include('pages.enrollment.components.detail.identity-tab')
        </div>
        <div class="tab-pane fade" id="eligibility" role="tabpanel" aria-labelledby="eligibility-tab">
            @include('pages.enrollment.components.detail.eligibility-tab')
        </div>
        <div class="tab-pane fade" id="order-history" role="tabpanel" aria-labelledby="contact-tab">
            <div class="card">
                @include('pages.enrollment.components.detail.order-history-tab')
            </div>
        </div>
        <div class="tab-pane fade" id="comment-history" role="tabpanel" aria-labelledby="comment-tab">
            <div class="card">
                @include('pages.enrollment.components.detail.comment-history-tab')
            </div>
        </div>
        <div class="tab-pane fade" id="enrollment-document" role="tabpanel" aria-labelledby="enrollment-document-tab">
            <div class="card">
                @include('pages.enrollment.components.detail.document-tab')
            </div>
        </div>
    </div>
</div>
<style>
    .list-order-tab {
        margin: 20px 0;
    }
</style>
