@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box bb-3 border-info">
                            <div class="box-header">
                                <h4 class="box-title"> <strong> علامات الطالب</strong></h4>
                                <a href="{{ url()->previous() }}" class="btn btn-rounded btn-info mb-5 mr-3"
                                    style="float: left"> عودة</a>
                            </div>

                            <div class="box-body">

                                <div class="row" id="marks-view">
                                    <div class="col-md-12">
                                        @foreach ($subjects as $Subject)
                                            <span class="text-danger"> المادة الدراسية:{{ $Subject->name }}</span>

                                            <table class="table table-bordered table-striped text-center mt-5"
                                                style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th>الاختبار</th>
                                                        @foreach ($Subject->Quizes as $quiz)
                                                            <th>{{ $quiz->name }}</th>
                                                        @endforeach


                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <th> العلامة</th>
                                                        @foreach ($Subject->Quizes as $quiz)
                                                            @foreach ($quiz->marks()->where('student_id', $student_id)->get() as $mark)
                                                                <td>{{ $mark->mark }}</td>
                                                            @endforeach
                                                        @endforeach

                                                    </tr>
                                                    <tr>
                                                        @php
                                                            $sum = App\Models\mark::where('subject_id', $Subject->id)
                                                                ->where('student_id', $student_id)
                                                                ->sum('mark');
                                                        @endphp
                                                        <th colspan="2">مجموع الدرجات </th>
                                                        @if ($sum)
                                                            <th colspan="2"> {{ $sum }}</th>
                                                        @endif
                                                    </tr>
                                                </tbody>
                                            </table>
                                        @endforeach

                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>
@endsection
