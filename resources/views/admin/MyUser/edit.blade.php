@extends('admin.layouts.template')

@section('title')
<title>รายชื่อลูกค้าผู้เข้าร่วมงาน Dealer New Car</title>
<meta name="description" content="รายชื่อลูกค้าผู้เข้าร่วมงาน Dealer New Car">
@stop
@section('stylesheet')

@stop('stylesheet')

@section('content')

    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            แก้ไขรายชื่อลูกค้า</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ url('dashboard') }}" class="text-muted text-hover-primary">จัดการ</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">แก้ไข รายชื่อลูกค้า</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                    
                    
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <form id="kt_account_profile_details_form" class="form" method="POST" action="{{$url}}" enctype="multipart/form-data">
                        {{ method_field($method) }}
                        {{ csrf_field() }}
                        <div class="card card-xl-stretch mb-5 mb-xl-8">
                            
                            <div class="card-body border-top p-9">

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">No ID</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="phone" class="form-control form-control-lg form-control-solid" placeholder="D001" value="{{ $objs->phone }}">
                                    
                                        @if ($errors->has('phone'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>{{ $errors->first('phone') }}</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">รายชื่อผู้เข้าร่วม</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="name" class="form-control form-control-lg form-control-solid" placeholder="คุณชูชาติ พานทอง" value="{{ $objs->name }}">
                                    
                                        @if ($errors->has('name'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>{{ $errors->first('name') }}</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Dealer</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="provider_id" class="form-control form-control-lg form-control-solid" placeholder="บจก. อีซูซุ เสนียนต์" value="{{ $objs->provider_id }}">
                                    
                                        @if ($errors->has('provider_id'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>{{ $errors->first('provider_id') }}</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>


                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">สถานะการเข้างาน</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <select class="form-select" name="status" aria-label="Select example">
                                            <option value="1" @if( $objs->status == 1)
                                                selected='selected'
                                                @endif>Complated (เข้าร่วมงานแล้ว)</option>
                                            <option value="0" @if( $objs->status == 0)
                                                selected='selected'
                                                @endif>On Hold (ยังไม่เข้าร่วมงาน)</option>
                                        </select>
                                        @if ($errors->has('email'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณากำหนด Region</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>


                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Region</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <select class="form-select" name="birthday" aria-label="Select example">
                                            <option> -- กำหนด Region -- </option>
                                            <option value="North" @if( $objs->birthday == 'North')
                                                selected='selected'
                                                @endif>North</option>
                                            <option value="Central" @if( $objs->birthday == 'Central')
                                                selected='selected'
                                                @endif>Central</option>
                                            <option value="East" @if( $objs->birthday == 'East')
                                                selected='selected'
                                                @endif>East</option>
                                            <option value="North East1" @if( $objs->birthday == 'North East1')
                                                selected='selected'
                                                @endif>North East1</option>
                                            <option value="North East2" @if( $objs->birthday == 'North East2')
                                                selected='selected'
                                                @endif>North East2</option>
                                            <option value="South" @if( $objs->birthday == 'South')
                                                selected='selected'
                                                @endif>South</option>
                                            <option value="BKK1" @if( $objs->birthday == 'BKK1')
                                                selected='selected'
                                                @endif>BKK1</option>
                                        </select>
                                        @if ($errors->has('email'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณากำหนด Region</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>


                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">จังหวัด</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <select class="form-select" name="address" aria-label="Select example">
                                            <option> -- เลือกจังหวัด -- </option>
                                            @isset($province)
                                                @foreach ($province as $item)
                                                    <option value="{{ $item->id }}" @if( $objs->address == $item->id)
                                                        selected='selected'
                                                        @endif>{{ $item->PROVINCE_NAME }}</option>
                                                @endforeach
                                            @endisset
                                            
                                        </select>
                                        @if ($errors->has('email'))
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div>กรุณาเลือกจังหวัด</div>
                                            </div>
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>


                               

                              
                            

                            </div>
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="reset" class="btn btn-light btn-active-light-primary me-2">ยกเลิก</button>
                                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">บันทึกข้อมูล</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
        <!--begin::Footer-->
        <div id="kt_app_footer" class="app-footer">
            <!--begin::Footer container-->
            <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
               
            </div>
            <!--end::Footer container-->
        </div>
        <!--end::Footer-->
    </div>

@endsection

@section('scripts')


@stop('scripts')
