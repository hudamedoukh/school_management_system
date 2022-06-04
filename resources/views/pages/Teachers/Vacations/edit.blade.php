
@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">

                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title"> اجازات المعلمين</h4>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                <form method="post" action="{{ route('Vacations.update', $vacation->id) }}">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>اسم المعلم <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="teacher_id" required="" class="form-control">
                                                <option value="" selected="" disabled="">اختر اسم المعلم
                                                </option>
                                                @foreach ($teachers as $teacher)
                                                    <option value="{{ $teacher->id }}"
                                                        @if ($teacher->id == $vacation->teacher_id) selected @endif>
                                                        {{ $teacher->Name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>تاريخ بدء الاجازة <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="start_date" class="form-control"
                                                value={{ old('start_date', $vacation->start_date) }}>
                                        </div>
                                    </div>


                                </div> <!-- // end col md-6 -->

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>سبب الاجازة <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="vacation_purpose_id" data-id="vacation_purpose_id{{ $vacation->id }}" required=""
                                                class="form-control">
                                                <option value="" selected="" disabled="">اختر سبب الاجازة</option>

                                                @foreach ($purposes as $purpose)
                                                    <option value="{{ $purpose->id }}"
                                                        @if ($purpose->id == $vacation->vacation_purpose_id) selected @endif>
                                                        {{ $purpose->name }}
                                                    </option>
                                                @endforeach
                                                <option value="0">سبب اجازة جديد </option>
                                            </select>
                                            <input type="text" name="name"  data-id="add_another{{ $vacation->id }}" class="form-control mb-5 mt-5"
                                                placeholder="اكتب السبب" style="display: none;">
                                        </div>
                                    </div>


                                </div> <!-- // end col md-6 -->


                                <div class="col-md-6">

                                    <div class="form-group">
                                        <h5>تاريخ انتهاء الإجازة <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="end_date" class="form-control"
                                                value={{ old('end_date', $vacation->end_date) }}>
                                        </div>

                                    </div>

                                </div> <!-- // end col md-6 -->

                            </div> <!-- // end row -->
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info mb-5" value="حفظ">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

</section>





</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
$(document).on('change', '#vacation_purpose_id', function() {
var vacation_purpose_id = $(this).val();
if (vacation_purpose_id == '0') {
    $('#add_another').show();
} else {
    $('#add_another').hide();
}
});
});
</script>
@endsection
