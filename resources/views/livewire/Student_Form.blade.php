@if ($currentStep != 3)
    <div style="display: none" class="row setup-content" id="step-3">
@endif
<div class="col-xs-12">
    <div class="col-md-12">
        <h6 class="text-danger">
            المعلومات الشخصية</h6><br>
        <div class="row">

            <div class="col-md-4">
                <div class="form-group">
                    <label>الاسم : <span class="text-danger">*</span></label>
                    <input class="form-control" wire:model="name" type="text">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="gender">الجنس : <span class="text-danger">*</span></label>
                    <select class="custom-select mr-sm-2" wire:model="gender_id">
                        <option selected disabled>اختر الجنس...
                        </option>
                        @foreach ($Genders as $Gender)
                            <option value="{{ $Gender->id }}">{{ $Gender->Name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group date">
                    <label>تاريخ الميلاد:</label>
                    <input class="form-control" type="date" id="datepicker-action"  wire:model="Date_Birth"
                        data-date-format="yyyy-mm-dd">
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>البريد الالكتروني : </label>
                    <input type="email" wire:model="myemail" class="form-control">
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <label>كلمة المرور:</label>
                    <input type="password"  wire:model="mypassword" class="form-control">
                </div>
            </div>


        </div>

        <h6 class="pt-3 text-danger">
           معلومات الطالب</h6><br>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="Grade_id">المرحلة الدراسية : <span
                            class="text-danger">*</span></label>
                    <select class="custom-select mr-sm-2"  wire:model="Grade_id">
                        <option selected disabled>اختر المرحلة الدراسية...
                        </option>
                        @foreach ($my_classes as $c)
                            <option value="{{ $c->id }}">{{ $c->Name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="Classroom_id">الصف الدراسي :
                        <span class="text-danger">*</span></label>
                    <select class="custom-select mr-sm-2"  wire:model="Classroom_id">

                    </select>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="section_id">الشعبة الدراسية : </label>
                    <select class="custom-select mr-sm-2"  wire:model="section_id">

                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="parent_id">ولي الامر : <span
                            class="text-danger">*</span></label>
                    <select class="custom-select mr-sm-2"  wire:model="parent_id">
                        <option selected disabled>اختر ولي الامر...
                        </option>
                        {{-- @foreach ($parents as $parent)
                            <option value="{{ $parent->id }}">{{ $parent->Name_Father }}
                            </option>
                        @endforeach --}}
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="academic_year">السنة الدراسية:
                        <span class="text-danger">*</span></label>
                    <select class="custom-select mr-sm-2"  wire:model="academic_year">
                        <option selected disabled>اختر السنة الدراسية...
                        </option>
                        @php
                            $current_year = date('Y');
                        @endphp
                        @for ($year = $current_year; $year <= $current_year + 1; $year++)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                </div>
            </div>
        </div><br>
        <div class="col-md-3">
            <div class="form-group">
                <label for="academic_year">المرفقات : <span class="text-danger">*</span></label>
                <input type="file" accept="image/*"  wire:model="myphotos[]" multiple>
            </div>
        </div>

        <button class="btn btn-info nextBtn" type="button" wire:click="back(2)">
            السابق
        </button>
        @if ($updateMode)
            <button class="btn btn-info nextBtn" type="button" wire:click="secondStepSubmit_edit">التالي</button>
        @else
            <button class="btn btn-info nextBtn" type="button" wire:click="secondStepSubmit">التالي</button>
        @endif


    </div>
</div>
</div>
