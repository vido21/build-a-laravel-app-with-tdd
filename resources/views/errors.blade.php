@if ($errors->any())
    <div class="field mt-6">
        @foreach ($errors->all() as $error)
            <li style="color:red" class="text-sm">{{ $error }}</li>
        @endforeach
    </div>
@endif