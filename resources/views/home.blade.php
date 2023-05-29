<div class="container mt-5">
    <div style="text-align: center; color:#247ee5;">
        <h3 class="mb-5" > Our products </h3> </div>

    <div class="d-flex flex wrap">
        <?php for($i = 0; $i < 5; $i++):?>
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Free</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$0<small class="text-body-secondary fw-light">/mo</small></h1>
                    <img src="img/<?php echo ($i + 1) ?>.png" class="img-thumbnail">
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>10 users included</li>
                        <li>2 GB of storage</li>
                        <li>Email support</li>
                        <li>Help center access</li>
                    </ul>
                    <button type="button" class="w-100 btn btn-lg btn-outline-primary">Sign up for free</button>
                </div>
            </div>
        </div>
        <?php endfor; ?>
    </div>
</div>
