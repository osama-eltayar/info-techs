
<div class="col-lg-6 offset-lg-6 col-12">
    <div class="shopping-details">
        <div class="form-group subtotal">
            <label for="">Sub Total</label>
            <p>${{$details ->subTotal}}</p>
        </div>
        <div class="form-group">
            <label for="copouns">Copouns</label>
            <div class="copoun">
                <input type="text" name="copouns" id="copouns" class="form-control">
                <button type="button" class="btn btn-default" data-url="{{route('discount.store')}}">Apply</button>
                <span class="message faild d-none"><i class="fa-solid fa-circle-xmark"></i> Not available </span>
                <span class="message success d-none"><i class="fa-solid fa-circle-check"></i> Done</span>
            </div>
        </div>
        <div class="form-group">
            <label for="">Taxes</label>
            <p> ${{$details ->taxes}}</p>
        </div>
        <div class="form-group total">
            <label for="">Total</label>
            <p>${{$details ->total}}</p>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
            <label class="custom-control-label" for="customCheck">
                I agree to pay this invoice
            </label>
        </div>
        <button type="button" data-url="{{route('payment.checkout')}}" class="btn btn-success checkout-btn">Check out</button>
    </div>
</div>
