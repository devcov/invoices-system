@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الغواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة الفواتير</span><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة الفواتير</span>
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




@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


@if (session()->has('Add'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('Add') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session()->has('delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('delete') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
				<!-- row -->
				<div class="row">

                    <div class="d-md-flex">
                        <div class="">
                            <div class="panel panel-primary tabs-style-4">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu ">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs">
                                            <li class=""><a href="#tab21" class="active" data-toggle="tab"><i class="fa fa-laptop"></i> الفاتورة</a></li>
                                            <li><a href="#tab22" data-toggle="tab"><i class="fa fa-cube"></i> حالات الدفع</a></li>
                                            <li><a href="#tab23" data-toggle="tab"><i class="fa fa-cogs"></i> مرفقات الفاتورة</a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tabs-style-4">
                            <div class="panel-body tabs-menu-body">


                                 <!--المرفقات-->
                                 <div class="card card-statistics">





                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab21">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="example1" class="table key-buttons text-md-nowrap">
                                                    <thead>
                                                        <tr>

                                                            <th class="border-bottom-0">رقم الفاتورة</th>
                                                            <th class="border-bottom-0">تاريخ الفاتورة</th>
                                                            <th class="border-bottom-0">تاريخ الاستحقاق</th>
                                                            <th class="border-bottom-0">المنتج</th>
                                                            <th class="border-bottom-0">القسم</th>
                                                            <th class="border-bottom-0">الخصم</th>

                                                            <th class="border-bottom-0">نسبة الضريبة</th>
                                                            <th class="border-bottom-0">قيمة الضريبة</th>
                                                            <th class="border-bottom-0">الإجمالي</th>
                                                            <th class="border-bottom-0">الحالة</th>
                                                            <th class="border-bottom-0">الملاحظات</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>


                                                        <tr>

                                                            <td>{{ $invoices->invoice_number}}</td>
                                                            <td>{{ $invoices->invoice_Date}}</td>

                                                            <td>{{ $invoices->Due_date }}</td>
                                                            <td>{{ $invoices->product }}</td>



                                                            <td>{{ $invoices->section->section_name}}
                                                        </td>

                                                            <td>{{ $invoices->Discount }}</td>

                                                            <td>{{ $invoices->Rate_VAT }}</td>

                                                            <td>{{ $invoices->Value_VAT }}</td>



                                                            <td>{{ $invoices->Total }}</td>



                                                        <td>
                                                            @if ($invoices->Value_Status == 1)<span
                                                            class="badge badge-pill badge-success">{{ $invoices->Status }}</span>
                                                    </td>
                                                @elseif($invoices->Value_Status ==2)
                                                    <td>
                                                        <span
                                                            class="badge badge-pill badge-danger">{{ $invoices->Status }}</span>
                                                    </td>
                                                @else
                                                    <td><span
                                                            class="badge badge-pill badge-warning">{{ $invoices->Status }}</span>
                                                    </td>
                                                @endif





                                                        </tr>





                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab22">



                                        <table class="table center-aligned-table mb-0 table-hover"
                                        style="text-align:center">
                                        <thead>
                                            <tr class="text-dark">
                                                <th>#</th>
                                                <th>رقم الفاتورة</th>
                                                <th>نوع المنتج</th>
                                                <th>القسم</th>
                                                <th>حالة الدفع</th>
                                                <th>تاريخ الدفع </th>
                                                <th>ملاحظات</th>
                                                <th>تاريخ الاضافة </th>
                                                <th>المستخدم</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @foreach ($details as $x)
                                                <?php $i++; ?>
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $x->invoice_number }}</td>
                                                    <td>{{ $x->product }}</td>
                                                    <td>{{ $invoices->Section->section_name }}</td>
                                                    @if ($x->Value_Status == 1)

                                                        <td>

                                                            <span
                                                                class="badge badge-pill badge-success">{{ $x->Status }}</span>
                                                        </td>
                                                    @elseif($x->Value_Status ==2)
                                                        <td><span
                                                                class="badge badge-pill badge-danger">{{ $x->Status }}</span>
                                                        </td>
                                                    @else
                                                        <td><span
                                                                class="badge badge-pill badge-warning">{{ $x->Status }}</span>
                                                        </td>
                                                    @endif
                                                    <td>{{ $x->Payment_Date }}</td>
                                                    <td>{{ $x->note }}</td>
                                                    <td>{{ $x->created_at }}</td>
                                                    <td>{{ $x->user }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>











                                    </div>
                                    <div class="tab-pane" id="tab23">

                                        <div class="card-body">
                                            <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                                            <h5 class="card-title">اضافة مرفقات</h5>
                                            <form method="post" action="{{ url('/InvoiceAttachments') }}"
                                                enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile"
                                                        name="file_name" required>
                                                    <input type="hidden" id="customFile" name="invoice_number"
                                                        value="{{ $invoices->invoice_number }}">
                                                    <input type="hidden" id="invoice_id" name="invoice_id"
                                                        value="{{ $invoices->id }}">
                                                    <label class="custom-file-label" for="customFile">حدد
                                                        المرفق</label>
                                                </div><br><br>
                                                <button type="submit" class="btn btn-primary btn-sm "
                                                    name="uploadedFile">تاكيد</button>
                                            </form>
                                        </div>

                                    <br>
                                        <div class="table-responsive mt-15">
                                            <table class="table center-aligned-table mb-0 table table-hover"
                                                style="text-align:center">
                                                <thead>
                                                    <tr class="text-dark">
                                                        <th scope="col">م</th>
                                                        <th>رقم الفاتورة</th>
                                                        <th scope="col">اسم الملف</th>
                                                        <th scope="col">قام بالاضافة</th>
                                                        <th scope="col">تاريخ الاضافة</th>
                                                        <th scope="col">العمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 0; ?>
                                                    @foreach ($attachments as $attachment)
                                                        <?php $i++; ?>
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $x->invoice_number }}</td>
                                                            <td>{{ $attachment->file_name }}</td>
                                                            <td>{{ $attachment->Created_by }}</td>
                                                            <td>{{ $attachment->created_at }}</td>
                                                            <td colspan="2">

                                                                <a class="btn btn-outline-success btn-sm"
                                                                    href="{{ url('View_file') }}/{{ $invoices->invoice_number }}/{{ $attachment->file_name }}"
                                                                    role="button"><i class="fas fa-eye"></i>&nbsp;
                                                                    عرض</a>

                                                                <a class="btn btn-outline-info btn-sm"
                                                                    href="{{ url('download') }}/{{ $invoices->invoice_number }}/{{ $attachment->file_name }}"
                                                                    role="button"><i
                                                                        class="fas fa-download"></i>&nbsp;
                                                                    تحميل</a>


                                                                    <button class="btn btn-outline-danger btn-sm"
                                                                        data-toggle="modal"
                                                                        data-file_name="{{ $attachment->file_name }}"
                                                                        data-invoice_number="{{ $attachment->invoice_number }}"
                                                                        data-id_file="{{ $attachment->id }}"
                                                                        data-target="#delete_file">حذف</button>


                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


				</div>
				<!-- row closed -->
			</div>

             <!-- delete -->
    <div class="modal fade" id="delete_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف المرفق</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('delete_file') }}" method="post">

                {{ csrf_field() }}
                <div class="modal-body">
                    <p class="text-center">
                    <h6 style="color:red"> هل انت متاكد من عملية حذف المرفق ؟</h6>
                    </p>

                    <input type="hidden" name="id_file" id="id_file" value="">
                    <input type="hidden" name="file_name" id="file_name" value="">
                    <input type="hidden" name="invoice_number" id="invoice_number" value="">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                    <button type="submit" class="btn btn-danger">تاكيد</button>
                </div>
            </form>
        </div>
    </div>
</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')

<script>
    $('#delete_file').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id_file = button.data('id_file')
        var file_name = button.data('file_name')
        var invoice_number = button.data('invoice_number')
        var modal = $(this)
        modal.find('.modal-body #id_file').val(id_file);
        modal.find('.modal-body #file_name').val(file_name);
        modal.find('.modal-body #invoice_number').val(invoice_number);
    })
</script>


@endsection
