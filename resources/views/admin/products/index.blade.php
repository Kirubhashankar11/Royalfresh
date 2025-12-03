@extends('adminlte::page')

@section('title','Deliveries')

@section('content_header')
    <h1>Deliveries</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <form method="GET" class="form-inline mb-3">
      <input type="date" name="date_from" value="{{ request('date_from') }}" class="form-control mr-1">
      <input type="date" name="date_to" value="{{ request('date_to') }}" class="form-control mr-1">
      <select name="status" class="form-control mr-1">
        <option value="">All status</option>
        <option value="scheduled">Scheduled</option>
        <option value="in_progress">In Progress</option>
        <option value="delivered">Delivered</option>
        <option value="failed">Failed</option>
        <option value="rescheduled">Rescheduled</option>
      </select>
      <select name="city_id" class="form-control mr-1">
        <option value="">All cities</option>
        @foreach($cities as $id => $name)
          <option value="{{ $id }}" @selected(request('city_id') == $id)>{{ $name }}</option>
        @endforeach
      </select>
      <button class="btn btn-primary">Filter</button>
      &nbsp;
      <a href="{{ route('admin.deliveries.index', ['filter' => 'today']) }}" class="btn btn-sm btn-info">Today</a>
      <a href="{{ route('admin.deliveries.index', ['filter' => 'tomorrow']) }}" class="btn btn-sm btn-warning">Tomorrow</a>
      <a href="{{ route('admin.deliveries.index', ['filter' => 'rescheduled']) }}" class="btn btn-sm btn-danger">Rescheduled</a>
    </form>

    <table class="table table-bordered">
      <thead><tr><th>ID</th><th>Order</th><th>Customer</th><th>City</th><th>Date</th><th>Status</th><th>Actions</th></tr></thead>
      <tbody>
      @foreach($deliveries as $d)
        <tr>
          <td>{{ $d->id }}</td>
          <td>#{{ $d->order_id }}</td>
          <td>{{ $d->order->user?->name }}</td>
          <td>{{ $d->order->city?->name }}</td>
          <td>{{ $d->scheduled_date }}</td>
          <td>{{ $d->status }}</td>
          <td>
            <form method="POST" action="{{ route('admin.deliveries.markDelivered', $d) }}" style="display:inline">
              @csrf
              <button class="btn btn-sm btn-success">Delivered</button>
            </form>

            <form method="POST" action="{{ route('admin.deliveries.markFailed', $d) }}" style="display:inline">
              @csrf
              <input type="hidden" name="notes" value="Marked failed by admin">
              <button class="btn btn-sm btn-danger">Fail</button>
            </form>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>

    {{ $deliveries->links() }}
  </div>
</div>
@stop
