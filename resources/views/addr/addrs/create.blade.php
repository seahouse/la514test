@extends('navbarerp')

@section('main')
    <h1>添加地址</h1>
    <hr/>
    
<!--     <form> -->
<!--         <div class="form-group"> -->
<!--             <lablel for="province_id">Select Province:</lablel> -->
<!--             <select name="province_id" id="province" class="form-control"> -->
<!--                 <option value="0">--请选择--</option> -->
<!--                 @foreach($provinceList as $province) -->
<!--                     <option>{{ $province }}</option> -->
<!--                 @endforeach -->
<!--             </select> -->
<!--         </div> -->
        
<!--         <div class="form-group"> -->
<!--             <lablel for="city_id">Select City:</lablel> -->
<!--             <select name="city_id" id="city" class="form-control"> -->
                
<!--             </select> -->
<!--         </div> -->
<!--     </form> -->
    
<!--     <script type="text/javascript">
    var region = {
 		   getProvinces: function() {
 	 		   region_info.cid = 0;
 	 		   $.get('{{url('common/ajax/provinces')}}', function(data) {
 	 	 		   if (data) {
 	 	 	 		   region_info.provinces = data;
 	 	 		   }
 	 		   });
 		   },
 		   getCities: function(pid) {
 	 		   region_info.rid = 0;
 	 		   $.get('{{url('common/ajax/cities')}}', {pid: pid}, function(data) {
 	 	 		   if (data) {
 	 	 	 		   region_info.cities = data;
 	 	 		   }
 	 		   });
 		   }
    };
    

</script>
     -->
    
<!--     {!! Form::open(['url' => 'addr/addrs']) !!} -->
<!--         <select id="make" name="make"> -->
<!--             <option>Select Car Make</option> -->
<!--             <option value="1">Toyota</option> -->
<!--             <option value="2">Honda</option> -->
<!--             <option value="3">Mercedes</option> -->
<!--         </select> -->

<!--         <select id="model" name="model"> -->
<!--             <option>Please choose car make first</option> -->
<!--         </select> -->
<!--     {!! Form::close() !!} -->
    
<!--     <script type="text/javascript"> 
    jQuery(document).ready(function($) {
        $('#make').change(function() {
            $.get("{{ url('api/dropdown') }}", 
                    {option: $(this).val() },
                    function(data) {
                        var model = $('#model');
                        model.empty();

                        $.each(data, function(index, element) {
                            model.append("<option value='" + element.id + "'>" + element.name + "</option>");
                        });
                    });
        });
    });
</script>-->
    
    <form>
        <div class="form-group">
            <label for="province" id="t1">Select Province:</label>
                {!! Form::select('province', $provinceList, null, ['class' => 'form-control']) !!}
            </select>
        </div>
        
        <div class="form-group">
            <label for="city">Select City:</label>
            <select name="city" id="city" class="form-control">
                <option>--Select--</option> -->
            </select>
        </div>
    </form>
    

            
       
    </script>
    
<!--     <script type="text/javascript"> 
    $(document).on('change', '#province', function (e) {

        // empty the select with previous cities if we have.
        $('#city').empty();            

        $.ajax({
                type: "POST",
                dataType: "json",
                // actions is a controller
                // cities is a method of actions controller
                url : "{{ URL::to('actions/cities') }}",
                //here we set the data for the post based in our form 
                data : $('#MyFormID').serialize(),
                success:function(data){                    
                        if(data.error === 0 ){ // all was ok                                

                        for (var i = 0; i < data.cities.length; i++) { 
                            $('#city').append("<option value='"+data.cities[i].id+"'>"+data.cities[i].city_name+"</option>")
                        }

                        }else{
                            alert(data);
                        }
                },
                timeout:10000
        });                         
    });
</script>-->
    
    @include('errors.list')
@stop

@section('script')
    <script type="text/javascript">
        jQuery(document).ready(function($){
            $('#province').change(function(){
                $.get("{{ url('api/dropdown')}}",
                { option: $(this).val() },
                function(data) {
                var city = $('#city');
                city.empty();
                $.each(data, function(index,element) {
                    city.append("<option value='"+ element.id +"'>" + element.city + "</option>");
                });
                });
            });
//             $('#city').change(function(){
//                 $.get("{{ url('api/dropdowndist')}}",
//                 { stateoption: $(this).val() },
//                 function(data) {
//                     var district = $('#district');
//                     district.empty();
//                     $.each(data, function(index,element) {
//                         district.append("<option value='"+ element.id +"'>" + element.district + "</option>");
//                 });
//                 });
//             });
        });    
@stop