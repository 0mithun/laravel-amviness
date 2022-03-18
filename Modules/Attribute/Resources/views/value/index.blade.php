@extends('attribute::layouts.tab')

@section('title') Attribute Edit | Admin @endsection
@section('tab-nav')
<a href="{{ route('module.attributes.edit', $attribute->id) }}" class="nav-link">General</a>
<a href="{{ route('module.attribute.value.index', $attribute->id) }}" class="nav-link bg-primary text-white">Attribute Value</a>
@endsection

@section('tab-content')
<div class="card card-primary mb-5">
    <div class="card-header">
        Attribute Values
    </div>
    <div class="card-body">
        @if($attributeValue)
        <form class="form-horizontal" action="{{ route('module.attribute.value.update', $attributeValue->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="attribute_id" value="{{ $attribute->id }}">
            <div class="form-group row">
                <label class="">Value</label>
                <input name="value" value="{{ $attributeValue->value }}" type="text" class="form-control @error('value') is-invalid @enderror" placeholder="Enter Attribute Value">
                @error('value') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>
            <div class="form-group row">
                <label class="">Price</label>
                <input name="price" value="{{ $attributeValue->price }}" type="number" step="0.1" class="form-control @error('price') is-invalid @enderror" placeholder="Enter Attribute price">
                @error('price') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success mr-2"><i class="fas fa-sync"></i> Update Value </button>
                <a href="{{ route('module.attribute.value.index', $attribute->id) }}" class="btn btn-secondary"><i class="fas fa-times"></i> Cancel Edit </a>
            </div>
        </form>
        @else
            <form class="form-horizontal" action="{{ route('module.attribute.value.store') }}" method="POST">
                @csrf
                <input type="hidden" name="attribute_id" value="{{ $attribute->id }}">
                <div class="form-group row">
                    <label class="">Value</label>
                    <input name="value" value="{{ old('value') }}" type="text" class="form-control @error('value') is-invalid @enderror" placeholder="Enter Attribute Value">
                    @error('value') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                </div>
                <div class="form-group row">
                    <label class="">Price</label>
                    <input name="price" value="{{ old('price') }}" type="number" step="0.1" class="form-control @error('price') is-invalid @enderror" placeholder="Enter Attribute price">
                    @error('price') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i> Save Value </button>
                </div>
            </form>
        @endif
    </div>
</div>
<div class="card card-primary mb-3">
    <div class="card-header">
        Option Values
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th width="100px"> # </th>
                    <th> Value </th>
                    <th> Price </th>
                    <th width="150px"> Action </th>
                </tr>
            </thead>
            <tbody>
                @foreach($values as $value)
                <tr>
                    <td width="100px">{{ $value->id }}</td>
                    <td>{{ $value->value }}</td>
                    <td>{{ $value->price }}</td>
                    <td width="150px">
                        <div class="d-flex align-items-center">
                            <a href="{{ route('module.attribute.value.edit', $value->id) }}" class="btn btn-primary mr-2">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('module.attribute.value.destroy', $value->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger" type="submit">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
