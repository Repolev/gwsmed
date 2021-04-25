<!-- Javascript -->
<script src="{{asset('backend/assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('backend/assets/bundles/vendorscripts.bundle.js')}}"></script>

<script src="{{asset('backend/assets/bundles/jvectormap.bundle.js')}}"></script> <!-- JVectorMap Plugin Js -->
<script src="{{asset('backend/assets/bundles/morrisscripts.bundle.js')}}"></script>
<script src="{{asset('backend/assets/bundles/knob.bundle.js')}}"></script>

{{--Dropify--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous"></script>{{--summernote--}}
<script src="{{asset('backend/assets/summernote/summernote.js')}}"></script>
<script src="{{asset('backend/assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('backend/assets/js/pages/ui/sortable-nestable.js')}}"></script>
<script src="{{asset('backend/assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('backend/assets/js/pages/tables/jquery-datatable.js')}}"></script>
<script src="{{asset('backend/assets/vendor/switch-button-bootstrap/src/bootstrap-switch-button.js')}}"></script>
<script src="{{asset('backend/assets/js/index.js')}}"></script>


@yield('scripts')

<script>
    setTimeout(function () {
        $('#alert').slideUp();
    },4000);

    $('.dropify').dropify();
</script>

<script>
    function myFunction(){
        var password='Sahil123'
        var message=prompt('Please enter password');
        
        if(message.length<=0){
            alert('Enter password');
            return false;
        }
        else if(message ===password){
            return true;
        }
        else{
            return false;
        }
    }
</script>
