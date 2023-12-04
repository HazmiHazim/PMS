<a href="{{ route('manage-bulletin.index') }}">Bulletin</a><br>
<button onclick="myFunction('faculty')">Faculty</button>
<button onclick="myFunction('petakom')">PETAKOM</button>
<div id="faculty" style="display: none">
    <table >
        <thead>
                @foreach($facultys as $faculty)
                    <tr>
                        <th>>></th>
                        <td><a href="{{ route('manage-bulletin.view', $faculty->bulletin_id) }}">{{ $faculty->title }}</a></td>
                    </tr>
                @endforeach
        </thead>
    </table>
</div>
<div id="petakom" >
    <table >
        <thead>
                @foreach($petakoms as $petakom)
                    <tr>
                        <th>>></th>
                        <td><a href="{{ route('manage-bulletin.view', $petakom->bulletin_id) }}">{{ $petakom->title }}</a></td>
                    </tr>
                @endforeach
        </thead>
    </table>
</div>

<script>
    function myFunction(state) {
        
        var x = document.getElementById("petakom");
        var y = document.getElementById("faculty");
        if (state === 'petakom') {
            x.style.display = 'block';
            y.style.display = 'none';
        } else {
            x.style.display = 'none';
            y.style.display = 'block';
        }
    }
</script>