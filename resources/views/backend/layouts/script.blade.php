    <script src="{{asset('backend/assets/dist-assets/js/plugins/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('backend/assets/dist-assets/js/plugins/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('backend/assets/dist-assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('backend/assets/dist-assets/js/scripts/script.min.js')}}"></script>
    <script src="{{asset('backend/assets/dist-assets/js/scripts/sidebar.compact.script.min.js')}}"></script>
    <script src="{{asset('backend/assets/dist-assets/js/scripts/customizer.script.min.js')}}"></script>
    <script src="{{asset('backend/assets/dist-assets/js/plugins/echarts.min.js')}}"></script>
    <script src="{{asset('backend/assets/dist-assets/js/scripts/echart.options.min.js')}}"></script>
    <script src="{{asset('backend/assets/dist-assets/js/scripts/dashboard.v1.script.min.js')}}"></script>
    <script src="{{asset('backend/assets/dist-assets/js/plugins/datatables.min.js')}}"></script>
    <script src="{{asset('backend/assets/dist-assets/js/scripts/datatables.script.min.js')}}"></script>
    <script src="{{asset('vendor/summernote/summernote.js')}}"></script>
    <script src="{{asset('backend/assets/dist-assets/js/plugins/sweetalert2.min.js')}}"></script>
    <script src="{{asset('backend/assets/dist-assets/js/scripts/sweetalert.script.min.js')}}"></script>
    <script src="{{asset('backend/assets/dist-assets/js/plugins/toastr.min.js')}}"></script>
    <script src="{{asset('backend/assets/dist-assets/js/scripts/toastr.script.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script src="{{asset('backend/assets/dist-assets/js/scripts/sidebar.script.min.js')}}"></script>
    
   

    @if (session()->has('success'))
        <script>
            const notyf = new Notyf({
                dismissible: true,
                duration: 4000,
                position: {
                    x:'right',
                    y:'top'
                }
            })
            notyf.success('{{ session('success') }}')
        </script>
    @endif

        
    @if (session()->has('error'))
        <script>
            const notyf = new Notyf({dismissible:true})
            notyf.error('{{ session('error') }}')
        </script>
    @endif

    <script>
        $(document).ready(function() {
            $('#contenu').summernote();
        });
    </script>

    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>

<script>
    $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
         }
    });
     $('.delete').click(function(e) {
         e.preventDefault();
         var form = $(this).closest('form');
         var dataID = $(this).data('id');
         // alert(dataID);
         swal({
         title: 'Are you sure?',
         text: "You won't be able to revert this!",
         type: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#0CC27E',
         cancelButtonColor: '#FF586B',
         confirmButtonText: 'Yes, delete it!',
         cancelButtonText: 'No, cancel!',
         confirmButtonClass: 'btn btn-success mr-5',
         cancelButtonClass: 'btn btn-danger',
         buttonsStyling: false
         }).then((willDelete)=> {
             if(willDelete){
                 form.submit();
                 swal('Deleted!', 'Your imaginary file has been deleted.', 'success');
             }
         }, function (dismiss) {
         // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
         if (dismiss === 'cancel') {
             swal('Cancelled', 'Your imaginary file is safe :)', 'error');
         }
         });
     });
 </script>

@yield('scripts')