@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Product Variant</h1>
        <a href="{{ route('product-variant.create') }}" class="float-right btn btn-primary">+ New Variant</a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="form-row">
                <div class="col-md-3">
                    <input type="text" placeholder="Serch" class="form-control">
                </div>
                <div class="col-md-1">
                    <button class="btn btn-primary">Search</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($variants as $key=>$variant)
                    @php
                    $firstitem= $variants->firstItem();  
                    $lastitem= $variants->lastItem(); 
                    @endphp
                        <tr>
                            <td>{{ $firstitem +$key }}</td>
                            <td>{{ $variant->title }}</td>
                            <td>{{ nl2br($variant->description) }}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('product-variant.edit',$variant) }}" class="btn btn-primary">Edit</a>
                                    <button class="btn btn-danger">delete</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer">
            <div class="row justify-content-between">
                <div class="col-md-6">
                    <p>Showing {{$firstitem}} to {{$lastitem}} out of {{$variants->total()}}</p>
                </div>
                <div class="col-md-2">
                    {{$variants->links()}}
                </div>
            </div>
        </div>


    </div>
@endsection

