<div class="card">
    <div class="card-header">Calculate Sqfts</div>
    <div class="card-body">
        <form method="POST" action="{{ route('sqft.calculate') }}">
            @csrf
            <div class="form-group row">
                <label for="length" class="col-md-4 col-form-label text-md-right">Please Enter Length</label>
                <div class="col-md-6">
                    <input id="length" type="text" class="form-control" name="length"  required autofocus>                    
                </div>
            </div>
            <div class="form-group row">
                <label for="width" class="col-md-4 col-form-label text-md-right">{{ __('please scan your member card') }}</label>
                <div class="col-md-6">
                    <input id="width" type="text" class="form-control" name="width" required autofocus>
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                      Send
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>