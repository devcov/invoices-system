@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
@if (session()->has('edit'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('edit') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<!-- row -->
<div class="row">

<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="card-body">

            <form action="{{ route('Status_Update',$invoices->id) }}" method="post" autocomplete="off">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                {{-- 1 --}}
                <div class="row">
                    <div class="col">
                        <label for="inputName" class="control-label">رقم الفاتورة</label>
                        <input type="hidden" name="invoice_id" value="{{ $invoices->id }}" >
                        <input type="text" class="form-control" id="inputName" name="invoice_number"
                            title="يرجي ادخال رقم الفاتورة" value="{{ $invoices->invoice_number }}" readonly required>
                    </div>

                    <div class="col">
                        <label>تاريخ الفاتورة</label>
                        <input class="form-control fc-datepicker" name="invoice_Date" placeholder="YYYY-MM-DD"
                            type="text" value="{{ $invoices->invoice_Date }}" required>
                    </div>

                    <div class="col">
                        <label>تاريخ الاستحقاق</label>
                        <input class="form-control fc-datepicker" name="Due_date" placeholder="YYYY-MM-DD"
                            type="text" value="{{ $invoices->Due_date }}" required>
                    </div>

                </div>

                {{-- 2 --}}
                <div class="row">
                    <div class="col">
                        <label for="inputName" class="control-label">القسم</label>
                        <select name="Section" class="form-control " onclick="console.log($(this).val())"
                            onchange="console.log('change is firing')">
                            <!--placeholder-->
                            <option value=" {{ $invoices->section->id }}">
                                {{ $invoices->section->section_name }}
                            </option>
                            @foreach ($sections as $section)
                                <option value="{{ $section->id }}"> {{ $section->section_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col">
                        <label for="inputName" class="control-label">المنتج</label>
                        <select id="product" name="product" class="form-control">
                            <option value="{{ $invoices->product }}"> {{ $invoices->product }}</option>
                        </select>
                    </div>

                    <div class="col">
                        <label for="inputName" class="control-label">مبلغ التحصيل</label>
                        <input type="text" class="form-control" id="inputName" name="Amount_collection"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                            value="{{ $invoices->Amount_collection }}">
                    </div>
                </div>


                {{-- 3 --}}

                <div class="row">

                    <div class="col">
                        <label for="inputName" class="control-label">مبلغ العمولة</label>
                        <input type="text" class="form-control form-control-lg" id="Amount_Commission"
                            name="Amount_Commission" title="يرجي ادخال مبلغ العمولة "
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                            value="{{ $invoices->Amount_Commission }}" required>
                    </div>

                    <div class="col">
                        <label for="inputName" class="control-label">الخصم</label>
                        <input type="text" class="form-control form-control-lg" id="Discount" name="Discount"
                            title="يرجي ادخال مبلغ الخصم "
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                            value="{{ $invoices->Discount }}" required>
                    </div>

                    <div class="col">
                        <label for="inputName" class="control-label">نسبة ضريبة القيمة المضافة</label>
                        <select name="Rate_VAT" id="Rate_VAT" class="form-control" onchange="myFunction()">
                            <!--placeholder-->
                            <option value=" {{ $invoices->Rate_VAT }}">
                                {{ $invoices->Rate_VAT }}
                            <option value=" 5%">5%</option>
                            <option value="10%">10%</option>
                        </select>
                    </div>

                </div>

                {{-- 4 --}}

                <div class="row">
                    <div class="col">
                        <label for="inputName" class="control-label">قيمة ضريبة القيمة المضافة</label>
                        <input type="text" class="form-control" id="Value_VAT" name="Value_VAT"
                            value="{{ $invoices->Value_VAT }}" readonly>
                    </div>

                    <div class="col">
                        <label for="inputName" class="control-label">الاجمالي شامل الضريبة</label>
                        <input type="text" class="form-control" id="Total" name="Total" readonly
                            value="{{ $invoices->Total }}">
                    </div>
                </div>

                {{-- 5 --}}
                <div class="row">
                    <div class="col">
                        <label for="exampleTextarea">ملاحظات</label>
                        <textarea class="form-control" id="exampleTextarea" name="note" rows="3">
                        {{ $invoices->note }}</textarea>
                    </div>
                </div><br>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                </div>


            </form>
        </div>
    </div>
</div>
</div>

</div>

<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Select2 js-->
<script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
<!--Internal Fileuploads js-->
<script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
<!--Internal Fancy uploader js-->
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
<!--Internal  Form-elements js-->
<script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
<script src="{{ URL::asset('assets/js/select2.js') }}"></script>
<!--Internal Sumoselect js-->
<script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
<!--Internal  Datepicker js -->
<script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
<!--Internal  jquery.maskedinput js -->
<script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
<!-- Internal form-elements js -->
<script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

<script>
var date = $('.fc-datepicker').datepicker({
    dateFormat: 'yy-mm-dd'
}).val();
</script>

<script>
$(document).ready(function() {
    $('select[name="Section"]').on('change', function() {
        var SectionId = $(this).val();
        if (SectionId) {
            $.ajax({
                url: "{{ URL::to('section') }}/" + SectionId,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('select[name="product"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="product"]').append('<option value="' +
                            value + '">' + value + '</option>');
                    });
                },
            });
        } else {
            console.log('AJAX load did not work');
        }
    });
});
</script>


<script>
function myFunction() {
    var Amount_Commission = parseFloat(document.getElementById("Amount_Commission").value);
    var Discount = parseFloat(document.getElementById("Discount").value);
    var Rate_VAT = parseFloat(document.getElementById("Rate_VAT").value);
    var Value_VAT = parseFloat(document.getElementById("Value_VAT").value);
    var Amount_Commission2 = Amount_Commission - Discount;
    if (typeof Amount_Commission === 'undefined' || !Amount_Commission) {
        alert('يرجي ادخال مبلغ العمولة ');
    } else {
        var intResults = Amount_Commission2 * Rate_VAT / 100;
        var intResults2 = parseFloat(intResults + Amount_Commission2);
        sumq = parseFloat(intResults).toFixed(2);
        sumt = parseFloat(intResults2).toFixed(2);
        document.getElementById("Value_VAT").value = sumq;
        document.getElementById("Total").value = sumt;
    }
}
</script>

@endsection
