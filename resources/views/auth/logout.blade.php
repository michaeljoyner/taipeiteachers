<form action="/admin/logout" method="POST">
    {!! csrf_field() !!}
    <button type="submit" class="font-bold uppercase text-green mx-4">Logout</button>
</form>