@php
  $ends=$post->ico_end_date;
@endphp
<script>

      function countdown(){      
        var now = new Date();
        var eventDate = new Date('{{$ends}}');
        

        var currentTiime = now.getTime();
        var eventTime = eventDate.getTime();

        var remTime = eventTime - currentTiime;

        var s = Math.floor(remTime / 1000);
        var m = Math.floor(s / 60);
        var h = Math.floor(m / 60);
        var d = Math.floor(h / 24);

        h %= 24;
        m %= 60;
        s %= 60;
  
        h = (h < 10) ? '0' + h : h;
        d = (d < 10) ? '0' + d : d;
        m = (m < 10) ? '0' + m : m;
        s = (s < 10) ? '0' + s : s;

        $(document).find('#days{{$post->id}}').html(d);
        $(document).find('#days{{$post->id}}').html(d);

        $(document).find('#hours{{$post->id}}').html(h);
        $(document).find('#minutes{{$post->id}}').html(m);
        $(document).find('#sec{{$post->id}}').html(s);
        // debugger;
      }
        setInterval(countdown, 1000);
    </script>
