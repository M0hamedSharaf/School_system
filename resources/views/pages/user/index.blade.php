@extends('master')
@push('css')
     <!-- BEGIN PAGE LEVEL STYLES -->
     <link rel="stylesheet" type="text/css" href="{{asset('adminCork/plugins/table/datatable/datatables.css')}}">
     <link rel="stylesheet" type="text/css" href="{{asset('adminCork/plugins/table/datatable/dt-global_style.css')}}">
     <!-- END PAGE LEVEL STYLES -->
 
     <style>
         .table-responsive > .table {
             background: transparent;
         }
     </style>
@endpush
@section('titlePage')
    Index Users
@endsection
@section('content')

<div class="layout-px-spacing">
                
    <div class="row layout-top-spacing" id="cancel-row">
    
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="table-form">
                    <div class="form-group row mr-3">
                        <label for="min" class="col-sm-5 col-form-label col-form-label-sm">Minimum age:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-sm" name="min" id="min" placeholder="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="max" class="col-sm-5 col-form-label col-form-label-sm">Maximum age:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-sm" name="max" id="max" placeholder="">
                        </div>
                    </div>
                </div>
                <div id="range-search_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                  {{-- <div class="table-responsive"> --}}
                 <table id="range-search" class="display table table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="range-search_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="range-search" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 101px;">
                                Id
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="range-search" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 156px;">
                                Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="range-search" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 71px;">
                                Email
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="range-search" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">
                                Created_at
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="range-search" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 75px;">
                                Updated_at
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="range-search" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 75px;">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user )
                        <tr role="row">
                            <td class="sorting_1">{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>{{$user->updated_at}}</td>
                            <td class="text-center">
                                <a href="{{route('user.delete',$user->id)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 table-cancel">
                                        <polyline points="3 6 5 6 21 6">
                                        </polyline>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                        </path>
                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                       </tbody>
                    <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">Id</th>
                            <th rowspan="1" colspan="1">Name</th>
                            <th rowspan="1" colspan="1">Email</th><
                            <th rowspan="1" colspan="1">Created_at</th>
                            <th rowspan="1" colspan="1">Updated_at</th>
                            <th class="text-center" rowspan="1" colspan="1">Action</th>
                        </tr>
                    </tfoot>
                </table> 
            </div>
        </div>

    </div>

</div>



@endsection

@push('js')

 <!-- BEGIN PAGE LEVEL SCRIPTS -->
 <script src="{{asset('adminCork/plugins/table/datatable/datatables.js')}}"></script>
 <script>
     /* Custom filtering function which will search data in column four between two values */
     $.fn.dataTable.ext.search.push(
         function( settings, data, dataIndex ) {
             var min = parseInt( $('#min').val(), 10 );
             var max = parseInt( $('#max').val(), 10 );
             var age = parseFloat( data[3] ) || 0; // use data for the age column
      
             if ( ( isNaN( min ) && isNaN( max ) ) ||
                  ( isNaN( min ) && age <= max ) ||
                  ( min <= age   && isNaN( max ) ) ||
                  ( min <= age   && age <= max ) )
             {
                 return true;
             }
             return false;
         }
     );         
     $(document).ready(function() {
         var table = $('#range-search').DataTable({
             "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
     "<'table-responsive'tr>" +
     "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
             "oLanguage": {
                 "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                 "sInfo": "Showing page _PAGE_ of _PAGES_",
                 "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                 "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
             },
             "stripeClasses": [],
             "lengthMenu": [7, 10, 20, 50],
             "pageLength": 7 
         });             
         // Event listener to the two range filtering inputs to redraw on input
         $('#min, #max').keyup( function() { table.draw(); } );
     } );
 </script>
 <!-- END PAGE LEVEL SCRIPTS -->


@endpush