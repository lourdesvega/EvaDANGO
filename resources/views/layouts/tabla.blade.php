@extends('layouts.app')
@section('content')
<h1 class="h3 mb-2 text-gray-800 text-center">@yield('ttitle')</h1>
@yield('buttons')
<br>
<br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Datos</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        @yield('thead')

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        @yield('tfoot')
                    </tr>
                </tfoot>
                <tbody>
                    @yield('tbody')
                </tbody>
            </table>
        </div>
        @endsection

        @section('scripts')
        <!-- Page level plugins -->


        <!-- Page level custom scripts -->
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>

       
        @yield('script')
        @endsection