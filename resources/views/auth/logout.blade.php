<form action="/admin/logout" method="POST">
    {!! csrf_field() !!}
    <button type="submit" class="h-12 border-l border-site-other pl-4 font-bold uppercase tracking-wide text-sm text-site-other hover:text-white mr-3">Logout</button>
</form>