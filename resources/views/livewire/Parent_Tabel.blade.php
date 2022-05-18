<div class="col-4">
    <button type="button" class="btn btn-rounded btn-success mb-5" wire:click="showformadd">
        إضافة ولي امر
    </button>

</div>
<div class="table-responsive">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th width="5%">#</th>
                <th> البريد الالكتروني</th>
                <th> اسم الأب </th>
                <th> رقم هوية الأب</th>
                <th> رقم هاتف الاب</th>
                <th> وظيفة الأب</th>
                <th width="25%">العمليات</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0; ?>
            @foreach ($my_parents as $my_parent)
                <tr>
                    <?php $i++; ?>
                    <td>{{ $i }}</td>
                    <td>{{ $my_parent->Email }}</td>

                    <td>{{ $my_parent->Name_Father }}</td>

                    <td>{{ $my_parent->National_ID_Father }}</td>

                    <td>{{ $my_parent->Phone_Father }}</td>
                    <td>{{ $my_parent->Job_Father }}</td>
                    <td>
                        <button wire:click="edit({{ $my_parent->id }})" type="button" class="btn btn-info btn-sm"
                            title="تعديل"><i class="fa fa-edit"></i></button>
                        <button data-toggle="modal" data-target="#delete{{ $my_parent->id }}" type="button"
                            class="btn btn-danger btn-sm" title="حذف"><i class="fa fa-trash"></i></button>

                    </td>
                </tr>
                <!-- delete_modal_Grade -->
                <div class="modal fade" id="delete{{ $my_parent->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    حذف ولي الامر
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                هل أنت متأكد من عملية الحذف؟
                                <input id="id" type="hidden" name="id" class="form-control"
                                    value="{{ $my_parent->id }}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                                <button type="button" class="btn btn-danger"
                                    wire:click="delete({{ $my_parent->id }})">حذف البيانات</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </tbody>
    </table>
</div>
