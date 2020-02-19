{{ link_to('', 'Delete', ['class'=>'btn btn-danger', 'onclick'=>"event.preventDefault();document.getElementById('delete-form-$id').submit();"]) }}
<form id="delete-form-{{ $id }}}" action="{{ $route }}" method="POST" style="display: none;">
    @method('delete')
    @csrf
</form>
