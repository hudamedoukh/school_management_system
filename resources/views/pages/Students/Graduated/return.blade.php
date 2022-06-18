<div class="modal fade" id="Return_Student{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ارجاع طالب</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('Graduated.update','test')}}" method="post" autocomplete="off">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id" value="{{$student->id}}">

                    <h5>هل انت متاكد من الغاء عملية التخرج ؟</h5>
                    <input type="text" readonly value="{{$student->name}}" class="form-control">

                    <div class="modal-footer">
                        <button  class="btn btn-danger">تأكيد</button>

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
