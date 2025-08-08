@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Item Details</div>

                <div class="card-body">
                    <div class="mb-3">
                        <strong>Name:</strong> {{ $item->name }}
                    </div>
                    <div class="mb-3">
                        <strong>Description:</strong> 
                        <p>{{ $item->description ?? 'No description provided.' }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Created At:</strong> {{ $item->created_at->format('M d, Y H:i') }}
                    </div>
                    <div class="mb-3">
                        <strong>Updated At:</strong> {{ $item->updated_at->format('M d, Y H:i') }}
                    </div>
                    <a href="{{ route('items.edit', $item) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('items.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection