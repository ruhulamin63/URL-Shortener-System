<div>
    @extends('layouts.app')

    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                           <h2>Urls</h2>
                            <a href="{{ route('urls.create') }}" class="btn btn-primary float-right">Create</a>
                        </div>
                        <div class="card-body">
                            <table class="table mt-3">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Original Url</th>
                                        <th>Short Url</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($urls as $url)
                                        <tr>
                                            <td>{{ $url->id }}</td>
                                            <td>{{ $url->original_url }}</td>
                                            <td><a href="{{ route('urls.show', $url->id) }}">{{ $url->short_url }}</a></td>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</div>
