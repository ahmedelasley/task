<div class="modal fade" id="delete{{ $blog->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف المقال</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.blogs.destroy',$blog->id) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('DELETE')
                    هل أنت متأكد من حذف المقال ؟
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary">نعم</button>
                </div>
            </form>
        </div>
    </div>
</div>