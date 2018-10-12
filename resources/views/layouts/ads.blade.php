
<ul style=" list-style:none; ">
@foreach($ads as $ad)
    <li style="float: left;" class="col-md-4">
        {!! $ad->ad !!}
    </li>
@endforeach

</ul>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.baton').tooltip({title: "<span style=''>Купон на скидку  - "+(Math.floor(Math.random() * 999999) + 100000)+" – примените и получите скидку 10%</span>", html: true, placement: "auto"});
        });
    </script>
