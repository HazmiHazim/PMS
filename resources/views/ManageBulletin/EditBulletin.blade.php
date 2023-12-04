<a href="{{ route('manage-bulletin.index') }}">Bulletin</a> > <b>Edit Bulletin</b><br>
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    Edit Bulletin
</h2>
<form action="{{ route('manage-bulletin.confirmEdit', $bulletin->bulletin_id) }}" method="get">
    @csrf
    <div>
        <label for="bulletincategory">Category</label>
        <select name="category" id="category" >
            <option value="{{ $bulletin->category }}">{{ $bulletin->category }}</option>
            <option value="Faculty">Faculty</option>
            <option value="PETAKOM">PETAKOM</option>
        </select>
    </div>
    <div>
        <label for="bulletintitle">Title</label>
        <input type="text" name="title" placeholder="{{ $bulletin->title }}"  value="{{ $bulletin->title }}" required>
    </div>
    <div >
        <label for="bulletinmessage">Message</label>
        <textarea name="message" rows="6" value="{{ $bulletin->message }}" required>{{ $bulletin->message }}</textarea>
    </div>
    <div >
        <label for="bulletinreference">Url reference</label>
        <input type="text" name="reference" placeholder="{{ $bulletin->url_reference }}"  value="{{ $bulletin->url_reference }}" required>
    </div>
    <div >
        <label for="bulletinview">Bulletin view</label>
        <select name="days" id="days">
            <option value="{{ $bulletin->duration }}">{{ $bulletin->duration }} Day</option>
            <option value="1">1 Day</option>
            <option value="2">2 Day</option>
            <option value="3">3 Day</option>
            <option value="4">4 Day</option>
        </select>
    </div>
    <button type="submit" >Save</button>
    <a href="{{ route('manage-bulletin.index') }}">Cancel</a>
</form>