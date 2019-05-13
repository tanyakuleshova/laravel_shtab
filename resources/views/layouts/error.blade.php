@if($errors->any())
    <div class="alarm-box">
    @foreach ($errors->all() as $error)
       <div>{{ $error }}</div>
    @endforeach
    </div>
@endif