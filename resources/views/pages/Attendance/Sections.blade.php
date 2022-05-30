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
                            <h5 class="box-title">الشعب الدراسية: الحضور والغياب</h5>
                            <button type="button"  data-toggle="modal" data-target="#exampleModal" class="btn btn-rounded btn-success mb-5" style="float: left">
                                إضافة شعبة 
                            </button>
                            
                        </div>   
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="accordion" id="accordionExample">
                                @foreach ($Grades as $Grade)
                                    <div class="accordion-item" >
                                        <h2 class="accordion-header" id="headingOne-{{$Grade->id}}">
                                            <button class="accordion-button btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$Grade->id}}" aria-expanded="true" aria-controls="collapse-{{$Grade->id}}">
                                                {{ $Grade->Name }}
                                            </button>
                                        </h2>
                                        <div id="collapse-{{$Grade->id}}" class="accordion-collapse collapse show" aria-labelledby="headingOne-{{$Grade->id}}" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="table-responsive mt-15">
                                                    <table class="table center-aligned-table mb-0">
                                                        <thead>
                                                        <tr class="text-dark">
                                                            <th>#</th>
                                                            <th>الشعبة</th>
                                                            <th>الصف الدراسي</th>
                                                            <th>الحالة </th>
                                                            <th>العمليات</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $i = 0; ?>
                                                        @foreach ($Grade->Sections as $list_Sections)
                                                            <tr>
                                                                <?php $i++; ?>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $list_Sections->Name_Section }}</td>
                                                                <td>{{ $list_Sections->My_classs->Name_Class }}</td>
                                                                <td>
                                                                    <label class="badge badge-{{$list_Sections->Status == 1 ? 'success':'danger'}}">{{$list_Sections->Status == 1 ? 'نشط':'غير نشط'}}</label>
                                                                </td>
                                                                <td>
                                                                    <a href="{{route('Attendance.show',$list_Sections->id)}}" class="btn btn-warning btn-sm" role="button" aria-pressed="true">قائمة الطلاب</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <p><br><br><br><br><br><br><br><br><br><br><br></p>
                    </div>    
                </div>
                
            </div>
        </section>
        <!-- /.content -->    
    </div>
</div>

@endsection