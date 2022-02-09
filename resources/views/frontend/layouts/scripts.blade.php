<!--Scroll to top-->
{{-- <div class="scroll-to-top scroll-to-target" data-target="html">
    <span class="fa fa-arrow-up"></span>
</div> --}}

<script src="{{asset('frontend/assets/js/jquery.js')}}"></script>
<script src="{{asset('frontend/assets/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.fancybox.js')}}"></script>
<script src="{{asset('frontend/assets/js/appear.js')}}"></script>
<script src="{{asset('frontend/assets/js/parallax.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/tilt.jquery.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.paroller.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/owl.js')}}"></script>
<script src="{{asset('frontend/assets/js/wow.js')}}"></script>
<script src="{{asset('frontend/assets/js/nav-tool.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery-ui.js')}}"></script>
<script src="{{asset('frontend/assets/js/script.js')}}"></script>

<script>
    var botmanWidget = {
    aboutText: 'Write Something',
    introMessage: "✋ Hi! I'm form expert team"
    };
</script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>

<script>
    $(document).ready(function(){
        var path = "{{route('auto.search')}}";
        $('#search_text').autocomplete({
            source:function(request,response){
                $.ajax({
                    url:path,
                    dataType:"JSON",
                    data:{
                        term:request.term
                    },
                    success:function(data){
                        response(data);
                    }
                });
            },
            minLength:1,
        })
    });
</script>

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

    @yield('scripts')
