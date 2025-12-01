@extends('adminlte::page')

@section('content')
<div class="container mt-4">
    <h3>Add Delivery Time</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/delivery-times" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Select City:</label>
            <select name="city" id="city" class="form-control" required>
                <option value="">-- Select City --</option>
                @foreach($availableCities as $city)
                    <option value="{{ $city }}">{{ $city }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Time Slot:</label>
            <select name="time_slot" id="timeSlotSelect" class="form-control" required>
                <option value="">-- Select Time Slot --</option>
                <option value="Afternoon 02:00 PM - Evening 11:00 PM">
                    Afternoon 02:00 PM to Evening 11:00 PM
                </option>
            </select>
        </div>

       

        <div class="mb-3">
            <label class="form-label">Charge (₹):</label>
            <input type="number" step="0.01" name="charge" class="form-control" placeholder="e.g. 50" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="/delivery-times" class="btn btn-secondary">Back</a>
    </form>
</div>

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const citySelect = document.getElementById('city');
    const timeSlotSelect = document.getElementById('timeSlotSelect');

    citySelect.addEventListener('change', function() {
        const city = this.value.toLowerCase();

        // Clear existing options
        timeSlotSelect.innerHTML = '<option value="">-- Select Time Slot --</option>';

        if (city === 'dubai') {
            timeSlotSelect.innerHTML += '<option value="05:30 AM - 10:30 AM">05:30 AM to 10:30 AM</option>';
            timeSlotSelect.innerHTML += '<option value="02:00 PM - 11:00 PM" selected>Afternoon 02:00 PM to Evening 11:00 PM</option>';
        } 
        else if (city === 'sharjah' || city === 'ajman') {
            timeSlotSelect.innerHTML += '<option value="02:00 PM - 11:00 PM" selected>Afternoon 02:00 PM to Evening 11:00 PM</option>';
            timeSlotSelect.innerHTML += '<option value="12:00 PM - 05:00 PM">Afternoon 12:00 PM to Evening 05:00 PM</option>';
            timeSlotSelect.innerHTML += '<option value="08:00 PM - 11:30 PM">Evening 08:00 PM to 11:30 PM</option>';
        } 
        else if (city) {
            timeSlotSelect.innerHTML += '<option value="02:00 PM - 11:00 PM" selected>Afternoon 02:00 PM to Evening 11:00 PM</option>';
        }
    });
});
</script>
@endsection
@endsection
