<!DOCTYPE html>
<html>

<head>
    <style>
        #teacher {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #teacher td,
        #teacher th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #teacher tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #teacher th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: right;
            background-color: #6C63FF;
            color: white;
        }

    </style>
</head>

<body dir="rtl">

    <table id="teacher">
        <tr>
            <td>
                <h2>
                    <?php $image_path = '/backend/images/logo/logo.png'; ?>
                    <img src="{{ public_path() . $image_path }}" width="200" height="100">

                </h2>
            </td>
            <td>
                <h2>مدرسة النخبة </h2>
                <p>عنوان المدرسة </p>
                <p>رقم الهاتف : 258963369</p>
                <p>البريد الالكتروني : support@enokhbaschool.com</p>

            </td>
        </tr>


    </table>

    @php

        $date = date('Y-m', strtotime($attendanceteacher['0']->date));
        if ($date != '') {
            $where[] = ['date', 'like', $date . '%'];
        }

        $totalattend = App\Models\teacherAttendance::with(['teacher'])
            ->where($where)
            ->where('teacher_id', $attendanceteacher['0']->teacher_id)
            ->get();

        $salary = (float) $p artisan ['0']['teacher']['salary'];
        $salaryperday = (float) $salary / 30;
        $absentcount = count($totalattend->where('attend_status', 'Absent'));
        $totalsalaryminus = (float) $absentcount * (float) $salaryperday;
        $totalsalary = (float) $salary - (float) $totalsalaryminus;

    @endphp

    <table id="teacher">
        <tr>
            <th width="10%">الرقم</th>
            <th width="45%">البيانات </th>
            <th width="45%"> التفاصيل</th>
        </tr>
        <tr>
            <td>1</td>
            <td><b>اسم الموظف </b></td>
            <td>{{ $attendanceteacher['0']['teacher']['name'] }}</td>
        </tr>
        <tr>
            <td>2</td>
            <td><b>الراتب الاصلي </b></td>
            <td>{{ $attendanceteacher['0']['teacher']['salary'] }}</td>
        </tr>

        <tr>
            <td>3</td>
            <td><b>عدد ايام الغياب</b></td>
            <td>{{ $absentcount }}</td>
        </tr>

        <tr>
            <td>4</td>
            <td><b>الشهر</b></td>
            <td>{{ date('M Y', strtotime($attendanceteacher['0']->date)) }}</td>
        </tr>
        <tr>
            <td>5</td>
            <td><b>الراتب لهذا الشهر  </b></td>
            <td>{{ $totalsalary }}</td>
        </tr>


    </table>
    <br> <br>
    <i style="font-size: 10px; float: right;">Print Data : {{ date('d M Y') }}</i>

    <hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">

</body>

</html>
