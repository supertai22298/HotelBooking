@extends('page_layout.page-masterpage')

@section('title')
   Hotel detail grid
@endsection

@section('content')
        
        
        <!--=================== PAGE-COVER =================-->
      @include('page.components-hotel-grid-left-sidebar.gls-page-cover')
      
      <!--===== INNERPAGE-WRAPPER ====-->
      @include('page.components-hotel-grid-left-sidebar.gls-innerpage-wrapper')
      
      <!--======================= BEST FEATURES =====================-->
      @include('page.components-hotel-grid-left-sidebar.gls-best-features')
      
      
      <!--========================= NEWSLETTER-1 ==========================-->
      @include('page.components-hotel-grid-left-sidebar.gls-new-letter-1')

@endsection