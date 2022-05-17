//[Data Table Javascript]

//Project:	Sunny Admin - Responsive Admin Template
//Primary use:   Used only for the Data Table

$(function () {
    "use strict";

    $("#example1").DataTable({
          retrieve: true,
        //  destroy: true,
        language: {
            // url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/ar.json'
            loadingRecords: "جارٍ التحميل...",
            lengthMenu: "أظهر _MENU_ مدخلات",
            zeroRecords: "لم يعثر على أية سجلات",
            info: "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
            search: "ابحث:",
            paginate: {
                first: "الأول",
                previous: "السابق",
                next: "التالي",
                last: "الأخير",
            },
            aria: {
                sortAscending: ": تفعيل لترتيب العمود تصاعدياً",
                sortDescending: ": تفعيل لترتيب العمود تنازلياً",
            },
            select: {
                rows: {
                    _: "%d قيمة محددة",
                    1: "1 قيمة محددة",
                },
                cells: {
                    1: "1 خلية محددة",
                    _: "%d خلايا محددة",
                },
                columns: {
                    1: "1 عمود محدد",
                    _: "%d أعمدة محددة",
                },
            },
            buttons: {
                print: "طباعة",
                copyKeys:
                    "زر <i>ctrl</i> أو <i>⌘</i> + <i>C</i> من الجدول<br>ليتم نسخها إلى الحافظة<br><br>للإلغاء اضغط على الرسالة أو اضغط على زر الخروج.",
                pageLength: {
                    "-1": "اظهار الكل",
                    _: "إظهار %d أسطر",
                },
                collection: "مجموعة",
                copy: "نسخ",
                copyTitle: "نسخ إلى الحافظة",
                csv: "CSV",
                excel: "Excel",
                pdf: "PDF",
                colvis: "إظهار الأعمدة",
                colvisRestore: "إستعادة العرض",
                copySuccess: {
                    1: "تم نسخ سطر واحد الى الحافظة",
                    _: "تم نسخ %ds أسطر الى الحافظة",
                },
            },
            searchBuilder: {
                add: "اضافة شرط",
                clearAll: "ازالة الكل",
                condition: "الشرط",
                data: "المعلومة",
                logicAnd: "و",
                logicOr: "أو",
                title: ["منشئ البحث"],
                value: "القيمة",
                conditions: {
                    date: {
                        after: "بعد",
                        before: "قبل",
                        between: "بين",
                        empty: "فارغ",
                        equals: "تساوي",
                        notBetween: "ليست بين",
                        notEmpty: "ليست فارغة",
                        not: "ليست ",
                    },
                    number: {
                        between: "بين",
                        empty: "فارغة",
                        equals: "تساوي",
                        gt: "أكبر من",
                        lt: "أقل من",
                        not: "ليست",
                        notBetween: "ليست بين",
                        notEmpty: "ليست فارغة",
                        gte: "أكبر أو تساوي",
                        lte: "أقل أو تساوي",
                    },
                    string: {
                        not: "ليست",
                        notEmpty: "ليست فارغة",
                        startsWith: " تبدأ بـ ",
                        contains: "تحتوي",
                        empty: "فارغة",
                        endsWith: "تنتهي ب",
                        equals: "تساوي",
                        notContains: "لا تحتوي",
                        notStarts: "لا تبدأ بـ",
                        notEnds: "لا تنتهي بـ",
                    },
                    array: {
                        equals: "تساوي",
                        empty: "فارغة",
                        contains: "تحتوي",
                        not: "ليست",
                        notEmpty: "ليست فارغة",
                        without: "بدون",
                    },
                },
                button: {
                    0: "فلاتر البحث",
                    _: "فلاتر البحث (%d)",
                },
                deleteTitle: "حذف فلاتر",
            },
            searchPanes: {
                clearMessage: "ازالة الكل",
                collapse: {
                    0: "بحث",
                    _: "بحث (%d)",
                },
                count: "عدد",
                countFiltered: "عدد المفلتر",
                loadMessage: "جارِ التحميل ...",
                title: "الفلاتر النشطة",
                showMessage: "إظهار الجميع",
                collapseMessage: "إخفاء الجميع",
            },
            infoThousands: ",",
            datetime: {
                previous: "السابق",
                next: "التالي",
                hours: "الساعة",
                minutes: "الدقيقة",
                seconds: "الثانية",
                unknown: "-",
                amPm: ["صباحا", "مساءا"],
                weekdays: [
                    "الأحد",
                    "الإثنين",
                    "الثلاثاء",
                    "الأربعاء",
                    "الخميس",
                    "الجمعة",
                    "السبت",
                ],
                months: [
                    "يناير",
                    "فبراير",
                    "مارس",
                    "أبريل",
                    "مايو",
                    "يونيو",
                    "يوليو",
                    "أغسطس",
                    "سبتمبر",
                    "أكتوبر",
                    "نوفمبر",
                    "ديسمبر",
                ],
            },
            editor: {
                close: "إغلاق",
                create: {
                    button: "إضافة",
                    title: "إضافة جديدة",
                    submit: "إرسال",
                },
                edit: {
                    button: "تعديل",
                    title: "تعديل السجل",
                    submit: "تحديث",
                },
                remove: {
                    button: "حذف",
                    title: "حذف",
                    submit: "حذف",
                    confirm: {
                        _: "هل أنت متأكد من رغبتك في حذف السجلات %d المحددة؟",
                        1: "هل أنت متأكد من رغبتك في حذف السجل؟",
                    },
                },
                error: {
                    system: "حدث خطأ ما",
                },
                multi: {
                    title: "قيم متعدية",
                    restore: "تراجع",
                },
            },
            processing: "جارٍ المعالجة...",
            emptyTable: "لا يوجد بيانات متاحة في الجدول",
            infoEmpty: "يعرض 0 إلى 0 من أصل 0 مُدخل",
            thousands: ".",
            stateRestore: {
                creationModal: {
                    columns: {
                        search: "إمكانية البحث للعمود",
                        visible: "إظهار العمود",
                    },
                    toggleLabel: "تتضمن",
                },
            },
            autoFill: {
                cancel: "إلغاء الامر",
                fill: "املأ كل الخلايا بـ <i>%d</i>",
                fillHorizontal: "تعبئة الخلايا أفقيًا",
                fillVertical: "تعبئة الخلايا عموديا",
            },
            decimal: ",",
            infoFiltered: "(مرشحة من مجموع _MAX_ مُدخل)",
        },
    });
    $("#example1").DataTable();
    $("#example2").DataTable({
        paging: true,
        lengthChange: false,
        searching: false,
        ordering: true,
        info: true,
        autoWidth: false,
    });

    $("#example").DataTable({
        dom: "Bfrtip",
        buttons: ["copy", "csv", "excel", "pdf", "print"],
    });

    $("#tickets").DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
    });

    $("#productorder").DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
    });

    $("#complex_header").DataTable();

    //--------Individual column searching

    // Setup - add a text input to each footer cell
    $("#example5 tfoot th").each(function () {
        var title = $(this).text();
        $(this).html(
            '<input type="text" placeholder="Search ' + title + '" />'
        );
    });

    // DataTable
    var table = $("#example5").DataTable();

    // Apply the search
    table.columns().every(function () {
        var that = this;

        $("input", this.footer()).on("keyup change", function () {
            if (that.search() !== this.value) {
                that.search(this.value).draw();
            }
        });
    });

    // //---------------Form inputs
    // var table = $("#example6").DataTable();

    // $("button").click(function () {
    //     var data = table.$("input, select").serialize();
    //     alert(
    //         "The following data would have been submitted to the server: \n\n" +
    //             data.substr(0, 120) +
    //             "..."
    //     );
    //     return false;
    // });
}); // End of use strict
