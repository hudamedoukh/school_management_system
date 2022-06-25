<!-- Deleted inFormation Student -->
<div class="modal fade" id="Delete_receipt{{ $payment_student->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف سند صرف</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('Payment_students.destroy', 'test') }}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">

                    <input type="hidden" name="id" value="{{ $payment_student->id }}">
                    <h5>هل انت متاكد مع عملية الحذف ؟</h5>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-danger">تاكيد الحذف</button>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                </div>
            </form>
        </div>
    </div>
</div>
