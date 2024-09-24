<div>
    @extends('layouts.app')

    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('urls.store') }}" method="POST">
                                @csrf
                                <div>
                                    <label for="original_url">Enter URL</label>
                                    <input type="url" name="original_url" id="original_url" required>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</div>
