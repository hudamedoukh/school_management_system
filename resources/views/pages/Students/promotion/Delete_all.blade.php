<div class="modal fade" id="Delete_all" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5  class="modal-title" id="exampleModalLabel">تراجع الكل</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('Promotion.destroy','test')}}" method="post">
                @csrf
                @method('DELETE')
            <div class="modal-body">


                    <input type="hidden" name="page_id" value="1">
                    <h5>هل انت متأكد من عملية تراجع كافة الطلاب ؟</h5>

            </div>
            <div class="modal-footer">
                <button  class="btn btn-danger">تأكيد</button>

                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
            </div>
        </form>

        </div>
    </div>
</div>
