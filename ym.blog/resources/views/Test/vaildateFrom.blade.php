<div id="app">
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('test/vaildatetest') }}" method="POST">
            <div class="form-group">
                <label>标题</label>
                <input type="text" name="title" class="form-control" placeholder="输入标题" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label>URL</label>
                <input type="text" name="url" class="form-control" placeholder="输入URL" value="{{ old('url') }}">
            </div>
            <fileupload-component></fileupload-component>
            <button type="submit" class="btn btn-primary">提交</button>
        </form>
    </div>
</div>