@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full" style="background-color: rgb(225, 255, 241)">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">قائمة المعلمين</h3>
                            <br>
                            <div class="mt-10">
                                <a href="{{route('Teachers.create')}}" class="btn btn-success" role="button"
                                aria-pressed="true" >معلم جديد
                            </a>
                            </div>                      
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>اسم المعلم</th>
                                            <th>الجنس</th>
                                            <th>تاريخ التوظيف</th>
                                            <th>التخصص</th>
                                            <th>العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($Teachers as $Teacher)
                                            <tr>
                                            <?php $i++; ?>
                                            <td>{{ $i }}</td>
                                            <td>{{$Teacher->Name}}</td>
                                            <td>{{$Teacher->genders->Name}}</td>
                                            <td>{{$Teacher->Joining_Date}}</td>
                                            <td>{{$Teacher->specializations->Name}}</td>
                                                <td>
                                                    <a href="{{route('Teachers.edit',$Teacher->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Teacher{{ $Teacher->id }}" title="حذف"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="delete_Teacher{{$Teacher->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('Teachers.destroy','test')}}" method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حذف معلم</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p> هل أنت متأكد من عملية الحذف؟</p>
                                                            <input type="hidden" name="id"  value="{{$Teacher->id}}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">إغلاق</button>
                                                                <button type="submit"
                                                                        class="btn btn-danger">حذف</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>                                
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>    
                </div>            
            </div>            
        </section>
        <!-- /.content -->
        
    </div>
</div>

@endsection