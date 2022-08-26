<div class="row">
    <div class="col-3">
        <div class="mb-3">
            <label for="identity_number" class="form-label">Identity Number: *</label>
            <input type="text" class="form-control" id="identity_number" value="">
        </div>

        <div class="mb-3">
            <label class="form-label">Proof type:</label>
            <select class="form-select mb-3">
                <option value="" selected="">-- Select --</option>
                <option value="">Birth Certificate</option>
                <option value="1">Certificate of Naturalization</option>
                <option value="2">Certificate of US Citizenship</option>
                <option value="3">Driver's License</option>
            </select>
        </div>
    </div>

    <div class="col-9">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-primary btn-icon" id="rotate">
                    <i data-feather="rotate-cw"></i>
                </button>
                <button type="button" class="btn btn-primary btn-icon" id="rotate">
                    <i data-feather="zoom-in"></i>
                </button>
                <button type="button" class="btn btn-primary btn-icon" id="rotate">
                    <i data-feather="zoom-out"></i>
                </button>
            </div>

            <div id="container">
                <img class="card-img-top" id="image" src="https://images.ctfassets.net/fzn2n1nzq965/5Bf7wMBJfzdTsUETXNTNyp/a54097a7db7c75deef422cc3d2c16097/identity-us-inigo.jpg" alt="">
            </div>
        </div>
    </div>
</div>

@push('plugin-scripts')
    <script>
        let angle = 0, img = document.getElementById('container');
        document.getElementById('rotate').onclick = function () {
            angle = (angle + 90) % 360;
            img.className = "rotate" + angle;
        }
    </script>
@endpush

@push('plugin-styles')
    <style>
        #container {
            width: auto;
            height: auto;
            overflow: hidden;
            border: 1px solid #999;

            display: block;
            position: relative;
            /*min-height: 180px;*/
            overflow-x: auto;
            overflow-y: auto;
            white-space: nowrap;
        }

        #container.rotate90,
        #container.rotate270 {
            width: auto;
            height: auto
        }

        #image {
            transform-origin: top left;
            /* IE 10+, Firefox, etc. */
            -webkit-transform-origin: top left;
            /* Chrome */
            -ms-transform-origin: top left;
            /* IE 9 */
            height: auto;
        }

        #container.rotate90 #image {
            transform: rotate(90deg) translateY(-100%);
            -webkit-transform: rotate(90deg) translateY(-100%);
            -ms-transform: rotate(90deg) translateY(-100%);
        }

        #container.rotate180 #image {
            transform: rotate(180deg) translate(-100%, -100%);
            -webkit-transform: rotate(180deg) translate(-100%, -100%);
            -ms-transform: rotate(180deg) translateX(-100%, -100%);
        }

        #container.rotate270 #image {
            transform: rotate(270deg) translateX(-100%);
            -webkit-transform: rotate(270deg) translateX(-100%);
            -ms-transform: rotate(270deg) translateX(-100%);
        }
    </style>
@endpush