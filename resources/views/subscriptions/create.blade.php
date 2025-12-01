@extends('adminlte::page')

@section('content')
<div class="container">
    <h2>Add Subscription</h2>

    <form action="/subscriptions-list" method="POST">
        @csrf
        <div class="mb-3">
            <label>Subscription</label>
            <select name="subscription" id="subscriptionSelect" class="form-control" required>
                <option value="">-- Select Subscription --</option>
                <option value="milk">Milk Subscription</option>
                <option value="yogurt">Yogurt Subscription</option>
            </select>
        </div> 

        <div class="mb-3">
            <label>City</label>
            <select name="city" class="form-control" required>
                <option value="">-- Select City --</option>
                @foreach($cities as $city)
                    <option value="{{ $city }}">{{ $city }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Variety</label>
            <select name="milk_variety" id="milkVarietySelect" class="form-control" required>
                <option value="">-- Select Variety --</option>
                @foreach($milkVarieties as $variety)
                    <option value="{{ $variety }}">{{ $variety }}</option>
                @endforeach
            </select>
        </div>

        {{-- Milk Fields --}}
        <div class="mb-3 milk-field">
            <label>1L Milk Price</label>
            <input type="number" name="unit_1l_price" step="0.01" class="form-control">
        </div>

        <div class="mb-3 milk-field">
            <label>1.5L Milk Price</label>
            <input type="number" name="unit_1_5l_price" step="0.01" class="form-control">
        </div> 

        {{-- Yogurt Fields --}}
         <div class="mb-3 yogurt-field d-none">
            <label>500g Yogurt Price</label>
            <input type="number" name="unit_500g_price" step="0.01" class="form-control">
        </div>
        <div class="mb-3 yogurt-field d-none">
            <label>1KG Yogurt Price</label>
            <input type="number" name="unit_1kg_price" step="0.01" class="form-control">
        </div>

       

        <button type="submit" class="btn btn-success">Save</button>
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

    subscriptionSelect.addEventListener('change', function() {
        const selected = this.value;

        // Reset varieties
        milkVarietySelect.innerHTML = '<option value="">-- Select Variety --</option>';
        let filteredVarieties = [];

        // Handle variety filtering
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

        // Show/hide relevant price fields
        if (selected === 'milk') {
            milkFields.forEach(f => f.classList.remove('d-none'));
            yogurtFields.forEach(f => f.classList.add('d-none'));
        } else if (selected === 'yogurt') {
            milkFields.forEach(f => f.classList.add('d-none'));
            yogurtFields.forEach(f => f.classList.remove('d-none'));
        } else {
            // None selected, hide both
            milkFields.forEach(f => f.classList.add('d-none'));
            yogurtFields.forEach(f => f.classList.add('d-none'));
        }
    });
});
</script>
@endsection
@endsection
