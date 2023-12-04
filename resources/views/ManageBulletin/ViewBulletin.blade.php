<a href="{{ route('manage-bulletin.index') }}">Bulletin</a> > <b>View Bulletin</b><br>
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    Bulletin details
</h2>

<table >
    <thead>
        <tr>
            <th>
                <h3>
                    {{ $bulletin->title }}
                </h3>
            </th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td>
           <b>Category:</b> 
        </td>
        <td>
            {{ $bulletin->category }}
            
        </td>
    </tr>
    <tr>
        <td >
            <b>Message:</b> 
        </td>
        <td>
            {{ $bulletin->message }}
        </td>
    </tr>
    <tr>
        <td >
            <b>Url reference:</b> 
        </td>
        <td>
            {{ $bulletin->url_reference }} 
        </td>
    </tr>
    <tr>
        <td >
            <b>Posted by:</b> 
        </td>
        <td>
            {{ $bulletin->posted_by }} 
        </td>
    </tr>
        <td >
            <b>Date:</b> 
        </td>
        <td>
            {{ $bulletin->created_at->toDateString() }} 
        </td>
    </tr>
</tbody>
</table>