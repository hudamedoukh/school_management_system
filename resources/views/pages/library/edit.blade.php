
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
                                <h3 class="box-title"> تعديل كتاب {{ $book->title }}

                                </h3>

                            </div>
                            <div style="padding-right: 55px;padding-top: 26px;">
                                @if ($errors->any())
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li> <span class="text-danger">{{ $error }}</span></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12 mb-30">
                                <form action="{{ route('library.update', 'test') }}" method="post"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-row">

                                        <div class="col">
                                            <label for="title">اسم الكتاب</label>
                                            <input type="text" name="title" value="{{ $book->title }}"
                                                class="form-control">
                                            <input type="hidden" name="id" value="{{ $book->id }}"
                                                class="form-control">
                                        </div>

                                    </div>
                                    <br>

                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Grade_id">المرحلة الدراسية : <span
                                                        class="text-danger">*</span></label>
                                                <select class="custom-select mr-sm-2" name="Grade_id">
                                                    <option selected disabled>اختر المرحلة الدراسية...</option>
                                                    @foreach ($grades as $grade)
                                                        <option value="{{ $grade->id }}"
                                                            {{ $book->Grade_id == $grade->id ? 'selected' : '' }}>
                                                            {{ $grade->Name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Classroom_id">الصف الدراسي : <span
                                                        class="text-danger">*</span></label>
                                                <select class="custom-select mr-sm-2" name="Classroom_id">
                                                    <option value="{{ $book->Classroom_id }}">
                                                        {{ $book->classroom->Name_Class }}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="section_id">الشعبة الدراسية: </label>
                                                <select class="custom-select mr-sm-2" name="section_id">
                                                    <option value="{{ $book->section_id }}">
                                                        {{ $book->section->Name_Section }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col">

                                            <embed src="{{ URL::asset('attachments/library/' . $book->file_name) }}"
                                                type="application/pdf" height="150px" width="100px"><br><br>
                                            <div class="form-group">
                                                <label for="academic_year">المرفقات : <span
                                                        class="text-danger">*</span></label>
                                                <input type="file" accept="application/pdf" name="file_name">
                                            </div>

                                        </div>
                                    </div>

                                    <button class="btn btn-success pull-right" type="submit">حفظ
                                        البيانات</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
</div>
</div>
@endsection

