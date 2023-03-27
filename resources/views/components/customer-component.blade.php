<div>
    <label class="form-label">Customer</label>
    <select class="form-control select2-show-search form-select @error('customer_id') is-invalid @enderror" id="customer_id" name="customer_id" required
        data-placeholder="- Pilih Nama Customer-">
        @foreach ($customers as $customer)
        <option value="{{ $customer->id }}">{{ $customer->nama }}</option>
        @endforeach
    </select>
    @error('customer_id')
        <small>{{ $message }}</small>
    @enderror
</div>
