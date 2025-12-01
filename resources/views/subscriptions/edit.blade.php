@extends('adminlte::page')

@section('content')
<div class="container">
    <h2>Edit Subscription</h2>

    <form action="/subscriptions-list/{{ $subscription->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Subscription</label>
            <select name="subscription" id="subscriptionSelect" class="form-control" required>
                <option value="">-- Select Subscription --</option>
                <option value="milk" {{ $subscription->subscription === 'milk' ? 'selected' : '' }}>Milk Subscription</option>
                <option value="yogurt" {{ $subscription->subscription === 'yogurt' ? 'selected' : '' }}>Yogurt Subscription</option>
            </select>
        </div> 

        <div class="mb-3">
            <label>City</label>
            <select name="city" class="form-control" required>
                <option value="">-- Select City --</option>
                @foreach($cities as $city)
                    <option value="{{ $city }}" {{ $subscription->city === $city ? 'selected' : '' }}>{{ $city }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Variety</label>
            <select name="milk_variety" id="milkVarietySelect" class="form-control" required>
                <option value="">-- Select Variety --</option>
                @foreach($milkVarieties as $variety)
                    <option value="{{ $variety }}" {{ $subscription->milk_variety === $variety ? 'selected' : '' }}>{{ $variety }}</option>
                @endforeach
            </select>
        </div>

        {{-- Milk Fields --}}
        <div class="mb-3 milk-field">
            <label>1L Milk Price</label>
            <input type="number" name="unit_1l_price" step="0.01" value="{{ $subscription->unit_1l_price }}" class="form-control">
        </div>

        <div class="mb-3 milk-field">
            <label>1.5L Milk Price</label>
            <input type="number" name="unit_1_5l_price" step="0.01" value="{{ $subscription->unit_1_5l_price }}" class="form-control">
        </div>

        {{-- Yogurt Fields --}}
         <div class="mb-3 yogurt-field d-none">
            <label>500g Yogurt Price</label>
            <input type="number" name="unit_500g_price" step="0.01" value="{{ $subscription->unit_500g_price }}" class="form-control">
        </div>
        <div class="mb-3 yogurt-field d-none">
            <label>1KG Yogurt Price</label>
            <input type="number" name="unit_1kg_price" step="0.01" value="{{ $subscription->unit_1kg_price }}" class="form-control">
        </div>

       

        <button type="submit" class="btn btn-success">Update</button>
        <a href="/subscriptions-list" class="btn btn-secondary">Back</a>
    </form>
</div>

{{-- JS --}}
@section('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const subscriptionSelect = document.getElementById('subscriptionSelect');
    const milkVarietySelect = document.getElementById('milkVarietySelect');
    const allVarieties = @json($milkVarieties);
    const milkFields = document.querySelectorAll('.milk-field');
    const yogurtFields = document.querySelectorAll('.yogurt-field');

    function toggleFields(selected) {
        if (selected === 'milk') {
            milkFields.forEach(f => f.classList.remove('d-none'));
            yogurtFields.forEach(f => f.classList.add('d-none'));
        } else if (selected === 'yogurt') {
            milkFields.forEach(f => f.classList.add('d-none'));
            yogurtFields.forEach(f => f.classList.remove('d-none'));
        } else {
            milkFields.forEach(f => f.classList.add('d-none'));
            yogurtFields.forEach(f => f.classList.add('d-none'));
        }
    }

    subscriptionSelect.addEventListener('change', function() {
        const selected = this.value;
        milkVarietySelect.innerHTML = '<option value="">-- Select Variety --</option>';

        let filteredVarieties = [];
        if (selected === 'milk') {
            filteredVarieties = allVarieties;
        } else if (selected === 'yogurt') {
            filteredVarieties = allVarieties.filter(v => 
                v.toLowerCase().includes('cow') || v.toLowerCase().includes('buffalo')
            );
        }

        filteredVarieties.forEach(v => {
            const opt = document.createElement('option');
            opt.value = v;
            opt.textContent = v;
            milkVarietySelect.appendChild(opt);
        });

        toggleFields(selected);
    });

    // On page load: set fields correctly based on saved subscription
    toggleFields(subscriptionSelect.value);
});
</script>
@endsection
@endsection
