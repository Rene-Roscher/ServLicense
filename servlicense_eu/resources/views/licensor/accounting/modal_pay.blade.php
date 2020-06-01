<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Aktuelles Guthaben: <span class="badge badge-success">{{ auth()->user()->money.' €' }}</span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" action="{{ url('/licensor/accounting/pay') }}">
            <div class="modal-body">
                <h4 class="text-muted">Zahlungsmethode:</h4>
                <div class="payment-selector">
                    <div class="col-md-6" style="float: right;padding-top: -500px">
                        <input id="paysafecard" type="radio" name="payment_method" value="PAYSAFECARD"/>
                        <label class="payment-method paysafecard" for="paysafecard"></label>
                    </div>
                    <div class="col-md-6" style="float: left;padding-top: -500px">
                        <input id="paypal" type="radio" name="payment_method" value="PAYPAL" checked />
                        <label class="payment-method paypal" for="paypal"></label>
                    </div>
                </div>
                <h4 class="text-muted">Betrag:</h4>
                <input id="amount" type="number" name="amount" value="5.00" step="0.01" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guthaben kostenpflichtig Aufladen</button>
            </div>
        </form>
    </div>
</div>
